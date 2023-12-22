<?php
/**
 * Executes a query with the given parameters
 * @param string $query The query to execute
 * @param array $params The parameters to bind to the query
 * @param string $error The error message to return
 * @param string $params_types The types of the parameters, default will be all 's' (i = integer, d = double, s = string, b = BLOB)
 * @return array|bool True or the result of the query, or false if it failed
 */
function executeQuery($query, $params = null, &$error = null, $params_types = null) {
    // Replace with your connection details
    $servername = "localhost";
    $username = "root";
    $password = "root";
    $dbname = "hackathon";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        $error = "Connection failed: " . $conn->connect_error;
        return false;
    }

    // Prepare and bind
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        $error = "Failed to prepare statement: " . $conn->error;
        return false;
    }

    //Set the default parameters types to all strings
    if ($params) {
        if ($params_types)
            $stmt->bind_param($params_types, ...$params);
        else
            $stmt->bind_param(str_repeat('s', count($params)), ...$params);
    }

    // Execute the statement
    if (!$stmt->execute()) {
        // If the query failed, set the error and return false
        $error = $stmt->error;
        
        $stmt->close();
        $conn->close();
        
        return false;
    }

    
    // If it's a SELECT query, get the result
    if (strpos($query, 'SELECT') === 0) {
        $result = $stmt->get_result();

        // Fetch all rows into an array
        $data = $result->fetch_all(MYSQLI_ASSOC);

        $stmt->close();
        $conn->close();

        return $data;
    } else {
        // If it's an INSERT, UPDATE, or DELETE query, get the number of affected rows
        $affected_rows = $stmt->affected_rows;

        $stmt->close();
        $conn->close();

        return $affected_rows;
    }

    // Close connection
    $stmt->close();
    $conn->close();

    // Return true if the query was successful and nothing else was returned
    return true;
}
?>
