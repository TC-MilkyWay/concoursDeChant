<?php
// Souvent on identifie cet objet par la variable $conn ou $db
try{
$mysqlConnection = new PDO(
    'mysql:host=localhost;port=3306;dbname=CONCOURS;charset=utf8',
    'root',
    'password');
}
catch (Exeption $erreur)
{
    die('Erreur : '. $erreur->getMessage());
}
/*our vérifier que vous ètes bien dans la base de donnée:
    si vous ne l'avez pas fait importer a partir de phpmyadmin le fichier du dossier sql
    aller sur http://localhost:8080/config/bdd.php
    si vous voyer une page blanche c'est que vous êtes dans la base de données
    décommenter la partie ci dessous
    car On va maintenant tester si on arrive a récuperer une valeur de la table utilisateur*/



$sqlquery = 'SELECT * FROM utilisateur';
 $usersStatement = $mysqlConnection->prepare($sqlquery);
 $usersStatement->execute();
 $users = $usersStatement->fetchall();


 foreach ($users as $user){
 ?>
    <p><?php echo $user['NOM']; ?></p><?php
 }
?>
