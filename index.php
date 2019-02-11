<?php
/**
 * Created by PhpStorm.
 * User: sammgabriel
 * Date: 2019-02-11
 * Time: 14:06
 */

// Connect to DB

try {

    // Instantiate a database object
    $dbh = new PDO("mysql:dbname=sgabriel_grc",
        "sgabriel_grcuser", "7j34ifMH!8+nHA");

    echo 'Connected to database!';
}

catch (PDOException $e) {

    echo $e->getMessage();

}