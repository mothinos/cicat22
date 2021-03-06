<?php 
if(!empty($_POST) && !empty($_POST['email'])){

	require_once 'inc/connectbdd.php';
	require_once 'inc/functions.php';
	$req = $pdo->prepare('SELECT * FROM users WHERE  email = ? OR username = ? AND confirmed_at IS NOT NULL');
	$req->execute([$_POST['email'],$_POST['email']]);
	$user = $req->fetchobject();
	if($user){
		session_start();
		$reset_token = str_random(60);
		$pdo->prepare('UPDATE users SET reset_token = ?, reset_at =NOW() WHERE id = ?')->execute([$reset_token, $user->id]);
		$_SESSION['flash']['success'] = 'Les instructions de rappel de mot de passe vous ont été envoyées par mail.';
		$mail=$user->email;
		//$_POST['email']
		mail($mail,'réinitialisation de votre mot de passe',"Afin de réinitialiser votre mot de passe merci de cliquer sur ce lien\n\nhttp://localhost/Dropbox/cicat/code/reset.php?id={$user->id}&token=$reset_token <a target='_blank' href='http://localhost/Dropbox/cicat/code/reset.php?id={$user->id}&token=$reset_token'>cliquez ici</a> ");
		echo "l'envoi de mail s'est fait";
		print_r($reset_token);
		header('Location: login.php');
		exit();
	}else{
		$_SESSION['flash']['danger'] = 'aucun compte ne correspond à cet adresse';
	}
}
?>


<?php require 'inc/header.php'; ?>

<h1>Mot de passe oublié</h1>


<form action="" method="POST">

	<div class="form-group">
		<label for="">Pseudo ou email</label>
		<input type="text" name="email" class="form-control" />
	</div>

	<button type="submit" class="btn btn-primary">Envoyer</button>

</form>

