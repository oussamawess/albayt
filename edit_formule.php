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
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

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
    </style>
</head>

<body>

    <?php include 'header.php'; ?>

    <div class="container">
        <h2>Modifier une Formule</h2>
        <form action="update_formule_submit.php" method="POST">
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
                    //$existingNom = $row['nom'];
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


                    // Fetch current programs
                    $currentPrograms = json_decode($row['programs_id'], true) ?? [];

                    // Fetch all available programs
                    $programsResult = mysqli_query($conn, "SELECT * FROM programs");
                    $programs = [];
                    while ($row = mysqli_fetch_assoc($programsResult)) {
                        $programs[] = $row;
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
                } else {
                    echo "Formule not found.";
                    exit; // Or redirect to an error page
                }
            } else {
                echo "Formule ID not provided.";
                exit; // Or redirect
            }
            ?>

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
                                    <input type="text" id="ville_depart_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][ville_depart]" class="half-width-input" value="<?php echo $vol['ville_depart_id']; ?>" required>
                                    <!-- <select id="ville_depart_<!-?php echo $index; ?>" name="vols[<!-?php echo $index; ?>][ville_depart]" class="half-width-input" required> -->
                                    <!--?php
                                $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                                $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                                while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                                    $selected = ($row_ville_depart['id'] == $vol['ville_depart_id']) ? 'selected' : '';
                                    echo "<option value='" . $row_ville_depart['id'] . "' $selected>" . $row_ville_depart['nom'] . "</option>";
                                }
                                ?-->
                                    <!-- </select> -->
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
                                    <input type="text" id="airport_depart_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][airport_depart]" class="half-width-input" value="<?php echo $vol['airport_depart']; ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="heure_depart_<?php echo $index; ?>">Heure & Date de Départ:</label>
                                    <input type="datetime-local" id="heure_depart_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][heure_depart]" class="half-width-input" value="<?php echo $vol['heure_depart']; ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="destination_<?php echo $index; ?>">Destination:</label>
                                    <input type="text" id="destination_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][destination]" class="half-width-input" value="<?php echo $vol['destination']; ?>" required>
                                </div>
                                <div class="input-group">
                                    <label for="airport_destination_<?php echo $index; ?>">Aéroport de Destination:</label>
                                    <input type="text" id="airport_destination_<?php echo $index; ?>" name="vols[<?php echo $index; ?>][airport_destination]" class="half-width-input" value="<?php echo $vol['airport_destination']; ?>" required>
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
                <input type="text" id="ville_depart_${index}" name="vols[${index}][ville_depart]" class="half-width-input" required>       

                <!--select id="ville_depart_$ {index}" name="vols[$ {index}][ville_depart]" class="half-width-input" required>
                       <!-?php
                //     $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                //     $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                //     while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                //         echo "<option value='" . $row_ville_depart['id'] . "'>" . $row_ville_depart['nom'] . "</option>";
                //     }
                //     ?>
                // </select>-->
                
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
                <input type="text" id="airport_depart_${index}" name="vols[${index}][airport_depart]" class="half-width-input" required>
            </div>
            <div class="input-group">
                <label for="heure_depart_${index}">Heure & Date de Départ:</label>
                <input type="datetime-local" id="heure_depart_${index}" name="vols[${index}][heure_depart]" class="half-width-input" required>
            </div>
            <div class="input-group">
                <label for="destination_${index}">Destination:</label>
                <input type="text" id="destination_${index}" name="vols[${index}][destination]" class="half-width-input" required>
            </div>
            <div class="input-group">
                <label for="airport_destination_${index}">Aéroport de Destination:</label>
                <input type="text" id="airport_destination_${index}" name="vols[${index}][airport_destination]" class="half-width-input" required>
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

            <div class="price-inputs">
                <h3>Programmes <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content" style="padding:5px;">
                    <div class="program-grid">
                        <?php foreach ($programs as $program) : ?>
                            <div>
                                <input type="checkbox" name="programs[]" value="<?php echo $program['id']; ?>" <?php echo in_array($program['id'], $currentPrograms) ? 'checked' : ''; ?>>
                                <?php echo $program['nom']; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

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