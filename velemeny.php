<?php
session_start();
include("kapcsolat.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_SESSION['uid'])) {
        // Az aktuális felhasználó ID-ja
        $userid = $_SESSION['uid'];

        // Ellenőrizzük, hogy van-e már vélemény a felhasználóhoz rendelve
        $query = "SELECT COUNT(*) AS count FROM `velemeny` WHERE `uid` = $userid";
        $result = mysqli_query($adb, $query);
        $row = mysqli_fetch_assoc($result);

        if ($row['count'] > 0) {
            // Ha van már véleménye a felhasználónak
            echo json_encode(["status" => "error", "message" => "Ön már értékelte a szolgáltatásunkat."]);
        } else {
            // Ha nincs véleménye, akkor az új vélemény mentése
            if (isset($_POST["rate"]) && !empty($_POST["rate"]) && isset($_POST["csillagok"]) && !empty($_POST["csillagok"])) {
                $velemeny = mysqli_real_escape_string($adb, trim($_POST["rate"]));
                $csillagok = intval($_POST["csillagok"]); // A csillagok száma

                $datum = date("Y-m-d H:i:s");

                // SQL lekérdezés a vélemény beszúrásához
                $ertekeles = "INSERT INTO `velemeny` (`uid`, `comment`, `rate`, `date`) VALUES ('$userid', '$velemeny', '$csillagok', '$datum')";

                if (mysqli_query($adb, $ertekeles)) {
                    echo json_encode(["status" => "success", "message" => "Köszönöm az értékelését."]);
                } else {
                    echo json_encode(["status" => "error", "message" => "Hiba történt a vélemény mentésekor."]);
                }
            } else {
                echo json_encode(["status" => "error", "message" => "A vélemény szövege és csillagok szükségesek."]);
            }
        }
    } else {
        echo json_encode(["status" => "error", "message" => "Nem vagy bejelentkezve."]);
    }
    exit();
}
?>