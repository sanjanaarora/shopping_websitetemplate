<?php
include_once 'cart.php';
include_once 'adminheader.php';
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];

    $user = "select * from signup where email='$email'";
    $user_result = mysqli_query($conn, $user);
    $user_row = mysqli_fetch_array($user_result);
}
date_default_timezone_set("Asia/Kolkata");
$billid = $_POST["billid"];
$remarks = $_POST["remarks"];
$fullname = $user_row["fullname"];
$currentDateTime = date('Y-m-d H:i:s');
$update = "UPDATE `bill` SET status='cancelled', returnremarks = '$remarks' WHERE `id`='$billid'";
$msg = "Dear " .$fullname  . ",\nYour Order is Cancelled with following reason .\n " . $remarks . "\n Date/Time " . $currentDateTime;

//foreach ($ar as $item) {
//    $stock = $item->stock + $item->qty;
//    $update2 = "UPDATE `product` SET `stock`='$stock' WHERE `productid`=" . $item->id;
//    mysqli_query($conn, $update2);
//

if (mysqli_query($conn, $update)) {
    $ch = curl_init();
    $mobile = $user_row["mobile"];

    $message = urlencode($msg);
    curl_setopt($ch, CURLOPT_URL, "http://server1.vmm.education/VMMCloudMessaging/AWS_SMS_Sender?");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,
        "username=JulyBatchPHP2019&password=PHFDUD2Y&message=" . $message . "&phone_numbers=" . $mobile);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    print_r($ch);
    $server_output = curl_exec($ch);

    curl_close($ch);
    echo "Update Success";

    header("location:myorder.php");
} else {
    echo "Update Failed";
    header("location:myorder.php");
}

