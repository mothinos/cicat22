<?php include "inc/header.php"; ?>
<h1>Accueil</h1>

</header>

<h2>status <?= $_SESSION['status']; ?></h2>
<?php
//var_dump($_SESSION);

 if($_SESSION['status']=='root'){
	echo 'root';
}elseif($_SESSION['status']=='admin'){
	echo 'admin';
}elseif($_SESSION['status']=='basic'){
	echo 'basic';
}elseif($_SESSION['status']=='lambda'){
	echo 'lambada';
}
?>


</body>
</html>