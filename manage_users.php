<?php
session_start();

// Securitate: doar Adminul are voie aici
if(!isset($_SESSION['uname']) || $_SESSION['uname']=='' || $_SESSION['uid'] != 1){
    header("Location: index.php");
    exit;
}

require_once 'vendor/autoload.php';
require 'db.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$pagetitle = 'Gestionare Utilizatori';

// Extragem utilizatorii, mai puțin adminul (id = 1)
$sql = "SELECT id, user, user_image, user_short_description FROM users WHERE id != 1 ORDER BY id DESC";
$result_users = $conn->query($sql);

echo $twig->render('manage_users.tpl.html', [
    'pagetitle' => $pagetitle,
    'result_users' => $result_users,
    'user_name' => $_SESSION['uname'],
    'user_id' => $_SESSION['uid'],
    'user_image' => $_SESSION['uimage'],
    'user_description' => $_SESSION['udescription']
]);

$conn->close();
?>