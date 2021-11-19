<?php

// on vérifie que nos champs sont déclarés et qu'il sont non null
if (!isset($_POST['chanson']) || !isset($_POST['auteur']) || !isset($_POST['interprete']) || !isset($_POST['duree']))
{
	echo('Il faut remplir tout les champs pour soumettre le formulaire.');
    return;
}	




            $serveur = "localhost";
            $port = "3306";
            $dbname = "CONCOURS";
            $user = "root";
            $pass = "password";


            $chanson = $_POST['chanson'];
            $auteur = $_POST['auteur'];
            $interprete = $_POST['interprete'];
            $duree= $_POST['duree'];
           

    
           
            
            try{
                //On se connecte à la BDD
                $dbco = new PDO("mysql:host=$serveur;dbname=$dbname",$user,$pass);
                $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
                //On insère les données reçues si les champs sont remplis
                if(!empty($chanson)  && !empty($auteur) && !empty($interprete)){
                    $sth = $dbco->prepare("
                        INSERT INTO candidature(CHANSON, AUTEUR, INTERPRETE, DUREE)
                        VALUES(:chanson, :auteur, :interprete, :duree)");
                    $sth->bindParam(':chanson',$chanson);
                    $sth->bindParam(':auteur',$auteur);
                    $sth->bindParam(':interprete',$interprete);
                    $sth->bindParam(':duree',$duree);
                    $sth->execute();
                    
                }
                
            }catch (Exception $e){
                    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
                }
            
 
    
    
?> 