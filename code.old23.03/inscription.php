<!DOCTYPE html>
<html>
<head>
	<title>Cicat 22 - Inscription</title>
	<?php include 'inc/link.php' ?>

</head>
<body>
	<header>

		<?php include "inc/header.php"; ?>
		<h1>inscription</h1>

		<form action="traitement/register.php" method="post">
			<p>
				<label for="nom">entrez votre nom : </label>
			</p>
			<p>
				<input type="text" name="nom">
			</p>
			<p>
				<label for="prenom">entrez votre prénom : </label>
			</p>	
			<p>
				<input type="text" name="prenom">
			</p>
			<p>
				<label for="pseudo">entrez votre pseudo : </label>
			</p>	
			<p>
				<input type="text" name="pseudo">
			</p>
			<p>
				<label for="password">entrez votre mot de passe : </label>
			</p>	
			<p>
				<input type="password" name="password">
			</p>
			<p>
				<label for="password">valider votre mot de passe : </label>
			</p>	
			<p>
				<input type="password" name="password_validation">
			</p>
			<p>
				<input type="submit" name="register"/>
			</p>
		</form>



	</header>
</body>
</html>