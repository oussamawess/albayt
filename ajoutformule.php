<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une Formule</title>
  <link rel="stylesheet" href="styles.css">
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

  <?php include 'header.php'; ?>
  <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js">


  </script>
</head>

<body>

  <div class="container">
    <h2>Ajouter une Formule</h2>
    <form action="submit_formule.php" method="POST">
      <div class="half-width-inputs">






        <div class="input-group">
          <label for="package">Ville de départ:</label>
          <select id="package" name="package" class="half-width-input" required>
            <option value="">Sélectionnez une ville</option>
            <?php
            // Inclure le fichier de connexion à la base de données
            include 'db.php';

            // Requête SQL pour sélectionner tous les packages Omra
            $sql = "SELECT id, nom FROM omra_packages";

            // Exécuter la requête
            $result = mysqli_query($conn, $sql);

            // Vérifier s'il y a des résultats
            if (mysqli_num_rows($result) > 0) {
              // Afficher les options dans le menu déroulant
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value='" . $row["id"] . "'>" . $row["nom"] . "</option>";
              }
            } else {
              echo "<option disabled>Aucun package Omra disponible</option>";
            }

            // Fermer la connexion à la base de données
            mysqli_close($conn); ?>
          </select>
        </div>

        <div class="input-group">
          <label for="type">Type de la Formule:</label>
          <select id="type" name="type" class="half-width-input" required>
          </select>
        </div>
      </div>



      <div class="half-width-inputs">
        <div class="input-group">
          <label for="statut">Statut:</label>
          <select id="statut" name="statut" class="half-width-input" required>
            <option value="activé">Activé</option>
            <option value="désactivé">Désactivé</option>
          </select>
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
      <div class="vol-section">
        <div class="half-width-inputs">
          <div class="input-group">
            <label for="ville_depart">Ville de Départ:</label>
            <select id="ville_depart" name="ville_depart[]" class="half-width-input" required>
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
            <input type="text" id="airport_depart" name="airport_depart[]" class="half-width-input" required>
          </div>
          <div class="input-group">
            <label for="heure_depart">Heure & Date de Départ:</label>
            <input type="datetime-local" id="heure_depart" name="heure_depart[]" class="half-width-input" required>
          </div>
          <div class="input-group">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination[]" class="half-width-input" required>
          </div>
          <div class="input-group">
            <label for="airport_destination">Aéroport de Destination:</label>
            <input type="text" id="airport_destination" name="airport_destination[]" class="half-width-input" required>
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
            <label for="ville_depart">Ville de Départ:</label>
            <select id="ville_depart" name="ville_depart[]" class="half-width-input" required>
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
            <input type="text" id="airport_depart" name="airport_depart[]" class="half-width-input" required>
          </div>
          <div class="input-group">
            <label for="heure_depart">Heure & Date de Départ:</label>
            <input type="datetime-local" id="heure_depart" name="heure_depart[]" class="half-width-input" required>
          </div>
          <div class="input-group">
            <label for="destination">Destination:</label>
            <input type="text" id="destination" name="destination[]" class="half-width-input" required>
          </div>
          <div class="input-group">
            <label for="airport_destination">Aéroport de Destination:</label>
            <input type="text" id="airport_destination" name="airport_destination[]" class="half-width-input" required>
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
          <div class="input-group">
            <label for="nombre_nuit">Nombre de nuitées :</label>
            <input type="number" id="nombre_nuit1" name="nombre_nuit[]" class="half-width-input nombre-nuit" required readonly>
          </div>
        </div>
        <button type="button" class="delete-hebergement deletebutton" disabled>Supprimer Hébergement</button>
        <button type="button" id="add-hebergement-button" class="addbutton" style="float: right;">Ajouter Hébergement</button>
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
              <input type="number" id="prix_chambre_quadruple" name="prix_chambre_quadruple" class="price-input"
                required>
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
              <label for="child_discount">Réduction enfant :</label>
              <input type="number" id="child_discount" name="child_discount" class="price-input" required>
            </div>

            <div class="input-group">
              <label for="prix_bebe">Tarif bébé :</label>
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
              <input type="number" id="prix_chambre_quadruple_promo" name="prix_chambre_quadruple_promo"
                class="price-input">
            </div>

            <div class="input-group">
              <label for="prix_chambre_triple_promo">Chambre triple:</label>
              <input type="number" id="prix_chambre_triple_promo" name="prix_chambre_triple_promo" class="price-input">
            </div>
          </div>

          <div class="half-width-inputs">
            <div class="input-group">
              <label for="prix_chambre_double_promo">Chambre double:</label>
              <input type="number" id="prix_chambre_double_promo" name="prix_chambre_double_promo" class="price-input">
            </div>

            <div class="input-group">
              <label for="prix_chambre_single_promo">Chambre single:</label>
              <input type="number" id="prix_chambre_single_promo" name="prix_chambre_single_promo" class="price-input">
            </div>
          </div>

        </div>

      </div>



      <div class="price-inputs">
        <h3>Programme <span class="toggle-icon">+</span></h3>

        <div class="collapsible-content">
          <br>
          <label for="description">Programme:</label>
          <textarea id="description" name="description" rows="6" required></textarea>
          <script>
            CKEDITOR.replace('description');
          </script>
        </div>
      </div>


      <button type="submit">Ajouter Formule</button>
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

    packageSelect.addEventListener('change', function () {
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

   