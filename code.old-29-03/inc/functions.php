<?php

function debug($variable){
	echo '<pre>' . print_r($variable, true) . '</pre>';
}


function str_random($length){
	$alphabet = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
	return substr(str_shuffle(str_repeat($alphabet, $length)),0,$length);
}


function logged_only(){
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	if(!isset($_SESSION['auth'])){
		$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
		header('Location: login.php');
		exit();
	}
}

function reconnect_from_cookie(){

	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}

	if(isset($_COOKIE['remember']) && !isset($_SESSION['auth'])){
		require_once 'connectbdd.php';
		if(!isset($pdo)){
		global $pdo;
}
		$remember_token = $_COOKIE['remember'];
		$parts = explode('//', $remember_token);
		$user_id = $parts[0];
		$req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
		$req->execute([$user_id]);
			var_dump($user_id);
		$user = $req->fetchobject();
					var_dump($user);

		if($user){
			$expected = $user_id . '//' . $user->remember_token . sha1($user_id . 'ratonlaveurs');
			if ($expected == $remember_token){
				session_start();
				$_SESSION['auth'] = $user;
				setcookie('remember', $remember_token, time() + 60 * 60 * 24 *7 );
				
			}else{
				setcookie('remember',NULL,-1);
			}
		}else{
			setcookie('remember',NULL,-1);
		}

	}
}

function admin_only(){
	if(($_SESSION['auth']->status=='root') || ($_SESSION['auth']->status=='admin')){
		
	}elseif($_SESSION['auth']->status=='basic'){
		$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
		header('Location: index.php');
		exit();
	}
}

function root_only(){
	if(!$_SESSION['auth']){
		$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
		header('Location: index.php');
		exit();
	}elseif($_SESSION['auth']->status=='root'){
		
	}elseif(($_SESSION['auth']->status=='basic') || ($_SESSION['auth']->status=='admin')){
		$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder à cette page";
		header('Location: index.php');
		exit();
	}
}
