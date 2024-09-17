<?php
    session_start(); // Start session to access session variables
    
    //Check if user is not logged in, redirect to login page
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
            padding: 10px 40px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: small;        
        }
 
        .btn-display {
            cursor: pointer;
            background-color: #009785;
            color: white;
            padding: 10px 10px;
            border: none;
            border-radius: 5px;           
            text-decoration: none;
        }

        .btn-display:hover {
            background-color: #00584d;
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
            padding: 10px 26px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: small;
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
            padding: 10px 13px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            font-size: small;
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
    

    <?php include 'header.php'; ?>

    <div class="container">   
    <a href="ajout_categorie_parent.php" class='btn-add'><b>Ajouter une Catégorie parent</b></a>
            <h2 class="text-center">Liste des catégories parent</h2>
            
        
        <table>
            <thead>
                <tr>
                    <th>Nom du Catégorie</th>
                    <th style="width: 550px;">Description</th>
                    
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'db.php';

                // SQL query to select all Omra packages
                $sql_packages = "SELECT * FROM category_parent";
                $result_packages = mysqli_query($conn, $sql_packages);

                if (mysqli_num_rows($result_packages) > 0) {
                    while ($row_category_parent = mysqli_fetch_assoc($result_packages)) {
                        echo "<tr>";
                        echo "<td>" . $row_category_parent['nom'] . "</td>";
                        echo "<td>" . $row_category_parent['description'] . "</td>";

                        // SQL query to select formules for this package
                        $category_parent_id = $row_category_parent['id'];
                        

                        // Buttons for edit and delete package
                        echo "<td class='btn-group'>";
                        
                        echo "<div >";
                        echo "<button class='btn-edit' onclick=\"window.location.href='edit_categorie_parent.php?id=" . $category_parent_id . "'\">Éditer</button>";
                        echo "</div>";
                        echo "<br>";
                        echo "<div >";
                        echo "<button class='btn-delete' onclick=\"if(confirm('Êtes-vous sûr de vouloir supprimer ce package?')) { window.location.href='delete_categorie_parent.php?id=" . $category_parent_id . "'; }\">Supprimer</button>";
                        echo "</div>";
                        echo "<br>";
                        echo "<div >";
                        echo "<button class='btn-display' onclick=\"window.location.href='display_villes_by_category.php?category_parent_id=" . $category_parent_id . "'\">Villes de départ</button>";
                        echo "</div>";
                    }
                } else {
                    echo "<tr><td colspan='4'>Aucun Categorie Parent disponible pour le moment.</td></tr>";
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>

</body>

</html>