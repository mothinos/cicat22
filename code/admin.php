<?php include "inc/header.php";
require_once 'inc/functions.php';
admin_only() ?>
	<?= 'admin' ?>

	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> gestion des évenements</button><a href="admin_event.php">gestion des évenements</a>
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> gestion des partenaires</button><a href="admin_event.php">gestion des partenaires</a>
	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> gestion des rôles</button><a href="admin_users.php">gestion des rôles</a>
</body>
</html>