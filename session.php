<?php session_start();

require  "config/bdds.php";
$pseudo = '';

if (isset($_POST['mail'], $_POST['mdp'])) {
  
  $recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email = ?");
  $recherchemail->execute([$_POST['mail']]);
  $utilisateur = $recherchemail->fetch();
  
  if ($utilisateur && password_verify($_POST['mdp'], $utilisateur['pass']))
  {
    $pseudo = $utilisateur['pseudo'];
    $_SESSION['pseudo'] = $pseudo;
    
    
  }else{
    echo "mot de passe incorrect";
  }
  if ($utilisateur['isAdmin'] == false) {
 
    header('Location: candidature.php');
 
  } elseif ($utilisateur['isAdmin'] == true){
   
    header('Location: lecturebdd.php');
  }
  
}
 
 
 
 
 
 
 
 
 
 
 
 
 ?>
 