
<?php 
session_start();
 for($i=0; $i<=5;$i++){
     $_SESSION['giohang'][$_GET['id']][$i]=NULL;}
 header("location: cart.php");
?>