<?php
include_once 'connection.php';

$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$connpassword = $_POST["conpassword"];
$mobile= $_POST["mobile"];
$fullname =$_POST["fullname"];

if ($password ==$connpassword)
{
    $qury ="INSERT INTO `admin`(`username`, `email`, `password`, `mobile`, `fullname`) VALUES ('$username','$email','$password','$mobile','$fullname')";
    if (mysqli_query($conn, $qury)) {
        echo "Insert Success";
        header("location:loginpage.php");
    } else {
        echo "Insert Failed";
        header("location:add_admin.php");
    }
}
else{
    header("location:add_admin.php?msg=Password and confirm password could not match");
}