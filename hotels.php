<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Hôtels</title>
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
            padding-bottom: 15px;
        }

        .btn {
            padding: 8px 20px;
            margin: 0px 0px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .btn-edit {
            background-color: #4CAF50;
            color: white;
            margin-bottom: 15px;
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
            float:right;
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
      
    <?php
    if (isset($_GET['error']) && $_GET['error'] == 'hotel_in_use') {
        echo "<p id='error-message' style='text-align: center; color: #721c24; background-color: #f8d7da; border: 1px solid #f5c6cb;
        padding:10px; transition:  all 0.2s ease-in-out;'><b>
        Cet hôtel est utilisé dans des formules et ne peut pas être supprimé.</b></p>";
    }
    ?>

        <a href="ajouthotel.php" class='btn-add'><b>Ajouter un Hôtel</b></a>
        <h2>Liste des Hôtels</h2>        
        <table>
            <thead>
                <tr>
                    <th>Nom de l'Hôtel</th>
                    <th>Étoiles</th>
                    <th>Ville</th>
                    <th>Détails</th>
                    <th>Monuments à Proximité</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Inclure le fichier de connexion à la base de données
                include 'db.php';

                // Requête SQL pour sélectionner tous les hôtels avec le nom de la ville
                $sql_hotels = "SELECT hotels.*, ville_depart.nom AS ville_nom 
                               FROM hotels 
                               JOIN ville_depart ON hotels.ville = ville_depart.id";

                // Exécuter la requête
                $result_hotels = mysqli_query($conn, $sql_hotels);

                // Vérifier s'il y a des résultats
                if (mysqli_num_rows($result_hotels) > 0) {
                    // Afficher les hôtels
                    while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                        echo "<tr>";
                        echo "<td>" . $row_hotel['nom'] . "</td>";
                        echo "<td>" . $row_hotel['etoiles'] . "</td>";
                        echo "<td>" . $row_hotel['ville_nom'] . "</td>"; // Use the city name (nom)
                        echo "<td>" . $row_hotel['details'] . "</td>";
                        echo "<td>" . $row_hotel['monument'] . "</td>";

                        // Boutons pour éditer et supprimer l'hôtel
                        echo "<td class='btn-group'>";
                        echo "<button class='btn btn-edit' onclick=\"window.location.href='edit_hotel.php?id=" . $row_hotel['id'] . "'\">Éditer</button>";
                        echo "<a class='btn btn-delete' href='delete_hotel.php?id=" . $row_hotel['id'] . "' onclick=\"return confirm('Êtes-vous sûr de vouloir supprimer cet hôtel?')\">Supprimer</a>";
                        echo "</td>";

                        echo "</tr>"; // Fermeture de la ligne du tableau
                    }
                } else {
                    echo "<tr><td colspan='7'>Aucun hôtel disponible pour le moment.</td></tr>";
                }

                // Fermer la connexion à la base de données
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </div>
    <script>
        // Hide the error message after 5 seconds
        setTimeout(function() {
            var errorMessage = document.getElementById('error-message');
            if (errorMessage) {
                errorMessage.style.display = 'none';
            }
        }, 5000);
    </script>
</body>


</html>