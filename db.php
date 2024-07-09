<?php

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$database = "albayt";

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $database);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
} else {
}

?>