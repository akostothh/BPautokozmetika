<?php
session_start();

// Hibák tárolására szolgáló változó
$errors = [];

// Ellenőrzés, hogy a POST kérés megtörtént-e (azaz az űrlap elküldésre került)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ellenőrzés, hogy minden mező ki van-e töltve
    if ($_POST['username'] == "") $errors[] = "Felhasználónév";
    if ($_POST['email'] == "") $errors[] = "Email cím";
    if ($_POST['pw'] == "") $errors[] = "Jelszó";
    if ($_POST['spw'] == "") $errors[] = "Jelszó megerősítés";

    // Ha van hiba, akkor egy összefoglaló üzenetet jelenítünk meg
    if (count($errors) > 0) {
        $_SESSION['errors'] = $errors; // Hibák mentése session-be
        header("Location: reg_form.php"); // Átirányítás ugyanarra az oldalra
        exit();
    }

    // Ha minden rendben van, folytatjuk a regisztrációval
    include("kapcsolat.php");

    // Jelszó hash-elés
    $upd = md5($_POST['pw']);

    // SQL lekérdezés végrehajtása
    $query = "
    INSERT INTO user (uid, uemail, unick, upd, uszuldatum, udatum, uip, session, ustatusz, ukomment)
    VALUES (NULL, '$_POST[email]', '$_POST[username]', '$upd', '', NOW(), '', '', 'F', '')
    ";

    // Lekérdezés futtatása
    if (mysqli_query($adb, $query)) {
        // Sikeres regisztráció esetén átirányítás a főoldalra
        header("Location: ./ ");
        exit();
    } else {
        // Ha hiba történt, üzenet megjelenítése
        echo "<script> alert('Hiba történt a regisztráció során!')</script>";
    }

    mysqli_close($adb);
}
?>
