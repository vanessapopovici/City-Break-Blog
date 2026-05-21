<?php
	session_start();
	$loginuser = htmlspecialchars(stripslashes(trim($_POST['username'])));
	$loginpassword = htmlspecialchars(stripslashes(trim($_POST['password'])));
	require 'db.php';

	$stmt = $conn->prepare("SELECT * FROM users WHERE user = ?");
	$stmt->bind_param("s", $loginuser);
	$stmt->execute();
	$row = $stmt->get_result()->fetch_assoc();
	
	if ($row && password_verify($loginpassword, $row['password'])){
		$_SESSION['uname'] = $loginuser;
		$_SESSION['uid'] = $row['id'];
		
		// Dacă are poză setată o folosim pe aia, altfel punem 'user_image.jpg'
		$_SESSION['uimage'] = !empty($row['user_image']) ? $row['user_image'] : 'user_image.jpg';
		
		// Bonus: Punem și o descriere default simpatică dacă profilul e gol!
		$_SESSION['udescription'] = !empty($row['user_short_description']) ? $row['user_short_description'] : 'Salut! Sunt un explorator nou pe City Break Guide.';
		
		Header("Location:index.php");
	} else {
		echo '<script>alert("Wrong username or password.");location.replace("login_form.php");</script>';
	}
	$stmt->close();
	$conn->close();
?>