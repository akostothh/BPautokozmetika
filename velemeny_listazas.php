<?php
include("kapcsolat.php");
session_start();

if (isset($_SESSION['uid'])) {
    $query = "SELECT v.*, u.unick FROM `velemeny` v 
              LEFT JOIN `user` u ON v.uid = u.uid 
              ORDER BY v.date DESC";
    $result = mysqli_query($adb, $query);

    $velemenyek = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $velemenyek[] = [
            'username' => $row['unick'],
            'date' => $row['date'],
            'comment' => htmlspecialchars($row['comment']),
            'rate' => $row['rate'],
        ];
    }

    // JSON válasz
    header('Content-Type: application/json');
    echo json_encode($velemenyek);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Nem vagy bejelentkezve.']);
}
?>