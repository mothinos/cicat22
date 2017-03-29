<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>CICAT 22 - Admin</title>
	<?php include 'inc/link.php' ?>
</head>
<body>
	<?php 
	if(!$_SESSION)
	{
		print_r($_SESSION);
		//header('location: index.php');
		die;
	}
	elseif(isset($_SESSION) && $_SESSION['login']=='admin'){ ?>
	<h1>Admin</h1>
	<?php }
	?>
</body>
</html>