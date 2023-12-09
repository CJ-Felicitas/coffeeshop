<?php

include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {
    // Retrieve customer name from the form
    $customer_name = $_POST['customer_name'];

    // Retrieve product data from the form
    $ordered_products = $_POST['order'];

    // Initialize total price
    $total_price = 0;

    // Iterate through each ordered product
    foreach ($ordered_products as $product_name) {
        // Retrieve product price from the products table
        $sql_price = "SELECT product_price FROM products WHERE product_name = ?";
        $stmt_price = $conn->prepare($sql_price);
        $stmt_price->bind_param("s", $product_name);
        $stmt_price->execute();
        $result_price = $stmt_price->get_result();

        // Check if the product exists in the products table
        if ($result_price->num_rows > 0) {
            $row_price = $result_price->fetch_assoc();
            $product_price = $row_price['product_price'];

            // Add the product price to the total
            $total_price += $product_price;

            // Insert data into the orders table
            $sql_insert = "INSERT INTO orders (customer_name, product_name, product_price) VALUES (?, ?, ?)";
            $stmt_insert = $conn->prepare($sql_insert);
            $stmt_insert->bind_param("ssd", $customer_name, $product_name, $product_price);
            $stmt_insert->execute();
            $stmt_insert->close();
        }
    }

    $stmt_price->close();

    $conn->close();


    header("Location: thankyou.php");
    exit();
}
?>
