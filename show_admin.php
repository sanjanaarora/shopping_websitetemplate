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
            <th>User Name</th>
            <th>Email_id</th>
            <th>Password</th>
            <th>Mobile</th>
            <th>Fullname</th>
            <th>Delete</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $qury = "select * from admin";
        $result = mysqli_query($conn, $qury);
        while ($admin = mysqli_fetch_array($result)) {
            ?>
            <tr>
                <td><?php echo $admin[0]; ?></td>
                <td><?php echo $admin[1]; ?></td>
                <td><input type="password" id="password" readonly value="<?php echo $admin[2]; ?>"></td>
                <td><?php echo $admin[3]; ?></td>
                <td><?php echo $admin[4]; ?></td>
                <td><a href="deleteadmin.php?username=<?php echo $admin[0]; ?>"><i class="fa fa-trash"></i></a></td>
                <td><a href="editadmin.php?username=<?php echo $admin[0]; ?>"><i class="fa fa-user-edit"></i></a></td>
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
