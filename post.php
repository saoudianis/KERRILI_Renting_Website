<?php
session_start();
require 'dbconfig.php';
if(isset($_GET['post'])){
    
  //get posts from database 
     $posts = $database->getReference('Posts')->getValue();
   //check data
  foreach($posts as $key => $value)
  { 
  if($key==$_GET['post']){
     $available = $value['available']; 
      $description = $value['description']; 
      $pic = $value['pic']; 
      $pin = $value['pin']; 
      $price = $value['price']; 
      $title = $value['title']; 
      $type = $value['type']; 
      $user = $value['userkey'];
      $time = $value['time'];
  }
}
 //get posts from database 
     $users = $database->getReference('Users')->getValue();   
    //check data
foreach($users as $key => $value)
  { 
if($key == $user){
  $email=$value['email'];  
  $phone=$value['phone'];
  $username= $value['username'];
    $pp=$value['pp'];
}
}
$map="https://www.google.com/maps/place/".$pin;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Post</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/finallogo.png" rel="icon">
  <link href="assets/img/finallogo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container-fluid d-flex">

      <div class="logo mr-auto">
        <h1 class="text-light"><a href="index.php">
        <span><img src="assets/img/finallogo.png" alt="Kerrili" class="img-fluid"> KERRILI</span>
        </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <?php
    //loggedIn nav
        if(isset($_SESSION['id'])){include("assets/navbars/hometestlog.php");}
    //Not LoggedIn
        else{
            include("assets/navbars/hometest.php");
        }

        ?><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Search</h2>
          <ol>
            <li><a href="hometest.php">Home</a></li>
            <li>Search</li>
            <li>Post</li>
          </ol>
        </div>

      </div>
    </section><!-- Breadcrumbs Section -->

    <!-- ======= Portfolio Details Section ======= -->
    <section class="portfolio-details">
      <div class="container">

        <div class="portfolio-details-container">
<!-- imgs container -->
          <div class="owl-carousel portfolio-details-carousel">
            
           
            <img src="<?= $pic ?>" class="img-fluid" alt="" style="max-height: 600px; ">
          </div>
<style>
    {
      
    }</style>
          <div class="portfolio-info">
           <img src="<?= $pp ?>" style="border-radius: 50px;float: left;" alt="profile-picture" width="40px" height="40px">
            <h3 style="margin-top: 6px;">&nbsp;&nbsp; <?= $username ?></h3>
            <ul>
              <li><strong>Category</strong>: <?= $type ?></li>
              <li><strong>Date</strong>: <?= $time ?></li>
               <li><strong>Price</strong>: <?= $price ?> DA</li>
               <li><strong>Email</strong>: <?= $email ?></li>
               <li><strong>Phone</strong>: <?= $phone ?></li>
               <?php
                if($available=="yes"){
                    echo'<li style="color: green;float: right">Available</li>';
                }
                if($available=="no"){
                    echo'<li style="color: red;float: right">Not Available</li>';
                }
                ?>
             
            </ul>
          </div>

        </div>

        <div class="portfolio-description">
          <h2><?= $title ?></h2>
          <p>
            <?= $description ?>
          </p>
        </div>
        <div class="map">
           <h3>View In Map </h3>
            <a href="<?= $map ?>" target="_blank"><img src="assets/img/map_image.png" class="img-fluid" alt="the map" width="100%" style="max-height: 350px;"></a>
        </div>
      </div>
    </section><!-- End Portfolio Details Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <?php
    include("assets/navbars/footer.php");
    ?>

  <a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/venobox/venobox.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>