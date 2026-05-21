<?php
session_start();

// Ne asigurăm că utilizatorul este autentificat
if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '') {
    header("Location: login_form.php");
    exit;
}

require_once 'vendor/autoload.php';
require 'db.php';

$uid = intval($_SESSION['uid']);
$update_message = '';

// Procesarea formularului dacă s-a dat Submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_desc = htmlspecialchars(stripslashes(trim($_POST['user_description'])));
    
    // Inițializăm variabilele pentru imagine cu cele curente
    $new_image = $_SESSION['uimage'];
    $upload_success = true;

    // Verificăm dacă a fost încărcată o imagine nouă
    if (isset($_FILES['user_image']) && $_FILES['user_image']['error'] == UPLOAD_ERR_OK) {
        $upload_dir = 'templates/pictures/users/';
        $original_file_name = basename($_FILES['user_image']['name']);
        // Generăm un nume unic pentru a nu suprascrie pozele altor utilizatori
        $new_image = $uid . '_' . time() . '_' . preg_replace("/[^a-zA-Z0-9.]/", "_", $original_file_name);
        $target_file = $upload_dir . $new_image;

        // Dacă upload-ul reușește, totul e OK
        if (!move_uploaded_file($_FILES['user_image']['tmp_name'], $target_file)) {
            $upload_success = false;
            $update_message = "A apărut o eroare la încărcarea imaginii.";
            // Revert la imaginea veche dacă upload-ul eșuează
            $new_image = $_SESSION['uimage']; 
        }
    }

    // Dacă nu au fost erori majore la upload, actualizăm baza de date
    if ($upload_success) {
        $stmt = $conn->prepare("UPDATE users SET user_short_description = ?, user_image = ? WHERE id = ?");
        $stmt->bind_param("ssi", $new_desc, $new_image, $uid);
        
        if ($stmt->execute()) {
            $update_message = "Profilul a fost actualizat cu succes!";
            // Actualizăm și sesiunea curentă pentru ca modificările să se vadă instant
            $_SESSION['udescription'] = $new_desc;
            $_SESSION['uimage'] = $new_image;
        } else {
            $update_message = "Eroare la actualizarea bazei de date.";
        }
        $stmt->close();
    }
}

$loader = new \Twig\Loader\FilesystemLoader('templates');
$twig = new \Twig\Environment($loader);

echo $twig->render('settings.tpl.html', [
    'pagetitle' => 'Settings',
    'update_message' => $update_message,
    'user_name' => $_SESSION['uname'],
    'user_id' => $_SESSION['uid'],
    'user_image' => $_SESSION['uimage'],
    'user_description' => $_SESSION['udescription']
]);

$conn->close();
?>