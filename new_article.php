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
			
			// 1. Inserăm articolul în baza de date
			$stmt = $conn->prepare("INSERT INTO articles (id_user, id_gallery, title, content) VALUES (?, ?, ?, ?)");
			$stmt->bind_param("iiss", $id_user, $id_gallery, $title, $content);
			
			if($stmt->execute()){
				// Luăm ID-ul noului articol abia creat pentru a-l asocia cu imaginile
				$new_article_id = $stmt->insert_id;
				$stmt->close();

				// 2. Gestionăm încărcarea imaginilor
				// Verificăm dacă utilizatorul a încărcat cel puțin un fișier
				if(isset($_FILES['article_images']) && !empty($_FILES['article_images']['name'][0])) {
					
					$upload_dir = 'templates/pictures/';
					
					// Trecem prin fiecare imagine încărcată (pentru că avem array din cauza atributului 'multiple')
					foreach($_FILES['article_images']['tmp_name'] as $key => $tmp_name) {
						
						$original_file_name = basename($_FILES['article_images']['name'][$key]);
						
						// Pentru a evita pozele cu același nume (ex: image.jpg și image.jpg), le punem timpul în față
						$clean_file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
						$target_file = $upload_dir . $clean_file_name;
						
						// Mutăm fișierul din memoria temporară pe disc
						if(move_uploaded_file($tmp_name, $target_file)) {
							// Inserăm calea imaginii în baza de date asociată cu articolul
							$img_stmt = $conn->prepare("INSERT INTO article_pictures (id_article, picture) VALUES (?, ?)");
							$img_stmt->bind_param("is", $new_article_id, $clean_file_name);
							$img_stmt->execute();
							$img_stmt->close();
						}
					}
				}
				
				// La final, trimitem utilizatorul direct să vadă cum arată articolul lui publicat!
				header("Location: show_article.php?id=" . $new_article_id);
				exit;
				
			} else {
				echo "A apărut o eroare la salvarea articolului.";
			}
		} else {
			// Dacă lipsesc date, îl trimitem înapoi la formular
			header("Location: new_article_form.php?id_gallery=" . $id_gallery);
			exit;
		}
	}
	$conn->close();
?>