<?php
ob_start();
include_once "connection.php";
include_once "headerfiles.html";
@session_start();
if (isset($_SESSION["email"])) {
    $email = $_SESSION["email"];
} else {
    header("location:userloginpage.php");
}
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Shopping Website</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="userhome.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!--            <li class="nav-item active">-->
            <!--                <a class="nav-link" href="admin_changepassword.php">Change Password <span-->
            <!--                            class="sr-only">(current)</span></a>-->
            <!--            </li>-->

            <!--            <li class="nav-item dropdown">-->
            <!--                <a class="nav-link dropdown-toggle" href="#product" id="navbarDropdown" role="button"-->
            <!--                   data-toggle="dropdown"-->
            <!--                   aria-haspopup="true" aria-expanded="false">-->
            <!--                    Products-->
            <!--                </a>-->
            <!--                <div id="product" class="dropdown-menu" aria-labelledby="navbarDropdown">-->
            <!--                    <a class="dropdown-item" href="addproduct.php">Add Product</a>-->
            <!--                    <a class="dropdown-item" href="showproduct.php">View Product</a>-->
            <!--                </div>-->
            <!--            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#user" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <?php echo "Welcome  $email"; ?>
                </a>
                <div id="user" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="userchangepassword.php">Change Password</a>
                    <a class="dropdown-item" href="userlogout.php">Log out <i class="fa fa-power-off"></i></a>
                </div>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link" href="adminlogout.php">Log Out <span class="sr-only">(current)</span></a>-->
            <!--            </li>-->
        </ul>

    </div>
</nav>

