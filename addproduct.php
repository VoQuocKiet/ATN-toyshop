<!DOCTYPE html>
<html>

<head>
    <link rel="icon" href="../images/775307.png">
    <meta name="viewport" content="width=device-width, initial-scale =1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/fontawesome.min.css" integrity="sha512-giQeaPns4lQTBMRpOOHsYnGw1tGVzbAIHUyHRgn7+6FmiEgGGjaG0T2LZJmAPMzRCl+Cug0ItQ2xDZpTmEc+CQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link href="https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
</head>
<style>

    h1 {
        text-align: center;
    }

    a {
        text-decoration: none;
        align-content: center;
    }

    input {
        all: unset;
        padding: 10px;
        border: 1px solid rgb(219, 219, 219);
        margin-top: 10px;
    }

    button {
        border-radius: 25px;

        margin-top: 10px;
        background-color: goldenrod;
    }
</style>

<body>
    <?php
    // require 'connect1.php';

    if (!isset($_SESSION['staffName'])) {
        session_start();
    }

    // //  echo $_SESSION['Store_ID'];
    // $udi = $_SESSION['staff_id'];
 

    if (isset($_POST['btnAdd'])) {
        // $Id = $_POST['ID'];
        // $shop =  $_SESSION['store_ID'];
        $Name = $_POST['Product_name']??"";
        $Price = $_POST['Price']??"";
        $Img = $_POST['Image']??"";
        $Des = $_POST['Description']??"";
        // $Status = isset($_POST['Status']) ? trim($_POST['Status']) : '';
        // $Date = date('Y-m-d', strtotime($_POST['Date_add']));
        // $Des = isset($_POST['Des']) ? trim($_POST['Des']) : '';
        $Quantity = $_POST['Quantity']??"";
        $Store  = $_POST['store_ID']??"";
        $Cat  = $_POST['pCatID']??"";
        $Sup = $_POST['Sup_ID']??"";
        // $sup = isset($_POST['Sup_ID']) ? trim($_POST['Sup_ID']) : '';
        // echo "Hello wor";


        $result = '';
        // if ($Id == " ") {
        //     $result .= "User name lenght must from 4 to 10 characters <br>";
        //     $_POST['usrName'] = '';
        // }
        // if ($Name == " ") {
        //     $result .= "Password lenght must form 6 to 20 characters<br>";
        // }

        // if ($Price == " ") {
        //     $result .= "Confirm Password is not confirm with password!!!<br>";
        // }
        if ($result == '') {
            include_once 'connectju.php';
            $c = new connectju();
            $dblink = $c->connectToPDO();
            // $des = "Hello world!";

            // echo $Id;
            // echo $name;
            // echo $price;
            // echo $img;
            // echo $des;
            // echo $quantity;
            // echo $store;
            // echo $cat;
            // echo $sup;
        
       


            $sql = "INSERT INTO `product`( `productName`, `productPrice`, `productImage`, `productDescription`, `productQuantity`, `storeID`, `categoryID`, `supplierID`)
            Value(?,?,?,?,?,?,?,?)";
            $re = $dblink->prepare($sql);
            $signup = $re->execute(array("$Name", "$Price", "$Img", "$Des", "$Quantity", "$Store", "$Cat", "$Sup"));

            if ($signup) {
                echo "Signup Successful";
                header('location: manageproduct.php');
            } else {
                echo "Failed!!";
            }
        }

        echo $result ?? '';
    }
    ?>

    <!-- ?> -->
    <form id="form1" method="POST" role="form">
        <div class="container col-12 col-lg-4 mx-auto">
            <div style="display: flex;
                align-items: stretch;
                align-content: center;
                flex-direction: column;
                flex-wrap: nowrap;
                justify-content: center;
                
                background-color: white;
                border: 1px solid rgb(219,219,219);
                font-family: -apple-system;
                padding: 20px;" class="mt-3">
                <!-- <h1>Login</h1> -->
                <!-- <input type="text" placeholder="ID" name="ID" required> -->
                <input type="text" placeholder="Product Name" name="Product_name" required>
                <input type="text" placeholder="Price" name="Price" required>
                <input type="file" placeholder="Image" name="Image" required>
                <input type="text" placeholder="Description" name="Description" required>
                <input type="text" placeholder="Quantity" name="Quantity" required>
                <select style=" margin-top : 20px; margin-bottom: 50px; padding: 5px" name="pCatID" id="pCatID">

                    <?php
                    include_once 'connectju.php';
                    $c = new connectju();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM `category`";
                    $re = $dblink->query($sql);
                    //  $re->execute(array("$Id"));
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) : ?>
                            <option value="<?= $row['categoryID'] ?>"><?= $row['categoryName'] ?></option>
                            <!-- <select style = " margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Sup" id="Sup">
                    <option value="<?= $row['supplierID'] ?>"><?= $row['supplierName'] ?></option         
                </select> -->
                    <?php
                        endwhile;
                    else :
                        echo "Not found";
                    endif;
                    ?>
                </select>
                <select style=" margin-top : 20px; margin-bottom: 50px; padding: 5px" name="Sup_ID" id="Sup_ID">
                    <?php
                    include_once 'connectju.php';
                    $c = new connectju();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM `supplier`";
                    $re = $dblink->query($sql);
                    //  $re->execute(array("$Id"));
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) : ?>
                            <option value="<?= $row['supplierID'] ?>"><?= $row['supplierName'] ?></option>
                            <!-- <a class = "dropdown-item" value ="<?= $row['supplierID'] ?>"><?= $row['supplierName'] ?></a> -->
                    <?php
                        endwhile;
                    else :
                        echo "Not found";
                    endif;
                    ?>
                </select>

                <select style=" margin-top : 20px; margin-bottom: 50px; padding: 5px" name="store_ID" id="store_ID">
                    <?php
                    include_once 'connectju.php';
                    $c = new connectju();
                    $dblink = $c->connectToMySQL();
                    $sql = "SELECT * FROM `store`";
                    $re = $dblink->query($sql);
                    //  $re->execute(array("$Id"));
                    if ($re->num_rows > 0) :
                        while ($row = $re->fetch_assoc()) : ?>
                            <option value="<?= $row['storeID'] ?>"><?= $row['storeName'] ?></option>
                            <!-- <a class = "dropdown-item" value ="<?= $row['storeID'] ?>"><?= $row['storeName'] ?></a> -->
                    <?php
                        endwhile;
                    else :
                        echo "Not found";
                    endif;
                    ?>
                </select>

                <button type="submit" value="Add" name="btnAdd">Add</button>
                <a href="Manager.php" style="text-align: center; text-decoration: none; padding-top: 20px;">
                    <p style="color:black">Back to Manager <i class="bi bi-box-arrow-left"></i></p>
                </a>
            </div>
    </form>
</body>
</html>