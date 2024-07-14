<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Enhanced Header</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <style>
      body {
         font-family: Arial, sans-serif;
         margin: 0;
         padding: 0;
         background-color: #f4f4f4;
      }

      .header {
         background: linear-gradient(90deg, rgba(255, 102, 0, 1) 0%, rgba(255, 153, 0, 1) 100%);
         padding: 15px 30px;
         display: flex;
         justify-content: space-between;
         align-items: center;
         box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
         position: relative;
      }

      .header .flex {
         display: flex;
         align-items: center;
         justify-content: space-between;
         width: 100%;
      }

      .header .logo {
         display: flex;
         align-items: center;
         text-decoration: none;
         color: #fff;
         font-size: 24px;
         font-weight: bold;
      }

      .header .logo img {
         margin-right: 10px;
         border-radius: 50%;
         height: 50px;
      }

      .header .navbar {
         display: flex;
         align-items: center;
      }

      .header .navbar a {
         text-decoration: none;
         color: #fff;
         padding: px 20px;
         border-radius: 5px;
         transition: background-color 0.3s, transform 0.3s;
         margin: 0 5px;
         font-size: 16px;
      }

      .header .navbar a:hover {
         background-color: rgba(255, 255, 255, 0.2);
         transform: scale(1.05);
      }

      .header .cart {
         text-decoration: none;
         color: #fff;
         padding: 10px 20px;
         background-color: #f39c12;
         border-radius: 5px;
         transition: background-color 0.3s, transform 0.3s;
         font-size: 16px;
      }

      .header .cart:hover {
         background-color: #e67e22;
         transform: scale(1.05);
      }

      #menu-btn {
         color: #fff;
         font-size: 24px;
         cursor: pointer;
         display: none; /* Hide the menu button initially */
         transition: transform 0.3s;
      }

      @media (max-width: 768px) {
         .header .navbar {
            display: none;
         }

         #menu-btn {
            display: block;
         }

         .header .navbar {
            flex-direction: column;
            width: 100%;
            background-color: #333;
            position: absolute;
            top: 60px;
            left: 0;
            z-index: 1000;
         }

         .header .navbar a {
            margin: 5px 0;
            width: 100%;
            text-align: center;
         }

         #menu-btn.active + .navbar {
            display: flex;
         }
      }

      #menu-btn.active {
         transform: rotate(90deg);
      }
   </style>
</head>
<body>

<header class="header">
   <div class="flex">
      <a href="index.php" class="logo">
         <img src="images/home/OIP.png" alt="">
         THE ටෙඩි HOUSE
      </a>

      <div id="menu-btn" class="fas fa-bars"></div>

      <nav class="navbar">
         <a href="products.php">TEDDIES</a>
         <a href="products2.php">CHOCOLATES</a>
         <a href="products3.php">CAKES</a>
         <a href="products4.php">BIRTHDAY</br>SURPRISES</a>
         <a href="products5.php">SPECIAL</br>GIFT</br>PACK</a>
         <a href="products6.php">OTHERS</a>
		 <a href="my_order.php">MY ORDERS</a>
		 <a href="submit_feedback.php">FEEDBACK</a>
		 <a href="wishlist.php">WISHLIST</a>
      </nav>

      <?php
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);
      ?>

      <a href="cart.php" class="cart">Cart <span><?php echo $row_count; ?></span></a>
   </div>
</header>

<script>
   document.getElementById('menu-btn').addEventListener('click', function() {
      this.classList.toggle('active');
      document.querySelector('.navbar').classList.toggle('active');
   });
</script>

</body>
</html>
