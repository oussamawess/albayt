<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Aéroports</title>
    <link rel="stylesheet" href="">
    <!-- https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css -->
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

        /* th {
            background-color: #f2f2f2;
        }
        .table {
            margin-top: 20px;
        } */

        .btn-sm {
            margin: 0 2px;
        }

        .btn-group {
            text-align: center;
            height:30px;
        }

        .btn {
            padding: 8px 20px;
            margin: 5px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 8px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;            
        }

        .btn-delete:hover {
            background-color: #fa190b;
        }

        .btn-add {
            background-color: #2595ee;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;            
            float:right;
            text-decoration: none;
        }
        .btn-add:hover {
            background-color: #0b73f4;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
        }

        .btn-edit:hover {
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

    <div class="container mt-5">
    <a href="ajout_aeroport.php" class='btn-add'><b>Ajouter un Aéroport</b></a>
        <h2 class="text-center">Liste des Aéroports</h2>
        
        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Abréviation</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner toutes les villes de départ
                $sql = "SELECT * FROM airports";
                $result = mysqli_query($conn, $sql);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result) > 0) {
                    // Afficher les résultats
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["nom"] . "</td>";
                        echo "<td>" . $row["abrv"] . "</td>";
                        // echo "<td><a href='supprimer_ville_depart.php?id=" . $row["id"] . "' class='btn btn-danger btn-sm'>Supprimer</a></td>";
                        echo "<td class='btn-group' >";
                        echo "<a class='btn btn-edit' href='edit_aeroport.php?id=" . $row["id"] . "'>Editer</a>";
                        echo "<a class='btn btn-delete' href='delete_aeroport.php?id=" . $row["id"] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet Aeroport?')\">Supprimer</a>";
                        echo "</td>";
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