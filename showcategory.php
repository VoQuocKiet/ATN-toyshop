<?php
include_once "header.php";
include_once "connectju.php";
ob_flush();

$conn = new Connectju();
$db_link = $conn->connectToPDO();
if (isset($_GET['del_id'])) :
    $value = $_GET['del_id'];
    $sql = "DELETE FROM category WHERE categoryID=?";
    $stmt = $db_link->prepare($sql);
    $execute = $stmt->execute(array($value));
    if ($execute) {
    //    echo "Successfully deleted";
    } else {
        echo "Failed" . $execute;
    }
endif;
?>
<style>
    h1{
        font-size: 50px;
        color: red;
        text-align: center;
    }
    th{
        color:brown;
        text-align: center;
    }
    

</style>

<body>
    <div id="main" class="container">
        <h1>List Category</h1>
        
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
                    $sql = "SELECT * FROM category";
                    $re = $db_link->query($sql);
                    while ($row = $re->fetch_assoc()) :
                    ?>
                        <tr>
                            <div class="table table-bordered category-list">
                                <form method="post" action="update.php">
                                    <th><input class="form-control" type="text" value="<?= $row['categoryID'] ?>" name="cat_id"/></th>
                                    <input type="hidden" name="cat_id" value="<?= $row['categoryID'] ?>" />
                                    <th><input class="form-control" type="text" value="<?= $row['categoryName'] ?>" name="cat_Name" /></th>
                                    <th><a href="showcategory.php?del_id=<?= $row['categoryID'] ?>" class="text-muted text-decoration-non">Delete</a></th>
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
    </div>

    <?php
    include_once 'footer.php';
    ?>
