<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *"); // Allow requests from any origin

// Include database connection
include 'db.php';

$securityToken = "wesswess"; // Your defined token

// Initialize receivedToken and type
$receivedToken = '';
$type = '';

// Use getallheaders to fetch all headers
$headers = getallheaders();

// Check if Authorization header exists
if (isset($headers['Authorization'])) {
    list($type, $receivedToken) = explode(' ', $headers['Authorization'], 2);
}

// Debugging output
file_put_contents('debug.log', "Type: $type, Token: $receivedToken\n", FILE_APPEND);

// Check if the type is Bearer and if the received token matches
if ($type !== 'Bearer' || $receivedToken !== $securityToken) {
    echo json_encode(["message" => "Unauthorized access"]);
    exit();
}



// Check the request method
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    // Get the table name from the query string
    $tableName = isset($_GET['table']) ? $_GET['table'] : '';

    // Validate the table name (prevent SQL injection)
    $allowedTables = ['compagnies_aeriennes', 'airports', 'category_parent', 'extras', 'formules', 'hebergements', 'hotels', 'omra_packages', 'programs', 'reservations', 'type_formule_omra', 'ville_depart', 'vols'];
    
    if (in_array($tableName, $allowedTables)) {
        $sql = "SELECT * FROM " . $tableName;
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $data = [];
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            echo json_encode($data);
        } else {
            echo json_encode(["message" => "No records found in $tableName"]);
        }
    } else {
        echo json_encode(["message" => "Invalid table name"]);
    }
} else {
    echo json_encode(["message" => "Invalid request method"]);
}

$conn->close();
?>
