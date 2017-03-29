<?php include "inc/header.php"; ?>
	<h1>Partenaires</h1>		
	<?php require 'inc/connectbdd.php';

	$reponse = $pdo->query('SELECT * FROM partenaire ORDER BY nom_partenaire');

	while ($donnees = $reponse->fetch() ) //boucle dans le tableau
	{
		echo $donnees['nom_partenaire']." ".$donnees['competences']." ".$donnees['secteur']." ".$donnees['site']; ?>
		<br>
		<?php
		
	}
	$reponse->closeCursor(); // Termine le traitement de la requête
	?>
</table>
<br>
<?php// if(isset($_SESSION)){ ?>
<a href="admin_partenaire.php"><button>affichage de la base pour modifier ou ajouter</button></a>
<?php// } ?>


<?php include 'inc/tab.php';?>

</body>

</html>