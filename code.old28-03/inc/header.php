<?php 
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="">
	<meta name="author" content="">
	<link rel="icon" href="images/favicon.ico">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css"/>
	<?php define('pagencours', $_SERVER['PHP_SELF'], true); ?>
	<title><?= pagencours; ?></title>

	<!-- Bootstrap core CSS -->
	
   <link href="css/app.css" rel="stylesheet">

</head>

<body>

	<nav class="navbar navbar-inverse">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
				</button>
				<a class="navbar-brand" href="http://localhost/Dropbox/cicat/code/index.php">cicat.22</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<?php if(isset($_SESSION['auth'])): ?>
						<li><a href="logout.php">Se déconnecter</a></li>

					<?php else: ?>
						<li><a href="register.php">s'inscrire</a></li>
						<li><a href="login.php">se connecter</a></li>
					<?php endif; ?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>

		<?php if(isset($_SESSION['flash'])): ?>
			<?php foreach($_SESSION['flash'] as $type=>$message): ?>
				<div class="alert alert-<?= $type; ?>">
					<?= $message; ?>
				</div>

			<?php endforeach; ?>

			<?php unset($_SESSION['flash']); ?>
		<?php endif; ?>


		<!-- navbar  -->
		<div class="container">
			<div id="logo">
				<a href="index.php" ><img src="images/logo.svg" alt="logo_cicat22" title="logo_cicat22"/></a>
			</div>
			<div>
				<ul id="menu_deroulant">
					<li><a href="evenement.php">événement</a>
						<ul>
							<li><a href="#">événements prochain</a></li>
							<li><a href="#">événements passé</a></li>
						</ul>
					</li>
					<li><a href="aide.php">Aide quotidienne</a>
						<ul>
							<li><a href="#"></a></li>
							<li><a href="#"></a></li>
						</ul>
					</li>
					<li><a href="contact.php">Contact</a>
					<!-- <ul>
					<li><a href=""></a></li>
				</ul> -->
			</li>			
			<li><a href="forum.php">Forum</a>
				<ul>
					<li><a href="#">Connexion</a></li>
				</ul>
			</li>
			<li><a href="partenaire.php">Partenaire</a>
				<ul>
					<li><a href="partenaire.php">partenaire</a></li>
				</ul>
			</li>
			<li><a href="emploi.php">emploi/Formation</a>
				<ul>
					<li><a href="emploi.php">Emploi</a></li>
					<li><a href="formation.php">Formation</a></li>
				</ul>
			</li>
		</ul>
	</div>
</div>

