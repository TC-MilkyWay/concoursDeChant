<?php include('cookie.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours de chant - Inscription</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include_once('header.php'); ?>
    <div class="main">

    <?php if (isset($e)) {
        require_once('submit_inscription.php');
        echo "<h2>".$e."</h2>";
    } else {
        echo "";
    } ?>

        <form method="post" id="formulaire" action="submit_inscription.php">
            <h2>Inscription au Site</h2>
            <div>
                <label for="nom" class="form-label">Nom :</label><br>
                <input type="text" class="form-input" name="nom" placeholder="Entrez votre Nom"W required/>
            </div>
            <div>
                <label for="prenom" class="form-label">Prénom : </label><br>
                <input type="text" class="form-input" name="prenom" placeholder="Entrer votre Prénom" required />
            </div>
            <div>
                <label for="naissance" class="form-label">Date de Naissance : </label><br>
                <input type="date" class="form-input" name="naissance" placeholder="Entrer votre Date de naissance" required />
            </div>
            <div>
                <label for="phone" class="form-label">Téléphone : </label><br>
                <input type="tel" class="form-input" id="phone" name="phone" placeholder="0670281850" pattern="(0|(\\+33)|(0033))[1-9][0-9]{8}" required>
            </div>
            <div>
                <label for="email" class="form-label">Email : </label><br>
                <input type="email" class="form-input" name="email" placeholder="Entrer votre Email" required /><br>
                <i>Un seul email valable par candidature.</i>
            </div>
            <div>
                <label for="pseudo" class="form-label">Pseudo : </label><br>
                <input type="text" class="form-input" name="pseudo" placeholder="Entrer un pseudo" required />
            </div>
            <div>
                <label for="password" class="form-label">Password : </label><br>
                <input type="password" class="form-input" id="password" name="password" placeholder="Mot de passe" required />
            </div>
            <div>
                <label for="password" class="form-label">Confirmation du Password : </label><br>
                <input type="password" class="form-input" id="password_confirm" name="password_confirm"  placeholder="Confirmation du mot de passe" oninput="check(this)" required />
            </div>
            <div>
                <center><button type="submit" class="">Envoyer</button></center>
            </div>
        </form>
    </div>
    <?php include_once('footer.php'); ?>
</body>

</html>

<script language='javascript' type='text/javascript'>
    function check(input) {
        if (input.value != document.getElementById('password').value) {
            input.setCustomValidity('Le mot de passe doit être le même.');
        } else {
            // input is valid -- reset the error message
            input.setCustomValidity('');
        }
    }
</script>