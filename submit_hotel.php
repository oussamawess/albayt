<?php
// Connexion à la base de données
include "db.php";

// Récupérer les données du formulaire
$nom = $_POST['nom'];
$etoiles = $_POST['etoiles'];
$ville = $_POST['ville'];
$pension = $_POST['pension'];
$details = $_POST['details'];
$monument = $_POST['monument'];

// Enregistrement de l'image de la galerie
$gallery_images = [];
if (isset($_FILES['gallery'])) {
    $total_images = count($_FILES['gallery']['name']);
    for ($i = 0; $i < $total_images; $i++) {
        $tmpFilePath = $_FILES['gallery']['tmp_name'][$i];
        if ($tmpFilePath != "") {
            $newFilePath = "uploads/" . $_FILES['gallery']['name'][$i];
            if (move_uploaded_file($tmpFilePath, $newFilePath)) {
                $gallery_images[] = $newFilePath;
            }
        }
    }
}

// Préparer la requête SQL pour ajouter l'hôtel
$sql = "INSERT INTO hotels (nom, etoiles, ville, pension, details, monument) 
        VALUES ('$nom', '$etoiles', '$ville', '$pension', '$details', '$monument')";

// Exécuter la requête pour ajouter l'hôtel
if ($conn->query($sql) === TRUE) {
    // Récupérer l'ID de l'hôtel nouvellement ajouté
    $hotel_id = $conn->insert_id;

    // Enregistrer les chemins des images de la galerie dans la base de données
    foreach ($gallery_images as $image) {
        $image_sql = "INSERT INTO hotel_gallery (hotel_id, image_path) 
                      VALUES ('$hotel_id', '$image')";
        $conn->query($image_sql);
    }

    echo "L'hôtel a été ajouté avec succès.";
    header("Location: hotels.php"); // Redirect back to the form after successful insertion

} else {
    echo "Erreur : " . $sql . "<br>" . $conn->error;
}

// Fermer la connexion
$conn->close();
?>