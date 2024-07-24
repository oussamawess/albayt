<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier un type de Formule Omra</title>
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
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }


    ?>
    <?php
    include 'db.php';

    // Check if type_formule_id is provided
    if (!isset($_GET['id'])) {
        echo "<div class='container'><h2>Erreur: ID du type de formule non fourni.</h2></div>";
        exit;
    }

    $typeFormuleId = $_GET['id'];

    // Fetch existing data
    $sql = "SELECT * FROM type_formule_omra WHERE id = $typeFormuleId";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $existingNom = $row['nom'];
        $existingFormuleParentId = $row['formule_parent_id'];
    } else {
        echo "<div class='container'><h2>Type de formule non trouvé.</h2></div>";
        exit;
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // ... (Your existing form submission code with input sanitization and validation) ...
        $nom = $_POST['nom'] ?? '';
        $formule_parent = $_POST['formule_parent'] ?? '';
    
        // Update the type de formule
        $sql = "UPDATE type_formule_omra SET 
            nom = '$nom', 
            formule_parent_id = '$formule_parent'
            WHERE id = $typeFormuleId";

        if (mysqli_query($conn, $sql)) {
            echo "<div class='container'><h2>Le type de formule Omra a étémis à jour avec succès!</h2></div>";
            header("Location: list_type_formule_omra.php"); // Refresh the page to show updated data
            exit;
        } else {
            echo "<div class='container'><h2>Erreur lors de la mise à jour du type de formule Omra. Veuillez réessayer.</h2></div>";
        }
    }
    ?>
<?php include 'header.php'; ?>
    <div class="container">
        <h2>Modifier la Catégorie</h2>
        <form action="" method="POST">
            <label for="nom">Nom de la Formule:</label>
            <input type="text" id="nom" name="nom" value="<?php echo $existingNom; ?>" required>

            <label for="formule_parent">Ville:</label>
            <select id="formule_parent" name="formule_parent">
                <option value="">Sélectionner une ville</option>
                <?php
                // Fetch and display package options from the database
                $sql = "SELECT * FROM omra_packages";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    $selected = ($row['id'] == $existingFormuleParentId) ? 'selected' : '';
                    echo '<option value="' . $row['id'] . '" ' . $selected . '>' . $row['nom'] . '</option>';
                }
                ?>
            </select>

            <button type="submit">Mettre à jour la catégorie</button>
        </form>
    </div>

</body>

</html>