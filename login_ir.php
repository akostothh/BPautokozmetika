<?php
session_start();

include("kapcsolat.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Az inputok tisztítása
    $email = mysqli_real_escape_string($adb, $_POST['email']);
    $pw = mysqli_real_escape_string($adb, $_POST['pw']);
    $hashed_pw = md5($pw);

    // IP és session ID lekérése
    $ip = $_SERVER['REMOTE_ADDR'];
    $sess = substr(session_id(), 0, 8);
    $uid = isset($_SESSION['uid']) ? $_SESSION['uid'] : 0;

    // Log bejegyzés hozzáadása
    $log_query = "
        INSERT INTO login (lid, ldatum, lip, lsession, luid)
        VALUES (NULL, NOW(), '$ip', '$sess', '$uid')
    ";
    mysqli_query($adb, $log_query);

    // Felhasználó keresése
    $user_query = "
        SELECT * FROM user
        WHERE uemail = '$email' AND upd = '$hashed_pw'
    ";
    $userek = mysqli_query($adb, $user_query);

    if (mysqli_num_rows($userek) == 0) {
        echo "<script>alert('Hibás belépési adatok!')</script>";
    } else {
        $user = mysqli_fetch_assoc($userek);
        $_SESSION['uid'] = $user['uid'];
        $_SESSION['unick'] = $user['unick'];
        echo "<script>parent.location.href = './'</script>";
    }

    // Kapcsolat lezárása
    mysqli_close($adb);

}
?>