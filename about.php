<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

    
    <title>iCoders | A computer science platform for all coders</title>
    <link rel="stylesheet" href = "CSS/style.css">
    <style>
      *{
  margin: 0px;
  padding: 0px;
}


body {
    min-height: 100vh;
    margin: 0;
    line-height: 1.5;
    background: url('img/img5.jpeg');
    background-size: cover;
    background-position: center;
}
    body#bg-image1:after{
        content: '';
        position: fixed;
        top: 0;
        right: 0;
        width: 100%;
        height: 100vh;
        z-index: -1;
        background: rgba(22, 4, 4, 0.9);
    
}
    

    .sm-heading {
      margin-bottom: 2rem;
      padding: 0.2rem 1rem;
      background: #00000060;
      color: white;
      box-shadow: 2px 2px 4px 0px #00000060; }
  
     
        .box{
          margin-top: 32px;
        }
  
        .box h2{
          color: #ff1717;
        }

        .about{
            color:  rgb(145 252 4);
            font-size:90px;
            margin-top: -9px;
        }
        .bioh3{
            color:  rgb(145 252 4);
           font-size: 70px;
         }
            
    .para{
         color: white;
        background: #00000060;
        box-shadow: 2px 2px 4px 0px #00000060;;
    }

   


  main {
    padding: 4rem;
    min-height: calc(100vh - 60px); }
    main .icons {
      margin-top: -2rem; }
      main .icons a {
        padding: 0.4em;
        display: inline-block; }
        main .icons a i {
          text-shadow: 3px 3px 10px #00000060; }
        main .icons a:hover {
          color: #ffc514;
          transform: translateY(-2px);
          transition-duration: .2s; }
    main#home {
      overflow: hidden; }
      main#home h1 {
        margin-top: 20vh; }
  
  .about-info {
    display: grid;
    grid-gap: 30px;
    grid-template-areas: 'bioimage bio bio' 'sm-heading sm-heading sm-heading' 'job1 job2 job3';
    grid-template-columns: repeat(3, 1fr); 
    margin-top: 60px;
}
    .about-info .bio-image {
      grid-area: bioimage;
      margin-left: 12px;
      border-radius: 50%;
      border: #0ae71d 4px solid; }
    .about-info .bio {
      grid-area: bio;
      font-size: 1.5rem; }
    
  
 
  
  @media screen and (max-width: 500px) {
    main#home h1 {
      margin-top: 10vh; } 
    }
  
    </style>
  </head>
  <body>

      <?php
         include 'dbconnect.php';
        include 'header.php';
       
        
    
?>
    
    <main id="about">
        <h1 class="lg-heading">
            <h1 class = "about">About Me</h1>
        </h1>
        <h2 class="sm-heading">
            You only live once, but if you do it right, once is enough.
        </h2>
        <div class="about-info">
            <img src="img/img4.jpeg" alt="Adarsh Jasiwal" class="bio-image" width="70%">
            
            <div class="bio">
                <h3 class="bioh3">BIO </h3>
                <p class = "para"> Hi! There, My Name is Adarsh Jaiswal currently I am pursuing my profession as a Engineer from University school of information, communication and technology and as a learner,developer,coder enthusiast .Still young and exploring. Believes in experiencing everything new in life and making an impact through hard-work and consistency.</p>
            </div>

            
    </main>
 

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


