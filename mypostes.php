<?php
session_start();
require 'dbconfig.php';
//if click on Available 
if(isset($_POST['Available'])){
    //if user login
    if(isset($_SESSION['id'])){
       //post post id
        if(isset($_POST['postid'])){
            // move the data into a table
        $AppData = [
	'available'	=>	'no'
];
        //update data
        $ref='Posts/'.$_POST['postid'];
$updatedata = $database->getReference($ref)->update($AppData);
        }
    }
}

//if click on Not Available 
if(isset($_POST['NAvailable'])){
    //if user login
    if(isset($_SESSION['id'])){
       //post post id
        if(isset($_POST['postid'])){
            // move the data into a table
        $AppData = [
	'available'	=>	'yes'
];
        //update data
        $ref='Posts/'.$_POST['postid'];
$updatedata = $database->getReference($ref)->update($AppData);
        }
    }
}

//if Delete A post
if(isset($_POST['dlt'])){
     //if user login
    if(isset($_SESSION['id'])){
        //post post id
        if(isset($_POST['postid'])){
             $ref='Posts/'.$_POST['postid'];
    $database->getReference($ref)->remove();
        }
    }
}

//if user signIn
if(isset($_SESSION['id'])){
    //bring data from Postes
    $fetchdata = $database->getReference('Posts')->getValue();
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MyPostes</title>
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
        .cardcont{
            margin-top: 50px;
            margin-bottom: 20px;
        }
        h3,h2{
            margin-left: 5%;
            margin-top: 20px;
        }
        .headcont{
            margin-top: 70px;         
        }
        .add{
            float: right;
            background-color: #eb5d1e;
            color: white;
            margin-right: 5%;
            width: 70px;
            height: 70px;
            margin-top: 30px;
        
            border-radius: 50%;
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
        if(isset($_SESSION['id'])){include("assets/navbars/mypostes.php");}
    //Not LoggedIn
        else{
            header("location:hometest.php");
        }

        ?><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->

 
    
   
   
    
    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container headcont">

        <div class="d-flex justify-content-between align-items-center">
          <h2>MyPostes</h2>
          <ol>
            <li><a href="index.html">Home</a></li>
            <li>My-Postes</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->
    
    <!-- Modal -->
<div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add A New Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
          <!-- Seccess alert -->
          <div class="alert alert-success" role="alert"  id="seccess" style="display: none;">
  Your Post Succesfully upload in KERRILI ...!
</div>
          <!-- error alert -->
          <div class="alert alert-danger" role="alert" style="display: none;" id="error">
  There is an empty element please complete all elements ...!
</div>
          
        <!-- user id -->
          <input type="hidden" value="<?php echo $_SESSION['id']; ?>" id="user">
          <!-- titel Button -->
          <label>Titel</label>
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope">&nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Titel" required="" name="titel" id="titel">
    </div>
          <!-- Description Button -->
          <label>Discription</label>
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fas fa-envelope">&nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Discription" required="" name="discription" id="discription">
    </div>
          <!-- Pin Button -->
          <label>Location Pin</label>
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><a href="https://www.google.com/maps/" target="_blank"> <i class="fa fa-question-circle">&nbsp;</i></a></span>
      </div>
      <input type="text" class="form-control" placeholder="Pin (Copy It From Google)" required="" name="pin" id="pin">
    </div>
          <!-- Price Button -->
          <label>Price</label>
     <div class="input-group mb-3">
      <div class="input-group-prepend">
        <span class="input-group-text"><i class="fa fa-dollar">$ &nbsp;</i></span>
      </div>
      <input type="text" class="form-control" placeholder="Price" required="" name="price" id="price">
    </div>
          
          <!-- Wilaya Button -->
          <label>Wilaya Pin</label>
          <select class="custom-select my-1 mr-sm-2" name="wilayas" id="wilaya">
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
          <label>Type</label>
              <select class="custom-select my-1 mr-sm-2" name="type" id="type">
                <option selected disabled> SELECT TYPE </option>
                 <option value="House">House</option>
                   <option value="Apartment">Apartment</option>
                     <option value="Garag">Garag</option>
                  <option value="Party halls">Party halls</option>
            </select>
          
          <!-- Wilaya Button -->
          <br>
          <label><i class="fa fa-camera"></i> select image : </label>
        <input type="file" id="image" accept="image/*"><br>
          
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" style="background-color: #eb5d1e;" onclick="upload()">Upload</button>
      </div>
    </div>
  </div>
</div>
    
    <!--lunch modal-->
    <button type="button" style="" class="btn add" data-toggle="modal" data-target="#form"><i class="fa fa-plus-square"></i></button><br>
    <!-- Afficher les postes -->
    <h3>Your Postes :</h3>
    
    <div class="container cardcont">
        <div class="row">
           
    <a href=""></a>
<div class="card-group">
    
    <?php
    //if Post from that user
    foreach($fetchdata as $key => $value)
    { //if we get a post from that user
       if($_SESSION['id']==$value['userkey']){
         $url = "post.php?post=".$key;
        
        echo'<div class="col-sm-4 col-md-4">
  <div class="card">
    <img
      src="'.$value['pic'].'"
      class="card-img-top"
      alt="..." style="max-height: 230px;min-height: 230px;"
    />
    <div class="card-body">
      <a href="'.$url.'"><h5 class="card-title">'.$value['title'].'</h5></a>
      <p class="card-text">
        '.$value['description'].'
      </p>
      <h4 class="card-text"><strong>'.$value['price'].'DA</strong></h4>';
           //start a Form
           echo '<form method="post">';
           echo '<input type="hidden" value="'.$key.'" name="postid">';
           //Available or Not
        if($value['available']=="yes"){ echo '
        <button type="submit" class="btn btn-success" style="float: right" name="Available">Available</button>
     
      <p class="card-text">
        <small class="text-muted">'.$value['time'].'</small>
      </p>
      <button type="submit" class="btn btn-danger" name="dlt">Delete</button>
    </div>
      </div></div>';}
    if($value['available']=="no"){ echo '
    <button type="submit" class="btn btn-danger" style="float: right" name="NAvailable">Not Available</button>
    
      <p class="card-text">
        <small class="text-muted">'.$value['time'].'</small>
      </p>
      <button type="submit" class="btn btn-danger" name="dlt">Delete</button>
    </div>
      </div></div>';}  
       echo '</form>';
       } 
    }
}

    ?>
    
    
      </div>
          
           </div></div>
    
 
     
 <!-- ======= /...POSTS ======= --> 
    
    
    
    <input type="hidden" value="" name="postid">
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
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
<script src="Upost.js" type="text/javascript"></script>
</body>

</html>