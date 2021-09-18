<?php

$showEroor = "false";
$method = $_SERVER['REQUEST_METHOD'];
if ($method=='POST'){
    include 'dbconnect.php';
   $user_name = $_POST['username'];
   $user_phone = $_POST['phonenumber'];
   $user_email = $_POST['signupEmail'];
   $user_pass = $_POST['password'];
   $user_cpass = $_POST['cpassword'];

$existSql = "SELECT* From `users` WHERE user_email = '$user_email'";
$result = mysqli_query($conn,$existSql);
$numRows = mysqli_num_rows($result);
if($numRows>0){
    $showError = "Email is already in use";
    header("Location:/forum/index1.php?signupfailed=$showError");
    
}

 else{
     if($user_pass == $user_cpass){
        $hash = password_hash($user_pass, PASSWORD_DEFAULT);
        $sql = "INSERT INTO `users` (`user_name`, `user_phone`, `user_email`, `user_password`, `timestamp`) VALUES ('$user_name', '$user_phone', '$user_email', '$hash', current_timestamp())";
        $result = mysqli_query($conn, $sql);
        if($result){
            $showAlert = true;
            header("Location:/forum/index.php?signupsuccess=true");
            exit();
        }
        else{
            $showerror = "Password does not match";
     }
     
     
     
     }
     
     header("Location:/forum/index.php?signupfailed=false&error=false");
    
 }
 


   }
   
   
?>