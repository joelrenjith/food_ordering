<?php
function Connect()
{
    $dbhost = "127.0.0.1";
    $dbport = 3369;
    $dbuser = "root";
    $dbpass = ""; // Replace this with your database password
    $dbname = "foodorder";

    try {
        // Create Connection
        
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname, $dbport);

        if ($conn->connect_error) {
            throw new Exception("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    } catch (mysqli_sql_exception $e) {
        // Handle the exception related to the database connection.
        echo "<p>Caught an exception: " . $e->getMessage() . "</p>";
        return null; // You can decide how to handle the failure in your application.
    } catch (Exception $e) {
        // Handle other general exceptions here.
        echo "<p>Caught a general exception: " . $e->getMessage() . "</p>";
        return null; // You can decide how to handle this as well.
    }
}

// Call the Connect() function
$conn = Connect();
	


?>

