
<?php
session_start();
require 'dbconfig.php';

//change The Password
//if Click on change pass
if(isset($_POST['pass'])){
    //if user login
    if(isset($_SESSION['id'])){
        //take data from input
        $oldPass = $_POST['oldpass'];
        $newPass1 = $_POST['newpass1'];
        $newPass2 = $_POST['newpass2'];
        //if new pass1 = new pass2
        if($newPass1==$newPass2){
            //get data from database
            $fetchdata = $database->getReference('Users')->getValue();
    foreach($fetchdata as $key => $value)
    { //if data = user
        if($_SESSION['id']==$key){
           $Realold = $value['password'];
        }
    } // if oldpass user = old pass database
        if($Realold == $oldPass){
            //if old not equal new
            if($oldPass != $newPass1){
                //Change The Password
                // move the data into a table
        $Newpass = [
	'password'	=>	$newPass1];
                //update data
        $ref='Users/'.$_SESSION['id'];
$updatepass = $database->getReference($ref)->update($Newpass);
                //success msg
                $_SESSION['passmsg']='<div class="alert alert-success" role="alert">
  Your Password Has Been Reset Successfully ...!
</div>';
            }//if old equal new
            else{$_SESSION['passmsg']='<div class="alert alert-danger" role="alert">
  The New Password = The Last Password Please Change it ...!
</div>';}
        }// if oldpass user != old pass database
            else{$_SESSION['passmsg']='<div class="alert alert-danger" role="alert">
  The Old Password You Just Enter Was Wrong ...!  
</div>';}
    }//if new pass1 != new pass2
        else{$_SESSION['passmsg']='<div class="alert alert-danger" role="alert">
  The New Passwords Are Not The Same ...!
</div>';}
}
}

//update button
if(isset($_POST['submit'])){
    if(isset($_SESSION['id'])){
        //take data from the form
        $username= $_POST['username'];
        $phone= $_POST['phone'];
        // move the data into a table
        $AppData = [
	'username'	=>	$username,
	'phone'	=>	$phone
];
        //update data
        $ref='Users/'.$_SESSION['id'];
$updatedata = $database->getReference($ref)->update($AppData);
        //refresh the page 
        header("location: profile.php");
    }
    
}
//Bring data
if(isset($_SESSION['id'])){
    
$fetchdata = $database->getReference('Users')->getValue();
    foreach($fetchdata as $key => $value)
    {
        if($_SESSION['id']==$key){
            
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Profile</title>
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
        if(isset($_SESSION['id'])){include("assets/navbars/profile.php");}
    //Not LoggedIn
        else{
            header("location:hometest.php");
        }

        ?>
      <!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

 <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Profile Page</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>Profile Page</li>
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
            <div class="authentication-form mx-auto">
                <?php
                if(isset($_SESSION['passmsg'])){
                    echo $_SESSION['passmsg'];
                    unset($_SESSION['passmsg']);
                }
                ?>
            <!-- Profile Pic -->
                <style>
                .hovereffect {
  width: 100%;
  height: 100%;
  float: left;
  overflow: hidden;
  position: relative;
  text-align: center;
  cursor: default;
  background: rgb(255,145,0);
background: linear-gradient(90deg, rgba(255,145,0,1) 0%, rgba(238,228,0,1) 63%, rgba(235,240,241,1) 100%);
}

.hovereffect .overlay {
  width: 100%;
  height: 100%;
  position: absolute;
  overflow: hidden;
  top: 0;
  left: 0;
  padding: 2em;
  text-align: left;
}

.hovereffect img {
  display: block;
  position: relative;
  max-width: none;
  width: calc(100% + 40px);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-20px,0,0);
  transform: translate3d(-20px,0,0);
}


}

.hovereffect .overlay:before {
  position: absolute;
  top: 20px;
  right: 20px;
  bottom: 20px;
  left: 20px;
  border: 1px solid #fff;
  content: '';
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-10px,0,0);
  transform: translate3d(-20px,0,0);
}

.hovereffect a, .hovereffect p {
  color: #FFF;
  opacity: 0;
  filter: alpha(opacity=0);
  -webkit-transition: opacity 0.35s, -webkit-transform 0.45s;
  transition: opacity 0.35s, transform 0.45s;
  -webkit-transform: translate3d(-1px,0,0);
  transform: translate3d(-50px,0,0);
}

.hovereffect:hover img {
  opacity: 0.6;
  filter: alpha(opacity=60);
  -webkit-transform: translate3d(0,0,0);
  transform: translate3d(0,0,0);
}

.hovereffect:hover .overlay:before,
.hovereffect:hover a, .hovereffect:hover p {
  opacity: 1;
  filter: alpha(opacity=100);
  -webkit-transform: translate3d(-7px,0,0);
  transform: translate3d(-7px,0,0);
     
}
                </style>
               <center> <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 logo-centered">
    <div class="hovereffect logo-centered" style="border-radius: 50px;">
        <img src="<?= $value['pp'] ?>" style="border-radius: 50px;" alt="" width="80px" height="80px" class="pp">
            <div class="overlay">
               
				<p>
					<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#ModalCenter" ><i class="fas fa-edit" ></i></a>
				</p>
            </div>
       </div>
</div></center>
                <br><br><br><br>     
           
              <!-- Modal -->
<div class="modal fade" id="ModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Change Profile Picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <!-- Seccess alert -->
          <div class="alert alert-success" role="alert"  id="seccess" style="display: none;">
  Your Profile Picture Succesfully updated ...!
</div>
          <!-- error alert -->
          <div class="alert alert-danger" role="alert" style="display: none;" id="error">
  There is an error please refresh the page and try again ...!
</div>
          <!-- Form -->
        <form enctype="multipart/form-data">
        <label>select image : </label>
        <input type="file" id="image" accept="image/*"><br><br>
      
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" style="background-color: #eb5d1e;" onclick="upload()">Save changes</button>
      </div>
    </div>
  </div>
</div>              
                 
        <!-- Titles -->                    
        <h3 style="margin-right: 20px;margin-left: 20px">Welcome Back to Your KERRILI Profile</h3>
        <p style="margin-right: 20px;margin-left: 20px">Here You Can Change Your Perssonal Info</p>
        <!-- alert --> 
                                          
                          
            <form method="post" style="margin-right: 20px;margin-left: 20px">
    
     <!-- UserName Button -->
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-user">&nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Username" required="" name="username" value="<?= $value['username'] ?>" minlength="4">
    </div>
     
     <!-- Phone Button -->         
    <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-phone-alt">&nbsp;</i></span>
      </div>
      <input type="text" pattern="[05|06|07|+213]{2,4}[0-9]{8,9}" class="form-control" placeholder="Phone Num" required="" name="phone" minlength="10" value="<?= $value['phone'] ?>">
    </div>
               
               
              
                               
                     
            <!-- Submit Button -->                   
                              
        <div class="sign-btn text-center ">
                     <input  type="submit" class="btn-get-started scrollto kbuttons" value="Save Changes" style="height: 40px;margin-bottom: 10px;width:300px" name="submit">
                                    
                                </div>
                              
  <?php
                     }
    }
}
?>                             
                
                                  

        
                            </form><br>
                
                
                <!-- ReSet Password Modal -->
