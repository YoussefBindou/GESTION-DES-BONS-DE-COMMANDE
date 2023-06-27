<?php

include '../components/connect.php';

session_start();
if(!isset($_SESSION['admin_id'] )){
   header("location:index.php");
  }

$admin_id = $_SESSION['admin_id'];

$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");
$fetch_profile = mysqli_fetch_assoc($select_profile);

if(isset($_POST['submit'])){

   $name = $_POST['name'];
   $pname = $_POST['pname'];
   $email = $_POST['email'];
   $pass = $_POST['pass'];
   $cpass = $_POST['cpass'];
  
   $select_admin = mysqli_query($conn,"SELECT * FROM `admin` WHERE email = '$email'");

   
   if (mysqli_num_rows($select_admin) > 0) {
      $message[] = 'username already exists!';
   }else{
      if($pass != $cpass){
         $message[] = 'confirm passowrd not matched!';
      }else{
         $insert_admin = mysqli_query($conn, "INSERT INTO `admin` (nom, prenom, email, password) VALUES ('$name', '$pname', '$email', '$cpass')");
         $message[] = 'new admin registered!';
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">

   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

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

<!-- register admin section starts  -->

<section class="form-container">

   <form action="" method="POST">
      <h3>register new</h3>
      <input type="text" name="name" maxlength="20" required placeholder="nom" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="pname" maxlength="20" required placeholder="prenom" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="text" name="email" maxlength="20" required placeholder="email" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="cpass" maxlength="20" required placeholder="confirm your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="register now" name="submit" class="btn">
   </form>

</section>

<!-- register admin section ends -->
















<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>