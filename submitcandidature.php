<<<<<<< HEAD
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
$files= $_POST['inputFichier'];


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

/*if ((isset($_FILES['audiofile']['temp_name'])&&($_FILES['audiofile']['error'] == UPLOAD_ERR_OK))) {     
    $chemin_destination = '/concoursDeChant/mediautilisateur';     
    move_uploaded_file($_FILES['audiofile']['tmp_name'], $chemin_destination.$_FILES['audiofile']['name']);     
    }     

 */  
?> 


<?php

     
    // Testons si le formulaire a bien été envoyé et s'il n'y a pas d'erreur
    if (isset($_FILES['inputFichier']) AND $_FILES['inputFichier']['error'] == 0 AND isset($_POST['categorieFichier']) AND isset($_POST['descriptionFichier']))
    {
        $categorieFichier = $_POST['categorieFichier'];
        $descriptionFichier = $_POST['descriptionFichier'];
 
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['inputFichier']['size'] <= 1000000)
        {
            // Testons si l'extension est autorisée
            $infosfichier = pathinfo($_FILES['inputFichier']['name']);
            $extension_upload = $infosfichier['extension'];
            $extensions_autorisees = array('mp3', 'wav');
 
            // Si l'extension du fichier envoyé correspond à une de celles du tableau des extensions autorisées
            if (in_array($extension_upload, $extensions_autorisees))
            {  
                if ($categorieFichier == 'musique')
                {
                    // On peut valider le fichier et le stocker définitivement
                    move_uploaded_file($_FILES['inputFichier']['tmp_name'], '/home/yohann/concoursDeChant/mediautilisateur '. basename($_FILES['inputFichier']['name']));
 
                    $cheminFichier = '/home/yohann/concoursDeChant/mediautilisateur '.$_FILES['inputFichier']['name'];
                }
 
                
                ?>
 
                    

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Concours de chant - Demande d'inscription reçue</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div class="main">
            <h2>Inscription bien reçu !</h2>
                
            <h5>Rappel de vos informations</h5>
            <p><b>Chanson</b> : <?php echo($chanson); ?></p>
            <p><b>Auteur</b> : <?php echo($auteur); ?></p>
            <p><b>interprete</b> : <?php echo($interprete); ?></p>
            <p><b>Durée</b> : <?php echo($duree); ?></p>
            
        </div>
        <?php include_once('footer.php'); ?>
    </body>
</html>
