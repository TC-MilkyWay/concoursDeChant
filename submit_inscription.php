<?php
//require "PHPMailer/PHPMailerAutoload.php";
require "config/bdds.php";
$dateMin = 2004-01-01;

try{
    // on vérifie que nos champs sont déclarés et qu'il sont non null
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['phone'], $_POST['email'], $_POST['pseudo'], $_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $naissance = $_POST['naissance'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        //hachage du password
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
        
        if(!empty($email)) {
            $recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email= ? ");
            $recherchemail ->execute(array($email));
            $userexist = $recherchemail->rowCount();
            if($userexist == 1) {
               throw new Exception ("erreur il email déjà utilisé.");
            }
        }

    }else {
        throw new Exception ('Il faut remplir tout les champs pour soumettre le formulaire.');
    
    }	
    

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
                <p><b>Date de Naissance</b> : <?php echo($naissance);?></p>
                <p><b>Téléphone</b> : <?php echo($phone); ?></p>
                <p><b>Email</b> : <?php echo($email); ?></p>
                <p><b>Pseudo</b> : <?php echo($pseudo); ?></p>
            </div>
            <?php include_once('footer.php'); ?>
        </body>
    
    </html>
<?php
}catch (Exception $e){
    echo $e->getMessage();     
    
    //header('Location: inscription.php');
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
        <center><button onclick="window.location.href = 'apimusic.php';"  class="" >Passer à votre candidature</button></center>
        <?php include_once('footer.php'); ?>
    </body>

</html>
