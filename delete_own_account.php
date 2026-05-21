<?php
session_start();
require 'db.php';

// Pasul 1: Verificăm dacă utilizatorul este autentificat în sesiune
if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '') {
    header("Location: login_form.php");
    exit;
}

$current_user_id = intval($_SESSION['uid']);

// Pasul 2: Protecție de siguranță - Nu permitem Adminului principal (ID = 1) să își șteargă contul de aici
if ($current_user_id === 1) {
    die("Eroare: Administratorul principal nu își poate șterge contul prin această metodă.");
}

if ($current_user_id > 1) {
    // Pasul 3: Executăm ștergerea utilizatorului din baza de date
    // Datorită regulii ON DELETE CASCADE configurată în baza ta de date pe tabelele `articles` și `comments`,
    // toate datele asociate acestui user vor fi eliminate automat de către MySQL.
    $stmt = $conn->prepare("DELETE FROM users WHERE id = ?");
    $stmt->bind_param("i", $current_user_id);
    $stmt->execute();
    $stmt->close();
    
    // Pasul 4: Închidem sesiunea și curățăm toate variabilele globale de autentificare
    $_SESSION = array();
    
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    
    session_destroy();
}

// Pasul 5: Redirecționăm fostul utilizator către pagina principală ca vizitator anonim
header("Location: index.php");
exit;
?>