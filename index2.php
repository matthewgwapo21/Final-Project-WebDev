<?php


include 'db2.php';


$conn = new mysqli($databaseHost, $databaseUsername, $databasePassword, $databaseName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


function displayProducts($conn) {
    $sql = "SELECT id, brand, price, type FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'>";
        echo "<tr><th>ID</th><th>Brand</th><th>Price</th><th>Type</th><th>Action</th></tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>{$row['id']}</td><td>{$row['brand']}</td><td>{$row['price']}</td><td>{$row['type']}</td>";
            echo "<td><a href='index2.php?action=edit&id={$row['id']}'>Edit</a> | <a href='index2.php?action=delete&id={$row['id']}'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "No products found.";
    }
}


if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $productId = (isset($_GET['id']) && is_numeric($_GET['id'])) ? intval($_GET['id']) : 0;

    if ($action == 'edit') {
        
        $editResult = $conn->query("SELECT * FROM products WHERE id = $productId");
        $editRow = $editResult->fetch_assoc();
    } elseif ($action == 'delete') {
        
        $conn->query("DELETE FROM products WHERE id = $productId");
        echo "";
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update_id"]) && isset($_POST["update_brand"]) && isset($_POST["update_price"]) && isset($_POST["update_type"])) {
    $updateId = intval($_POST["update_id"]);
    $updateBrand = $conn->real_escape_string($_POST["update_brand"]);
    $updatePrice = floatval($_POST["update_price"]);
    $updateType = $conn->real_escape_string($_POST["update_type"]);

    $updateSql = "UPDATE products SET brand='$updateBrand', price=$updatePrice, type='$updateType' WHERE id=$updateId";
    if ($conn->query($updateSql) === TRUE) {
        echo "";
    } else {
        echo "" . $conn->error;
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["brand"]) && isset($_POST["price"]) && isset($_POST["type"])) {
    $brand = $conn->real_escape_string($_POST["brand"]);
    $price = floatval($_POST["price"]);
    $type = $conn->real_escape_string($_POST["type"]);

    $sql = "INSERT INTO products (brand, price, type) VALUES ('$brand', $price, '$type')";
    if ($conn->query($sql) === TRUE) {
        echo "";
    } else {
        echo "" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <link rel="stylesheet" href="style8.css">
</head>
<body>
<div class="home">
        <div class="navbar">
            <img src="logo.png.png" class="logo">

            <ul>
                <li><a href="index.php">HOME</a></li>
                <li><a href="aboutcreator.html">ABOUT CREATOR</a></li>
                <li><a href="store.html">NEW ARRIVALS</a></li>
                <li><a href="watch.html">WATCH STORE</a></li>
                <li><a href="index2.php">PRODUCT SUGGESTIONS</a></li>
                <li id="log-out"><a href="login.php">LOG OUT</a></li>
            </ul>

        </div>
    </div>
    <h2>Product Suggestion Box</h2>

    <h3>If you want to suggest a product, Kindly input it below!</h3>
    <form action="index2.php" method="post">
        <h4>BRAND OF PRODUCT</h4>
        <input type="text" name="brand" required><br>
        <h4>PRICE in $ </h4>
        <input type="number" step="0.01" name="price" required><br>
        <h4>TYPE OF PRODUCT</h4>
        <input type="text" name="type" required><br>
        <input type="submit" value="Create Product">
    </form>

    <h3>Product List</h3>
    <?php
    displayProducts($conn);


    if (isset($editRow)) {
        ?>
        <h3>Edit Product</h3>
        <form action="index2.php" method="post">
            <input type="hidden" name="update_id" value="<?php echo $editRow['id']; ?>">
            <h4>BRAND OF PRODUCT</h4>
            <input type="text" name="update_brand" value="<?php echo $editRow['brand']; ?>" required><br>
            <h4>PRICE in $ </h4>
            <input type="number" step="0.01" name="update_price" value="<?php echo $editRow['price']; ?>" required><br>
            <h4>TYPE OF PRODUCT</h4>
            <input type="text" name="update_type" value="<?php echo $editRow['type']; ?>" required><br>
            <input type="submit" value="Update Product">
        </form>
        <?php
    }
    ?>
            <footer>
            <div class="row">
                <div class="col">
                    <h4>Call: <div class="underline"><span></span></div></h4><br><br>
                    <p>0997-396-3377</p>
                </div>
                <div class="col2">
                    <h4>Email: <div class="underline"><span></span></div></h4><br><br> 
                    <p>adrianmatthewcortes@gmail.com</p>
                </div>  
            </div>
            <br>
            <hr>
            <br>
            <p class="copyright"><h4>©2023- All Rights Reserved</h4></p>
        </footer>
    </div>
    

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
