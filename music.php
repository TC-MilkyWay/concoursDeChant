

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ma superbe page</title>
    <link rel="stylesheet" href="style.css">
    <script src="./assets/js/app.js" defer></script>
</head>

<body>
    <h2>
        <?php
        echo 'Résumé !';
        ?>
    </h2>
    
    <div>
        <form action="">
            <fieldset>
                <legend>Uploader votre music....</legend>
                <input type="file" name="fileAudio" id="fileAudio" />
            </fieldset>
        </form>
    </div>

    <div>
        <audio controls id="audioPreview" class="audioPreview">
            <source src="" />
        </audio>
    </div>

</body>

</html>