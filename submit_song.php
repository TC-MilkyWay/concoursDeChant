<?php include './config/bdds.php';

$songquery = "INSERT INTO candidature (chanson, auteur, id_user) VALUE (:chanson, :auteur, :id_user) ";

$insertSong = $mysqlConnection->prepare($songquery);
























?>