<?php
    // Add your class dir to include path
    set_include_path(__DIR__);

    // You can use this trick to make autoloader look for commonly used "My.class.php" type filenames
    spl_autoload_extensions('.php');

    // Use default autoload implementation
    spl_autoload_register();

    global $conn;
    $conn = new DB($serverName, $database, $username, $password);
    $conn->connect();