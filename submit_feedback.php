<?php
// Include configuration and database connection
include 'config.php';

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $insert_feedback = mysqli_query($conn, "INSERT INTO feedback_db (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')");

    if ($insert_feedback) {
        // Redirect to a thank you page or back to the form with a success message
        header('Location: submit_feedback.php');
        exit;
    } else {
        echo "Failed to submit feedback.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Submit Feedback</title>
   
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

      .feedback-form {
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

      .form-group input, .form-group textarea {
         width: 100%;
         padding: 10px;
         border: 1px solid #ddd;
         border-radius: 4px;
      }

      .form-group textarea {
         resize: vertical;
         height: 150px;
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

   <h1 class="heading">Submit Feedback</h1>

   <section class="feedback-form">

      <form action="submit_feedback.php" method="POST">
         <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
         </div>
         <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" required>
         </div>
         <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" required>
         </div>
         <div class="form-group">
            <label for="message">Message</label>
            <textarea name="message" id="message" required></textarea>
         </div>
         <button type="submit" class="submit-btn">Submit</button>
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
