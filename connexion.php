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
    <form class="connexion">  
      <h1>Se connecter</h1>    
      <div class="inputs">
        <input type="email" placeholder="Pseudo" />
        <input type="password" placeholder="Mot de passe">
        <center><button type="submit">Se connecter</button></center>
      </div>
    </form>
  </div>
  <?php include_once('footer.php'); ?>
</body>
</html>
