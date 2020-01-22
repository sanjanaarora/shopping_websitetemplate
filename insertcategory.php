<?php
include 'adminheader.php';
include_once 'connection.php';

$categoryname = $_POST["categoryname"];
$categorydescription = $_POST["categorydescription"];

$qury = "INSERT INTO `category`(`categoryname`, `categorydescription`) VALUES ('$categoryname','$categorydescription')";
if (mysqli_query($conn, $qury)) {
    echo "Insert Success";
    header("Location:addcategory.php?er=1");
} else {
    echo "Insert Failed";
    header("Location:addcategory.php?er=2");
}
