<?php
include "cart.php";
session_start();
$ar = array();
if (isset($_SESSION['products'])) {
    $ar = $_SESSION['products'];

} else {
    header("Location:index.php");
}
?>
<!doctype html>
<html class="no-js" lang="zxx">
<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/cart1.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2019 05:57:06 GMT -->
<head>
    <?php
    include "headerfiles.html";
    ?>
</head>

<body>
<!-- Start Header Area -->
<?php
include "publicheader.php";
?>
<!-- end Header Area -->


<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th class="pro-thumbnail">Thumbnail</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-price">Discount</th>
                                    <th class="pro-price">Net Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $grandTotal = 0;
                                foreach ($ar as $item) {
                                    $discountedPrice = round($item->price - (($item->price * $item->discount) / 100), 2);
                                    $netprice = $discountedPrice * $item->qty;
                                    $grandTotal += $netprice;
                                    ?>
                                    <tr>
                                        <td class="pro-thumbnail"><a href="#"><img class="img-fluid"
                                                                                   src="<?php echo $item->photo; ?>"
                                                                                   alt="Product"/></a></td>
                                        <td class="pro-title"><a href="#"><?php echo $item->productname; ?></a></td>
                                        <td class="pro-price"><span>&#8377; <?php echo $item->price; ?></span></td>
                                        <td class="pro-price"><span><?php echo $item->discount; ?>%</span></td>
                                        <td class="pro-price"><span>&#8377; <?php echo $discountedPrice; ?></span></td>
                                        <td class="text-center" style="width: 13%">
                                            <form id="myFormQty">
                                                <div class="input-group" style="">
                                                <span class="input-group-prepend" style="">
                                                    <button type="button" data-toggle="tooltip" title="Remove"
                                                            class="btn btn-info" <?php if ($item->qty > 1) { ?>
                                                        onclick="changeQty(<?php echo $item->id; ?>,'minus',<?php echo $item->stock ?>)" <?php } ?>><i
                                                                id="minusicon-<?php echo $item->id; ?>"
                                                                class="fa fa-minus <?php if ($item->qty <= 1) {
                                                                    echo "disabled";
                                                                } ?>"></i></button>
                                                </span>
                                                    <input type="text" name="quantity-<?php echo $item->id; ?>"
                                                           data-rule-required="true" data-rule-min="1"
                                                           data-rule-max="<?php echo $item->stock ?>"
                                                           id="quantity-<?php echo $item->id; ?>"
                                                           value="<?php echo $item->qty; ?>" readonly=""
                                                           class="form-control text-center mr-1 ml-1">
                                                    <span class="input-group-append">
                                                    <button type="button" <?php if ($item->qty < $item->stock) { ?> onclick="changeQty(<?php echo $item->id; ?>,'plus',<?php echo $item->stock ?>)" <?php } ?>
                                                            data-toggle="tooltip"
                                                            title="Update" class="btn btn-info"><i
                                                                id="plusicon-<?php echo $item->id; ?>"
                                                                class="fa fa-plus <?php if ($item->qty >= $item->stock) {
                                                                    echo "disabled";
                                                                } ?>"></i></button>
                                                </span>
                                                </div>
                                            </form>
                                        </td>
                                        <!--                                        <input type="hidden" value="-->
                                        <?php //echo $item->id ?><!--" id="productid"-->
                                        <!--                                               name="productid">-->
                                        <td class="pro-subtotal"><span>&#8377; <span
                                                        id="netprice-<?php echo $item->id; ?>"><?php echo $netprice; ?></span></span>
                                        </td>
                                        <td class="pro-remove"><a href="#"><i class="fas fa-trash-alt text-danger"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Cart Totals</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Sub Total</td>
                                            <td>&#8377; <span id="grandTotal"><?php echo $grandTotal; ?></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="checkout.html" class="btn btn-sqr d-block">Proceed Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->
<?php
include "footer.php";
?>

</body>


<!-- Mirrored from demo.hasthemes.com/corano-preview/corano/cart1.php by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 27 Dec 2019 05:57:06 GMT -->
</html>