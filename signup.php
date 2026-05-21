<?php
	session_start();
	
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";
	
	require 'db.php';
	
	// CORECȚIE LOGICĂ: Dacă ești logat (adică uname nu este gol), te trimite la index.
	// Altfel, dacă ești vizitator (uname este ''), te lasă să îți faci cont.
	if(isset($_SESSION["uname"]) && $_SESSION["uname"] !== ''){
		header("location:index.php");
		exit;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Validate username
		if(empty(trim($_POST["username"]))){
			$username_err = "Please enter a username.";
		} else {
			// Prepare a select statement
			$sql = "SELECT id FROM users WHERE user = ?";
			
			if($stmt = $conn->prepare($sql)){
				// 1. MAI ÎNTÂI setăm valoarea variabilei
				$param_username = htmlspecialchars(stripslashes(trim($_POST["username"])));
				
				// 2. ABIA ACUM legăm variabila la interogare
				$stmt->bind_param("s", $param_username);

				// Attempt to execute the prepared statement
				if($stmt->execute()){
					// store result
					$stmt->store_result();
					
					if($stmt->num_rows == 1){
						$username_err = "This username is already taken.";
					} else {
						$username = $param_username;
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				// Close statement
				$stmt->close();
			}
		}
		
		// Validate password
		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter a password.";     
		} elseif(strlen(trim($_POST["password"])) < 6){
			$password_err = "Password must have atleast 6 characters.";
		} else{
			$password = htmlspecialchars(stripslashes(trim($_POST["password"])));
		}
		
		// Validate confirm password
		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm password.";     
		} else{
			$confirm_password = htmlspecialchars(stripslashes(trim($_POST["confirm_password"])));
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}
		
		// Check input errors before inserting in database
		if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
			
			// Prepare an insert statement
			$sql = "INSERT INTO users (user, password) VALUES (?, ?)";

			if($stmt = $conn->prepare($sql)){
				// 1. MAI ÎNTÂI setăm valorile parametrilor în mod clar
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
				
				// 2. ABIA ACUM legăm parametrii la instrucțiunea SQL
				$stmt->bind_param("ss", $param_username, $param_password);
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					// Redirect to login page
					header("location: login_form.php");
					exit();
				} else{
					echo "Oops! Something went wrong la salvarea în baza de date.";
				}
				// Close statement
				$stmt->close();
			}
		}
		else{
			$error_message = $username_err . " " . $password_err . " " . $confirm_password_err;
			echo '<script>alert("'.trim($error_message).'");location.replace("signup_form.php");</script>';
		}
		// Close connection
		$conn->close();
	}
?><?php
	session_start();
	
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";
	
	require 'db.php';
	
	// CORECȚIE LOGICĂ: Dacă ești logat (adică uname nu este gol), te trimite la index.
	// Altfel, dacă ești vizitator (uname este ''), te lasă să îți faci cont.
	if(isset($_SESSION["uname"]) && $_SESSION["uname"] !== ''){
		header("location:index.php");
		exit;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		// Validate username
		if(empty(trim($_POST["username"]))){
			$username_err = "Please enter a username.";
		} else {
			// Prepare a select statement
			$sql = "SELECT id FROM users WHERE user = ?";
			
			if($stmt = $conn->prepare($sql)){
				// 1. MAI ÎNTÂI setăm valoarea variabilei
				$param_username = htmlspecialchars(stripslashes(trim($_POST["username"])));
				
				// 2. ABIA ACUM legăm variabila la interogare
				$stmt->bind_param("s", $param_username);

				// Attempt to execute the prepared statement
				if($stmt->execute()){
					// store result
					$stmt->store_result();
					
					if($stmt->num_rows == 1){
						$username_err = "This username is already taken.";
					} else {
						$username = $param_username;
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				// Close statement
				$stmt->close();
			}
		}
		
		// Validate password
		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter a password.";     
		} elseif(strlen(trim($_POST["password"])) < 6){
			$password_err = "Password must have atleast 6 characters.";
		} else{
			$password = htmlspecialchars(stripslashes(trim($_POST["password"])));
		}
		
		// Validate confirm password
		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm password.";     
		} else{
			$confirm_password = htmlspecialchars(stripslashes(trim($_POST["confirm_password"])));
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}
		
		// Check input errors before inserting in database
		if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
			
			// Prepare an insert statement
			$sql = "INSERT INTO users (user, password) VALUES (?, ?)";

			if($stmt = $conn->prepare($sql)){
				// 1. MAI ÎNTÂI setăm valorile parametrilor în mod clar
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
				
				// 2. ABIA ACUM legăm parametrii la instrucțiunea SQL
				$stmt->bind_param("ss", $param_username, $param_password);
				
				// Attempt to execute the prepared statement
				if($stmt->execute()){
					// Redirect to login page
					header("location: login_form.php");
					exit();
				} else{
					echo "Oops! Something went wrong la salvarea în baza de date.";
				}
				// Close statement
				$stmt->close();
			}
		}
		else{
			$error_message = $username_err . " " . $password_err . " " . $confirm_password_err;
			echo '<script>alert("'.trim($error_message).'");location.replace("signup_form.php");</script>';
		}
		// Close connection
		$conn->close();
	}
?>