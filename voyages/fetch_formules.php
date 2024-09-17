<style>
    .formule-cards {
        display: flex;
        justify-content: space-between;
        align-items: center;
        border: 1px solid #e7e7e7;
        padding: 15px;
        margin-bottom: 10px;
        background-color: #fdfdfd;
        border-radius: 10px;
        box-shadow: rgba(25, 25, 25, 0.25) 0px 5px 5px -5px, rgba(0, 0, 0, 0.2) 0px 8px 16px -8px;
        color: #8b8b8b;
        max-height: 500px;
    }

    .formule-cards:hover {
        background-color: #F7F2E8;
        border: 1px solid #DDC395;
        transition: 0.3s;
        cursor: pointer;

    }

    .formule-date-returns {
        margin-bottom: 0px !important;

    }

    .formule-dates {
        margin-bottom: 0px !important;

    }

    .formule-dates {
        flex: 1;
        text-align: left;
    }

    .formule-date-returns {
        flex: 1;
        text-align: center;
    }

    .formule-prices {
        flex: 1;
        text-align: right;
        margin: 0;

    }

    img {
        width: 100px;
        margin-left: auto;
        margin-right: 0;
    }

    .top-bar {
        background-color: #d9c294;
        color: #000;
        padding: 7px 15px 5px 15px;
        border-radius: 5px;
        font-weight: bold;
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
    }

    a {
        text-decoration: none;
    }

    a:hover {
        text-decoration: none;
    }

    p {
        margin: 0px;
    }

    @media (max-width:768px) {
        .formule-dates {
            flex: 1;
            text-align: left;
            display: grid;
            font-size: 0.75rem;
        }

        .formule-date-returns {
            flex: 1;
            text-align: left;
            display: grid;
            font-size: 0.75rem;
        }

        .formule-prices {
            font-size: 0.75rem;
        }

        .comar {
            font-size: 0.75rem;
        }

        .modal-header .btn-close {
            width: fit-content;
            padding-right: 25px;
        }
    }

    @media (max-width:400px) {
        img {
            width: 60px;
            margin-left: auto;
            margin-right: 0;
        }

        .formule-dates {
            flex: 1;
            text-align: left;
            display: grid;
            font-size: 0.65rem;
        }

        .formule-date-returns {
            flex: 1;
            text-align: left;
            display: grid;
            font-size: 0.65rem;
        }

        .formule-prices {
            font-size: 0.65rem;
        }

        .comar {
            font-size: 0.65rem;
        }
    }
</style>
<div class="top-bar">
    <p class="formule-dates">• Depart</p>
    <p class="formule-date-returns">• Retour</p>
    <p class="comar">• Compagnie Aérienne</p>
    <p class="formule-prices">&euro; Prix</p>
</div>
<?php
include '../db.php'; // Include your database connection file

if (isset($_GET['type_id']) && isset($_GET['package_id'])) {
    $typeId = intval($_GET['type_id']);
    $packageId = intval($_GET['package_id']);

    // Debug output to check passed values
    error_log("Type ID: $typeId, Package ID: $packageId");

    // Fetch formules
    $formulesQuery = "
    SELECT f.*, t.nom as type_nom, h.etoiles 
    FROM formules f
    LEFT JOIN type_formule_omra t ON f.type_id = t.id
    LEFT JOIN hebergements e ON f.id = e.formule_id
    LEFT JOIN hotels h ON e.hotel_id = h.id
    WHERE f.package_id = $packageId AND f.type_id = $typeId AND f.statut = 'activé'
    ORDER BY f.date_depart ASC
    ";

    $formulesResult = $conn->query($formulesQuery);

    // Initialize array to store unique formules
    $uniqueFormules = [];

    if ($formulesResult->num_rows > 0) {
        while ($formule = $formulesResult->fetch_assoc()) {
            $formuleId = $formule['id'];

            // Check if the formule ID is already in the array
            if (!isset($uniqueFormules[$formuleId])) {
                // Add to array if not already present
                $uniqueFormules[$formuleId] = $formule;

                $dayNames = ['Sun' => 'Dim', 'Mon' => 'Lun', 'Tue' => 'Mar', 'Wed' => 'Mer', 'Thu' => 'Jeu', 'Fri' => 'Ven', 'Sat' => 'Sam'];
                $dateString = $formule['date_depart'];
                $timestamp = strtotime($dateString);

                $dateStringret = $formule['date_retour'];
                $timestampret = strtotime($dateStringret);

                $dayOfWeek = date('D', $timestamp); // Get abbreviated day of week
                $formattedDate = date('d-m-Y', $timestamp);

                $dayOfWeekret = date('D', $timestampret); // Get abbreviated day of week
                $formattedDateret = date('d-m-Y', $timestampret);

                // Fetch the logo based on the current formule's id
                $sql_logo = "SELECT c.logo 
                    FROM vols v 
                    JOIN compagnies_aeriennes c ON v.compagnie_aerienne_id = c.id 
                    WHERE v.formule_id = ? 
                    LIMIT 1";
                $stmt_logo = mysqli_prepare($conn, $sql_logo);
                mysqli_stmt_bind_param($stmt_logo, "i", $formule['id']);
                mysqli_stmt_execute($stmt_logo);
                $result_logo = mysqli_stmt_get_result($stmt_logo);

                $comp_logo = mysqli_fetch_assoc($result_logo);
                $logo_path = isset($comp_logo['logo']) ? $comp_logo['logo'] : 'default-logo.png'; // Provide a default logo if none found

                echo '            
                <a href="formule.php?id=' . $formule['id'] . '">
                <div class="formule-cards">           
                    <p class="formule-dates"><b>' . $dayNames[$dayOfWeek] . '</b> ' . $formattedDate . '</p>
                    <p class="formule-date-returns"><b>' . $dayNames[$dayOfWeekret] . '</b> ' . $formattedDateret . '</p>
                    <img src="../' . $logo_path . '" alt="Logo de la compagnie aérienne">
                    <h5 class="formule-prices" style="color: #000;">' . intval($formule['prix_chambre_quadruple']) . ' &euro;</h5>
                </div></a>';
            }
        }
    } else {
        echo '<p>Aucune formule disponible pour ce type.</p>';
    }
}
?>