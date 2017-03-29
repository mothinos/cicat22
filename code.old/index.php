
<!DOCTYPE html>
<html>
<head>
	<title>Cicat 22 - accueil</title>
	<?php include 'inc/link.php' ?>
	 
	</head>
<body>
<header>

<?php include "inc/header.php"; ?>
	<h1>Accueil</h1>


<?php

echo $_SERVER['PHP_SELF'];
// $page = __DIR__;
// echo $page;
require "inc/tab.php"; ?>

<b>Je suis dans la page : <?php echo pagencours ?></b>

	</header>
</body>
</html>