<div class="modal fade" id="ReSetPass" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Change Your Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <form method="post">
      <div class="modal-body">
        <label>You Last Password:</label>
         <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-unlock">&nbsp;</i></span>
      </div>
      <input type="password" class="form-control" placeholder="LastPassword" required="" name="oldpass" id="password" minlength="6">
    </div> 
        <label>New Password</label>
         <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock">&nbsp;</i></span>
      </div>
      <input type="password" class="form-control" placeholder="The New Password" required="" name="newpass1" id="password" minlength="6">
    </div>     
            <label>Repeat Password</label>
         <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-lock">&nbsp;</i></span>
      </div>
      <input type="password" class="form-control" placeholder="Repeat" required="" name="newpass2" id="password" minlength="6">
    </div> 
          
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn" style="background-color: #eb5d1e;color: white;" name="pass">Change Password</button>
      </div>
            </form>
    </div>
  </div>
</div>
                <?php
                if(isset($_SESSION['fb'])){
                    if($_SESSION['fb']=="true"){
                        
                    }
                }else{echo'<center> <div class="register">
            <p style="margin-right: 20px;margin-left: 20px">Want To Change Password ? <button type="button" class="btn" data-toggle="modal" data-target="#ReSetPass" style="background-color: #eb5d1e;color: white;"> Click-Here</button></p>
                            </div></center>';}
                
                ?>
                
        
                        </div>
                    </div>
                </div>
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
<script src="ppupload.js" type="text/javascript"></script>

    
    </body></html>