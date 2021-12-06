<?php include './config/bdds.php';
include 'header.php'; 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANDIDATURE</title>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
    <div class="grille">
      <div class="apidiv1 adiv">
        <form id="myForm" method="post">
          <h2>1.Recherchez :</h2>
          <input type="text" placeholder="titre" name="titre" id="titre">
          <input type="text" placeholder="artiste" name="artiste" id="artiste">
          <button type="button" onclick="submitForm();">Recherche</button>
        </form>
      </div>
      <div class="apidiv2 adiv">
        <h2>2.Choisissez dans la liste :</h2>
        <div id="texte"></div>
      </div>
      <div class="apidiv3 adiv">
        <form for="valider" method="post" action="music.php">
          <h2>3.Confirmez :</h2>
          <input type="text" name="musiqueFinale" readonly id="valider"></p>
          <button type="submit" name="valider" >Je valide</button>
        </form>
      </div>
    </div>
    <?php include 'footer.php'; ?>
    <script src="./assets/js/app1.js"></script>
  </body>
</html>
