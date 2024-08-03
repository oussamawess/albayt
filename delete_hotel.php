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

// Vérifier si l'identifiant de l'hôtel est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    // Vérifier si l'hôtel est utilisé dans la table hebergements
    $sql_check_hebergements = "SELECT COUNT(*) as count FROM hebergements WHERE hotel_id = $hotel_id";
    $result_check = mysqli_query($conn, $sql_check_hebergements);
    $row_check = mysqli_fetch_assoc($result_check);

    if ($row_check['count'] > 0) {
        // Redirection vers la liste des hôtels avec un message d'erreur
        header("Location: hotels.php?error=hotel_in_use");
        exit();
    } else {
        // Requête SQL pour supprimer l'hôtel de la base de données
        $sql_delete_hotel = "DELETE FROM hotels WHERE id = $hotel_id";

        // Exécuter la requête pour supprimer l'hôtel
        if ($conn->query($sql_delete_hotel) === TRUE) {
            // Redirection vers la liste des hôtels après la suppression
            header("Location: hotels.php");
            exit();
        } else {
            echo "Erreur lors de la suppression de l'hôtel : " . $conn->error;
        }
    }
} else {
    echo "Identifiant de l'hôtel non spécifié.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>
