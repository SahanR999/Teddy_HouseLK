<?php

@include 'config.php';

// Update product quantity in cart
if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
      exit(); // Exit after header redirect
   }
}

// Remove a product from cart
if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
   header('location:cart.php');
   exit(); // Exit after header redirect
}

// Delete all products from cart
if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM `cart`");
   header('location:cart.php');
   exit(); // Exit after header redirect
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>

   <!-- Font awesome CDN link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link  -->
   <link rel="stylesheet" href="css/style.css">
   
   <style>
   
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

<?php include 'header2.php'; ?>

<div class="container">
   <section class="shopping-cart">
      <h1 class="heading">Shopping Cart</h1>
      <table>
         <thead>
            <tr>
               <th>Image</th>
               <th>Name</th>
               <th>Description</th>
               <th>Color</th>
               <th>Size</th>
               <th>Price</th>
               <th>Quantity</th>
               <th>Total Price</th>
               <th>Action</th>
            </tr>
         </thead>
         <tbody>
            <?php 
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
            $grand_total = 0;

            if ($select_cart && mysqli_num_rows($select_cart) > 0) {
               while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
                  $sub_total = intval($fetch_cart['price']) * intval($fetch_cart['quantity']);
                  $grand_total += $sub_total;
            ?>
            <tr>
               <td><img src="uploaded_img/<?php echo htmlspecialchars($fetch_cart['image']); ?>" height="100" alt=""></td>
               <td><?php echo htmlspecialchars($fetch_cart['name']); ?></td>
               <td><?php echo htmlspecialchars($fetch_cart['description']); ?></td>
               <td><?php echo htmlspecialchars($fetch_cart['colors']); ?></td>
               <td><?php echo htmlspecialchars($fetch_cart['size']); ?></td>
               <td>LKR<?php echo number_format($fetch_cart['price']); ?>/-</td>
               <td>
                  <form action="" method="post">
                     <input type="hidden" name="update_quantity_id" value="<?php echo htmlspecialchars($fetch_cart['id']); ?>">
                     <input type="number" name="update_quantity" min="1" value="<?php echo htmlspecialchars($fetch_cart['quantity']); ?>">
                     <input type="submit" value="update" name="update_update_btn">
                  </form>
               </td>
               <td>LKR<?php echo number_format($sub_total); ?>/-</td>
               <td><a href="cart.php?remove=<?php echo htmlspecialchars($fetch_cart['id']); ?>" onclick="return confirm('Remove item from cart?')" class="delete-btn"> <i class="fas fa-trash"></i> remove</a></td>
            </tr>
            <?php
               }
            } else {
               echo "<tr><td colspan='9'>No items in the cart.</td></tr>";
            }
            ?>
            <tr class="table-bottom">
               <td><a href="products.php" class="option-btn" style="margin-top: 0;">Continue Shopping</a></td>
               <td colspan="6">Grand Total</td>
               <td>LKR<?php echo number_format($grand_total); ?>/-</td>
               <td><a href="cart.php?delete_all" onclick="return confirm('Are you sure you want to delete all?');" class="delete-btn"> <i class="fas fa-trash"></i> delete all </a></td>
            </tr>
         </tbody>
      </table>

      <div class="checkout-btn">
         <a href="checkout.php" class="btn <?= ($grand_total > 1)?'':'disabled'; ?>">Proceed to Checkout</a>
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




<!-- Custom JS file link  -->
<script src="js/script.js"></script>

</body>
</html>
