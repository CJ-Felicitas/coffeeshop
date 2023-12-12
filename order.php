<?php

include 'dbconfig.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['checkout'])) {

    $customer_name = $_POST['customer_name'];


    $ordered_products = $_POST['order'];


    $total_price = 0;


    foreach ($ordered_products as $product_name) {
       
        $sql_price = "SELECT product_price FROM products WHERE product_name = ?";
        $stmt_price = $conn->prepare($sql_price);
        $stmt_price->bind_param("s", $product_name);
        $stmt_price->execute();
        $result_price = $stmt_price->get_result();


        if ($result_price->num_rows > 0) {
            $row_price = $result_price->fetch_assoc();
            $product_price = $row_price['product_price'];

            $total_price += $product_price;


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
