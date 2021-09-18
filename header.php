<?php

session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">iCoders</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/forum/about.php">About</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Top Categories
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';
          $sql = "SELECT category_name, category_id FROM `categories` LIMIT 5";
          $result = mysqli_query($conn, $sql); 
          while($row = mysqli_fetch_assoc($result)){
            echo '<a class="dropdown-item" href="threadlist.php?catid='. $row['category_id']. '">' . $row['category_name']. '</a>'; 
          }
          echo '</ul>
        </li>
        <li class="nav-item">
        <a class="nav-link" href="/forum/contact.php">Contact Us</a>
        </li>
      </ul>';
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
         echo '<form class="d-flex" method = "get" action = "search.php">
         <input class="form-control me-4  my-1" type="search" name= "search" placeholder="Search" aria-label="Search">
         <div>
         <button class="btn btn-success ms-0 mx-5 my-1" type="submit">Search</button>
         </div> 
         <div class="flex-shrink-0">
         <img class = "my-1"src="https://uxcjs2wtyps2eozlk2xzs7u2-wpengine.netdna-ssl.com/wp-content/themes/true212/images/avatar-placeholder.png"  height=40px width=40px" alt="Logo">
         </div>
         <div class="user_name text-light mx-3">Welcome<br><b><center>'.$_SESSION['username'].'</center></b></div>
          <a href="logout.php" class="btn btn-outline-primary my-1">LOGOUT</a>
         </form>';
         
      
      }

      else{
           
        echo '<form class="d-flex">
        <input class="form-control me-4" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success me-5" type="submit">Search</button>
        <div class="flex-shrink-0">
        <input type="button" value = "LOGIN" class="btn btn-outline-primary" type="submit" data-bs-toggle="modal" data-bs-target="#loginmodal">
        <input type="button" value = "SIGNUP" class="btn btn-outline-primary" type="submit" data-bs-toggle="modal" data-bs-target="#signupmodal">
        </div>
       
        </form>';
      } 
    echo '</div>
          </div>
          </nav>';
   

        include 'loginmodal.php';
        include 'signupmodal.php';
        if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
          echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong>  You can now Login
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }

        if(isset($_GET['logifailed']) && $_GET['logifailed']=="true") {
          echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          <strong>Error!</strong> Given login info is wrong! Please try again
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        }
        ?>


 
  