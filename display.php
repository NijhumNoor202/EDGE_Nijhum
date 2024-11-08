<?php
include('db_connection.php');

$sql = "SELECT * FROM products";
$result = $conn->query($sql);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Product List</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #FFACAC;  /* Soft pinkish color */
            color: #333;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 30px;
            font-size: 36px;
            color: #1a1919;
        }

        table {
            width: 80%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #1a1919;
        }

        th {
            background-color: #FFEBB4;
            color: black; /* Change header text color to black */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e0e0e0;
        }

        a {
            color: #3498db;
            text-decoration: none;
            font-weight: bold;
        }

        a:hover {
            color: #2980b9;
        }

        .actions {
            font-size: 18px;
        }

        /* Responsive Design */
        @media screen and (max-width: 768px) {
            table {
                width: 95%;
            }

            th, td {
                padding: 10px;
            }
        }
    </style>
</head>
<body>

<h1>Product List</h1>";

if ($result->num_rows > 0) {
    echo "<table>
    <tr>
        <th>Product Name</th>
        <th>Description</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row['product_name'] . "</td>
                <td>" . $row['description'] . "</td>
                <td>" . $row['price'] . "</td>
                <td>" . $row['quantity'] . "</td>
                <td class='actions'>
                    <a href='edit_product.php?id=" . $row['id'] . "'>Edit</a> | 
                    <a href='delete_product.php?id=" . $row['id'] . "'>Delete</a>
                </td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<p>No products found.</p>";
}

echo "</body>
</html>";
?>
