<?php include "inc/header.php"; 
admin_only();?>
	<h1>ajout de partenaire</h1>
	
	<!-- cette partie sera à afficher au clic du bouton ajouter -->
	<!-- <form action='traitement/add_partenaire.php' method="post"> -->
	<form action='traitement/traitement.php' method="post">

		<p><input type="text" name="nom_partenaire" placeholder="nom partenaire"/></p>
		<p><textarea type="text" name="competences" placeholder="Ce qu'ils font avec nous"></textarea></p>
		<p><textarea type="text" name="secteur" placeholder="Ce qu'ils font au quotidien"></textarea></p>
		<p><input type="text" name="site" placeholder="site internet"/></p>
		
		<p><input type="hidden" name='traitement' value="add_partenaire"/><input type="submit" value='ajouter'/></p>
	</form>
	
		
		<?php require 'inc/tab.php'; ?>
		

	</body>

	</html>