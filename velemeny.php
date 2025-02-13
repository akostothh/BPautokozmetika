<?php
session_start();

// Egyszerű adatbázis kapcsolat (példa MySQL-re)
$dsn = 'mysql:host=localhost;dbname=velemenyek;charset=utf8';
$username = 'root';
$password = '';
$options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
$pdo = new PDO($dsn, $username, $password, $options);

// Vélemény beküldése
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['name']) && !empty($_POST['review'])) {
    $stmt = $pdo->prepare("INSERT INTO reviews (name, review, created_at) VALUES (?, ?, NOW())");
    $stmt->execute([$_POST['name'], $_POST['review']]);
    $_SESSION['message'] = "Sikeresen beküldted a véleményed!";
    header("Location: index.php");
    exit;
}

// Vélemények lekérése
$reviews = $pdo->query("SELECT * FROM reviews ORDER BY created_at DESC")->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vélemények</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .review { border-bottom: 1px solid #ddd; padding: 10px 0; }
        .success { color: green; }
    </style>
</head>
<body>
    <h1>Írj véleményt</h1>
    <?php if (!empty($_SESSION['message'])): ?>
        <p class="success"><?php echo $_SESSION['message']; unset($_SESSION['message']); ?></p>
    <?php endif; ?>
    <form method="post">
        <label for="name">Név:</label>
        <input type="text" name="name" id="name" required>
        <br>
        <label for="review">Vélemény:</label>
        <textarea name="review" id="review" required></textarea>
        <br>
        <button type="submit">Küldés</button>
    </form>
    <h2>Korábbi vélemények</h2>
    <?php foreach ($reviews as $review): ?>
        <div class="review">
            <strong><?php echo htmlspecialchars($review['name']); ?></strong>
            <p><?php echo nl2br(htmlspecialchars($review['review'])); ?></p>
            <small><?php echo $review['created_at']; ?></small>
        </div>
    <?php endforeach; ?>
</body>
</html>