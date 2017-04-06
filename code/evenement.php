<?php include "inc/header.php"; ?>
<?php //include 'inc/header.php' ?>
<br>
<h1>cette page affiche les évenements pour le public</h1>


<?php if(($_SESSION['status']=='root') || ($_SESSION['status']=='admin')){
	echo '<a href="admin_event.php"><button>affichage de la base pour modifier ou ajouter</button></a>';} ?>
	<?php require 'inc/tab.php';?>
</body>

</html>