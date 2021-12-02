<?php session_start();
var_dump($_SESSION);
require  "config/bdds.php";
<<<<<<< HEAD
$recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email = ?");
$recherchemail->execute([$_POST['login']]);
$utilisateur = $recherchemail->fetch();
//$pseudo = $_SESSION['pseudo'];
$_SESSION['pseudo'] = $_POST['login'];

=======
$pseudo = '';
>>>>>>> 937b9af56f3315b90d8131d41b7de17ae3055772

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
 