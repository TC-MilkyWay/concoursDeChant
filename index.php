<?php include('cookie.php');?>
<body class ="index">
    <?php include_once('header.php');; ?>
    <main class="main">
            <article class="contenu">
    
            <center><h3>Bonjour et bienvenue <?php echo $echomail ?>,  </h3></center>
    
            <h2>Vous êtes passionnés de chant? Participez au concours de Longuenesse cet été.</h2>
            
            <p>Le premier concours de chant organisé par Longienesse  se tiendra le dimanche 1er août, a la salle.....
            Un jury composé de plusieurs professionnels de la chanson sera présent pour révéler les talents de demain.
            </p>
                
                
            <p>Vous aimez chanter et vous avez envie de découvrir le plaisir de la scène?  
                
            L'occasion vous est donnée de tenter votre chance cet été. </p>
                
            <p>Que vous soyez varois ou simplement de passage dans la région, participez à la première édition du concours "Révèle Ta Voix (e)", le 1er août, sur la scène du Théâtre de Verdure des Arcs-sur-Argens.
                
            Les candidats pourront concourir dans les catégories adultes, séniors ou encore auteurs-compositeurs, et ce dès l'âge de 7 ans, avec autorisation parentale pour les mineurs.</p>
                
            <center><input type="checkbox" name="cgu" id="cgu">
            <a href="cgu.php">Veuillez accepter les CGU avant toute inscription au site</a><br>
            <button><a href="inscription.php">Inscription au concours</a></button></center>
        </article>
    </main>
    <aside>
    <div id="connexion">
<?php if ((isset($_SESSION['pseudo'])) && (!empty($_SESSION['pseudo'])))
{
include('connecte.php');
}
else
{
include('connexion.php');
}
?>
</div>
    </aside>
    <?php include_once('footer.php'); ?>
</body>