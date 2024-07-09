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
                echo "<div class='container'><h2>Le type de formule Omra a été ajouté avec succès!</h2></div>";
            } else {
                echo "<div class='container'><h2>Erreur lors de l'ajout du type de formule Omra. Veuillez réessayer.</h2></div>";
            }

            // Fermer la connexion à la base de données
            mysqli_close($conn);
        } else {
            echo "<div class='container'><h2>Tous les champs sont obligatoires. Veuillez remplir tous les champs.</h2></div>";
        }
    }
    ?>

    <div class="container">
        <h2>Ajouter un type de Formule Omra</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST"
            enctype="multipart/form-data">
            <label for="nom">Nom de la Formule:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="formule_parent">Formule Parent:</label>
            <select id="formule_parent" name="formule_parent">
                <option value="">Sélectionner package parent</option>
                <!-- Code PHP pour afficher les options de formule parent -->
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner tous les packages Omra
                $sql = "SELECT * FROM omra_packages";

                // Exécuter la requête
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

            <button type="submit">Ajouter Formule</button>
        </form>
    </div>

</body>

</html>