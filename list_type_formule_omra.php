<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Types de Formules Omra</title>
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
            right: 150px;
            top: 90px;            
            text-decoration: none;            
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
        <h2 class="text-center">Liste des Types de Formules Omra</h2>
        <a href="ajout_type_formule.php" class='btn-add'><b>Ajouter un type de Formule</b></a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nom du Type de Formule</th>
                    <th>Package Parent</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner tous les types de formules Omra avec le nom du package parent
                $sql_types_formules = "SELECT type_formule_omra.id, type_formule_omra.nom AS nom_formule, omra_packages.nom AS nom_package 
                                   FROM type_formule_omra 
                                   LEFT JOIN omra_packages ON type_formule_omra.formule_parent_id = omra_packages.id";

                // Exécuter la requête
                $result_types_formules = mysqli_query($conn, $sql_types_formules);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result_types_formules) > 0) {
                    // Afficher les types de formules Omra avec le nom du package parent
                    while ($row_type_formule = mysqli_fetch_assoc($result_types_formules)) {
                        echo "<tr>";
                        echo "<td>" . $row_type_formule['nom_formule'] . "</td>";
                        echo "<td>" . $row_type_formule['nom_package'] . "</td>";

                        // Boutons pour éditer et supprimer le type de formule Omra
                        echo "<td class='btn-group'>";
                        // Remplacez edit_type_formule.php et delete_type_formule.php par vos fichiers correspondants
                        echo "<button class='btn btn-edit' onclick=\"window.location.href='edit_type_formule.php?id=" . $row_type_formule['id'] . "'\">Éditer</button>";
                        echo "<a class='btn btn-delete' href='delete_type_formule.php?id=" . $row_type_formule['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce type de formule?')\">Supprimer</a>";
                        echo "</td>";

                        echo "</tr>"; // Fermeture de la ligne du tableau
                    }
                } else {
                    echo "<tr><td colspan='3'>Aucun type de formule Omra disponible pour le moment.</td></tr>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>