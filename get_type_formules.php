<?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
?>
<?php
include 'db.php';

if (isset($_GET['package_id'])) {
    $packageId = mysqli_real_escape_string($conn, $_GET['package_id']);

    $sql = "SELECT id, nom FROM type_formule_omra WHERE formule_parent_id = $packageId"; 
    $result = mysqli_query($conn, $sql);
    $typeFormules = mysqli_fetch_all($result, MYSQLI_ASSOC);

    header('Content-Type: application/json');
    echo json_encode($typeFormules);
} else {
    echo json_encode([]); // Return an empty array if no package_id is provided
}
mysqli_close($conn);
?>
