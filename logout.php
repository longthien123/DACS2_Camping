<?php
session_start();
setcookie("user_cookie", "", time() - 3600);
setcookie("idu", "", time()-3600);
unset($_SESSION['giohang']);
header("location: index.php");
?>