<?php

include '../components/connect.php';

session_start();
if(!isset($_SESSION['admin_id'] )){
    header("location:index.php");
   }

$admin_id = $_SESSION['admin_id'];
 // Escape the admin_id to prevent SQL injection

$select_profile = mysqli_query($conn, "SELECT * FROM `admin` WHERE id_admin = '$admin_id'");

  $fetch_profile = mysqli_fetch_assoc($select_profile);
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="shourtcut icon" href="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>dashboard</title>
   

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/admin_style.css">

</head>
<body>

<?php include '../components/admin_header.php' ?>

<!-- admin dashboard section starts  -->

<section class="dashboard">

   <h1 class="heading" style="color:white">dashboard</h1>

   

</section>

<!-- admin dashboard section ends -->
<div class="container mt-4">
<div class="col-md-3">
            <a href="update_profile.php">
                <div class="cardBox">
                    <div class="card">
                        <div class="cardContent">
                            <div class="countIcon">
                                <div class="numbers">
                                    <?php
                                    
                                    ?>
                                </div>
                                <div class="iconBx">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <div class="cardName">profile</div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col-md-3">
            <a href="placed_orders.php">
                <div class="cardBox">
                    <div class="card">
                        <div class="cardContent">
                            <div class="countIcon">
                                <div class="numbers">
                                    <?php
                                     $select_pendings = mysqli_query($conn, "SELECT count(id_bcmd) as bn FROM `bon_commande` ");
                                     $fetch_pendings = mysqli_fetch_assoc($select_pendings);
                                     echo $fetch_pendings['bn']; 
                                    ?>
                                </div>
                                <div class="iconBx">
                                    <i class="fas fa-file"></i>
                                </div>
                            </div>
                            <div class="cardName">bon</div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col-md-3">
            <a href="admin_accounts.php">
                <div class="cardBox">
                    <div class="card">
                        <div class="cardContent">
                            <div class="countIcon">
                                <div class="numbers">
                                    <?php
                                    $select_admins = mysqli_query($conn, "SELECT * FROM `admin`");
                                    $numbers_of_admins = mysqli_num_rows($select_admins);
                                    echo $numbers_of_admins;
                                    ?>
                                </div>
                                <div class="iconBx">
                                    <i class="fas fa-users"></i>
                                </div>
                            </div>
                            <div class="cardName">admins</div>
                        </div>
                    </div>
                </div>
            </a>
        </div><div class="col-md-3">
            <a href="messages.php">
                <div class="cardBox">
                    <div class="card">
                        <div class="cardContent">
                            <div class="countIcon">
                                <div class="numbers">
                                    <?php
                                    $select_messages = mysqli_query($conn, "SELECT * FROM `messages` where id_admin=$admin_id");
                                    $numbers_of_messages = mysqli_num_rows($select_messages);
                                    echo $numbers_of_messages;
                                    ?>
                                </div>
                                <div class="iconBx">
                                    <i class="fas fa-message"></i>
                                </div>
                            </div>
                            <div class="cardName">messages</div>
                        </div>
                    </div>
                </div>
            </a>
        </div>




</div>


<!-- custom js file link  -->
<script src="../js/admin_script.js"></script>

</body>
</html>
<style>
    
    body{
   background-image: url("../images/wallpaperflare.com_wallpaper (1).jpg");
   background-size: 120%;
   background-position: center;
   
   /* padding-bottom: 7rem; */
}
   .container{
      display:flex;

   }
    .cardContent {
        display: flex;
        align-items: center;
    }

    .countIcon {
        display: flex;
        align-items: center;
    }

    .numbers {
        margin-right: 10px;
    }

    .iconBx {
        margin-right: 10px;
    }

    .cardName {
        cursor: pointer;
    }

  


.cardBox {
    margin-bottom: 20px;
}

.card {
    background-color: #ffffff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.3s ease;
    margin:12px;
}

.card:hover {
    background-color: #f5f5f5;
}

.numbers {
    font-size: 32px;
    font-weight: bold;
    color: #000;
}

.cardName {
    underline
    font-size: 18px;
    font-weight: bold;
    color: #333333;
}

.iconBx {
    font-size: 40px;
    color: #4e73df;
}

a:link {
      text-decoration: none;
}







</style>