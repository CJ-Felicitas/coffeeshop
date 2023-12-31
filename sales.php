<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales</title>
    <link rel="stylesheet" href="grid.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="buttons.css">
    <link rel="stylesheet" href="navbar.css">
    <link rel="icon" type="image/png" href="images/logo.png">
    <style>
        td,
        table,
        th {
            border: 1px solid black;
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
        <div class="row">
            <div class="col-md-12">
                <center>
                    <h1>Sales</h1>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 mid">
                <div class="col-md-5">
                    <?php

                    include 'dbconfig.php';


                    $sql_sales = "SELECT product_name, SUM(product_price) as total_sales FROM orders GROUP BY product_name";
                    $result_sales = $conn->query($sql_sales);


                    if ($result_sales->num_rows > 0) {

                        echo '<table style="width:100%">
                                <tr>
                                    <th>Product Name</th>
                                    <th>Total Sales</th>
                                </tr>';


                        while ($row = $result_sales->fetch_assoc()) {
                            echo '<tr>
                                    <td>' . $row['product_name'] . '</td>
                                    <td>₱' . number_format($row['total_sales'], 2, '.', ',') . '</td>
                                  </tr>';
                        }

      
                        echo '</table>';
                    } else {
           
                        echo "No sales data available.";
                    }

    
                    $result_sales->close();

 
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
