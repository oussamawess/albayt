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

.formule-cards:hover{
    background-color: #f0f0f0;
    border: 1px solid #01a7e5;
    transition: 0.3s;
    cursor: pointer;
}
    


.formule-dates{
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

.top-bar{
    background-color:#01a7e5; 
    color:white; 
    padding:2px 10px; 
    border-radius:5px; 
    font-weight: bold;
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}
</style>
<div class="top-bar">
    <p class="formule-dates">• Depart</p>
    <p class="formule-date-returns">• Retour</p>
    <p class="formule-prices">&euro; Prix</p>
</div>
<?php
include '../db.php'; // Include your database connection file

if (isset($_GET['type_id']) && isset($_GET['package_id'])) {
    $typeId = intval($_GET['type_id']);
    $packageId = intval($_GET['package_id']);

    // Debug output to check passed values
    error_log("Type ID: $typeId, Package ID: $packageId");

    $formulesQuery = "
    SELECT f.*, t.nom as type_nom, h.etoiles 
    FROM formules f
    LEFT JOIN type_formule_omra t ON f.type_id = t.id
    LEFT JOIN hebergements e ON f.id = e.formule_id
    LEFT JOIN hotels h ON e.hotel_id = h.id
    WHERE f.package_id = $packageId AND f.type_id = $typeId AND f.statut = 'activé'
    GROUP BY f.id
    ORDER BY f.date_depart ASC
";

    $formulesResult = $conn->query($formulesQuery);

    if ($formulesResult->num_rows > 0) {
        while ($formule = $formulesResult->fetch_assoc()) {
            $dayNames = ['Sun' => 'Dim', 'Mon' => 'Lun', 'Tue' => 'Mar', 'Wed' => 'Mer', 'Thu' => 'Jeu', 'Fri' => 'Ven', 'Sat' => 'Sam'];
            $dateString = $formule['date_depart'];
            $timestamp = strtotime($dateString);

            $dateStringret = $formule['date_retour'];
            $timestampret = strtotime($dateStringret);

            $dayOfWeek = date('D', $timestamp); // Get abbreviated day of week
            $formattedDate = date('d-m-Y', $timestamp);

            $dayOfWeekret = date('D', $timestampret); // Get abbreviated day of week
            $formattedDateret = date('d-m-Y', $timestampret);

            echo '
             
            <div class="formule-cards">           
                <p class="formule-dates"><b>' . $dayNames[$dayOfWeek] . '</b> ' . $formattedDate . '</p>
                <p class="formule-date-returns"><b>' . $dayNames[$dayOfWeekret] . '</b> ' . $formattedDateret . '</p>
                <h5 class="formule-prices" style="color: #4580a0;">' . intval($formule['prix_chambre_quadruple']) . ' &euro;</h5>
            </div>';
        }
    } else {
        echo '<p>Aucune formule disponible pour ce type.</p>';
    }
}
?>
