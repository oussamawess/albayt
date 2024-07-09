<?php
// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérifier si l'ID de l'extra est défini et n'est pas vide
    if (isset($_POST["id"]) && !empty($_POST["id"])) {
        // Inclure le fichier de connexion à la base de données
        include 'db.php';
        
        // Définir les variables avec les données du formulaire
        $id = $_POST["id"];
        $nom = $_POST["nom"];
        $description = $_POST["description"];
        $prix = $_POST["prix"];
        
        // Préparer une requête SQL pour mettre à jour l'extra dans la base de données
        $sql = "UPDATE extras SET nom=?, description=?, prix=? WHERE id=?";
        
        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Liaison des variables à la déclaration préparée en tant que paramètres
            mysqli_stmt_bind_param($stmt, "ssdi", $nom, $description, $prix, $id);
            
            // Tentative d'exécution de la déclaration préparée
            if (mysqli_stmt_execute($stmt)) {
                // Redirection vers la liste des extras avec un message de succès
                header("location: list_extra.php");
                exit();
            } else {
                echo "Oops! Une erreur s'est produite. Veuillez réessayer ultérieurement.";
            }
            
            // Fermer la déclaration préparée
            mysqli_stmt_close($stmt);
        }
        
        // Fermer la connexion à la base de données
        mysqli_close($conn);
    } else {
        // Redirection si l'ID de l'extra n'est pas défini
        header("location: error.php");
        exit();
    }
} else {
    // Redirection si le formulaire n'a pas été soumis
    header("location: error.php");
    exit();
}
?>
