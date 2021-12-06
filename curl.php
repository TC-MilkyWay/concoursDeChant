<?php

$artiste = $_POST['artiste'];
$titre = $_POST['titre'];

// echo $strartist;
// echo $strtitle;

// remplacer les espaces par des %20 pour que la requête soit valide.
$strartist = str_replace (" ", "%20", $artiste);
$strtitre = str_replace (" ", "%20", $titre);

$url = "http://217.182.174.155:5000/ws/2/recording?query=recording:$strtitre%20and%20artist:$strartist&limit=5&fmt=json";
// Initialisez une session CURL.
$ch = curl_init();
//Saisir l'URL et la transmettre à la variable.
curl_setopt($ch, CURLOPT_URL, $url);
// Récupérer le contenu de la page
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
     "Cache-Control: no-cache",
     "content-type:application/xml;charset=utf-8"
));
//Exécutez la requête 
$result = curl_exec($ch);

$array = json_decode($result);
$arti = "artist-credit";

// Début Tableau

echo "<table class='tableapi'>";

echo "<thead><th width=5% height=100px>Choisir</th><th width=40%>Titre</th><th width=40%>Artiste</th></thead><tbody>";

for ($i = 0; $i <= 4; $i++){
echo "<tr><td height=100px><center><input type='button' value='lala' onclick='writeValid($i)'</center></td>";
echo "<td id='titre$i'>".$array->recordings[$i]->title."</td>";
echo "<td id='artiste$i'>".$array->recordings[$i]->$arti[0]->name."</td></tr>";
}
echo "</tbody></table>";

// Fin Tableau

?>

