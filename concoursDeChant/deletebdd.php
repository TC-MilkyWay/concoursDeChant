<?php include('session.php');
include "config/bdds.php";

$msg = '';
// verifier que l'utilisateur existe
if (isset($_GET['id'])) {
    // selectionner ce qui va etre supprimer
    $stmt = $mysqlConnection->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // confirmation de la suppression
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // si on click sur yes ca supprime
            $stmt = $mysqlConnection->prepare('DELETE FROM utilisateur WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'Vous avez supprimer le compte utilisateur';
            header('Location: lecturebdd.php');
        } else {
            // si on click sur non , on se redirge vers la lecture de la base de données
            header('Location: lecturebdd.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
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

    <div class="content delete">
	<h2>Supprimer contact #<?=$contact['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p class="deletebdd">Etes vous sur de vouloir supprimer l'utilisateur #<?=$contact['id']?>?</p>
    <div class="yesno">
        <a href="deletebdd.php?id=<?=$contact['id']?>&confirm=yes">Yes</a>
        <a href="deletebdd.php?id=<?=$contact['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>
    <?php include_once("footer.php"); ?>

</body>

</html>   