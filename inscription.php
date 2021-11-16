<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Concours de chant</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.7.3/css/foundation.min.css" />
</head>

<body>

<?php include_once('header.php'); ?>


<form method="post" id="formulaire" action="controller.php">

      Name : <input type="text" name="name" placeholder="Entrez votre Nom" /><br />
      Prénom : <input type="text" prénom="prénom" placeholder="Entrer votre Prénom" /><br/>
      Téléphone : <input type="tel" id="phone" name="phone" placeholder="06-70-28-18-50" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required><br>
      Email : <input type="email" name="email" placeholder="Entrer votre Email" /><br />
      Pseudo : <input type="text" name="pseudo" placeholder="Entrer un pseudo" /><br/>
      Password : <input type="" 

      <input type="submit" value="Submit" />

    </form>

    <?php include_once('footer.php'); ?>

</body>

</html>