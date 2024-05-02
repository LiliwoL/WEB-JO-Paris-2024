<?php
require_once ('inc/init.php');

// Récupération et affichage des SPORTS
$sport = new Sport();
echo $sport->displaySports();

require_once ('views/nav.php');