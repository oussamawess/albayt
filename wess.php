<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "albayt";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch all Omra packages
$sql_packages = "SELECT * FROM omra_packages";
$result_packages = mysqli_query($conn, $sql_packages);
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omra Packages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-4vD1HlZu6+YxvY2k3wuNv5M0stt41LJl6LidP6H9MVXy1HfTm0pCLyOg2j0/yDLVPe2fxJ1CwXO2xLZJHEG9Lg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .card-body a {
            text-decoration: none !important;
            /* Remove underline */
            color: inherit !important;
            /* Use the default text color */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .card {
            background-color: #FFF;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 20px 50px 0 rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            padding: 1.25rem;
            position: relative;
            transition: .15s ease-in;
        }

        .card.cardnew {
            position: relative;
            overflow: hidden;
            display: flex;
            border-radius: 4px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.56s ease-in-out;
        }

        .card.cardnew:hover {
            cursor: pointer;
            box-shadow: 0 24px 38px 3px rgba(0, 0, 0, 0.14), 0 9px 46px 8px rgba(0, 0, 0, 0.12), 0 11px 15px -7px rgba(0, 0, 0, 0.2);
        }

        .card__titlenew {
            position: absolute;
            bottom: 10% !important;
            left: 50% !important;
            transform: translate(-50%, 50%);
            color: rgba(255, 255, 255, 0.90);
            font-size: 1.5rem;
            line-height: 1;
            font-weight: 400;
            text-align: center;
            z-index: 2;
            margin-bottom: 0.5em;
        }

        .card__thumbnailnew {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .card__thumbnailnew::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
            z-index: 1;
        }

        .card__thumbnailnew>img {
            height: 100%;
        }

        .card a {
            text-decoration: none;
            color: inherit;
        }

        .modal .card-container {
            background-color: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-bottom: 10px;
        }

        .modal .card-container:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .modal .card-body {
            padding: 15px;
        }

        .modal .departure-info,
        .modal .arrival-info {
            display: flex;
            align-items: left;
            flex-direction: column;
        }

        .modal .city-badge {
            background-color: #007bff;
            color: white;
            font-size: 0.8rem;
            border-radius: 20px;
            padding: 4px 8px;
            margin-right: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal .departure-info strong,
        .modal .arrival-info strong {
            font-size: 1rem;
            font-weight: 500;
        }

        .modal .price-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .modal .price-info span {
            font-size: 1.1rem;
            font-weight: 600;
            margin-right: 10px;
        }

        .modal .airline-logo {
            max-width: 50px;
            filter: grayscale(30%);
            transition: filter 0.3s ease;
        }

        .modal .card-container:hover .airline-logo {
            filter: grayscale(0%);
        }

        .btn-primary {
            color: #fff;
            background-color: #dac392;
            border-color: #dac392;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #000;
            border-color: #dac392;
        }

        .card.col-md-12 {
            margin-bottom: 1em;
            color: #000 !important;
        }

        

        @media (min-width: 1200px) {
            .container {
                max-width: 1300px;
            }
        }

        @media (min-width: 576px) {
            .espace {
                padding-left: 7em;
            }

            .card.col-md-3 {
                margin-left: 1em;
                margin-right: 1em;
                margin-bottom: 2em;
            }

            .modal-dialog {
                max-width: 50em !important;
                margin: 1.75rem auto;
            }

            .modal-body.row.text-center {
                margin: 15px;
            }

            .card.col-md-5.justify-content-center {
                margin-left: 3em;
            }

            .departure-info {
                display: contents !important;
            }
        }

        .card-body-new {
            text-align: left;
        }

        @media (max-width: 576px) {
            .card.col-md-5.justify-content-center {
                width: 90%;
                margin-left: 1em;
                margin-bottom: 2em;
                margin-top: 1em;
            }

            b.delete {
                display: none;
            }

            i.fas.fa-plane-departure {
                margin-top: 8px;
            }

            .modal-content.modal-updates {
                height: 50em !important;
            }
        }


        .card.cardnew.col-md-3 {
            padding: 0px !important;
        }

        .card.cardnew.col-md-3 {
            margin-bottom: 2em;
        }

        .modal-updates {
            max-height: 100%;
            min-height: 41em !important;
            overflow: hidden;
        }

        svg.icon {
            width: 30px;
            height: 30px;
            color: #dac392;
            float: left
        }

        h5.card-title {
            margin-bottom: 1em;
        }

        h5.card-title {
            text-align: center;
        }

        .card.col-md-5.justify-content-center {
            border-color: #F4F4F4;
        }

        .card.col-md-5.justify-content-center:hover {
            border-color: #DDC395;
            background-color: #F7F2E8;
        }

        button.btn.btn-secondary {
            background-color: #fff0;
            color: #000;
        }

        button.btn.btn-secondary:hover {
            background-color: #000;
            color: #fff;
        }

        p.label {
            margin-left: 3em;
        }

        .btn-primary:hover {
            color: #fff !important;
            background-color: #000;
            border-color: #dac392;
        }

        span.city-badge.badge.bg-secondary {
            background-color: #000 !important;
        }

        .card.col-md-12 {
            margin-bottom: 1em;
            color: #000 !important;
            border-color: #ceab63;
        }

        .card.col-md-12:hover {
            background-color: #F7F2E8
        }
    </style>
</head>

<body>
    <main class="container mt-5">
        <h1 class="text-center">Omra Packages</h1>
        <div class="accordion" id="omraPackagesAccordion">
            <?php
            if (mysqli_num_rows($result_packages) > 0) {
                while ($package = mysqli_fetch_assoc($result_packages)) {
                    $package_id = $package['id'];
                    $package_name = $package['nom'];
                    $package_description = $package['description'];
                    $package_photo = $package['photo'];
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="heading<?php echo $package_id; ?>">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                data-bs-target="#collapse<?php echo $package_id; ?>" aria-expanded="true"
                                aria-controls="collapse<?php echo $package_id; ?>">
                                <?php echo $package_name; ?>
                            </button>
                        </h2>
                        <div id="collapse<?php echo $package_id; ?>" class="accordion-collapse collapse show"
                            aria-labelledby="heading<?php echo $package_id; ?>" data-bs-parent="#omraPackagesAccordion">
                            <div class="accordion-body">
                                <div class="card mb-3">
                                    <img src="<?php echo $package_photo; ?>" class="card-img-top" alt="<?php echo $package_name; ?>">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $package_name; ?></h5>
                                        <p class="card-text"><?php echo $package_description; ?></p>

                                        <?php
                                        // Fetch types for this package
                                        $sql_types = "SELECT * FROM type_formule_omra WHERE formule_parent_id = $package_id";
                                        $result_types = mysqli_query($conn, $sql_types);

                                        if (mysqli_num_rows($result_types) > 0) {
                                            while ($type = mysqli_fetch_assoc($result_types)) {
                                                $type_id = $type['id'];
                                                $type_name = $type['nom'];
                                                ?>
                                                <div class="card mb-3">
                                                    <div class="card-header">
                                                        <h5><?php echo $type_name; ?></h5>
                                                    </div>
                                                    <div class="card-body">
                                                        <?php
                                                        // Fetch formulas for this type
                                                        $sql_formulas = "SELECT * FROM formules WHERE type_id = $type_id  AND package_id = $package_id AND statut = 'activé' ORDER BY prix_chambre_quadruple ASC";
                                                        $result_formulas = mysqli_query($conn, $sql_formulas);

                                                        if (mysqli_num_rows($result_formulas) > 0) {
                                                            ?>
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="d-flex flex-wrap">
                                                                        <?php
                                                                        while ($formule = mysqli_fetch_assoc($result_formulas)) {
                                                                            $formule_id = $formule['id'];
                                                                            $date_depart = $formule['date_depart'];
                                                                            $duree_sejour = $formule['duree_sejour'];
                                                                            ?>
                                                                            <div class="card m-2 formule-item" style="width: 18rem;">
                                                                                <div class="card-body">
                                                                                    <h5 class="card-title">
                                                                                        Date de départ: <?php echo $date_depart; ?>
                                                                                    </h5>
                                                                                    <p class="card-text">
                                                                                        Durée du séjour: <?php echo $duree_sejour; ?>
                                                                                    </p>
                                                                                    <a href="#autreDatesModal<?php echo $formule_id; ?>"
                                                                                        class="btn btn-primary" data-bs-toggle="modal">
                                                                                        Voir plus
                                                                                    </a>
                                                                                </div>
                                                                            </div>

                                                                            <!-- Modal for more details -->
                                                                            <div class="modal fade"
                                                                                id="autreDatesModal<?php echo $formule_id; ?>" tabindex="-1"
                                                                                aria-labelledby="autreDatesModalLabel<?php echo $formule_id; ?>"
                                                                                aria-hidden="true">
                                                                                <div class="modal-dialog modal-lg">
                                                                                    <div class="modal-content">
                                                                                        <div class="modal-header">
                                                                                            <h5 class="modal-title"
                                                                                                id="autreDatesModalLabel<?php echo $formule_id; ?>">
                                                                                                Plus de détails
                                                                                            </h5>
                                                                                            <button type="button" class="btn-close"
                                                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                                                        </div>
                                                                                        <div class="modal-body">
                                                                                            <?php
                                                                                            // Fetch related flight details
                                                                                            $sql_flights = "SELECT * FROM vols WHERE formule_id = $formule_id";
                                                                                            $result_flights = mysqli_query($conn, $sql_flights);

                                                                                            if (mysqli_num_rows($result_flights) > 0) {
                                                                                                while ($flight = mysqli_fetch_assoc($result_flights)) {
                                                                                                    $airline_id = $flight['compagnie_aerienne_id'];
                                                                                                    $sql_airline = "SELECT * FROM compagnies_aeriennes WHERE id = $airline_id";
                                                                                                    $result_airline = mysqli_query($conn, $sql_airline);
                                                                                                    $airline_data = mysqli_fetch_assoc($result_airline);
                                                                                                    ?>
                                                                                                    <div class="d-flex align-items-center mb-2">
                                                                                                        <div class="me-3">
                                                                                                            <span
                                                                                                                class="badge bg-secondary city-badge"><?php echo $flight['ville_depart_id']; ?></span>
                                                                                                        </div>
                                                                                                        <div class="me-3">
                                                                                                            <?php echo $flight['num_vol']; ?>
                                                                                                        </div>
                                                                                                        <div>
                                                                                                            <?php if (!empty($airline_data['logo'])): ?>
                                                                                                                <img src="<?php echo $airline_data['logo']; ?>"
                                                                                                                    alt="Airline Logo"
                                                                                                                    class="airline-logo">
                                                                                                            <?php endif; ?>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <?php
                                                                                                }
                                                                                            } else {
                                                                                                echo "<p>Aucun vol disponible pour cette formule.</p>";
                                                                                            }
                                                                                            ?>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        } else {
                                                            echo "<p>Aucune formule disponible pour ce type.</p>";
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        } else {
                                            echo "<p>Aucun type de formule disponible pour ce package pour le moment.</p>";
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p>Aucun package Omra disponible pour le moment.</p>";
            }
            mysqli_close($conn);
            ?>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
