<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours de chant</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.3/css/foundation.min.css" />
</head>

<body>

<?php include_once('header.php'); ?>

<div class="main">
    <h2>Inscription au Site</h2>
    <form method="post" id="formulaire" action="submit_inscription.php">
        <div>
            <label for="nom" class="form-label">Nom :</label>
            <input type="text" class="form-input" name="name" placeholder="Entrez votre Nom"/>
        </div>
        <div>
            <label for="prenom" class="form-label">Prénom : </label>
            <input type="text" prénom="prénom" placeholder="Entrer votre Prénom" />
        </div>
        <div>
            <label for="phone" class="form-label">Téléphone : </label>
            <input type="tel" id="phone" name="phone" placeholder="06-70-28-18-50" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required>
        </div>
        <div>
            <label for="email" class="form-label">Email : </label>
            <input type="email" name="email" placeholder="Entrer votre Email" />
            <i>Nous ne revendrons pas votre email.</i>
        </div>
        <div>
            <label for="pseudo" class="form-label">Pseudo : </label>
            <input type="text" name="pseudo" placeholder="Entrer un pseudo" />
        </div>
        <div>
            <label for="password" class="form-label">Password : </label>
            <input type="text" name="password" placeholder="Mot de passe" />
            
        </div>
        <button type="submit" class="">Envoyer</button>
    </form>
</div>

<?php include_once('footer.php'); ?>

</body>

</html>