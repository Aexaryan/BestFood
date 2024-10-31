<?php
// Include the database connection file
require '../db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Listing</title>
    <!-- Include the global header -->
</head>

<body>

<!-- Your global header goes here -->

<div class="product-container">
    <?php
    // Retrieve photos from the 'products' table
    $result = $conn->query("SELECT product_id, product_photo, product_name,
        product_price,product_description FROM products");

    // Loop through the result set
    while ($row = $result->fetch_assoc()) {
        $product_photo_path = 'uploads/' . $row['product_photo'];
        $product_name = $row['product_name'];
        $product_price = $row['product_price'];
        $product_description = $row['product_description'];
        $product_id = $row['product_id'];

        echo '<div class="product">';
        echo "<img src=\"$product_photo_path\" alt=\"$product_name\"><br>";
        echo "<p><strong>Name:</strong> $product_name</p>";
        echo "<p><strong>Price:</strong> $product_price</p>";
        echo "<p><strong>Description:</strong> $product_description</p>";

        // View Details Link
        echo "<div class='product-actions'>";
        echo "<a href='view_product.php?id=$product_id'>View Details</a>";
        echo "</div>";

        // Edit and Delete Buttons
        echo "<div class='product-actions'>";
        echo "<a href='delete_product.php?id=$product_id'>Delete</a>";
        echo "</div>";

        // Horizontal Line as a separator
        echo "<hr>";

        echo '</div>';
    }
    ?>
</div>

<?php 
   include '../include/global_footer.php'
     ?>
    
</div>

<!-- Your global footer goes here -->

<style>
    /* Styles for the page layout and elements */

    .product-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
    }

    .product {
        width: 30%;
        background-color: #fff;
        border: 1px solid #ddd;
        padding: 20px;
        margin: 10px;
        box-sizing: border-box;
        transition: transform 0.3s ease-in-out;
    }

    .product:hover {
        transform: scale(1.05);
    }

    .product-actions {
        margin-top: 10px;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .product-actions a {
        background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        transition: background-color 0.3s ease-in-out, color 0.5s ease-in-out;
    }

    .product-actions a:hover {
        background-color: #45a049;
    }

    h2 {
        color: #333;
    }

    p {
        color: #666;
    }

    img {
        max-width: 100%;
        height: auto;
        margin-top: 10px;
    }

    hr {
        border: 1px solid #ddd;
        margin: 20px 0;
    }
</style>
</html>