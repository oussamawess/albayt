<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant du package est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $package_id = $_GET['id'];

    // Récupérer les données du package à partir de la base de données
    $sql = "SELECT * FROM omra_packages WHERE id = $package_id";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Récupérer les données du package
        $row = $result->fetch_assoc();
        $category_parent_id = $row['category_parent_id'];
        $nom = $row['nom'];
        $description = $row['description'];
        $photo = $row['photo']; // Chemin de l'image existante
        // Ajoutez d'autres champs du package ici en fonction de votre structure de base de données
    } else {
        echo "Aucun package trouvé avec cet identifiant.";
        exit();
    }
} else {
    echo "Identifiant du package non spécifié.";
    exit();
}

// Vérifier si le formulaire de mise à jour a été soumis
if (isset($_POST['update_package'])) {
    // Récupérer les données du formulaire
    $category_parent_id =  $_POST['category_parent_id'];
    $nom = $_POST['nom'];
    $description = $_POST['description'];

    // Gérer le fichier téléchargé
    $file_name = $_FILES['photo']['name'];
    $file_tmp = $_FILES['photo']['tmp_name'];
    $file_size = $_FILES['photo']['size'];
    $file_error = $_FILES['photo']['error'];

    // Vérifier s'il y a un fichier téléchargé
    if ($file_size > 0) {
        // Générer un nom unique pour le fichier
        $file_destination = 'uploads/' . uniqid('', true) . '_' . $file_name;

        // Déplacer le fichier téléchargé vers le dossier de destination
        if (move_uploaded_file($file_tmp, $file_destination)) {
            // Le fichier a été téléchargé avec succès
            echo "Photo téléchargée avec succès.";
            // Supprimer l'ancienne image si elle existe
            if (file_exists($photo)) {
                unlink($photo);
            }
            // Mettre à jour le chemin de l'image dans la base de données
            $photo = $file_destination;
        } else {
            // Une erreur s'est produite lors du téléchargement du fichier
            echo "Erreur lors du téléchargement de la photo.";
        }
    }

    // Préparer la requête SQL pour mettre à jour le package
    $sql = "UPDATE omra_packages SET 
            category_parent_id = '$category_parent_id',
            nom = '$nom', 
            description = '$description', 
            photo = '$photo' 
            WHERE id = $package_id";

    // Exécuter la requête pour mettre à jour le package
    if ($conn->query($sql) === TRUE) {
        echo "Package mis à jour avec succès.";
        header("Location: omrapackage.php");
    } else {
        echo "Erreur lors de la mise à jour du package : " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Ville</title>
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
        input[type="file"],
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
        <h2>Modifier une Ville</h2>
        <form action="edit_package.php?id=<?php echo $package_id; ?>" method="POST" enctype="multipart/form-data">

            
                <div class="input-group">
                    <label for="category_parent_id">Catégorie parent:</label>
                    <select id="category_parent_id" name="category_parent_id" class="half-width-input" required>
                        <option value="">Sélectionnez une catégorie parent</option>
                        <?php
                        // Fetch and display package options from the database
                        $sql = "SELECT id, nom FROM category_parent";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row["id"] == $category_parent_id) ? 'selected' : '';
                            echo "<option value='" . $row["id"] . "' $selected>" . $row["nom"] . "</option>";
                        }
                        ?>
                    </select>
                </div>


            <label for="nom">Nom du Ville:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>

            <h3><label for="photo">Photo existante:</label></h3>
            <img src="<?php echo $photo; ?>" alt="Image du package"
                style="max-width: 200px; max-height: 200px;"><br>

            <h3><label for="nouvelle_photo">Télécharger une nouvelle photo:</label></h3>
            <input type="file" id="nouvelle_photo" name="photo" accept="image/*">

            <!-- Ajoutez d'autres champs du package ici en fonction de votre structure de base de données -->

            <button type="submit" name="update_package">Modifier Ville</button>
        </form>
    </div>

</body>

</html>