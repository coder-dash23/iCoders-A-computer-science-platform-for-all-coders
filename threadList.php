<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <title>iCoders | A computer science platform for all coders</title>
    <style>
      body{
        background-color: #feffd0;
      }
      .lead{
        font-size: 23px;
        font: bold;
      }
    </style>
  </head>
  <body>

      <?php
        
        include 'dbconnect.php';
        include 'header.php';
        

        $id = $_GET["catid"];
        $sql = "SELECT * FROM `categories` WHERE category_id = $id";

        $result = mysqli_query($conn,$sql);
    
         while($row = mysqli_fetch_assoc($result)){

          $cat = $row['category_name'];
          $catdesc = $row['category_description'];

         }

         ?>


         <?php
         $showAlert = false;
         $method = $_SERVER['REQUEST_METHOD'];
         if ($method=='POST'){
            //Insert thread into threads db
            $th_title = $_POST['title'];
            $th_desc = $_POST['desc'];

            $th_title = str_replace("<", "&lt;", $th_title);
            $th_title = str_replace(">", "&gt;", $th_title);

            $th_desc = str_replace("<", "&lt;", $th_desc);
            $th_desc = str_replace(">", "&gt;", $th_desc);
            
            $sno = $_POST['sno']; 
            $sql = "INSERT INTO `threads` (`thread_title`, `thread_desc`, `thread_cat_id`, `thread_user_id`, `timestamp`) VALUES ('$th_title', '$th_desc', '$id', '$sno', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;
            if ($showAlert) {
              echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Success!</strong> Your Thread has been added successfully! Please wait for our community to respond.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
         }
        ?>

  <div class="width=100% hmy-2">
  <div class="p-4 p-md-5 mb-4 text-white bg-dark">
    <div class="col-md-6 px-0">
      <h4 class="display-4 fst-italic">Welcome to <?php echo $cat; ?> forums</h4>
      <p class="lead my-3"><?php echo $catdesc; ?> </p>
      <p class="lead mb-0"><a href="" class="text-white fw-bold">Continue reading...</a></p>
    </div>
  </div>
  </div>


         
       <?php

     if (isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
             
     echo '<div class="container">
      <h1>Start a Discussion</h1>
        
     <form action= "'. $_SERVER['REQUEST_URI'].'" method="POST">
   <div class="mb-3 me-5">
    <label for="exampleInputEmail1" class="form-label">Question Title</label>
    <input type="text" class="form-control" id="title" name ="title" aria-describedby="emailHelp">
  </div>
  <div class="mb-3 me-5">
  <label for="exampleInputEmail1" class="form-label">Ellaborate Your Concern</label>
     <textarea name="desc" id="desc" cols="172" ></textarea>
     <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
  </div>

  <button type="submit" class="btn btn-success">Submit</button>
    </form><br><hr>';
            }

else{

      
       echo '<div class="container">
       <h1>Start a Discussion</h1>
       <p class = "lead">You are not logged in! Please login then you will be able to start a Disccussion</p>
       </div><hr>';

}

?>

  <br>

<div class="container">
            <h1>Browse Questions</h1>

         <?php
        $id = $_GET["catid"];
        $sql = "SELECT * FROM `threads` WHERE thread_cat_id =$id;";

        $result = mysqli_query($conn,$sql);
  
        $noResult = true;
         while($row = mysqli_fetch_assoc($result)){
          $noResult = false;
          $id = $row['thread_id'];
          $title = $row['thread_title'];
          $desc = $row['thread_desc'];
          $thread_time = $row['timestamp'];
          $thread_user_id = $row['thread_user_id'];
          $sql2 = "SELECT user_name FROM `users` WHERE sno= '$thread_user_id'";
          $result2 = mysqli_query($conn,$sql2); 
          $row2 = mysqli_fetch_assoc($result2);


          echo '<div class="media my-3">
          <img src="https://uxcjs2wtyps2eozlk2xzs7u2-wpengine.netdna-ssl.com/wp-content/themes/true212/images/avatar-placeholder.png"  height=50px width=50px" alt="Logo">
          <div class="media-body">'.
           '<h5 class="mt-0"> <a class="text-dark" href="thread.php?threadid=' . $id. '">'. $title . ' </a></h5>
            '. $desc . ' </div>'.'<div class="font-weight-bold my-0"><b> Asked by : </b><b>'. $row2['user_name'] . ' at '. $thread_time. '</b></div>'.
      '</div>';

           
      
      }

       if($noResult){
        echo '<div class="jumbotron jumbotron-fluid bg-dark text-light ">
                <div class="container">
                    <p class="display-4">No Threads Found!</p>
                    <h5>&nbsp Be the first person to ask a question</h5>
                </div>
             </div> ';
    }
  

         ?>
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