<?php include "inc/header.php"; ?>
		<h1>modifier_partenaire</h1>
		<h2>cette page sert au modifications de la bdd partenaire</h2>
		<h3><a href="ajout_partenaire.php">Modifier un partenaire</a></h3>
		<!-- cette partie sera à afficher au clic du bouton ajouter -->

		<?php 
		require 'inc/connectbdd.php'; 
// va chercher les données de la bdd de la ligne selectionné par le bouton modifier
		$reponse = $pdo->query("SELECT * FROM partenaire WHERE  id_partenaire =".$_POST['id']."");

		$donnees= $reponse->fetch();// rempli le tableau $donnees des réponses
		?>

		<form action="traitement/traitement.php" method="post">
			<p><input type="text" name="nom_partenaire" value="<?= $donnees['nom_partenaire'];?>"/></p>
			<p><textarea type="text" name="competences"><?= $donnees["competences"];?></textarea></p>
			<p><textarea type="text" name="secteur" ><?= $donnees["secteur"];?></textarea></p>
			<p><input type="text" name="site" value='<?= $donnees["site"];?>'></p>
			<p><form method="post" action="traitement/traitement.php" ><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id_partenaire'];?>"/><input type="hidden" name='traitement' value="update_partenaire"/><input type="submit" name="update" value="modifier"/></form></p>
		</form>

		<?php 

		//$reponse = $pdo->query('SELECT * from evenement ORDER BY date');
		include 'inc/tab.php';

		?>




	</body>

	</html>