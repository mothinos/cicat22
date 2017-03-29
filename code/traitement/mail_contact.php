<?php 

if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $_POST['mail']))

{

    $passage_ligne = "\r\n";

}

else

{

    $passage_ligne = "\n";

}
$mail = $_POST['email'];
$reponse= 'en réponse à votre prise de contact sur le site cicat22';// texte du message dans le mailto
$to = "cicat.22@gmail.com"; //adresse d'envoi du mail de contact
$subject = $_POST['objet']; //sujet du mail de contact
$mailto = $email."?subject=".$reponse; 



$mess1= "<html><head></head><body><h1>vous venez de recevoir un email depuis le site Cicat22.bzh<br>";
$mess2= $_POST['prenom']." ".$_POST['prenom'];
$mess3= "veux vous dire : <br> Object :";
$mess4= $_POST['objet'];
$mess5= '<br>message :'; 
$mess6= $_POST['message'];
$mess7=  '<br>pour répondre <a target=_blank href="mailto:';
$mess8= $_POST['email'];
$mess9= "?subject=";
$mess10= 'en réponse à votre prise de contact sur le site cicat22';
$mess11= 'cliquez ici</a></body></html>';

$messagetot = $mess1.$mess2.$mess3.$mess4.$mess5.$mess6.$mess7.$mess8.$mess9.$mess10.$mess11;







$message= "<html><head></head><body><h1>vous venez de recevoir un email depuis le site Cicat22.bzh<br>".$_POST['prenom']." ".$_POST['prenom']. "veux vous dire : <br> Object : ".$_POST['objet']."<br>message : ".$_POST['message']."<br>pour répondre <a target=_blank href='mailto:" .$mailto."'>cliquez ici</a></body></html>" ;

$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to, $subject, $message, $headers);
header('location: ../index.php');
?>
