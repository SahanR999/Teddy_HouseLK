<?php
@include 'config.php';

if(isset($_POST['order_btn'])){

   $name = $_POST['name'];
   $number = $_POST['number'];
   $email = $_POST['email'];
   $method = $_POST['method'];
   $flat = $_POST['flat'];
   $street = $_POST['street'];
   $city = $_POST['city'];
   $state = $_POST['state'];
   $country = $_POST['country'];
   $order_date = date('Y-m-d H:i:s');
   $delivery_date = $_POST['delivery_date']; // New delivery date field
   
   $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
   $price_total = 0;
   $product_name = [];

   if(mysqli_num_rows($cart_query) > 0){
      while($product_item = mysqli_fetch_assoc($cart_query)){
         $product_name[] = $product_item['name'] .' ('. $product_item['quantity'] .') ';

         $product_price = floatval($product_item['price']);
         $product_quantity = intval($product_item['quantity']);

         $total_price = $product_price * $product_quantity;
         $price_total += $total_price;
      }
   }

   $total_product = implode(', ',$product_name);

   $detail_query = mysqli_query($conn, "INSERT INTO `order` (name, number, email, method, flat, street, city, state, country, order_date, delivery_date, total_products, total_price) VALUES ('$name','$number','$email','$method','$flat','$street','$city','$state','$country','$order_date','$delivery_date','$total_product','$price_total')") or die('Query failed');

   if($detail_query){
      $order_id = mysqli_insert_id($conn);

      mysqli_query($conn, "DELETE FROM `cart`");

      echo "
<div class='order-message-container active'>
    <div class='message-container'>
        <h3>Thank you for shopping!</h3>
        <div class='order-detail'>
            <span>$total_product</span>
            <span class='total'>Total: LKR $price_total/-</span>
        </div>
        <div class='customer-details'>
            <p>Your name: <span>$name</span></p>
            <p>Your number: <span>$number</span></p>
            <p>Your email: <span>$email</span></p>
            <p>Your address: <span>$flat, $street, $city, $state, $country</span></p>
            <p>Your payment mode: <span>$method</span></p>
            <p>Your order ID: <span>$order_id</span></p>
            <p>Your delivery date: <span>$delivery_date</span></p>
            <p>(*Pay when product arrives*)</p>
        </div>
        <a href='products.php' class='btn'>Continue shopping</a>
    </div>
</div>";
   }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Checkout</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <style>
      /* Your existing styles */
      body {
         font-family: 'Poppins', sans-serif;
         margin: 0;
         padding: 0;
         background: #f3f4f6;
      }
      .container {
         width: 80%;
         margin: auto;
         overflow: hidden;
      }
      .checkout-form {
         background: #fff;
         padding: 30px;
         border-radius: 10px;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
      }
      .heading {
         font-size: 2.5rem;
         margin-bottom: 20px;
         color: #333;
         text-align: center;
      }
      .display-order {
         margin-bottom: 20px;
         background: #f9fafb;
         padding: 15px;
         border-radius: 10px;
      }
      .display-order span {
         display: block;
         font-size: 1.1rem;
         margin: 5px 0;
      }
      .grand-total {
         font-size: 1.5rem;
         color: #ff7f50;
      }
      .flex {
         display: flex;
         flex-wrap: wrap;
         gap: 20px;
      }
      .inputBox {
         flex: 1;
         min-width: 250px;
         margin-bottom: 20px;
      }
      .inputBox span {
         font-size: 1rem;
         color: #333;
         margin-bottom: 5px;
         display: block;
      }
      .inputBox input, .inputBox select {
         width: 100%;
         padding: 10px;
         border: 1px solid #ccc;
         border-radius: 5px;
         font-size: 1rem;
         color: #333;
      }
      .btn {
         display: inline-block;
         background: #ff7f50;
         color: #fff;
         padding: 10px 20px;
         border: none;
         border-radius: 5px;
         font-size: 1rem;
         cursor: pointer;
         transition: background 0.3s;
      }
      .btn:hover {
         background: #ff4f30;
      }
      .order-message-container {
         display: flex;
         justify-content: center;
         align-items: center;
         min-height: 100vh;
         background: rgba(0, 0, 0, 0.5);
         position: fixed;
         top: 0;
         left: 0;
         width: 100%;
         height: 100%;
         z-index: 9999;
      }
      .order-message-container.active {
         display: flex;
      }
      .message-container {
         background: #fff;
         padding: 30px;
         border-radius: 10px;
         text-align: center;
         animation: slideIn 0.5s ease forwards;
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
      .map-section {
         text-align: center;
      }
      .map-container {
         max-width: 300px;
         margin: 0 auto;
      }
      .map-container iframe {
         width: 100%;
         height: 300px;
         border: 0;
      }
   </style>

   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php include 'header3.php'; ?>

<div class="container">

<section class="checkout-form">

   <h1 class="heading">Complete Your Order</h1>

   <form action="" method="post">

      <div class="display-order">
         <?php
         $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
         $grand_total = 0;

         if ($select_cart && mysqli_num_rows($select_cart) > 0) {
            while ($fetch_cart = mysqli_fetch_assoc($select_cart)) {
               $total_price = floatval($fetch_cart['price']) * intval($fetch_cart['quantity']);
               $grand_total += $total_price;
         ?>
         <span><?= htmlspecialchars($fetch_cart['name']); ?>(<?= htmlspecialchars($fetch_cart['quantity']); ?>)</span>
         <?php
            }
         } else {
            echo "<div class='display-order'><span>Your cart is empty!</span></div>";
         }
         ?>
         <span class="grand-total">Grand Total: LKR<?= number_format($grand_total); ?>/-</span>
      </div>

      <div class="flex">
         <div class="inputBox">
            <span>Your Name</span>
            <input type="text" placeholder="Enter your name" name="name" required>
         </div>
         <div class="inputBox">
            <span>Your Number</span>
            <input type="number" placeholder="Enter your number" name="number" required>
         </div>
         <div class="inputBox">
            <span>Your Email</span>
            <input type="email" placeholder="Enter your email" name="email" required>
         </div>
         <div class="inputBox">
            <span>Payment Method</span>
            <select name="method">
               <option value="cash on delivery" selected>Cash on Delivery</option>
               <option value="credit card">Credit Card</option>
               <option value="paypal">PayPal</option>
            </select>
         </div>
         <div class="inputBox">
            <span>Address Line 1</span>
            <input type="text" placeholder="E.g. Flat No." name="flat" required>
         </div>
         <div class="inputBox">
            <span>Address Line 2</span>
            <input type="text" placeholder="E.g. Street Name" name="street" required>
         </div>
         <div class="inputBox">
            <span>City</span>
            <input type="text" placeholder="E.g. Colombo" name="city" required>
         </div>
         <div class="inputBox">
            <span>State</span>
            <input type="text" placeholder="E.g. Western Province" name="state" required>
         </div>
         <div class="inputBox">
            <span>Country</span>
            <input type="text" placeholder="E.g. Sri Lanka" name="country" required>
         </div>
      </div>
	  <div class="inputBox">
   <span>Delivery Date</span>
   <input type="date" name="delivery_date" required>
</div>


      <input type="submit" value="Order Now" name="order_btn" class="btn">
   </form>

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

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
