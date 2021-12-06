<?php session_start();
include "config/bdds.php";


if (isset($_POST['mail'], $_POST['mdp'])) { //isset pour verifier que les champs soit validés
 
  $mail = $_POST['mail']; //creation des variables pour les conserver sur les autres pages
  $mdp = $_POST['mdp'];

  //demande à mysql si il y a une correspondance 
  $recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email = ?");
  $recherchemail->execute([$_POST['mail']]); 
  $utilisateur = $recherchemail->fetch(); 
  
  //verification si le mot de passe corresponds au mdp de la BDD
  if ($utilisateur && password_verify($_POST['mdp'], $utilisateur['pass']))
  {
    //creation de la variable pseudo 
    $pseudo = $utilisateur['pseudo'];
    $_SESSION['pseudo'] = $pseudo;
    setcookie('mail', $mail, time() + 365*24*3600, null, null, false, true);
    
  }else{
    echo "mot de passe incorrect";
    $pseudo = '';
  }
  if ($utilisateur['isAdmin'] == false) {
 
    header('Location: api.php');
 
  } elseif ($utilisateur['isAdmin'] == true){
   
    header('Location: lecturebdd.php');
  }
  
}
 
 
 
 
 
 
 
 
 
 
 
 
 ?>
 