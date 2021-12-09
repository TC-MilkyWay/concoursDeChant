<?php
//conexion a la base de donnée
include  "config/bdds.php";


$msg = '';
// verifier si l'utilisateur existe, 
if (isset($_GET['id'])) {
    if (!empty($_POST)) {
        // comme le fichier cree mais on modifie
        $id = isset($_POST['id']) ? $_POST['id'] : NULL;
        $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
        $dateDeNaissance = isset($_POST['dateDeNaissance']) ? $_POST['dateDeNaissance'] : '';
        $telephone = isset($_POST['telephone']) ? $_POST['telephone'] : '';
        $email = isset($_POST['email']) ? $_POST['email'] : '';
        $pseudo = isset($_POST['pseudo']) ? $_POST['pseudo'] : '';
        $pass = isset($_POST['pass']) ? $_POST['pass'] : '';
        $isAdmin = isset($_POST['isAdmin']) ? $_POST['isAdmin'] : '';
        $cree_le = isset($_POST['cree_le']) ? $_POST['cree_le'] : '';

        // modifier les champs
        $stmt = $mysqlConnection->prepare('UPDATE  utilisateur SET id = ?, nom = ?, prenom = ?, dateDeNaissance = ?, telephone = ?, email = ?, pseudo = ?, pass = ?, isAdmin = ?, cree_le = ?, WHERE id = ?');
        $stmt->execute([$id, $nom, $prenom, $dateDeNaissance, $telephone, $email, $pseudo, $pass, $isAdmin, $cree_le, $_GET['id']]);
        $msg = 'Modifié avec succes!!!';
    }
    // recuperer utilisateur dans la table utilisateur
    $stmt = $mysqlConnection->prepare('SELECT * FROM utilisateur WHERE id = ?');
    $stmt->execute([$_GET['id']]);
    $contact = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$contact) {
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
<h2>Update Contact #<?=$contact['id']?></h2>
    <form action="updatebdd.php?id=<?=$contact['id']?>" method="post">
        <label for="id" class="form-label">ID</label>
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-input" name="id" placeholder="1" value="<?=$contact['id']?>" id="id">
        <input type="text" class="form-input" name="nom" placeholder="yoyo grigi" value="<?=$contact['nom']?>" id="nom">
        <label for="email" class="form-label">Email</label>
        <label for="telephone" class="form-label">Telephone</label>
        <input type="text" class="form-input" name="email" placeholder="vous@example.fr" value="<?=$contact['email']?>" id="email">
        <input type="text" class="form-input" name="telephone" placeholder="0675281852" value="<?=$contact['telephone']?>" id="telephone">
        <label for="dateDeNaissance" class="form-label">Date de naissance</label>
        <input type="text" class="form-input" name="dateDeNaissance" placeholder="date de naissance" value="<?=$contact['dateDeNaissance']?>" id="dateDeNaissance">
        <label for="pseudo"  class="form-label">Pseudo</label>
        <input type="text" class="form-input" name="nom" placeholder="pseudo" value="<?=$contact['pseudo']?>" id="pseudo">
        <input type="submit" class="form-input" value="Mettre à jour">
    </form>
    <?php if ($msg): ?>
    <h1 class="message"><?=$msg?></h1>
    <?php endif; ?>
</div>

<?php include_once('footer.php'); ?>

</body>

</html>