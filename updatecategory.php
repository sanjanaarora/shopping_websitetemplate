<?php
include_once 'connection.php';
include 'adminheader.php';
$catname = $_POST["categoryname"];
$catdescription = $_POST["categorydescription"];

$qury = "UPDATE `category` SET `categorydescription`='$catdescription' WHERE `categoryname`='$catname'";
echo $qury;
if (mysqli_query($conn, $qury)) {
    echo "Update Success";
    header("location:showcategory");
} else {
    echo "Update Failed";
    header("location:showcategory");
}
