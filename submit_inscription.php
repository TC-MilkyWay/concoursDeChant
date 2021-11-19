<?php

// on vérifie que nos champs sont déclarés et qu'il sont non null
if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['phone']) || !isset($_POST['email']) || !isset($_POST['pseudo']) || !isset($_POST['password']))
{
	echo('Il faut remplir tout les champs pour soumettre le formulaire.');
    return;
}	

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pseudo = $_POST['pseudo'];
$password = $_POST['password'];

?>

<?php require "config/bdds.php";

//Ecriture de la requete
$sqlquery = 'INSERT INTO utilisateur(NOM, PRENOM, TELEPHONE, EMAIL, PSEUDO, PASWORD, isAdmin) VALUES (:nom, :prenom, :phone, :email, :pseudo, :pasword, :isAdmin)';

//Preparation de la requete
$insertUser = $mysqlConnection->prepare($sqlquery);
try{

    // execution de la requete
    $insertUser ->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'phone' => $phone,
        'email' => $email,
        'pseudo' => $pseudo,
        'pasword' => $password,
        'isAdmin' => 0,
    ]);
}catch (Exception $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
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
            <h1>Inscription bien reçu !</h1>
            
            <div class="card">
                
                <div class="card-body">
                    <h5 class="card-title">Rappel de vos informations</h5>
                    <p class="card-text"><b>Nom</b> : <?php echo($nom); ?></p>
                    <p class="card-text"><b>Prénom</b> : <?php echo($prenom); ?></p>
                    <p class="card-text"><b>Téléphone</b> : <?php echo($phone); ?></p>
                    <p class="card-text"><b>Email</b> : <?php echo($email); ?></p>
                    <p class="card-text"><b>Pseudo</b> : <?php echo($pseudo); ?></p>
                    <p class="card-text"><b>Password</b> : <?php echo($password); ?></p>
                </div>
            </div>
        </div>
    </body>
</html>