<?php include('cookie.php'); ?>

<?php
//function pour se connecter a la base.. afaire:utiliser notrez fichier bdds.php
function pdo_connect_mysql() {
    $DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = 'root';
    $DATABASE_NAME = 'tp_Chant_g3';
    $DATABASE_PORT = '3307';
    try {
    	return new PDO('mysql:host=' . $DATABASE_HOST . ';port=' . $DATABASE_PORT . ';dbname=' . $DATABASE_NAME . ';charset=utf8', $DATABASE_USER, $DATABASE_PASS);
    } catch (PDOException $exception) {
    	// si un probleme, message d'erreur
    	exit('Probleme de connexion!');
    }
} ?>


<?php $pdo = pdo_connect_mysql();
// recuperer la page via GET
$page = isset($_GET['page']) && is_numeric($_GET['page']) ? (int)$_GET['page'] : 1;
// nombre d'entrees par page
$records_per_page = 10;
            
            // preparer er recuperer les infos depuis notre table Utilisateur
$stmt = $pdo->prepare('SELECT * FROM utilisateur ORDER BY id LIMIT :current_page, :record_per_page');
$stmt->bindValue(':current_page', ($page-1)*$records_per_page, PDO::PARAM_INT);
$stmt->bindValue(':record_per_page', $records_per_page, PDO::PARAM_INT);
$stmt->execute();
// Fetch  pour pouvoir afficher les données de la table
$Utilisateur = $stmt->fetchAll(PDO::FETCH_ASSOC);

// recuperer le nombre d'utilisateurs pour savoir si 1 ou plusieurs page. encore a pofiner
$num_Utilisateur = $pdo->query('SELECT COUNT(*) FROM utilisateur')->fetchColumn();
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
        <h3>Bonjour <?php echo $echomail?>, </h3>   
        <h2>base de données utilisateurs</h2>

        <div class="content read">
	<h2>Utilisateurs enregistrés</h2>
    <center><h3>Vous pouvez modifier ou supprimer les utilisateurs  ci dessous:</h3></center>
	
	<table>
            <tr>
                <td>#</td>
                <td>Nom</td>
                <td>Prénom</td>
                <td>date de naissance</td>
                <td>téléphone</td>
                <td>Email</td>
                <td>Pseudo</td>
                <td>Chanson</td>
                <td></td>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($Utilisateur as $Utilisateur): ?>
            <tr>
                <td><?=$Utilisateur['id']?></td>
                <td><?=$Utilisateur['nom']?></td>
                <td><?=$Utilisateur['prenom']?></td>
                <td><?=$Utilisateur['dateDeNaissance']?></td>
                <td><?=$Utilisateur['telephone']?></td>
                <td><?=$Utilisateur['email']?></td>
                <td><?=$Utilisateur['pseudo']?></td>
                <td class="actions">
                    <a href="updatebdd.php?id=<?=$Utilisateur['id']?>" class="edit"><i class="fas fa-pen fa-xs">✏️</i></a>
                    <a href="deletebdd.php?id=<?=$Utilisateur['id']?>" class="trash"><i class="fas fa-trash fa-xs">🗑</i></a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
	<div class="pagination">
		<?php if ($page > 1): ?>
		<a href="read.php?page=<?=$page-1?>"><i class="fas fa-angle-double-left fa-sm">⏮</i></a>
		<?php endif; ?>
		<?php if ($page*$records_per_page < $num_Utilisateur): ?>
		<a href="read.php?page=<?=$page+1?>"><i class="fas fa-angle-double-right fa-sm">⏭</i></a>
		<?php endif; ?>
	</div>
</div>

            
        
    </div>
    <?php include_once("footer.php"); ?>

</body>

</html>