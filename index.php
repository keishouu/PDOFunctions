
<?php require_once 'core/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Show code demonstrating fetchAll(). Use print_r(). with "<pre>" tag in between -->
    <?php
    // selecting all of the doctors from the database
    $stmt = $pdo->prepare("SELECT * FROM patients
                            WHERE patient_id = 25");
    if ($stmt->execute()){
        echo '<pre>';
        print_r($stmt->fetch());
        echo '</pre>';
    }
    ?>
</body>
</html>

<?php require_once 'core/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Show code demonstrating fetchAll(). Use print_r(). with "<pre>" tag in between -->
    <?php
    // selecting all of the doctors from the database
    $stmt = $pdo->prepare("SELECT * FROM doctors");
    if ($stmt->execute()){
        echo '<pre>';
        print_r($stmt->fetchAll());
        echo '</pre>';
    }
    ?>
</body>
</html>

<?php require_once 'core/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Show code demonstrating insertion of record to your database -->
    <?php
    // create a query to add a new data 
    $query  = "INSERT INTO doctors (doctor_id, first_name, last_name, birth_date, specialty, email, years_of_experience, hospital_name) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

    // prepare the query
    $stmt = $pdo->prepare($query);

    // execute the query by putting the required data as an array
    $executeQuery = $stmt->execute( 
        [21, "Zayne", "Li", '1997-09-05', "Cardiac Surgeon", "drzayne.cardio@akso.com", 4, "Akso Hospital"]
    );

    // check if the query is successful or not
    if ($executeQuery) {
        echo "Query Successful!";
    }
    else {
        echo "Query Failed.";
    }

    ?>
</body>
</html>

<?php require_once 'core/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Show code demonstrating deletion of record to your database -->
    <?php
    // create a query to delete an existing data 
    $query  = "DELETE FROM patients
                WHERE patient_id = 45";

    // prepare the query
    $stmt = $pdo->prepare($query);

    // execute the query 
    $executeQuery = $stmt->execute();

    // check if the query is successful or not
    if ($executeQuery) {
        echo "Deletion Successful!";
    }
    else {
        echo "Query Failed.";
    }

    ?>
</body>
</html>

<?php require_once 'core/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!-- Show code demonstrating updating of record from your database -->
    <?php
    // create a query to update an existing data 
    $query  = "UPDATE patients
                SET first_name = ?, last_name = ?
                WHERE patient_id = 36";

    // prepare the query
    $stmt = $pdo->prepare($query);

    // execute the query 
    $executeQuery = $stmt->execute(
        ["Roni", "Bueno"]
    );

    // check if the query is successful or not
    if ($executeQuery) {
        echo "Update Successful!";
    }
    else {
        echo "Query Failed.";
    }

    ?>
</body>
</html>

<?php require_once 'core/dbconfig.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <!-- Show code demonstrating an sql querys result set is rendered on an html table -->
        <h1>Doctor's List</h1>
        <table>
            <th>
                <tr>
                    <th>Doctor ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Birthdate</th>
                    <th>Specialty</th>
                    <th>Email</th>
                    <th>Years of Experience</th>
                    <th>Hospital Name</th>
                </tr>
            </th>
            <tbody>
                <?php
                    // Create a query to retrieve data from the doctors table
                    $query = "SELECT doctor_id, first_name, last_name, birth_date, specialty, email, years_of_experience, hospital_name FROM doctors";

                    // Prepare and execute the query
                    $stmt = $pdo->prepare($query);
                    $stmt->execute();

                    // Fetch all the results
                    $results = $stmt->fetchAll();

                    // Loop through the results and display each row in the table
                    foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['doctor_id'] . "</td>";
                        echo "<td>" . $row['first_name'] . "</td>";
                        echo "<td>" . $row['last_name'] . "</td>";
                        echo "<td>" . $row['birth_date'] . "</td>";
                        echo "<td>" . $row['specialty'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['years_of_experience'] . "</td>";
                        echo "<td>" . $row['hospital_name'] . "</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
</body>
</html>