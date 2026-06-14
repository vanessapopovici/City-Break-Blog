<?php
session_start();
if(!isset($_SESSION['uname']) || $_SESSION['uname']==''){
    header("Location:login_form.php");
    exit;
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    require 'db.php';
    $article_id = intval($_GET['id']);
    $user_id = intval($_SESSION['uid']);

    //verificarea detinatorului articolului
    $stmt = $conn->prepare("SELECT id_user FROM articles WHERE id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();
    $stmt->close();

    if($article && ($article['id_user'] == $user_id || $user_id == 1)) {
        $del_stmt = $conn->prepare("DELETE FROM articles WHERE id = ?");
        $del_stmt->bind_param("i", $article_id);
        $del_stmt->execute();
        $del_stmt->close();
    }
    $conn->close();
}

header("Location: manage_galleries.php");
exit;
?>