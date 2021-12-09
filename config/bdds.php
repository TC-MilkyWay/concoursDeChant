<?php
// Souvent on identifie cet objet par la variable $conn ou $db
try{
$mysqlConnection = new PDO(
    'mysql:host=localhost;port=3306;dbname=tp_Chant_G3;charset=utf8',
    'root',
    'root', 
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    
   // echo "connection à la base de données établie."; 
}
catch (Exeption $erreur)
{
    die('Erreur de connection a la base de données. '. $erreur->getMessage());
}
// our vérifier que vous ètes bien dans la base de donnée:
// si vous ne l'avez pas fait importer a partir de phpmyadmin le fichier du dossier sql
// aller sur http://localhost/concoursDeChant/config/bdd.php
// si vous voyer une page blanche c'est que vous êtes dans la base de données
