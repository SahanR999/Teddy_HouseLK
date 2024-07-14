<?php
session_start();

@include 'config.php';

// Function to display messages
function displayMessage($messages) {
    foreach($messages as $message) {
        echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
    }
}

// Add Product Logic
if(isset($_POST['add_product'])) {
    $p_name = $_POST['p_name'];
    $p_price = $_POST['p_price'];
    $p_description = $_POST['p_description'];
    $p_colors = $_POST['p_colors'];
    $p_size = $_POST['p_size'];
    $p_image = $_FILES['p_image']['name'];
    $p_image_tmp_name = $_FILES['p_image']['tmp_name'];
    $p_image_folder = 'uploaded_img/'.$p_image;
    $p_category = $_POST['p_category'];

    $insert_query = mysqli_query($conn, "INSERT INTO `$p_category`(name, price, description, colors, size, image) VALUES('$p_name', '$p_price', '$p_description', '$p_colors', '$p_size', '$p_image')") or die('query failed');

    if($insert_query){
        move_uploaded_file($p_image_tmp_name, $p_image_folder);
        $message[] = 'Product added successfully';
    } else {
        $message[] = 'Could not add the product';
    }
}

// Archive and Delete Product Logic
if(isset($_GET['delete']) && isset($_GET['category'])) {
    $delete_id = $_GET['delete'];
    $delete_category = $_GET['category'];

    $product_query = mysqli_query($conn, "SELECT * FROM `$delete_category` WHERE id = $delete_id");
    if(mysqli_num_rows($product_query) > 0){
        $product = mysqli_fetch_assoc($product_query);
        
        // Insert into archive table
        $archive_query = mysqli_query($conn, "INSERT INTO `archived_products`(name, price, description, colors, size, image, category) VALUES('{$product['name']}', '{$product['price']}', '{$product['description']}', '{$product['colors']}', '{$product['size']}', '{$product['image']}', '$delete_category')");

        if($archive_query){
            // Delete from original table
            $delete_query = mysqli_query($conn, "DELETE FROM `$delete_category` WHERE id = $delete_id") or die('query failed');
            if($delete_query){
                $message[] = 'Product has been archived and deleted';
                header('location:admin.php?delete_success=true');
                exit();
            } else {
                $message[] = 'Product could not be deleted';
            }
        } else {
            $message[] = 'Product could not be archived';
        }
    }
}

// Update Product Logic
if(isset($_POST['update_product'])) {
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = $_POST['update_p_name'];
    $update_p_price = $_POST['update_p_price'];
    $update_p_description = $_POST['update_p_description'];
    $update_p_colors = $_POST['update_p_colors'];
    $update_p_size = $_POST['update_p_size'];
    $update_p_image = $_FILES['update_p_image']['name'];
    $update_p_image_tmp_name = $_FILES['update_p_image']['tmp_name'];
    $update_p_image_folder = 'uploaded_img/'.$update_p_image;
    $update_p_category = $_POST['update_p_category'];

    $update_query = mysqli_query($conn, "UPDATE `$update_p_category` SET name = '$update_p_name', price = '$update_p_price', description = '$update_p_description', colors = '$update_p_colors', size = '$update_p_size', image = '$update_p_image' WHERE id = '$update_p_id'");

    if($update_query){
        move_uploaded_file($update_p_image_tmp_name, $update_p_image_folder);
        $message[] = 'Product updated successfully';
        header('location:admin.php');
        exit();
    } else {
        $message[] = 'Product could not be updated';
    }
}

