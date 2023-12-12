<?php
include 'dbconfig.php';

if (isset($_POST['delete_product'])) {
    $product_id = $_POST['product_id'];

    $product_id = mysqli_real_escape_string($conn, $product_id);


    $delete_query = "DELETE FROM products WHERE id = $product_id";

    if ($conn->query($delete_query) === TRUE) {
        header("Location: display.php"); 
        exit();
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

$conn->close();
?>
