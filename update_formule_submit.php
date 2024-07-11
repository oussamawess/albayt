<?php
include 'db.php'; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get Data from the Form and Sanitize Input
    $formule_id = mysqli_real_escape_string($conn, $_POST['formule_id']);
    $package_id = mysqli_real_escape_string($conn, $_POST['package']);
    $nom = mysqli_real_escape_string($conn, $_POST['nom']);
    $statut = mysqli_real_escape_string($conn, $_POST['statut']);
    $duree_sejour = mysqli_real_escape_string($conn, $_POST['duree_sejour']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    // (Other fields...)

    // Update the main formules table
    $sql = "UPDATE formules SET 
            package_id = '$package_id', 
            nom = '$nom',
            statut = '$statut',
            duree_sejour = '$duree_sejour',
            description = '$description'
            -- (Other fields...)
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
        $ville_depart_id = mysqli_real_escape_string($conn, $vol['ville_depart']);
        $compagnie_aerienne_id = mysqli_real_escape_string($conn, $vol['compagnie_aerienne']);
        $num_vol = mysqli_real_escape_string($conn, $vol['num_vol']);
        $airport_depart = mysqli_real_escape_string($conn, $vol['airport_depart']);
        $heure_depart = mysqli_real_escape_string($conn, $vol['heure_depart']);
        $destination = mysqli_real_escape_string($conn, $vol['destination']);
        $airport_destination = mysqli_real_escape_string($conn, $vol['airport_destination']);
        $heure_arrivee = mysqli_real_escape_string($conn, $vol['heure_arrivee']);

        $insertSql = "INSERT INTO vols (formule_id, ville_depart_id, compagnie_aerienne_id, num_vol, airport_depart, heure_depart, destination, airport_destination, heure_arrivee) 
                      VALUES ('$formule_id', '$ville_depart_id', '$compagnie_aerienne_id', '$num_vol', '$airport_depart', '$heure_depart', '$destination', '$airport_destination', '$heure_arrivee')";

        if (!mysqli_query($conn, $insertSql)) {
            echo "Erreur lors de l'insertion des vols : " . mysqli_error($conn);
            exit;
        }
    }

    echo "Formule mise à jour avec succès";
    header("Location: omrapackage.php"); // Redirect to a success page
    exit;
}

mysqli_close($conn);
?>
