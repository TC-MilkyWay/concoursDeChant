<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours de chant - Candidature</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('header.php'); ?>
    <div class="main">
        <form method="post" id="formulaire" action="submitcandidature.php">
            <h2>Candidature au concours de chant</h2>
            <div>
                <label for="chanson" class="form-label">Chanson :</label><br>
                <input type="text" class="form-input" name="chanson" placeholder="Entrez votre chanson ici"/>
            </div>
            <div>
                <label for="auteur" class="form-label">Auteur : </label><br>
                <input type="text" class="form-input" name="auteur" placeholder="Entrer le nom de l'auteur" />
            </div>
            <div>
                <label for="interprete" class="form-label">Interprete, Chanteur : </label><br>
                <input type="text" class="form-input" name="interprete" placeholder="Entrer l'interprete, chanteur" />
            </div>
            <div>
                <label for="duree" class="form-label">Durée de la bande son: </label><br>
                <input type="time" class="form-input" name="duree" placeholder="Entrer la durée de la bande son" /><br>    
            </div>
            <div>
                <center><button type="submit" class="">Envoyer</button></center>
            </div>
        </form>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>