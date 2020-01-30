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
include_once 'userheader.php';
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
            <th>Photo</th>
            <th>Options</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $status ="";
        $bill = 0;
        $k = 0;
        $billid = $_GET["q"];
        $sql = "SELECT * FROM `bill_detail` INNER JOIN bill on bill_detail.billid = bill.id INNER JOIN product ON bill_detail.productid=product.productid where billid='$billid'";
        $result = mysqli_query($conn, $sql);
        while ($detail = mysqli_fetch_array($result)) {
            $k++;
            $status = $detail["status"];
            $bill = $detail["billid"];
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $detail["productname"]; ?></td>
                <td><?php echo $detail["price"]; ?></td>
                <td><?php echo $detail["discount"] . "%"; ?></td>
                <td><?php echo $detail["quantity"]; ?></td>
                <td><?php echo $detail["netprice"]; ?></td>
                <td><img src="<?php echo $detail["photo"]; ?>" style="height: 90px;width: 90px" alt=""></td>

            </tr>
            <?php
        }
        ?>

        </tbody>

    </table>
    <?php
    if ($status != "pending") {

    } else {
        ?>
        <div class="row justify-content-center">
            <h1 class=""><a href="cancelorder.php?q=<?php echo $bill; ?>&r=<?php echo $detail["quantity"]; ?>">Cancel
                    Order &times;</a></h1>
        </div>
        <?php
    }
    ?>

    <?php
    include_once 'footer.php';
    ?>
</div>
</body>
</html>
<?php
