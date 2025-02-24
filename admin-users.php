<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header("Location: login.php");
    exit();
}

include('db.php'); // Csatlakozás adatbázishoz

if (isset($_POST['submit'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    $query = "INSERT INTO products (name, price, description) VALUES ('$product_name', '$product_price', '$product_description')";
    if (mysqli_query($conn, $query)) {
        echo "Termék sikeresen hozzáadva!";
    } else {
        echo "Hiba történt a termék hozzáadása során.";
    }
}

$query = "SELECT * FROM products";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Termékek kezelése</title>
</head>
<body>
    <h1>Termékek kezelése</h1>
    
    <h2>Új termék hozzáadása</h2>
    <form action="products.php" method="post">
        <input type="text" name="product_name" placeholder="Termék neve" required><br>
        <input type="text" name="product_price" placeholder="Termék ára" required><br>
        <textarea name="product_description" placeholder="Termék leírása" required></textarea><br>
        <button type="submit" name="submit">Hozzáadás</button>
    </form>

    <h2>Termékek listája</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Ár</th>
            <th>Leírás</th>
            <th>Módosítás</th>
            <th>Törlés</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['description']; ?></td>
                <td><a href="edit_product.php?id=<?php echo $row['id']; ?>">Módosítás</a></td>
                <td><a href="delete_product.php?id=<?php echo $row['id']; ?>">Törlés</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
