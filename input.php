<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input</title>
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="icon" type="image/png" href="images/logo.png">

</head>

<body>
<ul>
        <li><a href="input.php">Product Inventory</a></li>
        <li><a href="display.php">Display Inventory</a></li>
        <li><a href="sales.php">Sales</a></li>
    </ul>
  
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1>Add Product</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mid">
                <div class="col-md-5">
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <input type="text" class="custom-form-control" name="productName"
                            placeholder="Name of the Product" required>
                        <br>
                        <input type="text" class="custom-form-control" name="productPrice"
                            placeholder="Price of the Product" required>
                        <br>
                        <input type="text" class="custom-form-control" name="productDescription"
                            placeholder="Description of the Product" required>
                        <br>
                        <center>
                            <button class="btn btn-success" type="submit" name="addProduct">Add Product</button>
                        </center>
                    </form>

                    <?php
                    // http post req
                    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["addProduct"])) {

                        $productName = $_POST["productName"];
                        $productPrice = $_POST["productPrice"];
                        $productDescription = $_POST["productDescription"];

                        include 'dbconfig.php';

                        $sql = "INSERT INTO products (product_name, product_price, product_description) VALUES ('$productName', $productPrice, '$productDescription')";

                        if ($conn->query($sql) === TRUE) {
                            header("Location: display.php?ProductAddedSuccessfully");
                        } else {
                            echo "Error: " . $sql . "<br>" . $conn->error;
                        }

                        $conn->close();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>  
</body>

</html>