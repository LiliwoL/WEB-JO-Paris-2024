<?php
require_once ('inc/init.php');

// Récupération et affichage des VILLES
$city = new City();
echo $city->displayCities();

require_once ('views/nav.php');