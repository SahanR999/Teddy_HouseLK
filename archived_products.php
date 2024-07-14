<?php
session_start();

@include 'config.php';

// Function to display messages
function displayMessage($messages) {
    foreach($messages as $message) {
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}

// Restore Product Logic
if(isset($_GET['restore'])) {
    $restore_id = $_GET['restore'];

    $archive_query = mysqli_query($conn, "SELECT * FROM `archived_products` WHERE id = $restore_id");
    if(mysqli_num_rows($archive_query) > 0){
        $archived_product = mysqli_fetch_assoc($archive_query);
        $restore_category = $archived_product['category'];

        $restore_query = mysqli_query($conn, "INSERT INTO `$restore_category`(name, price, description, colors, size, image) VALUES('{$archived_product['name']}', '{$archived_product['price']}', '{$archived_product['description']}', '{$archived_product['colors']}', '{$archived_product['size']}', '{$archived_product['image']}')");

        if($restore_query){
            mysqli_query($conn, "DELETE FROM `archived_products` WHERE id = $restore_id");
            $message[] = 'Product restored successfully';
            header('location:archived_products.php?restore_success=true');
            exit();
        } else {
            $message[] = 'Product could not be restored';
        }
    }
}

// Delete Product Logic
if(isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $delete_query = mysqli_query($conn, "DELETE FROM `archived_products` WHERE id = $delete_id");

    if($delete_query){
        $message[] = 'Product deleted successfully';
        header('location:archived_products.php?delete_success=true');
        exit();
    } else {
        $message[] = 'Product could not be deleted';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Archived Products</title>
   
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   
   <style>
       /* Add styles for the archived products table */
       .container {
           width: 90%;
           max-width: 1200px;
           margin: 20px auto;
           background-color: #fff;
           border-radius: 8px;
           box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
           padding: 20px;
       }

       .display-archived-product-table {
           margin-top: 20px;
       }

       .display-archived-product-table h3 {
           text-align: center;
           margin-bottom: 20px;
           font-size: 2em;
           color: #333;
       }

       .display-archived-product-table table {
           width: 100%;
           border-collapse: collapse;
           margin: 0 auto;
           box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
       }

       .display-archived-product-table th, .display-archived-product-table td {
           padding: 15px;
           text-align: left;
           border: 1px solid #ddd;
       }

       .display-archived-product-table th {
           background-color: #f4f4f4;
           font-weight: bold;
       }

       .display-archived-product-table td img {
           width: 100px;
           height: auto;
           border-radius: 5px;
       }

       .display-archived-product-table .restore-btn, .display-archived-product-table .delete-btn {
           text-decoration: none;
           padding: 8px 12px;
           border: 1px solid;
           border-radius: 4px;
           transition: 0.3s;
           display: inline-block;
       }

       .display-archived-product-table .restore-btn {
           color: green;
           border-color: green;
       }

       .display-archived-product-table .restore-btn:hover {
           background-color: green;
           color: #fff;
       }

       .display-archived-product-table .delete-btn {
           color: red;
           border-color: red;
       }

       .display-archived-product-table .delete-btn:hover {
           background-color: red;
           color: #fff;
       }

       .empty {
           text-align: center;
           color: #999;
           font-size: 1.2em;
           padding: 20px;
       }

       .message {
           background-color: #f2dede;
           color: #a94442;
           padding: 10px;
           margin-bottom: 10px;
           border-radius: 5px;
           display: flex;
           align-items: center;
           justify-content: space-between;
       }

       .message span {
           flex: 1;
       }

       .message i {
           cursor: pointer;
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

<?php
// Display messages if any
if(isset($message)) {
    displayMessage($message);
}
?>

<?php include 'header.php'; ?>

<div class="container">

   <section class="display-archived-product-table">

       <h3>Archived Products</h3>
       <table>
           <thead>
               <tr>
                   <th>Product Image</th>
                   <th>Product Name</th>
                   <th>Product Price</th>
                   <th>Product Description</th>
                   <th>Product Colors</th>
                   <th>Product Size</th>
                   <th>Archived At</th>
                   <th>Action</th>
               </tr>
           </thead>
           <tbody>
               <?php
               $select_archived_products = mysqli_query($conn, "SELECT * FROM `archived_products`");
               if(mysqli_num_rows($select_archived_products) > 0){
                   while($row = mysqli_fetch_assoc($select_archived_products)){
               ?>
               <tr>
                   <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
                   <td><?php echo $row['name']; ?></td>
                   <td>LKR <?php echo $row['price']; ?>/-</td>
                   <td><?php echo $row['description']; ?></td>
                   <td><?php echo $row['colors']; ?></td>
                   <td><?php echo $row['size']; ?></td>
                   <td><?php echo date('M j, Y', strtotime($row['archived_at'])); ?></td>
                   <td>
                       <a href="archived_products.php?restore=<?php echo $row['id']; ?>" class="restore-btn" onclick="return confirm('Are you sure you want to restore this product?');"><i class="fas fa-undo"></i> Restore</a>
                       <a href="archived_products.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this product?');"><i class="fas fa-trash"></i> Delete</a>
                   </td>
               </tr>
               <?php
                   }
               } else {
                   echo '<tr><td colspan="8" class="empty">No archived products found</td></tr>';
               }
               ?>
           </tbody>
       </table>

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
