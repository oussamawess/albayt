<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Villes de Départ</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
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

        .table {
            margin-top: 20px;
        }

        .btn-sm {
            margin: 0 2px;
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

    <div class="container mt-5">
        <h2 class="text-center">Liste des Villes de Départ</h2>
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner toutes les villes de départ
                $sql = "SELECT * FROM ville_depart";
                $result = mysqli_query($conn, $sql);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result) > 0) {
                    // Afficher les résultats
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . ucfirst($row["statut"]) . "</td>";
                        echo "<td><a href='supprimer_ville_depart.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4' class='text-center'>Aucune ville de départ trouvée</td></tr>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>