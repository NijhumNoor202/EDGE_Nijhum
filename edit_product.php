<?php
include('db_connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM products WHERE id=$id";
    $result = $conn->query($sql);
    $product = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $product_name = $_POST['product_name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

        $update_sql = "UPDATE products SET product_name='$product_name', description='$description', price='$price', quantity='$quantity' WHERE id=$id";

        if ($conn->query($update_sql) === TRUE) {
            echo "<p class='alert'>Product updated successfully</p>";
        } else {
            echo "<p class='alert'>Error: " . $conn->error . "</p>";
        }
    }
} else {
    echo "<p>Product not found.</p>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFACAC;
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            font-size: 36px;
            color: #2C3E50;
        }

        .form-container {
            width: 40%;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container textarea {
            resize: vertical;
            height: 120px;
        }

        .form-container label {
            font-size: 16px;
            margin-bottom: 8px;
            display: block;
        }

        .form-container input[type="submit"] {
            background-color: #3498db;
            color: white;
            border: none;
            cursor: pointer;
            font-size: 18px;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .form-container input[type="submit"]:hover {
            background-color: #2980b9;
        }

        .form-container input[type="submit"]:active {
            background-color: #1f6589;
        }

        .alert {
            text-align: center;
            margin-top: 20px;
            color: #27ae60;
            font-size: 18px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            .form-container {
                width: 90%;
            }
        }
    </style>
</head>
<body>

<h1>Edit Product</h1>

<div class="form-container">
    <form method="POST" action="edit_product.php?id=<?php echo $product['id']; ?>">
        <label for="product_name">Product Name:</label>
        <input type="text" name="product_name" value="<?php echo $product['product_name']; ?>" required>

        <label for="description">Description:</label>
        <textarea name="description"><?php echo $product['description']; ?></textarea>

        <label for="price">Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" step="0.01" required>

        <label for="quantity">Quantity:</label>
        <input type="number" name="quantity" value="<?php echo $product['quantity']; ?>" required>

        <input type="submit" value="Update Product">
    </form>
</div>

</body>
</html>
