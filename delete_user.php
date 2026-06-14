<?php
session_start();
require 'db.php';

if(!isset($_SESSION['uname']) || $_SESSION['uname']=='' || $_SESSION['uid'] != 1){
    header("Location: index.php");
    exit;
}

$user_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if($user_id > 1) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $stmt->close();
}

header("Location: manage_users.php");
exit;
?>