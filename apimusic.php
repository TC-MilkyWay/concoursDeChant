<?php

/*<?php  
  phpinfo(); 
?>*/

  
// Récupérer le contenu de la page Web à partir de l'url.
$url = "http://217.182.174.155:5000/ws/2/artist/?query=artist:ultra%20vomit&limit=25&offset=0&fmt=json"; 
  
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
echo "<br>";
for ($i=0; $i < 25; $i++) { 

 
  echo $array["artists"][$i]["name"];
  echo "<br>";
}
//echo $array["count"];
//echo $array["artists"][0]["name"];







?>





