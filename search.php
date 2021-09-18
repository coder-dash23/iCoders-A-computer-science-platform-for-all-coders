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

        background-color: #ffbe45;

        }

        .searchResult{
           margin-top: 20px;
           padding-top: 23px;
        }
    </style>

  </head>

  
  <body>

      <?php
         include 'dbconnect.php';
         include 'header.php';
       
?>

   

   <div class="container my-4">
       <h1 class = "searchResult">Search result for <em>"<?php echo $_GET['search']?>"</em></h1><hr><br>

       <?php
      $noresults = true;
     $query = $_GET["search"];
     $sql = "select* from threads where match (thread_title, thread_desc) against ('$query')"; 
     $result = mysqli_query($conn, $sql);
     while($row = mysqli_fetch_assoc($result)){
     $title = $row['thread_title'];
     $desc = $row['thread_desc']; 
     $thread_id= $row['thread_id'];
     $url = "thread.php?threadid=". $thread_id;
     $noresults = false;


           echo '<div class="result">
           <h4 mx-3><a href="'. $url. '" class="text-dark">'. $title. '</a> </h4>
           <p>'. $desc .'</p>
        </div>'; 
     }


     if ($noresults){
        echo '<div class="jumbotron jumbotron-fluid bg-dark text-light">
                <div class="container mx-2 my-4">
                    <p class="display-3">No Results Found</p>
                    <p class="lead mx-1"> Suggestions: <ul>
                            <li>Make sure that all words are spelled correctly.</li>
                            <li>Try different keywords.</li>
                            <li>Try more general keywords. </li></ul>
                    </p>
                </div>
             </div>';
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

  
  </body>

</html>