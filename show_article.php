<?php
	session_start();
	
	if(!isset($_SESSION['uname'])){
		$_SESSION['uname']='';
		$_SESSION['uid']=0;
		$_SESSION['uimage']='user_image.jpg';
		$_SESSION['udescription']='No user logged.';
	}

	if(!isset($_GET['id']) || empty($_GET['id'])){
		header("Location: index.php");
		exit;
	}

	$article_id = intval($_GET['id']);
	require_once 'vendor/autoload.php';
	require 'db.php';

	//gestionarea adaugarii unui comentariu nou sau a unui raspuns la un comentariu existent
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$raw_content = isset($_POST['comment_content']) ? $_POST['comment_content'] : (isset($_POST['content']) ? $_POST['content'] : '');
		$content = htmlspecialchars(stripslashes(trim($raw_content)));
		
		if(!empty($content) && $_SESSION['uid'] > 0) {
			$parent_id = (isset($_POST['parent_id']) && !empty($_POST['parent_id'])) ? intval($_POST['parent_id']) : null;
			
			$comment_image = null;
			if (isset($_FILES['comment_image']) && $_FILES['comment_image']['error'] == UPLOAD_ERR_OK) {
				$upload_dir = 'templates/pictures/comments/';
				if (!is_dir($upload_dir)) {
					mkdir($upload_dir, 0777, true);
				}
				$original_name = basename($_FILES['comment_image']['name']);
				$comment_image = $_SESSION['uid'] . '_' . time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_name);
				move_uploaded_file($_FILES['comment_image']['tmp_name'], $upload_dir . $comment_image);
			}
			
			if ($parent_id) {
				$stmt = $conn->prepare("INSERT INTO comments (id_article, id_user, content, parent_id, comment_image) VALUES (?, ?, ?, ?, ?)");
				$stmt->bind_param("iisis", $article_id, $_SESSION['uid'], $content, $parent_id, $comment_image);
			} else {
				$stmt = $conn->prepare("INSERT INTO comments (id_article, id_user, content, comment_image) VALUES (?, ?, ?, ?)");
				$stmt->bind_param("iiss", $article_id, $_SESSION['uid'], $content, $comment_image);
			}
			
			$stmt->execute();
			$stmt->close();
			
			header("Location: show_article.php?id=" . $article_id);
			exit;
		}
	}

	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);

	//extragerea detaliilor articolului
	$stmt = $conn->prepare("SELECT a.*, u.user FROM articles a JOIN users u ON a.id_user = u.id WHERE a.id = ?");
	$stmt->bind_param("i", $article_id);
	$stmt->execute();
	$article = $stmt->get_result()->fetch_assoc();
	$stmt->close();

	if(!$article){
		echo "Articolul nu a fost găsit.";
		$conn->close();
		exit;
	}

	//extragerea imaginilor articolului
	$article_images = [];
	$check_table = $conn->query("SHOW TABLES LIKE 'article_pictures'");
	if($check_table->num_rows > 0) {
		$img_stmt = $conn->prepare("SELECT picture FROM article_pictures WHERE id_article = ?");
		$img_stmt->bind_param("i", $article_id);
		$img_stmt->execute();
		$img_result = $img_stmt->get_result();
		while($img_row = $img_result->fetch_assoc()){
			$article_images[] = $img_row['picture'];
		}
		$img_stmt->close();
	}

	//extragere comentarii
	$comments_result = $conn->query(
		"SELECT c.*, u.user, u.user_image FROM comments c 
		JOIN users u ON c.id_user = u.id 
		WHERE c.id_article = $article_id 
		ORDER BY c.post_date ASC"
	);
	
	$all_comments = [];
	$main_comments = [];
	$replies = [];

	while($com = $comments_result->fetch_assoc()){
		$com['replies'] = [];
		$all_comments[] = $com;
	}

	//separarea comentariilor principale de răspunsuri
	foreach ($all_comments as $c) {
		if ($c['parent_id'] == null) {
			$main_comments[$c['id']] = $c;
		} else {
			$replies[] = $c;
		}
	}

	//atasarea rasounsurilor la comentariile principale
	foreach ($replies as $r) {
		$pid = $r['parent_id'];
		if (isset($main_comments[$pid])) {
			$main_comments[$pid]['replies'][] = $r;
		}
	}

	$comments = array_values($main_comments);

	echo $twig->render('show_article.tpl.html', [
		'pagetitle' => $article['title'],
		'article' => $article,
		'images' => $article_images,
		'comments' => $comments,
		'user_name' => $_SESSION['uname'],
		'user_id' => $_SESSION['uid'],
		'user_image' => $_SESSION['uimage'],
		'user_description' => $_SESSION['udescription']
	]);
	
	$conn->close();
?>