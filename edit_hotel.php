<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant de l'hôtel est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $hotel_id = $_GET['id'];

    // Récupérer les données de l'hôtel à partir de la base de données
    $sql = "SELECT * FROM hotels WHERE id = $hotel_id";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Récupérer les données de l'hôtel
        $row = $result->fetch_assoc();
        $nom = $row['nom'];
        $etoiles = $row['etoiles'];
        $ville = $row['ville'];
        // $pension = $row['pension'];
        $details = $row['details'];
        $monument = $row['monument'];
    } else {
        echo "Aucun hôtel trouvé avec cet identifiant.";
        exit();
    }

    // Récupérer les images de l'hôtel
    $sql_images = "SELECT * FROM hotel_gallery WHERE hotel_id = $hotel_id";
    $result_images = $conn->query($sql_images);
} else {
    echo "Identifiant de l'hôtel non spécifié.";
    exit();
}

// Vérifier si le formulaire de mise à jour a été soumis
if (isset($_POST['update_hotel'])) {
    // Récupérer les données du formulaire
    $nom = $_POST['nom'];
    $etoiles = $_POST['etoiles'];
    $ville = $_POST['ville'];
    // $pension = $_POST['pension'];
    $details = $_POST['details'];
    $monument = $_POST['monument'];

    // Préparer la requête SQL pour mettre à jour l'hôtel
    $sql = "UPDATE hotels SET 
            nom = '$nom', 
            etoiles = '$etoiles', 
            ville = '$ville',             
            details = '$details', 
            monument = '$monument' 
            WHERE id = $hotel_id";

    // Exécuter la requête pour mettre à jour l'hôtel
    if ($conn->query($sql) === TRUE) {
        echo "Hôtel mis à jour avec succès.";
    } else {
        echo "Erreur lors de la mise à jour de l'hôtel : " . $conn->error;
    }

    // Traitement des nouvelles images ajoutées
    if (isset($_FILES['images']) && $_FILES['images']['error'][0] == 0) {
        $target_dir = "uploads/";
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $target_file = $target_dir . basename($_FILES['images']['name'][$key]);
            if (move_uploaded_file($tmp_name, $target_file)) {
                // Enregistrer le chemin de l'image dans la base de données
                $sql_image = "INSERT INTO hotel_gallery (hotel_id, image_path) VALUES ($hotel_id, '$target_file')";
                $conn->query($sql_image);
            }
        }
    }
}

// Vérifier si une image doit être supprimée
if (isset($_GET['delete_image'])) {
    $image_id = $_GET['delete_image'];
    // Supprimer l'image de la base de données
    $sql_delete_image = "DELETE FROM hotel_gallery WHERE id = $image_id";
    $conn->query($sql_delete_image);
    // Rediriger pour éviter le rafraîchissement de la page
    header("Location: edit_hotel.php?id=$hotel_id");
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Hôtel</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        .image-gallery {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 20px;
        }

        .image-gallery img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 5px;
        }

        .image-gallery .delete-button {
            display: block;
            text-align: center;
            margin-top: 5px;
            color: red;
            cursor: pointer;
        }
    </style>
    <?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }


    ?>
    <?php include 'header.php'; ?>
</head>

<body>

    <div class="container">
        <h2>Modifier un Hôtel</h2>
        <form action="edit_hotel.php?id=<?php echo $hotel_id; ?>" method="POST" enctype="multipart/form-data">
            <label for="nom">Nom de l'Hôtel:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>

            <label for="etoiles">Étoiles:</label>
            <input type="number" id="etoiles" name="etoiles" value="<?php echo $etoiles; ?>" required>

            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" value="<?php echo $ville; ?>" required>

            <!-- <label for="pension">Type de Pension:</label>
            <input type="text" id="pension" name="pension" value="<!?php echo $pension; ?>" required> -->

            <label for="details">Détails:</label>
            <textarea id="details" name="details" rows="4" required><?php echo $details; ?></textarea>

            <label for="monument">Monuments à Proximité:</label>
            <textarea id="monument" name="monument" rows="4" required><?php echo $monument; ?></textarea>

            <label for="images">Ajouter de nouvelles images:</label>
            <input type="file" id="images" name="images[]" multiple>

            <button type="submit" name="update_hotel">Modifier Hôtel</button>
        </form>

        <h3>Galerie d'Images</h3>
        <div class="image-gallery">
            <?php
            if ($result_images->num_rows > 0) {
                while ($row_image = $result_images->fetch_assoc()) {
                    echo "<div>";
                    echo "<img src='" . $row_image['image_path'] . "' alt='Image'>";
                    echo "<a class='delete-button' href='edit_hotel.php?id=$hotel_id&delete_image=" . $row_image['id'] . "'>Supprimer</a>";
                    echo "</div>";
                }
            } else {
                echo "<p>Aucune image disponible pour cet hôtel.</p>";
            }
            ?>
        </div>
    </div>

</body>

</html>