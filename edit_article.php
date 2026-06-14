<?php
session_start();
if(!isset($_SESSION['uname']) || $_SESSION['uname']==''){
    header("Location:login_form.php");
    exit;
}

require_once 'vendor/autoload.php';
require 'db.php';

$user_id = intval($_SESSION['uid']);

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = intval($_POST['article_id']);
    $title = htmlspecialchars(stripslashes(trim($_POST['title'])));
    $content = htmlspecialchars(stripslashes(trim($_POST['content'])));
    $id_gallery = intval($_POST['id_gallery']);

    $stmt = $conn->prepare("SELECT id_user FROM articles WHERE id = ?");
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $article = $stmt->get_result()->fetch_assoc();
    $stmt->close();

    if($article && ($article['id_user'] == $user_id || $user_id == 1)) {
        //actualizam textul articolului
        $upd_stmt = $conn->prepare("UPDATE articles SET id_gallery = ?, title = ?, content = ? WHERE id = ?");
        $upd_stmt->bind_param("issi", $id_gallery, $title, $content, $article_id);
        $upd_stmt->execute();
        $upd_stmt->close();
        
        //stergem imaginile selectate
        if(isset($_POST['delete_images']) && is_array($_POST['delete_images'])) {
            foreach($_POST['delete_images'] as $img_id) {
                $img_id = intval($img_id);
                $get_img = $conn->query("SELECT picture FROM article_pictures WHERE id = $img_id AND id_article = $article_id");
                if($get_img && $get_img->num_rows > 0) {
                    $res = $get_img->fetch_assoc();
                    $filepath = 'templates/pictures/' . $res['picture'];
                    if(file_exists($filepath)) {
                        unlink($filepath);
                    }
                    $conn->query("DELETE FROM article_pictures WHERE id = $img_id");
                }
            }
        }

        //adaugam imagini noi
        if(isset($_FILES['article_images']) && !empty($_FILES['article_images']['name'][0])) {
            $upload_dir = 'templates/pictures/';
            foreach($_FILES['article_images']['tmp_name'] as $key => $tmp_name) {
                $original_file_name = basename($_FILES['article_images']['name'][$key]);
                $clean_file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
                $target_file = $upload_dir . $clean_file_name;
                
                if(move_uploaded_file($tmp_name, $target_file)) {
                    $img_stmt = $conn->prepare("INSERT INTO article_pictures (id_article, picture) VALUES (?, ?)");
                    $img_stmt->bind_param("is", $article_id, $clean_file_name);
                    $img_stmt->execute();
                    $img_stmt->close();
                }
            }
        }

        header("Location: manage_galleries.php");
        exit;
    } else {
        echo "Nu ai permisiunea de a edita acest articol.";
        exit;
    }
}

//fromular de editare
if(!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: manage_galleries.php");
    exit;
}

$article_id = intval($_GET['id']);
$stmt = $conn->prepare("SELECT * FROM articles WHERE id = ?");
$stmt->bind_param("i", $article_id);
$stmt->execute();
$article = $stmt->get_result()->fetch_assoc();
$stmt->close();

if(!$article || ($article['id_user'] != $user_id && $user_id != 1)) {
    header("Location: manage_galleries.php");
    exit;
}

$article_images = [];
$check_table = $conn->query("SHOW TABLES LIKE 'article_pictures'");
if($check_table->num_rows > 0) {
    $img_result = $conn->query("SELECT id, picture FROM article_pictures WHERE id_article = $article_id");
    while($img_row = $img_result->fetch_assoc()){
        $article_images[] = $img_row;
    }
}

$galleries_result = $conn->query("SELECT id, title FROM galleries ORDER BY title ASC");

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('edit_article.tpl.html', [
    'pagetitle' => 'Editează Articol',
    'article' => $article,
    'images' => $article_images,
    'result_galleries' => $galleries_result,
    'user_name' => $_SESSION['uname'],
    'user_id' => $_SESSION['uid'],
    'user_image' => $_SESSION['uimage'],
    'user_description' => $_SESSION['udescription']
]);

$conn->close();
?>