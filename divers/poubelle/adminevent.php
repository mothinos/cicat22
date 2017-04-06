<!DOCTYPE html>
<html>
<head>
	<title>ajout d'événement</title>
	<?php include 'inc/link.php' ?>
</head>
<body>
	<?php include 'inc/header.php' ?>
	<h1>adminevent</h1>
	<h2>cette page sert au modification de la bdd evenement</h2>
	
	<table>
		
		<th>id</th>
		<th>titre</th>
		<th>date</th>
		<th>description</th>
		<th>lieu</th>
		<th>modifier</th>
		<th>supprimer</th>

		<?php require 'inc/connectbdd.php';

		$reponse = $pdo->query('SELECT * from evenement ORDER BY date');



		while ($donnees = $reponse->fetch() ) //boucle dans le tableau
		{ ?>

		<tr>
			<td><?php echo $donnees['id_event'];?></td>
			<td><?php echo $donnees['titre'];?></td>
			<td><?php echo $donnees['date'];?></td>
			<td><?php echo $donnees['description'];?></td>
			<td><?php echo $donnees['lieu'];?></td>
			<td><form method="post" action="modifier_evenement.php"><input type="submit" name="update" value="modifier"/></form></td>
			<td><form method="post" action="supprimer_evenement.php"><input type="submit" name="delete" value="Supprimer" /></form></td>
		</tr>
	</form>
	<br>



	<?php
}
						$reponse->closeCursor(); // Termine le traitement de la requête
						?>
					</table>			



				</body>

				</html>