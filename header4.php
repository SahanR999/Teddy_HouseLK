<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Beautiful Admin Navigation</title>
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
         flex-direction: column;
         align-items: center;
         text-decoration: none;
         color: #fff;
         font-size: 24px;
         font-weight: bold;
         text-align: center;
      }

      .header .logo img {
         margin-bottom: 10px;
         border-radius: 50%;
         height: 50px;
      }

      .header .logo span {
         display: block;
      }

      .header .navbar {
         display: flex;
         align-items: center;
      }

      .header .navbar ul {
         list-style-type: none;
         margin: 0;
         padding: 0;
         display: flex;
         align-items: center;
      }

      .header .navbar ul li {
         margin-right: 20px;
      }

      .header .navbar ul li a {
         text-decoration: none;
         color: #fff;
         padding: 10px 20px;
         border-radius: 5px;
         display: flex;
         align-items: center;
         transition: background-color 0.3s, transform 0.3s;
      }

      .header .navbar ul li a:hover {
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
            top: 80px;
            left: 0;
            z-index: 1000;
         }

         .header .navbar ul {
            flex-direction: column;
            width: 100%;
         }

         .header .navbar ul li {
            margin: 10px 0;
         }

         .header .navbar ul li a {
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
         <span>THE ටෙඩි HOUSE</span> 
         <span><i class="fa fa-list-alt" aria-hidden="true"></i> Wishlist</span>
      </a>

      <div id="menu-btn" class="fas fa-bars"></div>

      <nav class="navbar">
         <ul>
            <li><a href="checkout.php"><i class="fa fa-check-square" aria-hidden="true"></i> <b>Checkout</b></a></li>
            <li><a href="cart.php"><i class="fa fa-shopping-cart"></i> <b>View Cart</b></a></li>
         </ul>
      </nav>
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
