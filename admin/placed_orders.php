<?php

include '../components/connect.php';

session_start();
if(!isset($_SESSION['admin_id'] )){
   header("location:index.php");
  }

$admin_id = $_SESSION['admin_id'];
$select_super=mysqli_query($conn,"select * from admin where id_admin=$admin_id");
$fetch_super=mysqli_fetch_assoc($select_super);
$super_admin=$fetch_super['super_admin'];

$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");
$fetch_profile = mysqli_fetch_assoc($select_profile);

$select=mysqli_query($conn,"select * from admin where id_admin=$admin_id");
$row=mysqli_fetch_assoc($select);
$name_admin=$row['nom'];
$email_ad=$row['email'];


if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_order = mysqli_query($conn,"DELETE FROM `bon_commande` WHERE id_bcmd = $delete_id");
   
   header('location:placed_orders.php');
}
if(isset($_POST['report'])){
   $message=$_POST['text_ar'];
   $bon_id=$_POST['bon_id'];
   $bon_num=$_POST['bon_num'];
   $select_id = mysqli_query($conn, "SELECT * FROM `bon_commande` WHERE id_bcmd = $bon_id");
   $id_fetch = mysqli_fetch_assoc($select_id);
   $addmin=$id_fetch['id_admin'];
  
   $insert = mysqli_query($conn, "INSERT INTO messages (name_admin, email, message, id_admin, num_bon) VALUES ('$name_admin', '$email_ad', '$message', '$addmin', '$bon_num')");
   if($insert){
      header("location:placed_orders.php");
   }
}
$search_term = isset($_GET['search']) ? $_GET['search'] : '';

      $select_bon = mysqli_query($conn, "SELECT * FROM `bon_commande` WHERE num_bc LIKE '%$search_term%'");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>placed orders</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">
   <link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">
<style> body{
   background-image: url("../images/wallpaperflare.com_wallpaper (1).jpg");
   background-size: 120%;
   background-position: center;
   
   /* padding-bottom: 7rem; */
}</style>
</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- placed orders section starts  -->

<section class="placed-orders">

   <h1 class="heading" style="
    color: white;
">placed bon</h1>
   
   <div class="search-container" style="
    display: flex;
    justify-content: center;
    margin-top: 7rem;
    margin-bottom: 7rem;">
   <center>
      <form action="" method="GET" class="form-inline">
         <div class="input-group">
            <input type="text" name="search" style="height: 46px;margin-top: 10px;width: 24rem;" class="form-control" placeholder="Search by N° de bon" value="<?php echo $search_term; ?>">
            <div class="input-group-append">
               <button type="submit" style="height: 46px;" class="btn btn-primary"><i class="fas fa-search"></i></button>
            </div>
         </div>
         </center>
      </form>
   </div>
   
   <div class="box-container">

   <?php
      
      
      if (mysqli_num_rows($select_bon) > 0){
         while($fetch_bon = mysqli_fetch_assoc($select_bon)){
   ?>
   <div class="box">
      <p> N° de bon : <span><?= $fetch_bon['num_bc']; ?></span> </p>
      <p> date de bon : <span><?= $fetch_bon['date_bnc']; ?></span> </p>
      <p> object : <span><?= $fetch_bon['object']; ?></span> </p>
      <p> date ouverture : <span><?= $fetch_bon['date_ouverture']; ?></span> </p>
 
      <form action="" method="POST">
         <input type="hidden" name="bon_id" value="<?= $fetch_bon['id_bcmd']; ?>">
         <input type="hidden" name="bon_num" value="<?= $fetch_bon['num_bc']; ?>">
         <input type="hidden" name="admin" value="<?= $fetch_bon['id_admin']; ?>">
         
            <?php 
           if ($fetch_bon['id_admin'] == $admin_id ) {
            ?>
            <a href="update_bon%20.php?id=<?= $fetch_bon['id_bcmd']; ?>" style="    background-color: #1ad2e5;" class="delete-btn">update</a>
            <a href="placed_orders.php?delete=<?= $fetch_bon['id_bcmd']; ?>" class="delete-btn"  onclick="return confirm('delete this bon?');">delete</a>
            <?php      
            }
             ?>
            <a href="print.php?id=<?= $fetch_bon['id_bcmd']; ?>" style="background-color: #4ba700" class="delete-btn" onclick="return confirm('print this bon?');">print</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">report</button>

    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Entrer ton reclamation:</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <textarea class="form-control" rows="5" name="text_ar" cols="50"></textarea>
                </div>
                <div class="modal-footer">
                    <button type="submit"  name="report" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

         
      </form>
   </div>
   <?php
      }
   }else{
      echo '<p class="empty">no orders placed yet!</p>';
   }
   ?>

   </div>

</section>

<!-- placed orders section ends -->









<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>