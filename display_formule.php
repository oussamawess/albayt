<?php
include 'db.php';

if (!isset($_GET['id'])) {
    die('Formule ID not specified.');
}

$formule_id = intval($_GET['id']);

// Fetch formule details
$sql_formule = "
    SELECT f.*, p.nom AS package_name, t.nom AS type_name
    FROM formules f
    LEFT JOIN omra_packages p ON f.package_id = p.id
    LEFT JOIN type_formule_omra t ON f.type_id = t.id
    WHERE f.id = $formule_id
";
$result_formule = mysqli_query($conn, $sql_formule);
$formule = mysqli_fetch_assoc($result_formule);

if (!$formule) {
    die('Formule not found.');
}

// Fetch related programs
$programs = json_decode($formule['programs_id'], true);
$program_data = [];
if (!empty($programs)) {
    $program_ids = implode(',', $programs);
    $sql_programs = "SELECT nom, description FROM programs WHERE id IN ($program_ids)";
    $result_programs = mysqli_query($conn, $sql_programs);
    while ($row = mysqli_fetch_assoc($result_programs)) {
        $program_data[] = $row;
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

        h3{
            text-align: center;
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>
    <div class="container">
        <div class="buttons">
            <button class="button add" onclick="window.location.href='ajoutformule.php'">Ajouter</button>
            <button class="button edit" onclick="window.location.href='edit_formule.php?id=<?php echo $formule_id; ?>'">Editer</button>
            <button class="button delete" onclick="deleteFormule(<?php echo $formule_id; ?>)">Supprimer</button>
            <button class="button duplicate" onclick="duplicateFormule(<?php echo $formule_id; ?>)">Dupliquer</button>
            <button class="button print" onclick="printFormule()">Imprimer</button>
        </div>
        <div class="content">
            <h1 style="text-align:center;">Détails</h1>
            <hr>
            <div class="section">
                <h3>Informations générales</h3>
                <table>
                    <tr>
                        <th>Ville de départ</th>
                        <th>Catégorie</th>
                        <th>Date de Départ</th>
                        <th>Statut</th>
                        <th>Durée de séjour</th>
                    </tr>
                    <tr>
                        <td><?php echo $formule['package_name']; ?></td>
                        <td><?php echo $formule['type_name']; ?></td>
                        <td><?php echo $formule['date_depart']; ?></td>
                        <td><?php echo $formule['statut']; ?></td>
                        <td><?php echo $formule['duree_sejour']; ?></td>
                    </tr>
                </table>
            </div>



            <div class="section">
                <h3>Vols</h3>
                <table>
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
                    <?php while ($row = mysqli_fetch_assoc($result_vols)) : ?>
                        <tr>
                            <td><?php echo $row['num_vol']; ?></td>
                            <td><?php echo $row['compagnie_aerienne']; ?></td>
                            <td><?php echo $row['ville_depart_id']; ?></td>
                            <td><?php echo $row['airport_depart']; ?></td>
                            <td><?php echo $row['heure_depart']; ?></td>
                            <td><?php echo $row['destination']; ?></td>
                            <td><?php echo $row['airport_destination']; ?></td>
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
                    <?php while ($row = mysqli_fetch_assoc($result_hebergements)) : ?>
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
                <table>
                    <tr>
                        <th>Nom du Programme</th>
                        <th>Description</th>
                    </tr>
                    <?php foreach ($program_data as $program) : ?>
                        <tr>
                            <td><?php echo $program['nom']; ?></td>
                            <td><?php echo $program['description']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </table>
            </div>

        </div>
    </div>

    <script>
        function deleteFormule(id) {
            if (confirm('Are you sure you want to delete this formule?')) {
                window.location.href = 'delete_formule.php?id=' + id;
            }
        }

        function duplicateFormule(id) {
            if (confirm('Are you sure you want to duplicate this formule?')) {
                window.location.href = 'duplicate_formule.php?id=' + id;
            }
        }

        function printFormule() {
            window.print();
        }
    </script>
</body>

</html>