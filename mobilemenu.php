<aside class="off-canvas-wrapper">
    <div class="off-canvas-overlay"></div>
    <div class="off-canvas-inner-content">
        <div class="btn-close-off-canvas">
            <i class="pe-7s-close"></i>
        </div>

        <div class="off-canvas-inner">
            <!-- search box start -->
            <div class="search-box-offcanvas">
                <form>
                    <input type="text" placeholder="Search Here...">
                    <button class="search-btn"><i class="pe-7s-search"></i></button>
                </form>
            </div>
            <!-- search box end -->

            <!-- mobile menu start -->
            <div class="mobile-navigation">

                <!-- mobile menu navigation start -->
                <nav>
                    <ul class="mobile-menu">
                        <li class="menu-item-has-children"><a href="index.php">Home</a></li>
                        <li class="menu-item-has-children"><a href="#">pages</a>
                            <ul class="megamenu dropdown">
                                <li class="mega-title menu-item-has-children"><a href="#">column 02</a>
                                    <ul class="dropdown">
                                        <li><a href="product-details.php">product details</a></li>
                                        <li><a href="product-details-affiliate.html">product
                                                details
                                                affiliate</a></li>
                                        <li><a href="product-details-variable.html">product details
                                                variable</a></li>
                                        <li><a href="product-details-group.html">product details
                                                group</a></li>
                                    </ul>
                                </li>
                                <li class="mega-title menu-item-has-children"><a href="#">column 03</a>
                                    <ul class="dropdown">
                                        <li><a href="viewCart.php">cart</a></li>
                                    </ul>
                                </li>
                                <li class="mega-title menu-item-has-children"><a href="#">column 04</a>
                                    <ul class="dropdown">
                                        <li><a href="userloginpage.php">Login</a></li>
                                        <li><a href="signup.php">Register</a></li>
                                        <li><a href="about-us.html">about us</a></li>
                                        <li><a href="contact-us.html">contact us</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children ">
                            <a href="#">Shop <i
                                    class="fa fa-angle-down"></i></a>
                            <ul class="megamenu dropdown">
                                <?php
                                $category = "SELECT * FROM `category` order by categoryname DESC LIMIT 0,4";
                                $category_result = mysqli_query($conn, $category);
                                while ($category_row = mysqli_fetch_array($category_result)) {
                                    ?>
                                    <li class="mega-title"><span><?php echo $category_row[0] ?></span>
                                        <ul>
                                            <?php
                                            $subcategory = "SELECT * FROM `subcategory` where `category`='" . $category_row[0] . "'";
                                            $subcategory_result = mysqli_query($conn, $subcategory);
                                            while ($subcategory_row = mysqli_fetch_array($subcategory_result)) {
                                                ?>
                                                <li>
                                                    <a href="index.php?q=<?php echo $subcategory_row[0] ?>"><?php echo $subcategory_row[1] ?></a>
                                                </li>
                                                <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <?php
                                }
                                ?>
                            </ul>
                        </li>
                        <li><a href="contact-us.html">Contact us</a></li>
                    </ul>
                </nav>
                <!-- mobile menu navigation end -->
            </div>
            <!-- mobile menu end -->

            <div class="mobile-settings">
                <ul class="nav">
                    <li>
                        <div class="dropdown mobile-top-dropdown">
                            <a href="#" class="dropdown-toggle" id="myaccount" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">
                                My Account
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="myaccount">
                                <a class="dropdown-item" href="userhome.php">my account</a>
                                <a class="dropdown-item" href="userloginpage.php"> login</a>
                                <a class="dropdown-item" href="signup.php">register</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            <!-- offcanvas widget area start -->
            <div class="offcanvas-widget-area">
                <div class="off-canvas-contact-widget">
                    <ul>
                        <li><i class="fa fa-mobile"></i>
                            <a href="#">6283069142</a>
                        </li>
                        <li><i class="fa fa-envelope-o"></i>
                            <a href="#">info@yourdomain.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- offcanvas widget area end -->
        </div>
    </div>
</aside>