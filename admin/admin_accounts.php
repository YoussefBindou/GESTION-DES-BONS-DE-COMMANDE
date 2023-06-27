<?php

include '../components/connect.php';

session_start();
if(!isset($_SESSION['admin_id'] )){
   header("location:index.php");
  }

$admin_id = $_SESSION['admin_id'];
$select=mysqli_query($conn,"select * from admin where id_admin = $admin_id");
$fetch=mysqli_fetch_assoc($select);
$admin_sup=$fetch['super_admin'];

$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");
$fetch_profile = mysqli_fetch_assoc($select_profile);

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_admin = $conn->prepare("DELETE FROM `admin` WHERE id = ?");
   $delete_admin->execute([$delete_id]);
   header('location:admin_accounts.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>admins accounts</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
<style> body{
   background-image: url("../images/wallpaperflare.com_wallpaper (1).jpg");
   background-size: 120%;
   background-position: center;
   
   /* padding-bottom: 7rem; */
}</style>
</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admins accounts section starts  -->

<section class="accounts">

   <h1 class="heading" style="color: white;">admins account</h1>

   <div class="box-container">

   
   <?php 
            if($admin_sup == 1){
         ?>
         <div class="box">
      <p>register new admin</p>
      <a href="register_admin.php" class="option-btn">register</a>
      
   </div>
   <?php } ?>
   <?php
    $select_account = mysqli_query($conn, "SELECT * FROM `admin`");
      
      if(mysqli_num_rows($select_account) > 0){
         while($fetch_accounts = mysqli_fetch_assoc($select_account)){  
   ?>
   <div class="box">
      <p> admin id : <span><?= $fetch_accounts['id_admin']; ?></span> </p>
      <p> username : <span><?= $fetch_accounts['nom']; ?></span> </p>
      <div class="flex-btn">
         <?php 
            if($admin_sup == 1){
         ?>
         <a href="admin_accounts.php?delete=<?= $fetch_accounts['id_admin']; ?>" class="delete-btn" onclick="return confirm('delete this account?');">delete</a>
         <?php } ?>
         <?php
            if($fetch_accounts['id_admin'] == $admin_id){
               echo '<a href="update_profile.php" class="option-btn">update</a>';
            }
         ?>
      </div>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no accounts available</p>';
   }
   ?>

   </div>

</section>

<!-- admins accounts section ends -->




















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>