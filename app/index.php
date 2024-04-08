<?php
    require_once ('inc/init.php');

    // Récupération et affichage des SPORTS
    $sport = new Sport();
    echo $sport->displaySports();

    // Récupération et affichage des VILLES
    $city = new City();
    echo $city->displayCities();

    // Récupération et affichage des SITES
    $sites = new Sites();
    echo $sites->displaySites();
