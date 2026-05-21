<?php
session_start();
require 'db.php';

// Securitate critică: Verificăm dacă utilizatorul este logat și dacă este ADMIN (ID = 1)
if (!isset($_SESSION['uname']) || $_SESSION['uname'] == '' || $_SESSION['uid'] != 1) {
    header("Location: index.php");
    exit;
}

// Preluăm ID-ul orașului pe care vrem să îl ștergem
$city_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($city_id > 0) {
    
    // Pasul 1 (Opțional, dar recomandat): Ștergem comentariile asociate articolelor acelui oraș, 
    // sau lăsăm baza de date să își facă treaba unde are CASCADE.
    
    // Pasul 2: Ștergem orașul (galeria) din tabelul `galleries`
    // Datorită regulii ON DELETE CASCADE din baza de date pe tabelul `pictures`,
    // toate rândurile din tabelul `pictures` asociate acestui id_gallery se vor șterge AUTOMAT.
    $stmt = $conn->prepare("DELETE FROM galleries WHERE id = ?");
    $stmt->bind_param("i", $city_id);
    $stmt->execute();
    $stmt->close();
}

// După ștergere, trimitem adminul înapoi la pagina de gestionare a orașelor
header("Location: manage_cities.php");
exit;
?>