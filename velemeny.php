<?php
session_start();
include("kapcsolat.php");

if(isset($_SESSION['uid'])) {
    //if (!isset($_POST["rate"]) || !isset($_POST["csillag"])) {
       // die("Hiba: A szükséges adatok hiányoznak!");
    //}

    // Biztonságos bemenetkezelés
    $velemeny = mysqli_real_escape_string($adb, trim($_POST["rate"]));
    $csillagok = isset($_POST["csillagok"]) ? intval($_POST["csillagok"]) : 1;
    $userid = intval($_SESSION['uid']);

    // Debug kiírások
    var_dump($velemeny);
    var_dump($csillagok);
    var_dump($userid);

    // SQL lekérdezés
    $ertekeles = "INSERT INTO `velemeny` (`uid`, `comment`, `rate`) VALUES ('$userid', '$velemeny', '$csillagok')";

    if (mysqli_query($adb, $ertekeles)) {
        echo "Vélemény sikeresen mentve!";
    } else {
        echo "Hiba a beszúrásnál: " . mysqli_error($adb);
    }

    mysqli_close($adb);
} else {
    die("Hiba: Nem vagy bejelentkezve.");
}
?>
