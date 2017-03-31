<?php include "inc/header.php"; 
root_only();?>
<h1>modifier user</h1>
<h2>cette page sert au modifications de la bdd user</h2>

<?php 
require 'inc/connectbdd.php'; 
// va chercher les données de la bdd de la ligne selectionné par le bouton modifier
$reponse = $pdo->query("SELECT * FROM users WHERE  id=".$_POST['id']."");

		$donnees= $reponse->fetch();// rempli le tableau $donnees des réponses
		?>

		<form action="traitement/traitement.php" method="post">
			<p><input type="text" name="username" value="<?= $donnees['username'];?>"/></p>
			<p><input type="text" name="email" value='<?= $donnees["email"];?>'></p>

			<select name="status">
				
				<option value="basic"<?php if($donnees["status"]=='basic'){echo 'selected="selected"';} ?> > basic </option>
				<option value="admin"<?php if($donnees["status"]=='admin'){echo 'selected="selected"';} ?> > admin </option>
				<option value="root" <?php if($donnees["status"]=='root'){echo 'selected="selected"';} ?> > root </option>

			</select>

			<p><!-- envoi de l'id dans le post --><input type="hidden" name='id' value="<?php echo $donnees['id'];?>"/><input type="hidden" name='traitement' value="update_user"/><input type="submit" name="update" value="modifier"/></form></p>
		</form>

		<?php 

		//$reponse = $pdo->query('SELECT * from evenement ORDER BY date');
		include 'inc/tab.php';

		?>




	</body>

	</html>