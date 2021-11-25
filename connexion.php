<?php session_start();


require  "config/bdds.php";
$recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email = ?");
$recherchemail->execute([$_POST['login']]);
$utilisateur = $recherchemail->fetch();
$_SESSION['pseudo'] = $utilisateur['pseudo'];
$pseudo = $_SESSION['pseudo'];

if ($utilisateur && password_verify($_POST['mdp'], $utilisateur['pass']))
{
  echo "Bonjour et Bienvenue $pseudo";
  
}else{
  echo "invalid";
}
 ?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  </head>
<body>
  <?php include_once('header.php'); ?>
  <div class="main">
    <form method="post" action="" >  
      <h1>Se connecter</h1>    
      <div class="inputs">
        
        <input type="email" name="login" placeholder="email">
        
        <input type="password" name="mdp" placeholder="pass">
        <input type="submit" name="formconnexion" value="Se connecter !" />
      </div>
    </form>
  </div>
  <?php include_once('footer.php'); ?>
</body>
</html>





<?php
//   if(!empty($email)) {
//     $recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email= ? ");
//     $recherchemail ->execute(array($email));
//     $userexist = $recherchemail->rowCount();
//     if($userexist == 1) {
//      echo "concordance";
//     }else{
//       echo " non concordance";
//     }
//   }

?>

