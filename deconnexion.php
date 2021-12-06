<?php
 session_start();

 setcookie ("mail", "", time() - 3600);
 //unsetcookie('mail');
 
  // détruit la session
  header("Location: index.php");
?>