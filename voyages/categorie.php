<?php
include '../db.php'; // Include your database connection file

// Fetch packages
$packagesQuery = "SELECT * FROM category_parent";
$packagesResult = $conn->query($packagesQuery);

// Initialize an array to hold packages and their formules
$packages = [];
if ($packagesResult->num_rows > 0) {
  while ($package = $packagesResult->fetch_assoc()) {
    $packageId = $package['id'];
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

    .city-card-desktop .overlay:hover {
      box-shadow: inset 0px 0px 0px 10px #D9C391;
    }
  </style>
</head>

<body>
  <div class="container container-cards">
    <div class="desct">
      <h1>Nos catégories</h1>
    </div>
    <div class="rox-desktop">
      <?php foreach ($packages as $package): ?>
        <div class="col-12 col-sm-6 col-md-4">
          <a href="villes.php?category_parent_id=<?php echo $package['id']; ?>">
            <div class="city-card-desktop" style="background-image: url('../<?php echo $package['photo']; ?>');">
              <div class="overlay">
                <div class="card-body">
                  <h1 class="card-title"><?php echo $package['nom']; ?></h1>
                  <p>EN SAVOIR PLUS&nbsp;&nbsp;<i class="fa-solid fa-angle-down"></i></p>
                </div>
              </div>
            </div>
          </a>
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
<!-- 
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->
  </div>

</body>

</html>