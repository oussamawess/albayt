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

if (!isset($_GET['id'])) {
    die('Formule ID not specified.');
}

$formule_id = intval($_GET['id']);

// Fetch formule details
$sql_formule = "
    SELECT f.*, 
           p.nom AS package_name, 
           t.nom AS type_name, 
           c.nom AS category_parent_name
    FROM formules f
    LEFT JOIN omra_packages p ON f.package_id = p.id
    LEFT JOIN type_formule_omra t ON f.type_id = t.id
    LEFT JOIN category_parent c ON p.category_parent_id = c.id
    WHERE f.id = $formule_id
";

$result_formule = mysqli_query($conn, $sql_formule);
$formule = mysqli_fetch_assoc($result_formule);

if (!$formule) {
    die('Formule not found.');
}


// Fetch related programs
$programs = json_decode($formule['programs_id'], true);
$programOrder = json_decode($formule['program_order'], true);
$programData = [];

if (!empty($programs)) {
    $programIds = implode(',', $programs);
    $sqlPrograms = "SELECT id, nom, description FROM programs WHERE id IN ($programIds)";
    $resultPrograms = mysqli_query($conn, $sqlPrograms);
    while ($row = mysqli_fetch_assoc($resultPrograms)) {
        // Check if program has associated details in program_details table
        $sqlProgramDetails = "SELECT date, duration FROM program_details WHERE formule_id = ? AND program_id = ?";
        $stmt = mysqli_prepare($conn, $sqlProgramDetails);
        mysqli_stmt_bind_param($stmt, 'ii', $formule['id'], $row['id']);
        mysqli_stmt_execute($stmt);
        $resultDetails = mysqli_stmt_get_result($stmt);

        if ($details = mysqli_fetch_assoc($resultDetails)) {
            // Program found in program_details, add date and duration
            $row['date'] = $details['date'];
            $row['duration'] = $details['duration'];
        } else {
            // Program not found in program_details, no date and duration
            $row['date'] = null;
            $row['duration'] = null;
        }

        $programData[$row['id']] = $row;
    }

    // Sort the programs based on the saved order
    $orderedProgramData = [];
    foreach ($programOrder as $programId) {
        if (isset($programData[$programId])) {
            $orderedProgramData[] = $programData[$programId];
        }
    }
}



// Fetch hebergements
$sql_hebergements = "
    SELECT h.*, ht.nom AS hotel_name, ht.etoiles, ht.ville
    FROM hebergements h
    LEFT JOIN hotels ht ON h.hotel_id = ht.id
    WHERE h.formule_id = $formule_id
";
$result_hebergements = mysqli_query($conn, $sql_hebergements);

// Fetch vols
$sql_vols = "
    SELECT v.*, ca.nom AS compagnie_aerienne
    FROM vols v
    LEFT JOIN compagnies_aeriennes ca ON v.compagnie_aerienne_id = ca.id
    WHERE v.formule_id = $formule_id
";
$result_vols = mysqli_query($conn, $sql_vols);


// SQL query to fetch the data
$sql_vols = "
    SELECT 
        v.*,
        ca.nom AS compagnie_aerienne,
        vd_depart.nom AS ville_depart_nom,
        vd_destination.nom AS ville_destination_nom,
        ad_depart.nom AS airport_depart_nom,
        ad_depart.abrv AS airport_depart_abrv,
        ad_destination.nom AS airport_destination_nom,
        ad_destination.abrv AS airport_destination_abrv
    FROM 
        vols v
    LEFT JOIN 
        compagnies_aeriennes ca ON v.compagnie_aerienne_id = ca.id
    LEFT JOIN 
        ville_depart vd_depart ON v.ville_depart_id = vd_depart.id
    LEFT JOIN 
        ville_depart vd_destination ON v.ville_destination_id = vd_destination.id
    LEFT JOIN 
        airports ad_depart ON v.airport_depart_id = ad_depart.id
    LEFT JOIN 
        airports ad_destination ON v.airport_destination_id = ad_destination.id
    WHERE 
        v.formule_id = $formule_id
