<?php
include "connection.php";
if (isset($_REQUEST['q'])) {
    $subcategoryname = $_REQUEST['q'];
    $prodquery = "SELECT * FROM `product` INNER join subcategory  on  product.subcatid = subcategory.subcategoryid where subcatid ='$subcategoryname'";
} else {
    $prodquery = "SELECT * FROM `product` INNER join subcategory  on  product.subcatid = subcategory.subcategoryid";

}
$result = mysqli_query($conn, $prodquery);
if (mysqli_num_rows($result) > 0) {
    ?>
    <table class="table table-bordered table-responsive">
        <thead>
        <tr>
            <th>Sr No.</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Discount</th>
            <th>Photo</th>
<!--            <th>Description</th>-->
            <th>Sub Category</th>
            <th>Category Name</th>
            <th>Delete</th>
            <th>Edit</th>
            <th>Add Photo</th>
            <th>View Photo</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $k = 0;

        while ($product = mysqli_fetch_array($result)) {
            $k++;
            ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $product[1]; ?></td>
                <td><?php echo $product[2]; ?></td>
                <td><?php echo $product[3]; ?></td>
                <td><?php echo $product[4]; ?></td>

                <td><img style="height: 100px;width: 100px" src="<?php echo $product[5]; ?>" alt="">
                    <span style="cursor: pointer;color: #327dff;font-weight: bold;" title="<?php echo $product[6]; ?>">View&nbsp;Description</span>
                </td>

                <td><?php echo $product[9]; ?></td>
                <td><?php echo $product[11]; ?></td>
                <td><a onclick="return confirm('Are you Sure you want to Delete?')"
                       href="deleteproduct.php?productid=<?php echo $product[0]; ?>"><i
                                class="fa fa-trash"></i></a>
                </td>
                <td><a href="editproduct.php?productid=<?php echo $product[0]; ?>"><i
                                class="fa fa-edit"></i></a>
                </td>
                <td><a href="addphoto.php?productid=<?php echo $product[0]; ?>"><i class="fa fa-plus"></i></a>
                </td>
                <td><a href="showphoto.php?productid=<?php echo $product[0]; ?>"><i
                                class="fa fa-image"></i></a>
                </td>
            </tr>
            <?php

        }
        ?>
        </tbody>
    </table>
    <?php
} else {
    ?>
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="alert alert-danger">No Data Found <span class="close" data-dismiss="alert">&times;</span></div>
        </div>
    </div>
    <?php
}

