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
<?php 
$pdo = pdo_connect_mysql();
$msg = '';
// verifier si l'utilisateur existe, 
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // comme le fichier cree mais on modifie
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nom= isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $dateDeNaissance = isset($_POST['dateDeNaissance']) ? $_POST['dateDeNaissance'] : '';
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
        // modifier les champs
        $stmt = $pdo->prepare('UPDATE Utilisateur SET id = ?, nom = ?, prenom = ?, dateDeNaissance = ?, telephone = ?, email = ?, pseudo = ?, WHERE id = ?');
        $stmt->execute([$id, $nom, $prenom, $dateDeNaissance, $telephone, $email, $pseudo, $_GET['id']]);
        $msg = 'modifier avec succes!!!';
    }
    // recuperer utilisateur dans la table utilisateur
    $stmt = $pdo->prepare('SELECT * FROM Utilisateur WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $Utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$Utilisateur) {
        exit('ce contact nexiste pas');
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
    <div class="main">
        <article class="contenu">
         

<div class="update">
	<h2 class="message">Modifier les informations de l'utilisateur séléctionné. #<?=$Utilisateur['id']?></h2>
    <form action="updatebdd.php?id=<?=$Utilisateur['id']?>" method="post">
        <label for="id" class="form-label">ID</label>
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-input" name="id" placeholder="1" value="<?=$Utilisateur['id']?>" id="id">
        <input type="text" class="form-input" name="nom" placeholder="yoyo grigi" value="<?=$Utilisateur['nom']?>" id="nom">
        <label for="email" class="form-label">Email</label>
        <label for="telephone" class="form-label">Telephone</label>
        <input type="text" class="form-input" name="email" placeholder="vous@example.fr" value="<?=$Utilisateur['email']?>" id="email">
        <input type="text" class="form-input" name="telephone" placeholder="0675281852" value="<?=$Utilisateur['telephone']?>" id="telephone">
        <label for="dateDeNaissance" class="form-label">Date de naissance</label>
        <input type="text" class="form-input" name="dateDeNaissance" placeholder="date de naissance" value="<?=$Utilisateur['dateDeNaissance']?>" id="dateDeNaissance">
        <label for="pseudo"  class="form-label">Pseudo</label>
        <input type="text" class="form-input" name="nom" placeholder="pseudo" value="<?=$Utilisateur['pseudo']?>" id="pseudo">
        <input type="submit" class="form-input" value="Mettre à jour">
    </form>
    <?php if ($msg): ?>
    <h1 class="message"><?=$msg?></h1>
    <?php endif; ?>
</div>

<?php include_once('footer.php'); ?>

</body>

</html>