<?php include('cookie.php'); ?>
<?php
           // Testons si le fichier a bien été envoyé et s'il n'y a pas d'erreur
           if (isset($_FILES['fileAudio']) && $_FILES['fileAudio']['error'] == 0)
           {
               
        // Testons si le fichier n'est pas trop gros
        if ($_FILES['fileAudio']['size'] <= 10000000)
        {
                // Testons si l'extension est autorisée
                $fileInfo = pathinfo($_FILES['fileAudio']['name']);
                $extension = $fileInfo['extension'];
                $allowedExtensions = ['mp3', 'wav'];
                if (in_array($extension, $allowedExtensions))
                {

            move_uploaded_file($_FILES['fileAudio']['tmp_name'], '/home/yohann/concoursDeChant/mediautilisateur/' . basename($_FILES['fileAudio']['name']));
                        /*echo "L'envoi a bien été effectué !";*/
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
            
        
            <h5 class="submitsong">Candidature bien reçu!!</br>Vous n'avez plus qu'à attendre la validation de l'équipe!!</h5>
            

            
           
        </div>
        <?php include_once('footer.php'); ?>
    </body>

</html>
