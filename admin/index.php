<?php

include '../components/connect.php';


session_start();
 
  

if(isset($_POST['login'])){
  
  $mail=$_POST['name'];
  $pass=$_POST['pass'];
  $result = mysqli_query($conn,"select * from admin where email='".$mail."' and password='".$pass."' ");
  if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $admin_id=$row['id_admin'];
    $_SESSION['admin_id'] = $admin_id;
    
    header("Location:dashboard.php");
  } else {
    
    header("Location: index.php");
    
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <script src="jvs.js"></script>
  
</head>
<body>
<section class="form-container">

   <form action="" method="POST">
   <img src="../images/royaume-du-maroc-kingdom-of-morocco-logo-CE824856A6-seeklogo.com (1).png" alt="image" width="70" style="margin-bottom: 2rem;" height="70"><br>

      <h3>Académie Régionale de l'Education et de la Formation Dakhla - Oued Eddahab</h3>

      <input type="text" name="name" maxlength="20" required placeholder="enter your emaile" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="password" name="pass" maxlength="20" required placeholder="enter your password" class="box" oninput="this.value = this.value.replace(/\s/g, '')">
      <input type="submit" value="login" name="login" class="btn">
   </form>

</section>
</body>
</html>
<style>
   <style>
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap');
    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400&display=swap');
  body {
  
}
:root{
   --main-color:#4834d4;
   --red:#e74c3c;
   --orange:#f39c12;
   --black:#34495e;
   --white:#fff;
   --light-bg:#f5f5f5;
   --light-color:#999;
   --border:.2rem solid var(--black);
   --box-shadow:0 .5rem 1rem rgba(0,0,0,.1);
}

*{
   font-family: 'Montserrat', sans-serif;
   margin:0; padding:0;
   box-sizing: border-box;
   text-decoration: none;
   outline: none; border:none;
}

*::selection{
   color:var(--white);
   background-color: var(--main-color);
}

::-webkit-scrollbar{
   width: 1rem;
   height: .5rem;
}

::-webkit-scrollbar-track{
  background-color: none;
}

::-webkit-scrollbar-thumb{
   background-color: var(--main-color);
}

html{
   font-size: 62.5%;
   overflow-x: hidden;
}

body{
   background-image: url("../images/desktop-wallpaper-abstract-login-page.jpg");
   background-size: 85%;
   background-position: center;
   
   /* padding-bottom: 7rem; */
}

section{
   max-width: 1200px;
   margin:0 auto;
   padding:2rem;
}

.btn,
.delete-btn,
.option-btn{
   display: block;
   margin-top: 1rem;
   border-radius: .5rem;
   cursor: pointer;
   width: 100%;
   font-size: 1.8rem;
   color:var(--white);
   padding:1.2rem 3rem;
   text-transform: capitalize;
   text-align: center;
}

.btn{
   background-color: #e5bd02;
   border-radius: 3.5rem;
}

.delete-btn{
   background-color: var(--red);
}

.option-btn{
   background-color: var(--orange);
}

.btn:hover,
.delete-btn:hover,
.option-btn:hover{
   background-color: var(--black);
}

.flex-btn{
   display: flex;
   gap:1rem;
}

.message{
   position: sticky;
   top:0;
   max-width: 1200px;
   margin:0 auto;
 
   padding:2rem;
   display: flex;
   align-items: center;
   gap:1rem;
   justify-content: space-between;
}

.message span{
   font-size: 2rem;
   color:var(--black);
}

.message i{
   font-size: 2.5rem;
   color:var(--red);
   cursor: pointer;
}

.message i:hover{
   color:var(--black);
}

.heading{
   text-align: center;
   margin-bottom: 2rem;
   text-transform: capitalize;
   color:var(--black);
   font-size: 3rem;
}

.empty{
   border:var(--border);
   border-radius: .5rem;
   background-color: var(--white);
   padding:1.5rem;
   text-align: center;
   width: 100%;
   font-size: 2rem;
   text-transform: capitalize;
   color:var(--red);
   box-shadow: var(--box-shadow);
}

.form-container{
   display: flex;
   align-items: center;
   justify-content: center;
   min-height: 100vh;
}

.form-container form{

   padding:2rem;
   text-align: center;
   width: 50rem;
   background-color: white;
   border-radius: 3rem;
}

.form-container form h3{
   font-size: 2.5rem;
   color:#e5bd02;
   text-transform: capitalize;
   margin-bottom: 1rem;
}

.form-container form p{
   margin:1rem 0;
   font-size: 2rem;
   color:white;
}
.form-container form a{
   margin:1rem 0;
   text-transform: uppercase;
   color:white;
}

.form-container form p span{
   color:var(--main-color);
}

.form-container form .box{
   width: 100%;
   background-color: var(--light-bg);
   padding:1.4rem;
   font-size: 1.4rem;
   color:var(--black);
   margin:1rem 0;
   border:var(--border);
   font-size: 1.8rem;
   border-radius: 3.5rem;
}

.header{
   position: sticky;
   top:0; left:0; right:0;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   z-index: 1000;
   border-bottom: var(--border);
}

.header .flex{
   display: flex;
   align-items: center;
   justify-content: space-between;
   position: relative;
}

.header .flex .logo{
   font-size: 2.5rem;
   color:var(--black);
}

.header .flex .logo span{
   color:var(--main-color);
}

.header .flex .navbar a{
   margin:0 1rem;
   font-size: 2rem;
   color:var(--light-color);
}

.header .flex .navbar a:hover{
   color:var(--main-color);
}

.header .flex .icons > *{
   font-size: 2.5rem;
   cursor: pointer;
   color:var(--light-color);
   margin-left: 1.7rem;
}

.header .flex .icons > *:hover{
   color:var(--main-color);
}

.header .flex .profile{
   position: absolute;
   top:125%; right:2rem;
   background-color: var(--white);
   box-shadow: var(--box-shadow);
   border:var(--border);
   border-radius: .5rem;
   padding:2rem;
   padding-top: 1rem;
   width: 30rem;
   display: none;
   animation: fadeIn .2s linear;
}

@keyframes fadeIn {
   0%{
      transform: translateY(1rem);
   }
}

.header .flex .profile p{
   margin-bottom: 1rem;
   font-size: 2rem;
   text-align: center;
   color:var(--black);
}

.header .flex .profile.active{
   display: inline-block;
}

#menu-btn{
   display: none;
}

