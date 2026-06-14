<?php
session_start();
require 'db.php';

if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '' || $_SESSION['uid'] != 1) {
    header("Location: index.php");
    exit;
}

$city_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($city_id > 0) {
    $stmt = $conn->prepare("DELETE FROM galleries WHERE id = ?");
    $stmt->bind_param("i", $city_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: manage_cities.php");
exit;
?>