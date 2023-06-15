<?php
require_once 'header.php'
?>
    <h1>Product List</h1>
    <button style ="border-radius:10px;
    margin-bottom : 20px;
    background:rgb(0, 149,246,0.3);
    border:1px solid white;
    " ><a href ="./addpro.php">Add Product</a></button>
    <form name="frm" method="post" action="">
            <table id="tablecategory" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead>
                    <tr>
                        <th><strong>Category ID</strong></th>
                        <th><strong>Category Name</strong></th>
                        <th><strong>Action</strong></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $conn = new connectju();
                    $db_link = $conn->connectToMySQL();
                    $sql = "SELECT * FROM product";
                    $re = $db_link->query($sql);
                    while ($row = $re->fetch_assoc()) :
                    ?>
                        <tr>
                            <div class="table table-bordered category-list">
                                <form method="post" action="update.php">
                                    <th><input class="form-control" type="text" value="<?= $row['productID'] ?>" name="cat_id"/></th>
                                    <input type="hidden" name="cat_id" value="<?= $row['productID'] ?>" />
                                    <th><input class="form-control" type="text" value="<?= $row['productName'] ?>" name="cat_Name" /></th>
                                    <th><a href="addproduct.php?del_id=<?= $row['productID'] ?>" class="text-muted text-decoration-non">Delete</a></th>
                                </form>
                            </div>
                        </tr>
                    <?php
                    endwhile;
                    ?>
                </tbody>
            </table>
            <a href="addcategory.php"><strong>Add Category</strong></a>
        </form>