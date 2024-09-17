<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Ville</title>
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
        <h2>Ajouter une Ville</h2>
        <form action="submit_omra_package.php" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <label for="category_parent_id">Catégorie parent:</label>
                <select id="category_parent_id" name="category_parent_id" class="half-width-input" required>
                    <option value="">Sélectionnez une catégorie parent</option>
                    <?php
                    // Inclure le fichier de connexion à la base de données
                    include 'db.php';

                    // Requête SQL pour sélectionner tous les catégorie parent
                    $sql = "SELECT id, nom FROM category_parent";

                    // Exécuter la requête
                    $result = mysqli_query($conn, $sql);

                    // Vérifier s'il y a des résultats
                    if (mysqli_num_rows($result) > 0) {
                        // Afficher les options dans le menu déroulant
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
                        }
                    } else {
                        echo "<option disabled>Aucun catégorie parent disponible</option>";
                    }

                    // Fermer la connexion à la base de données
                    mysqli_close($conn); ?>
                </select>
            </div>

            <label for="nom">Nom du Ville:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="description">Description:</label>
            <textarea id="description" name="description" rows="4" required></textarea>



            <label for="photo">Photo:</label>
            <input type="file" id="photo" name="photo" accept="image/*" required>



            <button type="submit">Ajouter Ville</button>
        </form>
    </div>

</body>

</html>