<?php
try
{
$pdo = new PDO('mysql:host=localhost; dbname=cicat22; charset=utf8', 'cicat', 'c1c4t.22');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>