.dashboard .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, minmax(27rem, 1fr));
   gap:1.5rem;
   align-items: flex-start;
}

.dashboard .box-container .box{
   text-align: center;
   background-color: var(--white);
   border:var(--border);
   box-shadow: var(--box-shadow);
   border-radius: .5rem;
   text-align: center;
   padding:1.5rem;
}

.dashboard .box-container .box h3{
   font-size: 2.7rem;
   color:var(--black);
}

.dashboard .box-container .box h3 span{
   font-size: 2rem;
}

.dashboard .box-container .box p{
   padding:1.5rem;
   border-radius: .5rem;
   background-color: var(--light-bg);
   border-radius: .5rem;
   font-size: 1.8rem;
   border:var(--border);
   margin:1rem 0;
   color:var(--light-color);
}

.add-products form{
   margin:0 auto;
   max-width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
   text-align: center;
}

.add-products form h3{
   margin-bottom: 1rem;
   font-size: 2.5rem;
   color:var(--black);
   text-transform: capitalize;
}

.add-products form .box{
   background-color: var(--light-bg);
   border:var(--border);
   width: 100%;
   padding:1.4rem;
   font-size: 1.8rem;
   color:var(--black);
   border-radius: .5rem;
   margin: 1rem 0;
}

.show-products .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.show-products .box-container .box{
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:1.5rem;
}

.show-products .box-container .box img{
   width: 100%;
   height: 20rem;
   object-fit: contain;
   margin-bottom: 1rem;
}

.show-products .box-container .box .name{
   font-size: 2rem;
   color:var(--black);
   padding:1rem 0;
}

.show-products .box-container .box .flex{
   display: flex;
   align-items: center;
   gap:1rem;
   justify-content: space-between;
}

.show-products .box-container .box .flex .category{
   font-size: 1.8rem;
   color:var(--main-color);
}

.show-products .box-container .box .flex .price{
   font-size: 2rem;
   color:var(--black);
   margin:.5rem 0;
}

.show-products .box-container .box .flex .price span{
   font-size: 1.5rem;
}

.update-product form{
   margin:0 auto;
   max-width: 50rem;
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
}

.update-product form img{
   height: 25rem;
   width: 100%;
   object-fit: contain;
}

.update-product form .box{
   background-color: var(--light-bg);
   border:var(--border);
   width: 100%;
   padding:1.4rem;
   font-size: 1.8rem;
   color:var(--black);
   border-radius: .5rem;
   margin: 1rem 0;
}

.update-product form textarea{
   height: 15rem;
   resize: none;
}

.update-product form span{
   font-size: 1.7rem;
   color:var(--black);
}

.placed-orders .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.placed-orders .box-container .box{
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
   padding-top: 1rem;
}

.placed-orders .box-container .box p{
   padding: .5rem 0;
   line-height: 1.5;
   font-size: 1.8rem;
   color:var(--black);
}

.placed-orders .box-container .box p span{
   color:var(--main-color);
}

.placed-orders .box-container .box .drop-down{
   width: 100%;
   margin:1rem 0;
   background-color: var(--light-bg);
   padding:1rem 1.4rem;
   font-size: 2rem;
   color:var(--black);
   border:var(--border);
   border-radius: .5rem;
}

.accounts .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.accounts .box-container .box{
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
   padding-top: 1rem;
   text-align: center;
}

.accounts .box-container .box p{
   padding: .5rem 0;
   font-size: 1.8rem;
   color:var(--black);
}

.accounts .box-container .box p span{
   color:var(--main-color);
}

.messages .box-container{
   display: grid;
   grid-template-columns: repeat(auto-fit, 33rem);
   gap:1.5rem;
   justify-content: center;
   align-items: flex-start;
}

.messages .box-container .box{
   background-color: var(--white);
   border-radius: .5rem;
   box-shadow: var(--box-shadow);
   border:var(--border);
   padding:2rem;
   padding-top: 1rem;
}

.messages .box-container .box p{
   padding: .5rem 0;
   font-size: 1.8rem;
   color:var(--black);
}

.messages .box-container .box p span{
   color:var(--main-color);
}

/* media queries  */

@media (max-width:991px){

   html{
      font-size: 55%;
   }

}

@media (max-width:768px){

   #menu-btn{
      display: inline-block;
   }

   .header .flex .navbar{
      position: absolute;
      top:99%; left:0; right:0;
      border-top: var(--border);
      border-bottom: var(--border);
      background-color: var(--white);
      clip-path: polygon(0 0, 100% 0, 100% 0, 0 0);
      transition: .2s linear;
   }

   .header .flex .navbar.active{
      clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%);
   }

   .header .flex .navbar a{
      display: block;
      margin:2rem;
   }

}

@media (max-width:450px){

   html{
      font-size: 50%;
   }

   .flex-btn{
      flex-flow: column;
      gap:0;
   }

   .heading{
      font-size: 3rem;
   }

   .show-products .box-container{
      grid-template-columns: 1fr;
   }

   .placed-orders .box-container{
      grid-template-columns: 1fr;
   }

   .accounts .box-container{
      grid-template-columns: 1fr;
   }

}
</style>
