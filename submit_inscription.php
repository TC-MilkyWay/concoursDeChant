<link rel="stylesheet" href="style.css">
<?php
//require "PHPMailer/PHPMailerAutoload.php";
require "config/bdds.php";
$dateMin = 2004-01-01;
$majeur = "";

try{
    // on vérifie que nos champs sont déclarés et qu'il sont non null
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['naissance'], $_POST['phone'], $_POST['email'], $_POST['password'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $naissance = $_POST['naissance'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $pseudo = $_POST['pseudo'];
        //hachage du password
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
        
        //vérifier que le nom ne contient que des lettres de a-z A-Z et chffres de 0-9
        if (preg_match("/\W/", $nom )) {
            throw new Exception ("Les signes particuliers ne sont pas accéptées.");
        }
        
        // vérifier que la date de naissance soit entre 1900 et 2099
        if (preg_match("/^((19|20)[0-9]{2})-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $naissance)) {
            // vérifier que le participant soit né avant le 1 janvier 2004 
            if ($naissance > $dateMin) {
                throw new Exception("il faut être majeur pour participer.");
            }
        } else {
            throw new Exception ("cette date de Naisance $naissance n'est pas valable.");
        }

        //vérifier qu'il ny ait pas de doublons d'emails
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
    $sqlquery = 'INSERT INTO utilisateur(nom, prenom, dateDeNaissance, telephone, email, pseudo, pass, isAdmin) VALUES (:nom, :prenom, :dateDeNaissance, :phone, :email, :pseudo, :pass, :isAdmin)';
    
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
        </head>
        <body>
            <?php include_once('header.php'); ?>
            <div class="main">
                <div class="grille">
                    <div class="cardinscription adiv">
                        <h2>Inscription bien reçu !</h2>
                        <h5>Rappel de vos informations</h5>
                        <p><b>Nom</b> : <?php echo($nom); ?></p>
                        <p><b>Prénom</b> : <?php echo($prenom); ?></p>
                        <p><b>Date de Naissance</b> : <?php echo($naissance);?></p>
                        <p><b>Téléphone</b> : <?php echo($phone); ?></p>
                        <p><b>Email</b> : <?php echo($email); ?></p>
                        <p><b>Pseudo</b> : <?php echo($pseudo); ?></p>
                    </div>
                </div>
            </div>
            <?php include_once('footer.php'); ?>
        </body>
    
    </html>
<?php
}catch (Exception $e){
    include_once('header.php');
    echo "<div class='main'><h1>";
    echo $e->getMessage();  
    echo "</h1></div>";
    //sleep(10);
    //header('Location: inscription.php');
    include_once('footer.php');
}
?>
