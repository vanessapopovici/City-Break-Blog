<?php
session_start();

if(!isset($_SESSION['uname']) || $_SESSION['uname']=='' || $_SESSION['uid'] != 1){
    header("Location: index.php");
    exit;
}

require 'db.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = intval($_POST['id']);
    $title = htmlspecialchars(stripslashes(trim($_POST['title'])));
    $title_desc = htmlspecialchars(stripslashes(trim($_POST['title_description'])));
    $long_desc = htmlspecialchars(stripslashes(trim($_POST['long_description'])));
    
    // Verificăm dacă utilizatorul a bifat căsuța de ștergere a imaginii
    $delete_image = isset($_POST['delete_image']) ? intval($_POST['delete_image']) : 0;

    if(!empty($title) && !empty($title_desc) && $id > 0) {
        
        // Cazul 1: Adminul a încărcat o imagine NOUĂ (se suprascrie orice ar fi fost înainte)
        if(isset($_FILES['gallery_image']) && $_FILES['gallery_image']['error'] == UPLOAD_ERR_OK) {
            
            $upload_dir = 'templates/pictures/';
            $original_file_name = basename($_FILES['gallery_image']['name']);
            $clean_file_name = time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
            $target_file = $upload_dir . $clean_file_name;

            if(move_uploaded_file($_FILES['gallery_image']['tmp_name'], $target_file)) {
                $stmt = $conn->prepare("UPDATE galleries SET title=?, title_description=?, long_description=?, img=? WHERE id=?");
                $stmt->bind_param("ssssi", $title, $title_desc, $long_desc, $clean_file_name, $id);
                $stmt->execute();
                $stmt->close();
            }
            
        } else {
            // Cazul 2: Nu s-a încărcat o imagine nouă, dar s-a bifat "Șterge imaginea curentă"
            if ($delete_image == 1) {
                $stmt = $conn->prepare("UPDATE galleries SET title=?, title_description=?, long_description=?, img='' WHERE id=?");
                $stmt->bind_param("sssi", $title, $title_desc, $long_desc, $id);
                $stmt->execute();
                $stmt->close();
                
            // Cazul 3: Nu s-a încărcat imagine nouă și nici nu s-a bifat ștergerea (se păstrează datele vechi)
            } else {
                $stmt = $conn->prepare("UPDATE galleries SET title=?, title_description=?, long_description=? WHERE id=?");
                $stmt->bind_param("sssi", $title, $title_desc, $long_desc, $id);
                $stmt->execute();
                $stmt->close();
            }
        }
        
        // Ne întoarcem pe pagina de gestionare a orașelor
        header("Location: manage_cities.php");
        exit;
    }
}
$conn->close();
?>