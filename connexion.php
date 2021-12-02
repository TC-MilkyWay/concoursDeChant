
<?php include('cookie.php'); ?>
<?php include('session.php'); ?>

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
  
  <div class="main">
    <form method="post" action="" >  
      <h1>Se connecter</h1>    
      <div class="inputs">
      <?php include_once('header.php'); ?>
        <input type="email" name="mail" placeholder="email">
        
        <input type="password" name="mdp" placeholder="pass">
        <center><button type="submit">Se connecter</button></center>
      </div>
    </form>
  </div>
  <?php include_once('footer.php'); ?>
</body>
</html>