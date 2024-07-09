<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Compagnie Aérienne</title>
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

    <div class="container">
        <h2>Modifier Compagnie Aérienne</h2>

        <?php
        // Inclure le fichier de connexion à la base de données
        include 'db.php';

        // Récupérer l'ID de la compagnie à modifier
        $compagnie_id = $_GET['id'];

        // Requête SQL pour sélectionner les détails de la compagnie
        $sql = "SELECT * FROM compagnies_aeriennes WHERE id = $compagnie_id";
        $result = mysqli_query($conn, $sql);

        // Vérifier s'il y a des résultats
        if (mysqli_num_rows($result) > 0) {
            // Afficher les détails de la compagnie
            $row = mysqli_fetch_assoc($result);
        } else {
            echo "Aucune compagnie trouvée.";
            exit();
        }

        // Fermer la connexion
        mysqli_close($conn);
        ?>

        <form action="update_compagnie.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <label for="nom">Nom de la Compagnie:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required>

            <label for="logo">Logo de la Compagnie:</label>
            <input type="file" id="logo" name="logo">
            <p>Logo actuel : <img src="<?php echo $row['logo']; ?>" alt="Logo" style="width: 100px;"></p>

            <button type="submit">Mettre à jour Compagnie</button>
        </form>
    </div>

</body>

</html>