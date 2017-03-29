<?php
require 'inc/functions.php';
logged_only();
if(!empty($_POST)){
	
	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
		$_SESSION['flash']['danger'] = 'les mots de passe ne correspondent pas';
	}else{
		$user_id = $_SESSION['auth']->id;
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		require_once 'inc/connectbdd.php';
		$pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]);

		$_SESSION['flash']['success'] = 'Votre mot de passe à bien été mis à jour';
	}
}
require 'inc/header.php';
?>

<h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
<h2>status <?= $_SESSION['auth']->status; ?></h2>
<?php if($_SESSION['auth']->status=='root'){
	echo 'root';
}elseif($_SESSION['auth']->status=='admin'){
	echo 'admin';
}else{
	echo 'basic';
}
?>

<form action="" method="post">
	<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="changer de mot de passe"/>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="password_confirm" placeholder="confirmation du mot de passe"/>
	</div>
	<button class="btn btn-primary">Changer mon mot de passe</button>
</form>

