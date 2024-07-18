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

        .btn-add {
            background-color: #2595ee;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            /*position: absolute;*/ 
            float:right;
            /* right: 75px; */
            /* margin-bottom : 20px;*/
            text-decoration: none;            
        }
        

        .btn-delete {
            background-color: #f44336;
            color: white;
            text-decoration: none;
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

        .btn-dup {
            background-color: #f9c710;            
            color: black;
            padding: 5px 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 15px;
        }
        .btn-dup:hover {
            background-color: #eca527;
        }

        .btn-dup-pack {
            background-color: #10ced7;            
            color: black;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            margin: 0 15px;
        }

        .btn-dup-pack:hover {
            background-color: #00abc0;
            color: white;
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
</head>

<body>
    <?php
    // session_start(); // Start session to access session variables
    
    // Check if user is not logged in, redirect to login page
    // if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    //     header("Location: login.php");
    //     exit;
    // }


    ?>

    <?php include 'header.php'; ?>

    <div class="container">   
    <a href="ajoutomrapackage.php" class='btn-add'><b>Ajouter une Ville</b></a>
            <h2 class="text-center">Liste des villes avec Formules</h2>
            
        
        <table>
            <thead>
                <tr>
                    <th>Nom du Ville</th>
                    <th style="width: 550px;">Description</th>
                    <th>Formules disponibles</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                // SQL query to select all Omra packages
                $sql_packages = "SELECT * FROM omra_packages";
                $result_packages = mysqli_query($conn, $sql_packages);

                if (mysqli_num_rows($result_packages) > 0) {
                    while ($row_package = mysqli_fetch_assoc($result_packages)) {
                        echo "<tr>";
                        echo "<td>" . $row_package['nom'] . "</td>";
                        echo "<td>" . $row_package['description'] . "</td>";

                        // SQL query to select formules for this package
                        $package_id = $row_package['id'];
                        $sql_formules = "SELECT formules.*, type_formule_omra.nom as type_nom 
                                     FROM formules 
                                     JOIN type_formule_omra ON formules.type_id = type_formule_omra.id 
                                     WHERE package_id = $package_id";
                        $result_formules = mysqli_query($conn, $sql_formules);

                        if (mysqli_num_rows($result_formules) > 0) {
                            echo "<td>";
                            while ($row_formule = mysqli_fetch_assoc($result_formules)) {
                                echo "<span class='icon'>&#128393;</span><a href='edit_formule.php?id=" . $row_formule['id'] . "'>" . $row_formule['type_nom'] . "</a>"; // Use type_nom instead of nom                            
                                echo "<span class='icon'>&#128465;</span><a href='delete_formule.php?id=" . $row_formule['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cette formule?')\">Supprimer</a>";
                                

                                if (!empty($row_formule['date_depart'])) {
                                    $date_depart_formattee = date('d-m-Y', strtotime($row_formule['date_depart']));
                                    echo "<br><span class='indicator'>Date de départ: " . $date_depart_formattee ;
                                    echo "<a class='btn-dup' href='duplicate_formule.php?id=" . $row_formule['id'] . "'><b>Dupliquer</b></a></span>";
                                    // echo "<a class='btn-dup' href='duplicate_formule.php?id=" . $row_formule['id'] . "'>Dupliquer</a>";
                                }
                                
                                echo "<br>"; // Add a line break after each formule
                                
                            }
                            
                            echo "</td>";
                        } else {
                            echo "<td>Aucune formule disponible pour ce package.</td>";
                        }

                        // Buttons for edit and delete package
                        echo "<td class='btn-group'>";
                        echo "<div style='margin-top:20px; margin-bottom:10px;'>";
                        echo "<button class='btn btn-edit' onclick=\"window.location.href='edit_package.php?id=" . $package_id . "'\">Éditer</button>";
                        echo "</div>";
                        echo "<a class='btn btn-delete' href='delete_package.php?id=" . $package_id . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer ce package?')\">Supprimer</a>";
                        echo "<br>";
                        echo "<div style='margin-top:20px; margin-bottom:20px;'>";
                        echo "<a class='btn-dup-pack' href='duplicate_package.php?id=" . $package_id . "'\"><b>Dupliquer Pack</b></a>";
                        echo "</div>";
                        // echo "<div style='margin-top:20px;'>";
                        // echo "<form action='duplicate_package.php' method='POST'>";
                        // echo "<input type='hidden' name='package_id' value='" . $package_id . "'>";
                        // echo "<button type='submit' class='btn-dup-pack'><b>Dupliquer Pack</b></button>";
                        // echo "</form>";
                        // echo "</div>";
                        // echo "</td>";
                        // echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun package Omra disponible pour le moment.</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>