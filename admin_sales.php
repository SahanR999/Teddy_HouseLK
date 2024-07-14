<?php
include 'config.php';

// Fetch data from the database
$select_sales = mysqli_query($conn, "SELECT * FROM daily_sales ORDER BY order_date ASC");

// Initialize arrays to store data for charting
$date_labels = [];
$total_sales_data = [];
$total_income_data = [];
$total_profit_data = [];

if ($select_sales && mysqli_num_rows($select_sales) > 0) {
    while ($row = mysqli_fetch_assoc($select_sales)) {
        $date_labels[] = date('M j', strtotime($row['order_date']));
        $total_sales_data[] = (float) $row['total_sales'];
        $total_income_data[] = (float) $row['total_income'];
        $total_profit_data[] = (float) $row['total_income'] - (float) $row['total_sales'] * 0.2; // Assuming 20% cost of goods sold
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Sales Dashboard</title>

   <!-- Chart.js -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

   <!-- Custom CSS -->
   <style>
      body {
         font-family: Arial, sans-serif;
         background-color: #f0f0f0;
         padding: 20px;
      }
      .chart-container {
         width: 80%;
         margin: auto;
         background-color: #fff;
         padding: 20px;
         border-radius: 8px;
         box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

<div class="chart-container">
   <canvas id="salesChart"></canvas>
</div>

<script>
   // Chart.js configuration
   var ctx = document.getElementById('salesChart').getContext('2d');
   var salesChart = new Chart(ctx, {
      type: 'line',
      data: {
         labels: <?= json_encode($date_labels); ?>,
         datasets: [{
            label: 'Total Sales',
            data: <?= json_encode($total_sales_data); ?>,
            borderColor: 'blue',
            backgroundColor: 'rgba(0, 0, 255, 0.1)',
            borderWidth: 2,
            fill: true
         }, {
            label: 'Total Income',
            data: <?= json_encode($total_income_data); ?>,
            borderColor: 'green',
            backgroundColor: 'rgba(0, 255, 0, 0.1)',
            borderWidth: 2,
            fill: true
         }, {
            label: 'Total Profit',
            data: <?= json_encode($total_profit_data); ?>,
            borderColor: 'orange',
            backgroundColor: 'rgba(255, 165, 0, 0.1)',
            borderWidth: 2,
            fill: true
         }]
      },
      options: {
         responsive: true,
         plugins: {
            legend: {
               position: 'top',
            },
            tooltip: {
               mode: 'index',
               intersect: false
            }
         },
         scales: {
            x: {
               display: true,
               title: {
                  display: true,
                  text: 'Date'
               }
            },
            y: {
               display: true,
               title: {
                  display: true,
                  text: 'Amount (LKR)'
               }
            }
         }
      }
   });
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
