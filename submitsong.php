<?php
           // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
           if (isset($_FILES['inputFichier']) && $_FILES['inputFichier']['error'] == 0)
           {
               
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['inputFichier']['size'] <= 5000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['inputFichier']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['mp3', 'wav'];
                if (in_array($extension, $allowedExtensions))
                {

            move_uploaded_file($_FILES['inputFichier']['tmp_name'], '/home/yohann/concoursDeChant/mediautilisateur/' . basename($_FILES['inputFichier']['name']));
                        echo "L'envoi a bien été effectué !";
                }}}

                 
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
            <h2>musique bien reçu !</h2>
                
            <h5>Rappel de vos informations</h5>

            
           
        </div>
        <?php include_once('footer.php'); ?>
    </body>

</html>
