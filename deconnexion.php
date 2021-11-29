<?php
 session_start();

  echo "deconnexion réussie ";
  session_destroy();   // détruit la session
  header("Location: connexion.php");
?>