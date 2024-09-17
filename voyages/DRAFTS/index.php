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
      ORDER BY f.date_depart ASC
    ";

    $formulesResult = $conn->query($formulesQuery);

    $formules = [];
    if ($formulesResult->num_rows > 0) {
      while ($formule = $formulesResult->fetch_assoc()) {
        $formules[] = $formule;
      }
    }

    // Deduplicate formules if necessary
    $uniqueFormules = [];
    foreach ($formules as $formule) {
      if (!isset($uniqueFormules[$formule['type_id']])) {
        $uniqueFormules[$formule['type_id']] = $formule;
      }
    }
    $package['formules'] = array_values($uniqueFormules);
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
    @font-face {
      font-family: 'Belly Display';
      src: url('fonts/f05f148ec6596f0b75375fa566aaf1fe.woff') format('woff'),
        url('fonts/f05f148ec6596f0b75375fa566aaf1fe.ttf') format('truetype');
      font-display: swap;
      font-style: normal;
      font-weight: 400;
    }

    h1 {
      font-family: 'Belly Display', sans-serif;
    }




    body {
      background-color: #f8f9fa;
    }

    .city-card-desktop {
      width: 350px;
      height: 220px;
      background-size: cover;
      background-position: center;
      position: relative;
      cursor: pointer;
      margin-bottom: 0px;
    }

    .city-card-desktop .overlay {
      transition: box-shadow 0.3s ease-in-out;
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-color: rgba(0, 0, 0, 0.3);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      text-align: center;
    }

    .city-card-desktop .overlay:hover {
      box-shadow: inset 0px 0px 0px 10px #16b5e9;
    }

    .btn {
      border: 0;
      background-color: #d9c294;
      border-radius: 15px;
      color: white;
      padding: 3px 10px;
      font-size: 13px;
      margin-top: 6px;
    }

    .btn-offre {
      width: 100%;
      justify-content: space-between;
      border: 0;
      background-color: #d9c294;
      border-radius: 15px;
      color: white;
      padding: 5px 10px;
      font-size: 13px;
      display: flex;
    }

    .btn-offre:hover {
      color: black;
      text-decoration: none;
    }

    .card-body {
      position: absolute;
      color: white;
    }

    .card-body h1 {
      margin: 0;
      font-size: 2rem;
    }

    .card-body p {
      margin-top: auto;
      padding-bottom: 10px;
    }

    .container-cards {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      margin-top: 50px;
    }

    .modal-body {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .rox-desktop {
      display: flex;
      flex-wrap: wrap;

      width: 100%;
    }

    .formule-card {
      width: 45%;
      margin: 10px;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background-color: white;
      text-align: left;
      box-sizing: border-box;
    }

    .modal-content {
      width: 100%;
      min-height: 30em;
      max-width: 60%;
      margin: auto;
      /* Center horizontally */
    }

    div#formulesContent {
      width: 100%;
    }

    p {
      margin-top: 0;
      margin-bottom: 0.7em !important;
    }

    .formule-card {
      box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 20px 50px 0 rgba(0, 0, 0, 0.1);
      border-radius: 30px;
    }

    .formule-card:hover {
      border-color: #DDC395;
      background-color: #F7F2E8;
    }

    @media (min-width: 1199px) {
      .rox-mobile {
        display: none;
      }

      .hidedx {
        display: none !important;
      }


    }

    @media (max-width: 1000px) {
      .rox-desktop {
        display: none;
      }

      .formule-card {
        width: 100%;
      }

      .modal-content {
        width: 100%;
        min-height: 32em;
        max-width: 100%;
        margin: auto;
      }

      b {
        font-size: 30px;
      }

      p {
        font-size: 25px;
        margin-bottom: 0.3em !important;
      }

      .h4,
      h4 {
        font-size: 3rem;
      }

      .modal-title {
        margin-bottom: 0;
        line-height: 1.5;
        font-size: 35px;
      }

      i.fa-solid.fa-circle-chevron-right {
        font-size: 35px !important;
      }

      h5.formule-prices {
        font-size: 25px !important;

      }

      .hidemb {
        display: none !important;
      }

      .hidedx {
        display: block !important;
      }

      .boig {
        min-height: 55vh;
      }

      button.close {
        font-size: 35px;
      }

      i.fa-regular.fa-calendar {
        font-size: 30px;
      }

      h5 {
        font-size: 30px;
      }
    }

    .formule-card {
      margin-bottom: 1em;
    }

    @media (min-width: 576px) {
      .modal-dialog {
        max-width: 80%;
      }
    }

    @media (max-width: 576px) {
      .modal-dialog {
        max-width: 80%;
        margin: 1.75rem auto;
      }

      .modal-content {
        min-height: 55em;
        min-width: 100%;

      }

      .modal-content {
        width: 100%;
        min-height: 32em;
        max-width: 100%;
        margin: auto;
      }




    }

    @media (min-width: 768px) {
      .col-md-4 {
        flex: 0 0 50% !important;
        max-width: 100%;
      }

      .city-card {
        width: 100%;
        height: 400px;
        background-size: cover;
        background-position: center;
        position: relative;
        cursor: pointer;
        margin-bottom: 0px;
      }

      .city-card .overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        text-align: center;
      }

      .rox-mobile {
        width: 100% !important;
      }

      .container-mobile {
        max-width: 100%;
      }

      .card-body-mobile {
        position: absolute;
        color: white;
      }

      .card-body-mobile h1 {
        margin: 0;
        font-size: 5rem;
      }

      .card-body-mobile p {
        margin-top: auto;
        padding-bottom: 10px;
        font-size: 2rem;
      }



    }

    @media (max-width: 768px) {
      .city-card {
        flex: 0 0 100%;
        max-width: 100%;
      }

      .rox-mobile {
        display: grid !important;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
        width: 100%;

      }

      .formule-card {
        width: 100% !important;
      }

      .city-card {
        min-height: 10em;
      }

      .card-body-mobile {
        justify-content: center;
        text-align: center;
        align-content: center;
        padding-top: 1em;
      }

      .modal-content {
        width: 100%;
        min-height: 32em;
        max-width: 100%;
        margin: auto;
      }
    }

    @media (min-width: 768px) {
      .col-md-4 {
        flex: 0 0 50% !important;
        max-width: 100%;
        margin: 0px;
        padding: 0px;
      }
    }

    .rox-desktop {
      width: 100% !important;
    }

    .city-card-desktop {
      width: 100% !important;
      height: 220px;
      background-size: cover;
      background-position: center;
      position: relative;
      cursor: pointer;
      margin-bottom: 0px;
    }

    .desct {
      text-align: center;
      justify-content: center;
      margin-bottom: 2em;
    }
  </style>
