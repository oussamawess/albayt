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
    // Determine the action based on the button clicked
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    // Set the status based on the button clicked
    if ($action === 'draft') {
        $statut = 'desactivé'; // Status for draft
    } else {
        $statut = 'activé'; // Default status for validation
    }


    // 1. Get Data from the Form and Sanitize Input    
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    $type_id = mysqli_real_escape_string($conn, $_POST['type']);
    $date_depart = mysqli_real_escape_string($conn, $_POST['date_depart']);
    $date_retour = mysqli_real_escape_string($conn, $_POST['date_retour']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $prix_chambre_quadruple = mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple']);
    $prix_chambre_triple = mysqli_real_escape_string($conn, $_POST['prix_chambre_triple']);
    $prix_chambre_double = mysqli_real_escape_string($conn, $_POST['prix_chambre_double']);
    $prix_chambre_single = mysqli_real_escape_string($conn, $_POST['prix_chambre_single']);
    $child_discount = mysqli_real_escape_string($conn, $_POST['child_discount']);
    $prix_bebe = mysqli_real_escape_string($conn, $_POST['prix_bebe']);
    $prix_chambre_quadruple_promo = isset($_POST['prix_chambre_quadruple_promo']) && $_POST['prix_chambre_quadruple_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_quadruple_promo']) : 0;
    $prix_chambre_triple_promo = isset($_POST['prix_chambre_triple_promo']) && $_POST['prix_chambre_triple_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_triple_promo']) : 0;
    $prix_chambre_double_promo = isset($_POST['prix_chambre_double_promo']) && $_POST['prix_chambre_double_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_double_promo']) : 0;
    $prix_chambre_single_promo = isset($_POST['prix_chambre_single_promo']) && $_POST['prix_chambre_single_promo'] !== '' ? mysqli_real_escape_string($conn, $_POST['prix_chambre_single_promo']) : 0;
    $statut_vol = mysqli_real_escape_string($conn, $_POST['statut_vol']);

    // Get selected programs and encode as JSON
    $selected_programs = isset($_POST['programs']) ? $_POST['programs'] : [];
    $programs_json = json_encode($selected_programs);

    // Get program order and encode as JSON
    $program_order = isset($_POST['program_order']) ? $_POST['program_order'] : '[]';

    // Get the description from the hidden input
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    // Get the form data
    $s1t = $_POST['titre_section1'];  // Title for Section 1
    $s1d = $_POST['section1'];        // Description for Section 1 (Quill editor content)

    $s2t = $_POST['titre_section2'];  // Title for Section 2
    $s2d = $_POST['section2'];        // Description for Section 2 (Quill editor content)

    $s3t = $_POST['titre_section3'];  // Title for Section 3
    $s3d = $_POST['section3'];        // Description for Section 3 (Quill editor content)

    $s4t = $_POST['titre_section4'];  // Title for Section 4
    $s4d = $_POST['section4'];        // Description for Section 4 (Quill editor content)

    $s5t = $_POST['titre_section5'];  // Title for Section 5
    $s5d = $_POST['section5'];        // Description for Section 5 (Quill editor content)


    // Handle file upload
    $uploaded_file_path = ''; // Initialize variable for file path
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

    // Handle image upload
    $image_formule = '';  // Initialize with an empty value
    if (isset($_FILES['image_formule']) && $_FILES['image_formule']['error'] == 0) {
        $tmpFilePath = $_FILES['image_formule']['tmp_name'];
        $newFilePath = "uploads/" . uniqid() . "_" . $_FILES['image_formule']['name'];
        if (move_uploaded_file($tmpFilePath, $newFilePath)) {
            $image_formule = $newFilePath;  // Use $image_formule instead of $logo
        } else {
            echo "Erreur lors de l'upload de l'image.";
            exit();
        }
    }





    // Prepare and Execute the SQL INSERT Query
    $sql_formule = "INSERT INTO formules (package_id, type_id, date_depart, date_retour, statut, duree_sejour, prix_chambre_quadruple, prix_chambre_triple, prix_chambre_double, prix_chambre_single, child_discount, prix_bebe, prix_chambre_quadruple_promo, prix_chambre_triple_promo, prix_chambre_double_promo, prix_chambre_single_promo, programs_id, program_order, description, s1t, s1d, s2t, s2d, s3t, s3d, s4t, s4d, s5t, s5d, uploaded_file, image_formule, statut_vol)
                    VALUES ('$package_id', '$type_id', '$date_depart', '$date_retour', '$statut', '$duree_sejour', '$prix_chambre_quadruple', '$prix_chambre_triple', '$prix_chambre_double', '$prix_chambre_single', '$child_discount', '$prix_bebe', '$prix_chambre_quadruple_promo', '$prix_chambre_triple_promo', '$prix_chambre_double_promo', '$prix_chambre_single_promo', '$programs_json', '$program_order', '$description', '$s1t', '$s1d', '$s2t', '$s2d', '$s3t', '$s3d', '$s4t', '$s4d', '$s5t', '$s5d', '$uploaded_file_path', '$image_formule', '$statut_vol')";



    if (mysqli_query($conn, $sql_formule)) {
        $formule_id = mysqli_insert_id($conn);

        // Insert into program_details table for each program
        $program_dates = $_POST['program_dates'];
        $program_durations = $_POST['program_durations'];
        if (!empty($selected_programs)) {
            foreach ($selected_programs as $program_id) {
                $program_date = mysqli_real_escape_string($conn, $program_dates[$program_id]);
                $program_duration = mysqli_real_escape_string($conn, $program_durations[$program_id]);
                $sql_program_details = "INSERT INTO program_details (formule_id, program_id, date, duration) 
                                    VALUES ('$formule_id', '$program_id', '$program_date', '$program_duration')";
                mysqli_query($conn, $sql_program_details);
            }
        }

        // Retrieve Hébergement data
        $date_checkin = $_POST['date_checkin'];
        $date_checkout = $_POST['date_checkout'];
        $hotel = $_POST['hotel'];
        $type_pension = $_POST['type_pension'];
        $nombre_nuit = $_POST['nombre_nuit'];

        // Insert into hebergement table for each Hébergement block
        for ($i = 0; $i < count($date_checkin); $i++) {
            $date_checkin_value = mysqli_real_escape_string($conn, $date_checkin[$i]);
            $date_checkout_value = mysqli_real_escape_string($conn, $date_checkout[$i]);
            $hotel_value = mysqli_real_escape_string($conn, $hotel[$i]);
            $type_pension_value = mysqli_real_escape_string($conn, $type_pension[$i]);
            $nombre_nuit_value = mysqli_real_escape_string($conn, $nombre_nuit[$i]);

            $sql_hebergement = "INSERT INTO hebergements (formule_id, date_checkin, date_checkout, hotel_id, type_pension, nombre_nuit) 
                                VALUES ('$formule_id', '$date_checkin_value', '$date_checkout_value', '$hotel_value', '$type_pension_value', '$nombre_nuit_value')";
            mysqli_query($conn, $sql_hebergement);
        }

        // Retrieve vol data
        $ville_depart_id = $_POST['ville_depart'];
        $compagnie_aerienne = $_POST['compagnie_aerienne'];
        $num_vol = $_POST['num_vol'];
        $airport_depart_id = $_POST['airport_depart'];
        $heure_depart = $_POST['heure_depart'];
        $ville_destination_id = $_POST['ville_destination'];
        $airport_destination_id = $_POST['airport_destination'];
        $heure_arrivee = $_POST['heure_arrivee'];

        // Insert into vols table for each vol block
        for ($i = 0; $i < count($ville_depart_id); $i++) {
            $ville_depart_id_value = mysqli_real_escape_string($conn, $ville_depart_id[$i]);
            $compagnie_aerienne_id_value = mysqli_real_escape_string($conn, $compagnie_aerienne[$i]);
            $num_vol_value = mysqli_real_escape_string($conn, $num_vol[$i]);
            $airport_depart_id_value = mysqli_real_escape_string($conn, $airport_depart_id[$i]);
            $heure_depart_value = mysqli_real_escape_string($conn, $heure_depart[$i]);
            $ville_destination_id_value = mysqli_real_escape_string($conn, $ville_destination_id[$i]);
            $airport_destination_id_value = mysqli_real_escape_string($conn, $airport_destination_id[$i]);
            $heure_arrivee_value = mysqli_real_escape_string($conn, $heure_arrivee[$i]);

            $sql_vol = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart_id, heure_depart, ville_destination_id, airport_destination_id, heure_arrivee) 
                VALUES ('$formule_id', '$ville_depart_id_value', '$compagnie_aerienne_id_value', '$num_vol_value', '$airport_depart_id_value', '$heure_depart_value', '$ville_destination_id_value', '$airport_destination_id_value', '$heure_arrivee_value')";
            mysqli_query($conn, $sql_vol);
        }

        // Redirect to display_formules.php after successful insertion
        header("Location: display_formules.php");
        exit;
    } else {
        echo "Erreur: " . $sql_formule . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
