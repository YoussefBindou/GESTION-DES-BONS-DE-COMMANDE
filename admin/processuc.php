<?php

include '../components/connect.php';
// Check if the form is submitted

if(!isset($_SESSION['admin_id'] )){
    header("location:index.php");
   }
if(isset($_POST['submit'])){
    $brands = $_POST['checkbox'];
    // echo $brands;

    foreach($brands as $item){
        // echo $item . "<br>";
        $query = "INSERT INTO checkboxes (checkbox_name) VALUES ('$item')";
        $query_run = mysqli_query($conn, $query);
    }

    if($query_run){
        $_SESSION['status'] = "Inserted Successfully";
        header("Location: checkbox.php");
    }
    else{
        $_SESSION['status'] = "Data Not Inserted";
        header("Location: index.php");
    }
}
?>