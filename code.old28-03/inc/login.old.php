<!-- formulaire de connexion en POST -->


<?php if(!isset($_SESSION)){ ?>
<form action="index.php" method="post">
	<p>Login pour administrer</p>
	<input type="text" name="login"/>
	<input type="password" name="password">
	<input type="submit" name="submit" value="connexion">
</form>
<?php } ?>