<?php
	session_start();
	
	$username = $password = $confirm_password = "";
	$username_err = $password_err = $confirm_password_err = "";
	
	require 'db.php';
	
	if(isset($_SESSION["uname"]) && $_SESSION["uname"] !== ''){
		header("location:index.php");
		exit;
	}
	
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(empty(trim($_POST["username"]))){
			$username_err = "Please enter a username.";
		} else {
			$sql = "SELECT id FROM users WHERE user = ?";
			
			if($stmt = $conn->prepare($sql)){
				$param_username = htmlspecialchars(stripslashes(trim($_POST["username"])));
				
				$stmt->bind_param("s", $param_username);

				if($stmt->execute()){
					$stmt->store_result();
					
					if($stmt->num_rows == 1){
						$username_err = "This username is already taken.";
					} else {
						$username = $param_username;
					}
				} else{
					echo "Oops! Something went wrong. Please try again later.";
				}
				$stmt->close();
			}
		}
		
		//validarea parolei
		if(empty(trim($_POST["password"]))){
			$password_err = "Please enter a password.";     
		} elseif(strlen(trim($_POST["password"])) < 6){
			$password_err = "Password must have atleast 6 characters.";
		} else{
			$password = htmlspecialchars(stripslashes(trim($_POST["password"])));
		}
		
		//validarea confirmarii parolei
		if(empty(trim($_POST["confirm_password"]))){
			$confirm_password_err = "Please confirm password.";     
		} else{
			$confirm_password = htmlspecialchars(stripslashes(trim($_POST["confirm_password"])));
			if(empty($password_err) && ($password != $confirm_password)){
				$confirm_password_err = "Password did not match.";
			}
		}
		
		//verificarea erorilor inainte de inserare in baza de date
		if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
			$sql = "INSERT INTO users (user, password) VALUES (?, ?)";

			if($stmt = $conn->prepare($sql)){
				$param_username = $username;
				$param_password = password_hash($password, PASSWORD_DEFAULT); //criptarea parolei
				
				$stmt->bind_param("ss", $param_username, $param_password);
				
				if($stmt->execute()){
					header("location: login_form.php");
					exit();
				} else{
					echo "Oops! Something went wrong la salvarea în baza de date.";
				}
				$stmt->close();
			}
		}
		else{
			$error_message = $username_err . " " . $password_err . " " . $confirm_password_err;
			echo '<script>alert("'.trim($error_message).'");location.replace("signup_form.php");</script>';
		}
		$conn->close();
	}
?>