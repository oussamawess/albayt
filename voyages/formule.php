<?php
include '../db.php'; // Include your database connection file

// Assume you have already established a database connection
$formule_id = $_GET['id'];

$query = "SELECT 
        f.*, 
        t.nom AS type_name,
        h.nom AS hotel_name, 
        h.etoiles AS hotel_stars,
        h.ville AS hotel_city,
        h.details AS hotel_details,
        hb.date_checkin, 
        hb.date_checkout, 
        hb.nombre_nuit, 
        hb.type_pension,
        v.num_vol AS vol_name, 
        v.heure_depart AS vol_departure_time, 
        v.heure_arrivee AS vol_arrival_time,
        v.ville_depart_id AS vol_departure_city,
        v.ville_destination_id AS vol_destination_city,
        v.compagnie_aerienne_id AS airline_company,
        JSON_ARRAYAGG(JSON_OBJECT('program_id', p.id, 'program_name', p.nom, 'program_description', p.description)) AS programs
    FROM 
        formules f
    LEFT JOIN 
        types t ON f.type_id = t.id
    LEFT JOIN 
        hebergements hb ON f.id = hb.formule_id
    LEFT JOIN 
        hotels h ON hb.hotel_id = h.id
    LEFT JOIN 
        vols v ON f.id = v.formule_id
    LEFT JOIN 
        programs p ON JSON_CONTAINS(f.programs_id, CONCAT('\"', p.id, '\"'), '$')
    WHERE 
        f.id = ?
    GROUP BY 
        f.id, t.nom, h.nom, h.etoiles, h.ville, h.details, hb.date_checkin, hb.date_checkout, hb.nombre_nuit, hb.type_pension, v.num_vol, v.heure_depart, v.heure_arrivee, v.ville_depart_id, v.ville_destination_id, v.compagnie_aerienne_id
";

