<?php include "inc/header.php"; ?>
	<h1>Accueil</h1>

	</header>

<h2>status <?= $_SESSION['auth']->status; ?></h2>
<?php if($_SESSION['auth']->status=='root'){
	echo 'root';
}elseif($_SESSION['auth']->status=='admin'){
	echo pagencours;
	?>
	<a href="admin.php"><button>admin</button></a>
	<?php
}else{
	echo 'basic';
}
?>


</body>
</html>