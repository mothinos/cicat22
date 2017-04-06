    <!DOCTYPE html>
    <html>
    <head>
        <title>traitement</title>
    </head>
    <body>
        <?php 
        //echo "Variable POST : ";
        //var_dump($_POST);
        //echo "ça c'est le dollars files : \n";
        //print_r($_FILES['event_img']);?>
    </body>
    </html>
    <?php
    session_start();
//******************************************************************************************************
//
//
//                                         traitement add evenement
//
//
//******************************************************************************************************

    if($_POST['traitement']=='add_event'){
        echo "ça c'est add_event";
        echo'<h1>page de traitement</h1>';
        //var_dump($_FILES['event_img']['error']);
        if(!empty($_FILES)){


        //création du nouveau nom de l'image
            $random = rand(1,999);
            $temp = $random.$_POST['titre'].$_FILES['event_img']['name'];
            $new_name = str_replace(" ", "_", $temp);            
            $img = $_FILES['event_img'];
            

            // $output = $img['tmp_name'];
            // echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";

            require ("../inc/imgClass.php");
            //pour tester l'extention du fichier
            $ext = strtolower(substr($img['name'], -3));
            $allow_ext = array("jpg","png","gif");
            if(in_array($ext, $allow_ext)){
            //déplacement du fichier
                move_uploaded_file($img['tmp_name'], '../upload/'.$new_name);
            Img::creerMin( '../upload/'.$new_name, '../upload/min', $new_name,215,112);
            //"min.{$new_name}"
            //fin du déplacement de l'image
            //traitement de l'evenement -> insertion dans la bdd
                include '../inc/connectbdd.php';
                $req = $pdo->prepare("INSERT INTO evenement set titre= ? , date= ?, description= ?, lieu= ?, event_img= ?");
    //prépare l'envois vers la BDD
                $req->execute(array( $_POST['titre'], $_POST['date'], $_POST['description'], $_POST['lieu'], $new_name))
                // envois vers BDD
                ?> 
                <p><?php echo 'je crois que ça a fonctionné</p>';

            }else{

        //cette variable ne repasse pas vers ajout_evenement.php
                $_SESSION['flash']['danger'] = "ce fichier n'est pas une image valide";
                //header('location: ../ajout_evenement.php');
            }
        }elseif(empty($_FILES)){
            $_SESSION['flash']['danger'] = "Vous n'avez pas selectionné d'image";
            header('location: ../ajout_evenement.php');
        }

    //mise en commentaire des prochaines lignes 
    //include '../inc/connectbdd.php';
    //$req = $pdo->prepare("INSERT INTO evenement set titre= ? , date= ?, description= ?, lieu= ?, event_img= ?");
//prépare l'envois vers la BDD
    //$req->execute(array( $_POST['titre'], $_POST['date'], $_POST['description'], $_POST['lieu'], $img['name']))
        /*envois vers BDD*/ ?> 
        <p><?php// echo 'je crois que ça a fonctionné'; ?></p>


        <?php
        var_dump($img);
        header('location: ../evenement.php');/*redirection vers page des événements*/ 

    }elseif($_POST['traitement']=='update_event'){
//******************************************************************************************************
//
//
//                                         traitement update evenement
//
//
//******************************************************************************************************

       echo "ça c'est update_event";
       var_dump($_POST);
       print_r($_POST);
       include '../inc/connectbdd.php';
       if(!empty($_FILES)){

        //création du nouveau nom de l'image
        $random = rand(1,999);
        $temp = $random.$_POST['titre'].$_FILES['event_img']['name'];
        $new_name = str_replace(" ", "_", $temp);            
        $img = $_FILES['event_img'];

            // $output = $img['tmp_name'];
            // echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";

        require ("../inc/imgClass.php");
            //pour tester l'extention du fichier
        $ext = strtolower(substr($img['name'], -3));
        $allow_ext = array("jpg","png","gif");
        if(in_array($ext, $allow_ext)){
            //déplacement du fichier
            move_uploaded_file($img['tmp_name'], '../upload/'.$new_name);
            //Img::creerMin( '../upload/'.$new_name, '../upload/min', $new_name,215,112);
            //"min.{$new_name}"
            //fin du déplacement de l'image
            //traitement de l'evenement -> insertion dans la bdd
            include '../inc/connectbdd.php';
        $req = $pdo->prepare("UPDATE evenement SET titre= ? , date= ?, description= ?, lieu= ?, event_img= ? WHERE id_event = ".$_POST['id']."");//prépare l'envois vers la BDD
        var_dump($_POST);
        $req->execute(array( $_POST['titre'], $_POST['date'], $_POST['description'], $_POST['lieu'], $new_name));/*envois vers BDD*/ 
    } 
}
?>


<p><?php echo 'je crois que ça a fait quelque chose!' ?></p>

<?php header('location: ../admin_event.php');/*redirection vers page des evenements*/

//******************************************************************************************************
//
//
//                                         traitement delete evenement
//
//
//******************************************************************************************************

}elseif($_POST['traitement']=='delete_event'){
    echo "ça c'est delete_event";
    var_dump($_POST); 


    include '../inc/connectbdd.php';
            $req = $pdo->prepare("DELETE FROM evenement WHERE id_event = ?");//prépare l'envois vers la BDD
            print_r($_POST);
            $req->execute(array($_POST['id']));/*envois vers BDD*/ 

            header('location: ../admin_event.php');/*redirection vers page des evenements*/     

        }elseif($_POST['traitement']=='add_partenaire'){
//******************************************************************************************************
//
//
//                                         traitement add partenaire
//
//
//******************************************************************************************************
         echo "ça c'est add_partenaire";
         if($_POST['traitement']=='add_partenaire'){
           echo'<h1>page de traitement</h1>';
           print_r($_POST);
           include '../inc/connectbdd.php';
           $req = $pdo->prepare("INSERT INTO partenaire set nom_partenaire= ? , competences = ?, secteur= ?, site= ?");
            //prépare l'envois vers la BDD
           $req->execute(array( $_POST['nom_partenaire'], $_POST['competences'], $_POST['secteur'], $_POST['site']));
        //envois vers BDD 
           ?> 
           <p><?php echo 'je crois que ça a fonctionné'; ?></p>
           <?php
           header('location: ../admin_partenaire.php');
        //redirection vers page des partenaires
       }

   }elseif($_POST['traitement']=='update_partenaire'){
     echo "ça c'est update_partenaire";
     var_dump($_POST);
     print_r($_POST);
     include '../inc/connectbdd.php';
            $req = $pdo->prepare("UPDATE partenaire SET nom_partenaire= ? , competences= ?, secteur= ?, site= ? WHERE id_partenaire = ".$_POST['id']."");//prépare l'envois vers la BDD
            var_dump($_POST);
            $req->execute(array( $_POST['nom_partenaire'], $_POST['competences'], $_POST['secteur'], $_POST['site']))/*envois vers BDD*/ ?> 
            <p><?php echo 'je crois que ça a fait quelque chose!' ?></p>

            <?php header('location: ../admin_partenaire.php');/*redirection vers page des partenaires*/


        }elseif($_POST['traitement']=='delete_partenaire'){
         echo "ça c'est delete_partenaire";
         var_dump($_POST); 


         include '../inc/connectbdd.php';
            $req = $pdo->prepare("DELETE FROM partenaire WHERE id_partenaire = ?");//prépare l'envois vers la BDD
            print_r($_POST);
            $req->execute(array($_POST['id']));/*envois vers BDD*/ 

            header('location: ../admin_partenaire.php');/*redirection vers page des evenements*/     

        }elseif($_POST['traitement']=='update_user'){
//******************************************************************************************************
//
//
//                                         traitement update user
//
//
//******************************************************************************************************

            echo "ça c'est update_user";
            var_dump($_POST);
            print_r($_POST);
            include '../inc/connectbdd.php';
            $req = $pdo->prepare("UPDATE users SET username= ? , email= ?, status= ? WHERE id = ".$_POST['id']."");//prépare l'envois vers la BDD
            var_dump($_POST);
            $req->execute(array( $_POST['username'], $_POST['email'], $_POST['status']))/*envois vers BDD*/ ?> 
            <p><?php echo 'je crois que ça a fait quelque chose!' ?></p>

            <?php header('location: ../admin_users.php');/*redirection vers page des evenements*/

//******************************************************************************************************
//
//
//                                         traitement delete user
//
//
//******************************************************************************************************

        }elseif($_POST['traitement']=='delete_user'){
            echo "ça c'est delete_user";
            var_dump($_POST); 

            include '../inc/connectbdd.php';
            $req = $pdo->prepare("DELETE FROM users WHERE id = ?");//prépare l'envois vers la BDD
            print_r($_POST);
            $req->execute(array($_POST['id']));/*envois vers BDD*/ 

            header('location: ../admin_users.php');/*redirection vers page des evenements*/
        }else{
         header('location: ../index.php');
     }
     ?>