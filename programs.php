<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Programmes</title>
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
            text-decoration: none;   
        }

        .btn-add {
            background-color: #2595ee;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            position: absolute;
            right: 155px;
            top: 90px;            
            text-decoration: none;            
        }

        .btn-add:hover {
            background-color: #0b73f4;
        }
        .btn-edit:hover {
            background-color: #45a049;
        }
        .btn-delete:hover {
            background-color: #fa190b;
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
        <h2>Liste des Programmes</h2>
        <a href="add_program.php" class='btn-add'><b>Ajouter un Programme</b></a>
        <table>
            <thead>
                <tr>
                    <th>Nom de Programme</th>
                    <th>Description</th>
                    <th>Image</th>                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner tous les programmes
                $sql_programs = "SELECT * FROM programs";

                // Exécuter la requête
                $result_programs = mysqli_query($conn, $sql_programs);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result_programs) > 0) {
                    
                    // Afficher les programmes
                    while ($row_program = mysqli_fetch_assoc($result_programs)) {
                        $photo = $row_program['photo'];
                        echo "<tr>";
                        echo "<td>" . $row_program['nom'] . "</td>";
                        echo "<td>" . $row_program['description'] . "</td>";                                                                       
                        echo "<td> <img src='". $photo . "' alt='Image du package'style='max-width: 100px; max-height: 100px; border-radius:5px;'></td>";


                        // Boutons pour éditer et supprimer le programme
                        echo "<td class='btn-group'>";
                        echo "<button class='btn btn-edit' onclick=\"window.location.href='edit_program.php?id=" . $row_program['id'] . "'\">Éditer</button>";
                        echo "<a class='btn btn-delete' href='delete_program.php?id=" . $row_program['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce Programme?')\">Supprimer</a>";
                        echo "</td>";

                        echo "</tr>"; // Fermeture de la ligne du tableau
                    }
                } else {
                    echo "<tr><td colspan='7'>Aucun programme disponible pour le moment.</td></tr>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>