<?php
session_start();
include("kapcsolat.php");

if(isset($_SESSION['uid'])) {
    // Biztonságos bemenetkezelés
    $velemeny = mysqli_real_escape_string($adb, trim($_POST["rate"]));
    $csillagok = isset($_POST["csillagok"]) ? intval($_POST["csillagok"]) : 1;
    $userid = intval($_SESSION['uid']);

    // SQL lekérdezés a vélemény hozzáadásához
    $ertekeles = "INSERT INTO `velemeny` (`uid`, `comment`, `rate`) VALUES ('$userid', '$velemeny', '$csillagok')";

    if (mysqli_query($adb, $ertekeles)) {
        echo "Vélemény sikeresen mentve!";
    } else {
        echo "Hiba a beszúrásnál: " . mysqli_error($adb);
    }

    // Lekérdezés a vélemények és értékelések megjelenítéséhez
    $query = "SELECT * FROM `velemeny` ORDER BY `id` DESC";  // Legújabb vélemények elöl
    $result = mysqli_query($adb, $query);

    if (mysqli_num_rows($result) > 0) {
        echo "<h2>Vélemények:</h2>";
        while ($row = mysqli_fetch_assoc($result)) {
            $user_id = $row['uid'];
            $comment = htmlspecialchars($row['comment']);
            $rate = $row['rate'];
            $date = $row['date']; // Ha van dátum mező

            // Felhasználónevet kiírni (pl. az 'users' táblából)
            $user_query = "SELECT `username` FROM `users` WHERE `id` = '$user_id'";
            $user_result = mysqli_query($adb, $user_query);
            $user_row = mysqli_fetch_assoc($user_result);
            $username = $user_row['username'];

            // Vélemény és értékelés megjelenítése
            echo "<div class='velemeny'>";
            echo "<strong>$username</strong> <span>($date)</span><br>";
            echo "<p>$comment</p>";
            echo "<p>Értékelés: ";
            for ($i = 0; $i < $rate; $i++) {
                echo "⭐";
            }
            echo "</p>";
            echo "</div>";
        }
    } else {
        echo "Nincs még vélemény.";
    }

    mysqli_close($adb);
} else {
    die("Hiba: Nem vagy bejelentkezve.");
}
?>
