
<?php

$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbserver = "testdb";



$conn = mysqli_connect($dbhost, $dbusername, $dbpassword, $dbserver);

if(!$conn){
    die("database connection failed"); 
}

?>