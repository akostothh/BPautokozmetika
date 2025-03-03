<?php
session_start();
include("kapcsolat.php");

function randomstring($h) {
    $c = "0123456789abcdefghijklmnopqrstuvwxyz";
    $s = "";
    for ($i = 0; $i < $h; $i++) {
        $s .= substr($c, rand(0, strlen($c) - 1), 1);
    }
    return $s;
}

$uid = mysqli_real_escape_string($adb, $_POST['uid']);
$txt = mysqli_real_escape_string($adb, $_POST['txt']);
$email = mysqli_real_escape_string($adb, $_POST['email']);
$kepadat = $_FILES['uprofkep'];
$frissitKep = false;
$kepnev = "";

// Ha van feltöltött kép
if (!empty($kepadat['name']) && $kepadat['error'] == UPLOAD_ERR_OK) {
    if ($kepadat['type'] == "image/jpeg" || $kepadat['type'] == "image/png") {
        $kiterj = ($kepadat['type'] == "image/jpeg") ? ".jpg" : ".png";
        $kepnev = $_SESSION['uid'] . "_" . date("ymdHis") . "_" . randomstring(10) . $kiterj;
        $celmappa = "./profilkepek/";

        if (!is_dir($celmappa)) {
            mkdir($celmappa, 0755, true);
        }

        $celutvonal = $celmappa . $kepnev;
        if (move_uploaded_file($kepadat['tmp_name'], $celutvonal)) {
            $eredetikepnev = mysqli_real_escape_string($adb, $kepadat['name']);
            $frissitKep = true;
        } else {
            echo "<script>alert('Hiba történt a kép feltöltése során.');</script>";
            exit;
        }
    } else {
        echo "<script>
            alert('A kép csak JPG vagy PNG formátumú lehet!');
            window.location.href = 'index.php';
        </script>";
        exit;
    }
}

// Adatok frissítése az adatbázisban
$query = "UPDATE user SET unick = '$txt', uemail = '$email'";

if ($frissitKep) {
    $query .= ", uprofkep_nev = '$kepnev', uprofkep_eredetinev = '$eredetikepnev'";
}

$query .= " WHERE uid = '$uid'";

if (mysqli_query($adb, $query)) {
    $_SESSION['txt'] = $txt;
    if ($frissitKep) {
        $_SESSION['uprofkep'] = $celutvonal;
    }
} else {
    echo "<script>alert('Hiba történt az adatbázis frissítése során.');</script>";
}

mysqli_close($adb);
header("Location: index.php");
exit;
?>
