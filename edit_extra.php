<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un Extra</title>
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
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
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

    <?php
    // Vérifier si l'ID de l'extra est défini dans l'URL
    if (isset($_GET['id']) && !empty(trim($_GET['id']))) {
        // Inclure le fichier de connexion à la base de données
        include 'db.php';

        // Préparer une requête SQL pour sélectionner l'extra par son ID
        $sql = "SELECT * FROM extras WHERE id = ?";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Liaison des variables à la déclaration préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            // Paramètres
            $param_id = trim($_GET['id']);

            // Tentative d'exécution de la déclaration préparée
            if (mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if (mysqli_num_rows($result) == 1) {
                    // Récupérer la ligne de résultat
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    // Extraire les valeurs des champs
                    $nom = $row['nom'];
                    $description = $row['description'];
                    $prix = $row['prix'];
                } else {
                    // Redirection si l'ID de l'extra n'existe pas
                    header("location: error.php");
                    exit();
                }
            } else {
                echo "Oops! Une erreur s'est produite. Veuillez réessayer ultérieurement.";
            }

            // Fermer la déclaration préparée
            mysqli_stmt_close($stmt);
        }

        // Fermer la connexion à la base de données
        mysqli_close($conn);
    } else {
        // Redirection si l'ID de l'extra n'est pas défini
        header("location: error.php");
        exit();
    }
    ?>

    <div class="container">
        <h2>Modifier un Extra</h2>
        <form action="submit_edit_extra.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $param_id; ?>">

            <label for="nom">Nom de l'Extra :</label>
            <input type="text" id="nom" name="nom" value="<?php echo $nom; ?>" required>

            <label for="description">Description :</label>
            <input type="text" id="description" name="description" value="<?php echo $description; ?>" required>

            <label for="prix">Prix :</label>
            <input type="text" id="prix" name="prix" value="<?php echo $prix; ?>" required>

            <button type="submit">Enregistrer les Modifications</button>
        </form>
    </div>

</body>

</html>