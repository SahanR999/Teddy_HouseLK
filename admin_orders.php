<?php
// Include configuration and database connection
include 'config.php';

// Fetch orders from the database
$select_orders = mysqli_query($conn, "SELECT * FROM `order` ORDER BY order_date DESC");

// Check for query execution success
if (!$select_orders) {
    die('MySQL Error: ' . mysqli_error($conn));
}

// Handle order deletion
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['order_id'])) {
    $order_id = $_GET['order_id'];
    $delete_query = mysqli_query($conn, "DELETE FROM `order` WHERE id = $order_id");

    if ($delete_query) {
        // Redirect back to refresh the list after deletion
        header('Location: admin_orders.php');
        exit;
    } else {
        echo "Failed to delete order.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Orders</title>
   
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">

   <style>
      /* Reset and general styles */
      * {
         margin: 0;
         padding: 0;
         box-sizing: border-box;
      }

      body {
         font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
         background-color: #f0f0f0;
         line-height: 1.6;
      }

      .container {
         width: 90%;
         max-width: 1200px;
         margin: 20px auto;
         background-color: #fff;
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
         overflow: hidden;
      }

      .heading {
         font-size: 24px;
         color: #333;
         padding: 20px;
         border-bottom: 1px solid #ddd;
      }

      .display-order-table {
         padding: 20px;
         overflow-x: auto;
      }

      table {
         width: 100%;
         border-collapse: collapse;
         border-radius: 8px;
         overflow: hidden;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      }

      table th, table td {
         padding: 12px 15px;
         text-align: left;
         border-bottom: 1px solid #ddd;
      }

      table th {
         background-color: #333;
         color: #fff;
      }

      table tbody tr:hover {
         background-color: #f9f9f9;
      }

      .no-orders {
         text-align: center;
         padding: 20px;
         font-size: 18px;
         color: #555;
      }

      .action-buttons {
         display: flex;
         justify-content: center;
         gap: 10px;
         margin-top: 10px;
      }

      .action-buttons a {
         display: inline-block;
         padding: 8px 12px;
         text-decoration: none;
         color: #333;
         background-color: #f0f0f0;
         border: 1px solid #ccc;
         border-radius: 4px;
         transition: background-color 0.3s ease;
      }

      .action-buttons a:hover {
         background-color: #e0e0e0;
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

<?php include 'header.php'; ?>

<div class="container">

   <h1 class="heading">Admin Orders</h1>

   <section class="display-order-table">

      <?php if(mysqli_num_rows($select_orders) > 0): ?>
         <table>
            <thead>
               <tr>
                  <th>Order ID</th>
                  <th>Name</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Payment Method</th>
                  <th>Products</th>
                  <th>Total Price</th>
                  <th>Date</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php while($row = mysqli_fetch_assoc($select_orders)): ?>
                  <tr>
                     <td><?php echo htmlspecialchars($row['id']); ?></td>
                     <td><?php echo htmlspecialchars($row['name']); ?></td>
                     <td><?php echo htmlspecialchars($row['number']); ?></td>
                     <td><?php echo htmlspecialchars($row['email']); ?></td>
                     <td><?php echo htmlspecialchars($row['flat'] . ', ' . $row['street']  ); ?></td>
                     <td><?php echo htmlspecialchars($row['method']); ?></td>
                     <td><?php echo htmlspecialchars($row['total_products']); ?></td>
                     <td>LKR <?php echo number_format($row['total_price'], 2); ?></td>
                     <td><?php echo date('M j, Y H:i:s', strtotime($row['order_date'])); ?></td>
                     <td class="action-buttons">
                        <a href="edit_order.php?order_id=<?php echo $row['id']; ?>">Edit</a>
                        <a href="#" onclick="confirmDelete(<?php echo $row['id']; ?>)">Delete</a>
                     </td>
                  </tr>
               <?php endwhile; ?>
            </tbody>
         </table>
      <?php else: ?>
         <p class="no-orders">No orders found</p>
      <?php endif; ?>

   </section>

</div>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

<script>
   function confirmDelete(orderId) {
      if (confirm("Are you sure you want to delete this order?")) {
         window.location.href = 'admin_orders.php?action=delete&order_id=' + orderId;
      }
   }
</script>


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


</body>
</html>
