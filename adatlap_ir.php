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

// Egyedi képnév generálása
$kepnev = $_SESSION['uid'] . "_" . date("ymdHis") . "_" . randomstring(10);
$kepadat = $_FILES['uprofkep'];

if ($kepadat['error'] == UPLOAD_ERR_OK) {
    // Ellenőrzés: megfelelő fájltípus
    if ($kepadat['type'] == "image/jpeg" || $kepadat['type'] == "image/png") {
        $kiterj = ($kepadat['type'] == "image/jpeg") ? ".jpg" : ".png";
        $kepnev .= $kiterj;

        // Kép mentése
        $celmappa = "./profilkepek/";
        if (!is_dir($celmappa)) {
            mkdir($celmappa, 0755, true);
        }

        $celutvonal = $celmappa . $kepnev;
        if (move_uploaded_file($kepadat['tmp_name'], $celutvonal)) {
            $eredetikepnev = $kepadat['name'];

            // Adatok frissítése az adatbázisban
            $uid = mysqli_real_escape_string($adb, $_POST['uid']);
            $txt = mysqli_real_escape_string($adb, $_POST['txt']);
            $email = mysqli_real_escape_string($adb, $_POST['email']);

            $query = "
                UPDATE user
                SET 
                    unick = '$txt',
                    uemail = '$email',
                    uprofkep_nev = '$kepnev',
                    uprofkep_eredetinev = '$eredetikepnev'
                WHERE uid = '$uid'
            ";

            if (mysqli_query($adb, $query)) {
                $_SESSION['txt'] = $txt;
                $_SESSION['uprofkep'] = $celutvonal; // Kép elérési útjának tárolása session-ben
            } else {
                echo "<script>alert('Hiba történt az adatbázis frissítése során.');</script>";
            }
        } else {
            echo "<script>alert('Hiba történt a kép feltöltése során.');</script>";
        }
    } else {
        // Nem megfelelő fájltípus esetén
        echo "<script>
            alert('A kép csak JPG vagy PNG formátumú lehet!');
            window.location.href = 'index.php'; // Visszairányítás a főoldalra
        </script>";
        exit;
    }
} else {
    echo "<script>
        alert('Nem sikerült feltölteni a képet.');
        window.location.href = 'index.php'; // Visszairányítás a főoldalra
    </script>";
    exit;
}

mysqli_close($adb);

// Visszairányítás a főoldalra
header("Location: index.php");
exit;
?>
