<?php
	session_start();
	if(!isset($_SESSION['uname']) || $_SESSION['uname'] == '' || $_SESSION['uid'] == 0){
		header("Location:login_form.php");
		exit;
	}

	require 'db.php';

	$id_article = intval($_POST['id_article']);
	$id_gallery = intval($_POST['id_gallery']);
	$content = htmlspecialchars(stripslashes(trim($_POST['content'])));

	if(!empty($content) && $id_article > 0){
		$stmt = $conn->prepare("INSERT INTO comments (id_article, id_user, content) VALUES (?, ?, ?)");
		$stmt->bind_param("iis", $id_article, $_SESSION['uid'], $content);
		$stmt->execute();
		$stmt->close();
	}

	$conn->close();
	header("Location: show_gallery.php?id=$id_gallery#article-$id_article");
	exit;
?>