<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href=CSS/style.css">

    <style>
      body{
        background-color: #181414;
      }
      .heading{
        text-align: center;
        font-size: 40px;
        margin-top: 23px;
        border: 5px solid black;
        border-radius: 40px;
        width: 600px;
        margin-left: 288px;
       background-color: #c3ffe9;
      }
      .container{
        margin-left: 240px;
      }

    </style>
    <title>iCoders | A computer science platform for all coders</title>
  </head>
  <body>

      <?php
         include 'dbconnect.php';
        include 'header.php';
       
        
    
?>

   

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/img1.jpeg" class="d-block w-100" alt="https://source.unsplash.com/500x400/?coding,laptop">
    </div>
    <div class="carousel-item">
      <img src="img/img2.jpeg" class="d-block w-100" alt="https://source.unsplash.com/500x400/?coding,laptop">
    </div>
    <div class="carousel-item">
      <img src="img/img3.jpeg" class="d-block w-100" alt="https://source.unsplash.com/500x400/?coding,laptop">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" ="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div><br><br>

  <div class="container">

  <h2 class = "heading">iCoders Browse Categories </h2>

      
<div class="row my-5">

  <!-- Fetch all the categories -->

     <?php

    
   

    $sql = "SELECT * FROM `categories`";

    $result = mysqli_query($conn,$sql);

     while ($row = mysqli_fetch_assoc($result)){

      $id = $row['category_id'];
      $cat = $row['category_name'];
      $catdesc = $row['category_description'];

    echo '<div class="col-md-4 my-2">
  <div class="card" style="width: 18rem;">
  <img src="https://source.unsplash.com/500x400/?'.$cat .' python,coding" class="card-img-top" alt="https://source.unsplash.com/500x400/?coding,laptop">
  <div class="card-body">
    <h5 class="card-title"><a href = "threadlist.php?catid=' . $id . '">'.$cat .'</a></h5>
    <p class="card-text">'.substr($catdesc,0,90).'...</p>
    <a href="threadlist.php?catid=' . $id . '" class="btn btn-primary">View Threads</a>
  </div>
  </div>

  </div>';
  
     }

  



     ?>

</div>
    </div>


  

    

 

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    -->

  <?php

    include 'footer.php';

    ?>
  </body>
</html>