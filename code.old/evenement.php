<!DOCTYPE html>
<html>
<head>
	<title>événement</title>
	<?php include 'inc/link.php' ?>
</head>
<body>
	<?php include 'inc/header.php' ?>
	<br>
	<h1>cette page affiche les évenements pour le public</h1>
<!-- 	<h1>&Eacute;vénement</h1>
	<button>ajouter événemnent</button>
	 cette partie sera à afficher au clic du bouton ajouter 
	<form action='traitenment/addevent.php' method="post">
		<p><input type="text" name="titre" placeholder="titre"/></p>
		<p><input type="date" name="date" placeholder="date"/></p>
		<p><input type="text" name="description" placeholder="description"/></p>
		<p><input type="text" name="lieu" placeholder="lieu"></p>
		<p><input type="submit" value='ok'></p>
	</form>
 -->
	
				<?php// if(isset($_SESSION)){ ?>
					<a href="admin_event.php"><button>affichage de la base pour modifier ou ajouter</button></a>
					<?php// } ?>

					
					<?php require 'inc/tab.php';?>
				</body>

				</html>