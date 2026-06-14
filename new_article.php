<?php
	session_start();
	if(!isset($_SESSION['uname']) || $_SESSION['uname']==''){
		header("Location:login_form.php");
		exit;
	}
	require 'db.php';

	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = htmlspecialchars(stripslashes(trim($_POST['title'])));
		$content = htmlspecialchars(stripslashes(trim($_POST['content'])));
		$id_gallery = intval($_POST['id_gallery']);
		$id_user = intval($_SESSION['uid']);

		if(!empty($title) && !empty($content) && $id_gallery > 0){
			$stmt = $conn->prepare("INSERT INTO articles (id_user, id_gallery, title, content) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("iiss", $id_user, $id_gallery, $title, $content);
			
			if($stmt->execute()){
				$new_article_id = $stmt->insert_id;
				$stmt->close();

				if(isset($_FILES['article_images']) && !empty($_FILES['article_images']['name'][0])) {
					$upload_dir = 'templates/pictures/';
					
					foreach($_FILES['article_images']['tmp_name'] as $key => $tmp_name) {
						
						$original_file_name = basename($_FILES['article_images']['name'][$key]);
						
						//pt a evita poze cu acelasi nume, le punem timpul in fata
						$clean_file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
						$target_file = $upload_dir . $clean_file_name;
						
						//mutam poza in memoria temporara pe disc
						if(move_uploaded_file($tmp_name, $target_file)) {
							$img_stmt = $conn->prepare("INSERT INTO article_pictures (id_article, picture) VALUES (?, ?)");
							$img_stmt->bind_param("is", $new_article_id, $clean_file_name);
							$img_stmt->execute();
							$img_stmt->close();
						}
					}
				}
				header("Location: show_article.php?id=" . $new_article_id);
				exit;
				
			} else {
				echo "A apărut o eroare la salvarea articolului.";
			}
		} else {
			header("Location: new_article_form.php?id_gallery=" . $id_gallery);
			exit;
		}
	}
	$conn->close();
?>