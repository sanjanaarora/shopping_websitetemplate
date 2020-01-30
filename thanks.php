<?php
include "cart.php";
@session_start();
include "connection.php";
?>
<!DOCTYPE html>
<html lang="en">
<!-- Head -->
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>
<body>
<!-- banner -->
<?php
if (!isset($_SESSION["email"])) {
    include "publicheader.php";
    $email = "";
} else {
    include "userheader.php";
}

?>
<!-- //banner -->
<div class="container">
    <div class="w3ls-heading">
        <h3>Thanks</h3>
    </div>

</div>
<div class="bhoechie-tab-content">
    <div class="container">
        <div class="jumbotron">
            Thank you for Booking with us. Your Booking ID is <?php echo $_REQUEST['q']; ?>
        </div>
    </div>

</div>
<?php
include "footer.php"
?>
</body>
<!-- //Body -->
</html>