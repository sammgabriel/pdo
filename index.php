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
$type = 'kangaroo';
$name = 'Joey';
$color = 'purple';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

// Execute
$statement->execute();

// Bind the parameters
$type = 'snake';
$name = 'Slitherin';
$color = 'green';
$statement->bindParam(':petType', $type, PDO::PARAM_STR);
$statement->bindParam(':petName', $name, PDO::PARAM_STR);
$statement->bindParam(':color', $color, PDO::PARAM_STR);

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
//$statement->execute();

// Deleting data
// Define the query
$sql = "DELETE FROM pets WHERE id = :id";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
$id = '6';
$statement->bindParam(':id', $id, PDO::PARAM_STR);

// Execute
//$statement->execute();

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

// Add to the pet owners table
// Define the query
$sql = "INSERT INTO petOwners (first_name, last_name, petId) VALUES (:firstName, :lastName, :petId)";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Bind the parameters
$firstName = 'Joe';
$lastName = 'Shmo';
$petId = 1;
$statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
$statement->bindParam(':petId', $petId, PDO::PARAM_INT);

// Execute
//$statement->execute();

$firstName = 'Sam';
$lastName = 'Iam';
$petId = 3;
$statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
$statement->bindParam(':petId', $petId, PDO::PARAM_INT);

// Execute
//$statement->execute();

$firstName = 'X';
$lastName = 'Wu';
$petId = 2;
$statement->bindParam(':firstName', $firstName, PDO::PARAM_STR);
$statement->bindParam(':lastName', $lastName, PDO::PARAM_STR);
$statement->bindParam(':petId', $petId, PDO::PARAM_INT);

// Execute
//$statement->execute();

// Define the query
$sql = "SELECT petOwners.id, petOwners.first_name, petOwners.last_name, pets.petName, 
          pets.petType, pets.color FROM pets, petOwners WHERE pets.id = petOwners.petId;";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Execute
$statement->execute();

// Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);

// Create HTML table to display order summary
echo "<table border='1px solid'><tr><th>Customer ID</th><th>Customer First Name</th><th>Customer Last Name</th>
        <th>Pet Name</th><th>Pet Type</th><th>Pet Color</th></tr>";

foreach ($result as $row) {

    echo "<tr><td>" . $row['id'] . "</td><td>" . $row['first_name'] . "</td><td>" .
        $row['last_name'] . "</td><td>" . $row['petName'] . "</td><td>" .  $row['petType'] .
        "</td><td>" . $row['color'] . "</td></tr>";
}

echo "</table>";

// Display all the pets in the pets table
// Define the query
$sql = "SELECT * FROM pets";

// Prepare the statement
$statement = $dbh->prepare($sql);

// Execute
$statement->execute();

// Process the result
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
echo "<h2>All pets</h2>";
foreach ($result as $row) {

    echo "<p>" . $row['petName'] . ", " . $row['petType'] . ", " . $row['color'] . "</p>";
}



