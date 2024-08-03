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
    $packageId = intval($_GET['package_id']);
    $sql = "SELECT id, nom FROM type_formule_omra WHERE formule_parent_id = $packageId";
    $result = mysqli_query($conn, $sql);

    $types = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $types[] = $row;
    }
    echo json_encode($types);
}
?>
