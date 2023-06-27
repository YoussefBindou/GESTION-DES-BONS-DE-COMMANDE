<?php

include '../components/connect.php';

session_start();
if(!isset($_SESSION['admin_id'] )){
   header("location:index.php");
  }

$admin_id = $_SESSION['admin_id'];


if(isset($_POST['submit'])){

   $p_name = $_POST['p_name'];
   $name = $_POST['name'];
   $name = filter_var($name, FILTER_SANITIZE_STRING);
   $update_name = mysqli_query($conn, "UPDATE `admin` SET nom = '$name', prenom = '$p_name' WHERE id_admin = $admin_id");

   

   
   $select_old_pass = mysqli_query($conn,"SELECT password FROM `admin` WHERE id_admin = $admin_id");
   $fetch_prev_pass = mysqli_fetch_assoc($select_old_pass);
   $prev_pass = $fetch_prev_pass['password'];
   $old_pass = $_POST['old_pass'];
   $old_pass = filter_var($old_pass, FILTER_SANITIZE_STRING);
   $new_pass = $_POST['new_pass'];
   $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
   $confirm_pass = $_POST['confirm_pass'];
   $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);

  
      if($old_pass != $prev_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
        
            $update_pass = $conn->prepare("UPDATE `admin` SET password = ? WHERE id_admin = ?");
            $update_pass->execute([$confirm_pass, $admin_id]);
            $message[] = 'password updated successfully!';
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
   <title>profile update</title>

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

<!-- admin profile update section starts  -->

<section class="form-container">
<?php
$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");
$fetch_profile = mysqli_fetch_assoc($select_profile);
?>
   <form action="" method="POST">
      <h3>update profile</h3>
      <input type="text" name="name" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" placeholder="<?= isset($fetch_profile['nom']) ?  $fetch_profile['nom'] : '';  ?>">
      <input type="text" name="p_name" maxlength="20" class="box" oninput="this.value = this.value.replace(/\s/g, '')" placeholder="<?= isset($fetch_profile['nom']) ?  $fetch_profile['prenom'] : '';  ?>">
      <input type="password" name="old_pass" maxlength="20" placeholder="enter your old password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="new_pass" maxlength="20" placeholder="enter your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="confirm_pass" maxlength="20" placeholder="confirm your new password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="update now" name="submit" class="btn">
   </form>

</section>

<!-- admin profile update section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>