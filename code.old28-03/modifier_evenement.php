<?php include "inc/header.php"; ?>
		<h1>modifier evenement</h1>
		<h2>cette page sert au modifications de la bdd evenement</h2>
		<h3><a href="ajout_evenement.php">Ajouter un événement</a></h3>
		<!-- cette partie sera à afficher au clic du bouton ajouter -->

		<?php 
		require 'inc/connectbdd.php'; 
// va chercher les données de la bdd de la ligne selectionné par le bouton modifier
		$reponse = $pdo->query("SELECT * FROM evenement WHERE  id_event=".$_POST['id']."");
		$donnees= $reponse->fetch();// rempli le tableau $donnees des réponses
		?>

		<form action="traitement/traitement.php" method="post">
			<p><input type="text" name="titre" value="<?= $donnees['titre'];?>"/></p>
			<p><input type="date" name="date" value='<?= $donnees["date"];?>'/></p>
			<p><textarea type="text" name="description" ><?= $donnees["description"];?></textarea></p>
			<p><input type="text" name="lieu" value='<?= $donnees["lieu"];?>'></p>
			<p><form method="post" action="updateevent.php" ><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id_event'];?>"/><input type="hidden" name='traitement' value="update_event"/><input type="submit" name="update" value="modifier"/></form></p>
		</form>

		<?php 

		//$reponse = $pdo->query('SELECT * from evenement ORDER BY date');
		include 'inc/tab.php';

		?>




	</body>

	</html>