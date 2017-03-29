<?php


if(pagencours =="/Dropbox/cicat/code/evenement.php" || pagencours =="/Dropbox/cicat/code/ajout_evenement.php" || pagencours =="/Dropbox/cicat/code/modifier_evenement.php" || pagencours =="/Dropbox/cicat/code/admin_event.php"){ 
	?>
	<table>
		<th>titre</th>
		<th>date</th>
		<th>description</th>
		<th>lieu</th>
		<th>affiche</th>
		<?php if(($_SESSION['auth']->status=='root') || ($_SESSION['auth']->status=='admin')){
			echo '<th>modifier</th>
			<th>supprimer</th>';
		}
		require 'inc/connectbdd.php';

		$reponse = $pdo->query('SELECT * from evenement ORDER BY date');

		while ($donnees = $reponse->fetch() ) //boucle dans le tableau
		{ 
			//var_dump($donnees['id_event']);?>


			<tr>
				<td><?php echo $donnees['titre']."/".$donnees['id_event'];?></td>
				<td><?php echo $donnees['date'];?></td>
				<td><?php echo $donnees['description'];?></td>
				<td><?php echo $donnees['lieu'];?></td>
				<td><?= $donnees['event_img'];?></td>
				<!-- bouton modifier -->		
				<?php if(($_SESSION['auth']->status=='root') || ($_SESSION['auth']->status=='admin')){ ?>

				<td>
					<form method="post" action="modifier_evenement.php" ><!-- envoi de l'id dans le post -->
						<input type="hidden" name='id' value="<?php echo $donnees['id_event'];?>"/>
						<input type="submit" name="update" value="modifier"/>
					</form>
				</td>
				<!-- bouton supprimer -->
				<td>
					<form method="post" action="traitement/traitement.php"><!-- envoi de l'id dans le post -->
						<input type="hidden" name='id' value="<?php echo $donnees['id_event'];?>"/>
						<input type="hidden" name='traitement' value="delete_event"/>
						<input type="submit" name="delete" value="Supprimer" />
					</form>
				</td> <?php } ?>
			</tr>
		</form>
		<br>



		<?php
	}
	$reponse->closeCursor(); // Termine le traitement de la requête
	?>
</table>
<?php
}elseif(pagencours =="/Dropbox/cicat/code/partenaire.php" || pagencours =="/Dropbox/cicat/code/ajout_partenaire.php" || pagencours =="/Dropbox/cicat/code/modifier_partenaire.php" || pagencours =="/Dropbox/cicat/code/admin_partenaire.php"){

	?>
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
		{ ?>
		<tr>
			<td><?php echo $donnees['nom_partenaire']."/".$donnees['id_partenaire'];?></td>
			<td><?php echo $donnees['competences'];?></td>
			<td><?php echo $donnees['secteur'];?></td>
			<td><?php echo $donnees['site'];?></td>				
			<td>
				<form method="post" action="modifier_partenaire.php" ><!-- envoi de l'id dans le post -->
					<input type="hidden" name='id' value="<?php echo $donnees['id_partenaire'];?>"/>
					<input type="submit" name="update" value="modifier"/>
				</form>
			</td>
			<td>
				<form method="post" action="traitement/traitement.php"><!-- envoi de l'id dans le post -->
					<input type="hidden" name='id' value="<?php echo $donnees['id_partenaire'];?>"/>
					<input type="hidden" name='traitement' value="delete_partenaire"/>
					<input type="submit" name="delete" value="Supprimer" />
				</form>
			</td>
		</tr>
	</form>
	<br>

	<?php
}
	$reponse->closeCursor(); // Termine le traitement de la requête
	?>
</table>
<?php
}elseif((pagencours =="/Dropbox/cicat/code/admin_users.php") && ($_SESSION['auth']->status=='root')){

	?>
	<table>
		<th>username</th>
		<th>email</th>
		<th>status</th>
		
		<?php require 'inc/connectbdd.php';

		$reponse = $pdo->query('SELECT * from users ORDER BY username');

		while ($donnees = $reponse->fetch() ) //boucle dans le tableau
		{ ?>
		<tr>
			<td><?php echo $donnees['username']."/".$donnees['id'];?></td>
			<td><?php echo $donnees['email'];?></td>
			<td><?php echo $donnees['status'];?></td>
			<td>
				<form method="post" action="modifier_user.php" ><!-- envoi de l'id dans le post -->
					<input type="hidden" name='id' value="<?php echo $donnees['id'];?>"/>
					<input type="submit" name="update" value="modifier"/>
				</form>
			</td>
			<td>
				<form method="post" action="traitement/traitement.php"><!-- envoi de l'id dans le post -->
					<input type="hidden" name='id' value="<?php echo $donnees['id'];?>"/>
					<input type="hidden" name='traitement' value="delete_partenaire"/>
					<input type="submit" name="delete" value="Supprimer" />
				</form>
			</td>
		</tr>
	</form>
	<br>

	<?php
}
	$reponse->closeCursor(); // Termine le traitement de la requête
	?>
</table>
<?php
} 
