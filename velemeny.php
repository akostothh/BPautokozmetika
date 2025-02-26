<?php
session_start();
include("kapcsolat.php");
if(isset($_SESSION['uid'])) {
    // Biztonságos bemenetkezelés
    $velemeny = mysqli_real_escape_string($adb, trim($_POST["rate"]));
    $csillagok = isset($_POST["csillagok"]) ? intval($_POST["csillagok"]) : 1;
    $userid = intval($_SESSION['uid']);
    $datum = date("Y-m-d H:i:s");

    // SQL lekérdezés a vélemény hozzáadásához
    $ertekeles = "INSERT INTO `velemeny` (`uid`, `comment`, `rate`, `date`)
    VALUES ('$userid', '$velemeny', '$csillagok', '$datum')";

    if (mysqli_query($adb, $ertekeles)) {
        echo "";
    } else {
        echo "Hiba a beszúrásnál: " . mysqli_error($adb);
    }

    // Lekérdezés a vélemények és értékelések megjelenítéséhez
    $query = "SELECT * FROM `velemeny` ORDER BY `vid` DESC";  // Legújabb vélemények elöl
    $result = mysqli_query($adb, $query);

    ?>

    <!DOCTYPE html>
    <html lang="hu">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <style>
            .velemeny-container {
                width: 50%;
                margin: auto;
                padding: 20px;
            }
            .velemeny {
                border-bottom: 1px solid #ccc;
                padding: 10px 0;
            }
            .velemeny strong {
                font-size: 1.1em;
            }
            .velemeny .date {
                color: gray;
                font-size: 0.9em;
            }
            .stars {
                color: gold;
            }
        </style>
    </head>
    <body>

    <div class="velemeny-container">

  
     

    <?php

    mysqli_close($adb);
} else {
    die("Hiba: Nem vagy bejelentkezve.");
}
?>
