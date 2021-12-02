<?php session_start();

require  "config/bdds.php";

$recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email = ?");
$recherchemail->execute([$_POST['login']]);
$utilisateur = $recherchemail->fetch();
$pseudo = $_SESSION['pseudo'];


if ($utilisateur && password_verify($_POST['mdp'], $utilisateur['pass']))
{
  $_SESSION['pseudo'] = $utilisateur['pseudo'];
  header('Location: candidature.php');
  
}else{
  echo "invalid";
}
 ?>
 