<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php require "inc/link.php" ?>
</head>
<body>
	<?php require "inc/header.php" ?> 
	<h1>Contact</h1>
</body>
</html>

<form method="post" action="traitement/mail_contact.php">
	<p><label>Nom</label><br>
		<input type="text" name="nom" placeholder="Nom"/>
	</p>
	<p><label>Prénom</label><br>
		<input type="text" name="prénom" placeholder="Prénom"/>
	</p>

	<p><label>Email</label><br>
		<input type="email" name="mail" placeholder="Mail"/>
	</p>

	<p><label>Objet</label><br>
		<input type="text" name="objet" placeholder="Objet"/>
	</p>

	<p><label>Message</label><br>
		<textarea type="text" name="message" placeholder="Message"></textarea>
	</p>
	<br>
	<input type="submit" name="envoyer" value="envoyer"/>
</form>

