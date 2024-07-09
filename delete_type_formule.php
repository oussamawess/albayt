<?php
include 'db.php';

if (isset($_GET['id'])) {
    $typeFormuleId = mysqli_real_escape_string($conn, $_GET['id']);

    // 1. Confirmation (Optional - you can remove this if not needed)
    if (!isset($_POST['confirm_delete'])) {
        // Show confirmation form
        ?>
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Supprimer Type de Formule</title>
            <link rel="stylesheet" href="styles.css">
            <style>
                /* ... your existing styles ... */
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Êtes-vous sûr de vouloir supprimer ce type de formule ?</h2>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?php echo $typeFormuleId; ?>">
                    <input type="hidden" name="confirm_delete" value="1">
                    <button type="submit" class="btn btn-danger">Oui, Supprimer</button>
                    <a href="liste_type_formules.php" class="btn btn-secondary">Annuler</a>
                </form>
            </div>
        </body>
        </html>
        <?php
        exit;
    }

    // 2. Delete the Formula Type
    $sql = "DELETE FROM type_formule_omra WHERE id = $typeFormuleId";
    if (mysqli_query($conn, $sql)) {
        echo "<div class='container'><h2>Le type de formule a été supprimé avec succès.</h2></div>";
        header("Location: list_type_formule_omra.php");  // Redirect back to the list page
        exit;
    } else {
        echo "<div class='container'><h2>Erreur lors de la suppression du type de formule: " . mysqli_error($conn) . "</h2></div>";
    }
} else {
    echo "<div class='container'><h2>ID du type de formule non fourni.</h2></div>";
}

mysqli_close($conn);
?>
