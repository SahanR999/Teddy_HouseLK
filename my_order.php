<?php

// Include configuration and database connection
include 'config.php';

// Handle order tracking form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order_submit'])) {
    $order_id = $conn->real_escape_string($_POST['order_id']);
    $result = mysqli_query($conn, "SELECT * FROM `Order` WHERE order_id = '$order_id'");

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $order = mysqli_fetch_assoc($result);
            $order_status = $order['status'];
        } else {
            $order_status = "Order not found.";
        }
    } else {
        // Check if the error is due to the table not existing
        if (mysqli_errno($conn) == 1146) {
            $order_status = "The Order table does not exist. Please check your database setup.";
        } else {
            $order_status = "Query failed: " . mysqli_error($conn);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Track Order</title>
   
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      /* Your existing CSS */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background-color: #f0f0f0;
         line-height: 1.6;
         animation: fadeIn 1s ease-in-out;
      }

      .container {
         width: 90%;
         max-width: 1200px;
         margin: 20px auto;
         background-color: #fff;
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         overflow: hidden;
         animation: slideIn 0.5s ease-in-out;
      }

      @keyframes fadeIn {
         from { opacity: 0; }
         to { opacity: 1; }
      }

      @keyframes slideIn {
         from { transform: translateY(20px); }
         to { transform: translateY(0); }
      }

      .heading {
         font-size: 24px;
         color: #333;
         padding: 20px;
         border-bottom: 1px solid #ddd;
      }

      .track-order-form {
         padding: 20px;
      }

      .form-group {
         margin-bottom: 20px;
      }

      .form-group label {
         display: block;
         margin-bottom: 5px;
         font-weight: bold;
         color: #333;
      }

      .form-group input {
         width: 100%;
         padding: 10px;
         border: 1px solid #ddd;
         border-radius: 4px;
      }

      .submit-btn {
         display: inline-block;
         padding: 10px 20px;
         background-color: #333;
         color: #fff;
         border: none;
         border-radius: 4px;
         cursor: pointer;
         transition: background-color 0.3s ease;
      }

      .submit-btn:hover {
         background-color: #555;
      }

      .order-status {
         margin-top: 20px;
         padding: 20px;
         background-color: #f9f9f9;
         border: 1px solid #ddd;
         border-radius: 4px;
      }

      .order-status p {
         margin: 0;
         font-size: 1.2rem;
         color: #333;
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

<?php include 'header2.php'; ?>

<div class="container">
   <h1 class="heading">Track Your Order</h1>

   <section class="track-order-form">
      <form action="my_order.php" method="POST">
         <div class="form-group">
            <label for="order_id">Order ID</label>
            <input type="text" name="order_id" id="order_id" required>
         </div>
         <button type="submit" name="order_submit" class="submit-btn">Track Order</button>
      </form>

      <?php if (isset($order_status)): ?>
      <div class="order-status">
         <p>Order Status: <?php echo htmlspecialchars($order_status); ?></p>
      </div>
      <?php endif; ?>
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
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2231607776243!2d80.05189657482919!3d6.234286993753921!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae181c60d4996b1%3A0x4f97378d92a64!2zVEhFIOC2p-C3meC2qeC3kyBIb3VzZSBCeSBSYW1tdXRodQ!5e0!3m2!1sen!2slk!4v1718291374955!5m2!1sen!2slk" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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

</body>
</html>
