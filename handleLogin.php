<?php

$showError = "false";
$method = $_SERVER['REQUEST_METHOD'];
include 'dbconnect.php';
if ($method=='POST'){
    $name = $_POST['username'];
    $email = $_POST['loginEmail'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `users` WHERE user_name='$name'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows==1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['user_password'])) {
            session_start();
            $_SESSION['loggedin']= true;
            $_SESSION['sno']= $row['sno']; 
            $_SESSION['username']= $row['username']; 
            $_SESSION['username'] = $name;
            echo "logged in ". $name;
        }
           
         header("Location:/forum/index.php");
    }

    else{
        $showError = true;
        header("Location:/forum/index.php?logifailed=true");
        exit();

    }
    
}
    ?>