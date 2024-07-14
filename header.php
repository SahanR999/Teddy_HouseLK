<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>THE ටෙඩි HOUSE </title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <style>
      body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
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
      }

      .header .flex {
         display: flex;
         align-items: center;
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
         margin-right: 20px;
         height: 60px;
      }

      .header .navbar ul {
         list-style-type: none;
         margin: 0;
         padding: 0;
         display: flex;
         align-items: center;
      }

      .header .navbar ul li {
         margin: 0 10px;
      }

      .header .navbar ul li a {
         text-decoration: none;
         color: #fff;
         padding: 10px 15px;
         border-radius: 5px;
         display: flex;
         align-items: center;
         transition: background-color 0.3s, transform 0.3s;
         font-size: 16px;
      }

      .header .navbar ul li a i {
         margin-right: 8px;
         font-size: 18px;
      }

      .header .navbar ul li a:hover {
         background-color: rgba(255, 255, 255, 0.2);
         transform: scale(1.05);
      }

      .header .cart {
         text-decoration: none;
         color: #fff;
         padding: 10px 20px;
         background-color: #e67e22;
         border-radius: 5px;
         transition: background-color 0.3s, transform 0.3s;
         font-size: 16px;
      }

      .header .cart:hover {
         background-color: #d35400;
         transform: scale(1.05);
      }

      #menu-btn {
         color: #fff;
         font-size: 24px;
         cursor: pointer;
         display: none;
      }

      @media (max-width: 768px) {
         .header .navbar ul {
            display: none;
         }

         #menu-btn {
            display: block;
         }
      }
   </style>
</head>
<body>

<header class="header">
   <div class="flex">
      <a href="index.php" class="logo">
         <img src="images/home/OIP.png" alt="">
         THE ටෙඩි HOUSE Admin Account
      </a>

      <nav class="navbar">
         <ul>
            <li><a href="admin.php"><i class="fa fa-user"></i> <b>Add Products</b></a></li>
            <li><a href="admin_sales.php"><i class="fa fa-balance-scale" aria-hidden="true"></i> <b>Daily Profit </a></b>
            <li><a href="admin.php"><i class="fa fa-trash" aria-hidden="true"></i> <b>Delete Products</b></a></li>
            <li><a href="admin_orders.php"><i class="fa fa-list-alt" aria-hidden="true"></i> <b>View Orders</b></a></li>
            <li><a href="view_feedback.php"><i class="fa fa-comments" aria-hidden="true"></i> <b>FeedBack</b></a></li>
			<li><a href="archived_products.php"><i class="fa fa-archive" aria-hidden="true"></i> <b>Archived Products</a><b>
			
   
  
         </ul>
      </nav>
   </div>

   <div id="menu-btn" class="fas fa-bars"></div>
</header>

</body>
</html>
