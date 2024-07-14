<?php
// Include your database connection
include 'config.php';

// Function to sanitize input to prevent SQL Injection
function sanitize($conn, $input) {
    return mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['delete_from_wishlist'])) {
        // Delete from wishlist
        $wishlist_item_id = sanitize($conn, $_POST['wishlist_item_id']);
        $delete_query = mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$wishlist_item_id'");
        
        if ($delete_query) {
            header("Location: ".$_SERVER['PHP_SELF']); // Redirect back to current page
            exit();
        } else {
            echo "Error deleting item: " . mysqli_error($conn);
        }
    } elseif (isset($_POST['add_to_cart'])) {
        // Add to cart
        $wishlist_item_id = sanitize($conn, $_POST['wishlist_item_id']);
        
        // Fetch item details from wishlist
        $fetch_query = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE id = '$wishlist_item_id'");
        $item_details = mysqli_fetch_assoc($fetch_query);
        
        // Insert into cart including the image
        $insert_query = mysqli_query($conn, "INSERT INTO `cart` (name, price, description, colors, size, image) 
                        VALUES ('" . $item_details['name'] . "', '" . $item_details['price'] . "', 
                                '" . $item_details['description'] . "', '" . $item_details['colors'] . "', 
                                '" . $item_details['size'] . "', '" . $item_details['image'] . "')");
        
        if ($insert_query) {
            // Delete from wishlist after adding to cart
            $delete_query = mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$wishlist_item_id'");
            
            if ($delete_query) {
                header("Location: ".$_SERVER['PHP_SELF']); // Redirect back to current page
                exit();
            } else {
                echo "Error deleting item from wishlist: " . mysqli_error($conn);
            }
        } else {
            echo "Error adding item to cart: " . mysqli_error($conn);
        }
    }
}

// Fetch products from database
$select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist`");

// Display messages if any
if(isset($message)){
   foreach($message as $msg){
      echo '<div class="message"><span>'.$msg.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = \'none\';"></i> </div>';
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Wishlist</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      /* Additional CSS styles */
      .box {
         border: 1px solid #ddd;
         border-radius: 5px;
         padding: 15px;
         margin-bottom: 20px;
         background-color: #fff;
         box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }

      .box img {
         width: 100%;
         max-width: 200px;
         height: auto;
         border-radius: 5px;
         margin-bottom: 10px;
      }

      .box h3 {
         font-size: 1.5rem;
         margin-bottom: 5px;
         color: #333;
      }

      .box .price {
         font-size: 1.2rem;
         color: #777;
         margin-bottom: 10px;
      }

      .box p {
         font-size: 1rem;
         color: #555;
         margin-bottom: 10px;
      }

      .box .buttons {
         display: flex;
         justify-content: space-between;
         align-items: center;
      }

      .box .buttons button {
         padding: 10px 20px;
         border: none;
         border-radius: 5px;
         cursor: pointer;
         transition: background-color 0.3s;
      }

      .box .buttons button:hover {
         background-color: #ff5722;
         color: #fff;
      }
	  
	      
	  footer {
    background: #111;
    color: #fff;
    text-align: center;
    padding: 20px 0;
    position: relative;
}

footer .footer-content {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
}

footer .footer-content h3 {
    margin: 0;
    font-size: 2rem;
    font-weight: 500;
}

footer .footer-content p {
    margin: 10px 0 40px;
    font-size: 1rem;
    color: #ccc;
}

footer .socials {
    list-style: none;
    padding: 0;
    display: flex;
    justify-content: center;
}

footer .socials li {
    margin: 0 10px;
}

footer .socials li a {
    color: #fff;
    font-size: 1.5rem;
    transition: color 0.3s;
}

footer .socials li a:hover {
    color: #ff7f50;
}

footer .footer-bottom {
    background: #000;
    padding: 10px 0;
    font-size: 0.875rem;
}

footer .footer-bottom span {
    color: #ff7f50;
}
	  
	  
	  
	  
   </style>

</head>
<body>
   
<?php include 'header4.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">Your Wishlist</h1>

   <div class="box-container">

      <?php
      // Check if the query was successful
      if ($select_wishlist) {
          // Check if there are any rows returned
          if (mysqli_num_rows($select_wishlist) > 0) {
              // Fetch and display the wishlist items
              while ($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)) {
      ?>
                  <div class="box">
                      <img src="uploaded_img/<?php echo htmlspecialchars($fetch_wishlist['image']); ?>" alt="">
                      <h3><?php echo htmlspecialchars($fetch_wishlist['name']); ?></h3>
                      <div class="price">LKR<?php echo htmlspecialchars($fetch_wishlist['price']); ?>/-</div>
                      <p><?php echo htmlspecialchars($fetch_wishlist['description']); ?></p>
                      <p>Color: <?php echo htmlspecialchars($fetch_wishlist['colors']); ?></p>
                      <p>Size: <?php echo htmlspecialchars($fetch_wishlist['size']); ?></p>
                      
                      <!-- Buttons for Delete and Add to Cart -->
                      <div class="buttons">
                          <!-- Delete button -->
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <input type="hidden" name="wishlist_item_id" value="<?php echo $fetch_wishlist['id']; ?>">
                              <button type="submit" name="delete_from_wishlist">Delete</button>
                          </form>
                          
                          <!-- Add to cart button -->
                          <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                              <input type="hidden" name="wishlist_item_id" value="<?php echo $fetch_wishlist['id']; ?>">
                              <button type="submit" name="add_to_cart">Add to Cart</button>
                          </form>
                      </div>
                  </div>
      <?php
              }
          } else {
              // No wishlist items found
              echo "<p>No items in your wishlist.</p>";
          }
      } else {
          // Query failed, output an error message
          echo "Error: " . mysqli_error($conn);
      }
      ?>

   </div>

</section>

</div>



<footer>
   <div class="footer-content">
      <h3>THE ටෙඩි HOUSE</h3>
      <p>Providing the best quality products to bring joy to your special occasions.</p>
      <ul class="socials">
         <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
         <li><a href="#"><i class="fab fa-twitter"></i></a></li>
         <li><a href="#"><i class="fab fa-instagram"></i></a></li>
         <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
         <li><a href="#"><i class="fab fa-pinterest"></i></a></li>
      </ul>
   </div>
   <div class="map-section">
      <div class="map-container">
        
         <p><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2231607776243!2d80.05189657482919!3d6.234286993753921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae181c60d4996b1%3A0x4f97378d92a64!2zVEhFIOC2p-C3meC2qeC3kyBIb3VzZSBCeSBSYW1tdXRodQ!5e0!3m2!1sen!2slk!4v1718291374955!5m2!1sen!2slk" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe></p>
      </div>
   </div>
   
   <div class="col-sm-3 col-sm-offset-1">
    <div class="single-widget">
        <h2>Secured Payment Options </h2>
        <!-- Replace the form with an image -->
        <img src="images/About/Ab7.png" alt="" style="width: 10%; height: auto;">
       
    </div>
</div>
   
   <div class="footer-bottom">
      <p>&copy; 2024 THE ටෙඩි HOUSE. Designed by <span>W3 Developers</span></p>
   </div>
</footer>

<style>
   .map-section {
      text-align: center;
   }
   .map-container {
      max-width: 300px;
      margin: 0 auto;
   }
   .map-container iframe {
      width: 100%;
      height: 100px; /* Adjust the height as needed */
   }
</style>


<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
