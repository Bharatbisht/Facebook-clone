<?php
    
    session_start();
    $loginid=$_SESSION['loginid'];
    $uname=$_SESSION['uname'];
    $password=$_SESSION['password'];
    $email=$_SESSION['email'];
    $Gender=$_SESSION['gender'];
    $dob=$_SESSION['date'];
    $address=$_SESSION['address'];
    $imagename=$_SESSION['imagename'];
    session_destroy();
    $query="INSERT INTO `fbtable` VALUES('$loginid','$uname','$password','$Gender','$email','$dob','$address','$imagename')";
    include('connect.php'); 
    $con=new Connect();
    $con->insert($query);
?>