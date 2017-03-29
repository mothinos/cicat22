<?php

require_once 'inc/functions.php';
session_start();
require 'inc/header.php'; 
if(!empty($_POST)){

	require_once 'inc/connectbdd.php';

	$errors = array();

	if(empty($_POST['username']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['username'])){
		$errors['username'] = "Votre pseudo n'est pas valide";
	} else {
		$req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
		$req -> execute([$_POST['username']]);
		$user = $req->fetch();
		if($user){
			$errors['username'] = 'Ce pseudo est déjà pris';
		}
	}
}
//
if(empty($_POST)){

}else{
//
if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
	$errors['email'] = "votre email n'est pas valide";
}else{
	$req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
	$req -> execute([$_POST['email']]);
	$user = $req->fetch();
	if($user){
		$errors['email'] = 'Cet email est déjà utilisé pour un autre compte';
	}
}

if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
	$errors['password'] = "vous devez rentrer un mot de passe valide";
}

if(empty($errors)){



	$req = $pdo->prepare("INSERT INTO users SET username = ?, password= ?, email = ?, confirmation_token = ?");
	$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
	$token = str_random(60);
	$req ->execute([$_POST['username'], $password, $_POST['email'], $token]);
	$user_id = $pdo->lastInsertId();
	mail($_POST['email'],'confirmation de votre compte',"Afin de valider votre compte merci de cliquer sur ce lien\n\n<a href='http://localhost/Dropbox/cicat/code/confirm.php?id={$user_id}&token={$token}' target='_blank'>cliquez ici</a> http://localhost/Dropbox/cicat/code/confirm.php?id={$user_id}&token={$token} ");
	$_SESSION['flash']['success']='Un email de confirmation vous a été envoyé pour valider vote compte';
	header('location: login.php');
	exit();
}
}
//debug($errors);
?>




<h1>s'inscrire</h1>

<?php if(!empty($errors)): ?>

	<div class="alert alert-danger">

		<p>Vous n'avez pas rempli le formulaire correctement</p>

		<ul>

			<?php foreach($errors as $error): ?>

				<li><?= $error; ?></li>

			<?php endforeach; ?>
		</ul>
	</div>

<?php endif; ?>

<form action="" method="POST">

	<div class="form-group">
		<label for="">Pseudo</label>
		<input type="text" name="username" class="form-control" />
	</div>

	<div class="form-group">
		<label for="">Email</label>
		<input type="text" name="email" class="form-control" />
	</div>

	<div class="form-group">
		<label for="">mot de passe</label>
		<input type="password" name="password" class="form-control" />
	</div>

	<div class="form-group">
		<label for="">confirmer mot de passe</label>
		<input type="password" name="password_confirm" class="form-control" />
	</div>

	<button type="submit" class="btn btn-primary">m'inscrire</button>

</form>

<?php //require 'inc/footer.php'; ?>
