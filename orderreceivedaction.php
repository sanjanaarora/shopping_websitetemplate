<?php
include_once 'adminheader.php';
date_default_timezone_set("Asia/Kolkata");

$billid = $_POST["billid"];
$person = $_POST["person"];
$fullname = $_POST["fullname"];
$currentDateTime = date('Y-m-d H:i:s');

$update = "UPDATE `bill` SET status='delievered', personreceived='$person' WHERE `id`='$billid'";
$msg = "Dear " . $fullname . ",\nYour Order is received by .\n " . $person . "\n receiving Date/Time " . $currentDateTime;

if (mysqli_query($conn, $update)) {
    echo "Update Success";
    $ch = curl_init();
    $mobile = $_POST["mobile"];

    $message = urlencode($msg);
    curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "username=JulyBatchPHP2019&password=PHFDUD2Y&message=" . $message . "&phone_numbers=" . $mobile);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    print_r($ch);
    $server_output = curl_exec($ch);

    curl_close($ch);


    header("location:vieworder.php");
} else {
    echo "Update Failed";
    header("location:vieworder.php");
}

