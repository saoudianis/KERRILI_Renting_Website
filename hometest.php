<?php
session_start();
//if clicked on search button
if(isset($_POST['search'])){
//take the infos from post and made a get method url
    $url = "search.php?wilayas=".$_POST['wilayas']."&type=".$_POST['type']."&price=".$_POST['price']."&search=SEARCH";
        
     //go to search page with our info  
    header("location:".$url);
    
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Home</title>
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
  <script src="https://kit.fontawesome.com/a076d05399.js"></script>

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style>
    /*kerrili buttons*/
     html, body {
margin: 0;
}
.kbuttons{
  background: #eb5d1e;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
  border-radius: 4px;
     
    
}
#topContainer{
                background-image: url(assets/img/wcover.png);
                background-position: center center;
                width: 100%;
                background-size: cover;
                  width: 100vw;
    box-sizing: border-box;
    
            }
     
    </style>
</head>

<body>
 <main id="main">
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

 
    </main>
   
   
    
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Search</h2>
          <ol>
            <li><a href="index.php">Home</a></li>
            <li>Search</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
    
    <!-- ======= Main ======= -->
 <div class="container contentContainer" id="topContainer" >
         
        <div class="row d-flex justify-content-between h-100">
            <div class="col-md-12 col-lg-12 my-auto" id="toprow">
            <div class="text-center">
             <center> <img src="assets/img/homehead.png" style="border-radius: 20px" alt="" width="250px" height="250px">
             <h2>There are millions of homes out there.</h2>
             <h4> Let's find the one that's perfect for you.</h4>
             </center><center>
           <form method="post">
               <!-- ======= wilayas ======= -->
               <select class="custom-select my-1 mr-sm-2" name="wilayas">
                <option selected disabled>SELECT WILAYA  </option>
                 <option value="Alger">Alger</option>
                  <option value="Constantin">Constantin</option>
                  <option value="Oran">Oran</option>
                  <option value="Béjaïa">Béjaïa</option>
                   <option value="Tilemcen">Tilemcen</option>
                   <option value="Adrar">Adrar</option>
                   <option value="Chlef">Chlef</option>
                   <option value="Laghouat">Laghouat</option>
                   <option value="Biskra">Biskra</option>
                   <option value="Béchar">Béchar</option>
                   <option value="Blida">Blida</option>
                   <option value="Tiaret">Tiaret</option>
                   <option value="Tamanrast">Tamanrast</option>
                   <option value="Guelma">Guelma</option>
                   <option value="Tizi Ouzou">Tizi Ouzou</option>
                   <option value="Msila">Msila</option>
                   <option value="Khanchla">Khanchla</option>
                   <option value="Elma">Elma</option>
                   <option value="Saïda">Saïda</option>
                   <option value="Skikda">Skikda</option>
                   <option value="Bouira">Bouira</option>
                   <option value="Mila">Mila</option>
                   <option value="Mascar">Mascar</option>
                   <option value="Ouargla">Ouargla</option>
                   <option value="Bayadh">Bayadh</option>
                   <option value="Ilizi">Ilizi</option>
                   <option value="Tarf">Tarf</option>
                   <option value="Tindouf">Tindouf</option>
                   <option value="Tisemsilt">Tisemsilt</option>
                   <option value="Sog Ahras">Sog Ahras</option>
                   <option value="Ain Témouchent">Ain Témouchent</option>
                   <option value="Setif">Setif</option>
                   <option value="Batna">Batna</option>
                   <option value="Djelfa">Djelfa</option>
                   <option value="BBA">BBA</option>
                   <option value="Annaba">Annaba</option>
                   <option value="Bomrdas">Bomrdas</option>
                   <option value="Médéa">Médéa</option>
                   <option value="Tipassa">Tipassa</option>
                   <option value="El Oued">El Oued</option>
                   <option value="Naâma">Naâma</option>
                   <option value="Relizane">Relizane</option>
                   <option value="Timimoun">Timimoun</option>
                   <option value="Touggourt">Touggourt</option>
                   <option value="Ain defla">Ain defla</option>
                   <option value="Om Bouaghi">Om Bouaghi</option>
                   <option value="Sidi belabbes">Sidi belabbes</option>
                   <option value="Jijel">Jijel</option>
            </select> 
             <!-- ======= type ======= -->
              <select class="custom-select my-1 mr-sm-2" name="type">
                <option selected disabled> SELECT TYPE </option>
                 <option value="House">House</option>
                   <option value="Apartment">Apartment</option>
                     <option value="Garag">Garag</option>
                  <option value="Party halls">Party halls</option>
            </select> 
             <!-- ======= price ======= -->
              <select class="custom-select my-1 mr-sm-2" name="price">
                  <option selected disabled> SELECT PRICE </option>
                  <option value="10000">>= 10000 DA</option>
                    <option value="15000">>= 15000 DA</option>
                    <option value="L20000">>= 20000 DA</option>
                    <option value="M20000">+ 20000 DA</option>
            </select> 
                <div class="sign-btn text-center ">
                     <input  type="submit" class="btn-get-started scrollto kbuttons" value="SEARCH" style="height: 40px;margin-bottom: 10px;width:300px;margin-top: 10px;" name="search"> </div>
           </form></center>
                   
               
                
                </div></div></div></div>
   

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



<!-- The core Firebase JS SDK is always required and must be listed first -->
<script src="https://www.gstatic.com/firebasejs/8.2.4/firebase.js"></script>

<!-- TODO: Add SDKs for Firebase products that you want to use
     https://firebase.google.com/docs/web/setup#available-libraries -->
<script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-analytics.js"></script>
<script src="https://www.gstatic.com/firebasejs/8.2.4/firebase-auth.js"></script>

<script>
  // Your web app's Firebase configuration
  // For Firebase JS SDK v7.20.0 and later, measurementId is optional
  var firebaseConfig = {
    apiKey: "AIzaSyDRgwuDAa9B8kotsxPqGR0nb6UGMF0kVt0",
    authDomain: "kerrili.firebaseapp.com",
    databaseURL: "https://kerrili-default-rtdb.firebaseio.com",
    projectId: "kerrili",
    storageBucket: "kerrili.appspot.com",
    messagingSenderId: "166943417273",
    appId: "1:166943417273:web:d414e1be4af985c5f58c68",
    measurementId: "G-RF2WX2KS33"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  firebase.analytics();
</script>
<script src="fb-login.js" type="text/javascript"></script>
 <script>
        $(".contentContainer").css("height",($(window).height()));
        </script>
</body>

</html>