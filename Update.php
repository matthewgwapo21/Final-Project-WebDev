<?php

// Database credentials
$host = "localhost";
$username = "root";
$password = "";
$database = "register";

// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create products table if not exists
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    brand VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL
)";

$conn->query($sql);

function createProduct($brand, $price) {
    global $conn;
    $brand = $conn->real_escape_string($brand);
    $price = floatval($price);
    
    $sql = "INSERT INTO products (brand, price) VALUES ('$brand', $price)";
    if ($conn->query($sql) === TRUE) {
        echo "Product created successfully!";
    } else {
        echo "Error creating product: " . $conn->error;
    }
}

function readProducts() {
    global $conn;
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "Product List:\n";
        while ($row = $result->fetch_assoc()) {
            echo "ID: " . $row["id"] . ", Brand: " . $row["brand"] . ", Price: $" . $row["price"] . "\n";
        }
    } else {
        echo "No products found.";
    }
}

function updateProduct($id, $brand, $price) {
    global $conn;
    $id = intval($id);
    $brand = $conn->real_escape_string($brand);
    $price = floatval($price);

    $sql = "UPDATE products SET brand='$brand', price=$price WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product updated successfully!";
    } else {
        echo "Error updating product: " . $conn->error;
    }
}

function deleteProduct($id) {
    global $conn;
    $id = intval($id);

    $sql = "DELETE FROM products WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Product deleted successfully!";
    } else {
        echo "Error deleting product: " . $conn->error;
    }
}

// Example usage
createProduct("Example Brand", 25.99);
readProducts();
updateProduct(1, "Updated Brand", 29.99);
deleteProduct(1);

// Close the database connection
$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
</head>
<body>
    <h2>Product Management</h2>

    <h3>Create Product</h3>
    <form action="your_php_filename.php" method="post">
        Brand: <input type="text" name="brand" required><br>
        Price: <input type="number" step="0.01" name="price" required><br>
        <input type="submit" value="Create Product">
    </form>

    <h3>Product List</h3>
    <?php
    // Include the PHP code here to display the product list
    include 'your_php_filename.php';
    readProducts();
    ?>

    <h3>Update Product</h3>
    <form action="your_php_filename.php" method="post">
        Product ID: <input type="number" name="update_id" required><br>
        New Brand: <input type="text" name="update_brand"><br>
        New Price: <input type="number" step="0.01" name="update_price"><br>
        <input type="submit" value="Update Product">
    </form>

    <h3>Delete Product</h3>
    <form action="your_php_filename.php" method="post">
        Product ID: <input type="number" name="delete_id" required><br>
        <input type="submit" value="Delete Product">
    </form>
</body>
</html>