<?php
session_start();
require 'db.php';

if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '') {
    header("Location: login_form.php");
    exit;
}

$current_user_id = intval($_SESSION['uid']);

if ($current_user_id === 1) {
    die("Eroare: Administratorul principal nu își poate șterge contul prin această metodă.");
}

if ($current_user_id > 1) {
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $current_user_id);
    $stmt->execute();
    $stmt->close();
    
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
}

header("Location: index.php");
exit;
?>