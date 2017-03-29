


	
	<?php if(!isset($_SESSION)){ ?>
	<form action="index.php" method="post">
		<p>Login pour administrer</p>
		<input type="text" name="login"/>
		<input type="password" name="password">
		<input type="submit" name="submit" value="connexion">
	</form>
	<?php }elseif(isset($_SESSION)){ ?>
	<a href="admin.php"><button>Admin</button></a>
	<a href="index.php"><button>déconnexion</button></a>
	<?php } ?>
