<?php
require_once ('inc/init.php');

// Récupération et affichage des SITES
$sites = new Sites();
echo $sites->displaySites();

require_once ('views/nav.php');