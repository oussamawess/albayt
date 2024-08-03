<?php
// Récupérer les données du formulaire (vous devrez adapter cette partie en fonction de votre code)
$data = json_decode(file_get_contents('php://input'), true);

// Paramètres SMTP (si vous utilisez un serveur SMTP personnalisé)
ini_set('SMTP', 'smtp.mail.ovh.net');
ini_set('smtp_port', 465);
ini_set('sendmail_from', 'amin@digietab.tn');

// Destinataire de l'email (adresse du client)
$to = $data['email'];

// Sujet de l'email
$subject = 'Confirmation de votre inscription à la Omra avec AlBayt';

// Contenu de l'email (personnalisé avec les données du client)
$message = "Salam Aleykoum " . $data['fullName'] . ",\n\n";
$message .= "Nous confirmons votre inscription à la Omra avec l'agence AlBayt pour le départ du " . $data['departureDate'] . ".\n";
$message .= "Veuillez trouver ci-joint les détails de votre voyage et les informations nécessaires.\n";
$message .= "Nom complet : " . $data['fullName'] . "\n";
$message .= "Adresse : " . $data['address'] . "\n";
$message .= "Téléphone : " . $data['phoneNumber'] . "\n";
$message .= "Email : " . $data['email'] . "\n";
$message .= "Nombre d'adultes : " . $data['adults'] . "\n";
$message .= "Nombre d'enfants : " . $data['children'] . "\n";
$message .= "Nombre de bébés : " . $data['babies'] . "\n";
$message .= "Chambres quadruples : " . $data['quadrupleRooms'] . "\n";
$message .= "Chambres triples : " . $data['tripleRooms'] . "\n";
$message .= "Chambres doubles : " . $data['doubleRooms'] . "\n";
$message .= "Chambres singles : " . $data['singleRooms'] . "\n";
$message .= "\nTotal de la réservation : " . $data['totalReservation'] . "\n";
$message .= "Nom du package : " . $data['packageName'] . "\n";
$message .= "Nom de la formule : " . $data['formulaName'] . "\n";
$message .= "Date de départ : " . $data['departureDate'] . "\n";
$message .= "Pour toute question, contactez-nous à contact@albayt.fr ou +33 1 89 77 14 77 .\n\n";
$message .= "Fraternellement,\n\n";
$message .= "L'équipe AlBayt";

// Entêtes de l'email
$headers = "From: contact@albayt.fr\r\n";
$headers .= "Reply-To: contact@albayt.fr\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoyer l'email
$emailSent = mail($to, $subject, $message, $headers);

// URL de l'API HubSpot pour soumettre le formulaire
$hubspot_api_url = "https://api.hsforms.com/submissions/v3/integration/submit/140056593/b9b884a5-8c4f-4761-af93-83de184c28c4";

// Préparer les données pour HubSpot
$hubspot_data = [
    'fields' => [
        ['name' => 'nom_complet', 'value' => $data['fullName']],
        ['name' => 'email', 'value' => $data['email']],
        ['name' => 'phone', 'value' => $data['phoneNumber']],
        ['name' => 'address', 'value' => $data['address']],
        ['name' => 'date_de_depart', 'value' => $data['departureDate']],
        ['name' => 'nombre_d_adultes2', 'value' => $data['adults']],
        ['name' => 'nombre_d_enfants2', 'value' => $data['children']],
        ['name' => 'nombre_de_bebes2', 'value' => $data['babies']],
        ['name' => 'chambres_quadruples', 'value' => $data['quadrupleRooms']],
        ['name' => 'chambres_triples', 'value' => $data['tripleRooms']],
        ['name' => 'chambres_doubles', 'value' => $data['doubleRooms']],
        ['name' => 'chambres_simples', 'value' => $data['singleRooms']],
        ['name' => 'total_de_la_reservation', 'value' => $data['totalReservation']],
        ['name' => 'nom_du_package', 'value' => $data['packageName']],
        ['name' => 'nom_de_la_formule', 'value' => $data['formulaName']],
    ],
    'context' => [
        'pageUri' => 'https://app-albayt.fr/form.php', // L'URL de la page où le formulaire est envoyé
        'pageName' => 'Formulaire de réservation Omra'
    ]
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $hubspot_api_url);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($hubspot_data));

$response = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($emailSent && $http_code == 200) {
    echo json_encode(array("success" => true));
    echo '<script>window.location.href = "https://www.albayt.fr/merci-etre-rappele/";</script>';
} else {
    $error_message = "Erreur lors de l'envoi de l'email ou du formulaire intégré";
    if (!$emailSent) {
        $error_message = "Erreur lors de l'envoi de l'email";
    } elseif ($http_code != 200) {
        $error_message = "Erreur lors de l'envoi du formulaire intégré, code HTTP: " . $http_code . ", réponse: " . $response . ", URL: " . $hubspot_api_url . ", Méthode: POST";
    }
    echo json_encode(array("success" => false, "error" => $error_message));
}
?>