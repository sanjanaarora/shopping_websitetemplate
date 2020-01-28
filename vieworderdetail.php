<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>View Orders</title>
    <?php
    include_once 'headerfiles.html';
    ?>
</head>
<body>
<?php
include_once 'adminheader.php';
?>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Discount ( in %)</th>
            <th>Qty</th>
            <th>Net Price</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k = 0;
        $billid = $_GET["q"];
        $fullname = $_GET["r"];
        $mobile = $_GET["s"];
        $sql = "SELECT * FROM `bill_detail` INNER JOIN bill on bill_detail.billid = bill.id INNER JOIN product ON bill_detail.productid=product.productid where billid='$billid'";
        $result = mysqli_query($conn, $sql);
        $grandTotal =0;
        while ($detail = mysqli_fetch_array($result)) {
            $k++;
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $detail["productname"]; ?></td>
                <td><?php echo $detail["price"]; ?></td>
                <td><?php echo $detail["discount"] . "%"; ?></td>
                <td><?php echo $detail["quantity"]; ?></td>
                <td><?php echo $detail["netprice"]; ?></td>
                <td><img src="<?php echo $detail["photo"]; ?>" style="height: 80px;width: 80px" alt=""></td>
            </tr>
            <?php
            $grandTotal +=$detail["netprice"];
        }
        ?>
        </tbody>
        <tfoot class="text-right">
        <tr>
            <td>Total Amount</td>
            <td><strong><?php echo $grandTotal; ?>
                    <input type="hidden" name="grandTotal" id="grandTotal"
                           value="<?php echo round($grandTotal, 0) ?>">
                </strong></td>
        </tr>
        </tfoot>
    </table>
    <form action="orderreceived.php" method="post">
        <div class="row col-sm-6">
            <label for="person">Order received by: </label>
        </div>
        <div class="row col-sm-6">
            <input type="text" name="person" id="person" class="form-control">
        </div>
        <div class="row col-sm-6 justify-content-end mt-4">
            <input type="hidden" value="<?php echo $billid;?>" class="form-control" name="billid" id="billid">
            <input type="hidden" value="<?php echo $fullname;?>" class="form-control" name="fullname" id="fullname">
            <input type="hidden" value="<?php echo $mobile;?>" class="form-control" name="mobile" id="mobile">

            <input type="submit" name="" id="" value="Add" class="w-50 h-100 btn btn-success text-primary">
        </div>
    </form>

    <?php
    include_once 'footer.php';
    ?>
</div>
</body>
</html>
<?php
