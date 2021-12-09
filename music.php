<?php $chansonFinale= $_POST['chansonFinale'];
$auteurFinal= $_POST['auteurFinal'];


include './config/bdds.php';
include 'cookie.php';


$query = "SELECT id FROM utilisateur WHERE email = ?";
$stmt = $mysqlConnection->prepare($query);
$stmt->execute(array($_COOKIE['mail']));
$idUtilisateur = $stmt->fetch(PDO::FETCH_ASSOC);




$songquery = "UPDATE candidature SET chanson = '$chansonFinale', auteur = '$auteurFinal' WHERE email = '$echomail' ";

 $insertSong = $mysqlConnection->prepare($songquery);
 $insertSong->execute([
     'chanson' => $chansonFinale,
     'auteur' => $auteurFinal    
 ]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CANDIDATURE Suite</title>
    <link rel="stylesheet" href="style.css">
    <script src="./assets/js/app.js" defer></script>
</head>

<body>
    <?php include 'header.php'; ?>
    <h2>
        <?php
        echo  '<h2>Résumé !</h2>';
        echo "<center><p>tu as choisi :".$chansonFinale." de ".$auteurFinal."</p><center>";
        ?>
    </h2>
    <h2 class="music">Maintenant insérer votre bande son </h2>

        <form method="post" id="formulaire" action="submitsong.php"  enctype="multipart/form-data"> 
            
            
            <h2>Bande son</h2>
            <div>
            <label for="file" class="form-label">Sélectionner le fichier audio à envoyer( mp3, wav) mb max :</label>
            <input type="file" class="form-input" id="fileAudio"  name="fileAudio" id="fileAudio" accept=".mp3, .wav" placeholder="Entrer votre fichier audio mp3,wav 5mb max" /></br>
            </div>
            <div class="preview">
            <p>Réecoute ton morceau</p>
            </div> 
            <div>
            <audio controls preload="auto" src="" id="audioPreview" name="audioPreview"> reecouter votre morceau  pour etre sur. </audio>
            </div>
            <div>
                <center><button type="submit" class="">Envoyer</button></center>
            </div>
        </form>

        <script src="app.js"></script>
    <?php include 'footer.php'; ?>
</body>

</html>