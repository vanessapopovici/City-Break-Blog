<?php
session_start();
require 'db.php';

// Verificăm dacă utilizatorul este logat
if(!isset($_SESSION['uname']) || $_SESSION['uname'] == '') {
    header("Location: login_form.php");
    exit;
}

$comment_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$article_id = isset($_GET['article_id']) ? intval($_GET['article_id']) : 0;
$current_user_id = intval($_SESSION['uid']);

if($comment_id > 0 && $article_id > 0) {
    
    if ($current_user_id == 1) {
        // Admin-ul poate șterge orice comentariu
        $stmt = $conn->prepare("DELETE FROM comments WHERE id = ?");
        $stmt->bind_param("i", $comment_id);
    } else {
        // Un user normal își poate șterge DOAR comentariul propriu
        $stmt = $conn->prepare("DELETE FROM comments WHERE id = ? AND id_user = ?");
        $stmt->bind_param("ii", $comment_id, $current_user_id);
    }
    
    $stmt->execute();
    $stmt->close();
}

// Redirect înapoi la articolul de unde s-a pornit
header("Location: show_article.php?id=" . $article_id);
exit;
?>