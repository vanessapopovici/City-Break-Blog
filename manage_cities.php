<?php
session_start();

if(!isset($_SESSION['uname']) || $_SESSION['uname']=='' || $_SESSION['uid'] != 1){
    header("Location: index.php");
    exit;
}

require_once 'vendor/autoload.php';
require 'db.php';

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);
$pagetitle = 'Toate Orașele';

$sql = "SELECT id, title, title_description FROM galleries ORDER BY id DESC";
$result_cities = $conn->query($sql);

echo $twig->render('manage_cities.tpl.html', [
    'pagetitle' => $pagetitle,
    'active_page' => 'manage_cities',
    'result_cities' => $result_cities,
    'user_name' => $_SESSION['uname'],
    'user_id' => $_SESSION['uid'],
    'user_image' => $_SESSION['uimage'],
    'user_description' => $_SESSION['udescription']
]);

$conn->close();
?>