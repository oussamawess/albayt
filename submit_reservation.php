<?php
// Inclure le fichier de connexion à la base de données
include 'db.php';

// Fonction de nettoyage des données d'entrée
function sanitizeInput($data)
{
    global $conn;
    if (is_array($data)) {
        return array_map('sanitizeInput', $data);
    } else {
        return mysqli_real_escape_string($conn, $data);
    }
}

// Vérifier la méthode de requête
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données JSON
    $formData = json_decode(file_get_contents('php://input'), true);

    // Sanitization des données d'entrée
    $formData = sanitizeInput($formData);

    // Décoder les extras JSON (pas nécessaire ici, sera encodé plus tard)
    // $extrasJson = json_encode($formData['extras']);  <-- Removed

    // Requête SQL préparée (une seule fois)
    $sql = "INSERT INTO reservations (
        full_name,
        address,
        phone_number,
        email,
        adults,
        children,
        babies,
        quadruple_rooms,
        triple_rooms,
        double_rooms,
        single_rooms,
        extras,
        total_price,
        package_name,
        formula_name,
        departure_date,
        departure_city
    ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Récupérer les valeurs à insérer
        $full_name = $formData['fullName'];
        $address = $formData['address'];
        $phone_number = $formData['phoneNumber'];
        $email = $formData['email'];
        $adults = $formData['adults'];
        $children = $formData['children'];
        $babies = $formData['babies'];
        $quadruple_rooms = $formData['quadrupleRooms'];
        $triple_rooms = $formData['tripleRooms'];
        $double_rooms = $formData['doubleRooms'];
        $single_rooms = $formData['singleRooms'];
        $extras = json_encode($formData['extras']); // Encoder les extras en JSON
        $total_price = $formData['totalReservation'];
        $package_name = $formData['packageName'];
        $formula_name = $formData['formulaName'];
        $departure_date = $formData['departureDate'];
        $departure_city = $formData['departureCity'];

        // Binder les paramètres à la requête
        $stmt->bind_param(
            "ssssiiiiiisdsssss", // Correction du type de données pour total_price 
            $full_name,
            $address,
            $phone_number,
            $email,
            $adults,
            $children,
            $babies,
            $quadruple_rooms,
            $triple_rooms,
            $double_rooms,
            $single_rooms,
            $extras,
            $total_price,
            $package_name,
            $formula_name,
            $departure_date,
            $departure_city
        );

        // Exécuter la requête
        if ($stmt->execute()) {
            echo json_encode(['success' => true]);

        } else {
            error_log("Erreur MySQL: " . $stmt->error);
            echo json_encode(['success' => false, 'error' => 'Erreur de base de données: ' . $stmt->error]);
        }

        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'error' => 'Erreur lors de la préparation de la requête: ' . $conn->error]);
    }
    $conn->close();
} else {
    echo json_encode(['success' => false, 'error' => 'Méthode de requête invalide']);
}
