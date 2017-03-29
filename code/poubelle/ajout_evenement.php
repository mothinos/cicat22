!DOCTYPE html>
<html>
<head>
	<title>ajout d'événement</title>
	<?php include 'inc/link.php' ?>
</head>
<body>
	<?php include 'inc/header.php' ?>
	<h1>modification d'&Eacute;vénement</h1>
	<button>ajouter événemnent</button>
	<!-- cette partie sera à afficher au clic du bouton ajouter -->
	<form action='traitement/updateevent.php' method="post">
		<p><input type="text" name="titre" placeholder="titre"/></p>
		<p><input type="date" name="date" placeholder="date"/></p>
		<p><input type="text" name="description" placeholder="description"/></p>
		<p><input type="text" name="lieu" placeholder="lieu"></p>
		<p><input type="submit" value='ok'></p>
	</form>
	<table>
		<?php require 'inc/connectbdd.php';

		$reponse = $pdo->query('SELECT * from evenement ORDER BY date');



		while ($donnees = $reponse->fetch() ) //boucle dans le tableau
		{
		?>

		<tr>
			<td><?php echo $donnees['id_event'];?><td>
			<td><?php echo $donnees['titre'];?></td>
			<td><?php echo $donnees['date'];?></td>
			<td><?php echo $donnees['description'];?></td>
			<td><?php echo $donnees['lieu'];?></td>
		</tr>
			<br>


			<?php
		}						$reponse->closeCursor(); // Termine le traitement de la requête
		?>
	</table>						


</body>

					</html>			<!-- <td><a href="update.php?id=<?php echo $donnees['id']; ?>" target="_blank" >Modifier</a></td>
		<td><a href="traitementsuppress.php?id=<?php echo $donnees['id']; ?>" >Supprimer</td>
		<td><?php $_POST['id']=$donnees['id']; echo $_POST['id']; ?></td> -->