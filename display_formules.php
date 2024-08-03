<?php
    session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des villes avec Formules</title>
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
            width: 90%;
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

        .btn-edit {
            background-color: #4CAF50;            
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 15px;
        }

        .btn-edit:hover {
            background-color: #45a049;
        }

        .btn-delete {
            background-color: #f44336;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-delete:hover {
            background-color: #fa190b;
        }

        .btn-display {
            background-color: #009785;
            color: white;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }

        .btn-display:hover {
            background-color: #35875b;
        }
        

        .icon {
            font-size: 18px;
            margin-right: 5px;
        }

        .indicator {
            display: block;
            font-size: 14px;
            color: #666;
            margin-top: 5px;
        }

        .card.cardnew.col-md-3 {
            padding: 0px !important;
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
        

        .btn-dup {
            background-color: #f9c710;            
            color: black;
            padding: 5px 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 15px;
        }
        .btn-dup:hover {
            background-color: #eca527;
        }

        .active {
            color: #62d75e;
            /* float:right; */
            font-size: 20px;
        }

        .inactive {
            color: #f90600;
            /* float:right; */
            font-size: 20px;
        }

    </style>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <a href="ajoutformule.php" class='btn-add'><b>Ajouter une formule</b></a>
        <h2 class="text-center">Liste des Formules</h2>
        
        

        <table>
            <thead>
                <tr>
                    <th>Nom du Formule</th>
                    <th>Ville de départ</th>
                    <th>Date de départ</th>
                    <th>Date de retour</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                // SQL query to select formules along with related type_nom and package_nom
                $sql_formules = "SELECT formules.id, formules.date_depart, formules.date_retour, statut, created_at, type_formule_omra.nom AS type_nom, omra_packages.nom AS package_nom 
                                 FROM formules 
                                 JOIN type_formule_omra ON formules.type_id = type_formule_omra.id 
                                 JOIN omra_packages ON formules.package_id = omra_packages.id
                                 ORDER BY created_at DESC";
                $result_formules = mysqli_query($conn, $sql_formules);

                if (mysqli_num_rows($result_formules) > 0) {
                    while ($row_formule = mysqli_fetch_assoc($result_formules)) {
                        echo "<tr>";
                        echo "<td>" . $row_formule['type_nom'] . "</td>";
                        echo "<td>" . $row_formule['package_nom'] . "</td>";
                        $date_depart_formattee = date('d-m-Y', strtotime($row_formule['date_depart']));
                        echo "<td>" . $date_depart_formattee . "</td>";
                        $date_retour_formattee = date('d-m-Y', strtotime($row_formule['date_retour']));
                        echo "<td>" . $date_retour_formattee . "</td>";
                        
                        if($row_formule['statut'] == 'désactivé'){
                            echo "<td>" . '<span class="inactive">● </span>' . $row_formule['statut'].  "</td>";
                        }else{
                            echo "<td>". '<span class="active">● </span>' . $row_formule['statut'] . "</td>";
                        }

                        // Buttons for edit, delete, and duplicate formule
                        echo "<td class='btn-group'>";
                        echo "<a class='btn-edit' href='edit_formule.php?id=" . $row_formule['id'] . "'>Éditer</a>";
                        echo "<a class='btn-delete' href='delete_formule.php?id=" . $row_formule['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette formule?')\">Supprimer</a>";
                        echo "<a class='btn-dup' href='duplicate_formule.php?id=" . $row_formule['id'] . "'>Dupliquer</a>";
                        echo "<a class='btn-display' href='display_formule.php?id=" . $row_formule['id'] . "'>Afficher</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucune formule disponible pour le moment.</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
