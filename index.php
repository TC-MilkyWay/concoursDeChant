<?php include('cookie.php'); ?>

<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concours de chant Longuenesse</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.11/typed.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

</head>

<body>
    <div class="scroll-up-btn">
        <i class="fas fa-angle-up"></i>
    </div>
    <?php include_once('header.php'); ?>

    <!--accueil -->
    <section class="home" id="home">
        <div class="max-width">
            <div class="home-content">
                <div class="text-1">Bienvenue </div>
                <div class="text-2">Concours de chant </div>
                <div class="text-2">De Longuenesse </div>
                <div class="text-1">Date jusqu'au Concours</div>
                <h2 class="date"></h2>

                <a href="#about">Inscription</a>
            </div>
        </div>
        <div class="elfsight-app-b88cf131-ad23-4f6f-9faa-2bc6964c9fb0"></div>
    </section>

    <!-- a propos du concours -->
    <section class="about" id="about">
        <div class="max-width">
            <h2 class="title">A propos du Concours</h2>
            <div class="about-content">
                <div class="column left">
                    <img src="../media/BK2.jpg" alt="">
                </div>
                <div class="column right">
                    <div class="contenu">

                        <center>
                            <h3>Bonjour et bienvenue
                                <?php echo $echomail ?>, </h3>
                        </center>

                        <img src="../media/quoi.jpg" alt="">
                        <a href="inscription.php">Inscription</a>

                        
                    </div>
                </div>
            </div>
            
    </section>
    


    <!-- footer  -->
    <?php include_once("footer.php"); ?>
    <script src="script.js"></script>
    <script src="compteur.js"></script>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
    
</body>

</html>