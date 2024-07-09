<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu avec Catégories</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        nav {
            background-color: #333;
            color: white;
            padding: 10px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
            display: flex;
        }
        nav ul li {
            position: relative;
            margin-right: 20px;
        }
        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 10px;
            display: block;
        }
        nav ul li:hover > a {
            background-color: #444;
        }
        nav ul ul {
            display: none;
            position: absolute;
            top: 100%;
            left: 0;
            background-color: #333;
            padding: 0;
            list-style: none;
        }
        nav ul ul li {
            width: 200px;
        }
        nav ul li:hover > ul {
            display: block;
        }
        nav ul ul li a {
            padding: 10px;
            color: white;
        }
        nav ul ul li a:hover {
            background-color: #444;
        }
    </style>
</head>
<body>

<nav>
    <ul>
        <li>
            <a href="#">Packages Omra</a>
            <ul>
                <li><a href="omrapackage.php">Liste des Packages</a></li>
                <li><a href="ajoutomrapackage.php">Ajouter un Package</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Formules Omra</a>
            <ul>
            <li><a href="ajoutformule.php">Ajouter une Formule</a></li>

                <li><a href="list_type_formule_omra.php">Liste des Types de Formules Omra</a></li>
                <li><a href="ajout_type_formule.php">Ajouter un Type de Formule Omra</a></li>
            </ul>
        </li>

        <li>
            <a href="#">Hôtels</a>
            <ul>
                <li><a href="hotels.php">Liste des Hôtels</a></li>
                <li><a href="ajouthotel.php">Ajouter un Hôtel</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Compagnies Aériennes</a>
            <ul>
                <li><a href="list_compagnies.php">Liste des Compagnies Aériennes</a></li>
                <li><a href="add_compagnie.php">Ajouter une Compagnie</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Villes de Départ</a>
            <ul>
                <li><a href="liste_ville_depart.php">Liste des Villes de Départ</a></li>
                <li><a href="ajouter_ville_depart.php">Ajouter une Ville de Départ</a></li>
            </ul>
        </li>
        <li>
            <a href="#">Extras</a>
            <ul>
                <li><a href="list_extra.php">Liste des Extras</a></li>
                <li><a href="ajout_extra.php">Ajouter un Extra</a></li>
            </ul>
        </li>
        <!-- Nouvelle catégorie -->
    
    </ul>
</nav>

</body>
</html>
