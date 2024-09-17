<?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
?>

<?php
// Vérifier si l'ID de la catégorie parent est défini dans l'URL
if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
    // Inclure le fichier de connexion à la base de données
    include 'db.php';

    // Préparer une requête SQL pour supprimer la catégorie parent par son ID
    $sql = "DELETE FROM category_parent WHERE id = ?";

    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Liaison des variables à la déclaration préparée en tant que paramètres
        mysqli_stmt_bind_param($stmt, "i", $param_id);

        // Paramètre
        $param_id = trim($_GET['id']);

        // Tentative d'exécution de la déclaration préparée
        if (mysqli_stmt_execute($stmt)) {
            // Redirection vers la page des catégories parent après la suppression
            header("location: categorie_parent.php");
            exit();
        } else {
            echo "Oops! Une erreur s'est produite. Veuillez réessayer ultérieurement.";
        }

        // Fermer la déclaration préparée
        mysqli_stmt_close($stmt);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    // Redirection si l'ID de la catégorie parent n'est pas défini
    header("location: error.php");
    exit();
}
?>
