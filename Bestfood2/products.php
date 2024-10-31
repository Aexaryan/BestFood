<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
require 'db.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <!-- Include the global header -->
    
</head>

<body>
    <h2>View Photos</h2>
    <div class="product-container">
        <?php
        // Retrieve photos from the 'products' table
        $result = $conn->query("SELECT product_id, product_photo, product_name, product_price, product_description FROM products");

        // Loop through the result set
        while ($row = $result->fetch_assoc()) {
            $productId = $row['product_id'];
            $product_photo_path = 'Admin/uploads/' . $row['product_photo'];
            $product_name = $row['product_name'];
            $product_price = $row['product_price'];
            $product_description = $row['product_description'];

            echo '<div class="product">';
            echo "<img src=\"$product_photo_path\" alt=\"$product_name\"><br>";
            echo "<p><strong>Name:</strong> $product_name</p>";
            echo "<p><strong>Price:</strong> $product_price</p>";
            echo "<p><strong>Description:</strong> $product_description</p>";
            echo '<div class="action-buttons">';
            echo '<button class="button buy-button" onclick="buyProduct(' . $productId . ', \'' . $product_name . '\', ' . $product_price . ')">Buy</button>';
            echo '</div>';
            echo '</div>';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>

    <!-- Include the global footer -->
 
</body>

<style>
    /* Styles for the page layout and elements */

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .product {
        width: 100%; /* Adjust the width for responsiveness */
        max-width: 300px; /* Set a maximum width if needed */
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        box-sizing: border-box;
        transition: transform 0.3s ease-in-out;
    }

    .product img {
        max-width: 100%;
        max-height: 100px;
        height: auto;
        display: block;
        margin: 0 auto;
    }

    .product:hover {
        transform: scale(1.05);
    }

    h2 {
        color: #333;
    }

    p {
        color: #666;
    }

    .action-buttons {
        display: flex;
        justify-content: space-between;
        margin-top: 10px;
    }

    .button {
        flex: 1;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    .buy-button {
        background-color: #4CAF50;
        color: white;
        margin-right: 10px;
    }

    .buy-button:hover {
        background-color: #45a049;
    }

    hr {
        border: 1px solid #ddd;
        margin: 20px 0;
    }
</style>

<script>
    function buyProduct(productId, productName, productPrice) {
        alert(`Buying ${productName} for ${productPrice}`);
        // Add your logic here for handling the buy action, for example, redirecting to a checkout page.
    }
</script>

</html>
