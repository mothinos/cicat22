<?php
try
{
$pdo = new PDO('mysql:host=localhost; dbname=cicat22; charset=utf8', 'root', '');
}
catch (Exception $e)
{
        die('Erreur : ' . $e->getMessage());
}

?>