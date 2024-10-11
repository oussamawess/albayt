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

        nav ul li:hover>a {
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

        nav ul li:hover>ul {
            display: block;
        }

        nav ul ul li a {
            padding: 10px;
            color: white;
        }

        nav ul ul li a:hover {
            background-color: #444;
        }

        /* Style for the Prev button */
        .prev-btn {
            position: absolute;
            top: 80px;
            /* Adjust this value if you want more space under the navbar */
            left: 10px;
            /* Aligns it to the left side */
            background-color: white;
            color: black;
            padding: 5px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            border: 1px solid black;

        }

        .prev-btn:hover {
            background-color: #444;
            color: white;
            border: 2px solid white;
        }
    </style>
</head>

<body>

    <!-- Navigation Bar -->
    <nav>
        <ul>
            <li>
                <a href="categorie_parent.php">Catégories Parent</a>
            </li>
            <li>
                <a href="omrapackage.php">Villes</a>
            </li>
            <li>
                <a href="#">Packages</a>
                <ul>
                    <li><a href="display_formules.php">Formules</a></li>
                    <li><a href="list_type_formule_omra.php">Catégories</a></li>
                </ul>
            </li>
            <li>
                <a href="hotels.php">Hôtels</a>
            </li>
            <li>
                <a href="list_compagnies.php">Compagnies Aériennes</a>
            </li>
            <li>
                <a href="list_extra.php">Extras</a>
            </li>
            <li>
                <a href="programs.php">Programmes</a>
            </li>
            <li>
                <a href="liste_ville_depart.php">Villes Vol</a>
            </li>
            <li>
                <a href="liste_aeroport.php">Aéroports</a>
            </li>
        </ul>
    </nav>

    <!-- 'Prev' Button -->
    <a href="javascript:void(0);" class="prev-btn" onclick="history.back();"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
        </svg></a>

</body>

</html>