// Restore Product Logic
if(isset($_GET['restore'])) {
    $restore_id = $_GET['restore'];

    $archive_query = mysqli_query($conn, "SELECT * FROM `archived_products` WHERE id = $restore_id");
    if(mysqli_num_rows($archive_query) > 0){
        $archived_product = mysqli_fetch_assoc($archive_query);
        $restore_category = $archived_product['category'];

        $restore_query = mysqli_query($conn, "INSERT INTO `$restore_category`(name, price, description, colors, size, image) VALUES('{$archived_product['name']}', '{$archived_product['price']}', '{$archived_product['description']}', '{$archived_product['colors']}', '{$archived_product['size']}', '{$archived_product['image']}')");

        if($restore_query){
            mysqli_query($conn, "DELETE FROM `archived_products` WHERE id = $restore_id");
            $message[] = 'Product restored successfully';
            header('location:admin.php?restore_success=true');
            exit();
        } else {
            $message[] = 'Product could not be restored';
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
   <title>THE ටෙඩි HOUSE</title>
   
   <!-- Font Awesome CDN link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- Custom CSS file link -->
   <link rel="stylesheet" href="css/style.css">
   
   <style>
   /* Add this to your existing CSS file (css/style.css) */

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

<?php
// Display messages if any
if(isset($message)) {
    displayMessage($message);
}
?>

<?php include 'header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>Add a New Product</h3>
   <input type="text" name="p_name" placeholder="Enter the product name" class="box" required>
   <input type="number" name="p_price" min="0" placeholder="Enter the product price" class="box" required>
   <textarea name="p_description" placeholder="Enter the product description" class="box" required></textarea>
   <input type="text" name="p_colors" placeholder="Enter the product colors" class="box" required>
   <input type="text" name="p_size" placeholder="Enter the product size" class="box" required>
   <input type="file" name="p_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <select name="p_category" class="box" required>
      <option value="" disabled selected>Select category</option>
      <option value="products">Teddies</option>
      <option value="products2new">Chocolates</option>
      <option value="products3">Cakes</option>
      <option value="products4">BS</option>
      <option value="products5">SGP</option>
      <option value="products6">Others</option>
   </select>
   <input type="submit" value="Add the product" name="add_product" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Product Image</th>
         <th>Product Name</th>
         <th>Product Price</th>
         <th>Product Description</th>
         <th>Product Colors</th>
         <th>Product Size</th>
         <th>Action</th>
      </thead>

      <tbody>
         <?php
         
            $categories = ["products", "products2new", "products3", "products4", "products5", "products6"];
            foreach ($categories as $category) {
               $select_products = mysqli_query($conn, "SELECT * FROM `$category`");
               if(mysqli_num_rows($select_products) > 0){
                  while($row = mysqli_fetch_assoc($select_products)){
         ?>

         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td>LKR<?php echo $row['price']; ?>/-</td>
            <td><?php echo $row['description']; ?></td>
            <td><?php echo $row['colors']; ?></td>
            <td><?php echo $row['size']; ?></td>
            <td>
               <a href="admin.php?delete=<?php echo $row['id']; ?>&category=<?php echo $category; ?>" class="delete-btn" onclick="return confirm('Are you sure you want to archive and delete this product?');"> <i class="fas fa-trash"></i> Delete </a>
               <a href="admin.php?edit=<?php echo $row['id']; ?>&category=<?php echo $category; ?>" class="option-btn"> <i class="fas fa-edit"></i> Update </a>
            </td>
         </tr>

         <?php
                  }
               }
            }
         ?>

      </tbody>
   </table>

</section>



<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_category = $_GET['category'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `$edit_category` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="hidden" name="update_p_category" value="<?php echo $edit_category; ?>">
      <input type="text" class="box" required name="update_p_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="number" min="0" class="box" required name="update_p_price" value="<?php echo $fetch_edit['price']; ?>">
      <textarea class="box" required name="update_p_description"><?php echo $fetch_edit['description']; ?></textarea>
      <input type="text" class="box" required name="update_p_colors" value="<?php echo $fetch_edit['colors']; ?>">
      <input type="text" class="box" required name="update_p_size" value="<?php echo $fetch_edit['size']; ?>">
      <input type="file" class="box" required name="update_p_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="Update the product" name="update_product" class="btn">
      <input type="reset" value="Cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            }
         }
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      }
   ?>

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
