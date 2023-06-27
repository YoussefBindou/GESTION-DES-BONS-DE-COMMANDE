<?php

include '../components/connect.php';

session_start();
if(!isset($_SESSION['admin_id'] )){
   header("location:index.php");
  }

$admin_id = $_SESSION['admin_id'];

$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");
$fetch_profile = mysqli_fetch_assoc($select_profile);

$select_super=mysqli_query($conn,"select * from admin where id_admin=$admin_id");
$fetch_super=mysqli_fetch_assoc($select_super);
$super_admin=$fetch_super['super_admin'];


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_message = $conn->prepare("DELETE FROM `messages` WHERE id = ?");
   $delete_message->execute([$delete_id]);
   header('location:messages.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>messages</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
<style>
    body{
   background-image: url("../images/wallpaperflare.com_wallpaper (1).jpg");
   background-size: 120%;
   background-position: center;
   
   /* padding-bottom: 7rem; */
}
</style>
</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- messages section starts  -->

<section class="messages">

   <h1 class="heading" style="color: white;">messages</h1>

   <div class="box-container">

   <?php
      $select_messages = mysqli_query($conn, "SELECT * FROM `messages` where id_admin=$admin_id ");
         
      if( mysqli_num_rows($select_messages) > 0){
         while($fetch_messages = mysqli_fetch_assoc($select_messages)){
   ?>
   <div class="box">
      <p> name : <span><?= $fetch_messages['name_admin']; ?></span> </p>
      <p> email : <span><?= $fetch_messages['email']; ?></span> </p>
      <p> numero de bon : <span><?= $fetch_messages['num_bon']; ?></span> </p>
      <p> message : <span><?= $fetch_messages['message']; ?></span> </p>
      <?php 
           if ($fetch_messages['id_admin'] == $admin_id || $super_admin == 1) {
            ?>
      <a href="messages.php?delete=<?= $fetch_messages['id']; ?>" style="    background-color: #60dcf4;"class="delete-btn" onclick="return confirm('delete this message?');">delete</a>
      <?php
           }
      ?>
   </div>
   <?php
         }
      }else{
         echo '<p class="empty">you have no messages</p>';
      }
   ?>

   </div>

</section>

<!-- messages section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>