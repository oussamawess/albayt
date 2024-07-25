<?php
session_start(); // Start session to access session variables

// Check if user is not logged in, redirect to login page
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Include database connection
include 'db.php';

// Initialize variables
$nom = $abrv = '';
$param_id = $_GET['id']; // Assuming id is passed via URL (GET parameter)

// Fetch data from database
$sql = "SELECT * FROM airports WHERE id = '$param_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {
    $row = mysqli_fetch_assoc($result);
    $nom = $row['nom'];
    $abrv = $row['abrv'];
} else {
    echo "Aucune aeroport avec cet identifiant.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Aeroport</title>
    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-control {
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        .btn-primary {
            background-color: #4caf50;
            border: none;
        }

        .btn-primary:hover {
            background-color: #45a049;
        }

        input[type="text"],
        input[type="file"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
<?php include 'header.php'; ?>
    <div class="container mt-5">
        <h2 class="text-center"><b>Modifier un Aéroport</b></h2>
        <form action="submit_update_aeroport.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $param_id; ?>">
            <div class="form-group">
                <label for="nom">Nom de l'Aéroport':</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo htmlspecialchars($nom); ?>" required>
            </div>
            <div class="form-group">
                <label for="abrv">Abréviation:</label>
                <input type="text" class="form-control" id="abrv" name="abrv" value="<?php echo htmlspecialchars($abrv); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Modifier Aéroport</button>
        </form>
    </div>
</body>

</html>

<?php
// Close database connection
mysqli_close($conn);
?>
