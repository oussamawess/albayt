<?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
?>
<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant de programme est passé en paramètre dans l'URL
if(isset($_GET['id'])) {
    $program_id = $_GET['id'];

    // Requête SQL pour supprimer le programme de la base de données
    $sql = "DELETE FROM programs WHERE id = $program_id";

    // Exécuter la requête pour supprimer le programme
    if ($conn->query($sql) === TRUE) {
        // Redirection vers la liste des programmes après la suppression
        header("Location: programs.php");
        exit();
    } else {
        echo "Erreur lors de la suppression de programme : " . $conn->error;
    }
} else {
    echo "Identifiant de programme non spécifié.";
}
?>