$stmt = $conn->prepare($query);
$stmt->bind_param('i', $formule_id);
$stmt->execute();
$result = $stmt->get_result();
$formule = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Charlevoix Trip</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            padding: 100px 100px;
            background-color: #f5f5f5;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            width: 100vw;
            /* Make the header full-width */
            margin-left: calc(50% - 50vw);
            /* Center the header relative to the viewport */
        }

        .header-content {
            max-width: 50%;
        }

        .header-content h1 {
            margin-bottom: 10px;
        }

        .header-content p {
            margin: 5px 0;
        }

        .header-content .buttons {
            margin-top: 10px;
        }

        .header-content .buttons button {
            margin: 0 5px;
            padding: 10px 20px;
            border: none;
            background-color: #007BFF;
            color: white;
            cursor: pointer;
        }

        .header-content .buttons button:hover {
            background-color: #0056b3;
        }

        .image-slider {
            max-width: 45%;
        }

        .image-slider img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .date-selection {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px;
            margin-top: 20px;
            border-radius: 50px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: fit-content;
            height: 100px;
            margin: -50px auto 0 auto;
        }

        .date-box {
            text-align: center;
        }

        .date-box label {
            display: block;
            font-weight: bold;
        }

        /* Round Button Start*/
        .round-button {
            display: flex;
            align-items: center;
            margin-left: auto;
            /* Push the button to the right */
        }

        .round-button-circle {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: #22c1f9;
            box-shadow: 0 0 3px gray;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .round-button-circle:hover {
            background: #30588e;
        }

        .round-button a {
            display: block;
            width: 100%;
            text-align: center;
            color: white;
            font-family: Verdana;
            font-size: 15px;
            text-decoration: none;
        }

        /* Round Button End*/

        .tabs {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .tabs button {
            background-color: white;
            border: none;
            padding: 10px 20px;
            margin: 0 5px;
            cursor: pointer;
            border-radius: 5px;
        }

        .tabs button:hover {
            background-color: #f0f0f0;
        }

        .reservation-form {
            background-color: white;
            padding: 20px;
            margin-top: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .quantity-selector {
            display: flex;
            align-items: center;
        }

        .quantity-selector button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }

        .quantity-selector input {
            width: 50px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin: 0 10px;
        }

        .quantity-selector button:hover {
            background-color: #0056b3;
        }

        .select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .class-selection {
            margin-bottom: 20px;
        }

        .class-selection div {
            display: flex;
            align-items: center;
        }

        .class-selection input {
            margin-right: 10px;
        }

        .price-list {
            display: flex;
            flex-direction: column;
        }

        .price-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        br {
            display: none;
        }

        .accordion-flush>.accordion-item>.accordion-header .accordion-button,
        .accordion-flush>.accordion-item>.accordion-header .accordion-button.collapsed {
            background-color: #b2daf3;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            padding: 10px;
            margin-top: 5px;

        }

        .accordion {
            margin: 20px;
        }

        @media (max-width: 767px) {

            br {
                display: block;
            }

            .header {
                flex-direction: column;
                /* align-items: center; */


                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                padding: 100px 15px;
                background-color: #f5f5f5;
                border-bottom-left-radius: 0px;
                border-bottom-right-radius: 0px;
                width: 100vw;
                /* Make the header full-width */
                margin-left: calc(50% - 50vw);
                /* Center the header relative to the viewport */

            }

            .header-content {
                max-width: 100%;
            }

            .image-slider {
                max-width: 100%;
                margin-top: 20px;
            }

            .date-selection {
                /* display: flex;
                justify-content: space-between;
                align-items: center;
                background-color: white;
                padding: 10px;
                border-radius: 15px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                max-width: fit-content;
                height: 200px;
                margin: -50px 15px 0 15px;
             */
                display: flex;
                flex-direction: row;
                align-items: center;
                height: auto;
                /* padding: 20px; */
                flex-wrap: wrap;
                border-radius: 15px;
                margin-left: 15px;
                margin-right: 15px;
                justify-content: center;

            }

            .date-box {
                /* display: flex;
                justify-content: space-between;
                width:100%; */
                font-size: 12px !important;

            }

            .round-button {
                margin-top: 20px;
                align-self: center;
                margin: auto;
            }

            .round-button a {
                font-size: 11px;
            }

            .round-button-circle {
                width: auto;
                height: auto;
                border-radius: 5%;
                background: #22c1f9;
                box-shadow: 0 0 3px gray;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                padding: 5px 20px;
            }

            .date-selection button {
                margin-top: 10px;
                width: 100%;
            }

            .tabs {
                flex-direction: column;
            }

            .tabs button {
                width: 100%;
                margin: 5px 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <div class="header-content">
                <h1>Pourquoi choisir la formule ?</h1>
                <h1><?php echo $formule['hotel_name']; ?></h1>

                <p>
                description
                </p>
                <div class="buttons">
                    <button>Plus d'info</button>
                    <button>Brochure</button>
                </div>
            </div>
            <div class="image-slider">
                <img src="..\uploads\66a4beb9348b42.27248419_medina3.jpg" alt="Charlevoix">
            </div>
        </header>

        <div class="date-selection">
            <div class="date-box" style="text-align: right; padding:0 10px; margin-top:7px">
                <label>Départ</label>
                <span>Lun <br>06-10-2025</span>
            </div>
            <div class="date-box" style="margin: 20px 0px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 1000 300">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #1cc4fb;
                            }
                        </style>
                    </defs>
                    <circle id="Ellipse_1_copy" data-name="Ellipse 1 copy" class="cls-1" cx="78.75" cy="250" r="44.75" />
                    <circle id="Ellipse_1_copy_2" data-name="Ellipse 1 copy 2" class="cls-1" cx="918.75" cy="250" r="44.75" />
                    <rect class="cls-1" x="164" y="238" width="669" height="25" />
                </svg>
                <label style="font-size: 13px;">Durée<br style="display: block;">3 Jour(s)</label>
                <!-- <span style="font-size: 12px;">3 Jour(s)</span> -->
            </div>
            <div class="date-box" style="text-align: left;  padding:0 10px; margin-top:7px">
                <label>Arrivée</label>
                <span>Mer <br>09-10-2025</span>
            </div>
            <div class=" round-button">
                <div class="round-button-circle">
                    <a href="#" class="round-button"><i class="fa-solid fa-calendar-days"></i><br style="display: block;">Autres dates</a>
                </div>
            </div>
        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Hébergements
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Vols
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Programme du séjour
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the third item's accordion body. Nothing more exciting happening here in terms of content, but just filling up the space to make it look, at least at first glance, a bit more representative of how this would look in a real-world application.</div>
                </div>
            </div>
        </div>



        <div class="reservation-form">
            <form>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" id="name" class="form-control" placeholder="Entrez votre nom">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" placeholder="Entrez votre email">
                </div>
                <div class="form-group">
                    <label for="phone">Téléphone</label>
                    <input type="text" id="phone" class="form-control" placeholder="Entrez votre téléphone">
                </div>
                <div class="form-group">
                    <label for="date">Date de Réservation</label>
                    <input type="date" id="date" class="form-control">
                </div>
                <div class="form-group quantity-selector">
                    <label for="adults">Adultes</label>
                    <button>-</button>
                    <input type="text" id="adults" class="form-control" value="1">
                    <button>+</button>
                </div>
                <div class="form-group quantity-selector">
                    <label for="children">Enfants</label>
                    <button>-</button>
                    <input type="text" id="children" class="form-control" value="0">
                    <button>+</button>
                </div>
                <div class="form-group">
                    <label for="room">Type de Chambre</label>
                    <select id="room" class="form-control select">
                        <option value="standard">Standard</option>
                        <option value="deluxe">Deluxe</option>
                        <option value="suite">Suite</option>
                    </select>
                </div>
                <div class="form-group class-selection">
                    <label>Classes</label>
                    <div>
                        <input type="checkbox" id="class1" value="Economy"> <label for="class1">Économie</label>
                    </div>
                    <div>
                        <input type="checkbox" id="class2" value="Business"> <label for="class2">Affaires</label>
                    </div>
                    <div>
                        <input type="checkbox" id="class3" value="First"> <label for="class3">Première</label>
                    </div>
                </div>
                <div class="form-group">
                    <label>Instructions Spéciales</label>
                    <textarea id="specialInstructions" class="form-control" rows="3"></textarea>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Réserver</button>
                </div>
            </form>
        </div>
    </div>

</body>

</html>