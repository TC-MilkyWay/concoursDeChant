
<?php

// on vérifie que nos champs sont déclarés et qu'il sont non null
if (!isset($_POST['chanson']) || !isset($_POST['auteur']) || !isset($_POST['interprete']) || !isset($_POST['duree']))
{
	echo('Il faut remplir tout les champs pour soumettre le formulaire.');
    return;
}	

$chanson = $_POST['chanson'];
$auteur = $_POST['auteur'];
$interprete = $_POST['interprete'];
$duree= $_POST['duree'];



require "config/bdds.php"; 
         

try{
    //On insère les données reçues si les champs sont remplis
    if(!empty($chanson)  && !empty($auteur) && !empty($interprete)){
        $sth = $mysqlConnection->prepare("INSERT INTO Candidature(chanson, auteur, interprete, duree) VALUES(:chanson, :auteur, :interprete, :duree)");
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

<!DOCTYPE html>
<html lang="fr">

    <head>
        <meta charset="UTF-8">
        <title>Concours de chant</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div class="main">
            <h2>valider votre choix dans la liste ci dessous !</h2>
                
            <h5>Rappel de vos informations</h5>
            <p><b>Chanson</b> : <?php echo($chanson); ?></p>
            <p><b>Auteur</b> : <?php echo($auteur); ?></p>
            <p><b>interprete</b> : <?php echo($interprete); ?></p>
            <p><b>Durée</b> : <?php echo($duree); ?></p>
            
        </div>


        

        

 
         




			<!-- // $destinataire = 'yohanngille@gmail.com';
			// $envoyeur	='yohanngille@yahoo.co.uk';
     		// 	$sujet = 'Email de confirmation';
     		// 	$message = "Bonjour !\r\nCeci est un email de confirmation.\r\n";
	     	// 	$headers = 'From: '.$envoyeur . "\r\n" .
     		// 		'Reply-To: '.$envoyeur. "\r\n" .
     		// 		'X-Mailer: PHP/' . phpversion();
	     	// 	$envoye = mail($destinataire, $sujet, $message, $headers);
			// if ($envoye)
     		// 		echo "<br />Email envoyé.";
			// else
			// 	echo "<br />Email refusé."; 
  -->


        <h2>Maintenant insérer votre bande son </h2>

        <form method="post" id="formulaire" action="submitsong.php"  enctype="multipart/form-data"> 
            
            
            <h2>Bande son</h2>
            <div>
            <label for="file" class="form-label">Sélectionner le fichier audio à envoyer( mp3, wav) 5mb max :</label>
            <input type="file" class="form-input" id="inputFichier"  name="inputFichier" accept=".mp3, .wav" placeholder="Entrer votre fichier audio mp3,wav 5mb max" /></br>
            </div>
            <div class="preview">
            <p>Aucun fichier sélectionné pour le moment</p>
            </div> 
            <div>
            <audio controls preload="auto" src="./kassos.mp3"> reecouter votre morceau  pour etre sur. </audio>
            </div>
            <div>
                <center><button type="submit" class="">Envoyer</button></center>
            </div>
        </form>


        


        <?php include_once('footer.php'); ?>
    </body>
</html>
