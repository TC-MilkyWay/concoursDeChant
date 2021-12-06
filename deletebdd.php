<?php include('cookie.php'); 
include("config/bdds.php");

$msg = '';
// verifier que l'utilisateur existe
if (isset($_GET['id'])) {
    // selectionner ce qui va etre supprimer
    $stmt = $mysqlConnection->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($utilisateur);
    if (!$utilisateur) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // confirmation de la suppression
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // si on click sur yes ca supprime
            $stmt = $mysqlConnection->prepare('DELETE FROM utilisateur WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the contact!';
            echo '<button><a href="lecturebdd.php">Retour</a></button>';
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
<div>
	<h2>Supprime Utilisateur #<?=$utilisateur['id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$utilisateur['id']?>?</p>
    <div class="yesno">
        <a href="deletebdd.php?id=<?=$utilisateur['id']?>&confirm=yes">Yes</a>
        <a href="deletebdd.php?id=<?=$utilisateur['id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div> 