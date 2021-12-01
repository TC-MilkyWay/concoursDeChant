<link rel="stylesheet" href="style.css">

<?php

$artisttest = str_replace(' ','%20',$_GET['queryArtists']);
$musictest = str_replace(' ','%20',$_GET['querySongs']);
//echo $artisttest;


// Récupérer le contenu de la page Web à partir de l'url.
//$url = "http://217.182.174.155:5000/ws/2/artist/?query=artist:${replaced}&limit=25&offset=0&fmt=json"; 
$url = "217.182.174.155:5000/ws/2/recording/?query=${musictest}%20and%20artist:${artisttest}&limit=5&fmt=json";

// Initialisez une session CURL.
$ch = curl_init();

//echo $ch;

// Récupérer le contenu de la page
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

//Saisir l'URL et la transmettre à la variable.
curl_setopt($ch, CURLOPT_URL, $url); 

//Exécutez la requête 
$result = curl_exec($ch); 

//Afficher le résultat
//echo $result;

curl_close($ch);

$array=json_decode($result,TRUE);
$occurence=$array["count"];
//echo $occurence;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours de chant</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php include_once('header.php'); ?>
<div class="grille">
  <div class="apidiv1 adiv">
    <form method="get" id="formulaire" action="" enctype="multipart/form-data">
      <div>
        <label for="artists" class="form-label">Artiste: </label><br>
        <input list="artists" id="queryArtists" name="queryArtists" class="form-input"/>
      </div>
      <div>
        <label for="song" class="form-label">Musique : </label><br>
        <input list="song" id="querySongs" name="querySongs" class="form-input"/>
      </div>
      <center><button type="submit" class="">Envoyer</button></center>
    </form>
  </div>
  <div class="apidiv2 adiv">
    <h2>Validation</h2>
  </div>
  <div class="apidiv3 adiv">
    <h2>Resultat</h2>
    <label for="artists">Choisis le chanteur:</label><br>
    <?php for ($i=0; $i < 5; $i++) { 
      echo "<p>".$array["recordings"][$i]["artist-credit"][0]["name"] .", ";
      echo $array["recordings"][$i]["title"]."</p>";
      echo "<hr>";
    }?>
  </div>
</div>
<?php include_once('footer.php'); ?>
  </body>
  </html>