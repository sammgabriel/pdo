<?php
/**
 * Created by PhpStorm.
 * User: sammgabriel
 * Date: 2019-02-11
 * Time: 14:06
 *
 * References:
 *
 * https://www.1keydata.com/sql/alter-table-rename-column.html
 * To alter column names
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

// Define the query
$sql = 'INSERT INTO pets (petType, petName, color) VALUES (:petType, :petName, :color)';

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
/* $type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR); */

// Execute
//$statement->execute();

// Bind the parameters
/*$type = 'snake';
$name = 'Slitherin';
$color = 'green';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR); */

// Execute
//$statement->execute();

// Bind the parameters
$type = 'tiger';
$name = 'India';
$color = 'orange';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

// Execute
$statement->execute();

$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully!</p>";

// Bind the parameters
$type = 'dog';
$name = 'Sparky';
$color = 'black';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

// Execute
$statement->execute();

$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully!</p>";

// Bind the parameters
$type = 'chameleon';
$name = 'Pascal';
$color = 'green';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

// Execute
$statement->execute();

$id = $dbh->lastInsertId();
echo "<p>Pet $id inserted successfully!</p>";


