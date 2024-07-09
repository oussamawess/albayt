<?php
// Récupérer les données du formulaire
$data = json_decode(file_get_contents('php://input'), true);

// Paramètres SMTP
ini_set('SMTP', 'smtp.mail.ovh.net');
ini_set('smtp_port', 465);
ini_set('sendmail_from', 'amin@digietab.tn');

// Destinataire de l'email
$to = 'amin@digietab.tn';  // Adresse email où vous souhaitez recevoir les données

// Sujet de l'email
$subject = 'Nouvelle réservation reçue';

// Contenu de l'email
$message = "Une nouvelle réservation a été reçue :\n\n";
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
$message .= "Chambres simples : " . $data['singleRooms'] . "\n";
$message .= "Extras " . $data['extras'] . "\n";
$message .= "\nTotal de la réservation : " . $data['totalReservation'] . "\n";
$message .= "Nom du package : " . $data['packageName'] . "\n";
$message .= "Nom de la formule : " . $data['formulaName'] . "\n";
$message .= "Date de départ : " . $data['departureDate'] . "\n";
$message .= "Ville de départ : " . $data['departureCity'] . "\n";

// Entêtes de l'email
$headers = "From: amin@digietab.tn\r\n";
$headers .= "Reply-To: amin@digietab.tn\r\n";
$headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

// Envoyer l'email
if (mail($to, $subject, $message, $headers)) {
    echo json_encode(array("success" => true));
    echo '<script>window.location.href = "https://preprod4.digietab.tn/app2";</script>';

} else {
    echo json_encode(array("success" => false, "error" => "Erreur lors de l'envoi de l'email"));
}
?>