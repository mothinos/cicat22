<?php
require 'inc/functions.php';
logged_only();
if(!empty($_POST)){
	
	if(empty($_POST['password']) || $_POST['password'] != $_POST['password_confirm']){
		$_SESSION['flash']['danger'] = 'les mots de passe ne correspondent pas';
	}else{
		$user_id = $_SESSION['auth']->id;
		// echo 'var_dump()';
		// var_dump($_SESSION['auth']->status);
		$_SESSION['status']=$_SESSION['auth']->status;
		$password = password_hash($_POST['password'], PASSWORD_BCRYPT);
		require_once 'inc/connectbdd.php';
		$pdo->prepare('UPDATE users SET password = ? WHERE id = ?')->execute([$password, $user_id]);

		$_SESSION['flash']['success'] = 'Votre mot de passe à bien été mis à jour';
	}
}else{
	// echo '$_POST est vide';
	// var_dump($_SESSION);
}
require 'inc/header.php';
?>

<h1>Bonjour <?= $_SESSION['auth']->username; ?></h1>
<!-- test du status -->
<h2>status <?= $_SESSION['status']; ?></h2>
<!-- <?php if($_SESSION['status']=='root'){
	echo 'root';
}elseif($_SESSION['status']=='admin'){
	echo 'admin';
}elseif($_SESSION['status']=='basic'){
	echo 'basic';
}elseif($_SESSION['status']=='lambda'){
	echo 'lambda';
}else{
	header('location : index.php');
}
?> -->
<!--fin du test du status -->
<form action="" method="post">
	<div class="form-group">
		<input class="form-control" type="password" name="password" placeholder="changer de mot de passe"/>
	</div>
	<div class="form-group">
		<input class="form-control" type="password" name="password_confirm" placeholder="confirmation du mot de passe"/>
	</div>
	<button class="btn btn-primary">Changer mon mot de passe</button>
</form>

