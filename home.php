
<?php
session_start();
if(isset($_SESSION['id'])){
?>

you are logged-in !!!
<a href="login.php?logout=1" class="nav-link"><button>LogOut</button></a>

<?php
}
echo $_SESSION['id'];
?>