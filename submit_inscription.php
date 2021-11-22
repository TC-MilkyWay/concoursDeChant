<?php

// on vérifie que nos champs sont déclarés et qu'il sont non null
if (!isset($_POST['nom']) || !isset($_POST['prenom']) || !isset($_POST['phone']) || !isset($_POST['email']) || !isset($_POST['pseudo']) || !isset($_POST['password']))
{
	echo('Il faut remplir tout les champs pour soumettre le formulaire.');
    return;
}	

$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$naissance = $_POST['naissance'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$pseudo = $_POST['pseudo'];
//hachage du password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
// code qui ne sert a rien: on vérifie que le mot de passe hacher correspond au mot de passe taper
$dassword = password_verify($_POST['password'],$password);
?>

<?php require "config/bdds.php";

try{
    //Ecriture de la requete
    $sqlquery = 'INSERT INTO Utilisateur(nom, prenom, dateDeNaissance, telephone, email, pseudo, pass, isAdmin) VALUES (:nom, :prenom, :dateDeNaissance, :phone, :email, :pseudo, :pass, :isAdmin)';
    
    //Preparation de la requete
    $insertUser = $mysqlConnection->prepare($sqlquery);
    
    // execution de la requete
    $insertUser ->execute([
        'nom' => $nom,
        'prenom' => $prenom,
        'dateDeNaissance' => $naissance,
        'phone' => $phone,
        'email' => $email,
        'pseudo' => $pseudo,
        'pass' => $password,
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
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php include_once('header.php'); ?>
        <div class="main">
            <h2>Inscription bien reçu !</h2>
                
            <h5>Rappel de vos informations</h5>
            <p><b>Nom</b> : <?php echo($nom); ?></p>
            <p><b>Prénom</b> : <?php echo($prenom); ?></p>
            <p><b>Téléphone</b> : <?php echo($phone); ?></p>
            <p><b>Email</b> : <?php echo($email); ?></p>
            <p><b>Pseudo</b> : <?php echo($pseudo); ?></p>
            <p><b>Password</b> : <?php echo($password); ?></p>
            <p><b>VRAI password</b> : <?php echo($dassword); ?></p>
        </div>
        <?php include_once('footer.php'); ?>
    </body>
</html>