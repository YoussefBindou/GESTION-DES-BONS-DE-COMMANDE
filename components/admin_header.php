<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
$admin_id = $_SESSION['admin_id'];
$select_super=mysqli_query($conn,"select * from admin where id_admin=$admin_id");
$fetch_super=mysqli_fetch_assoc($select_super);
$super_admin=$fetch_super['super_admin'];
?>

<header class="header">

   <section class="flex">

      <a href="dashboard.php" class="logo"><img src="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" alt="image" width="30" height="30" class="royuame" > Bon <span>commande</span></a>

      <nav class="navbar">
         <a href="dashboard.php">home</a>
         <a href="ajouter_bon.php">ajouter bon</a>
         <a href="placed_orders.php">bons</a>
         <a href="admin_accounts.php">admins</a>
         <a href="messages.php">messages</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="profile">
      
         <p><?= isset($fetch_profile['nom']) ?  $fetch_profile['nom'] : '';?></p>
         <a href="update_profile.php" style="
    background-color: var(--main-color);
    display: block;
    margin-top: 1rem;
    border-radius: 0.5rem;
    cursor: pointer;
    width: 100%;
    font-size: 1.8rem;
    color: var(--white);
    padding: 1.2rem 3rem;
    text-transform: capitalize;
    text-align: center;
" class="btn">update profile</a>
         <div class="flex-btn">
         <?php 
           if ($super_admin==1) {
            ?>
            <a href="register_admin.php" class="option-btn">register</a>
            <?php      
            }
             ?>
         </div>
         <a href="../components/admin_logout.php" onclick="return confirm('logout from this website?');" class="delete-btn">logout</a>
      </div>

   </section>

</header>