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

// Récupérer les données du formulaire
$id = $_POST['id'];
$nom = $_POST['nom'];

// Mise à jour du logo de la compagnie (si un nouveau logo a été téléchargé)
$logo = $_POST['logo_actuel'];
if (isset($_FILES['logo']) && $_FILES['logo']['error'] == 0) {
    $tmpFilePath = $_FILES['logo']['tmp_name'];
    $newFilePath = "uploads/" . $_FILES['logo']['name'];
    if (move_uploaded_file($tmpFilePath, $newFilePath)) {
        $logo = $newFilePath;
    } else {
        echo "Erreur lors de l'upload du logo.";
        exit();
    }
}

// Préparer la requête SQL pour mettre à jour la compagnie
$sql = "UPDATE compagnies_aeriennes SET nom = '$nom', logo = '$logo' WHERE id = $id";

// Exécuter la requête
if ($conn->query($sql) === TRUE) {
    echo "La compagnie aérienne a été mise à jour avec succès.";
    header("Location: list_compagnies.php"); // Redirect back to the form after successful insertion

} else {
    echo "Erreur : " . $conn->error;
}

// Fermer la connexion
$conn->close();
?>