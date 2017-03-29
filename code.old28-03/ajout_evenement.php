<?php include "inc/header.php"; ?>
	<h1>ajout d'&Eacute;vénement</h1>

	<!-- cette partie sera à afficher au clic du bouton ajouter -->
	<form action='traitement/traitement.php' method="post" enctype="multipart/form-data">
		<p><input type="text" name="titre" placeholder="titre"/></p>
		<p><input type="date" name="date" placeholder="date"/></p>
		<p><textarea type="text" name="description" placeholder="description"></textarea><!-- <input type="text" name="description" placeholder="description"/> --></p>
		<p><input type="text" name="lieu" placeholder="lieu"></p>
		<p><input type="hidden" name="MAX_FILE_SIZE" value="300000" />
		<input type="file" name="event_img"/></p>
			<p><input type="hidden" name='traitement' value="add_event"/><input type="submit" value='ok'></p>
		</form>

		<?php require 'inc/tab.php'; ?>

	</body>

	</html>

	