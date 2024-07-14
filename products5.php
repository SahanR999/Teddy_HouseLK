<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_description = $_POST['product_description'];
   $product_colors = $_POST['product_colors'];
   $product_size = $_POST['product_size'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND colors = '$product_colors' AND size = '$product_size'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'Product already added to cart';
   } else {
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, description, colors, size, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_description', '$product_colors', '$product_size', '$product_quantity')");
      $message[] = 'Product added to cart successfully';
   }

}

if(isset($_POST['add_to_wishlist'])){
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_description = $_POST['product_description'];
    $product_colors = $_POST['product_colors'];
    $product_size = $_POST['product_size'];

    $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND colors = '$product_colors' AND size = '$product_size'");

    if(mysqli_num_rows($select_wishlist) > 0){
        $message[] = 'Product already added to wishlist';
    } else {
        $insert_wishlist = mysqli_query($conn, "INSERT INTO `wishlist`(name, price, image, description, colors, size) VALUES('$product_name', '$product_price', '$product_image', '$product_description', '$product_colors', '$product_size')");
        $message[] = 'Product added to wishlist successfully';
    }
   
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Special GiftPacks</title>

   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

 <style>
      :root {
         --orange: #ff5722;
         --white: #fff;
         --black: #333;
         --blue: #0099cc;
         --bg-color: #f7f7f7;
         --box-shadow: 0 4px 8px rgba(0,0,0,0.1);
         --border: 1px solid #ddd;
         --dark-bg: rgba(0,0,0,0.7);
      }

      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         background-color: var(--bg-color);
      }

      .container {
         max-width: 1200px;
         margin: 0 auto;
         padding: 20px;
      }

      .heading {
         text-align: center;
         margin-bottom: 20px;
         color: var(--black);
         font-size: 2em;
         text-transform: uppercase;
      }

      .products .box-container {
         display: grid;
         grid-template-columns: repeat(auto-fit, 35rem);
         gap: 1.5rem;
         justify-content: center;
      }

      .products .box-container .box {
         text-align: center;
         padding: 2rem;
         box-shadow: var(--box-shadow);
         border: var(--border);
         border-radius: .5rem;
         background: var(--white);
         transition: transform 0.3s;
         animation: fadeIn 1s;
      }

      .products .box-container .box:hover {
         transform: translateY(-10px);
      }

      .products .box-container .box img {
         height: 25rem;
         border-radius: 10px;
         transition: transform 0.3s;
      }

      .products .box-container .box:hover img {
         transform: scale(1.05);
      }

      .products .box-container .box h3 {
         margin: 1rem 0;
         font-size: 2.5rem;
         color: var(--black);
      }

      .products .box-container .box .price {
         font-size: 2.5rem;
         color: var(--black);
      }

      .products .box-container .box select {
         width: 100%;
         padding: 10px;
         margin-bottom: 15px;
         border: 1px solid #ccc;
         border-radius: 5px;
      }

      .products .box-container .box .btn {
         background: var(--orange);
         color: var(--white);
         border: none;
         padding: 10px 20px;
         cursor: pointer;
         border-radius: 5px;
         transition: background 0.3s;
      }

      .products .box-container .box .btn:hover {
         background: #e64a19;
      }

      .message {
         background: #f0c14b;
         color: #111;
         padding: 10px;
         border-radius: 5px;
         margin: 10px 0;
         display: flex;
         justify-content: space-between;
         align-items: center;
      }

      .message i {
         cursor: pointer;
      }

      @keyframes fadeIn {
         from { opacity: 0; transform: translateY(20px); }
         to { opacity: 1; transform: translateY(0); }
      }

      .header {
         background-color: var(--orange);
         position: sticky;
         top: 0; left: 0;
         z-index: 1000;
      }

      .header .flex {
         display: flex;
         align-items: center;
         padding: 1.5rem 2rem;
         max-width: 1200px;
         margin: 0 auto;
      }

      .header .flex .logo {
         margin-right: auto;
         font-size: 2.5rem;
         color: var(--white);
      }

      .header .flex .navbar a {
         margin-left: 2rem;
         font-size: 2rem;
         color: var(--white);
      }

      .header .flex .navbar a:hover {
         color: yellow;
      }

      .header .flex .cart {
         margin-left: 2rem;
         font-size: 2rem;
         color: var(--white);
      }

      .header .flex .cart:hover {
         color: yellow;
      }

      .header .flex .cart span {
         padding: .1rem .5rem;
         border-radius: .5rem;
         background-color: var(--white);
         color: var(--blue);
         font-size: 2rem;
      }

      #menu-btn {
         margin-left: 2rem;
         font-size: 3rem;
         cursor: pointer;
         color: var(--white);
         display: none;
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

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   }
}

?>

<?php include 'header2.php'; ?>

<div class="container">

<section class="products">

   <h1 class="heading">SPECIAL GIFT PACK</h1>

   <div class="box-container">

      <?php
      // Perform the query
      $select_products = mysqli_query($conn, "SELECT * FROM `products5`");
      
      // Check if the query was successful
      if ($select_products) {
          // Check if there are any rows returned
          if (mysqli_num_rows($select_products) > 0) {
              // Fetch and display the products
              while ($fetch_product = mysqli_fetch_assoc($select_products)) {
      ?>
                  <form action="" method="post">
                      <div class="box">
                          <img src="uploaded_img/<?php echo htmlspecialchars($fetch_product['image']); ?>" alt="">
                          <h3><?php echo htmlspecialchars($fetch_product['name']); ?></h3>
                          <div class="price">LKR<?php echo htmlspecialchars($fetch_product['price']); ?>/-</div>
                          <p><?php echo htmlspecialchars($fetch_product['description']); ?></p>
                          <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($fetch_product['name']); ?>">
                          <input type="hidden" name="product_price" value="<?php echo htmlspecialchars($fetch_product['price']); ?>">
                          <input type="hidden" name="product_image" value="<?php echo htmlspecialchars($fetch_product['image']); ?>">
                          <input type="hidden" name="product_description" value="<?php echo htmlspecialchars($fetch_product['description']); ?>">
                          <label for="colors">Color:</label>
                          <select name="product_colors" required>
                              <?php
                              $colors = explode(',', $fetch_product['colors']);
                              foreach($colors as $color){
                                  echo "<option value='".htmlspecialchars($color)."'>".htmlspecialchars($color)."</option>";
                              }
                              ?>
                          </select>
                          <label for="size">Size:</label>
                          <select name="product_size" required>
                              <?php
                              $sizes = explode(',', $fetch_product['size']);
                              foreach($sizes as $size){
                                  echo "<option value='".htmlspecialchars($size)."'>".htmlspecialchars($size)."</option>";
                              }
                              ?>
                          </select>
                          <input type="submit" class="btn" value="Add to Cart" name="add_to_cart">
						  <input type="submit" class="btn" value="Add to Wishlist" name="add_to_wishlist">
                      </div>
                  </form>
      <?php
              }
          } else {
              // No products found
              echo "No products found.";
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
