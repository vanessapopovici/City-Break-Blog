<?php
	session_start();
	if(!isset($_SESSION['uname']) || $_SESSION['uname']==''){
		header("Location:login_form.php");
		exit;
	}
	require_once 'vendor/autoload.php';
	require 'db.php';
	
	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);
	$pagetitle = 'Manage My Articles';
	
	$uid = intval($_SESSION['uid']);

	if($uid != 1) {
		$sql = "SELECT a.*, g.title as gallery_title FROM articles a LEFT JOIN galleries g ON a.id_gallery = g.id WHERE a.id_user = $uid ORDER BY a.post_date DESC";
	} else {
		$sql = "SELECT a.*, g.title as gallery_title, u.user FROM articles a LEFT JOIN galleries g ON a.id_gallery = g.id LEFT JOIN users u ON a.id_user = u.id ORDER BY a.post_date DESC";
	}
	
	$result_a = $conn->query($sql);
	
	echo $twig->render('manage_galleries.tpl.html', [
		'pagetitle' => $pagetitle,
		'result_a' => $result_a,
		'user_name'=>$_SESSION['uname'],
		'user_id' =>$_SESSION['uid'],
		'user_image'=>$_SESSION['uimage'],
		'user_description'=>$_SESSION['udescription'],
		'active_page' => 'manage'
	]);
	$conn->close();
?>