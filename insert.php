<?php
define("DB_user","root");
define("DB_host","localhost");
define("DB_name","register");
if($_SERVER["REQUEST_METHOD"]--"POST")
$sql="INSERT INTO kenya(firstname,lasrname,phone,username,gender,year,password)
VALUE('John','Kamau',0758012862',Johnny Johnson','Male','2021','Johnkamau7')";
    if($conn->query($sql)===TRUE)
    {
echo "New record created successfully";
    }else{
        echo "error:".$sql."<br>".$conn->error;
    }
    $conn->close();
?>