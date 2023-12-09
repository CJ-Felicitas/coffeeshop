<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
        .container {
            padding: 20px;
            box-sizing: border-box;
        }

        form {
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            /* Increased shadow */
            width: 100%;
            padding: 10px;
            /* Increased padding */
            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div>
        <div class="head-style"></div>
        <center>
            <h1>Place an Order</h1>
        </center>
        <div class="container">
            <div class="row mid">
                <div class="col-md-5">
                    <form action="" method="post">
                        <?php
                        // Assuming you have a database connection in dbconfig.php
                        include 'dbconfig.php';

                        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submitcheckout'])) {
                            // Check if 'products' and 'customer_name' are set in the $_POST array
                            if (isset($_POST['products']) && is_array($_POST['products']) && isset($_POST['customer_name'])) {
     
                        
                                // Insert customer data into the customers table
                                $insertCustomerSql = "INSERT INTO customers (customer_name) VALUES ('$customerName')";
                                $conn->query($insertCustomerSql);

                                // Get the ID of the newly inserted customer
                                $customerId = $conn->insert_id;

                                // Fetch prices for selected products
                                $selectedProducts = $_POST['products'];
                                $sql = "SELECT product_name, product_price FROM products WHERE product_name IN ('" . implode("','", $selectedProducts) . "')";
                                $result = $conn->query($sql);

                                // Calculate total price
                                $totalPrice = 0;

                                // Insert each selected product into the orders table
                                foreach ($selectedProducts as $productName) {
                                    $productName = $conn->real_escape_string($productName); // Sanitize input
                                    $insertOrderSql = "INSERT INTO orders (customer_id, product_id) VALUES ('$customerId', (SELECT id FROM products WHERE product_name = '$productName'))";
                                    $conn->query($insertOrderSql);

                                    // Fetch and display selected product and its price
                                    $selectSql = "SELECT product_name, product_price FROM products WHERE product_name = '$productName'";
                                    $row = $conn->query($selectSql)->fetch_assoc();
                                    $productPrice = $row["product_price"];
                                    $totalPrice += $productPrice;
                                    echo '<p>' . $productName . ': ₱' . number_format($productPrice, 2) . '</p>';
                                }

                                // Display total price
                                
                                echo '<div class="total-price">Total Price: ₱' . number_format($totalPrice, 2) . '</div>';
                            } else {
                                echo "Invalid request.";
                            }
                        }
                        ?>
                    <br>
                    <center><a href=""><button type="submit" name="submitcheckout" class="btn btn-success">Checkout</button></a></center>
                </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>