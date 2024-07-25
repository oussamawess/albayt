<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$abrv = $_POST['abrv'];

// Préparer et exécuter la requête SQL pour insérer les données
$sql = "INSERT INTO airports (nom, abrv) VALUES ('$nom', '$abrv')";

if (mysqli_query($conn, $sql)) {
    echo "Nouvelle airports ajoutée avec succès.";
    header("Location: liste_aeroport.php"); // Redirect back to the form after successful insertion

} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>