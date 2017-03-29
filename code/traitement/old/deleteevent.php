<?php var_dump($_POST); 


	include '../inc/connectbdd.php';
			$req = $pdo->prepare("DELETE FROM evenement WHERE id_event = ?");//prépare l'envois vers la BDD
print_r($_POST);
			$req->execute(array($_POST['id']));/*envois vers BDD*/ ?> 

	<?php header('location: ../admin_event.php')/*redirection vers page des rando*/ ?> 	