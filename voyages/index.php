<?php
include '../db.php'; // Include your database connection file

// Fetch packages
$packagesQuery = "SELECT * FROM omra_packages";
$packagesResult = $conn->query($packagesQuery);

// Initialize an array to hold packages and their formules
$packages = [];
if ($packagesResult->num_rows > 0) {
  while ($package = $packagesResult->fetch_assoc()) {
    $packageId = $package['id'];

    // Fetch formules for the current package
    $formulesQuery = "
            SELECT f.*, t.nom as type_nom, h.etoiles 
            FROM formules f
            LEFT JOIN type_formule_omra t ON f.type_id = t.id
            LEFT JOIN hebergements e ON f.id = e.formule_id
            LEFT JOIN hotels h ON e.hotel_id = h.id
            WHERE f.package_id = $packageId AND f.statut = 'activé'
            GROUP BY f.id
        ";
    $formulesResult = $conn->query($formulesQuery);

    $formules = [];
    if ($formulesResult->num_rows > 0) {
      while ($formule = $formulesResult->fetch_assoc()) {
        $formules[] = $formule;
      }
    }

    $package['formules'] = $formules;
    $packages[] = $package;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Voyages</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .city-card {
            width: 350px;
            height: 220px;
            background-size: cover;
            background-position: center;
            position: relative;
            cursor: pointer;
            margin-bottom: 10px;
        }
        .city-card .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.3); /* Light black transparent filter */
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .card-body {
            position: relative;
            color: white;
        }
        .card-body h1 {
            margin: 0;
            font-size: 24px;
        }
        .card-body p {
            margin-top: auto; /* Push the "En savoir plus" to the bottom */
            padding-bottom: 10px;
        }
        .container-cards {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            margin-top: 50px;
        }
        .formule-card {
            flex: 0 0 30%; /* Adjust flex basis */
            max-width: 50%;
            margin: 10px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background-color: white;
            text-align: center;
        }
        .collapse-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            width: 100%;
            margin-bottom: 15px;
        }
        .collapse-wrapper {
            width: 100%;
        }
        .collapse-full-width {
            width: 100%;
            background: transparent;
        }
        @media (max-width: 768px) {
            .city-card {
                flex: 0 0 100%;
                max-width: 100%;
            }
            .formule-card {
                flex: 0 0 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $activeClass = 'active';
        foreach ($packages as $package) {
            echo '<div class="carousel-item ' . $activeClass . '">';
            echo '<img style="height:480px; object-fit:cover; background-position:50%;" src="../'. $package['photo'] .'" class="d-block w-100" alt="' . $package['nom'] . '">';
            echo '</div>';
            $activeClass = '';
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="container container-cards">
    <div class="row">
        <?php foreach ($packages as $package): ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="city-card" style="background-image: url('../<?php echo $package['photo']; ?>');" data-toggle="collapse" data-target="#packageCollapse<?php echo $package['id']; ?>" aria-expanded="false" aria-controls="packageCollapse<?php echo $package['id']; ?>">
                    <div class="overlay">
                        <div class="card-body">
                            <h1 class="card-title"><?php echo $package['nom']; ?></h1>
                            <p>EN SAVOIR PLUS&nbsp;&nbsp;<i class="fa-solid fa-angle-down"></i></p>
                        </div>
                    </div>
                </div>
                <div class="collapse-wrapper" >
                    <div class="collapse collapse-full-width" id="packageCollapse<?php echo $package['id']; ?>">
                        <div class="container collapse-container">
                            <div class="row">
                                <?php if (!empty($package['formules'])): ?>
                                    <?php foreach ($package['formules'] as $formule): ?>
                                        <div class="formule-card">
                                            <p>Type de formule: <?php echo $formule['type_nom']; ?></p>
                                            <p>Durée de séjour: <?php echo $formule['duree_sejour']; ?></p>
                                            <p>Aller: <?php echo $formule['date_depart']; ?></p>
                                            <p>Retour: <?php echo $formule['date_retour']; ?></p>
                                            <p>Hotel stars: <?php echo $formule['etoiles']; ?></p>
                                            <p>Prix Chambre quadruple: <?php echo $formule['prix_chambre_quadruple']; ?> EUR</p>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <p class="col-12">Aucune formule disponible.</p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script>
$(document).ready(function() {
    $('.city-card').on('click', function() {
        $('.collapse').collapse('hide');
        $($(this).data('target')).collapse('toggle');
    });
});
</script>

</body>
</html>
