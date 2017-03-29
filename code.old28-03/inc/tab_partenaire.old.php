<table>
	<th>nom partenaire</th>
	<th>ce qu'ils font avec nous</th>
	<th>ce qu'ils font au quotidien</th>
	<th>site</th>
	<th>modifier</th>
	<th>supprimer</th>

	<?php require 'inc/connectbdd.php';

	$reponse = $pdo->query('SELECT * from partenaire ORDER BY nom_partenaire');

		while ($donnees = $reponse->fetch() ) //boucle dans le tableau
		{ 
			//var_dump($donnees['id_event']);?>


			<tr>
				<td><?php echo $donnees['nom_partenaire']."/".$donnees['id_partenaire'];?></td>
				<td><?php echo $donnees['competences'];?></td>
				<td><?php echo $donnees['secteur'];?></td>
				<td><?php echo $donnees['site'];?></td>				
				<td><form method="post" action="modifier_partenaire.php" ><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id_partenaire'];?>"/><input type="submit" name="update" value="modifier"/></form></td>
				<td><form method="post" action="traitement/deletpartenaire.php"><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id_partenaire'];?>"/><input type="submit" name="delete" value="Supprimer" /></form></td>
			</tr>
		</form>
		<br>



		<?php
	}
	$reponse->closeCursor(); // Termine le traitement de la requête
	?>
</table>