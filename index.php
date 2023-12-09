<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
        /* Custom card styles */
        .card {
            width: 80%;
            background-color: #fff;

            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: left;
            margin: 0 auto;
            margin-bottom: 15px;
            /* Add some spacing between cards */
            box-sizing: border-box;
        }

        .card-header {
            background-color: rgb(51, 51, 204);
            padding: 10px;
            color: white;
            font-weight: bold;
            text-align: center;
            margin-bottom: 10px;
        }

        .card-content {
            padding: 10px;
            color: black;
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
    <div class="row">
        <div class="col-md-12 head-style">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mid">
                <h1>COFFEE SHOP!</h1>
            </div>
        </div>
        <div class="row" style="margin-top: 50px">
            <div class="col-md-12 mid">
                <div class="col-md-5" id="">
                    <div>
                        <img src="images/coffee_one.png" alt="" width=100%>
                    </div>
                </div>
                <div class="col-md-1">

                </div>
                <div class="col-md-5" id="">
                    <div>
                        <img src="images/coffee_two.png" width=100% alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-extended" style="margin-top:40px;">
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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <center><a href="product.php"><button style="color:black;" class="btn btn-success">Place an Order</button></a> </center>
                </div>
            </div>
        </div>
    </div>




</body>

</html>