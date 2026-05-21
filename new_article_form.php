<?php
	session_start();
	if(!isset($_SESSION['uname']) || $_SESSION['uname']==''){
		header("Location:login_form.php");
		exit;
	}
	require_once 'vendor/autoload.php';
	require 'db.php';

	$current_gallery_id = isset($_GET['id_gallery']) ? intval($_GET['id_gallery']) : 0;

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);
	$pagetitle = 'Articol nou';

	$sql = "SELECT id, title FROM galleries ORDER BY title ASC";
	$result_galleries = $conn->query($sql);

	echo $twig->render('new_article_form.tpl.html', [
		'pagetitle' => $pagetitle,
		'result_galleries' => $result_galleries,
		'current_gallery_id' => $current_gallery_id,
		'user_name' => $_SESSION['uname'],
		'user_id' => $_SESSION['uid'],
		'user_image' => $_SESSION['uimage'],
		'user_description' => $_SESSION['udescription']
	]);
	$conn->close();
?>