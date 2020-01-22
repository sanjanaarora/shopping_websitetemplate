<?php
ob_start();
include_once "connection.php";
@session_start();
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];
} else {
    header("location:loginpage.php");
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
                <a class="nav-link" href="adminhome.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <!--            <li class="nav-item active">-->
            <!--                <a class="nav-link" href="admin_changepassword.php">Change Password <span-->
            <!--                            class="sr-only">(current)</span></a>-->
            <!--            </li>-->

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#admin" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div id="admin" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="add_admin.php">Add Admin</a>
                    <a class="dropdown-item" href="show_admin.php">View Admin</a>

                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#cat" id="navbarDropdown" role="button" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Category
                </a>
                <div id="cat" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="addcategory.php">Add Category</a>
                    <a class="dropdown-item" href="showcategory.php">View Category</a>

                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#subcat" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Sub Category
                </a>
                <div id="subcat" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="addsubcategory.php">Add Sub Category</a>
                    <a class="dropdown-item" href="showsubcategory.php">View Sub Category</a>
                </div>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#product" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    Products
                </a>
                <div id="product" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="addproduct.php">Add Product</a>
                    <a class="dropdown-item" href="showproduct.php">View Product</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#user" id="navbarDropdown" role="button"
                   data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">
                    <?php echo "Welcome  $username"; ?>
                </a>
                <div id="user" class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="admin_changepassword.php">Change Password</a>
                    <a class="dropdown-item" href="adminlogout.php">Log out <i class="fa fa-power-off"></i></a>
                </div>
            </li>
            <!--            <li class="nav-item">-->
            <!--                <a class="nav-link" href="adminlogout.php">Log Out <span class="sr-only">(current)</span></a>-->
            <!--            </li>-->
        </ul>

    </div>
</nav>

