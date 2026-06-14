<?php
session_start();
require 'db.php';

if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '') {
    header("Location: login_form.php");
    exit;
}

$user_id = isset($_GET['id']) ? intval($_GET['id']) : intval($_SESSION['uid']);

$stmt = $conn->prepare("SELECT id, user, user_image, user_short_description FROM users WHERE id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_data = $stmt->get_result()->fetch_assoc();
$stmt->close();

if (!$user_data) {
    die("Utilizatorul solicitat nu există.");
}

$stmt = $conn->prepare("SELECT id, title, content, post_date FROM articles WHERE id_user = ? ORDER BY post_date DESC");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_articles = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

$stmt = $conn->prepare("
    SELECT c.id, c.content, c.post_date, c.id_article, a.title AS article_title 
    FROM comments c 
    JOIN articles a ON c.id_article = a.id 
    WHERE c.id_user = ? 
    ORDER BY c.post_date DESC
");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_comments = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
$stmt->close();

require_once 'vendor/autoload.php';
$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('profile.tpl.html', [
    'pagetitle' => 'Profil - ' . $user_data['user'],
    'active_page' => 'profile',
    'profile_user' => $user_data,
    'articles' => $user_articles,
    'comments' => $user_comments,
    'user_name' => $_SESSION['uname'],
    'user_id' => $_SESSION['uid'],
    'user_image' => $_SESSION['uimage'],
    'user_description' => $_SESSION['udescription']
]);

$conn->close();
?>