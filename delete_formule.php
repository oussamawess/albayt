<?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
?>
<?php
include 'db.php'; // Include your database connection file

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Ensure the ID is an integer

    // Perform the deletion
    $sql = "DELETE FROM formules WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
        // Redirect to display_formules.php after successful deletion
        header('Location: display_formules.php');
        exit;
    } else {
        echo "Erreur de suppression : " . mysqli_error($conn);
    }
} else {
    echo "ID non spécifié.";
}

mysqli_close($conn);
?>
