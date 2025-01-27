<?php
session_start();

// Minden session adat törlése
session_unset();
session_destroy();

// Visszairányítás a kezdőlapra vagy belépési oldalra
header("Location: index.php");
exit;
?>