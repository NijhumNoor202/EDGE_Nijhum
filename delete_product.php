<?php
include('db_connection.php');

$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "Product deleted successfully";
} else {
    echo "Error: " . $conn->error;
}

header("Location: display.php"); // Redirect to product list after deletion
exit;
?>
