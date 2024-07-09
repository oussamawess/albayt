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
                    $existingNom = $row['nom'];
                    $existingStatut = $row['statut'];
                    $existingDureeSejour = $row['duree_sejour'];
                    $existingVilleDepartId = $row['ville_depart_id'];
                    $existingCompagnieAerienneId = $row['compagnie_aerienne_id'];
                    $existingNumVol = $row['num_vol'];
                    $existingAirportDepart = $row['airport_depart'];
                    $existingHeureDepart = $row['heure_depart'];
                    $existingDestination = $row['destination'];
                    $existingAirportDestination = $row['airport_destination'];
                    $existingHeureArrivee = $row['heure_arrivee'];
                    $existingDateCheckin1 = $row['date_checkin1'];
                    $existingDateCheckout1 = $row['date_checkout1'];
                    $existingHotel1Id = $row['hotel1_id'];
                    $existingNombreNuit1 = $row['nombre_nuit1'];
                    $existingDateCheckin2 = $row['date_checkin2'];
                    $existingDateCheckout2 = $row['date_checkout2'];
                    $existingHotel2Id = $row['hotel2_id'];
                    $existingNombreNuit2 = $row['nombre_nuit2'];
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
                    <label for="package">Sélectionnez le Package Omra:</label>
                    <select id="package" name="package" class="half-width-input" required>
                        <option value="">Sélectionnez un package</option>
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
            </div>
            <div class="half-width-inputs">
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

                <div class="input-group">
                    <label for="duree_sejour">Durée de séjour:</label>
                    <input type="text" id="duree_sejour" name="duree_sejour" class="half-width-input"
                        value="<?php echo $existingDureeSejour; ?>" required>
                </div>
            </div>



            <div class="price-inputs">
                <h3>Vols <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content">
                    <br>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="ville_depart">Ville de Départ:</label>
                            <select id="ville_depart" name="ville_depart" class="half-width-input" required>
                                <?php
                                // Fetch and display villes de depart from database
                                $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                                $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                                while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                                    $selected = ($row_ville_depart['id'] == $existingVilleDepartId) ? 'selected' : ''; // Pre-select existing value
                                    echo "<option value='" . $row_ville_depart['id'] . "' $selected>" . $row_ville_depart['nom'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="compagnie_aerienne">Compagnie Aérienne:</label>
                            <select id="compagnie_aerienne" name="compagnie_aerienne" class="half-width-input" required>
                                <?php
                                // Fetch and display airline options from database
                                // Ensure to set the selected option based on $existingCompagnieAerienneId
                                $sql_compagnies_aeriennes = "SELECT * FROM compagnies_aeriennes";
                                $result_compagnies_aeriennes = mysqli_query($conn, $sql_compagnies_aeriennes);
                                while ($row_compagnie_aerienne = mysqli_fetch_assoc($result_compagnies_aeriennes)) {
                                    $selected = ($row_compagnie_aerienne['id'] == $existingCompagnieAerienneId) ? 'selected' : ''; // Pre-select existing value
                                    echo "<option value='" . $row_compagnie_aerienne['id'] . "' $selected>" . $row_compagnie_aerienne['nom'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="num_vol">N° Vol:</label>
                            <input type="text" id="num_vol" name="num_vol" class="half-width-input"
                                value="<?php echo $existingNumVol; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="airport_depart">Aéroport de Départ:</label>
                            <input type="text" id="airport_depart" name="airport_depart" class="half-width-input"
                                value="<?php echo $existingAirportDepart; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="heure_depart">Heure & Date de Départ:</label>
                            <input type="datetime-local" id="heure_depart" name="heure_depart" class="half-width-input"
                                value="<?php echo $existingHeureDepart; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="destination">Destination:</label>
                            <input type="text" id="destination" name="destination" class="half-width-input"
                                value="<?php echo $existingDestination; ?>" required>
                        </div>

                        <div class="input-group">
                            <label for="airport_destination">Aéroport de Destination:</label>
                            <input type="text" id="airport_destination" name="airport_destination"
                                class="half-width-input" value="<?php echo $existingAirportDestination; ?>" required>
                        </div>

                        <div class="input-group">
                            <label for="heure_arrivee">Heure & Date d'Arrivée:</label>
                            <input type="datetime-local" id="heure_arrivee" name="heure_arrivee"
                                class="half-width-input" value="<?php echo $existingHeureArrivee; ?>" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="price-inputs">
                <h3>Hébergement <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content">
                    <br>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="date_checkin1">Date Checkin :</label>
                            <input type="date" id="date_checkin1" name="date_checkin1" class="half-width-input"
                                value="<?php echo $existingDateCheckin1; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="date_checkout1">Date Checkout :</label>
                            <input type="date" id="date_checkout1" name="date_checkout1" class="half-width-input"
                                value="<?php echo $existingDateCheckout1; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="hotel">Hôtel :</label>
                            <select id="hotel" name="hotel" class="half-width-input" required>
                                <?php
                                // Fetch and display hotel options from the database
                                // Ensure to set the selected option based on $existingHotel1Id
                                $sql_hotels = "SELECT * FROM hotels";
                                $result_hotels = mysqli_query($conn, $sql_hotels);
                                while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                                    $selected = ($row_hotel['id'] == $existingHotel1Id) ? 'selected' : '';
                                    echo "<option value='" . $row_hotel['id'] . "' $selected>" . $row_hotel['nom'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="nombre_nuit">Nombre de nuitées :</label>
                            <input type="number" id="nombre_nuit" name="nombre_nuit" class="half-width-input"
                                value="<?php echo $existingNombreNuit1; ?>" required>
                        </div>
                    </div>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="date_checkin2">Date Checkin :</label>
                            <input type="date" id="date_checkin2" name="date_checkin2" class="half-width-input"
                                value="<?php echo $existingDateCheckin2; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="date_checkout2">Date Checkout :</label>
                            <input type="date" id="date_checkout2" name="date_checkout2" class="half-width-input"
                                value="<?php echo $existingDateCheckout2; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="hotel2">Hôtel :</label>
                            <select id="hotel2" name="hotel2" class="half-width-input" required>
                                <?php
                                // Fetch and display hotel options from the database
                                // Ensure to set the selected option based on $existingHotel2Id
                                $sql_hotels = "SELECT * FROM hotels";
                                $result_hotels = mysqli_query($conn, $sql_hotels);
                                while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                                    $selected = ($row_hotel['id'] == $existingHotel2Id) ? 'selected' : '';
                                    echo "<option value='" . $row_hotel['id'] . "' $selected>" . $row_hotel['nom'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="input-group">
                            <label for="nombre_nuit">Nombre de nuitées :</label>
                            <input type="number" id="nombre_nuit" name="nombre_nuit" class="half-width-input"
                                value="<?php echo $existingNombreNuit2; ?>" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="price-inputs">
                <h3>Prix Hors Promo <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content">
                    <br>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_quadruple">Chambre quadruple:</label>
                            <input type="number" id="prix_chambre_quadruple" name="prix_chambre_quadruple"
                                class="price-input" value="<?php echo $existingPrixChambreQuadruple; ?>" required>
                        </div>

                        <div class="input-group">
                            <label for="prix_chambre_triple">Chambre triple:</label>
                            <input type="number" id="prix_chambre_triple" name="prix_chambre_triple" class="price-input"
                                value="<?php echo $existingPrixChambreTriple; ?>" required>
                        </div>
                    </div>

                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_double">Chambre double:</label>
                            <input type="number" id="prix_chambre_double" name="prix_chambre_double" class="price-input"
                                value="<?php echo $existingPrixChambreDouble; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="prix_chambre_single">Chambre single:</label>
                            <input type="number" id="prix_chambre_single" name="prix_chambre_single" class="price-input"
                                value="<?php echo $existingPrixChambreSingle; ?>" required>
                        </div>
                    </div>

                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="child_discount">Réduction enfant :</label>
                            <input type="number" id="child_discount" name="child_discount" class="price-input"
                                value="<?php echo $existingChildDiscount; ?>" required>
                        </div>
                        <div class="input-group">
                            <label for="prix_bebe">Tarif bébé :</label>
                            <input type="number" id="prix_bebe" name="prix_bebe" class="price-input"
                                value="<?php echo $existingPrixBebe; ?>" required>
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
                            <input type="number" id="prix_chambre_quadruple_promo" name="prix_chambre_quadruple_promo"
                                class="price-input" value="<?php echo $existingPrixChambreQuadruplePromo; ?>">
                        </div>
                        <div class="input-group">
                            <label for="prix_chambre_triple_promo">Chambre triple:</label>
                            <input type="number" id="prix_chambre_triple_promo" name="prix_chambre_triple_promo"
                                class="price-input" value="<?php echo $existingPrixChambreTriplePromo; ?>">
                        </div>
                    </div>
                    <div class="half-width-inputs">
                        <div class="input-group">
                            <label for="prix_chambre_double_promo">Chambre double:</label>
                            <input type="number" id="prix_chambre_double_promo" name="prix_chambre_double_promo"
                                class="price-input" value="<?php echo $existingPrixChambreDoublePromo; ?>">
                        </div>
                        <div class="input-group">
                            <label for="prix_chambre_single_promo">Chambre single:</label>
                            <input type="number" id="prix_chambre_single_promo" name="prix_chambre_single_promo"
                                class="price-input" value="<?php echo $existingPrixChambreSinglePromo; ?>">
                        </div>
                    </div>
                </div>
            </div>

            <div class="price-inputs">
                <h3>Programme <span class="toggle-icon">+</span></h3>
                <div class="collapsible-content">
                    <br>
                    <label for="description">Programme:</label>
                    <textarea id="description" name="description" rows="6" required>
                    <?php echo $existingDescription; ?> 
                </textarea>
                    <script>
                        CKEDITOR.replace('description');
                    </script>
                </div>
            </div>

            <button type="submit">Mettre à jour Formule</button>
        </form>
    </div>

    <script>
        // 1. JavaScript for collapsible sections
        document.addEventListener('DOMContentLoaded', function () { // Ensure DOM is loaded

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

        packageSelect.addEventListener('change', function () {
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