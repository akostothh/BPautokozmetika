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
        <form action="logout.php" method="post" style="margin-top: 20px;">
        <button type="submit">Kijelentkezés</button>
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
    
</body>
</html>
<style>

/* Általános stílusok */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    text-align: center;
    margin: 0;
    padding: 0;
}

h1 {
    color: #222;
}

/* Profil container */
.valtozok {
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    max-width: 800px;
    margin: 50px auto;
    
}

/* Profilkép */
.valtozok img {
    width: 150px;
    height: 150px;
    border-radius: 50%;
    object-fit: cover;
    border: 3px solid rgb(0, 0, 0);
    display: block;
    margin: 0 auto;
}

/* Input mezők */
input[type="text"],
input[type="email"],
input[type="file"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #ccc;
    border-radius: 5px;
}

/* Felhasználói adatok */
.valtozok p {
    font-size: 16px;
    font-weight: bold;
    color: #555;
    background: #f0f0f0;
    padding: 8px;
    border-radius: 5px;
    margin: 5px 0;
    text-align: left;
}

.valtozok p span {
    font-weight: normal;
    color: #333;
}

/* Gombok */
button {
    background: #007BFF;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

button:hover {
    background: #0056b3;
}

/* Kijelentkezés gomb */
form[action="logout.php"] button {
    background: #dc3545;
}

form[action="logout.php"] button:hover {
    background: #a71d2a;
}

    </style>
