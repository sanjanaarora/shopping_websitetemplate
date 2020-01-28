<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>


    <script src="myjs/datepicker.js"></script>
    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>
<?php
include_once 'adminheader.php';

?>
<div class="container">
    <div class="row justify-content-center">
        <h1>All Orders</h1>
    </div>
    <div class="row mt-4 justify-content-center">
        <div class="col-sm-4 text-center">
            <input type="text" placeholder="From:" readonly id="fromdate" class="dtp" name="fromdate">
        </div>
        <div class="col-sm-4 text-center">
            <input type="text" id="todate" placeholder="To:" readonly class="dtp" name="todate">
        </div>
        <div class="col-sm-4 text-center">
            <input type="button" value="Go" onclick="datewise()" class="w-25 h-auto btn btn-primary">
        </div>
    </div>
    <div class="row mt-4">
        <div class="col-lg-12">
            <div class="product-review-info">
                <ul class="nav review-tab">
                    <li>
                        <a data-toggle="tab" href="#tab_pending">Pending </a>
                    </li>
                    <li>
                        <a data-toggle="tab" href="#tab_shipped">Shipped </a>
                    </li>
                </ul>
                <div class="tab-content reviews-tab" id="datewiseorder">
                    <div class="tab-pane fade" id="tab_pending">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th class="text-center">Sr No.</th>
                                <th class="text-center">Order No.</th>
                                <th class="text-center">Date Time</th>
                                <th class="text-center">Grand Total</th>
                                <th class="text-center">Payment Mode</th>
                                <th class="text-center">User Detail</th>
                                <th class="text-center text-primary" colspan="2">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $k = 0;
                            $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='pending'";
                            $result = mysqli_query($conn, $sql1);
                            while ($order = mysqli_fetch_array($result)) {
                                $k++;
                                ?>
                                <tr>
                                    <td class="text-center text-dark"><?php echo $k; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                                    <td class="text-center text-dark">
                                        <div class="row"><?php echo $order["email"]; ?></div>
                                        <div class="row"><?php echo $order["fullname"]; ?></div>
                                        <div class="row"><?php echo $order["mobile"]; ?></div>
                                    </td>
                                    <td class="text-center text-info"><a
                                                href="vieworderdetail.php?q=<?php echo $order['id']; ?>&r=<?php echo $order['fullname'];?>&s=<?php echo $order['mobile'];?>">View
                                            Detail</a></td>
                                    <td class="text-center text-success"><a
                                                href="shiporder.php?q=<?php echo $order['id']; ?>&r=<?php echo $order['fullname'];?>&s=<?php echo $order['mobile'];?>">Ship Order</a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="tab_shipped">
                        <table class="table table-bordered">
                            <thead>
                            <tr>

                                <th class="text-center">Sr No.</th>
                                <th class="text-center">Order No.</th>
                                <th class="text-center">Date Time</th>
                                <th class="text-center">Grand Total</th>
                                <th class="text-center">Payment Mode</th>
                                <th class="text-center">User Detail</th>
                                <th class="text-center text-primary" colspan="2">Controls</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $k = 0;
                            $sql1 = "SELECT * FROM `bill` inner JOIN signup on bill.email = signup.email WHERE bill.status ='shipped'";
                            $result = mysqli_query($conn, $sql1);
                            while ($order = mysqli_fetch_array($result)) {
                                $k++;
                                ?>
                                <tr>
                                    <td class="text-center text-dark"><?php echo $k; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["id"]; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["datetime"]; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["grandtotal"]; ?></td>
                                    <td class="text-center text-dark"><?php echo $order["paymentmethod"]; ?></td>
                                    <td class="text-center text-dark">
                                        <div class="row"><?php echo $order["email"]; ?></div>
                                        <div class="row"><?php echo $order["fullname"]; ?></div>
                                        <div class="row"><?php echo $order["mobile"]; ?></div>
                                    </td>
                                    <td class="text-center text-info"><a
                                                href="vieworderdetail.php?q=<?php echo $order['id'];?>&r=<?php echo $order['fullname'];?>&s=<?php echo $order['mobile'];?>">View
                                            Detail</a></td>
                                </tr>
                                <?php
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!--    <div id="datewiseorder" class="table-responsive"></div>-->

</div>
<?php
include_once 'footer.php';
?>
<script>
    $(document).ready(function () {
        // $("#signup").validate();
        $(".dtp").datepicker({
            changeYear: true,
            changeMonth: true,
            dateFormat: "yy-mm-dd"
        });
    })
</script>
</body>
</html>
<?php