</head>

<body>

  <!--
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      $activeClass = 'active';
      foreach ($packages as $package) {
        echo '<div class="carousel-item ' . $activeClass . '">';
        echo '<img style="height:480px; object-fit:cover; background-position:50%;" src="../' . $package['photo'] . '" class="d-block w-100" alt="' . $package['nom'] . '">';
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
    -->



  <div class="container container-cards">
    <div class="desct">
      <h1>Nos villes de départ
      </h1>
      <h5>Effectuez <b>votre simulation </b> pour votre projet de <b>Omra 2024-2025</b> en choisissant <b>votre
          ville
          de départ.</b>
        <br>
        Vous y découvrirez nos deux formules disponibles, <u> Essentielle </u> et <u>Confort</u>, adaptées à vos
        besoins.
      </h5>
    </div>
    <div class="rox-desktop">
      <?php foreach ($packages as $package): ?>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="city-card-desktop" style="background-image: url('../<?php echo $package['photo']; ?>');"
            onclick="showModal('packageModal<?php echo $package['id']; ?>')">
            <div class="overlay">
              <div class="card-body">
                <h1 class="card-title"><?php echo $package['nom']; ?></h1>
                <p>EN SAVOIR PLUS&nbsp;&nbsp;<i class="fa-solid fa-angle-down"></i></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
  <div class="container-mobile container-cards">
    <div class="rox-mobile">
      <?php foreach ($packages as $package): ?>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="city-card" style="background-image: url('../<?php echo $package['photo']; ?>');"
            onclick="showModal('packageModal<?php echo $package['id']; ?>')">
            <div class="overlay">
              <div class="card-body-mobile">
                <h1 class="card-title-mobile"><?php echo $package['nom']; ?></h1>
                <p>EN SAVOIR PLUS&nbsp;&nbsp;<i class="fa-solid fa-angle-down"></i></p>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <script>
    function showModal(id) {
      $('#' + id).modal('show');
    }

    // Handle the "AUTRES DATES" button click using event delegation
    $(document).on('click', '.btn[data-type-id]', function () {
      var typeId = $(this).data('type-id');
      var packageId = $(this).data('package-id');

      $.ajax({
        url: 'fetch_formules.php',
        type: 'GET',
        data: {
          type_id: typeId,
          package_id: packageId
        },
        success: function (response) {
          $('#formulesContent').html(response);
          $('#formulesModal').modal('show');
        }
      });
    });
  </script>

  <!-- Modal Template for Packages -->
  <?php foreach ($packages as $package): ?>
    <div class="modal fade" id="packageModal<?php echo $package['id']; ?>" tabindex="-1" role="dialog"
      aria-labelledby="packageModalLabel<?php echo $package['id']; ?>" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="packageModalLabel<?php echo $package['id']; ?>"><?php echo $package['nom']; ?>
            </h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <?php if (!empty($package['formules'])): ?>
              <?php foreach ($package['formules'] as $formule): ?>
                <div class="formule-card">

                  <p style="color: #000; font-size:20px;
    font-family: 'Belly Display';
"><b>       <?php echo $formule['type_nom']; ?></b></p>
                  <svg class="hidemb" style="float: left;" xmlns="http://www.w3.org/2000/svg" width="25" height="170"
                    viewBox="0 0 300 1000">
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #dbc293;
                        }
                      </style>
                    </defs>
                    <rect class="cls-1" x="131" y="169" width="38" height="663" />
                    <circle id="Ellipse_1_copy" data-name="Ellipse 1 copy" class="cls-1" cx="150" cy="921" r="61" />
                    <circle id="Ellipse_1_copy_2" data-name="Ellipse 1 copy 2" class="cls-1" cx="150" cy="80" r="61" />
                  </svg>
                  <svg class="hidedx" style="float: left;" xmlns="http://www.w3.org/2000/svg" width="39" height="240"
                    viewBox="0 0 300 1000">
                    <defs>
                      <style>
                        .cls-1 {
                          fill: #dbc293;
                        }
                      </style>
                    </defs>
                    <rect class="cls-1" x="131" y="169" width="38" height="663" />
                    <circle id="Ellipse_1_copy" data-name="Ellipse 1 copy" class="cls-1" cx="150" cy="921" r="61" />
                    <circle id="Ellipse_1_copy_2" data-name="Ellipse 1 copy 2" class="cls-1" cx="150" cy="80" r="61" />
                  </svg>
                  <p style="color: #d9c294;"><i class="fa-solid fa-sun">&nbsp;</i> <span style="color: #000;">
                      <?php echo $formule['duree_sejour']; ?>
                      Jour(s) </span></p>
                  <div style="margin-bottom:5px;">

                    <p>
                      <!-- <span style="color: #d9c294; font-size:20px;">•</span> -->
                      <b>Départ:</b>
                    </p>
                    <div class="depret">
                      <?php
                      $dayNames = ['Sun' => 'Dim', 'Mon' => 'Lun', 'Tue' => 'Mar', 'Wed' => 'Mer', 'Thu' => 'Jeu', 'Fri' => 'Ven', 'Sat' => 'Sam'];
                      $dateString = $formule['date_depart'];
                      $timestamp = strtotime($dateString);
                      $dateStringret = $formule['date_retour'];
                      $timestampret = strtotime($dateStringret);
                      $dayOfWeek = date('D', $timestamp); // Get abbreviated day of week
                      $formattedDate = date('d-m-Y', $timestamp);
                      $dayOfWeekret = date('D', $timestampret); // Get abbreviated day of week
                      $formattedDateret = date('d-m-Y', $timestampret);
                      ?>

                      <p style="margin-left: 10px;">
                        <?php echo $dayNames[$dayOfWeek] . ' ' . $formattedDate; ?>
                      </p>
                    </div>
                    <p>
                      <!-- <span style="color: #d9c294; font-size:20px;">•</span> -->
                      <b>Retour:</b>
                    </p>
                    <p style="margin-left: 19px; margin-top:-10px;">
                      <?php echo $dayNames[$dayOfWeekret] . ' ' . $formattedDateret; ?>
                    </p>
                    <div style="float:right; width:50%; text-align:right;">
                      <p style="color: #d9c294;"><b>à partir de</b></p>
                      <h4 style="margin-bottom: 10px;"><?php echo intval($formule['prix_chambre_quadruple']); ?> &euro;</h4>
                    </div>
                    <p><i style="color: #d9c294;" class="fa-solid fa-hotel"></i> <b>Hotel:
                        <?php echo $formule['etoiles']; ?></b><i style="color: #d9c294;" class="fa-solid fa-star"></i></p>
                    <button class="btn" data-type-id="<?php echo $formule['type_id']; ?>"
                      data-package-id="<?php echo $package['id']; ?>">
                      <i class="fa-regular fa-calendar"></i><b style="color:#000"> Autres dates</b>
                    </button>
                  </div>


                  <a href="formule.php?id=<?php echo $formule['id']; ?>" class="btn-offre"><b style="color:#000">Voir la
                      formule</b>
                    <i style="font-size: 20px; margin-top:2px;" class="fa-solid fa-circle-chevron-right"></i></a>
                </div>
              <?php endforeach; ?>
            <?php else: ?>
              <p class="col-12">Aucune formule disponible.</p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <!-- Modal for Other Dates -->
  <div class="modal fade" id="formulesModal" tabindex="-1" role="dialog" aria-labelledby="formulesModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content boig">
        <div class="modal-header">
          <h5 class="modal-title" id="formulesModalLabel">AUTRES DATES</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- This will be dynamically populated -->
          <div id="formulesContent"></div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>