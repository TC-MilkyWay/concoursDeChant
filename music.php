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
    
    <div>
        <form action="">
            <fieldset>
                <legend>Uploader votre music....</legend>
                <input type="file" name="fileAudio" id="fileAudio" />
            </fieldset>
        </form>
    </div>

    <div>
        <audio controls id="audioPreview" class="audioPreview">
            <source src="" />
        </audio>
    </div>
    <?php include 'footer.php'; ?>
</body>

</html>