<?php
//function pour se connecter a la base.. afaire:utiliser notrez fichier bdds.php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'password';
    $DATABASE_NAME = 'tp_Chant_G3';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// si un probleme, message d'erreur
    	exit('Probleme de connexion!');
    }
}

?>
<?php include('/concoursDeChant/session.php'); ?>


<?php
$pdo = pdo_connect_mysql();
$msg = '';
// verifier que l'utilisateur existe
if (isset($_GET['id'])) {
    // selectionner ce qui va etre supprimer
    $stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$utilisateur) {
        exit('Contact doesn\'t exist with that ID!');
    }
    // confirmation de la suppression
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // si on click sur yes ca supprime
            $stmt = $pdo->prepare('DELETE FROM contacts WHERE id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the contact!';
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