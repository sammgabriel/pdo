<?php
/**
 * Created by PhpStorm.
 * User: sammgabriel
 * Date: 2019-02-11
 * Time: 14:06
 */

require '/home/sgabriel/config.php';

// Connect to DB

try {

    // Instantiate a database object
    $dbh = new PDO(DB_DSN,
        DB_USERNAME, DB_PASSWORD);

    echo 'Connected to database!';
}

catch (PDOException $e) {

    echo $e->getMessage();

}

