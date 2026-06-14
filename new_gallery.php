<?php
session_start();

if(!isset($_SESSION['uname']) || $_SESSION['uname']=='' || $_SESSION['uid'] != 1){
    header("Location: index.php");
    exit;
}
require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(stripslashes(trim($_POST['title'])));
    $title_desc = htmlspecialchars(stripslashes(trim($_POST['title_description'])));
    $long_desc = htmlspecialchars(stripslashes(trim($_POST['long_description'])));
    $user_id = intval($_SESSION['uid']);

    if(!empty($title) && !empty($title_desc) && isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] == UPLOAD_ERR_OK) {
        
        $upload_dir = 'templates/pictures/';
        $original_file_name = basename($_FILES['gallery_image']['name']);
        
        $clean_file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
        $target_file = $upload_dir . $clean_file_name;

        if(move_uploaded_file($_FILES['gallery_image']['tmp_name'], $target_file)) {
            
            $stmt = $conn->prepare("INSERT INTO galleries (title, title_description, img, long_description, id_user) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssi", $title, $title_desc, $clean_file_name, $long_desc, $user_id);
            $stmt->execute();
            $stmt->close();
            
            header("Location: index.php");
            exit;
        } else {
            echo "A apărut o eroare la salvarea imaginii pe server.";
        }
    } else {
        echo "Te rugăm să completezi toate câmpurile și să selectezi o imagine.";
    }
}
$conn->close();
?>