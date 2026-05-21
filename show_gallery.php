<?php
	session_start();
	
	if(!isset($_SESSION['uname'])){
		$_SESSION['uname']='';
		$_SESSION['uid']=0;
		$_SESSION['uimage']='user_image.jpg';
		$_SESSION['udescription']='No user logged.';
	}

	$gallery_id = intval($_GET['id']);
	require_once 'vendor/autoload.php';
	require 'db.php';

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);
	$pagetitle = 'City Break Guide';

	$sql= "SELECT * FROM galleries WHERE id=$gallery_id";
	$result_g = $conn->query($sql);

	$sql = "SELECT * FROM pictures WHERE id_gallery = $gallery_id";
	$result_p = $conn->query($sql);

	$sql = "SELECT a.*, u.user FROM articles a 
			JOIN users u ON a.id_user = u.id 
			WHERE a.id_gallery = $gallery_id 
			ORDER BY a.post_date DESC";
	$articles_result = $conn->query($sql);

	$articles = [];
	while($article = $articles_result->fetch_assoc()){
		$aid = $article['id'];
		$comments_result = $conn->query(
			"SELECT c.*, u.user FROM comments c 
			JOIN users u ON c.id_user = u.id 
			WHERE c.id_article = $aid 
			ORDER BY c.post_date ASC"
		);
		$article['comments'] = [];
		while($comment = $comments_result->fetch_assoc()){
			$article['comments'][] = $comment;
		}
		$articles[] = $article;
	}

	echo $twig->render('show_gallery_base.tpl.html', [
		'pagetitle' => $pagetitle,
		'result_g' => $result_g,
		'result_p' => $result_p,
		'articles' => $articles,
		'gallery_id' => $gallery_id,
		'user_name'=>$_SESSION['uname'],
		'user_id' =>$_SESSION['uid'],
		'user_image'=>$_SESSION['uimage'],
		'user_description'=>$_SESSION['udescription']
		]);
	$conn->close();
?>