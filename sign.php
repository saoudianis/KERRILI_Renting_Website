<?php
//require 'signup.php';
//include("signup.php");
if(isset($_SESSION['id'])){header('location:hometest.php');}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sign-Up</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  
  <style>
    /*kerrili buttons*/
.kbuttons{
  background: #eb5d1e;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
  border-radius: 4px;
     
    
}
    </style>
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
        include("assets/navbars/signup.php");
        ?><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Sign-Up Page</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Sign-Up Page</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container-fluid h-100">
      <div class="row flex-row h-100 bg-white">
                    <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
            <!-- Bg KERRILI Logo -->
            <div class="lavalite-bg" style="background-image: url('assets/img/orange.png'); height: 600px;">
                 <div class="lavalite-overlay"></div>
                        </div>
                    </div>
          
          
          
                    <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
            <div class="authentication-form mx-auto" id="row1">
            <!-- Head Pic -->
            <div class="logo-centered">
            <center> <a href="index.php"><img src="assets/img/finallogo.png" style="border-radius: 20px" alt="" width="50px" height="50px"></a></center>
                            </div>
                            
                            
        <!-- Titles -->                    
        <h3 style="margin-right: 20px;margin-left: 20px">New to KERRILI ?</h3>
        <p style="margin-right: 20px;margin-left: 20px">Join us today! It takes only few steps</p>
        <!-- error alert -->
          <div class="alert alert-danger" role="alert" style="display: none;" id="error">
  There is an empty element please complete all elements ...!
</div>                 
        <div id="message"> <?php if(isset($result)){echo $result;} ?> </div>
                          
            <form method="post" style="margin-right: 20px;margin-left: 20px">
    <!-- UserName Button -->           
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text">&nbsp;<i  class="fas fa-user">&nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Username" required="" name="username" id="username" >
    </div>
     <!-- Email Button -->
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope">&nbsp;</i></span>
      </div>
      <input type="email" class="form-control" placeholder="Email" required="" name="email" id="email">
    </div>
     <!-- Phone Button -->
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone-alt">&nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Phone" required="" id="number" name="phone">
    </div>
     <!-- Password Button -->         
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-unlock">&nbsp;</i></span>
      </div>
      <input type="password" class="form-control" placeholder="Password" required="" name="password" id="password" minlength="6">
    </div>
            <center><div id="recaptcha-container"></div></center>   
               
              
                               
                     
            <!-- Submit Button -->                   
                              
        <div class="sign-btn text-center ">
                     <input  type="button" class="btn-get-started scrollto kbuttons" value="Register" style="height: 40px;margin-bottom: 10px;width:300px" onclick="phoneAuth();" name="submit">
                                    
                                </div>
                              
                               
                
                                  
<!-- Social Media buttons -->                                                                      
<div class="row">
   
   
    <div class="col">
      <div class="sign-btn float-right">
        <a class="btn btn-primary" style="background-color: #3b5998" href="#!" role="button" onclick="signin()" id="fb-up"
  >&nbsp;&nbsp;<i class="fab fa-facebook-f">&nbsp;&nbsp;Faceook</i
>&nbsp;&nbsp;</a>
                                    
  </div>
    </div>
    
    
    <div class="col">
      <div class="sign-btn float-left ">
         <a class="btn btn-primary" style="background-color: #dd4b39" href="#!" role="button"
  >&nbsp;&nbsp;<i class="fab fa-google">&nbsp;&nbsp;Google</i
>&nbsp;&nbsp;</a>       
                                    
</div>
    </div>        
              
            </div>
        
                           
     <div class="register">
         <p style="margin-right: 20px;margin-left: 20px">Already have an account? <a href="login.php">Log In</a></p>
                            </div>
                        
                    
               
             
        
                            </form>        
        </div><!-- end S1 --> 
                           <!-- verify display div -->
              <div style="display: none;" id="veri">  
      
 <!-- Head Pic -->
            <div class="logo-centered">
            <center> <a href="index.php"><img src="assets/img/cpn.png" style="border-radius: 10px" alt="" width="70px" height="70px"></a></center>
                            </div>
                            
                            
        <!-- Titles -->                    
        <h3 style="margin-right: 20px;margin-left: 20px">Conferme you phone number on KERRILI</h3>
        <p style="margin-right: 20px;margin-left: 20px">ُEnter your verification code ...</p>
                          
           
     <!-- Phone Button -->
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone-alt">&nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Enter verification code" required="" id="verificationCode" id="verificationCode" name="verify">
    </div>
      
               
              
                               
                     
            <!-- verify Button -->                   
                              
        <div class="sign-btn text-center ">
                     <input  type="button" class="btn-get-started scrollto kbuttons" value="Verify" style="height: 40px;margin-bottom: 10px;width:300px" onclick="codeverify();" name="verify" id="verify">
                                    
                                </div>
                              
                               
                
                                  
</div>            
                        
       </div><!-- end 2col -->
          

       </div>
        <!-- End row -->
      
        
        </div>
       

    </section>

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
<script src="phonenb2.js" type="text/javascript"></script>




    <script src="fb-login.js" type="text/javascript"></script>
  
</body>

</html>