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
         
            width: 100%;
            padding: 10px;

            border-radius: 8px;
        }
    </style>
</head>

<body>
    <div>
        <div class="head-style"></div>
        <center>
            <h1>Checkout</h1>
        </center>
        <div class="container">
            <div class="row mid">
                <div class="col-md-5">
                    <?php
                    include 'dbconfig.php';
                    $customer_name = $_POST['customer_name'];

                    $products = $_POST['products'];
                    $length_count = count($products);
                    $totalprice = 0;

                    for ($i = 0; $i < $length_count; $i++) {
                        $sql = "SELECT product_price FROM products WHERE product_name = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $products[$i]);
                        $stmt->execute();

                        $result = $stmt->get_result();
                        $product_price = $result->fetch_assoc()['product_price'];

                        $totalprice = $totalprice + $product_price;

                        $result->close();
                    }
                    $conn->close();
                    ?>
                    <form action='order.php' method="post">
                        <center>Total Price: ₱
                            <?php echo number_format($totalprice, 2, '.', ','); ?>
                        </center> <br>
                        <center><button type="submit" name="checkout" class="btn btn-success">Checkout</button></center>
                        <input type="hidden" value='<?php echo $customer_name ?>' name="customer_name">
                        <?php foreach ($_POST['products'] as $product): ?>
                            <input type="hidden" name="order[]" value="<?php echo $product; ?>">
                        <?php endforeach; ?>
                    </form>

                    <?php

                    ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>