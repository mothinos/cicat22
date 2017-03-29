<?php
echo "page register ";
//print_r($_POST);

echo 'empty';

if(!empty($_POST)){
	//si un des champs est vide on revient vers inscription
	header('location: ../inscription.php');

	echo 'un des champs est vide';
	print_r($_POST);
}else{
	require '../inc/connctbdd.php';

	echo "y'a quelque chose";
}