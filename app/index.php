<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>JO Paris 2024</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <?php
            require_once ('inc/header.php');
        ?>
        <h1>JO Paris 2024</h1>

        <?php
            require_once ('inc/init.php');

            $sport = new Sport();
            // Affichage en liste
            //echo $sport->displaySports();

            // Affichage en tableau
            echo $sport->displaySportsAsTable();
        ?>
    </div>
</body>
</html>
