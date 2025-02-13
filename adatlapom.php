<?php

include("kapcsolat.php");

// Felhasználó adatainak betöltése
$user = mysqli_fetch_array(mysqli_query($adb, "SELECT * FROM user WHERE uid='" . $_SESSION['uid'] . "'"));
$profilkep = "./profilkepek/" . $user['uprofkep_nev'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
</head>
<body>
    <div class="valtozok">
        <h1>Profilod</h1>
        
        <!-- Profilkép -->
        <?php if (!empty($user['uprofkep_nev']) && file_exists($profilkep)): ?>
            <img src="<?= $profilkep ?>" alt="Profilkép" style="max-width: 200px; max-height: 200px;">
        <?php else: ?>
            <p>Nincs beállított profilkép.</p>
        <?php endif; ?>

        <!-- Felhasználói adatok -->
        <p>Felhasználónév: <?= $user['unick'] ?></p>
        <p>Email: <?= $user['uemail'] ?></p>

        <!-- Adatok módosítása -->
        <form action="adatlap_ir.php" method="post" class="reglog" enctype="multipart/form-data">
            <label for="chk" aria-hidden="true">Adatok változtatása</label><br>
            <input type="hidden" name="uid" value="<?= $user['uid'] ?>"><br>
            <input type="text" name="txt" placeholder="Új név" value="<?= $user['unick'] ?>"><br>
            <input type="email" name="email" placeholder="Új e-mail" value="<?= $user['uemail'] ?>"><br>
            <input type="file" name="uprofkep"><br>
            <button>Mentés</button>
        </form>
    </div>
</body>
</html>

<style>
.valtozok {
    text-align: center;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Főoldal</title>
</head>
<body>
    


    <!-- Kijelentkezés gomb -->
    <form action="logout.php" method="post" style="margin-top: 20px;">
        <button type="submit">Kijelentkezés</button>
    </form>
</body>
</html>
