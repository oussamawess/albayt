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
  <title>Ajouter une Formule</title>
  <link rel="stylesheet" href="styles.css">

  <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
  <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

  <!-- <link href="https://cdn.jsdelivr.net/npm/quill@2/dist/quill.snow.css" rel="stylesheet"/> -->



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

    /* button[type="submit"] {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    button[type="submit"]:hover {
      background-color: #45a049;
    } */

    .addbutton {
      background-color: #4caf50;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .addbutton:hover {
      background-color: #45a049;
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

    .draftbutton {
      background-color: #12cdd4;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .draftbutton:hover {
      background-color: #0d949a;
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

    .program-item {
      display: inline-block;
      /* Ensures items appear inline */
      margin-right: 10px;
      /* Adjust spacing between items */
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

  <?php include 'header.php'; ?>
  <!-- <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"> -->


  </script>
</head>

<body>

  <div class="container">
    <h2>Ajouter une Formule</h2>
    <form action="submit_formule.php" method="POST" enctype="multipart/form-data">
      <div class="half-width-inputs">


        <div class="input-group">
          <label for="package">Ville de départ:</label>
          <select id="package" name="package" class="half-width-input" required>
            <option value="">Sélectionnez une ville</option>
            <?php
            // Inclure le fichier de connexion à la base de données
            include 'db.php';

            // Requête SQL pour sélectionner les packages Omra et leurs catégories associées
            $sql = "
        SELECT omra_packages.id, omra_packages.nom, category_parent.nom AS category_nom
        FROM omra_packages
        JOIN category_parent ON omra_packages.category_parent_id = category_parent.id";

            // Exécuter la requête
            $result = mysqli_query($conn, $sql);

            // Vérifier s'il y a des résultats
            if (mysqli_num_rows($result) > 0) {
              // Afficher les options dans le menu déroulant
              while ($row = mysqli_fetch_assoc($result)) {
                // Inclure le nom du package et le nom de la catégorie dans l'option
                echo "<option value='" . $row["id"] . "'>" . $row["nom"] . " - " . $row["category_nom"] . "</option>";
              }
            } else {
              echo "<option disabled>Aucun package Omra disponible</option>";
            }

            // Fermer la connexion à la base de données
            mysqli_close($conn);
            ?>
          </select>
        </div>


        <div class="input-group">
          <label for="type">Catégorie:</label>
          <select id="type" name="type" class="half-width-input" required>
          </select>
        </div>

        <div class="input-group">
          <label for="statut">Statut:</label>
          <select id="statut" name="statut" class="half-width-input" required>
            <option value="activé">En vente</option>
            <option value="désactivé">Épuisé</option>
          </select>
        </div>
      </div>



      <div class="half-width-inputs">
        <div class="input-group">
          <label for="date_depart">Date de Départ:</label>
          <input type="date" id="date_depart" name="date_depart" class="half-width-input" required>
        </div>

        <div class="input-group">
          <label for="date_depart">Date de Retour:</label>
          <input type="date" id="date_retour" name="date_retour" class="half-width-input" required>
        </div>

        <div class="input-group">
          <label for="duree_sejour">Durée de séjour:</label>
          <input type="text" id="duree_sejour" name="duree_sejour" class="half-width-input" required>
        </div>
      </div>

      <!-- Vol section Starts  -->

      <div id="vols-container" class="price-inputs">
        <div id="vols-section">
          <h3>Vols <span class="toggle-icon" onclick="toggleCollapse(this)">+</span></h3>
          <div class="collapsible-content">
            <br>
            <div class="input-group">
              <label for="statut_vol">Statut Vol:</label>
              <select id="statut_vol" name="statut_vol" class="half-width-input" style="width: 30%; background-color: #91d44a;" required onchange="changeBackgroundColor(this)">
                <option style="background-color: #91d44a;" value="CONFIRMÉ">CONFIRMÉ</option>
                <option style="background-color: #fac611;" value="EN ATTENTE">EN ATTENTE</option>
              </select>
            </div>
            <script>
              function changeBackgroundColor(selectElement) {
                if (selectElement.value === 'CONFIRMÉ') {
                  selectElement.style.backgroundColor = '#91d44a';
                } else {
                  selectElement.style.backgroundColor = '#fac611';
                }
              }
            </script>
            <div class="vol-section">
              <div class="half-width-inputs">
                <div class="input-group">
                  <label for="ville_depart">Départ:</label>
                  <!-- <input type="text" id="ville_depart" name="ville_depart[]" class="half-width-input" required> -->
                  <select id="ville_depart" name="ville_depart[]" class="half-width-input" required>
                    <option value="">Sélectionnez une Ville</option>
                    <?php
                    include 'db.php';
                    $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                    $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                    if (mysqli_num_rows($result_villes_depart) > 0) {
                      while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                        echo "<option value='" . $row_ville_depart['id'] . "'>" . $row_ville_depart['nom'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de départ active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <div class="input-group">
                  <label for="compagnie_aerienne">Compagnie Aérienne:</label>
                  <select id="compagnie_aerienne" name="compagnie_aerienne[]" class="half-width-input" required>
                    <?php
                    include 'db.php';
                    $sql_compagnies_aeriennes = "SELECT * FROM compagnies_aeriennes";
                    $result_compagnies_aeriennes = mysqli_query($conn, $sql_compagnies_aeriennes);
                    if (mysqli_num_rows($result_compagnies_aeriennes) > 0) {
                      while ($row_compagnie_aerienne = mysqli_fetch_assoc($result_compagnies_aeriennes)) {
                        echo "<option value='" . $row_compagnie_aerienne['id'] . "'>" . $row_compagnie_aerienne['nom'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune compagnie aérienne disponible pour le moment.</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
              </div>
              <div class="half-width-inputs">
                <div class="input-group">
                  <label for="num_vol">N° Vol:</label>
                  <input type="text" id="num_vol" name="num_vol[]" class="half-width-input" required>
                </div>
                <div class="input-group">
                  <label for="airport_depart">Aéroport de Départ:</label>
                  <!-- <input type="text" id="airport_depart" name="airport_depart[]" class="half-width-input" required> -->
                  <select id="airport_depart" name="airport_depart[]" class="half-width-input" required>
                    <option value="">Sélectionnez un Aéroport</option>
                    <?php
                    include 'db.php';
                    $sql_airports_depart = "SELECT * FROM airports";
                    $result_airports_depart = mysqli_query($conn, $sql_airports_depart);
                    if (mysqli_num_rows($result_airports_depart) > 0) {
                      while ($row_airport_depart = mysqli_fetch_assoc($result_airports_depart)) {
                        echo "<option value='" . $row_airport_depart['id'] . "'>" . $row_airport_depart['nom'] . " - " . $row_airport_depart['abrv'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de départ active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <div class="input-group">
                  <label for="heure_depart">Heure & Date de Départ:</label>
                  <input type="datetime-local" id="heure_depart" name="heure_depart[]" class="half-width-input" required>
                </div>
                <div class="input-group">
                  <label for="ville_destination">Destination:</label>
                  <!-- <input type="text" id="destination" name="destination[]" class="half-width-input" required> -->
                  <select id="ville_destination" name="ville_destination[]" class="half-width-input" required>
                    <option value="">Sélectionnez une Ville</option>
                    <?php
                    include 'db.php';
                    $sql_villes_destination = "SELECT * FROM ville_depart WHERE statut='activé'";
                    $result_villes_destination = mysqli_query($conn, $sql_villes_destination);
                    if (mysqli_num_rows($result_villes_destination) > 0) {
                      while ($row_ville_destination = mysqli_fetch_assoc($result_villes_destination)) {
                        echo "<option value='" . $row_ville_destination['id'] . "'>" . $row_ville_destination['nom'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de destination active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <div class="input-group">
                  <label for="airport_destination">Aéroport de Destination:</label>
                  <!-- <input type="text" id="airport_destination" name="airport_destination[]" class="half-width-input" required> -->
                  <select id="airport_destination" name="airport_destination[]" class="half-width-input" required>
                    <option value="">Sélectionnez un Aéroport</option>
                    <?php
                    include 'db.php';
                    $sql_airports_destination = "SELECT * FROM airports";
                    $result_airports_destination = mysqli_query($conn, $sql_airports_depart);
                    if (mysqli_num_rows($result_airports_destination) > 0) {
                      while ($row_airport_destination = mysqli_fetch_assoc($result_airports_destination)) {
                        echo "<option value='" . $row_airport_destination['id'] . "'>" . $row_airport_destination['nom'] . " - " . $row_airport_destination['abrv'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de départ active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <div class="input-group">
                  <label for="heure_arrivee">Heure & Date d'Arrivée:</label>
                  <input type="datetime-local" id="heure_arrivee" name="heure_arrivee[]" class="half-width-input" required>
                </div>
              </div>
              <div class="delete-button-container">
                <button type="button" class="delete-vol-button deletebutton" disabled>Supprimer Vol</button>
              </div>
            </div>
            <button type="button" id="add-vol-button" class="addbutton" style="float: right;">Ajouter Vol</button>
          </div>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', () => {
          const volsContainer = document.getElementById('vols-container');
          const addVolButton = document.getElementById('add-vol-button');
          let volSectionIndex = 1;

          addVolButton.addEventListener('click', () => {
            const newVolSection = document.createElement('div');
            newVolSection.className = 'vol-section';
            newVolSection.innerHTML = `
      <hr style="width:50%;height:1px;border-width:0;background-color:#C0C0C0;">
      <div style="margin-top:30px;">
        <div class="half-width-inputs">
          <div class="input-group">
            <label for="ville_depart">Départ:</label>
            <!--input type="text" id="ville_depart" name="ville_depart[]" class="half-width-input" required-->
              <select id="ville_depart" name="ville_depart[]" class="half-width-input" required>
              <option value="">Sélectionnez une ville</option>
               <?php
                include 'db.php';
                $sql_villes_depart = "SELECT * FROM ville_depart WHERE statut='activé'";
                $result_villes_depart = mysqli_query($conn, $sql_villes_depart);
                if (mysqli_num_rows($result_villes_depart) > 0) {
                  while ($row_ville_depart = mysqli_fetch_assoc($result_villes_depart)) {
                    echo "<option value='" . $row_ville_depart['id'] . "'>" . $row_ville_depart['nom'] . "</option>";
                  }
                } else {
                  echo "<option value='' disabled>Aucune ville de départ active disponible</option>";
                }
                mysqli_close($conn);
                ?>
             </select>
          </div>
          <div class="input-group">
            <label for="compagnie_aerienne">Compagnie Aérienne:</label>
            <select id="compagnie_aerienne" name="compagnie_aerienne[]" class="half-width-input" required>
              <?php
              include 'db.php';
              $sql_compagnies_aeriennes = "SELECT * FROM compagnies_aeriennes";
              $result_compagnies_aeriennes = mysqli_query($conn, $sql_compagnies_aeriennes);
              if (mysqli_num_rows($result_compagnies_aeriennes) > 0) {
                while ($row_compagnie_aerienne = mysqli_fetch_assoc($result_compagnies_aeriennes)) {
                  echo "<option value='" . $row_compagnie_aerienne['id'] . "'>" . $row_compagnie_aerienne['nom'] . "</option>";
                }
              } else {
                echo "<option value='' disabled>Aucune compagnie aérienne disponible pour le moment.</option>";
              }
              mysqli_close($conn);
              ?>
            </select>
          </div>
        </div>
        <div class="half-width-inputs">
          <div class="input-group">
            <label for="num_vol">N° Vol:</label>
            <input type="text" id="num_vol" name="num_vol[]" class="half-width-input" required>
          </div>
          <div class="input-group">
                  <label for="airport_depart">Aéroport de Départ:</label>
                  <!-- <input type="text" id="airport_depart" name="airport_depart[]" class="half-width-input" required> -->
                  <select id="airport_depart" name="airport_depart[]" class="half-width-input" required>
                  <option value="">Sélectionnez un Aéroport</option>
                    <?php
                    include 'db.php';
                    $sql_airports_depart = "SELECT * FROM airports";
                    $result_airports_depart = mysqli_query($conn, $sql_airports_depart);
                    if (mysqli_num_rows($result_airports_depart) > 0) {
                      while ($row_airport_depart = mysqli_fetch_assoc($result_airports_depart)) {
                        echo "<option value='" . $row_airport_depart['id'] . "'>" . $row_airport_depart['nom'] . " - " . $row_airport_depart['abrv'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de départ active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
          <div class="input-group">
            <label for="heure_depart">Heure & Date de Départ:</label>
            <input type="datetime-local" id="heure_depart" name="heure_depart[]" class="half-width-input" required>
          </div>
          <div class="input-group">
                  <label for="ville_destination">Destination:</label>
                  <!-- <input type="text" id="destination" name="destination[]" class="half-width-input" required> -->
                  <select id="ville_destination" name="ville_destination[]" class="half-width-input" required>
                  <option value="">Sélectionnez une Ville</option>
                    <?php
                    include 'db.php';
                    $sql_villes_destination = "SELECT * FROM ville_depart WHERE statut='activé'";
                    $result_villes_destination = mysqli_query($conn, $sql_villes_destination);
                    if (mysqli_num_rows($result_villes_destination) > 0) {
                      while ($row_ville_destination = mysqli_fetch_assoc($result_villes_destination)) {
                        echo "<option value='" . $row_ville_destination['id'] . "'>" . $row_ville_destination['nom'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de destination active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
          <div class="input-group">
                  <label for="airport_destination">Aéroport de Destination:</label>
                  <!-- <input type="text" id="airport_destination" name="airport_destination[]" class="half-width-input" required> -->
                  <select id="airport_destination" name="airport_destination[]" class="half-width-input" required>
                  <option value="">Sélectionnez un Aéroport</option>
                    <?php
                    include 'db.php';
                    $sql_airports_destination = "SELECT * FROM airports";
                    $result_airports_destination = mysqli_query($conn, $sql_airports_depart);
                    if (mysqli_num_rows($result_airports_destination) > 0) {
                      while ($row_airport_destination = mysqli_fetch_assoc($result_airports_destination)) {
                        echo "<option value='" . $row_airport_destination['id'] . "'>" . $row_airport_destination['nom'] . " - " . $row_airport_destination['abrv'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucune ville de départ active disponible</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
          <div class="input-group">
            <label for="heure_arrivee">Heure & Date d'Arrivée:</label>
            <input type="datetime-local" id="heure_arrivee" name="heure_arrivee[]" class="half-width-input" required>
          </div>
        </div>
        <div class="delete-button-container">
          <button type="button" class="delete-vol-button deletebutton">Supprimer Vol</button>
        </div>
      </div>
    `;
            const collapsibleContent = volsContainer.querySelector('.collapsible-content');
            collapsibleContent.appendChild(newVolSection);
            addDeleteButtonListener(newVolSection);
            updateCollapsibleHeight(collapsibleContent);
          });

          function addDeleteButtonListener(section) {
            const deleteButton = section.querySelector('.delete-vol-button');
            deleteButton.addEventListener('click', () => {
              section.remove();
              const collapsibleContent = volsContainer.querySelector('.collapsible-content');
              updateCollapsibleHeight(collapsibleContent);
            });
          }

          function updateCollapsibleHeight(content) {
            if (content.style.maxHeight) {
              content.style.maxHeight = content.scrollHeight + "px";
            }
          }

          const initialVolSection = document.querySelector('.vol-section');
          if (initialVolSection) {
            addDeleteButtonListener(initialVolSection);
          }
        });

        function toggleCollapse(element) {
          const content = element.parentElement.nextElementSibling;
          const icon = element;

          if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.innerHTML = "+";
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.innerHTML = "-";
          }
        }
      </script>





      <!-- Vol section Ends  -->

      <!-- | -->
      <!-- | -->
      <!-- | -->

      <!-- Hebergement section Starts  -->

      <div id="hebergements-container" class="price-inputs">
        <div id="hebergements-section">
          <h3>Hébergement <span class="toggle-icon" onclick="toggleCollapse(this)">+</span></h3>
          <div class="collapsible-content">
            <br>
            <div class="hebergement-section">
              <div class="half-width-inputs">
                <div class="input-group">
                  <label for="date_checkin">Date Checkin :</label>
                  <input type="date" id="date_checkin1" name="date_checkin[]" class="half-width-input date-checkin" required>
                </div>
                <div class="input-group">
                  <label for="date_checkout">Date Checkout :</label>
                  <input type="date" id="date_checkout1" name="date_checkout[]" class="half-width-input date-checkout" required>
                </div>
                <div class="input-group">
                  <label for="hotel">Hôtel :</label>
                  <select id="hotel1" name="hotel[]" class="half-width-input" required>
                    <?php
                    include 'db.php';
                    $sql_hotels = "SELECT * FROM hotels";
                    $result_hotels = mysqli_query($conn, $sql_hotels);
                    if (mysqli_num_rows($result_hotels) > 0) {
                      while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                        echo "<option value='" . $row_hotel['id'] . "'>" . $row_hotel['nom'] . "</option>";
                      }
                    } else {
                      echo "<option value='' disabled>Aucun hôtel disponible pour le moment.</option>";
                    }
                    mysqli_close($conn);
                    ?>
                  </select>
                </div>
                <!-- wess -->
                <div class="input-group">
                  <label for="type_pension">Type de Pension:</label>
                  <select id="type_pension" name="type_pension[]" required>
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
                <!-- wess -->
                <div class="input-group">
                  <label for="nombre_nuit">Nombre de nuitées :</label>
                  <input type="number" id="nombre_nuit1" name="nombre_nuit[]" class="half-width-input nombre-nuit" required readonly>
                </div>
              </div>
              <button type="button" class="delete-hebergement deletebutton" disabled>Supprimer Hébergement</button>
              <button type="button" id="add-hebergement-button" class="addbutton" style="float: right;">Ajouter
                Hébergement</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        document.addEventListener('DOMContentLoaded', () => {
          const hebergementsContainer = document.getElementById('hebergements-container');
          const addHebergementButton = document.getElementById('add-hebergement-button');

          addHebergementButton.addEventListener('click', () => {
            const newHebergementSection = document.createElement('div');
            newHebergementSection.className = 'hebergement-section';
            newHebergementSection.innerHTML = `
      <hr style="width:50%;height:1px;border-width:0;background-color:#C0C0C0;">
      <div style="margin-top:30px;">
        <br>
        <div class="half-width-inputs">
          <div class="input-group">
            <label for="date_checkin">Date Checkin :</label>
            <input type="date" name="date_checkin[]" class="half-width-input date-checkin" required>
          </div>
          <div class="input-group">
            <label for="date_checkout">Date Checkout :</label>
            <input type="date" name="date_checkout[]" class="half-width-input date-checkout" required>
          </div>
          <div class="input-group">
            <label for="hotel">Hôtel :</label>
            <select name="hotel[]" class="half-width-input" required>
              <?php
              include 'db.php';
              $sql_hotels = "SELECT * FROM hotels";
              $result_hotels = mysqli_query($conn, $sql_hotels);
              if (mysqli_num_rows($result_hotels) > 0) {
                while ($row_hotel = mysqli_fetch_assoc($result_hotels)) {
                  echo "<option value='" . $row_hotel['id'] . "'>" . $row_hotel['nom'] . "</option>";
                }
              } else {
                echo "<option value='' disabled>Aucun hôtel disponible pour le moment.</option>";
              }
              mysqli_close($conn);
              ?>
            </select>
          </div>
          <!-- wess -->
          <div class="input-group">
          <label for="type_pension">Type de Pension:</label>
            <select id="type_pension" name="type_pension[]" required>
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
          <!-- wess -->
          <div class="input-group">
            <label for="nombre_nuit">Nombre de nuitées :</label>
            <input type="number" name="nombre_nuit[]" class="half-width-input nombre-nuit" required readonly>
          </div>
        </div>
        <button type="button" class="delete-hebergement deletebutton">Supprimer Hébergement</button>
      </div>
    `;

            const collapsibleContent = hebergementsContainer.querySelector('.collapsible-content');
            collapsibleContent.appendChild(newHebergementSection);
            addDeleteButtonListener(newHebergementSection);
            addCalculateNightsFunctionality(newHebergementSection);
            updateCollapsibleHeight(collapsibleContent);
          });

          function addDeleteButtonListener(section) {
            const deleteButton = section.querySelector('.delete-hebergement');
            deleteButton.addEventListener('click', () => {
              section.remove();
              const collapsibleContent = hebergementsContainer.querySelector('.collapsible-content');
              updateCollapsibleHeight(collapsibleContent);
            });
          }

          function addCalculateNightsFunctionality(section) {
            const checkinInput = section.querySelector('.date-checkin');
            const checkoutInput = section.querySelector('.date-checkout');
            const nightsInput = section.querySelector('.nombre-nuit');

            checkinInput.addEventListener('input', calculateNights);
            checkoutInput.addEventListener('input', calculateNights);

            function calculateNights() {
              const checkinDate = new Date(checkinInput.value);
              const checkoutDate = new Date(checkoutInput.value);
              const timeDiff = checkoutDate - checkinDate;
              const nights = timeDiff / (1000 * 3600 * 24);
              nightsInput.value = nights > 0 ? nights : 0;
            }
          }

          function updateCollapsibleHeight(content) {
            if (content.style.maxHeight) {
              content.style.maxHeight = content.scrollHeight + "px";
            }
          }

          const initialHebergementSection = document.querySelector('.hebergement-section');
          addDeleteButtonListener(initialHebergementSection);
          addCalculateNightsFunctionality(initialHebergementSection);
        });

        function toggleCollapse(element) {
          const content = element.parentElement.nextElementSibling;
          const icon = element;

          if (content.style.maxHeight) {
            content.style.maxHeight = null;
            icon.innerHTML = "+";
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
            icon.innerHTML = "-";
          }
        }
      </script>



      <!-- Hebergement section Ends  -->

      <div class="price-inputs">
        <h3>Prix Hors Promo <span class="toggle-icon">+</span></h3>

        <div class="collapsible-content">
          <br>
          <div class="half-width-inputs">
            <div class="input-group">
              <label for="prix_chambre_quadruple">Chambre quadruple:</label>
              <input type="number" id="prix_chambre_quadruple" name="prix_chambre_quadruple" class="price-input" required>
            </div>

            <div class="input-group">
              <label for="prix_chambre_triple">Chambre triple:</label>
              <input type="number" id="prix_chambre_triple" name="prix_chambre_triple" class="price-input" required>
            </div>
          </div>

          <div class="half-width-inputs">
            <div class="input-group">
              <label for="prix_chambre_double">Chambre double:</label>
              <input type="number" id="prix_chambre_double" name="prix_chambre_double" class="price-input" required>
            </div>

            <div class="input-group">
              <label for="prix_chambre_single">Chambre single:</label>
              <input type="number" id="prix_chambre_single" name="prix_chambre_single" class="price-input" required>
            </div>
          </div>

          <div class="half-width-inputs">
            <div class="input-group">
              <label for="child_discount">Tarif enfant:</label>
              <input type="number" id="child_discount" name="child_discount" class="price-input" required>
            </div>

            <div class="input-group">
              <label for="prix_bebe">Tarif bébé:</label>
              <input type="number" id="prix_bebe" name="prix_bebe" class="price-input" required>
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
              <input type="number" id="prix_chambre_quadruple_promo" name="prix_chambre_quadruple_promo" class="price-input" value="0">
            </div>

            <div class="input-group">
              <label for="prix_chambre_triple_promo">Chambre triple:</label>
              <input type="number" id="prix_chambre_triple_promo" name="prix_chambre_triple_promo" class="price-input" value="0">
            </div>
          </div>

          <div class="half-width-inputs">
            <div class="input-group">
              <label for="prix_chambre_double_promo">Chambre double:</label>
              <input type="number" id="prix_chambre_double_promo" name="prix_chambre_double_promo" class="price-input" value="0">
            </div>

            <div class="input-group">
              <label for="prix_chambre_single_promo">Chambre single:</label>
              <input type="number" id="prix_chambre_single_promo" name="prix_chambre_single_promo" class="price-input" value="0">
            </div>
          </div>
        </div>

      </div>


      <!-- Start programs -->
      <div class="price-inputs">
        <h3>Programmes <span class="toggle-icon">+</span></h3>
        <div class="collapsible-content" style="padding:5px;">
          <div class="program-grid" id="sortable-programs">
            <?php
            include 'db.php';
            $sql_programs = "SELECT id, nom FROM programs";
            $result_programs = mysqli_query($conn, $sql_programs);
            if (mysqli_num_rows($result_programs) > 0) {
              while ($row = mysqli_fetch_assoc($result_programs)) {
                echo '<div class="ui-state-default checkinputs" data-id="' . $row['id'] . '">';
                echo '<input type="checkbox" name="programs[]" value="' . $row['id'] . '"> ' . $row['nom'];
                echo '<div>';
                echo '<label>Date:</label>';
                echo '<input type="date" name="program_dates[' . $row['id'] . ']" class="program-date">';
                echo '<label>Duration:</label>';
                echo '<input type="text" name="program_durations[' . $row['id'] . ']" class="program-duration" placeholder="e.g., 3 days">';
                echo '</div>';
                echo '</div>';
              }
            } else {
              echo "Aucun programme trouvé.";
            }
            ?>
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
            var id = $(this).data('id');
            if (id) { // Only include elements with a valid data-id
              order.push(id);
            }
          });
          return order;
        }


        $('form').on('submit', function() {
          var programOrder = getProgramOrder();
          $('input[name="program_order"]').val(JSON.stringify(programOrder));
        });
      </script>

      <input type="hidden" name="program_order" value="">
      <!-- End programs -->



      <!-- Start Description -->
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
              <div id="editor"></div>
            </div>
          </div>
        </div>
      </div>

      <!-- Hidden input field to store the Quill editor content -->
      <input type="hidden" name="description" id="description">

      <script>
        var quill = new Quill('#editor', {
          theme: 'snow',
          modules: {
            toolbar: '#toolbar'
          }
        });

        // Add an event listener to the form submission
        document.querySelector('form').addEventListener('submit', function() {
          // Get the Quill editor content
          var description = quill.root.innerHTML;
          // Set the content to the hidden input field
          document.getElementById('description').value = description;
        });
      </script>
      <!-- End Description -->

      <!-- Start section 1 -->
      <div class="price-inputs">
        <h3>Section 1 <span class="toggle-icon">+</span></h3>
        <div class="collapsible-content" style="padding:5px; border:0px;">
          <label for="titre_section1">Titre:</label>
          <input type="text" id="titre_section1" name="titre_section1" class="half-width-input" style="width:30%;">
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
              <div id="editor-section1"></div>
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
          <input type="text" id="titre_section2" name="titre_section2" class="half-width-input" style="width:30%;">
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
              <div id="editor-section2"></div>
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
          <input type="text" id="titre_section3" name="titre_section3" class="half-width-input" style="width:30%;">
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
              <div id="editor-section3"></div>
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
          <input type="text" id="titre_section4" name="titre_section4" class="half-width-input" style="width:30%;">
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
              <div id="editor-section4"></div>
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
          <input type="text" id="titre_section5" name="titre_section5" class="half-width-input" style="width:30%;">
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
              <div id="editor-section5"></div>
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
          <h3 style="margin-bottom: 10px; font-size: 18px; color: #333;">Fichier 1</h3>
          <input type="file" name="uploaded_file" id="uploaded_file" class="form-control" style="padding: 10px; border: 1px solid #ababab; border-radius: 5px; transition: border-color 0.3s; width: 100%; max-width: 300px;"
            onfocus="this.style.borderColor='#32363b'; this.style.outline='none';"
            onblur="this.style.borderColor='#32363b';">
        </div>
      </div>
      <!-- End download file -->

      <!-- Start Image -->
      <div class="price-inputs" style="display: flex; justify-content: center; align-items: center; margin: 20px 0; padding: 15px; border: 1px solid #ccc; border-radius: 5px;">
        <div class="input-group" style="display: flex; flex-direction: column; align-items: center;">
          <h3 style="margin-bottom: 10px; font-size: 18px; color: #333;">Fichier 2</h3>
          <input type="file" name="image_formule" id="image_formule" class="form-control" style="padding: 10px; border: 1px solid #ababab; border-radius: 5px; transition: border-color 0.3s; width: 100%; max-width: 300px;"
            onfocus="this.style.borderColor='#32363b'; this.style.outline='none';"
            onblur="this.style.borderColor='#32363b';">
        </div>
      </div>
      <!-- End Image -->




      <button type="submit" name="action" value="valider" class="addbutton">Valider</button>
      <!-- <button type="button" id="add-vol-button" class="draftbutton" style="margin-left:30px">Enregistrer le Brouillon</button> -->
      <button type="submit" name="action" value="draft" class="draftbutton" style="margin-left:30px">Enregistrer le Brouillon</button>
    </form>
  </div>
  <script>
    // Get all toggle icons and collapsible contents
    const toggleIcons = document.querySelectorAll('.toggle-icon');
    const collapsibleContents = document.querySelectorAll('.collapsible-content');

    // Loop through each toggle icon and set up event listeners
    toggleIcons.forEach((toggleIcon, index) => {
      const correspondingContent = collapsibleContents[index];

      toggleIcon.addEventListener('click', () => {
        correspondingContent.classList.toggle('active');
        toggleIcon.classList.toggle('active');

        // Optionally, adjust the max-height for smooth transition
        if (correspondingContent.classList.contains('active')) {
          correspondingContent.style.maxHeight = correspondingContent.scrollHeight + "px";
        } else {
          correspondingContent.style.maxHeight = "0";
        }
      });
    });


    const packageSelect = document.getElementById('package');
    const typeFormuleSelect = document.getElementById('type');

    packageSelect.addEventListener('change', function() {
      const packageId = this.value;
      fetchTypeFormules(packageId);
    });

    async function fetchTypeFormules(packageId) {
      if (packageId === "") { // Handle the case where no package is selected
        typeFormuleSelect.innerHTML = '<option value="" disabled>Sélectionnez d\'abord un package Omra</option>';
        return;
      }

      const response = await fetch('get_type_formules.php?package_id=' + packageId);
      const data = await response.json();

      typeFormuleSelect.innerHTML = ''; // Clear existing options

      if (data.length > 0) {
        data.forEach(typeFormule => {
          const option = document.createElement('option');
          option.value = typeFormule.id; // or typeFormule.id if you want to store the ID
          option.text = typeFormule.nom;
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