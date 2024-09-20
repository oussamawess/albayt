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
    <title>Modifier une Formule</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* ... (All your existing CSS styles) ... */
    </style>
    <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script> -->

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- for programs -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- End for programs -->

    <style>
        /* text aditor style  */
        .price-inputs {
            font-family: Arial, sans-serif;
        }

        /* Custom styles for the editor */
        .editor-container {
            border: 1px solid #ddd;
            border-radius: 4px;
            overflow: hidden;
            margin-top: 10px;
            width: 100%;
            /* Full width */
        }

        .ql-toolbar {
            border-bottom: 1px solid #ddd;
        }

        .ql-container {
            height: 300px;
            /* Adjust height as needed */
        }


        /* text aditor style  */

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

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        input[type="text"],
        input[type="number"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }

        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .input-inline {
            width: calc(25% - 10px);
            display: inline-block;
            margin-right: 10px;
            vertical-align: top;
            /* alignement vertical */
        }

        .price-inputs {
            margin-bottom: 15px;
        }

        .price-inputs {
            border: 1px solid #ddd;
            /* Add a subtle border */
            padding: 20px;
            /* Add padding for spacing */
            border-radius: 8px;
            /* Round the corners slightly */
        }

        .price-inputs h3 {
            /* Style the title (h3) */
            text-align: center;
            margin-bottom: 15px;
            color: #333;
            /* Darker text color */
        }

        .price-inputs br {
            /* Remove the <br> tag (unnecessary with flexbox) */
            display: none;
        }

        .price-inputs label {
            display: flex;
            align-items: center;
            justify-content: space-between;
            /* Align label text to the left, input to the right */
            width: 100%;
            margin-bottom: 8px;
            /* Add space between label and input */
        }

        .price-input {
            width: 60%;
            /* Adjust input width as needed */
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* ... (your existing CSS) ... */

        .half-width-inputs {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .input-group {
            /* New class to group label and input */
            flex: 1;
            min-width: 150px;
            /* Ensure minimum width for smaller screens */
        }

        .half-width-input {
            width: 100%;
            /* Input takes full width of its container */
            box-sizing: border-box;
        }

        /* ... (Your existing CSS) ... */

        .toggle-button {
            /* Style your button however you like */
            background-color: #4CAF50;
            /* Example background color */
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .collapsible-content {
            display: none;
            /* Initially hidden */
            overflow: hidden;
            transition: max-height 0.3s ease-out;
            /* Smooth transition */
        }

        .collapsible-content.active {
            display: block;
        }

        .toggle-icon {
            cursor: pointer;
            font-size: 1.2em;
            /* Adjust size as needed */
            margin-left: 10px;
            /* Space between title and icon */
            color: green !important;
            /* Keep the color green when expanded */

        }

        input[type="datetime-local"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        /* .addbutton {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .addbutton:hover {
            background-color: #45a049;
        } */

        .addbutton-container {
            position: relative;
        }

        .addbutton {
            position: absolute;
            right: 0px;
            /* Adjust as needed to position it properly */
            background-color: #28a745;
            /* Green background */
            color: white;
            /* White text */
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            float: right;
        }

        .addbutton:hover {
            background-color: #218838;
            /* Darker green on hover */
        }


        .deletebutton {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .deletebutton:hover {
            background-color: #fa190b;
        }

        .program-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
        }

        .program-grid>div {
            box-sizing: border-box;
        }

        .checkinputs {
            padding: 10px 10px;
            border-radius: 5px;
            background-color: white;
        }
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container">

        <form action="update_formule_submit.php" method="POST" enctype="multipart/form-data">
            <?php
            include 'db.php';

            // Check if a formule_id is provided in the URL
            if (isset($_GET['id'])) {
                $formuleId = $_GET['id'];

                // Retrieve existing data from the database based on formule_id
                $sql = "SELECT * FROM formules WHERE id = $formuleId";
                $result = mysqli_query($conn, $sql);


                if (mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    // Store existing data in variables
                    $existingPackageId = $row['package_id'];
                    $existingTypeId = $row['type_id']; // Make sure to fetch this
                    $existingStatut = $row['statut'];
                    $existingDureeSejour = $row['duree_sejour'];
                    $existingDateDepart = $row['date_depart'];
                    $existingDateRetour = $row['date_retour'];
                    $existingPrixChambreQuadruple = $row['prix_chambre_quadruple'];
                    $existingPrixChambreTriple = $row['prix_chambre_triple'];
                    $existingPrixChambreDouble = $row['prix_chambre_double'];
                    $existingPrixChambreSingle = $row['prix_chambre_single'];
                    $existingChildDiscount = $row['child_discount'];
                    $existingPrixBebe = $row['prix_bebe'];
                    $existingPrixChambreQuadruplePromo = $row['prix_chambre_quadruple_promo'];
                    $existingPrixChambreTriplePromo = $row['prix_chambre_triple_promo'];
                    $existingPrixChambreDoublePromo = $row['prix_chambre_double_promo'];
                    $existingPrixChambreSinglePromo = $row['prix_chambre_single_promo'];
                    $existingDescription = $row['description'];
                    $existingS1t = $row['s1t'];
                    $existingS1d = $row['s1d'];
                    $existingS2t = $row['s2t'];
                    $existingS2d = $row['s2d'];
                    $existingS3t = $row['s3t'];
                    $existingS3d = $row['s3d'];
                    $existingS4t = $row['s4t'];
                    $existingS4d = $row['s4d'];
                    $existingS5t = $row['s5t'];
                    $existingS5d = $row['s5d'];
                    $existingFile = $row['uploaded_file'];

                    // Fetch current programs
                    $currentPrograms = json_decode($row['programs_id'], true) ?? [];
                    $currentProgramOrder = json_decode($row['program_order'], true) ?? [];

                    // Fetch all available programs
                    $programsResult = mysqli_query($conn, "SELECT * FROM programs");
                    $programs = [];
                    while ($program = mysqli_fetch_assoc($programsResult)) {
                        $programs[] = $program;
                    }

                    // Retrieve existing vols
                    $volsSql = "SELECT * FROM vols WHERE formule_id = $formuleId";
                    $volsResult = mysqli_query($conn, $volsSql);
                    $volsData = [];
                    while ($volRow = mysqli_fetch_assoc($volsResult)) {
                        $volsData[] = $volRow;
                    }

                    // Retrieve existing hebergements
                    $hebergementsSql = "SELECT * FROM hebergements WHERE formule_id = $formuleId";
                    $hebergementsResult = mysqli_query($conn, $hebergementsSql);
                    $hebergementsData = [];
                    while ($hebergementRow = mysqli_fetch_assoc($hebergementsResult)) {
                        $hebergementsData[] = $hebergementRow;
                    }

                    // Sort the programs based on the saved order
                    $orderedPrograms = [];
                    foreach ($currentProgramOrder as $programId) {
                        foreach ($programs as $program) {
                            if ($program['id'] == $programId) {
                                $orderedPrograms[] = $program;
                                break;
                            }
                        }
                    }

                    // Add any missing programs that are not in the order array
                    foreach ($programs as $program) {
                        if (!in_array($program, $orderedPrograms)) {
                            $orderedPrograms[] = $program;
                        }
                    }
                } else {
                    echo "Formule not found.";
                    exit; // Or redirect to an error page
                }
            } else {
                echo "Formule ID not provided.";
                exit; // Or redirect
            }
            ?>
            <h3><?php echo "ID Formule: " . $formuleId ?></h3>
            <h2>Modifier une Formule</h2>
            <input type="hidden" name="formule_id" value="<?php echo $formuleId; ?>">
            <div class="half-width-inputs">
                <div class="input-group">
                    <label for="package">Ville de départ:</label>
                    <select id="package" name="package" class="half-width-input" required>
                        <option value="">Sélectionnez une ville</option>
                        <?php
                        // Fetch and display package options from the database
                        $sql = "SELECT id, nom FROM omra_packages";
                        $result = mysqli_query($conn, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $selected = ($row["id"] == $existingPackageId) ? 'selected' : '';
                            echo "<option value='" . $row["id"] . "' $selected>" . $row["nom"] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="type">Type de la Formule:</label>
                    <select id="type" name="type" class="half-width-input" required>
                        <option value="">Sélectionnez un type</option>
                        <?php
                        // Fetch and display type de formule options based on the selected package (initially the existing one)
                        $sql_types_formules = "SELECT id, nom FROM type_formule_omra WHERE formule_parent_id = $existingPackageId";
                        $result_types_formules = mysqli_query($conn, $sql_types_formules);

                        while ($row = mysqli_fetch_assoc($result_types_formules)) {
                            $selected = ($row["id"] == $existingTypeId) ? 'selected' : ''; // Check if the option matches the existing type_id
                            echo "<option value='" . $row['id'] . "' $selected>" . $row['nom'] . "</option>";
                        }
                        ?>
                    </select>
                </div>

                <div class="input-group">
                    <label for="statut">Statut:</label>
                    <select id="statut" name="statut" class="half-width-input" required>
                        <option value="activé" <?php if ($existingStatut == 'activé')
                                                    echo 'selected'; ?>>Activé</option>
                        <option value="désactivé" <?php if ($existingStatut == 'désactivé')
                                                        echo 'selected'; ?>>Désactivé
                        </option>
                    </select>
                </div>
            </div>

            <!-- Other input fields here -->





            <script>
                document.getElementById('package').addEventListener('change', function() {
                    var packageId = this.value;
                    var typeSelect = document.getElementById('type');
                    typeSelect.innerHTML = '<option value="">Sélectionnez un type</option>'; // Clear current options

                    if (packageId) {
                        var xhr = new XMLHttpRequest();
                        xhr.open('GET', 'fetch_types.php?package_id=' + packageId, true);
                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === 4 && xhr.status === 200) {
                                var types = JSON.parse(xhr.responseText);
                                types.forEach(function(type) {
                                    var option = document.createElement('option');
                                    option.value = type.id;
                                    option.text = type.nom;
                                    typeSelect.appendChild(option);
                                });
                            }
                        };
                        xhr.send();
                    }
                });
            </script>
            <div class="half-width-inputs">
                <div class="input-group">
                    <label for="date_depart">Date de Départ:</label>
                    <input type="date" id="date_depart" name="date_depart" class="half-width-input" value="<?php echo $existingDateDepart; ?>" required>
                </div>

                <div class="input-group">
                    <label for="date_retour">Date de Retour:</label>
                    <input type="date" id="date_retour" name="date_retour" class="half-width-input" value="<?php echo $existingDateRetour; ?>" required>
                </div>

                <div class="input-group">
                    <label for="duree_sejour">Durée de séjour:</label>
                    <input type="text" id="duree_sejour" name="duree_sejour" class="half-width-input" value="<?php echo $existingDureeSejour; ?>" required>
                </div>
            </div>


            <!-- ///         Vol Section Starts         //// -->

            <div class="price-inputs" id="vols-container">
                <h3>Vols <span class="toggle-icon" onclick="toggleCollapse(this)">+</span></h3>

                <div class="collapsible-content">
                    <div class="addbutton-container">
                        <button type="button" class="add-button addbutton" onclick="addVol()">Ajouter Vol</button>
                        <!-- <button type="button" class="add-button addbutton" style="float: right; margin-top: -30px;" onclick="addVol()">Ajouter Vol</button>     -->
                    </div>
                    <?php foreach ($volsData as $index => $vol) { ?>

                        <div class="vols-group">
                            <hr style="width:50%;height:1px;border-width:0;background-color:#C0C0C0; margin-bottom:30px; margin-top:50px;">
                            <div class="half-width-inputs">
                                <div class="input-group">
                                    <label for="ville_depart_<?php echo $index; ?>">Départ:</label>
                                    <!-- <input type="text" id="ville_depart_<!?php echo $index; ?>" name="vols[<!?php echo $index; ?>][ville_depart]" class="half-width-input" value="<!?php echo $vol['ville_depart_id']; ?>" required> -->
                                    <select id="ville_depart_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][ville_depart_id]" class="half-width-input" required>
                                        <option value="">Sélectionnez une Ville</option>
                                        <?php
                                        $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                                        $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                                        while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                                            $selected = ($row_ville_depart['id'] == $vol['ville_depart_id']) ? 'selected' : '';
                                            echo "<option value='" . $row_ville_depart['id'] . "' $selected>" . $row_ville_depart['nom'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="compagnie_aerienne_<?php echo $index; ?>">Compagnie Aérienne:</label>
                                    <select id="compagnie_aerienne_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][compagnie_aerienne]" class="half-width-input" required>
                                        <?php
                                        $sql_compagnies_aeriennes = "SELECT * FROM compagnies_aeriennes";
                                        $result_compagnies_aeriennes = mysqli_query($conn, $sql_compagnies_aeriennes);
                                        while ($row_compagnie_aerienne = mysqli_fetch_assoc($result_compagnies_aeriennes)) {
                                            $selected = ($row_compagnie_aerienne['id'] == $vol['compagnie_aerienne_id']) ? 'selected' : '';
                                            echo "<option value='" . $row_compagnie_aerienne['id'] . "' $selected>" . $row_compagnie_aerienne['nom'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="half-width-inputs">
                                <div class="input-group">
                                    <label for="num_vol_<?php echo $index; ?>">N° Vol:</label>
                                    <input type="text" id="num_vol_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][num_vol]" class="half-width-input" value="<?php echo $vol['num_vol']; ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="airport_depart_<?php echo $index; ?>">Aéroport de Départ:</label>
                                    <select id="airport_depart_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][airport_depart_id]" class="half-width-input" required>
                                        <option value="">Sélectionnez un Aéroport</option>
                                        <?php
                                        $sql_airports_depart = "SELECT * FROM airports";
                                        $result_airports_depart = mysqli_query($conn, $sql_airports_depart);
                                        while ($row_airport_depart = mysqli_fetch_assoc($result_airports_depart)) {
                                            $selected = ($row_airport_depart['id'] == $vol['airport_depart_id']) ? 'selected' : '';
                                            echo "<option value='" . $row_airport_depart['id'] . "' $selected>" . $row_airport_depart['nom'] . " - " . $row_airport_depart['abrv'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="heure_depart_<?php echo $index; ?>">Heure & Date de Départ:</label>
                                    <input type="datetime-local" id="heure_depart_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][heure_depart]" class="half-width-input" value="<?php echo $vol['heure_depart']; ?>" required>
                                </div>

                                <div class="input-group">
                                    <label for="destination_<?php echo $index; ?>">Destination:</label>
                                    <select id="destination_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][ville_destination_id]" class="half-width-input" required>
                                        <option value="">Sélectionnez une Ville</option>
                                        <?php
                                        $sql_villes_destination = "SELECT * FROM ville_depart WHERE statut='activé'";
                                        $result_villes_destination = mysqli_query($conn, $sql_villes_destination);
                                        while ($row_ville_destination = mysqli_fetch_assoc($result_villes_destination)) {
                                            $selected = ($row_ville_destination['id'] == $vol['ville_destination_id']) ? 'selected' : '';
                                            echo "<option value='" . $row_ville_destination['id'] . "' $selected>" . $row_ville_destination['nom'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="airport_destination_<?php echo $index; ?>">Aéroport de Destination:</label>
                                    <select id="airport_destination_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][airport_destination_id]" class="half-width-input" required>
                                        <option value="">Sélectionnez un Aéroport</option>
                                        <?php
                                        $sql_airports_destination = "SELECT * FROM airports";
                                        $result_airports_destination = mysqli_query($conn, $sql_airports_destination);
                                        while ($row_airport_destination = mysqli_fetch_assoc($result_airports_destination)) {
                                            $selected = ($row_airport_destination['id'] == $vol['airport_destination_id']) ? 'selected' : '';
                                            echo "<option value='" . $row_airport_destination['id'] . "' $selected>" . $row_airport_destination['nom'] . " - " . $row_airport_destination['abrv'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="input-group">
                                    <label for="heure_arrivee_<?php echo $index; ?>">Heure & Date d'Arrivée:</label>
                                    <input type="datetime-local" id="heure_arrivee_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][heure_arrivee]" class="half-width-input" value="<?php echo $vol['heure_arrivee']; ?>" required>
                                </div>
                            </div>
                            <button type="button" class="remove-button deletebutton" onclick="removeVol(this)">Supprimer Vol</button>
                        </div>
                    <?php } ?>

                </div>

            </div>

            <script>
                function toggleCollapse(icon) {
                    const content = icon.parentNode.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        icon.innerHTML = "+";
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                        icon.innerHTML = "-";
                    }
                }


                function addVol() {
                    const container = document.querySelector('.collapsible-content');
                    const index = document.querySelectorAll('.vols-group').length;
                    const volGroup = document.createElement('div');
                    volGroup.className = 'vols-group';
                    volGroup.innerHTML = `
        <hr style="width:50%;height:1px;border-width:0;background-color:#C0C0C0;  margin-top:50px;">   
        <div class="half-width-inputs" style="margin-top:30px;">                                 
            <div class="input-group">
                <label for="ville_depart_${index}">Départ:</label>                    
                <select id="ville_depart_${index}" name="vols[${index}][ville_depart_id]" class="half-width-input" required>
                <option value="">Sélectionnez une Ville</option>
                       <?php
                        $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                        $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                        while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                            echo "<option value='" . $row_ville_depart['id'] . "'>" . $row_ville_depart['nom'] . "</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="input-group">
                <label for="compagnie_aerienne_${index}">Compagnie Aérienne:</label>
                <select id="compagnie_aerienne_${index}" name="vols[${index}][compagnie_aerienne]" class="half-width-input" required>
                    <?php
                    $sql_compagnies_aeriennes = "SELECT * FROM compagnies_aeriennes";
                    $result_compagnies_aeriennes = mysqli_query($conn, $sql_compagnies_aeriennes);
                    while ($row_compagnie_aerienne = mysqli_fetch_assoc($result_compagnies_aeriennes)) {
                        echo "<option value='" . $row_compagnie_aerienne['id'] . "'>" . $row_compagnie_aerienne['nom'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="half-width-inputs">
            <div class="input-group">
                <label for="num_vol_${index}">N° Vol:</label>
                <input type="text" id="num_vol_${index}" name="vols[${index}][num_vol]" class="half-width-input" required>
            </div>
            
            <div class="input-group">
                <label for="airport_depart_${index}">Aéroport de Départ:</label>                    
                <select id="airport_depart_${index}" name="vols[${index}][airport_depart_id]" class="half-width-input" required>
                <option value="">Sélectionnez un Aéroport</option>
                       <?php
                        $sql_airports_depart = "SELECT * FROM airports";
                        $result_airports_depart = mysqli_query($conn, $sql_airports_depart);
                        while ($row_airport_depart = mysqli_fetch_assoc($result_airports_depart)) {
                            echo "<option value='" . $row_airport_depart['id'] . "'>" . $row_airport_depart['nom'] . " - " . $row_airport_depart['abrv'] . "</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="input-group">
                <label for="heure_depart_${index}">Heure & Date de Départ:</label>
                <input type="datetime-local" id="heure_depart_${index}" name="vols[${index}][heure_depart]" class="half-width-input" required>
            </div>
            
            <div class="input-group">
                <label for="destination_${index}">Destination:</label>                    
                <select id="destination_${index}" name="vols[${index}][ville_destination_id]" class="half-width-input" required>
                <option value="">Sélectionnez une Ville</option>
                       <?php
                        $sql_villes_destination = "SELECT * FROM ville_depart WHERE statut='activé'";
                        $result_villes_destination = mysqli_query($conn, $sql_villes_destination);
                        while ($row_ville_destination = mysqli_fetch_assoc($result_villes_destination)) {
                            echo "<option value='" . $row_ville_destination['id'] . "'>" . $row_ville_destination['nom'] . "</option>";
                        }
                        ?>
                </select>
            </div>
            
            <div class="input-group">
                <label for="airport_destination_${index}">Aéroport de Destination:</label>                    
                <select id="airport_destination_${index}" name="vols[${index}][airport_destination_id]" class="half-width-input" required>
                <option value="">Sélectionnez un Aéroport</option>
                       <?php
                        $sql_airports_destination = "SELECT * FROM airports";
                        $result_airports_destination = mysqli_query($conn, $sql_airports_destination);
                        while ($row_airport_destination = mysqli_fetch_assoc($result_airports_destination)) {
                            echo "<option value='" . $row_airport_destination['id'] . "'>" . $row_airport_destination['nom'] . " - " . $row_airport_destination['abrv'] . "</option>";
                        }
                        ?>
                </select>
            </div>
            <div class="input-group">
                <label for="heure_arrivee_${index}">Heure & Date d'Arrivée:</label>
                <input type="datetime-local" id="heure_arrivee_${index}" name="vols[${index}][heure_arrivee]" class="half-width-input" required>
            </div>
        </div>
        <button type="button" class="remove-button deletebutton" onclick="removeVol(this)">Supprimer Vol</button>
    `;
                    container.appendChild(volGroup);

                    // Automatically expand the collapsible content if it was collapsed
                    const icon = document.querySelector('.toggle-icon');
                    const content = icon.parentNode.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = content.scrollHeight + "px";
                    } else {
                        content.style.display = "block";
                        icon.innerHTML = "-";
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                }

                // function removeVol(button) {
                //     const volGroup = button.closest('.vols-group');
                //     volGroup.remove();

                //     // Adjust the height of the collapsible content after removing a vol group
                //     const content = document.querySelector('.collapsible-content');
                //     if (content.style.maxHeight) {
                //         content.style.maxHeight = content.scrollHeight + "px";
                //     }
                // }

                function removeVol(button) {
                    const volGroup = button.closest('.vols-group');
                    const container = document.querySelectorAll('.vols-group');
                    if (container.length > 1) {
                        volGroup.remove();
                    } else {
                        alert("Vous ne pouvez pas supprimer le dernier vol.");
                    }
                }
            </script>

            <!-- ///         Vol Section Ends         //// -->

            <!-- | -->
            <!-- | -->
            <!-- | -->

            <!-- Hebergement section Starts  -->

            <div class="price-inputs">
                <h3>Hébergement <span id="toggle-hebergement" class="toggle-icon" onclick="toggleCollapse(this)">+</span></h3>

                <div id="hebergement-section" class="collapsible-content">
                    <div class="addbutton-container">
                        <button type="button" id="add-hebergement" class="addbutton" onclick="addHebergement()">Ajouter Hébergement</button>
                    </div>
                    <br>
                    <?php foreach ($hebergementsData as $index => $hebergement) { ?>
                        <div class="hebergement-block" data-index="<?php echo $index; ?>">
                            <hr style="width:50%;height:1px;border-width:0;background-color:#C0C0C0; margin-bottom: 30px; margin-top:50px;">
                            <div class="half-width-inputs">
                                <div class="input-group">
                                    <label for="date_checkin_<?php echo $index; ?>">Date Checkin :</label>
                                    <input type="date" id="date_checkin_<?php echo $index; ?>" name="hebergements[<?php echo $index; ?>][date_checkin]" class="half-width-input" value="<?php echo $hebergement['date_checkin']; ?>" required onchange="calculateNights(<?php echo $index; ?>)">
                                </div>
                                <div class="input-group">
                                    <label for="date_checkout_<?php echo $index; ?>">Date Checkout :</label>
                                    <input type="date" id="date_checkout_<?php echo $index; ?>" name="hebergements[<?php echo $index; ?>][date_checkout]" class="half-width-input" value="<?php echo $hebergement['date_checkout']; ?>" required onchange="calculateNights(<?php echo $index; ?>)">
                                </div>
                                <div class="input-group">
                                    <label for="hotel_<?php echo $index; ?>">Hôtel :</label>
                                    <select id="hotel_<?php echo $index; ?>" name="hebergements[<?php echo $index; ?>][hotel_id]" class="half-width-input" required>
                                        <?php
                                        // Fetch and display hotel options from the database
                                        $sql_hotels = "SELECT * FROM hotels";
                                        $result_hotels = mysqli_query($conn, $sql_hotels);
                                        while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                                            $selected = ($row_hotel['id'] == $hebergement['hotel_id']) ? 'selected' : '';
                                            echo "<option value='" . $row_hotel['id'] . "' $selected>" . $row_hotel['nom'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <!-- wess -->
                                <div class="input-group">
                                    <label for="type_pension_<?php echo $index; ?>">Type de Pension:</label>
                                    <select id="type_pension_<?php echo $index; ?>" name="hebergements[<?php echo $index; ?>][type_pension]" required>
                                        <option value="">Sélectionnez le type de pension</option>
                                        <option value="Pension Complète" <?php echo ($hebergement['type_pension'] == 'Pension Complète') ? 'selected' : ''; ?>>Pension Complète</option>
                                        <option value="Demi-pension" <?php echo ($hebergement['type_pension'] == 'Demi-pension') ? 'selected' : ''; ?>>Demi-pension</option>
                                        <option value="Sans pension" <?php echo ($hebergement['type_pension'] == 'Sans pension') ? 'selected' : ''; ?>>Sans pension</option>
                                        <option value="Petit déjeuner" <?php echo ($hebergement['type_pension'] == 'Petit déjeuner') ? 'selected' : ''; ?>>Petit déjeuner</option>
                                        <option value="Sahour" <?php echo ($hebergement['type_pension'] == 'Sahour') ? 'selected' : ''; ?>>Sahour</option>
                                        <option value="Iftar" <?php echo ($hebergement['type_pension'] == 'Iftar') ? 'selected' : ''; ?>>Iftar</option>
                                        <option value="Sahour et Iftar" <?php echo ($hebergement['type_pension'] == 'Sahour et Iftar') ? 'selected' : ''; ?>>Sahour et Iftar</option>
                                        <option value="Petit déjeuner ensuite Iftar" <?php echo ($hebergement['type_pension'] == 'Petit déjeuner ensuite Iftar') ? 'selected' : ''; ?>>Petit déjeuner ensuite Iftar</option>
                                    </select>
                                </div>
                                <!-- wess -->
                                <div class="input-group">
                                    <label for="nombre_nuit_<?php echo $index; ?>">Nombre de nuitées :</label>
                                    <input type="number" id="nombre_nuit_<?php echo $index; ?>" name="hebergements[<?php echo $index; ?>][nombre_nuit]" class="half-width-input" value="<?php echo $hebergement['nombre_nuit']; ?>" required readonly>
                                </div>
                            </div>
                            <button type="button" class="remove-hebergement deletebutton" onclick="removeHebergement(<?php echo $index; ?>)">Supprimer Hébergement</button>
                        </div>
                    <?php } ?>

                </div>
            </div>

            <script>
                let hebergementIndex = <?php echo count($hebergementsData); ?>;

                function toggleCollapse(icon) {
                    const content = icon.parentNode.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = null;
                        icon.innerHTML = "+";
                    } else {
                        content.style.maxHeight = content.scrollHeight + "px";
                        icon.innerHTML = "-";
                    }
                }

                function addHebergement() {
                    const hebergementSection = document.getElementById('hebergement-section');
                    const newHebergement = document.createElement('div');
                    newHebergement.classList.add('hebergement-block');
                    newHebergement.setAttribute('data-index', hebergementIndex);

                    newHebergement.innerHTML = `
            <hr style="width:50%;height:1px;border-width:0;background-color:#C0C0C0;  margin-top:50px;">
            <div class="half-width-inputs" style="margin-top:30px;">
                <div class="input-group">
                    <label for="date_checkin_${hebergementIndex}">Date Checkin :</label>
                    <input type="date" id="date_checkin_${hebergementIndex}" name="hebergements[${hebergementIndex}][date_checkin]" class="half-width-input" required onchange="calculateNights(${hebergementIndex})">
                </div>
                <div class="input-group">
                    <label for="date_checkout_${hebergementIndex}">Date Checkout :</label>
                    <input type="date" id="date_checkout_${hebergementIndex}" name="hebergements[${hebergementIndex}][date_checkout]" class="half-width-input" required onchange="calculateNights(${hebergementIndex})">
                </div>
                <div class="input-group">
                    <label for="hotel_${hebergementIndex}">Hôtel :</label>
                    <select id="hotel_${hebergementIndex}" name="hebergements[${hebergementIndex}][hotel_id]" class="half-width-input" required>
                        <?php
                        $sql_hotels = "SELECT * FROM hotels";
                        $result_hotels = mysqli_query($conn, $sql_hotels);
                        while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                            echo "<option value='" . $row_hotel['id'] . "'>" . $row_hotel['nom'] . "</option>";
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group">
                <label for="type_pension_${hebergementIndex}">Type de Pension:</label>
                <select id="type_pension_${hebergementIndex}" name="hebergements[${hebergementIndex}][type_pension]" required>
                    <option value="">Sélectionnez le type de pension</option>
                    <option value="Pension Complète">Pension Complète</option>
                    <option value="Demi-pension">Demi-pension</option>
                    <option value="Sans pension">Sans pension</option>
                    <option value="Petit déjeuner">Petit déjeuner</option>
                    <option value="Sahour">Sahour</option>
                    <option value="Iftar">Iftar</option>
                    <option value="Sahour et Iftar">Sahour et Iftar</option>
                    <option value="Petit déjeuner ensuite Iftar">Petit déjeuner ensuite Iftar</option>
                </select>
            </div>
                <div class="input-group">
                    <label for="nombre_nuit_${hebergementIndex}">Nombre de nuitées :</label>
                    <input type="number" id="nombre_nuit_${hebergementIndex}" name="hebergements[${hebergementIndex}][nombre_nuit]" class="half-width-input" required readonly>
                </div>
            </div>
            <button type="button" class="remove-hebergement deletebutton" onclick="removeHebergement(${hebergementIndex})">Supprimer Hébergement</button>
        `;

                    hebergementSection.appendChild(newHebergement);
                    hebergementIndex++;

                    // Expand the collapsible content after adding a new hébergement block
                    const icon = document.getElementById('toggle-hebergement');
                    const content = icon.parentNode.nextElementSibling;
                    if (content.style.maxHeight) {
                        content.style.maxHeight = content.scrollHeight + "px";
                    } else {
                        content.style.display = "block";
                        icon.innerHTML = "-";
                        content.style.maxHeight = content.scrollHeight + "px";
                    }
                }

                // function removeHebergement(index) {
                //     const hebergementToRemove = document.querySelector(`.hebergement-block[data-index='${index}']`);
                //     if (hebergementToRemove) {
                //         hebergementToRemove.remove();
                //     }
                // }

                function removeHebergement(index) {
                    const hebergementBlocks = document.querySelectorAll('.hebergement-block');
                    if (hebergementBlocks.length > 1) {
                        const hebergementToRemove = document.querySelector(`.hebergement-block[data-index='${index}']`);
                        if (hebergementToRemove) {
                            hebergementToRemove.remove();
                        }
                    } else {
                        alert("Vous ne pouvez pas supprimer le dernier hébergement.");
                    }
                }




                function calculateNights(index) {
                    const checkinInput = document.getElementById(`date_checkin_${index}`);
                    const checkoutInput = document.getElementById(`date_checkout_${index}`);
                    const nightsInput = document.getElementById(`nombre_nuit_${index}`);

                    const checkinDate = new Date(checkinInput.value);
                    const checkoutDate = new Date(checkoutInput.value);

                    if (checkinDate && checkoutDate && checkoutDate > checkinDate) {
                        const timeDiff = Math.abs(checkoutDate - checkinDate);
                        const nights = Math.ceil(timeDiff / (1000 * 60 * 60 * 24));
                        nightsInput.value = nights;
                    } else {
                        nightsInput.value = 0;
                    }
                }

                // Initialize night calculation for existing hebergements
                <?php foreach ($hebergementsData as $index => $hebergement) { ?>
                    calculateNights(<?php echo $index; ?>);
                <?php } ?>
            </script>




            <!-- Hebergement section Ends  -->

            <div class="price-inputs">
                <h3>Prix Hors Promo <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content">
                    <br>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_quadruple">Chambre quadruple:</label>
                            <input type="number" id="prix_chambre_quadruple" name="prix_chambre_quadruple" class="price-input" value="<?php echo $existingPrixChambreQuadruple; ?>" required>
                        </div>

                        <div class="input-group">
                            <label for="prix_chambre_triple">Chambre triple:</label>
                            <input type="number" id="prix_chambre_triple" name="prix_chambre_triple" class="price-input" value="<?php echo $existingPrixChambreTriple; ?>" required>
                        </div>
                    </div>

                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_double">Chambre double:</label>
                            <input type="number" id="prix_chambre_double" name="prix_chambre_double" class="price-input" value="<?php echo $existingPrixChambreDouble; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="prix_chambre_single">Chambre single:</label>
                            <input type="number" id="prix_chambre_single" name="prix_chambre_single" class="price-input" value="<?php echo $existingPrixChambreSingle; ?>" required>
                        </div>
                    </div>

                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="child_discount">Tarif enfant:</label>
                            <input type="number" id="child_discount" name="child_discount" class="price-input" value="<?php echo $existingChildDiscount; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="prix_bebe">Tarif bébé:</label>
                            <input type="number" id="prix_bebe" name="prix_bebe" class="price-input" value="<?php echo $existingPrixBebe; ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="price-inputs">
                <h3>Prix Promo <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content">
                    <br>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_quadruple_promo">Chambre quadruple:</label>
                            <input type="number" id="prix_chambre_quadruple_promo" name="prix_chambre_quadruple_promo" class="price-input" value="<?php echo $existingPrixChambreQuadruplePromo; ?>">
                        </div>
                        <div class="input-group">
                            <label for="prix_chambre_triple_promo">Chambre triple:</label>
                            <input type="number" id="prix_chambre_triple_promo" name="prix_chambre_triple_promo" class="price-input" value="<?php echo $existingPrixChambreTriplePromo; ?>">
                        </div>
                    </div>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_double_promo">Chambre double:</label>
                            <input type="number" id="prix_chambre_double_promo" name="prix_chambre_double_promo" class="price-input" value="<?php echo $existingPrixChambreDoublePromo; ?>">
                        </div>
                        <div class="input-group">
                            <label for="prix_chambre_single_promo">Chambre single:</label>
                            <input type="number" id="prix_chambre_single_promo" name="prix_chambre_single_promo" class="price-input" value="<?php echo $existingPrixChambreSinglePromo; ?>">
                        </div>
                    </div>
                </div>
            </div>


            <!-- programs start -->
            <div class="price-inputs">
                <h3>Programmes <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px;">
                    <div class="program-grid" id="sortable-programs">
                        <?php foreach ($orderedPrograms as $program) : ?>
                            <div class="ui-state-default checkinputs" data-id="<?php echo $program['id']; ?>">
                                <input type="checkbox" name="programs[]" value="<?php echo $program['id']; ?>" <?php echo in_array($program['id'], $currentPrograms) ? 'checked' : ''; ?>>
                                <?php echo $program['nom']; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <script>
                $(function() {
                    $("#sortable-programs").sortable();
                    $("#sortable-programs").disableSelection();
                });

                function getProgramOrder() {
                    var order = [];
                    $('#sortable-programs div').each(function() {
                        order.push($(this).data('id'));
                    });
                    return order;
                }

                $('form').on('submit', function() {
                    var programOrder = getProgramOrder();
                    $('input[name="program_order"]').val(JSON.stringify(programOrder));
                });
            </script>

            <input type="hidden" name="program_order" value="">
            <!--programs end -->

            <div class="price-inputs">
                <h3>Description <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px; border:0px;">
                    <div class="">
                        <!-- Container for the Quill editor -->
                        <div class="editor-container">
                            <!-- Toolbar container -->
                            <div id="toolbar">
                                <!-- Toolbar options -->
                                <span class="ql-formats">
                                    <button class="ql-bold">Bold</button>
                                    <button class="ql-italic">Italic</button>
                                    <button class="ql-underline">Underline</button>
                                    <button class="ql-strike">Strike</button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-align">
                                        <option value=""></option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color">
                                        <option value="#ff0000">Red</option>
                                        <option value="#00ff00">Green</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#000000" selected>Black</option>
                                    </select>
                                    <select class="ql-background">
                                        <option value="#ffff00">Yellow</option>
                                        <option value="#00ffff">Cyan</option>
                                        <option value="#ff00ff">Magenta</option>
                                        <option value="#ffffff" selected>White</option>
                                    </select>
                                </span>
                                <!-- List options -->
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered">Ordered List</button>
                                    <button class="ql-list" value="bullet">Bullet List</button>
                                </span>
                            </div>
                            <!-- Editor container -->
                            <div id="editor" value="<?php echo htmlspecialchars($existingDescription); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden input field to store the Quill editor content -->
            <input type="hidden" name="description" id="description">

            <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
            <script>
                var quill = new Quill('#editor', {
                    theme: 'snow',
                    modules: {
                        toolbar: '#toolbar'
                    }
                });

                // Set initial content of the editor
                quill.root.innerHTML = <?php echo json_encode($existingDescription); ?>;

                // Add an event listener to the form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the Quill editor content
                    var description = quill.root.innerHTML;
                    // Set the content to the hidden input field
                    document.getElementById('description').value = description;
                });
            </script>
            <!-- END Description -->

            <!-- Start section 1 -->
            <div class="price-inputs">
                <h3>Section 1 <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px; border:0px;">
                    <label for="titre_section1">Titre:</label>
                    <input type="text" id="titre_section1" name="titre_section1" class="half-width-input" style="width:30%;" value="<?php echo $existingS1t; ?>">
                    <div class="">
                        <!-- Container for the Quill editor -->
                        <div class="editor-container">
                            <!-- Toolbar container -->
                            <div id="toolbar-section1">
                                <!-- Toolbar options -->
                                <span class="ql-formats">
                                    <button class="ql-bold">Bold</button>
                                    <button class="ql-italic">Italic</button>
                                    <button class="ql-underline">Underline</button>
                                    <button class="ql-strike">Strike</button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-align">
                                        <option value=""></option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color">
                                        <option value="#ff0000">Red</option>
                                        <option value="#00ff00">Green</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#000000" selected>Black</option>
                                    </select>
                                    <select class="ql-background">
                                        <option value="#ffff00">Yellow</option>
                                        <option value="#00ffff">Cyan</option>
                                        <option value="#ff00ff">Magenta</option>
                                        <option value="#ffffff" selected>White</option>
                                    </select>
                                </span>
                                <!-- List options -->
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered">Ordered List</button>
                                    <button class="ql-list" value="bullet">Bullet List</button>
                                </span>
                            </div>
                            <!-- Editor container -->
                            <div id="editor-section1" value="<?php echo htmlspecialchars($existingS1d); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden input field to store the Quill editor content -->
            <input type="hidden" name="section1" id="section1">

            <script>
                var quillSection1 = new Quill('#editor-section1', {
                    theme: 'snow',
                    modules: {
                        toolbar: '#toolbar-section1'
                    }
                });

                // Set initial content of the editor
                quillSection1.root.innerHTML = <?php echo json_encode($existingS1d); ?>;

                // Add an event listener to the form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the Quill editor content
                    var section1 = quillSection1.root.innerHTML;
                    // Set the content to the hidden input field
                    document.getElementById('section1').value = section1;
                });
            </script>
            <!-- End section 1 -->

            <!-- Start section 2 -->
            <div class="price-inputs">
                <h3>Section 2 <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px; border:0px;">
                    <label for="titre_section2">Titre:</label>
                    <input type="text" id="titre_section2" name="titre_section2" class="half-width-input" style="width:30%;" value="<?php echo $existingS2t; ?>">
                    <div class="">
                        <!-- Container for the Quill editor -->
                        <div class="editor-container">
                            <!-- Toolbar container -->
                            <div id="toolbar-section2">
                                <!-- Toolbar options -->
                                <span class="ql-formats">
                                    <button class="ql-bold">Bold</button>
                                    <button class="ql-italic">Italic</button>
                                    <button class="ql-underline">Underline</button>
                                    <button class="ql-strike">Strike</button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-align">
                                        <option value=""></option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color">
                                        <option value="#ff0000">Red</option>
                                        <option value="#00ff00">Green</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#000000" selected>Black</option>
                                    </select>
                                    <select class="ql-background">
                                        <option value="#ffff00">Yellow</option>
                                        <option value="#00ffff">Cyan</option>
                                        <option value="#ff00ff">Magenta</option>
                                        <option value="#ffffff" selected>White</option>
                                    </select>
                                </span>
                                <!-- List options -->
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered">Ordered List</button>
                                    <button class="ql-list" value="bullet">Bullet List</button>
                                </span>
                            </div>
                            <!-- Editor container -->
                            <div id="editor-section2" value="<?php echo htmlspecialchars($existingS2d); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden input field to store the Quill editor content -->
            <input type="hidden" name="section2" id="section2">

            <script>
                var quillSection2 = new Quill('#editor-section2', {
                    theme: 'snow',
                    modules: {
                        toolbar: '#toolbar-section2'
                    }
                });

                // Set initial content of the editor
                quillSection2.root.innerHTML = <?php echo json_encode($existingS2d); ?>;

                // Add an event listener to the form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the Quill editor content
                    var section2 = quillSection2.root.innerHTML;
                    // Set the content to the hidden input field
                    document.getElementById('section2').value = section2;
                });
            </script>
            <!-- End section 2 -->

            <!-- Start section 3 -->
            <div class="price-inputs">
                <h3>Section 3 <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px; border:0px;">
                    <label for="titre_section3">Titre:</label>
                    <input type="text" id="titre_section3" name="titre_section3" class="half-width-input" style="width:30%;" value="<?php echo $existingS3t; ?>">
                    <div class="">
                        <!-- Container for the Quill editor -->
                        <div class="editor-container">
                            <!-- Toolbar container -->
                            <div id="toolbar-section3">
                                <!-- Toolbar options -->
                                <span class="ql-formats">
                                    <button class="ql-bold">Bold</button>
                                    <button class="ql-italic">Italic</button>
                                    <button class="ql-underline">Underline</button>
                                    <button class="ql-strike">Strike</button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-align">
                                        <option value=""></option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color">
                                        <option value="#ff0000">Red</option>
                                        <option value="#00ff00">Green</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#000000" selected>Black</option>
                                    </select>
                                    <select class="ql-background">
                                        <option value="#ffff00">Yellow</option>
                                        <option value="#00ffff">Cyan</option>
                                        <option value="#ff00ff">Magenta</option>
                                        <option value="#ffffff" selected>White</option>
                                    </select>
                                </span>
                                <!-- List options -->
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered">Ordered List</button>
                                    <button class="ql-list" value="bullet">Bullet List</button>
                                </span>
                            </div>
                            <!-- Editor container -->
                            <div id="editor-section3" value="<?php echo htmlspecialchars($existingS3d); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden input field to store the Quill editor content -->
            <input type="hidden" name="section3" id="section3">

            <script>
                var quillSection3 = new Quill('#editor-section3', {
                    theme: 'snow',
                    modules: {
                        toolbar: '#toolbar-section3'
                    }
                });

                // Set initial content of the editor
                quillSection3.root.innerHTML = <?php echo json_encode($existingS3d); ?>;

                // Add an event listener to the form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the Quill editor content
                    var section3 = quillSection3.root.innerHTML;
                    // Set the content to the hidden input field
                    document.getElementById('section3').value = section3;
                });
            </script>
            <!-- End section 3 -->

            <!-- Start section 4 -->
            <div class="price-inputs">
                <h3>Section 4 <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px; border:0px;">
                    <label for="titre_section4">Titre:</label>
                    <input type="text" id="titre_section4" name="titre_section4" class="half-width-input" style="width:30%;" value="<?php echo $existingS4t; ?>">
                    <div class="">
                        <!-- Container for the Quill editor -->
                        <div class="editor-container">
                            <!-- Toolbar container -->
                            <div id="toolbar-section4">
                                <!-- Toolbar options -->
                                <span class="ql-formats">
                                    <button class="ql-bold">Bold</button>
                                    <button class="ql-italic">Italic</button>
                                    <button class="ql-underline">Underline</button>
                                    <button class="ql-strike">Strike</button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-align">
                                        <option value=""></option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color">
                                        <option value="#ff0000">Red</option>
                                        <option value="#00ff00">Green</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#000000" selected>Black</option>
                                    </select>
                                    <select class="ql-background">
                                        <option value="#ffff00">Yellow</option>
                                        <option value="#00ffff">Cyan</option>
                                        <option value="#ff00ff">Magenta</option>
                                        <option value="#ffffff" selected>White</option>
                                    </select>
                                </span>
                                <!-- List options -->
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered">Ordered List</button>
                                    <button class="ql-list" value="bullet">Bullet List</button>
                                </span>
                            </div>
                            <!-- Editor container -->
                            <div id="editor-section4" value="<?php echo htmlspecialchars($existingS4d); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden input field to store the Quill editor content -->
            <input type="hidden" name="section4" id="section4">

            <script>
                var quillSection4 = new Quill('#editor-section4', {
                    theme: 'snow',
                    modules: {
                        toolbar: '#toolbar-section4'
                    }
                });

                // Set initial content of the editor
                quillSection4.root.innerHTML = <?php echo json_encode($existingS4d); ?>;

                // Add an event listener to the form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the Quill editor content
                    var section4 = quillSection4.root.innerHTML;
                    // Set the content to the hidden input field
                    document.getElementById('section4').value = section4;
                });
            </script>
            <!-- End section 4 -->

            <!-- Start section 5 -->
            <div class="price-inputs">
                <h3>Section 5 <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px; border:0px;">
                    <label for="titre_section5">Titre:</label>
                    <input type="text" id="titre_section5" name="titre_section5" class="half-width-input" style="width:30%;" value="<?php echo $existingS5t; ?>">
                    <div class="">
                        <!-- Container for the Quill editor -->
                        <div class="editor-container">
                            <!-- Toolbar container -->
                            <div id="toolbar-section5">
                                <!-- Toolbar options -->
                                <span class="ql-formats">
                                    <button class="ql-bold">Bold</button>
                                    <button class="ql-italic">Italic</button>
                                    <button class="ql-underline">Underline</button>
                                    <button class="ql-strike">Strike</button>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-align">
                                        <option value=""></option>
                                        <option value="center">Center</option>
                                        <option value="right">Right</option>
                                    </select>
                                    <select class="ql-header">
                                        <option value="1">Heading 1</option>
                                        <option value="2">Heading 2</option>
                                        <option value="3">Heading 3</option>
                                        <option selected>Normal</option>
                                    </select>
                                </span>
                                <span class="ql-formats">
                                    <select class="ql-color">
                                        <option value="#ff0000">Red</option>
                                        <option value="#00ff00">Green</option>
                                        <option value="#0000ff">Blue</option>
                                        <option value="#000000" selected>Black</option>
                                    </select>
                                    <select class="ql-background">
                                        <option value="#ffff00">Yellow</option>
                                        <option value="#00ffff">Cyan</option>
                                        <option value="#ff00ff">Magenta</option>
                                        <option value="#ffffff" selected>White</option>
                                    </select>
                                </span>
                                <!-- List options -->
                                <span class="ql-formats">
                                    <button class="ql-list" value="ordered">Ordered List</button>
                                    <button class="ql-list" value="bullet">Bullet List</button>
                                </span>
                            </div>
                            <!-- Editor container -->
                            <div id="editor-section5" value="<?php echo htmlspecialchars($existingS5d); ?>"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Hidden input field to store the Quill editor content -->
            <input type="hidden" name="section5" id="section5">

            <script>
                var quillSection5 = new Quill('#editor-section5', {
                    theme: 'snow',
                    modules: {
                        toolbar: '#toolbar-section5'
                    }
                });

                // Set initial content of the editor
                quillSection5.root.innerHTML = <?php echo json_encode($existingS5d); ?>;

                // Add an event listener to the form submission
                document.querySelector('form').addEventListener('submit', function() {
                    // Get the Quill editor content
                    var section5 = quillSection5.root.innerHTML;
                    // Set the content to the hidden input field
                    document.getElementById('section5').value = section5;
                });
            </script>
            <!-- End section 5 -->

            <!-- Start download file -->
            <div class="price-inputs" style="display: flex; justify-content: center; align-items: center; margin: 20px 0; padding: 15px; border: 1px solid #ccc; border-radius: 5px;">
                <div class="input-group" style="display: flex; flex-direction: column; align-items: center;">
                    <h3 style="margin-bottom: 10px; font-size: 18px; color: #333;">Fichier</h3>
                    <input type="file" name="uploaded_file" id="uploaded_file" class="form-control" style="padding: 10px; border: 1px solid #ababab; border-radius: 5px; transition: border-color 0.3s; width: 100%; max-width: 300px;"
                        onfocus="this.style.borderColor='#32363b'; this.style.outline='none';"
                        onblur="this.style.borderColor='#32363b';">   

                    <?php
                    $existingFiles = $existingFile;

                    // Get the filename with the unique ID
                    $filenameWithId = basename($existingFiles);

                    // Split the filename at the underscore
                    $parts = explode('_', $filenameWithId);

                    // Remove the first part (the unique ID)
                    array_shift($parts);

                    // Join the remaining parts back together
                    $cleanFilename = implode('_', $parts);
                    
                    ?>
                    <p><b>Fichier actuel:</b> <?php echo $cleanFilename; ?></p>
                </div>
            </div>
            <!-- End download file -->

            <button type="submit">Mettre à jour Formule</button>
        </form>
    </div>

    <script>
        // 1. JavaScript for collapsible sections
        document.addEventListener('DOMContentLoaded', function() { // Ensure DOM is loaded

            const toggleIcons = document.querySelectorAll('.toggle-icon');
            const collapsibleContents = document.querySelectorAll('.collapsible-content');

            toggleIcons.forEach((toggleIcon, index) => {
                const correspondingContent = collapsibleContents[index];

                toggleIcon.addEventListener('click', () => {
                    correspondingContent.classList.toggle('active');
                    toggleIcon.classList.toggle('active');

                    if (correspondingContent.classList.contains('active')) {
                        // Special handling for the CKEditor content (Programme section)
                        if (correspondingContent.id === "programmeContent") {
                            // Make sure the CKEditor instance is loaded and ready.
                            if (CKEDITOR.instances.description) {
                                CKEDITOR.instances.description.resize('100%', correspondingContent.scrollHeight);
                            } else {
                                // If CKEditor is not loaded yet, try again after a short delay
                                setTimeout(() => {
                                    if (CKEDITOR.instances.description) {
                                        CKEDITOR.instances.description.resize('100%', correspondingContent.scrollHeight);
                                    }
                                }, 200); // You can adjust the delay as needed
                            }
                        } else {
                            correspondingContent.style.maxHeight = correspondingContent.scrollHeight + "px";
                        }
                        toggleIcon.textContent = '-'; // Change icon to minus
                    } else {
                        correspondingContent.style.maxHeight = "0";
                        toggleIcon.textContent = '+'; // Change icon to plus
                    }
                });
            });
        });


        // 2. JavaScript for dynamic type de formule dropdown
        const packageSelect = document.getElementById('package');
        const typeFormuleSelect = document.getElementById('type');

        packageSelect.addEventListener('change', function() {
            const packageId = this.value;
            fetchTypeFormules(packageId);
        });

        async function fetchTypeFormules(packageId) {
            if (packageId === "") {
                typeFormuleSelect.innerHTML = '<option value="" disabled>Sélectionnez d\'abord un package Omra</option>';
                return;
            }

            const response = await fetch('get_type_formules.php?package_id=' + packageId);
            const data = await response.json();

            typeFormuleSelect.innerHTML = ''; // Clear existing options

            if (data.length > 0) {
                data.forEach(typeFormule => {
                    const option = document.createElement('option');
                    option.value = typeFormule.id;
                    option.text = typeFormule.nom;
                    if (typeFormule.id == <?php echo isset($existingTypeId) ? $existingTypeId : 0; ?>) { // Use null coalescing operator to handle undefined variable
                        option.selected = true;
                    }
                    typeFormuleSelect.add(option);
                });
            } else {
                const option = document.createElement('option');
                option.value = '';
                option.text = 'Aucune formule disponible pour ce package';
                option.disabled = true;
                typeFormuleSelect.add(option);
            }
        }
    </script>


</body>

</html>