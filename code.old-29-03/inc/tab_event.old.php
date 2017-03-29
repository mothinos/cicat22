<table>
	<th>titre</th>
	<th>date</th>
	<th>description</th>
	<th>lieu</th>
	<th>modifier</th>
	<!-- <th>supprimer</th> -->

	<?php require 'inc/connectbdd.php';

	$reponse = $pdo->query('SELECT * from evenement ORDER BY date');

		while ($donnees = $reponse->fetch() ) //boucle dans le tableau
		{ 
			//var_dump($donnees['id_event']);?>


			<tr>
				<td><?php echo $donnees['titre']."/".$donnees['id_event'];?></td>
				<td><?php echo $donnees['date'];?></td>
				<td><?php echo $donnees['description'];?></td>
				<td><?php echo $donnees['lieu'];?></td>				
				<td><form method="post" action="modifier_evenement.php" ><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id_event'];?>"/><input type="submit" name="update" value="modifier"/></form></td>
				<td><form method="post" action="traitement/deleteevent.php"><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id_event'];?>"/><input type="submit" name="delete" value="Supprimer" /></form></td> 
			</tr>
		</form>
		<br>



		<?php
	}
	$reponse->closeCursor(); // Termine le traitement de la requête
	?>
</table>