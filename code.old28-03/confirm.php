<?php

$user_id = $_GET['id'];
$token = $_GET['token'];

require 'inc/connectbdd.php';
$user="";
$req = $pdo->prepare('SELECT * FROM users WHERE id =?');

$req -> execute([$user_id]);

$user = $req->fetch(PDO::FETCH_LAZY);

var_dump($user);
session_start();

if($user && $user->confirmation_token == $token){
	$pdo->prepare('UPDATE users SET confirmation_token = NULL, confirmed_at = NOW() WHERE id = ?')->execute([$user_id]);
	$_SESSION['flash']['success']= 'Votre compte à bien été validé';
	$_SESSION['auth']= $user;
	header('Location: account.php');
}else{
	$_SESSION['flash']['danger']="ce token n'est plus valide";
	print_r($user_id);
	print_r($token);
	header('Location: login.php');
}