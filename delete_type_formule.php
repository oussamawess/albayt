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

// Check if 'id' is provided in the URL
if (isset($_GET['id'])) {
    // Sanitize the ID
    $typeFormuleId = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Prepare and execute the deletion query
    $sql = "DELETE FROM type_formule_omra WHERE id = '$typeFormuleId'";
    if (mysqli_query($conn, $sql)) {
        // Redirect to the list page after successful deletion
        header("Location: list_type_formule_omra.php");
        exit; // Ensure no further code is executed
    } else {
        // Handle error (optional: you might log this or handle it in another way)
        // For now, just redirect to the list page
        header("Location: list_type_formule_omra.php?error=1");
        exit;
    }
} else {
    // Handle case where 'id' is not provided
    header("Location: list_type_formule_omra.php?error=2");
    exit;
}

// Close the database connection
mysqli_close($conn);
?>
