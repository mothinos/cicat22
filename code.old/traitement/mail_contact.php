<?php 

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['mail']))

{

    $passage_ligne = "\r\n";

}

else

{

    $passage_ligne = "\n";

}


$to = "cicat.22@gmail.com";
$subject = $_POST['objet'];

$message="<html><head></head><body>".$_POST['message']."</body></html>";

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to, $subject, $message, $headers);
header('location: ../index.php');
?>
