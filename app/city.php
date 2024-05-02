<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>JO Paris 2024 - Sport</title>

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

    // Récupération des paramètres de l'url
    $id             = $_GET['id'] ?? 0;
    $action         = $_GET['action'] ?? 'none';

    // Nettoyage des paramètres recus
    $id             = @filter_var($id, FILTER_SANITIZE_NUMBER_INT);
    $action         = htmlspecialchars($action);

    // Affichage d'une seule ville
    if ($action == 'show' && $id > 0)
    {
        // Création d'un objet Ville à partir de l'id
        $city = new City();

        // Affichage de la ville par son id
        echo $city->displayCity($id);

        // Affichage des sports qui se déroulent dans cette ville
        echo $city->displaySports($id);
    }

    // Affichage de toutes les villes
    else if ($action == 'all')
    {
        $city = new City();

        // Affichage en tableau
        echo $city->displayCitiesAsTable();
    }
    ?>
</div>
</body>
</html>
