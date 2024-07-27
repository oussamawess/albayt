<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un type de Formule Omra</title>
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
        input[type="file"],
        select {
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
</head>
<body>
    <?php
    session_start();
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }

    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Vérifier si tous les champs sont remplis
        if (isset($_POST['nom']) && isset($_POST['formule_parent'])) {
            // Inclure le fichier de connexion à la base de données
            include 'db.php';

            // Récupérer les données du formulaire
            $nom = $_POST['nom'];
            $formule_parent = $_POST['formule_parent'];

            // Requête SQL pour insérer le type de formule Omra dans la base de données
            $sql = "INSERT INTO type_formule_omra (nom, formule_parent_id) VALUES ('$nom', '$formule_parent')";

            // Exécuter la requête
            if (mysqli_query($conn, $sql)) {
                // Redirect to list_type_formule_omra.php after successful insertion
                header("Location: list_type_formule_omra.php");
                exit;
            } else {
                $error_message = "Erreur lors de l'ajout du type de formule Omra. Veuillez réessayer.";
            }

            // Fermer la connexion à la base de données
            mysqli_close($conn);
        } else {
            $error_message = "Tous les champs sont obligatoires. Veuillez remplir tous les champs.";
        }
    }
    ?>
    
    <?php include 'header.php'; ?>
    
    <div class="container">
        <h2>Ajouter une categorie</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
            <label for="nom">Categorie de la Formule:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="formule_parent">Formule Parent:</label>
            <select id="formule_parent" name="formule_parent" required>
                <option value="">Sélectionner package parent</option>
                <!-- Code PHP pour afficher les options de formule parent -->
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner tous les packages Omra
                $sql = "SELECT * FROM omra_packages";
                $result = mysqli_query($conn, $sql);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result) > 0) {
                    // Parcourir les résultats et afficher les options de formule parent
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<option value="' . $row['id'] . '">' . $row['nom'] . '</option>';
                    }
                }
                ?>
                <!-- Fin du code PHP pour afficher les options de formule parent -->
            </select>

            <button type="submit">Ajouter categorie</button>
        </form>
    </div>
</body>
</html>
