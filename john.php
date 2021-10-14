<?php
$dbservername="locaalhost";
$dbusername="root";
$dbpassword="";
$dbname="registraion";
//create connection
$conn=mysqli_connect($dbservername,$dbusername,$dbpassword,$dbname) 
 // check connection
if(!$conn){
    die("connection failed:".
   mysqli_connect_error());
}
each"connected successfully";
?>