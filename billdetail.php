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
            <th>Bill Id</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k = 0;
        $billid=$_GET["q"];
        $sql = "SELECT * FROM `bill_detail` INNER JOIN bill on bill_detail.billid = bill.id INNER JOIN product ON bill_detail.productid=product.productid where billid=3";
        $result = mysqli_query($conn, $sql);
        while ($detail = mysqli_fetch_array($result)) {
            $k++;
            ?>
            <tr>
                                <td><?php echo $k; ?></td>
                                <td><?php echo $detail["billid"]; ?></td>
                                <td><?php echo $detail["productname"]; ?></td>
                                <td><?php echo $detail["price"]; ?></td>
                                <td><?php echo $detail["netprice"]; ?></td>
                                <td><?php echo $detail["id"]; ?></td>
                                <td><?php echo $detail["id"]; ?></td>
                                <td><?php echo $detail["id"]; ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <?php
    include_once 'footer.php';
    ?>
</div>
</body>
</html>
<?php
