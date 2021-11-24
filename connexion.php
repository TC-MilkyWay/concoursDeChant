<?php
session_start();

require  "config/bdds.php";

if(isset($_POST['formconnexion'])) {
  $email = $_POST["login"];
  $pass = $_POST["mdp"];
  if(!empty($email)) {
    $recherchemail = $mysqlConnection->prepare("SELECT * FROM utilisateur WHERE email= ? ");
    $recherchemail ->execute(array($email));
    $userexist = $recherchemail->rowCount();
    $result = $recherchemail->fetchall();
    echo $result;
    if($userexist == 1) {
     echo "concordance";
      // $verif = password_verify($pass,$recherchemail );
      // echo "le resultat de verif_password :".$verif;
      // if ($verif){ 
      // echo "GG";
      // } else {
      //   echo "Try again";
      // }
    }else{
      echo " non concordance";
    }
  }
} else {
  $erreur = "Tous les champs doivent être complétés !";
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
  <!--include_once('header.php'); -->
  <div class="main">
    <form method="post" action="" >  
      <h1>Se connecter</h1>    
      <div class="inputs">
        <label for="email"></label>
        <input type="email" name="login" placeholder="email">
        <label for="password"></label>
        <input type="password" name="mdp" placeholder="pass">
        <input type="submit" name="formconnexion" value="Se connecter !" />
      </div>
    </form>
  </div>
  <?php include_once('footer.php'); ?>
</body>
</html>


