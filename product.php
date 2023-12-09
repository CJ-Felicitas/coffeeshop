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

        .form {
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
                <form action="/checkout.php" method="post">
                    <input type="text" name="customer_name" class="custom-form-control" placeholder="Name of the Customer"><br>
                    <?php
                    // Assuming you have a database connection in dbconfig.php
                    include 'dbconfig.php';

                    // Fetch product names from the products table
                    $sql = "SELECT product_name FROM products";
                    $result = $conn->query($sql);

                    // Check if there are results
                    if ($result->num_rows > 0) {
                        // Open the form
          
                            echo '<div class="form">';
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo '<input type="checkbox" id="' . $row["product_name"] . '" name="products[]" value="' . $row["product_name"] . '">';
                            echo '<label for="' . $row["product_name"] . '"> ' . $row["product_name"] . '</label><br>';
                            echo '<hr>';
                        }

                        // Close the form and add the submit button
                        echo '<br><input class="btn btn-success" type="submit" value="Order this"></div>';
                    } else {
                        echo "No products found";
                    }

                    // Close the database connection
                    $conn->close();
                    ?>

                </div>
            </div>
        </div>
    </div>
</body>

</html>