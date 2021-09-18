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
  </head>
  <style>
     body{
        background-color: #feffd0;
      }
      .lead{
        font-size: 23px;
        font: bold;
      }
  </style>
  <body>

      <?php
         
         include 'dbconnect.php';
         include 'header.php';
         
        $id = $_GET["threadid"];
        $sql = "SELECT * FROM `threads` WHERE thread_id = $id";
        $result = mysqli_query($conn,$sql);
    
         while($row = mysqli_fetch_assoc($result)){

          $title = $row['thread_title'];
          $desc = $row['thread_desc'];
          $thread_user_id = $row['thread_user_id'];

          // Query the users table to find out the name of OP
          $sql2 = "SELECT user_name FROM `users` WHERE sno='$thread_user_id'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          $posted_by = $row2['user_name'];
         }

         ?>

<?php
         $showAlert = false;
         $method = $_SERVER['REQUEST_METHOD'];
         if ($method=='POST'){
            //Insert thread into comments db
            $comment = $_POST['comment'];
            $comment = str_replace("<", "&lt;", $comment);
            $comment = str_replace(">", "&gt;", $comment); 
            $sno = $_POST['sno']; 
            $sql = "INSERT INTO `comments`( `comment_content`, `thread_id`, `comment_by`, `comment_time`) VALUES ('$comment','$id','$sno', current_timestamp())";
            $result = mysqli_query($conn,$sql);
            $showAlert = true;
            if ($showAlert) {
              echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
              <strong>Success!</strong> Your Comment has been added successfully!
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            }
         }
        ?>

 <!-- Category container starts here -->

  <div class="width=100% hmy-2">
  <div class="p-4 p-md-5 mb-4 text-white bg-dark">
    <div class="col-md-6 px-0">
      <h4 class="display-4 fst-italic"> <?php echo $title; ?></h4>
      <p class="lead my-3"><?php echo $desc; ?> </p>
      <hr>
      <p><b>Disclaimer:</b> This website may be viewed by friends and families of victims, or school aged children for school project research. We require members to respect the rights and feelings of the families and friends of victims, by placing thought into comments before they are posted. We do understand the issues raised on this site may lead to “heated debate”, but require users to maintain a family friendly environment on the forums.
             Discussion content reflects the views of individual people only.We reserve the right to remove posts deemed offensive without notice, and the right to ban anyone who wilfully violates the forum rules.</p>

      <p>Posted by : <em><?php echo '<b>'.$posted_by.'</b>';?></em></p>
     </div>
     </div>
     </div>

     <?php 
     
    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){ 
    echo '<div class="container">
        <h1 class="py-2">Post a Comment :</h1> 
        <form action= "'. $_SERVER['REQUEST_URI'] . '" method="post"> 
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Type your comment</label>
                <textarea class="form-control" id="comment" name="comment" rows="3"></textarea>
                <input type="hidden" name="sno" value="'. $_SESSION["sno"]. '">
            </div><br>
            <button type="submit" class="btn btn-success">Post Comment</button>
        </form><br><hr>
    </div>';
    }
    else{
        echo '
        
        <div class="container">
        <h1 class="py-2">Post a Comment</h1> 
           <p class="lead">You are not logged in. Please login then you will be able to post comments.</p>
        </div><br><hr>
        ';
    }

    ?>
       <br>

  <div class="container">

         <h1>Discussions :</h1>

    
         <?php
         $id = $_GET['threadid'];
         $sql = "SELECT * FROM `comments` WHERE thread_id=$id"; 
         $result = mysqli_query($conn, $sql);
         $noResult = true;
         while($row = mysqli_fetch_assoc($result)){
             $noResult = false;
             $id = $row['comment_id'];
             $content = $row['comment_content']; 
             $comment_time = $row['comment_time']; 
             $thread_user_id = $row['comment_by']; 

           $sql2 = "SELECT user_name FROM `users` WHERE sno = '$thread_user_id'";
          $result2 = mysqli_query($conn,$sql2); 
          $row2 = mysqli_fetch_assoc($result2);


         echo '<div class="media my-3">
         <img src="https://uxcjs2wtyps2eozlk2xzs7u2-wpengine.netdna-ssl.com/wp-content/themes/true212/images/avatar-placeholder.png"  height=50px width=50px" alt="Logo">
            <div class="media-body">
               <p class="font-weight-bold my-0"><b>'. $row2['user_name'] .' at '. $comment_time. '</p></b> '. $content . '
            </div>
        </div>';

         
         }

         if($noResult){
          echo '<div class="jumbotron jumbotron-fluid bg-dark text-light ">
                  <div class="container">
                      <p class="display-6">No Comments Found</p>
                      <h5>Be the first person to Comment</h5>
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