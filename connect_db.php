<?php
$host = "localhost";
$userdb = "root";
$password = "";
$database = "camping";
$con = mysqli_connect($host, $userdb, $password, $database);
if (mysqli_connect_errno()){
    echo "Connection Fail: ".mysqli_connect_errno();exit;
}