<!-- <?php $pdo// = new PDO('mysql:host=localhost; dbname=cicat22', 'root', '');?> -->
<h1>page de traitement</h1>




<?php 
	include '../inc/connectbdd.php';
			$req = $pdo->prepare("INSERT INTO evenement set titre= ? , date= ?, description= ?, lieu= ?");//prépare l'envois vers la BDD

			$req->execute(array( $_POST['titre'], $_POST['date'], $_POST['description'], $_POST['lieu']))/*envois vers BDD*/ ?> 
<p><?php echo 'je crois que ça a fonctionné' ?></p>
	
	<?php header('location: ../admin_event.php')/*redirection vers page des rando*/ ?> 	


<!-- <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php 
	//include 'inc/header.php';

//include 'inc/connnectbdd.php';
	?>

</body>
</html>
 -->