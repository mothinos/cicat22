
//code de session.php

<?php
		// si on est pas connecté :
$password = isset($_POST['password']) ? $_POST['password'] : NULL;
$login = isset($_POST['login']) ? $_POST['login'] : NULL;
if(!$_POST || $password==NULL || ($login==NULL)){
	require_once "login.php"; 
			// si on est connecté affiche un nouveau menu et un bouton de déco
}else if(($_POST)  && $_POST['password']=='admin' && $_POST['login']=='admin'){ 
	$_SESSION['login']= $_POST['login'];
	?>

	<a href="admin.php"><button>Admin</button></a>
	<a href="index.php"><button>déconnexion</button></a>
	<?php	}
	?>