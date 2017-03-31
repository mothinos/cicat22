<?php

session_start();
setcookie('remember',NULL,-1);
unset($_SESSION['auth']);
/////////////
unset($_SESSION['status']);
($_SESSION['status']='lambda');
///////////////
unset($_SESSION['auth']);
$_SESSION['flash']['success'] = 'Vous vous êtes bien déconnecté';
header('Location: login.php');
