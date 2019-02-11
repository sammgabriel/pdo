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

// Inserting data
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
/*$type = 'tiger';
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
echo "<p>Pet $id inserted successfully!</p>"; */

// Updating data
// Define the query
$sql = "UPDATE pets SET petName = :new WHERE petName = :old";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
$old = 'Joey';
$new = 'Troy';
$statement->bindParam(':old', $old, PDO::PARAM_STR);
$statement->bindParam(':new', $new, PDO::PARAM_STR);

// Execute
$statement->execute();

// Updating data
// Define the query
$sql = "UPDATE pets SET color = :newColor WHERE petName = :petName";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
$newColor = 'brown';
$name = 'Oscar';
$statement->bindParam(':newColor', $newColor, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);

// Execute
$statement->execute();

// Deleting data
// Define the query
/* $sql = "DELETE FROM pets WHERE id = :id";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
$id = '6';
$statement->bindParam(':id', $id, PDO::PARAM_STR);

// Execute
$statement->execute(); */

// Select queries
// Define the query
$sql = "SELECT * FROM pets WHERE id = :id";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
$id = '3';
$statement->bindParam(':id', $id, PDO::PARAM_STR);

// Execute
$statement->execute();

// Process the result
$row = $statement->fetch(PDO::FETCH_ASSOC);
echo "<p>" . $row['petName'] . ", " . $row['petType'] . ", " . $row['color'] . "</p>";
echo "<h2>All pets</h2>";

// Define the query
$sql = "SELECT * FROM pets";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Execute
$statement->execute();

// Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {

    echo "<p>" . $row['petName'] . ", " . $row['petType'] . ", " . $row['color'] . "</p>";
}

