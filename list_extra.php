<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Extras</title>
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

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .btn-group {
            text-align: center;
        }

        .btn {
            padding: 8px 20px;
            margin: 0 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
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
        <h2 class="text-center">Liste des Extras</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom de l'Extra</th>
                    <th>Description</th>
                    <th>Prix</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner tous les extras
                $sql_extras = "SELECT * FROM extras";

                // Exécuter la requête
                $result_extras = mysqli_query($conn, $sql_extras);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result_extras) > 0) {
                    // Afficher les extras
                    while ($row_extra = mysqli_fetch_assoc($result_extras)) {
                        echo "<tr>";
                        echo "<td>" . $row_extra['nom'] . "</td>";
                        echo "<td>" . $row_extra['description'] . "</td>";
                        echo "<td>" . $row_extra['prix'] . "</td>";

                        // Boutons pour éditer et supprimer l'extra
                        echo "<td class='btn-group'>";
                        echo "<button class='btn btn-edit' onclick=\"window.location.href='edit_extra.php?id=" . $row_extra['id'] . "'\">Éditer</button>";
                        echo "<a class='btn btn-delete' href='delete_extra.php?id=" . $row_extra['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet extra?')\">Supprimer</a>";
                        echo "</td>";

                        echo "</tr>"; // Fermeture de la ligne du tableau
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun extra disponible pour le moment.</td></tr>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>