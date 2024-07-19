<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Vérifier si l'identifiant du programme est passé en paramètre dans l'URL
if (isset($_GET['id'])) {
    $program_id = $_GET['id'];

    // Récupérer les données du programme à partir de la base de données
    $sql = "SELECT * FROM programs WHERE id = $program_id";
    $result = $conn->query($sql);

    // Vérifier s'il y a des résultats
    if ($result->num_rows > 0) {
        // Récupérer les données du programme
        $row = $result->fetch_assoc();
        $nom = $row['nom'];
        $description = $row['description'];
        $photo = $row['photo']; // Chemin de l'image existante
        // Ajoutez d'autres champs du programme ici en fonction de votre structure de base de données
    } else {
        echo "Aucun programme trouvé avec cet identifiant.";
        exit();
    }
} else {
    echo "Identifiant du programme non spécifié.";
    exit();
}

// Vérifier si le formulaire de mise à jour a été soumis
if (isset($_POST['update_program'])) {
    // Récupérer les données du formulaire
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

    // Préparer la requête SQL pour mettre à jour le programme
    $sql = "UPDATE programs SET 
            nom = '$nom', 
            description = '$description', 
            photo = '$photo' 
            WHERE id = $program_id";

    // Exécuter la requête pour mettre à jour le programme
    if ($conn->query($sql) === TRUE) {
        header("Location: programs.php");
    } else {
        echo "Erreur lors de la mise à jour du programme : " . $conn->error;
    }    
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Programme</title>
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
        <h2>Modifier un Programme</h2>
            <form action="edit_program.php?id=<?php echo $program_id; ?>" method="POST" enctype="multipart/form-data">
                <label for="nom">Nom du Programme:</label>
                <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>

                <label for="description">Description:</label>
                <textarea id="description" name="description" rows="4" required><?php echo $description; ?></textarea>

                <h3><label for="photo">Photo existante:</label></h3>
                <img src="<?php echo $photo; ?>" alt="Image du programme"
                    style="max-width: 200px; max-height: 200px;"><br>

                <h3><label for="nouvelle_photo">Télécharger une nouvelle photo:</label></h3>
                <input type="file" id="nouvelle_photo" name="photo" accept="image/*">

                <!-- Ajoutez d'autres champs du programme ici en fonction de votre structure de base de données -->

                <button type="submit" name="update_program">Modifier Programme</button>
            </form>
    </div>

</body>

</html>