<?php

// on vérifie que nos champs sont déclarés et qu'il sont non null
if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['phone']) || !isset($_POST['email']) || !isset($_POST['pseudo']) || !isset($_POST['password']))
{
	echo('Il faut remplir tout les champs pour soumettre le formulaire.');
    return;
}	

$chanson = $_POST['chanson'];
$auteur = $_POST['auteur'];
$interprete = $_POST['interprete'];
$duree = $_POST['duree'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Concours de chant - Demande d'inscription reçue</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
    
        <?php include_once('header.php'); ?>
            <h1>Inscription  au concours bien reçu !</h1>
            
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Rappel de vos informations</h5>
                    <p class="card-text"><b>Chanson</b> : <?php echo($chanson); ?></p>
                    <p class="card-text"><b>Auteur</b> : <?php echo($auteur); ?></p>
                    <p class="card-text"><b>Interprete</b> : <?php echo($interprete); ?></p>
                    <p class="card-text"><b>Durée</b> : <?php echo($duree); ?></p>
                   
                </div>
            </div>
        </div>
    </body>
</html>