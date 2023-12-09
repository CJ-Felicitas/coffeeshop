<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Products</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
        /* Custom centering styles */
        .container {
            width: 100%;
            margin: 0;
            padding: 15px;
            box-sizing: border-box;
        }

        /* Custom card styles */
        .card {
            width: 80%;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin: 0 auto;
            margin-bottom: 15px;
            /* Add some spacing between cards */
            box-sizing: border-box;
        }

        .card-header {
            background-color: brown;
            padding: 10px;
            color: white;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .card-content {
            padding: 10px;
        }

        .card strong {
            font-weight: bold;
        }

        /* Style for the product name in the card */
        .product-name {
            font-size: 1.2em;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .space {
            margin-bottom: 40px;
        }
    </style>
</head>

<body>
    <ul>
        <li><a href="input.php">Product Inventory</a></li>
        <li><a href="display.php">Display Inventory</a></li>
        <li><a href="sales.php">Sales</a></li>
    </ul>
    <div class="container">
        <center>
            <h1>My Products</h1>
        </center>
    </div>

    <?php
    // Assuming you have a database connection in dbconfig.php
    include 'dbconfig.php';

    // Fetch all products from the products table
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    // Check if there are results
    if ($result->num_rows > 0) {
        // Open a container for the row
        echo '<div class="container row">'; // Added the "row" class here

        // Output data of each row
        $colCount = 0; // Variable to keep track of the number of columns
        while ($row = $result->fetch_assoc()) {
            // Start a new row after every three columns
            if ($colCount % 3 == 0 && $colCount != 0) {
                echo '</div>'; // Close the current row
                echo '<div class="container row">'; // Start a new row
            }

            // Start a new column for each product
            echo '<div class="col-md-4">';
            echo '<div class="card">';
            echo '<div class="card-header">' . $row["product_name"] . '</div>';
            echo '<div class="card-content">';
            echo "<p><strong>Price:</strong> ₱" . number_format($row["product_price"], 2) . "</p>"; // Format the price with two decimal places
            echo "<hr>";
            echo "<p>" . $row["product_description"] . "</p>";
            echo '</div>';
            echo '</div>'; 
            echo '</div>'; 

            $colCount++;
        }

        // Close the container for the last row
        echo '</div>';

    } else {
        echo "";
    }

    // Close the database connection
    $conn->close();
    ?>
</body>

</html>
