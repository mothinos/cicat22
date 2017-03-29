

<h1>page de traitement update</h1>




<?php 

var_dump($_POST);
print_r($_POST);
	include '../inc/connectbdd.php';
			$req = $pdo->prepare("UPDATE evenement SET titre= ? , date= ?, description= ?, lieu= ? WHERE id_event = ".$_POST['id']."");//prépare l'envois vers la BDD
var_dump($_POST);
			$req->execute(array( $_POST['titre'], $_POST['date'], $_POST['description'], $_POST['lieu']))/*envois vers BDD*/ ?> 
<p><?php echo 'je crois que ça a fait quelque chose!' ?></p>
	
	<?php header('location: ../admin_event.php')/*redirection vers page des rando*/ ?> 	

