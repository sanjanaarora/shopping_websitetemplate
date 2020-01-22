<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
    include 'headerfiles.html';
    include_once 'connection.php';
    include 'adminheader.php';

    ?>
</head>
<body>
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th>Sr no.</th>
            <th>Category Name</th>
            <th>Category Description</th>
            <th>Delete</th>
            <th>Edit</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k =0;
        $qury = "select * from category";
        $result = mysqli_query($conn, $qury);
        while ($category = mysqli_fetch_array($result)) {
            $k++;
            ?>
            <tr>
                <td><?php echo $k ?></td>
                <td><?php echo $category[0]; ?></td>
                <td><?php echo $category[1]; ?></td>
                <td><a href="deletecategory.php?catname=<?php echo $category[0]; ?>"><i class="fa fa-trash"></i></a></td>
                <td><a href="editcategory.php?catname=<?php echo $category[0]; ?>"><i class="fa fa-edit"></i></a></td>
            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
    <?php
    if (isset($_GET['msg'])) {
        $msg = $_GET["msg"];
        echo $msg;
    }
    include_once 'footer.php';
    ?>
</div>
</body>
</html>
<?php
