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
    <?php include '../include/global_header.php'; ?>
    
</head>

<body>

<!-- Your global header goes here -->

<div class="product-container">
    <?php
    // Retrieve product data from the database
    $result = $conn->query("SELECT * FROM products");

    // Display product information
    while ($row = $result->fetch_assoc()) {
        echo "<div class='product'>";
        
        // Product Name
        echo "<h2>{$row['product_name']}</h2>";
        
        // Product Description
        echo "<p>{$row['product_description']}</p>";
        
        // Product Price
        echo "<p>Price: {$row['product_price']}</p>";
        
        // Product Image
        $imagePath = $row['product_photo'];
        if (file_exists($imagePath)) {
            echo "<img src='{$imagePath}' alt='{$row['product_name']}'>";
        } else {
            echo "<p>Image not found</p>";
        }

        // Buy Button
        echo "<button onclick=\"buyProduct('{$row['product_id']}', '{$row['product_name']}', '{$row['product_price']}')\">Buy Now</button>";

        // Horizontal Line as a separator
        echo "<hr>";

        echo "</div>";
    }
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

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    hr {
        border: 1px solid #ddd;
        margin: 20px 0;
    }
</style>

<script>
    function buyProduct(productId, productName, productPrice) {
        // You can add your logic here to handle the buy action, for example, redirecting to a checkout page.
        alert(`Buying ${productName} for ${productPrice}`);
    }
</script>
</body>
<?php include '../include/global_footer.php'; ?>
</html>
