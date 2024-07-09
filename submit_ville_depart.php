<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$statut = $_POST['statut'];

// Préparer et exécuter la requête SQL pour insérer les données
$sql = "INSERT INTO ville_depart (nom, statut) VALUES ('$nom', '$statut')";

if (mysqli_query($conn, $sql)) {
    echo "Nouvelle ville de départ ajoutée avec succès.";
    header("Location: liste_ville_depart.php"); // Redirect back to the form after successful insertion

} else {
    echo "Erreur: " . $sql . "<br>" . mysqli_error($conn);
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>