<?php
	session_start();
	if(!isset($_SESSION['uname'])){
		$_SESSION['uname']='';
		$_SESSION['uid']=0;
		$_SESSION['uimage']='user_image.jpg';
		$_SESSION['udescription']='No user logged.';
	}
	require_once 'vendor/autoload.php';
	require 'db.php';
	$loader = new \Twig\Loader\FilesystemLoader('templates');
	$twig = new \Twig\Environment($loader);
	$pagetitle = 'Sign Up Page';
	//$sql = "SELECT * FROM carousel";
	//$result_c = $conn->query($sql);
	echo $twig->render('signup_form_base.tpl.html', [
		'pagetitle' => $pagetitle, 
		//'result_c' => $result_c ,
		'user_name'=>$_SESSION['uname'],
		'user_id' =>$_SESSION['uid'],
		'user_image'=>$_SESSION['uimage'],
		'user_description'=>$_SESSION['udescription']
		]);
?>