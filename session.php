<?php session_start();

require  "config/bdds.php";

$recherchemail = $mysqlConnection->prepare("SELECT * FROM Utilisateur WHERE email = ?");
$recherchemail->execute([$_POST['login']]);
$utilisateur = $recherchemail->fetch();
$pseudo = $_SESSION['pseudo'];


if ($utilisateur && password_verify($_POST['mdp'], $utilisateur['pass']))
{
  $_SESSION['pseudo'] = $utilisateur['pseudo'];
  
}else{
  echo "invalid";
}
 ?>
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !
 Bonjour <?php echo $pseudo; ?> !