<?php
session_start(); // Start session to access session variables

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}
?>
<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Data from the Form and Sanitize Input
    $formule_id = mysqli_real_escape_string($conn, $_POST['formule_id']);
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    // $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $typeId = intval($_POST['type']);
    $date_depart = mysqli_real_escape_string($conn, $_POST['date_depart']);
    $date_retour = mysqli_real_escape_string($conn, $_POST['date_retour']);
    // wess
    $prix_chambre_quadruple = mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple']);
    $prix_chambre_triple = mysqli_real_escape_string($conn, $_POST['prix_chambre_triple']);
    $prix_chambre_double = mysqli_real_escape_string($conn, $_POST['prix_chambre_double']);
    $prix_chambre_single = mysqli_real_escape_string($conn, $_POST['prix_chambre_single']);
    $child_discount = mysqli_real_escape_string($conn, $_POST['child_discount']);
    $prix_bebe = mysqli_real_escape_string($conn, $_POST['prix_bebe']);
    $prix_chambre_quadruple_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple_promo']);
    $prix_chambre_triple_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_triple_promo']);
    $prix_chambre_double_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_double_promo']);
    $prix_chambre_single_promo = mysqli_real_escape_string($conn, $_POST['prix_chambre_single_promo']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $s1t = mysqli_real_escape_string($conn, $_POST['titre_section1']);
    $s1d = mysqli_real_escape_string($conn, $_POST['section1']);
    $s2t = mysqli_real_escape_string($conn, $_POST['titre_section2']);
    $s2d = mysqli_real_escape_string($conn, $_POST['section2']);
    $s3t = mysqli_real_escape_string($conn, $_POST['titre_section3']);
    $s3d = mysqli_real_escape_string($conn, $_POST['section3']);
    $s4t = mysqli_real_escape_string($conn, $_POST['titre_section4']);
    $s4d = mysqli_real_escape_string($conn, $_POST['section4']);
    $s5t = mysqli_real_escape_string($conn, $_POST['titre_section5']);
    $s5d = mysqli_real_escape_string($conn, $_POST['section5']);
    $statut_vol = mysqli_real_escape_string($conn, $_POST['statut_vol']);
    //wess
    // Fetch and sanitize selected programs and their details
    $selectedPrograms = isset($_POST['programs']) ? array_map('intval', $_POST['programs']) : [];
    $programDates = isset($_POST['program_dates']) ? $_POST['program_dates'] : [];
    $programDurations = isset($_POST['program_durations']) ? $_POST['program_durations'] : [];
    $programOrder = isset($_POST['program_order']) ? $_POST['program_order'] : [];

    // Ensure data consistency
    $programDetails = [];
    foreach ($selectedPrograms as $programId) {
        $programDetails[] = [
            'program_id' => $programId,
            'date' => mysqli_real_escape_string($conn, $programDates[$programId] ?? ''),
            'duration' => mysqli_real_escape_string($conn, $programDurations[$programId] ?? '')
        ];
    }

    $programsJson = json_encode($selectedPrograms);
    $programOrderJson = json_encode($programOrder);

    // Clear previous program details for the formule
    $deleteSql = "DELETE FROM program_details WHERE formule_id = $formule_id";
    if (!mysqli_query($conn, $deleteSql)) {
        echo "Erreur lors de la suppression des détails des programmes : " . mysqli_error($conn);
        exit;
    }

    // Insert new program details
    $insertProgramDetailsSql = "INSERT INTO program_details (formule_id, program_id, date, duration) VALUES ";
    $values = [];
    foreach ($programDetails as $detail) {
        $values[] = "('$formule_id', '{$detail['program_id']}', '{$detail['date']}', '{$detail['duration']}')";
    }
    if (!empty($values)) {
        $insertProgramDetailsSql .= implode(', ', $values);
        if (!mysqli_query($conn, $insertProgramDetailsSql)) {
            echo "Erreur lors de l'insertion des détails des programmes : " . mysqli_error($conn);
            exit;
        }
    }

    // Handle file upload (if any)
    $uploaded_file_path = ''; // Initialize variable for the file path
    if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
        $target_dir = "files/"; // Directory for uploaded files
        $file_name = basename($_FILES["uploaded_file"]["name"]);
        $target_file = $target_dir . uniqid() . "_" . $file_name;

        // Check if file size is within the limit (e.g., 5MB)
        if ($_FILES['uploaded_file']['size'] <= 5000000) {
            $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $allowed_types = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

            if (in_array($file_type, $allowed_types)) {
                if (!file_exists($target_dir)) {
                    mkdir($target_dir, 0777, true); // Create directory if it doesn't exist
                }

                // Move file to target directory
                if (move_uploaded_file($_FILES["uploaded_file"]["tmp_name"], $target_file)) {
                    $uploaded_file_path = mysqli_real_escape_string($conn, $target_file); // Store file path for database
                }
            }
        }
    }

    // If a new file is uploaded, update the uploaded_file field
    $file_update_query = "";
    if (!empty($uploaded_file_path)) {
        $file_update_query = ", uploaded_file = '$uploaded_file_path'";
    }


    // Image Formule
    $image_formule = mysqli_real_escape_string($conn, $_POST['image_actuel']); // Default to the current image

    if (isset($_FILES['image_formule']) && $_FILES['image_formule']['error'] === UPLOAD_ERR_OK) {
        // Only process the image if a new file is uploaded
        $tmpFilePath = $_FILES['image_formule']['tmp_name'];
        $newFilePath = "uploads/" . uniqid() . "_" . $_FILES['image_formule']['name']; // Give the file a unique name
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            $image_formule = mysqli_real_escape_string($conn, $newFilePath); // Update image path only if the upload is successful
        } else {
            echo "Erreur lors de l'upload de l'image.";
            exit();
        }
    }



    // Fetch and sanitize selected programs
    $selectedPrograms = isset($_POST['programs']) ? array_map('intval', $_POST['programs']) : [];
    $programsJson = json_encode($selectedPrograms);

    // Fetch and sanitize program order
    $programOrder = isset($_POST['program_order']) ? $_POST['program_order'] : '[]';

    //wess
    // 2. Input Validation (Example - Check if all price fields are valid numbers)
    $priceFields = [
        'prix_chambre_quadruple',
        'prix_chambre_triple',
        'prix_chambre_double',
        'prix_chambre_single',
        'child_discount',
        'prix_bebe',
        'prix_chambre_quadruple_promo',
        'prix_chambre_triple_promo',
        'prix_chambre_double_promo',
        'prix_chambre_single_promo'
    ];

    foreach ($priceFields as $field) {
        if (!is_numeric($$field) || $$field < 0) { // Use variable variables to check the value
            echo "Erreur: Le champ $field doit être un nombre positif.";
            exit;
        }
    }
    //wess

    // Update the main formules table
    $sql = "UPDATE formules SET 
            package_id = '$package_id',             
            statut = '$statut',
            duree_sejour = '$duree_sejour',
            type_id = $typeId,
            date_depart = '$date_depart',
            date_retour = '$date_retour',
            -- wess
            prix_chambre_quadruple = '$prix_chambre_quadruple',
            prix_chambre_triple = '$prix_chambre_triple',
            prix_chambre_double = '$prix_chambre_double',
            prix_chambre_single = '$prix_chambre_single',
            child_discount = '$child_discount',
            prix_bebe = '$prix_bebe',
            prix_chambre_quadruple_promo = '$prix_chambre_quadruple_promo',
            prix_chambre_triple_promo = '$prix_chambre_triple_promo',
            prix_chambre_double_promo = '$prix_chambre_double_promo',
            prix_chambre_single_promo = '$prix_chambre_single_promo',
            description = '$description', -- Include the description in the update statement
            image_formule = '$image_formule',
            s1t = '$s1t',
            s1d = '$s1d',
            s2t = '$s2t',
            s2d = '$s2d',
            s3t = '$s3t',
            s3d = '$s3d',
            s4t = '$s4t',
            s4d = '$s4d',
            s5t = '$s5t',
            s5d = '$s5d',
            statut_vol = '$statut_vol',
            -- wess

            programs_id = '$programsJson',
            program_order = '$programOrder'
            -- (Other fields...)
            $file_update_query
            WHERE id = $formule_id";

    if (!mysqli_query($conn, $sql)) {
        echo "Erreur lors de la mise à jour : " . mysqli_error($conn);
        exit;
    }

    // Delete existing vols entries for this formule
    $deleteSql = "DELETE FROM vols WHERE formule_id = $formule_id";
    if (!mysqli_query($conn, $deleteSql)) {
        echo "Erreur lors de la suppression des vols existants : " . mysqli_error($conn);
        exit;
    }

    // Insert new vols entries
    foreach ($_POST['vols'] as $vol) {
        $ville_depart_id = mysqli_real_escape_string($conn, $vol['ville_depart_id']);
        $compagnie_aerienne_id = mysqli_real_escape_string($conn, $vol['compagnie_aerienne']);
        $num_vol = mysqli_real_escape_string($conn, $vol['num_vol']);
        $airport_depart_id = mysqli_real_escape_string($conn, $vol['airport_depart_id']);
        $heure_depart = mysqli_real_escape_string($conn, $vol['heure_depart']);
        $ville_destination_id = mysqli_real_escape_string($conn, $vol['ville_destination_id']);
        $airport_destination_id = mysqli_real_escape_string($conn, $vol['airport_destination_id']);
        $heure_arrivee = mysqli_real_escape_string($conn, $vol['heure_arrivee']);

        $insertSql = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart_id, heure_depart, ville_destination_id, airport_destination_id, heure_arrivee) 
                      VALUES ('$formule_id', '$ville_depart_id', '$compagnie_aerienne_id', '$num_vol', '$airport_depart_id', '$heure_depart', '$ville_destination_id', '$airport_destination_id', '$heure_arrivee')";

        if (!mysqli_query($conn, $insertSql)) {
            echo "Erreur lors de l'insertion des vols : " . mysqli_error($conn);
            exit;
        }
    }

    // Delete existing hebergements entries for this formule
    $deleteSql = "DELETE FROM hebergements WHERE formule_id = $formule_id";
    if (!mysqli_query($conn, $deleteSql)) {
        echo "Erreur lors de la suppression des hébergements existants : " . mysqli_error($conn);
        exit;
    }

    // Insert new hebergements entries
    foreach ($_POST['hebergements'] as $hebergement) {
        $hotel_id = mysqli_real_escape_string($conn, $hebergement['hotel_id']);
        $date_checkin = mysqli_real_escape_string($conn, $hebergement['date_checkin']);
        $date_checkout = mysqli_real_escape_string($conn, $hebergement['date_checkout']);
        $nombre_nuit = mysqli_real_escape_string($conn, $hebergement['nombre_nuit']);
        $type_pension = mysqli_real_escape_string($conn, $hebergement['type_pension']);

        $insertSql = "INSERT INTO hebergements (formule_id, hotel_id, date_checkin, date_checkout, type_pension, nombre_nuit) 
                      VALUES ('$formule_id', '$hotel_id', '$date_checkin', '$date_checkout', '$type_pension', '$nombre_nuit')";

        if (!mysqli_query($conn, $insertSql)) {
            echo "Erreur lors de l'insertion des hébergements : " . mysqli_error($conn);
            exit;
        }
    }

    echo "Formule mise à jour avec succès";
    header("Location: display_formules.php"); // Redirect to a success page
    exit;
}

mysqli_close($conn);
?>
