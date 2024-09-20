<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Hôtel</title>
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
        <h2>Ajouter un Hôtel</h2>
        <form action="submit_hotel.php" method="POST" enctype="multipart/form-data">
            <label for="nom">Nom de l'Hôtel:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="etoiles">Nombre d'Étoiles:</label>
            <input type="number" id="etoiles" name="etoiles" min="1" max="5" required>

            <!-- <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" required> -->
            <div class="input-group">
                <label for="ville_depart">Ville:</label>
                <select id="ville_depart" name="ville_depart" class="half-width-input" required>
                    <option value="">Sélectionnez une Ville</option>
                    <?php
                    include 'db.php';
                    $sql_villes_depart = "SELECT * FROM ville_depart";
                    $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                    if (mysqli_num_rows($result_villes_depart) > 0) {
                        while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                            echo "<option value='" . $row_ville_depart['id'] . "'>" . $row_ville_depart['nom'] . "</option>";
                        }
                    } else {
                        echo "<option value='' disabled>Aucune ville de départ disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                </select>
            </div>

            <!-- <label for="pension">Type de Pension:</label>
            <select id="pension" name="pension" required>
                <option value="">Sélectionnez le type de pension</option>
                <option value="Pension Complète">Pension Complète</option>
                <option value="Demi-pension">Demi-pension</option>
                <option value="Sans pension">Sans pension</option>
            </select> -->

            <label for="details">Détails:</label>
            <textarea id="details" name="details" rows="4" required></textarea>

            <label for="monument">Distance d'un Monument:</label>
            <input type="text" id="monument" name="monument" required>

            <label for="gallery">Galerie d'Images:</label>
            <input type="file" id="gallery" name="gallery[]" accept="image/*" multiple required>

            <button type="submit">Ajouter Hôtel</button>
        </form>
    </div>

</body>

</html>