";

$result_vols = mysqli_query($conn, $sql_vols);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Display Formule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 90%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .content {
            margin: 20px;
        }

        .section {
            margin-bottom: 20px;
        }

        .section h3 {
            margin-bottom: 10px;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        table,
        th,
        td {
            border: 1px solid #ddd;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-bottom: 20px;
        }

        .button {
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            color: #fff;
        }

        .button.edit {
            background-color: #4CAF50;
        }

        .button.edit:hover {
            background-color: #45a049;
        }

        .button.add {
            background-color: #2196F3;
        }

        .button.add:hover {
            background-color: #0b73f4;
        }

        .button.delete {
            background-color: #f44336;
        }

        .button.delete:hover {
            background-color: #fa190b;
        }

        .button.duplicate {
            background-color: #FFC107;
            color: black;
        }

        .button.duplicate:hover {
            background-color: #eca527;
        }

        .button.print {
            background-color: #9C27B0;
        }

        .button.print:hover {
            background-color: #751e84;
        }

        h3 {
            text-align: center;
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
        <div class="buttons">
            <button class="button add" onclick="window.location.href='ajoutformule.php'">Ajouter</button>
            <button class="button edit"
                onclick="window.location.href='edit_formule.php?id=<?php echo $formule_id; ?>'">Editer</button>
            <button class="button delete" onclick="deleteFormule(<?php echo $formule_id; ?>)">Supprimer</button>
            <button class="button duplicate" onclick="duplicateFormule(<?php echo $formule_id; ?>)">Dupliquer</button>
            <button class="button print" onclick="printFormule()">Imprimer</button>
        </div>
        <div class="content">
            <h1 style="text-align:center;">Détails</h1>
            <div style="display: flex; justify-content: space-around;">
                <h3><?php echo "ID Formule: " . $formule_id ?></h3>
                <h3><?php echo "Catégorie parent: " . $formule['category_parent_name']; ?></h3>
            </div>
            <hr>
            <div class="section">
                <h3>Informations générales</h3>
                <table>
                    <tr>
                        <th>Ville de départ</th>
                        <th>Catégorie</th>
                        <th>Date de Départ</th>
                        <th>Date de Retour</th>
                        <th>Statut</th>
                        <th>Durée de séjour</th>
                    </tr>
                    <tr>
                        <td><?php echo $formule['package_name']; ?></td>
                        <td><?php echo $formule['type_name']; ?></td>
                        <td><?php echo $formule['date_depart']; ?></td>
                        <td><?php echo $formule['date_retour']; ?></td>
                        <?php
                        if ($formule['statut'] === 'activé') {
                            echo "<td><span class='active'>● </span>En vente</td>";
                        } else {
                            echo "<td><span class='inactive'>● </span>Épuisé</td>";
                        }
                        ?>
                        <td><?php echo $formule['duree_sejour']; ?></td>
                    </tr>
                </table>
            </div>



            <div class="section">
                <h3>Vols</h3>
                <table>
                    <tr>
                        <th colspan="8"
                            style="text-align:center; background-color:<?php echo ($formule['statut_vol'] == 'CONFIRMÉ') ? '#91d44a' : '#fac611' ?>;">
                            <?php echo $formule['statut_vol']; ?>
                        </th>
                    </tr>
                    <tr>
                        <th>N° Vol</th>
                        <th>Compagnie Aérienne</th>
                        <th>Départ</th>
                        <th>Aéroport de Départ</th>
                        <th>Heure & Date de Départ</th>
                        <th>Destination</th>
                        <th>Aéroport de Destination</th>
                        <th>Heure & Date d'Arrivée</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result_vols)): ?>
                        <tr>
                            <td><?php echo $row['num_vol']; ?></td>
                            <td><?php echo $row['compagnie_aerienne']; ?></td>
                            <td><?php echo $row['ville_depart_nom']; ?></td>
                            <td><?php echo $row['airport_depart_nom'] . " - " . $row['airport_depart_abrv']; ?></td>
                            <td><?php echo $row['heure_depart']; ?></td>
                            <td><?php echo $row['ville_destination_nom']; ?></td>
                            <td><?php echo $row['airport_destination_nom'] . " - " . $row['airport_destination_abrv']; ?>
                            </td>
                            <td><?php echo $row['heure_arrivee']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <div class="section">
                <h3>Hebergements</h3>
                <table>
                    <tr>
                        <th>Hôtel</th>
                        <th>Etoiles</th>
                        <th>City</th>
                        <th>Type de Pension</th>
                        <th>Date Checkin</th>
                        <th>Date Checkout</th>
                        <th>Nombre de nuitées</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result_hebergements)): ?>
                        <tr>
                            <td><?php echo $row['hotel_name']; ?></td>
                            <td><?php echo $row['etoiles']; ?></td>
                            <td><?php echo $row['ville']; ?></td>
                            <td><?php echo $row['type_pension']; ?></td>
                            <td><?php echo $row['date_checkin']; ?></td>
                            <td><?php echo $row['date_checkout']; ?></td>
                            <td><?php echo $row['nombre_nuit']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </table>
            </div>

            <div class="section">
                <h3>Prix Hors Promo</h3>
                <table>
                    <tr>
                        <th>Chambre quadruple</th>
                        <th>Chambre triple</th>
                        <th>Chambre double</th>
                        <th>Chambre single</th>
                        <th>Réduction enfant</th>
                        <th>Tarif bébé</th>
                    </tr>
                    <tr>
                        <td><?php echo $formule['prix_chambre_quadruple']; ?></td>
                        <td><?php echo $formule['prix_chambre_triple']; ?></td>
                        <td><?php echo $formule['prix_chambre_double']; ?></td>
                        <td><?php echo $formule['prix_chambre_single']; ?></td>
                        <td><?php echo $formule['child_discount']; ?></td>
                        <td><?php echo $formule['prix_bebe']; ?></td>
                    </tr>
                </table>
            </div>

            <div class="section">
                <h3>Prix Promo</h3>
                <table>
                    <tr>
                        <th>Chambre quadruple</th>
                        <th>Chambre triple</th>
                        <th>Chambre double</th>
                        <th>Chambre single</th>
                    </tr>
                    <tr>
                        <td><?php echo $formule['prix_chambre_quadruple_promo']; ?></td>
                        <td><?php echo $formule['prix_chambre_triple_promo']; ?></td>
                        <td><?php echo $formule['prix_chambre_double_promo']; ?></td>
                        <td><?php echo $formule['prix_chambre_single_promo']; ?></td>
                    </tr>
                </table>
            </div>


            <div class="section">
                <h3>Programmes</h3>
                <?php if (!empty($orderedProgramData)): ?>
                    <table>
                        <tr>
                            <th>Nom du Programme</th>
                            <th>Description</th>
                            <th>Date</th>
                            <th>Duration</th>
                        </tr>
                        <?php foreach ($orderedProgramData as $program): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($program['nom']); ?></td>
                                <td><?php echo htmlspecialchars($program['description']); ?></td>

                                <?php if ($program['date'] && $program['duration']): ?>
                                    <td><?php echo htmlspecialchars($program['date']); ?></td>
                                    <td><?php echo htmlspecialchars($program['duration']); ?></td>
                                <?php elseif (empty($program['duration'])): ?>
                                    <td><?php echo htmlspecialchars($program['date']); ?></td>
                                    <td>-</td> <!-- If no date or duration, show a placeholder -->
                                <?php else: ?>
                                    <td>-</td> <!-- If no date or duration, show a placeholder -->
                                    <td>-</td> <!-- If no date or duration, show a placeholder -->
                                <?php endif; ?>

                            </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else: ?>
                    <p>Aucun programme à afficher.</p>
                <?php endif; ?>
            </div>





            <div class="section">
                <h3>Description</h3>
                <table>
                    <tr>
                        <th>Raison</th>
                    </tr>
                    <tr>
                        <td><?php echo $formule['description']; ?></td>
                    </tr>
                </table>
            </div>

            <?php
            // Check if s1t is empty and s1d equals "<p><br></p>"
            if (!empty($formule['s1t']) && $formule['s1d'] != '<p><br></p>') {
            ?>
                <div class="section">
                    <h3>Section 1</h3>
                    <table>
                        <tr>
                            <th><?php echo $formule['s1t']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $formule['s1d']; ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php
            // Check if s1t is empty and s1d equals "<p><br></p>"
            if (!empty($formule['s2t']) && $formule['s2d'] != '<p><br></p>') {
            ?>
                <div class="section">
                    <h3>Section 2</h3>
                    <table>
                        <tr>
                            <th><?php echo $formule['s2t']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $formule['s2d']; ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php
            // Check if s1t is empty and s1d equals "<p><br></p>"
            if (!empty($formule['s3t']) && $formule['s3d'] != '<p><br></p>') {
            ?>
                <div class="section">
                    <h3>Section 3</h3>
                    <table>
                        <tr>
                            <th><?php echo $formule['s3t']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $formule['s3d']; ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php
            // Check if s1t is empty and s1d equals "<p><br></p>"
            if (!empty($formule['s4t']) && $formule['s4d'] != '<p><br></p>') {
            ?>
                <div class="section">
                    <h3>Section 4</h3>
                    <table>
                        <tr>
                            <th><?php echo $formule['s4t']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $formule['s4d']; ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php
            // Check if s1t is empty and s1d equals "<p><br></p>"
            if (!empty($formule['s5t']) && $formule['s5d'] != '<p><br></p>') {
            ?>
                <div class="section">
                    <h3>Section 5</h3>
                    <table>
                        <tr>
                            <th><?php echo $formule['s5t']; ?></th>
                        </tr>
                        <tr>
                            <td><?php echo $formule['s5d']; ?></td>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php
            if (!empty($formule['uploaded_file'])) {
            ?>
                <div class="section">
                    <h3>Fichier 1</h3>
                    <table>
                        <tr>
                            <?php
                            $existingFiles = $formule['uploaded_file'];

                            // Get the filename with the unique ID
                            $filenameWithId = basename($existingFiles);

                            // Split the filename at the underscore
                            $parts = explode('_', $filenameWithId);

                            // Remove the first part (the unique ID)
                            array_shift($parts);

                            // Join the remaining parts back together
                            $cleanFilename = implode('_', $parts);

                            ?>
                            <th><?php echo $cleanFilename; ?></th>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <?php
            if (!empty($formule['image_formule'])) {
            ?>
                <div class="section">
                    <h3>Fichier 2</h3>
                    <table>
                        <tr>
                            <?php
                            $existingFiles = $formule['image_formule'];

                            // Get the filename with the unique ID
                            $filenameWithId = basename($existingFiles);

                            // Split the filename at the underscore
                            $parts = explode('_', $filenameWithId);

                            // Remove the first part (the unique ID)
                            array_shift($parts);

                            // Join the remaining parts back together
                            $cleanFilename = implode('_', $parts);

                            ?>
                            <th><?php echo $cleanFilename; ?></th>
                        </tr>
                    </table>
                </div>
            <?php
            }
            ?>

            <!-- <div class="section">
                <h3>Fichier 2</h3>
                <table style="text-align: center;">
                    <tr>
                        <th style="text-align: center;">
                            Image actuel
                        </th>
                    </tr>
                    <tr>
                        <td style="text-align: center;">
                            <img src="<!?php echo $formule['image_formule']; ?>" alt="image_formule"
                                style="width:300px; "></p>
                        </td>
                    </tr>
                </table>
            </div> -->

        </div>
    </div>

    <script>
        function deleteFormule(id) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cette formule ?')) {
                window.location.href = 'delete_formule.php?id=' + id;
                header('location:display_formules.php')
            }
        }

        function duplicateFormule(id) {
            if (confirm('Êtes-vous sûr de vouloir dupliquer cette formule ?')) {
                window.location.href = 'duplicate_formule.php?id=' + id;
            }
        }

        function printFormule() {
            window.print();
        }
    </script>
</body>

</html>