<!DOCTYPE html>
<html lang="fr">

<head>
    </head>
<body>
  <main class="container py-5">
    <div class="row espace">
        <?php
        include 'db.php';

        $sql = "SELECT * FROM omra_packages";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row_package = mysqli_fetch_assoc($result)) {
                $package_id = $row_package['id'];
                ?>

                <div class="card cardnew col-md-3">
                    <figure class="card__thumbnailnew">
                        <img src="<?php echo $row_package['photo']; ?>" class="card-img-top" alt="<?php echo $row_package['nom']; ?>">
                        <span class="card__titlenew"><?php echo $row_package['nom']; ?> <br>
                            <button class="btn btn-link" data-bs-toggle="modal" data-bs-target="#autreDatesModal<?php echo $package_id; ?>">
                                En savoir plus
                            </button>
                        </span>
                    </figure>
                </div>

                <div class="modal fade modal-updates" id="autreDatesModal<?php echo $package_id; ?>" tabindex="-1" aria-labelledby="autreDatesModalLabel<?php echo $package_id; ?>" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                        <div class="modal-content modal-updates">
                            <div class="modal-header">
                                <h5 class="modal-title" id="autreDatesModalLabel<?php echo $package_id; ?>">Formules</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <ul class="nav nav-tabs" id="packageTabs<?php echo $package_id; ?>" role="tablist">
                                    <?php
                                    $sql_types_formules = "SELECT * FROM type_formule_omra WHERE formule_parent_id = $package_id";
                                    $result_types_formules = mysqli_query($conn, $sql_types_formules);

                                    $active = "active"; 
                                    if (mysqli_num_rows($result_types_formules) > 0) {
                                        while ($row_type_formule = mysqli_fetch_assoc($result_types_formules)) {
                                            $type_id = $row_type_formule['id'];
                                            ?>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link <?php echo $active; ?>" id="type-tab<?php echo $type_id; ?>" data-bs-toggle="tab" data-bs-target="#tabContent<?php echo $type_id; ?>" type="button" role="tab" aria-controls="tabContent<?php echo $type_id; ?>" aria-selected="true">
                                                    <?php echo $row_type_formule['nom']; ?>
                                                </button>
                                            </li>
                                            <?php
                                            $active = ""; 
                                        } 
                                    } else {
                                        echo "<p>Aucun type de formule disponible pour ce package pour le moment.</p>";
                                    }
                                    ?>
                                </ul>

                                <div class="tab-content" id="myTabContent<?php echo $package_id; ?>">
                                    <?php
                                    $active = "show active"; 
                                    // Reset the database result pointer to the beginning
                                    mysqli_data_seek($result_types_formules, 0); 

                                    if (mysqli_num_rows($result_types_formules) > 0) {
                                        while ($row_type_formule = mysqli_fetch_assoc($result_types_formules)) {
                                            $type_id = $row_type_formule['id'];
                                            ?>
                                            <div class="tab-pane fade <?php echo $active; ?>" id="tabContent<?php echo $type_id; ?>" role="tabpanel" aria-labelledby="type-tab<?php echo $type_id; ?>">
                                                <div class="form-group mb-4">
                                                    </div>
                                                <?php
                                                $sql_formules = "SELECT * FROM formules WHERE type_id = $type_id AND package_id = $package_id AND statut = 'activé' ORDER BY prix_chambre_quadruple ASC";
                                                $result_formules = mysqli_query($conn, $sql_formules);
                                                $formules = [];
                                                while ($row_formule = mysqli_fetch_assoc($result_formules)) {
                                                    $formules[] = $row_formule;
                                                }
                                                $formule_moins_chere = $formules[0];

                                                foreach ($formules as $row_formule) {
                                                    ?>
                                                    <div class="card col-md-12 formule-item">
                                                        <a href="showformule.php?formule_id=<?php echo $row_formule['id']; ?>" class="card-body d-flex justify-content-between align-items-center">
                                                            <div class="departure-info ">
                                                                <?php
                                                                // Fetch city name from ville_depart table
                                                                $villeDepartId = $row_formule['ville_depart_id'];
                                                                $sqlVilleDepart = "SELECT nom FROM ville_depart WHERE id = $villeDepartId";
                                                                $resultVilleDepart = mysqli_query($conn, $sqlVilleDepart);
                                                                $villeDepart = mysqli_fetch_assoc($resultVilleDepart);
                                                                ?>
                                                                <span class="city-badge badge bg-secondary"><?php echo $villeDepart['nom']; ?></span>
                                                                <span> <i class="fas fa-plane-departure"></i>
                                                                    <b class="delete">Aller:</b>
                                                                    <?php echo date('d-m-Y', strtotime($row_formule['heure_depart'])); ?><br>
                                                                    <i class="fas fa-plane-arrival"></i>
                                                                    <b class="delete">Retour:</b>
                                                                    <?php echo date('d-m-Y', strtotime($row_formule['date_checkout2'])); ?>
                                                                </span>
                                                            </div>

                                                            <div class="price-info ">
                                                                <span> à partir <br><?php
                                                                $price = $formule_moins_chere['prix_chambre_quadruple'];
                                                                $formatted_price = number_format($price, 0, ',', ' '); 
                                                                echo $formatted_price . " €";
                                                                ?></span>

                                                                <?php
                                                                // Fetch airline logo from compagnies_aeriennes table
                                                                $airline_id = $row_formule['compagnie_aerienne_id'];
                                                                $sql_airline = "SELECT logo FROM compagnies_aeriennes WHERE id = $airline_id";
                                                                $result_airline = mysqli_query($conn, $sql_airline);
                                                                $airline_data = mysqli_fetch_assoc($result_airline);
                                                                ?>
                                                                <?php if (!empty($airline_data['logo'])): ?>
                                                                    <img src="<?php echo $airline_data['logo']; ?>" alt="Airline Logo" class="airline-logo">
                                                                <?php endif; ?>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <?php
                                                } 
                                                ?>
                                            </div>
                                            <?php
                                            $active = ""; 
                                        } 
                                    } 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            } // End of the package loop
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
