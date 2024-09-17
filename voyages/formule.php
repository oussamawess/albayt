<?php
include '../db.php'; // Include your database connection file

// Assume you have already established a database connection
$formule_id = $_GET['id'];

$query = "SELECT 
        f.*,         
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
        v.compagnie_aerienne_id AS airline_company
        -- JSON_ARRAYAGG(JSON_OBJECT('program_id', p.id, 'program_name', p.nom, 'program_description', p.description)) AS programs
    FROM 
        formules f
 
    LEFT JOIN 
        hebergements hb ON f.id = hb.formule_id
    LEFT JOIN 
        hotels h ON hb.hotel_id = h.id
    LEFT JOIN 
        vols v ON f.id = v.formule_id
    WHERE 
        f.id = ?
    GROUP BY 
        f.id, h.nom, h.etoiles, h.ville, h.details, hb.date_checkin, hb.date_checkout, hb.nombre_nuit, hb.type_pension, v.num_vol, v.heure_depart, v.heure_arrivee, v.ville_depart_id, v.ville_destination_id, v.compagnie_aerienne_id
";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $formule_id);
$stmt->execute();
$result = $stmt->get_result();
$formule = $result->fetch_assoc();


$hebergements_query = "SELECT h.nom AS hotel_name, hb.date_checkin, hb.date_checkout, hb.nombre_nuit 
                       FROM hebergements hb
                       LEFT JOIN hotels h ON hb.hotel_id = h.id
                       WHERE hb.formule_id = ?";

$hebergements_stmt = $conn->prepare($hebergements_query);
$hebergements_stmt->bind_param("i", $formule_id);
$hebergements_stmt->execute();
$hebergements_result = $hebergements_stmt->get_result();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formule</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- this line causing no closing to the popup -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script> -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <!-- SLIDER ACCORDION FILE -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- SLIDER ACCORDION FILE -->



    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->


    <style>
        @font-face {
            font-family: 'Belly Display';
            src: url('fonts/f05f148ec6596f0b75375fa566aaf1fe.woff') format('woff'),
                url('fonts/f05f148ec6596f0b75375fa566aaf1fe.ttf') format('truetype');
            font-display: swap;
            font-style: normal;
            font-weight: 400;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: white;
        }

        header {
            position: relative;
            background-image: url('https://www.albayt.fr/wp-content/uploads/shutterstock_1339215521.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0;
            /* Adjust as needed */
            text-align: center;
            display: flex;
            /* Use Flexbox to center content */
            justify-content: center;
            /* Center horizontally */
            align-items: center;
            /* Center vertically */
            height: 100vh;
            /* Full viewport height for demonstration */
            z-index: 1;
        }

        header::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            /* Black color with 50% opacity */
            z-index: -1;
            /* Place behind the header content */
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
        }

        .modal-backdrop {
            z-index: auto;
        }


        header h1 {
            font-family: 'Bely Display', sans-serif;
            /* Ensure you use quotes for font names with spaces */
            font-size: 6rem;
            /* Adjust as needed */
            margin: 0;
            /* Remove default margin */
            z-index: 1;
            /* Ensure text is above the overlay */

        }


        .header {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            padding: 100px 100px;
            background-color: #f5f5f5;
            border-bottom-left-radius: 40px;
            border-bottom-right-radius: 40px;
            width: 100vw;
            height: 30vw;
            margin-left: calc(50% - 50vw);
        }


        .container {
            max-width: 1200px;
            margin: auto;
            padding: 0px;
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
            position: relative;
            z-index: 1;
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
            color: white;
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

        .btn-cnfrm {
            background-color: #2fc681;
            color: white;
            padding: 8px 20px;
            border: 0px;
            border-radius: 5px;
        }

        /*/////////////////////////  HEBERGEMENT  //////////////////////*/
        .accordion-body {
            padding: 20px;
            background-color: #f7f7f7;
            border-radius: 8px;
        }

        .row>* {

            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .card-container {
            background-color: #fff;
            max-width: 1000px;
            max-height: auto;
            margin: auto;
            display: grid;
            grid-template-columns: 300px 1fr 185px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        }



        .hotel-image img {
            width: 100%;
            display: block;
            height: 100%;
        }

        .carousel-item .image-container {
            position: relative;
            width: 100%;
            padding-top: 100%;
            /* 1:1 Aspect Ratio */
        }

        .carousel-item img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Maintain aspect ratio */
        }

        .carousel-item .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            padding-top: 100%;
        }

        .carousel-item {
            position: relative;
            display: none;
            float: left;
            width: 100%;
            height: 100%;
            margin-right: -100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;

        }

        .carousel-item img {
            /* width: 100%;
            height: 200px; */
            object-fit: cover;
        }


        img.d-block {
            margin-left: 2em;

        }

        .hidden {
            display: none
        }

        ul {
            padding-left: 0;
            list-style: none;
        }

        li {
            display: inline;
        }

        .guarantee {
            font-size: 15px;
            text-align: center;
            color: #aaa;
            font-weight: 300;
        }

        .guarantee span {
            color: #f6a12d;
        }

        .pricing-content {
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
            padding: 30px 30px 70px 30px;
            height: 100%;
        }

        /* .carousel-item img {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        object-fit: cover;} */



        /* .hotel-info {
            padding: 15px;
            color: #333;
        } */

        .hotel-info {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 15px;
            border-radius: 8px;
            max-width: 22em;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .hotel-info .heading {
            margin-bottom: 10px;
        }

        .hotel-info .title {
            font-size: 18px;
            font-weight: 600;
            color: #222;
        }

        .hotel-info .title .stars {
            color: #FFD700;
        }

        .hotel-info .subtitle {
            font-size: 14px;
            color: #777;
        }

        .reviews ul {
            display: inline-block;
            margin: 10px 10px 0px 0;
            color: #000;
            /*   font-size: 18px; */
        }

        .reviews ul:last-child {
            border-right: none;
        }

        .modal .card-container {
            background-color: #f8f9fa;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-bottom: 10px;
        }

        .modal .card-container:hover {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.15);
        }

        .card-container {
            margin-bottom: 2em;
        }

        .card-container {
            border-radius: 10px;
        }

        .modal .card-container:hover {
            background-color: #F7F2E8 !important;

        }


        .stars,
        .trip-advisor {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #FFD700;
        }

        @media (max-width: 900px) {

            .card-container {
                display: grid;
                grid-template-rows: 25% auto 25%;
                grid-template-columns: 1fr;
                width: 60%;
            }

            .guarantee {
                font-size: 24px;
            }

            .price {
                margin: auto;
                height: 100px
            }

            .price h3 {
                font-weight: 400;
                font-size: 28px;
                text-align: center;
            }

            .price h3 span {
                font-weight: 300;
                font-size: 16px;
                color: #aaa;
            }
        }




        @media only screen and (max-width: 600px) {
            .wrapper {

                width: 100% !important;
                margin: 0px !important;
                overflow-x: scroll !important;
                scroll-snap-type: x mandatory;
                scroll-behavior: smooth;

            }

            .row {

                margin-right: 5px !important;
                margin-left: 5px !important;
            }



            .cardprog {
                scroll-snap-align: center;
                box-sizing: border-box;
                padding: 20px 30px;
                flex-shrink: 0;
                width: 100% !important;
            }

            .boarding-pass {
                & .cities {
                    .airplane {
                        position: absolute;
                        width: 61px;
                        height: 19px;
                        left: 43%;
                        transform: translate(-50%, -50%);
                        animation: move 4s infinite;
                        color: #F7F2E8;
                        top: 62% !important;
                        /* display: none; */
                    }
                }
            }

            .city {
                margin-right: 1em !important;
            }

            .tab-content {
                background-color: white;
                padding: 15px !important;
                border-radius: 10px;
            }

            .icons {
                font-size: 15px;
            }

        }

        @media (max-width: 600px) {

            /* .hotel-info {
                background-color: #fff;
                padding: 30 30px 0px 30px !important;
            } */
            .hotel-info {
                background-color: rgba(255, 255, 255, 0.8);
                padding: 15px;
                border-radius: 8px;
                max-width: 22em;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
        }

        @media (max-width: 600px) {

            .col-md-3 {

                padding-right: 3em;
                padding-left: 3em;
            }

            .pricing-content {
                display: none;
            }

            .hidden {
                display: block;
            }

            /* .hotel-info {
                background-color: #fff;
                padding: 130px 30px 0px 30px !important;
            } */

            .hotel-info {
                background-color: rgba(255, 255, 255, 0.8);
                padding: 15px;
                border-radius: 8px;
                max-width: 22em;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .card-container {
                width: 100%;
            }

            .hotel-info .title {
                padding-top: 10px;
            }
        }

        @media (min-width: 768px) {
            .col-md-3 {
                flex: 0 0 auto;
                width: 20%;
            }

            .price-info {
                width: 7em !important;
            }

            .card-body.justify-content-between {
                display: contents !important;

            }

            .departure-info {
                margin-top: 1em !important;
                margin-left: 1em !important;
            }

            i.fas.fa-plane-departure {
                margin-top: 5px !important;
            }

            .arrival-info {
                margin-left: 1em;
                margin-bottom: 1em;
            }

            .carousel-inner {
                position: relative;
                width: 100%;
                overflow: hidden;
                height: 100% !important;
            }

            .carousel {
                position: relative;
                height: 100% !important;
            }

        }

        /*/////////////////////////  HEBERGEMENT  //////////////////////*/

        @media (max-width: 767px) {

            br {
                display: block;
            }

            .header {
                flex-direction: column;
                /* align-items: center; */


                display: flex;
                justify-content: center;
                align-items: center;
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

        .wrapper {
            display: flex;
            gap: 20px;
            width: 900px;
            border-radius: 14px;
            overflow-x: hidden;
            /* Hide the scrollbar */
            scroll-snap-type: x mandatory;
            margin-left: 10em;
            scroll-behavior: smooth;
            /* Smooth scrolling */
        }

        .wrapper {
            position: relative;
            scroll-behavior: smooth;
        }

        .wrapper {
            display: flex;
            /* Ensure items are arranged horizontally */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            scroll-snap-type: x mandatory;
            /* For snapping (optional) */
        }

        .wrapper {
            display: flex;
            /* or inline-flex */
            overflow-x: auto;
        }

        #programme .wrapper {
            overflow-x: hidden;
            /* Allow horizontal scrolling if needed */
            scroll-snap-type: x mandatory;
            /* For snap-scrolling to each card */
        }

        #programme .dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            /* Adjust as needed */
        }

        #programme .dot {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: #ddd;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #programme .dot.active {
            background-color: #333;
        }

        .cardprog {
            scroll-snap-align: center;
            box-sizing: border-box;
            padding: 20px 30px;
            flex-shrink: 0;
            width: 40%;
            background-color: white;
            border-radius: 14px;
            text-align: center;
            margin-top: 2em;
        }

        .card-title {
            font-size: 1.2rem;
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #000;
            margin-bottom: 15px;
        }

        .card-title {
            font-size: 24px;
            margin: 16px 0;
            color: #333;
        }

        .card {
            border: none;
            transition: all 0.3s ease;
            border-radius: 15px;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        }

        .card {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card {
            border-color: #DDC395;
            margin-bottom: 2em;
        }

        .card:hover {
            border-color: #DDC395;
            background-color: #F7F2E8;
        }

        .card {
            /* ... other card styles ... */
            position: relative;
            /* Necessary for absolute positioning of the badge */
        }

        .card .badge.bg-danger {
            position: absolute;
            top: 10px;
            /* Adjust for positioning */
            right: -10px;
            /* Adjust for positioning */
            transform: rotate(45deg);
            padding: 5px 10px;
            /* Smaller padding */
            background-color: #50D28F;
            color: white;
            font-weight: bold;
            z-index: 1;
            font-size: 0.8rem;
            /* Smaller font size */
        }

        .prev-btn,
        .next-btn {
            position: sticky;
            /* Now sticky inside the carousel */
            top: 50%;
            transform: translateY(-50%);
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
            z-index: 10;
            background-color: #DAC392 !important;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
        }

        .prev-btn {
            left: 0;
            margin-left: 10px;
            margin-top: 10em;

            /* Adjust spacing to move closer to the carousel */
        }

        .next-btn {
            right: 0;
            margin-right: 10px;
            margin-top: 10em;
            /* Adjust spacing to move closer to the carousel */
        }

        .dots-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .dot {
            width: 12px;
            height: 12px;
            margin: 0 5px;
            background-color: #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #333;
        }


        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            box-shadow: rgba(0, 0, 0, 0.15) 2.4px 2.4px 3.2px;
            border-radius: 10px;
        }

        .price-container {
            text-align: right;
        }

        .flex-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }

        .flex-left {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .flex-right {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
        }

        .flex-left .bed-icons {
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
        }

        .flex-left hr {
            width: 50%;
            border-top: 2px solid #000;
        }

        .icons {
            font-size: 35px;
        }

        .btn-primary {
            background-color: #dac392;
            border: none;
            transition: background-color 0.3s ease;
            margin-top: 2em;
        }


        /**************************  TEST HEBERGEMENT ******************************/

        .card-container {
            position: relative;
            width: 100%;
            height: 400px;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            background-color: #f8f9fa;
        }

        .hotel-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 1;
            background-size: cover;
            background-position: center;
        }

        .image-container {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
        }

        .hotel-info {
            position: static;
            top: 10px;
            left: 10px;
            z-index: 2;
            color: black;
            /* text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7); */
        }

        .hotel-name,
        .hotel-stars,
        .hotel-details {
            margin: 0;
            padding: 0;
        }

        .hotel-footer {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            background-color: white;
            padding: 10px;
            display: flex;
            justify-content: space-between;
            z-index: 3;
            font-size: 14px;
        }

        .hotel-footer div {
            flex: 1;
            text-align: left;
        }

        .hotel_info {
            display: flex;
            align-items: left;
            gap: 5px;
            /* Adds space between the icon and text */
        }

        .hotel-icons {
            width: 50px;
            height: 50px;
            margin-right: 10px
        }

        /* Tablets */
        @media (max-width: 768px) {
            .card-container {
                flex-direction: column;
                width: 100%;
                height: auto;
                /* Adjust height to auto */
            }

            .hotel-image,
            .hotel-info {
                width: 100%;
                height: auto;
                /* Adjust height to auto */
            }

            .hotel-info {
                position: relative;
                background-color: rgba(255, 255, 255, 0.8);
                padding: 15px;
                border-radius: 8px;
                max-width: 22em;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }

            .hotel-footer {
                position: absolute;
                /* Removes absolute positioning */
                flex-direction: row;
                flex-wrap: wrap;
                background-color: white;
                padding: 10px;
            }

            .hotel-footer div {
                width: 48%;
                /* Two beside each other */
                margin-bottom: 0px;
            }

            .hotel-icons {
                width: 40px;
                height: 40px;
                margin-right: 10px
            }

            .h5,
            h5 {
                font-size: 1rem;
            }

            .h5,
            h5 {
                font-size: 1rem;
            }


            .header {
                border-bottom-left-radius: 40px;
                border-bottom-right-radius: 40px;
            }

        }

        @media (max-width: 709px) {
            .hotel-icons {
                width: 30px;
                height: 30px;
                margin-right: 10px;
            }

            h6,
            h6 {
                font-size: 0.85rem;
            }


            .hotel-footer div {
                font-size: 12px;
            }

        }



        /* Mobile screens */
        @media (max-width: 576px) {
            .card-container {
                height: auto;
                /* Adjust height to auto */
            }

            .hotel-info {
                position: relative;
                top: auto;
                left: auto;
                padding: 10px;
                background-color: rgba(0, 0, 0, 0.5);
                /* Semi-transparent background */
            }

            .hotel-footer {
                position: absolute;
                /* Ensure it’s placed after the image */
                padding: 5px;
                flex-direction: row;
                /* Stack the items vertically */
                align-items: center;
                text-align: center;
            }

            .hotel-footer div {
                width: 48%;
                /* Two beside each other */
                margin-bottom: 10px;
            }

            /* svg {
                width: 30px;
                height: 30px;
            } */
        }



        /******* H1 */

        header h1 {
            font-size: 4rem;
            /* Default size */
        }

        @media (max-width: 1200px) {

            header h1 {
                font-size: 4rem;
                /* Smaller size for medium screens */
            }
        }

        @media (max-width: 900px) {

            header h1 {
                font-size: 3rem;
                /* Even smaller size for smaller screens */
            }

            .btn-primary {
                margin-top: 1.5em;
            }
        }

        @media (max-width: 768px) {

            header h1 {
                font-size: 3rem;
            }

            .btn-primary {
                margin-top: 1em;
            }
        }

        @media (max-width: 600px) {

            header h1 {
                font-size: 1.7rem;
                margin-bottom: 0.5em;
            }

            .btn-primary {
                margin-top: 0.1em;
            }

        }

        .round-button-circle {
            background: #d9c391 !important;
        }

        .round-button-circle:hover {
            background: #9f8546 !important;
        }

        /*************   RESERVATION  *************/
        .modal-content {
            border: 1px solid #e3e3e3;
            border-radius: 15px;
            /* box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1); */
            box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
        }

        .modal-body {
            padding: 30px;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }

        .stepwizard-step p {
            margin-top: 10px;
        }

        .btn-default[disabled] {
            background-color: #eee;
        }


        /***** AMIN */



        .wrapper {
            display: flex;
            gap: 20px;
            width: 900px;
            border-radius: 14px;
            overflow-x: hidden;
            /* Hide the scrollbar */
            scroll-snap-type: x mandatory;
            margin-left: 10em;
            scroll-behavior: smooth;
            /* Smooth scrolling */
        }

        .dots-container {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .dot {
            width: 12px;
            height: 12px;
            margin: 0 5px;
            background-color: #ccc;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .dot.active {
            background-color: #333;
        }

        .cardprog {
            scroll-snap-align: center;
            box-sizing: border-box;
            padding: 20px 30px;
            flex-shrink: 0;
            width: 40%;
            background-color: white;
            border-radius: 14px;
            text-align: center;
            margin-top: 2em;
        }

        .card-img {
            max-width: 100%;
            border-radius: 8px 8px 0 0;
            height: auto;
        }

        .card-title {
            font-size: 24px;
            margin: 16px 0;
            color: #333;
        }

        .card-description {
            font-size: 16px;
            color: #666;
        }

        .subtitle {
            text-transform: none;
            font-size: 14px;
            color: #6c757d;
        }

        .carousel-item .image-container {
            position: relative;
            width: 100%;
            height: 100%;
            padding-top: 100%;
        }

        .carousel-item {
            position: relative;
            display: none;
            float: left;
            width: 100%;
            height: 100%;
            margin-right: -100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;

        }

        @media (max-width: 600px) {

            /* .hotel-info {
                background-color: #fff;
                padding: 30 30px 0px 30px !important;
            } */
            .hotel-info {
                background-color: rgba(255, 255, 255, 0.8);
                padding: 15px;
                border-radius: 8px;
                max-width: 22em;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            }
        }

        body {
            position: relative;
            /* This is important for positioning the arrows */
        }

        .wrapper {
            position: relative;
            scroll-behavior: smooth;
        }

        .prev-btn,
        .next-btn {
            position: sticky;
            /* Now sticky inside the carousel */
            top: 50%;
            transform: translateY(-50%);
            border: none;
            padding: 10px;
            cursor: pointer;
            font-size: 20px;
            z-index: 10;
            background-color: #DAC392 !important;
            border-radius: 50%;
            padding: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 30px;
            width: 30px;
        }

        .prev-btn {
            left: 0;
            margin-left: 10px;
            margin-top: 10em;

            /* Adjust spacing to move closer to the carousel */
        }

        .next-btn {
            right: 0;
            margin-right: 10px;
            margin-top: 10em;
            /* Adjust spacing to move closer to the carousel */
        }

        .non-clickable {
            pointer-events: none;
            /* Disable clicks */
            cursor: default;
            /* Change cursor to default (arrow) */
        }

        .wrapper {
            display: flex;
            /* Ensure items are arranged horizontally */
            overflow-x: auto;
            /* Enable horizontal scrolling */
            scroll-snap-type: x mandatory;
            /* For snapping (optional) */
        }

        .wrapper {
            display: flex;
            /* or inline-flex */
            overflow-x: auto;
        }

        #programme .wrapper {
            overflow-x: hidden;
            /* Allow horizontal scrolling if needed */
            scroll-snap-type: x mandatory;
            /* For snap-scrolling to each card */
        }


        #programme .dots {
            display: flex;
            justify-content: center;
            margin-top: 10px;
            /* Adjust as needed */
        }

        #programme .dot {
            width: 10px;
            height: 10px;
            margin: 0 5px;
            background-color: #ddd;
            border-radius: 50%;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        #programme .dot.active {
            background-color: #333;
        }

        .back-button {
            position: absolute;
            top: 10px;
            /* Adjust as needed */
            left: 10px;
            /* Adjust as needed */
            background-color: #fff;
            /* Or match your header background */
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
            display: flex;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            /* Optional subtle shadow */
        }

        .back-button i {
            /* Style the icon */
            margin-right: 5px;
        }

        /* Optional: Larger back button for better visibility */
        @media (min-width: 768px) {

            /* Adjust breakpoint as needed */
            .back-button {
                padding: 15px;
            }

            .back-button i {
                font-size: 1.2em;
            }
        }

        @media (max-width: 370px) {
            .date-selection {
                flex-wrap: nowrap;
            }

            .header {
                border-bottom-left-radius: 40px;
                border-bottom-right-radius: 40px;
            }
        }

        .carousel-item {
            transition: none !important;
        }

        @media (max-width: 607px) {
            .hotel-checkin.hotel_info {
                min-width: 50% !important;
                margin-top: 10px;
            }

            .hotel-checkout.hotel_info {
                min-width: 50% !important;
                margin-top: 10px;
            }

            .hotel-nights.hotel_info {
                min-width: 50% !important;
            }

            .hotel-monument.hotel_info {
                min-width: 50% !important;
            }

            .hotel-pension.hotel_info {
                min-width: 50% !important;
            }

            .hotel-footer div {
                /* font-size: 12px; */
                margin-bottom: 10px;
            }

            .hotel-info {
                max-width: 13em;
                padding: 5px;
                padding: 10px;
            }

            .hotel-name h3 {
                font-size: 15px;
            }

            .hotel-stars {
                font-size: 10px;
            }

            .hotel-footer {
                margin-left: 10px;
            }

            .carousel-control-next-icon {
                width: 1.5rem;
                height: 1.5rem;
            }

            .carousel-control-prev-icon {
                width: 1.5rem;
                height: 1.5rem;
            }

            .carousel-control-next,
            .carousel-control-prev {
                bottom: 50px;
                width: 25%;
            }

            .hotel-info {
                z-index: 0;
            }

            .hotel-footer {
                z-index: 0;
            }

            button.carousel-control-next {
                z-index: 0;
            }

            button.carousel-control-prev {
                z-index: 0;
            }



            .d-block.w-100 {
                height: 35em !important;
                background-position: bottom !important;
            }
        }

        .carousel-control-next-icon {
            background-color: #cfb57a;
            border-radius: 50px;
            color: #000;
        }

        .carousel-control-prev-icon {
            background-color: #cfb57a;
            border-radius: 50px;
        }

        .accordion-button:focus {
            z-index: 3;
            border-color: #F7F2E8;
            outline: 0;
            box-shadow: #F7F2E8;
        }

        .accordion-flush>.accordion-item>.accordion-header .accordion-button,
        .accordion-flush>.accordion-item>.accordion-header .accordion-button.collapsed {
            background-color: #F7F2E8;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            padding: 10px;
            margin-top: 5px;
        }

        .accordion-flush>.accordion-item>.accordion-header .accordion-button,
        .accordion-flush>.accordion-item>.accordion-header .accordion-button .collapsed {
            background-color: #d9c391;
        }

        h4 {
            font-family: 'Belly Display', sans-serif;
            color: black !important;
        }

        h1 {
            font-family: 'Belly Display', sans-serif !important;
        }

        .accordion-button:focus {
            border-color: #f7f2e8;
            box-shadow: none !important;
        }

        button.btn.btn-primary.nextBtn {
            margin-top: 0px !important;
        }

        .more-text {
            display: none;
            /* Hidden by default */
        }

        .read-more-btn {
            background-color: #fff0;
            color: #000;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
            font-size: 14px;
            margin-top: 10px;
            display: inline-block;
            font-weight: bold;
        }

        .read-more-btn:hover {
            color: #DAC392 !important;
        }

        .show-more-button {
            background-color: transparent;
            border: none;
            color: #007bff;
            /* This color can be adjusted to match your theme */
            cursor: pointer;
            padding: 0;
            font-size: inherit;
            /* Inherits the font size of the surrounding text */
        }

        .show-more-button:hover {
            text-decoration: underline;
        }

        .accordion-flush>.accordion-item>.accordion-header .accordion-button,
        .accordion-flush>.accordion-item>.accordion-header .accordion-button.collapsed {
            background-color: #F7F2E8;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            padding: 10px;
            margin-top: 5px;
            font-weight: bold;
        }

        button#btn-primary {
            color: #000;
            font-weight: 500;
        }

        div#booking {
            margin-bottom: 5em;
        }

        html,
        body {
            scroll-behavior: auto;
            /* This prevents smooth scrolling which might cause unwanted behavior */
        }

        .accordion-button:not(.collapsed) {
            color: #000;

        }

        .hotel-name {
            font-family: 'Belly Display' !important;
        }

        .fa-solid.fa-star {
            color: #D9C391 !important;
        }

        button.btn-cnfrm {
            font-size: 15px !important;
        }



        .wrapper {
            display: flex;
            gap: 20px;
            width: 1000px;
            border-radius: 14px;
            overflow-x: hidden;
            scroll-snap-type: x mandatory;
            margin-left: 4em;
            scroll-behavior: smooth;
        }

        .mb-4 {
            margin-bottom: 0px !important;

        }

        .hotel-footer {
            z-index: 0;
        }
    </style>
</head>

<body>
    <div class="container" tabindex="-1">

        <header class="header">
            <?php
            // Fetch the type_id from the formules table using formule_id
            $sql_formule = "SELECT type_id FROM formules WHERE id = " . $formule_id;
            $result_formule = mysqli_query($conn, $sql_formule);

            if (mysqli_num_rows($result_formule) > 0) {
                $formule_data = mysqli_fetch_assoc($result_formule);
                $type_id = $formule_data['type_id'];

                // Now, fetch the nom from type_formule_omra table using type_id
                $sql_type_formule = "SELECT nom FROM type_formule_omra WHERE id = " . $type_id;
                $result_type_formule = mysqli_query($conn, $sql_type_formule);

                if (mysqli_num_rows($result_type_formule) > 0) {
                    $type_formule_data = mysqli_fetch_assoc($result_type_formule);
                    $nom_type_formule = $type_formule_data['nom'];
                } else {
                    echo "<p>Erreur: Type de formule non trouvé.</p>";
                }
            } else {
                echo "<p>Erreur: Formule non trouvée.</p>";
            }
            ?>
            <h1 style="font-family:bely display;"><?php echo $nom_type_formule; ?></h1>


            <div style="margin-bottom: 20px;">
                <a href="#booking" style="text-decoration: none;">
                    <button id="btn-primary" type="button" class="btn btn-primary"
                        style="display: block; margin-left: auto; margin-right: auto; background-color:#d9c391; border:0px;">
                        Réserver Maintenant
                    </button>
                </a>
            </div>
        </header>

        <div class="date-selection">
            <div class="date-box" style="text-align: right; padding:0 10px; margin-top:7px">
                <label>Départ</label>
                <span><?php echo htmlspecialchars(date('D d-m-Y', strtotime($formule['date_depart']))); ?></span>
            </div>
            <div class="date-box" style="margin: 20px 0px;">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="30" viewBox="0 0 1000 300">
                    <defs>
                        <style>
                            .cls-1 {
                                fill: #d9c391;
                            }
                        </style>
                    </defs>
                    <circle id="Ellipse_1_copy" data-name="Ellipse 1 copy" class="cls-1" cx="78.75" cy="250"
                        r="44.75" />
                    <circle id="Ellipse_1_copy_2" data-name="Ellipse 1 copy 2" class="cls-1" cx="918.75" cy="250"
                        r="44.75" />
                    <rect class="cls-1" x="164" y="238" width="669" height="25" />
                </svg>
                <label style="font-size: 13px;">Durée<br
                        style="display: block;"><?php echo htmlspecialchars($formule['duree_sejour']); ?></label>
            </div>
            <div class="date-box" style="text-align: left;  padding:0 10px; margin-top:7px">
                <label>Arrivée</label>
                <span><?php echo htmlspecialchars(date('D d-m-Y', strtotime($formule['date_retour']))); ?></span>
            </div>


            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <!-- Button Trigger -->
            <div class="round-button" data-type-id="<?php echo $formule['type_id']; ?>"
                data-package-id="<?php echo $formule['package_id']; ?>">
                <div class="round-button-circle">
                    <a class="round-button"><i class="fa-solid fa-calendar-days"></i><br style="display: block;">Autres
                        dates</a>
                </div>
            </div>

            <!-- Modal for displaying additional dates -->
            <div class="modal fade" id="formulesModal" tabindex="-1" aria-labelledby="formulesModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="formulesModalLabel">AUTRES DATES</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- This will be dynamically populated -->
                            <div id="formulesContent"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- jQuery Script -->
            <script>
                $(document).ready(function () {
                    // Handle the "AUTRES DATES" button click using event delegation
                    $(document).on('click', '.round-button[data-type-id]', function () {
                        var typeId = $(this).data('type-id');
                        var packageId = $(this).data('package-id');

                        $.ajax({
                            url: 'fetch_formules.php',
                            type: 'GET',
                            data: {
                                type_id: typeId,
                                package_id: packageId
                            },
                            success: function (response) {
                                $('#formulesContent').html(response);
                                $('#formulesModal').modal('show');
                            },
                            error: function (xhr, status, error) {
                                console.error("An error occurred: " + error);
                            }
                        });
                    });
                });
            </script>



        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">




            <!-- Pourquoi Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Pourquoi choisir la formule?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>
                            <?php echo ($formule['description']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <!--- hebergement --->
            <div class="accordion-item">
                <?php
                include '../db.php'; // Include your database connection file
                
                $formule_id = $_GET['id'];

                // Fetch the main formule data
                $query = "
                SELECT 
                    f.*, 
                    h.nom AS hotel_name, 
                    h.etoiles AS hotel_stars,
                    h.ville AS hotel_city,
                    h.details AS hotel_details,
                    h.monument AS hotel_distance,
                    hb.date_checkin, 
                    hb.date_checkout, 
                    hb.nombre_nuit, 
                    hb.type_pension
                    
                FROM 
                    formules f
                LEFT JOIN 
                    hebergements hb ON f.id = hb.formule_id
                LEFT JOIN 
                    hotels h ON hb.hotel_id = h.id
                WHERE 
                    f.id = ?
                ";
                $stmt = $conn->prepare($query);
                $stmt->bind_param('i', $formule_id);
                $stmt->execute();
                $result = $stmt->get_result();
                $formule = $result->fetch_assoc();

                // Fetch all hebergements for the formule
                $hebergements_query = "
                    SELECT 
                        hb.*, 
                        h.nom AS hotel_name, 
                        h.etoiles AS hotel_stars, 
                        h.ville AS hotel_city, 
                        h.details AS hotel_details,
                        h.monument AS hotel_distance,
                        h.id AS hotel_id
                    FROM 
                        hebergements hb
                    LEFT JOIN 
                        hotels h ON hb.hotel_id = h.id
                    WHERE 
                        hb.formule_id = ?
                    ";
                $hebergements_stmt = $conn->prepare($hebergements_query);
                $hebergements_stmt->bind_param("i", $formule_id);
                $hebergements_stmt->execute();
                $hebergements_result = $hebergements_stmt->get_result();
                ?>
                <h2 class="accordion-header" id="flush-headingzero1">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapsezero1" aria-expanded="false" aria-controls="flush-collapsezero1">
                        Hébergements
                    </button>
                </h2>
                <div id="flush-collapsezero1" class="accordion-collapse collapse" aria-labelledby="flush-headingzero1"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="card-container">
                                <?php if ($hebergements_result->num_rows > 0) { ?>

                                <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                    <div class="carousel-inner">
                                        <?php
                                        $isActive = true;
                                        while ($hotel = $hebergements_result->fetch_assoc()) {
                                            // Fetch hotel gallery images
                                            $hotel_id = $hotel['hotel_id'];
                                            $gallery_query = "SELECT image_path FROM hotel_gallery WHERE hotel_id = $hotel_id";
                                            $gallery_result = $conn->query($gallery_query);
                                            ?>
                                        <div class="carousel-item <?php echo $isActive ? 'active' : ''; ?>">
                                            <div id="neoidea">
                                                <!-- <ol class="carousel-indicators">
                                                            <!?php for ($i = 0; $i < $gallery_result->num_rows; $i++) { ?>
                                                                <li data-bs-target="#step<!?php echo $hotel_id; ?>" data-bs-slide-to="<!?php echo $i; ?>" class="<!?php echo $i === 0 ? 'active' : ''; ?>"></li>
                                                            <!?php } ?>
                                                        </ol> -->
                                                        <div class="tab-content">
                                                            <?php
                                                            $tabIndex = 0;
                                                            while ($image = $gallery_result->fetch_assoc()) { ?>
                                                                <div class="tab-pane <?php echo $tabIndex === 0 ? 'active' : ''; ?>"
                                                                    id="step<?php echo $hotel_id; ?>-<?php echo $tabIndex; ?>">
                                                                    <div class="d-block w-100"
                                                                        style="background-image: url('../<?php echo $image['image_path']; ?>'); height: 400px; background-size: cover; background-position: bottom; padding: 15px;">
                                                                        <div class="hotel-infos">
                                                                            <div class="hotel-info">

                                                                                <?php
                                                                                // Fetch and display package name, stars, and details
                                                                                $hoteluni_id = $hotel['hotel_id'];
                                                                                $query_hoteluni = "SELECT nom, etoiles, details,monument,ville FROM hotels WHERE id = ?";
                                                                                $stmt_hoteluni = $conn->prepare($query_hoteluni);
                                                                                $stmt_hoteluni->bind_param("i", $hoteluni_id);
                                                                                $stmt_hoteluni->execute();
                                                                                $result_hoteluni = $stmt_hoteluni->get_result();
                                                                                $hoteluni = $result_hoteluni->fetch_assoc();
                                                                                ?>


                                                                                <div class="hotel-details">
                                                                                    <?php echo $hoteluni['ville']; ?>
                                                                                </div>
                                                                                <div class="hotel-name">
                                                                                    <h3 style="font-family: Bely Display;">
                                                                                        <b><?php echo $hoteluni['nom']; ?></b>
                                                                                    </h3>
                                                                                </div>
                                                                                <div class="hotel-stars">
                                                                                    <?php
                                                                                    $numStars = (int) $hoteluni['etoiles'];
                                                                                    for ($i = 0; $i < $numStars; $i++) {
                                                                                        echo '<i class="fa-solid fa-star" style="color: #FFD700;"></i>'; // Use Unicode star for consistent display
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                    // Fetch and display package name
                                                                                    $hoteluni_id = $hotel['hotel_id'];
                                                                                    $query_hoteluni = "SELECT nom,etoiles,details,monument,ville FROM hotels WHERE id = ?";  // Querying the correct table (assuming package names are stored here)
                                                                                    $stmt_hoteluni = $conn->prepare($query_hoteluni);
                                                                                    $stmt_hoteluni->bind_param("i", $hoteluni_id);
                                                                                    $stmt_hoteluni->execute();
                                                                                    $result_hoteluni = $stmt_hoteluni->get_result();
                                                                                    $hoteluni = $result_hoteluni->fetch_assoc();
                                                                                    ?>

                                                                                </div>


                                                                            </div>
                                                                            <div class="hotel-footer">

                                                                                <div class="hotel-checkin hotel_info">
                                                                                    <svg class="hotel-icons"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        width="67.255" height="67.255"
                                                                                        viewBox="0 0 67.255 67.255">
                                                                                        <defs>
                                                                                            <clipPath id="clip-path">
                                                                                                <path id="Clip_2" data-name="Clip 2"
                                                                                                    d="M0,0H31.491V31.491H0Z"
                                                                                                    fill="none"></path>
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                        <g id="Groupe_24" data-name="Groupe 24"
                                                                                            transform="translate(-1350.792 -7406)">
                                                                                            <circle id="Oval_Copy_3"
                                                                                                data-name="Oval Copy 3" cx="33.627"
                                                                                                cy="33.627" r="33.627"
                                                                                                transform="translate(1350.792 7406)"
                                                                                                fill="#f7f2e8">
                                                                                            </circle>
                                                                                            <g id="Group_8" data-name="Group 8"
                                                                                                transform="translate(1368.792 7424)">
                                                                                                <path id="Clip_2-2"
                                                                                                    data-name="Clip 2"
                                                                                                    d="M0,0H31.491V31.491H0Z"
                                                                                                    fill="none"></path>
                                                                                                <g id="Group_8-2"
                                                                                                    data-name="Group 8"
                                                                                                    clip-path="url(#clip-path)">
                                                                                                    <path id="Fill_1"
                                                                                                        data-name="Fill 1"
                                                                                                        d="M30.367,26.993H1.125A1.126,1.126,0,0,1,0,25.868V1.125A1.126,1.126,0,0,1,1.125,0H30.367a1.126,1.126,0,0,1,1.124,1.125V25.868A1.126,1.126,0,0,1,30.367,26.993ZM2.249,2.25V24.744H29.242V2.25Z"
                                                                                                        transform="translate(0 4.498)">
                                                                                                    </path>
                                                                                                    <path id="Fill_3"
                                                                                                        data-name="Fill 3"
                                                                                                        d="M30.367,2.249H1.125A1.125,1.125,0,1,1,1.125,0H30.367a1.125,1.125,0,1,1,0,2.249"
                                                                                                        transform="translate(0 11.247)">
                                                                                                    </path>
                                                                                                    <path id="Fill_4"
                                                                                                        data-name="Fill 4"
                                                                                                        d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                                                        transform="translate(4.499 0)">
                                                                                                    </path>
                                                                                                    <path id="Fill_5"
                                                                                                        data-name="Fill 5"
                                                                                                        d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                                                        transform="translate(20.245 0)">
                                                                                                    </path>
                                                                                                    <path id="Fill_6"
                                                                                                        data-name="Fill 6"
                                                                                                        d="M7.873,9a1.129,1.129,0,0,1-.8-.328L.329,1.918A1.124,1.124,0,0,1,1.919.329L8.667,7.076A1.124,1.124,0,0,1,7.873,9Z"
                                                                                                        transform="translate(17.995 17.997)">
                                                                                                    </path>
                                                                                                    <path id="Fill_7"
                                                                                                        data-name="Fill 7"
                                                                                                        d="M1.125,9a1.124,1.124,0,0,1-.8-1.919L7.077.329a1.124,1.124,0,0,1,1.59,1.59L1.919,8.667A1.121,1.121,0,0,1,1.125,9Z"
                                                                                                        transform="translate(17.995 17.997)">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div class="hotel-checkin-text">
                                                                                        <h6><b>Check-in</b></h6>
                                                                                        <?php echo $hotel['date_checkin']; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="hotel-checkout hotel_info">
                                                                                    <svg class="hotel-icons"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        width="67.255" height="67.255"
                                                                                        viewBox="0 0 67.255 67.255">
                                                                                        <defs>
                                                                                            <clipPath id="clip-path">
                                                                                                <path id="Clip_2" data-name="Clip 2"
                                                                                                    d="M0,0H31.491V31.491H0Z"
                                                                                                    fill="none"></path>
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                        <g id="Groupe_24" data-name="Groupe 24"
                                                                                            transform="translate(-1350.792 -7406)">
                                                                                            <circle id="Oval_Copy_3"
                                                                                                data-name="Oval Copy 3" cx="33.627"
                                                                                                cy="33.627" r="33.627"
                                                                                                transform="translate(1350.792 7406)"
                                                                                                fill="#f7f2e8">
                                                                                            </circle>
                                                                                            <g id="Group_8" data-name="Group 8"
                                                                                                transform="translate(1368.792 7424)">
                                                                                                <path id="Clip_2-2"
                                                                                                    data-name="Clip 2"
                                                                                                    d="M0,0H31.491V31.491H0Z"
                                                                                                    fill="none"></path>
                                                                                                <g id="Group_8-2"
                                                                                                    data-name="Group 8"
                                                                                                    clip-path="url(#clip-path)">
                                                                                                    <path id="Fill_1"
                                                                                                        data-name="Fill 1"
                                                                                                        d="M30.367,26.993H1.125A1.126,1.126,0,0,1,0,25.868V1.125A1.126,1.126,0,0,1,1.125,0H30.367a1.126,1.126,0,0,1,1.124,1.125V25.868A1.126,1.126,0,0,1,30.367,26.993ZM2.249,2.25V24.744H29.242V2.25Z"
                                                                                                        transform="translate(0 4.498)">
                                                                                                    </path>
                                                                                                    <path id="Fill_3"
                                                                                                        data-name="Fill 3"
                                                                                                        d="M30.367,2.249H1.125A1.125,1.125,0,1,1,1.125,0H30.367a1.125,1.125,0,1,1,0,2.249"
                                                                                                        transform="translate(0 11.247)">
                                                                                                    </path>
                                                                                                    <path id="Fill_4"
                                                                                                        data-name="Fill 4"
                                                                                                        d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                                                        transform="translate(4.499 0)">
                                                                                                    </path>
                                                                                                    <path id="Fill_5"
                                                                                                        data-name="Fill 5"
                                                                                                        d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                                                        transform="translate(20.245 0)">
                                                                                                    </path>
                                                                                                    <path id="Fill_6"
                                                                                                        data-name="Fill 6"
                                                                                                        d="M7.873,9a1.129,1.129,0,0,1-.8-.328L.329,1.918A1.124,1.124,0,0,1,1.919.329L8.667,7.076A1.124,1.124,0,0,1,7.873,9Z"
                                                                                                        transform="translate(17.995 17.997)">
                                                                                                    </path>
                                                                                                    <path id="Fill_7"
                                                                                                        data-name="Fill 7"
                                                                                                        d="M1.125,9a1.124,1.124,0,0,1-.8-1.919L7.077.329a1.124,1.124,0,0,1,1.59,1.59L1.919,8.667A1.121,1.121,0,0,1,1.125,9Z"
                                                                                                        transform="translate(17.995 17.997)">
                                                                                                    </path>
                                                                                                </g>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div class="hotel-checkin-text">
                                                                                        <h6><b>Check-out</b></h6>
                                                                                        <?php echo $hotel['date_checkout']; ?>
                                                                                    </div>
                                                                                </div>

                                                                                <div class="hotel-nights hotel_info">
                                                                                    <svg class="hotel-icons"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="67.255" height="67.255"
                                                                                        viewBox="0 0 67.255 67.255">
                                                                                        <g id="Groupe_23" data-name="Groupe 23"
                                                                                            transform="translate(-1011 -7560)">
                                                                                            <circle id="Oval_Copy_12"
                                                                                                data-name="Oval Copy 12" cx="33.627"
                                                                                                cy="33.627" r="33.627"
                                                                                                transform="translate(1011 7560)"
                                                                                                fill="#f7f2e8"></circle>
                                                                                            <g id="Group_3" data-name="Group 3"
                                                                                                transform="translate(1025 7578)">
                                                                                                <path id="Fill_1" data-name="Fill 1"
                                                                                                    d="M39.2,32H35.081a.8.8,0,0,1-.8-.789V28.051H5.719V31.21a.8.8,0,0,1-.8.789H.8A.8.8,0,0,1,0,31.21V20.154a3.975,3.975,0,0,1,3.2-3.869V2.779a.792.792,0,0,1,.6-.765,66.144,66.144,0,0,1,32.4,0,.792.792,0,0,1,.6.765V16.285A3.975,3.975,0,0,1,40,20.154V31.21A.8.8,0,0,1,39.2,32ZM4.918,26.471H35.082a.8.8,0,0,1,.8.79v3.158H38.4V23.312H1.6v7.107h5.118V27.26A.8.8,0,0,1,4.918,26.471ZM4,17.783a2.388,2.388,0,0,0-2.4,2.37v1.58H38.4v-1.58A2.387,2.387,0,0,0,36,17.784h5Zm20.225-5.971h6.649A2.711,2.711,0,0,1,33.6,14.5v1.7h1.6V3.4a64.51,64.51,0,0,0-30.4,0v12.81H6.4V14.5a2.711,2.711,0,0,1,2.725-2.69h6.65A2.711,2.711,0,0,1,18.5,14.5v1.7h3V14.5A2.711,2.711,0,0,1,24.224,11.813Zm0,1.579A1.119,1.119,0,0,0,23.1,14.5v1.7H32V14.5a1.119,1.119,0,0,0-1.125-1.111Zm-15.1,0A1.119,1.119,0,0,0,8,14.5v1.7h8.9V14.5a1.119,1.119,0,0,0-1.125-1.111Z"
                                                                                                    stroke="#000"
                                                                                                    stroke-miterlimit="10"
                                                                                                    stroke-width="0.4">
                                                                                                </path>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div class="hotel-checkin-text">
                                                                                        <h6><b>Durée du séjour</b></h6>
                                                                                        <?php echo $hotel['nombre_nuit']; ?> nuitées
                                                                                    </div>
                                                                                </div>

                                                                                <div class="hotel-monument hotel_info">
                                                                                    <svg class="hotel-icons"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                        width="67.255" height="67.255"
                                                                                        viewBox="0 0 67.255 67.255">
                                                                                        <defs>
                                                                                            <clipPath id="clip-path">
                                                                                                <path id="Clip_4" data-name="Clip 4"
                                                                                                    d="M0,0H24.745V20.248H0Z"
                                                                                                    fill="none"></path>
                                                                                            </clipPath>
                                                                                        </defs>
                                                                                        <g id="Groupe_22" data-name="Groupe 22"
                                                                                            transform="translate(-1350.792 -7560)">
                                                                                            <circle id="Oval_Copy_11"
                                                                                                data-name="Oval Copy 11" cx="33.627"
                                                                                                cy="33.627" r="33.627"
                                                                                                transform="translate(1350.792 7560)"
                                                                                                fill="#f7f2e8"></circle>
                                                                                            <g id="Group_6" data-name="Group 6"
                                                                                                transform="translate(1377.792 7580)">
                                                                                                <path id="Fill_1" data-name="Fill 1"
                                                                                                    d="M1.125,31.491A1.125,1.125,0,0,1,0,30.366V1.124a1.125,1.125,0,0,1,2.25,0V30.366a1.125,1.125,0,0,1-1.125,1.125"
                                                                                                    transform="translate(0.001 0.004)">
                                                                                                </path>
                                                                                                <g id="Group_5" data-name="Group 5">
                                                                                                    <path id="Clip_4-2"
                                                                                                        data-name="Clip 4"
                                                                                                        d="M0,0H24.745V20.248H0Z"
                                                                                                        fill="none"></path>
                                                                                                    <g id="Group_5-2"
                                                                                                        data-name="Group 5"
                                                                                                        clip-path="url(#clip-path)">
                                                                                                        <path id="Fill_3"
                                                                                                            data-name="Fill 3"
                                                                                                            d="M1.126,20.248A1.124,1.124,0,0,1,.708,18.08L20.59,10.126.708,2.172A1.125,1.125,0,1,1,1.542.082l22.494,9a1.125,1.125,0,0,1,0,2.09l-22.493,9A1.147,1.147,0,0,1,1.126,20.248Z"
                                                                                                            transform="translate(0)">
                                                                                                        </path>
                                                                                                    </g>
                                                                                                </g>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div class="hotel-checkin-text">
                                                                                        <h6><b>Distance</b></h6>
                                                                                        <?php echo $hotel['hotel_distance']; ?>
                                                                                    </div>

                                                                                </div>

                                                                                <div class="hotel-pension hotel_info">
                                                                                    <svg class="hotel-icons"
                                                                                        xmlns="http://www.w3.org/2000/svg"
                                                                                        width="67.255" height="67.255"
                                                                                        viewBox="0 0 67.255 67.255">
                                                                                        <g id="Groupe_21" data-name="Groupe 21"
                                                                                            transform="translate(-1011 -7706)">
                                                                                            <circle id="Oval_Copy_14"
                                                                                                data-name="Oval Copy 14" cx="33.627"
                                                                                                cy="33.627" r="33.627"
                                                                                                transform="translate(1011 7706)"
                                                                                                fill="#f7f2e8"></circle>
                                                                                            <g id="Group_13" data-name="Group 13"
                                                                                                transform="translate(1032 7725)">
                                                                                                <path id="Fill_1" data-name="Fill 1"
                                                                                                    d="M6.265,15H5.783a5.3,5.3,0,0,1-4.115-2.066,8.131,8.131,0,0,1-1.4-7.082L.514,4.9C1.285,1.969,3.489,0,6,0c2.535,0,4.74,1.969,5.486,4.9l.24.952a8.133,8.133,0,0,1-1.4,7.082A5.18,5.18,0,0,1,6.265,15ZM6.025,2.3c-1.407,0-2.674,1.26-3.153,3.135l-.241.952a6,6,0,0,0,.963,5.108,2.9,2.9,0,0,0,2.214,1.184h.506a2.9,2.9,0,0,0,2.214-1.184,6,6,0,0,0,.963-5.108l-.241-.952C8.691,3.558,7.395,2.3,6.025,2.3Z"
                                                                                                    transform="translate(15)">
                                                                                                </path>
                                                                                                <path id="Line_2" data-name="Line 2"
                                                                                                    d="M.5.432V18.568"
                                                                                                    transform="translate(6 14)"
                                                                                                    fill="none" stroke="#000"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-miterlimit="10"
                                                                                                    stroke-width="2"></path>
                                                                                                <path id="Line_2_Copy"
                                                                                                    data-name="Line 2 Copy"
                                                                                                    d="M.5.432V18.568"
                                                                                                    transform="translate(21 14)"
                                                                                                    fill="none" stroke="#000"
                                                                                                    stroke-linecap="round"
                                                                                                    stroke-linejoin="round"
                                                                                                    stroke-miterlimit="10"
                                                                                                    stroke-width="2"></path>
                                                                                                <path id="Fill_7" data-name="Fill 7"
                                                                                                    d="M6,7A5.926,5.926,0,0,1,0,1.166V0H12V1.166A5.925,5.925,0,0,1,6,7ZM2.616,2.334A3.618,3.618,0,0,0,6,4.667,3.571,3.571,0,0,0,9.384,2.334Z"
                                                                                                    transform="translate(0 8)">
                                                                                                </path>
                                                                                                <path id="Fill_9" data-name="Fill 9"
                                                                                                    d="M0,8H2V0H0Z"></path>
                                                                                                <path id="Fill_11"
                                                                                                    data-name="Fill 11"
                                                                                                    d="M0,8H2V0H0Z"
                                                                                                    transform="translate(5)"></path>
                                                                                                <path id="Fill_12"
                                                                                                    data-name="Fill 12"
                                                                                                    d="M0,8H2V0H0Z"
                                                                                                    transform="translate(10)">
                                                                                                </path>
                                                                                            </g>
                                                                                        </g>
                                                                                    </svg>
                                                                                    <div class="hotel-checkin-text">
                                                                                        <h6><b>Pension</b></h6>
                                                                                        <?php echo $hotel['type_pension']; ?>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <?php
                                                                $tabIndex++;
                                                            } ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                                $isActive = false; // Only the first item should be active
                                        }
                                        ?>
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </button>
                                    </div>
                                <?php } else { ?>
                                    <p>No hébergements found.</p>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $('#myCarousel').carousel();
            </script>
            <!-- Vols Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Vols
                    </button>
                </h2>
                <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <?php
                            // Fetch the logo once based on the first record in vols
                            $sql_logo = "SELECT c.logo 
                                FROM vols v 
                                JOIN compagnies_aeriennes c ON v.compagnie_aerienne_id = c.id 
                                WHERE v.formule_id = ? 
                                LIMIT 1";
                            $stmt_logo = mysqli_prepare($conn, $sql_logo);
                            mysqli_stmt_bind_param($stmt_logo, "i", $formule_id);
                            mysqli_stmt_execute($stmt_logo);
                            $result_logo = mysqli_stmt_get_result($stmt_logo);
                            $comp_logo = mysqli_fetch_assoc($result_logo);

                            ?>

                            <!-- <div class="d-flex justify-content-between align-items-center mb-3"> -->

                            <img src="../<?php echo $comp_logo['logo']; ?>" alt="Logo de la compagnie aérienne"
                                style="width: 100px; margin-left: auto; margin-right: 0;">

                            <button class="btn-cnfrm" style="margin-left: 15px;" disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                    class="bi bi-airplane" viewBox="0 0 16 16">
                                    <path
                                        d="M6.428 1.151C6.708.591 7.213 0 8 0s1.292.592 1.572 1.151C9.861 1.73 10 2.431 10 3v3.691l5.17 2.585a1.5 1.5 0 0 1 .83 1.342V12a.5.5 0 0 1-.582.493l-5.507-.918-.375 2.253 1.318 1.318A.5.5 0 0 1 10.5 16h-5a.5.5 0 0 1-.354-.854l1.319-1.318-.376-2.253-5.507.918A.5.5 0 0 1 0 12v-1.382a1.5 1.5 0 0 1 .83-1.342L6 6.691V3c0-.568.14-1.271.428-1.849m.894.448C7.111 2.02 7 2.569 7 3v4a.5.5 0 0 1-.276.447l-5.448 2.724a.5.5 0 0 0-.276.447v.792l5.418-.903a.5.5 0 0 1 .575.41l.5 3a.5.5 0 0 1-.14.437L6.708 15h2.586l-.647-.646a.5.5 0 0 1-.14-.436l.5-3a.5.5 0 0 1 .576-.411L15 11.41v-.792a.5.5 0 0 0-.276-.447L9.276 7.447A.5.5 0 0 1 9 7V3c0-.432-.11-.979-.322-1.401C8.458 1.159 8.213 1 8 1s-.458.158-.678.599" />
                                </svg>&nbsp;&nbsp;<b>CONFIRMÉ</b></button>

                            <!-- </div> -->
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th>N° Vol</th>
                                        <th>Départ</th>
                                        <th>Aéroport</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                        <th>Destination</th>
                                        <th>Aéroport</th>
                                        <th>Date</th>
                                        <th>Heure</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // Assuming $conn is your existing database connection
                                    $sql_vols = "SELECT * FROM vols WHERE formule_id = ?";
                                    $stmt_vols = mysqli_prepare($conn, $sql_vols);
                                    mysqli_stmt_bind_param($stmt_vols, "i", $formule_id);
                                    mysqli_stmt_execute($stmt_vols);
                                    $result_vols = mysqli_stmt_get_result($stmt_vols);

                                    if (mysqli_num_rows($result_vols) > 0) {
                                        while ($vols = mysqli_fetch_assoc($result_vols)) {
                                            // Fetch departure city
                                            $villed_id = $vols['ville_depart_id'];
                                            $query_villed = "SELECT nom FROM ville_depart WHERE id = ?";
                                            $stmt_villed = $conn->prepare($query_villed);
                                            $stmt_villed->bind_param("i", $villed_id);
                                            $stmt_villed->execute();
                                            $result_villed = $stmt_villed->get_result();
                                            $villed = $result_villed->fetch_assoc();

                                            // Fetch departure airport
                                            $airp_id = $vols['airport_depart_id'];
                                            $query_airp = "SELECT abrv FROM airports WHERE id = ?";
                                            $stmt_airp = $conn->prepare($query_airp);
                                            $stmt_airp->bind_param("i", $airp_id);
                                            $stmt_airp->execute();
                                            $result_airp = $stmt_airp->get_result();
                                            $airp_depart = $result_airp->fetch_assoc();

                                            // Fetch destination city
                                            $villed_dest_id = $vols['ville_destination_id'];
                                            $query_villed_dest = "SELECT nom FROM ville_depart WHERE id = ?";
                                            $stmt_villed_dest = $conn->prepare($query_villed_dest);
                                            $stmt_villed_dest->bind_param("i", $villed_dest_id);
                                            $stmt_villed_dest->execute();
                                            $result_villed_dest = $stmt_villed_dest->get_result();
                                            $villed_dest = $result_villed_dest->fetch_assoc();

                                            // Fetch destination airport
                                            $airp_dest_id = $vols['airport_destination_id'];
                                            $query_airp_dest = "SELECT abrv FROM airports WHERE id = ?";
                                            $stmt_airp_dest = $conn->prepare($query_airp_dest);
                                            $stmt_airp_dest->bind_param("i", $airp_dest_id);
                                            $stmt_airp_dest->execute();
                                            $result_airp_dest = $stmt_airp_dest->get_result();
                                            $airp_dest = $result_airp_dest->fetch_assoc();

                                            // Convert times and dates
                                            $heure_depart = date('H:i', strtotime($vols['heure_depart']));
                                            $heure_arrivee = date('H:i', strtotime($vols['heure_arrivee']));
                                            $date_depart = date('d/m/Y', strtotime($vols['heure_depart']));
                                            $date_arrivee = date('d/m/Y', strtotime($vols['heure_arrivee']));
                                            ?>
                                            <tr>
                                                <td><?php echo $vols['num_vol']; ?></td>
                                                <td><?php echo $villed['nom']; ?></td>
                                                <td><?php echo $airp_depart['abrv']; ?></td>
                                                <td><?php echo $date_depart; ?></td>
                                                <td><?php echo $heure_depart; ?></td>
                                                <td><?php echo $villed_dest['nom']; ?></td>
                                                <td><?php echo $airp_dest['abrv']; ?></td>
                                                <td><?php echo $date_arrivee; ?></td>
                                                <td><?php echo $heure_arrivee; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='9'>No Vols found for this formula.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Programmes Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingFour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour">
                        Programmes
                    </button>
                </h2>
                <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body" id="programme">
                        <section class="wrapper">
                            <button class="prev-btn">&#10094;</button>

                            <?php
                            // Fetch the data for the specified formule_id
                            $sql = "SELECT programs_id, program_order FROM formules WHERE id = $formule_id";
                            $result = mysqli_query($conn, $sql);

                            if ($result && mysqli_num_rows($result) > 0) {
                                $formule_data = mysqli_fetch_assoc($result); // Fetch the row as an associative array
                            
                                // Fetch the JSON program IDs and order from the database
                                $programIdsJson = $formule_data['programs_id'];
                                $programOrderJson = $formule_data['program_order'];

                                // Convert JSON strings to arrays
                                $programIds = json_decode($programIdsJson, true);
                                $programOrder = json_decode($programOrderJson, true);

                                // Check if the conversion was successful
                                if (is_array($programIds) && is_array($programOrder)) {
                                    // Query to fetch program details
                                    $sql_programs = "SELECT * FROM programs WHERE id IN (" . implode(',', $programIds) . ")";
                                    $result_programs = mysqli_query($conn, $sql_programs);

                                    // Create an associative array of programs
                                    $programs = [];
                                    while ($program = mysqli_fetch_assoc($result_programs)) {
                                        $programs[$program['id']] = $program;
                                    }

                                    // Display programs in the specified order
                                    foreach ($programOrder as $programId) {
                                        if (isset($programs[$programId])) {
                                            $program = $programs[$programId];
                                            ?>
                                            <div class="card cardprog">
                                                <img src="../<?php echo $program['photo']; ?>" alt="<?php echo $program['nom']; ?>"
                                                    class="card-img">
                                                <h2 class="card-title"><?php echo $program['nom']; ?></h2>
                                                <p class="card-description">
                                                    <?php
                                                    $fullDescription = $program['description'];
                                                    $truncatedDescription = substr($fullDescription, 0, 200);
                                                    echo htmlspecialchars($truncatedDescription);
                                                    ?>
                                                    <span class="dots">...</span>
                                                    <span class="more-text"
                                                        style="display:none;"><?php echo htmlspecialchars(substr($fullDescription, 200)); ?></span>
                                                </p>
                                                <button class="read-more-btn">En savoir plus</button>
                                            </div>
                                            <script>
                                                document.addEventListener('DOMContentLoaded', function () {
                                                    document.querySelectorAll('.read-more-btn').forEach(function (button) {
                                                        button.addEventListener('click', function () {
                                                            const cardDescription = this.previousElementSibling;
                                                            const dots = cardDescription.querySelector('.dots');
                                                            const moreText = cardDescription.querySelector('.more-text');

                                                            if (dots.style.display === 'none') {
                                                                dots.style.display = 'inline';
                                                                moreText.style.display = 'none';
                                                                this.textContent = 'En savoir plus';
                                                            } else {
                                                                dots.style.display = 'none';
                                                                moreText.style.display = 'inline';
                                                                this.textContent = 'Voir moins';
                                                            }
                                                        });
                                                    });
                                                });

                                            </script>
                                            <?php
                                        }
                                    }
                                } else {
                                    echo "<p>Invalid program data.</p>";
                                }
                            } else {
                                echo "<p>No data found for formule_id: 442.</p>";
                            }
                            ?>

                            <button class="next-btn">&#10095;</button>
                        </section>

                        <div class="dots-container"></div>

                    </div>
                </div>
            </div>
        </div>


        <?php
        // Inclure le fichier de connexion à la base de données
        
        // Vérifier si l'ID de la formule est présent dans l'URL
        if (isset($_GET['id'])) {
            // Récupérer l'ID de la formule depuis l'URL
            $formule_id = $_GET['id'];

            // Requête pour récupérer les détails de la formule à partir de la base de données
            $sql = "SELECT * FROM formules WHERE id = $formule_id AND statut = 'activé'";
            $result = mysqli_query($conn, $sql);

            // Vérifier si la requête a renvoyé des résultats
            if (mysqli_num_rows($result) > 0) {
                // Récupérer les données de la formule
                $formule_data = mysqli_fetch_assoc($result);




                // Requête pour récupérer le nom du package à partir de la table packages
                $sql_package = "SELECT nom FROM omra_packages WHERE id = " . $formule_data['package_id'];
                $result_package = mysqli_query($conn, $sql_package);

                // Vérifier si la requête a renvoyé des résultats pour le package
                if (mysqli_num_rows($result_package) > 0) {
                    // Récupérer le nom du package
                    $package_data = mysqli_fetch_assoc($result_package);
                    $nom_package = $package_data['nom'];

                    // Maintenant vous pouvez afficher le nom du package dans le code HTML
        
                    $sql_type_formule = "SELECT nom FROM type_formule_omra WHERE id = " . $formule_data['type_id'];
                    $result_type_formule = mysqli_query($conn, $sql_type_formule);

                    // Vérifier si la requête a renvoyé des résultats pour le type de formule
                    if (mysqli_num_rows($result_type_formule) > 0) {
                        // Récupérer le nom du type de formule
                        $type_formule_data = mysqli_fetch_assoc($result_type_formule);
                        $nom_type_formule = $type_formule_data['nom'];
                    } else {
                        echo "<p>Erreur: Type de formule non trouvé.</p>";
                    }
                } else {
                    echo "<p>Erreur: Package non trouvé.</p>";
                }


                ?>




                <div class="detail-item">
                    <!-- <i class="fas fa-plane-departure"></i> <span class="label">Aller:</span> -->
                    <?php
                    $originalDate = $formule_data['date_depart'];
                    $dateObject = new DateTime($originalDate);
                    $formattedDate = $dateObject->format('d/m/Y');
                    // echo $formattedDate;
                    ?>
                </div>














                <script>
                    document.getElementById('departureCity').addEventListener('change', function () {
                        var selectedCity = this.value.toLowerCase();
                        var formuleItems = document.querySelectorAll('.formule-item');

                        formuleItems.forEach(function (item) {
                            var cityBadge = item.querySelector('.city-badge').textContent.toLowerCase();
                            if (selectedCity === "" || cityBadge.includes(selectedCity)) {
                                item.style.display = "";
                            } else {
                                item.style.display = "none";
                            }
                        });
                    });
                </script>


                <div style="background-color:white;">
                    <div class="row" style="gap:0px; margin-left:0px; margin-right:0px;">
                        <!-- Table on the left -->
                        <div class="col-md-4 grid"
                            style="padding-right: 5px !important; padding-left: 5px !important; margin-bottom: 15px;">

                            <div class="table-responsive" style="padding:10px; box-shadow: rgba(0, 0, 0, 0.25) 0px 0.0625em 0.0625em, rgba(0, 0, 0, 0.25) 0px 0.125em 0.5em, rgba(255, 255, 255, 0.1) 0px 0px 0px 1px inset;
                                                                border-radius:15px; border: 1px solid #e3e3e3">
                                <h4 style="text-align: center; color:#0088d6">Tarif</h4>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Catégories</th>
                                            <th scope="col" class="text-end">Prix par personne</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                Individuelle
                                                <?php if (!empty($formule_data['prix_chambre_single_promo']) && $formule_data['prix_chambre_single_promo'] != "0.00" && $formule_data['prix_chambre_single_promo'] != $formule_data['prix_chambre_single']): ?>
                                                    <br style="display: block;"><span
                                                        style="color: red; font-weight: bold;">Promo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <?php if (!empty($formule_data['prix_chambre_single_promo']) && $formule_data['prix_chambre_single_promo'] != "0.00" && $formule_data['prix_chambre_single_promo'] != $formule_data['prix_chambre_single']): ?>
                                                    <span
                                                        style="font-size: 1.2em; font-weight: bold;"><?php echo htmlspecialchars($formule_data['prix_chambre_single_promo']); ?>
                                                        &euro;</span> <br style="display: block;">
                                                    <span
                                                        style="text-decoration: line-through; color:red;"><?php echo htmlspecialchars($formule_data['prix_chambre_single']); ?>
                                                        &euro;</span>
                                                <?php else: ?>
                                                    <?php echo htmlspecialchars($formule_data['prix_chambre_single']); ?> &euro;
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Double
                                                <?php if (!empty($formule_data['prix_chambre_double_promo']) && $formule_data['prix_chambre_double_promo'] != "0.00" && $formule_data['prix_chambre_double_promo'] != $formule_data['prix_chambre_double']): ?>
                                                    <br style="display: block;"><span
                                                        style="color: red; font-weight: bold;">Promo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <?php if (!empty($formule_data['prix_chambre_double_promo']) && $formule_data['prix_chambre_double_promo'] != "0.00" && $formule_data['prix_chambre_double_promo'] != $formule_data['prix_chambre_double']): ?>
                                                    <span
                                                        style="font-size: 1.2em; font-weight: bold;"><?php echo htmlspecialchars($formule_data['prix_chambre_double_promo']); ?>
                                                        &euro;</span> <br style="display: block;">
                                                    <span
                                                        style="text-decoration: line-through; color:red;"><?php echo htmlspecialchars($formule_data['prix_chambre_double']); ?>
                                                        &euro;</span>
                                                <?php else: ?>
                                                    <?php echo htmlspecialchars($formule_data['prix_chambre_double']); ?> &euro;
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Triple
                                                <?php if (!empty($formule_data['prix_chambre_triple_promo']) && $formule_data['prix_chambre_triple_promo'] != "0.00" && $formule_data['prix_chambre_triple_promo'] != $formule_data['prix_chambre_triple']): ?>
                                                    <br style="display: block;"><span
                                                        style="color: red; font-weight: bold;">Promo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <?php if (!empty($formule_data['prix_chambre_triple_promo']) && $formule_data['prix_chambre_triple_promo'] != "0.00" && $formule_data['prix_chambre_triple_promo'] != $formule_data['prix_chambre_triple']): ?>
                                                    <span
                                                        style="font-size: 1.2em; font-weight: bold;"><?php echo htmlspecialchars($formule_data['prix_chambre_triple_promo']); ?>
                                                        &euro;</span> <br style="display: block;">
                                                    <span
                                                        style="text-decoration: line-through; color:red;"><?php echo htmlspecialchars($formule_data['prix_chambre_triple']); ?>
                                                        &euro;</span>
                                                <?php else: ?>
                                                    <?php echo htmlspecialchars($formule_data['prix_chambre_triple']); ?> &euro;
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                Quadruple
                                                <?php if (!empty($formule_data['prix_chambre_quadruple_promo']) && $formule_data['prix_chambre_quadruple_promo'] != "0.00" && $formule_data['prix_chambre_quadruple_promo'] != $formule_data['prix_chambre_quadruple']): ?>
                                                    <br style="display: block;"><span
                                                        style="color: red; font-weight: bold;">Promo</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-end">
                                                <?php if (!empty($formule_data['prix_chambre_quadruple_promo']) && $formule_data['prix_chambre_quadruple_promo'] != "0.00" && $formule_data['prix_chambre_quadruple_promo'] != $formule_data['prix_chambre_quadruple']): ?>
                                                    <span
                                                        style="font-size: 1.2em; font-weight: bold;"><?php echo htmlspecialchars($formule_data['prix_chambre_quadruple_promo']); ?>
                                                        &euro;</span> <br style="display: block;">
                                                    <span
                                                        style="text-decoration: line-through; color:red;"><?php echo htmlspecialchars($formule_data['prix_chambre_quadruple']); ?>
                                                        &euro;</span>
                                                <?php else: ?>
                                                    <?php echo htmlspecialchars($formule_data['prix_chambre_quadruple']); ?> &euro;
                                                <?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Bébé</td>
                                            <td class="text-end">
                                                <?php echo htmlspecialchars($formule_data['prix_bebe']); ?> &euro;
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- The  Stepper form Modal -->
                        <div id="booking" class="col-md-8" style="padding-right: 5px !important; padding-left: 5px !important;">
                            <!-- add class modal to make it smaller -->
                            <div class="fade show" id="stepperModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true"
                                style="display: block; position: relative;">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header" style="justify-content: center;">
                                            <h4 class="modal-title" id="exampleModalLabel"
                                                style="margin-top: 10px; color:#028ae1">Réservez Votre Omra</h4>
                                            <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button> -->
                                        </div>
                                        <div class="modal-body">
                                            <div class="stepwizard">
                                                <div class="stepwizard-row setup-panel">
                                                    <div class="stepwizard-step">
                                                        <a href="#step-1" type="button"
                                                            class="btn btn-primary btn-circle non-clickable">1</a>
                                                        <p>Étape 1</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-2" type="button"
                                                            class="btn btn-default btn-circle non-clickable"
                                                            disabled="disabled">2</a>

                                                        <p>Étape 2</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-3" type="button"
                                                            class="btn btn-default btn-circle non-clickable"
                                                            disabled="disabled">3</a>
                                                        <p>Étape 3</p>
                                                    </div>
                                                    <div class="stepwizard-step">
                                                        <a href="#step-4" type="button"
                                                            class="btn btn-default btn-circle non-clickable"
                                                            disabled="disabled">4</a>
                                                        <p>Étape 4</p>
                                                    </div>

                                                </div>
                                            </div>

                                            <form role="form">
                                                <div class="setup-content" id="step-1">
                                                    <h3>Étape 1 : Nombre de passagers</h3>
                                                    <div class="form-group">
                                                        <label for="adults">Adultes :</label>
                                                        <input type="number" class="form-control" id="adults" min="0" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="children">Enfants :</label>
                                                        <input type="number" class="form-control" id="children" min="0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="babies">Bébés :</label>
                                                        <input type="number" class="form-control" id="babies" min="0">
                                                    </div>
                                                    <button class="btn btn-primary nextBtn" type="button">Suivant</button>
                                                </div>

                                                <div class="setup-content" id="step-2" style="display: none;">
                                                    <h3>Étape 2 : Affectation des chambres</h3>
                                                    <p id="passenger-count"></p>
                                                    <div class="form-group">
                                                        <label for="quadruple">Chambres Quadruples :</label>
                                                        <input type="number" class="form-control room-input" id="quadruple"
                                                            min="0" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="triple">Chambres Triples :</label>
                                                        <input type="number" class="form-control room-input" id="triple"
                                                            min="0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="double">Chambres Doubles :</label>
                                                        <input type="number" class="form-control room-input" id="double"
                                                            min="0">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="single">Chambres Simples :</label>
                                                        <input type="number" class="form-control room-input" id="single"
                                                            min="0">
                                                    </div>
                                                    <div id="error-message" class="text-danger"></div>
                                                    <button class="btn btn-secondary prevBtn" type="button">Précedent</button>

                                                    <button class="btn btn-primary nextBtn" type="button">Suivant</button>
                                                </div>


                                                <div class="setup-content" id="step-3" style="display: none;">
                                                    <h3>Récapitulatif de la Réservation</h3>
                                                    <p id="total-reservation">Total de la réservation : Calcul en cours...</p>
                                                    <button class="btn btn-secondary prevBtn" type="button">Précedent</button>

                                                    <button class="btn btn-primary nextBtn" type="button">Suivant</button>
                                                </div>


                                                <div class="setup-content" id="step-4" style="display: none;">
                                                    <h3>Comment pouvons-nous vous contacter ?</h3>

                                                    <div class="form-group">
                                                        <label for="fullName">Prénom et Nom *:</label>
                                                        <input type="text" class="form-control" id="fullName" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">Adresse *:</label>
                                                        <input type="text" class="form-control" id="address" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="phoneNumber">Numéro de téléphone *:</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <button class="btn btn-outline-secondary dropdown-toggle"
                                                                    type="button" data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <span class="flag-icon flag-icon-fr"></span> +33
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                </div>
                                                            </div>
                                                            <input type="tel" class="form-control" id="phoneNumber" required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="email">E-mail *:</label>
                                                        <input type="email" class="form-control" id="email" required>
                                                    </div>

                                                    <div id="error-message-step5" class="text-danger"></div>

                                                    <button class="btn btn-secondary prevBtn" type="button">Précédent</button>
                                                    <button class="btn btn-primary nextBtn" type="button">Envoyer</button>
                                                </div>



                                            </form>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>




                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const wrapper = document.querySelector("#programme .wrapper");
                        const cards = document.querySelectorAll("#programme .cardprog");
                        const prevBtn = document.querySelector("#programme .prev-btn");
                        const nextBtn = document.querySelector("#programme .next-btn");
                        const dotsContainer = document.createElement("div");

                        // Create dots and set up initial state
                        cards.forEach((_, index) => {
                            const dot = document.createElement("span");
                            dot.classList.add("dot");
                            if (index === 0) dot.classList.add("active"); // First dot active initially
                            dotsContainer.appendChild(dot);

                            dot.addEventListener("click", () => {
                                const scrollAmount = index * cards[0].offsetWidth;
                                wrapper.scrollTo({
                                    left: scrollAmount,
                                    behavior: "smooth"
                                });
                                updateActiveDot(index);
                            });
                        });

                        dotsContainer.classList.add("dots");
                        wrapper.after(dotsContainer); // Add dots container after wrapper

                        prevBtn.addEventListener("click", () => scrollWithButton(-1));
                        nextBtn.addEventListener("click", () => scrollWithButton(1));

                        function scrollWithButton(direction) {
                            const currentActive = document.querySelector(".dot.active");
                            let newIndex = Array.from(dotsContainer.children).indexOf(currentActive) + direction;
                            newIndex = Math.max(0, Math.min(newIndex, dotsContainer.children.length - 1));
                            dotsContainer.children[newIndex].click(); // Simulate dot click
                        }

                        function updateActiveDot(index) {
                            dotsContainer.querySelectorAll(".dot").forEach(dot => dot.classList.remove("active"));
                            dotsContainer.children[index].classList.add("active");
                        }
                    });
                </script>



                <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
                <?php
                // Récupération des prix depuis la base de données
                $prix_quadruple = isset($formule_data['prix_chambre_quadruple']) ? $formule_data['prix_chambre_quadruple'] : 0;
                $prix_triple = isset($formule_data['prix_chambre_triple']) ? $formule_data['prix_chambre_triple'] : 0;
                $prix_double = isset($formule_data['prix_chambre_double']) ? $formule_data['prix_chambre_double'] : 0;
                $prix_single = isset($formule_data['prix_chambre_single']) ? $formule_data['prix_chambre_single'] : 0;
                $prix_quadruple_promo = isset($formule_data['prix_chambre_quadruple_promo']) ? $formule_data['prix_chambre_quadruple_promo'] : 0;
                $prix_triple_promo = isset($formule_data['prix_chambre_triple_promo']) ? $formule_data['prix_chambre_triple_promo'] : 0;
                $prix_double_promo = isset($formule_data['prix_chambre_double_promo']) ? $formule_data['prix_chambre_double_promo'] : 0;
                $prix_single_promo = isset($formule_data['prix_chambre_single_promo']) ? $formule_data['prix_chambre_single_promo'] : 0;
                $prix_bebe = isset($formule_data['prix_bebe']) ? $formule_data['prix_bebe'] : 0;
                $child_discount = isset($formule_data['child_discount']) ? $formule_data['child_discount'] : 0;



                ?>

                <script>
                    $(document).ready(function () {
                        var navListItems = $('div.setup-panel div a'),
                            allWells = $('.setup-content'),
                            allNextBtn = $('.nextBtn'),
                            allPrevBtn = $('.prevBtn'), // Ajout du sélecteur pour les boutons "Précédent"
                            totalPassengers = 0,
                            passengersToAssign = 0;
                        var totalReservation = 0;
                        var totalChambres = 0; // Declare totalChambres globally
                        var quadrupleRooms = 0;
                        var tripleRooms = 0;
                        var doubleRooms = 0;
                        var singleRooms = 0;
                        var recapExtras = '';


                        $("#step-2").append(`
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     `);

                        // Initialize your variables with the hidden input values on page load
                        var prixQuadruple = parseFloat($('#prixQuadruple').val()) || 0;
                        var prixTriple = parseFloat($('#prixTriple').val()) || 0;
                        var prixDouble = parseFloat($('#prixDouble').val()) || 0;
                        var prixSingle = parseFloat($('#prixSingle').val()) || 0;

                        allWells.hide();

                        // Gestion du clic sur les étapes de la réservation
                        navListItems.click(function (e) {
                            e.preventDefault();
                            var $target = $($(this).attr('href')),
                                $item = $(this);

                            if (!$item.hasClass('disabled')) {
                                navListItems.removeClass('btn-primary').addClass('btn-default');
                                $item.addClass('btn-primary');
                                allWells.hide();
                                $target.show();

                                // Recalculer passengersToAssign en fonction des chambres déjà attribuées
                                if ($target.attr('id') === 'step-2') {
                                    var quadrupleRooms = parseInt($('#quadruple').val()) || 0;
                                    var tripleRooms = parseInt($('#triple').val()) || 0;
                                    var doubleRooms = parseInt($('#double').val()) || 0;
                                    var singleRooms = parseInt($('#single').val()) || 0;
                                    var totalRooms = quadrupleRooms + tripleRooms + doubleRooms + singleRooms;

                                    passengersToAssign = totalPassengers - totalRooms;
                                    updatePassengerCount();
                                }
                            }
                        });


                        function goToStep(step) {
                            $('div.setup-panel div a[href="#step-' + step + '"]').trigger('click');
                            currentStep = step;
                            allPrevBtn.toggle(currentStep > 1);
                            allNextBtn.toggle(currentStep < 4);

                            // Recalculate totalReservation when returning to step 3
                            if (step === 3) {
                                calculateTotalReservation();
                            }
                        }
                        // Gestion du clic sur le bouton "Suivant"
                        allNextBtn.click(function () {
                            var curStep = $(this).closest(".setup-content"),
                                curStepBtn = curStep.attr("id"),
                                nextStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().next().children("a"),
                                curInputs = curStep.find("input[type='number']"),
                                isValid = true;

                            // Vérification de la validité des champs
                            $(".form-group").removeClass("has-error");
                            for (var i = 0; i < curInputs.length; i++) {
                                if (!curInputs[i].validity.valid) {
                                    isValid = false;
                                    $(curInputs[i]).closest(".form-group").addClass("has-error");
                                }
                            }

                            // Conditions pour passer à l'étape suivante
                            if (curStepBtn === 'step-1' && isValid) {
                                totalPassengers = parseInt($('#adults').val(), 10) + (parseInt($('#children').val(), 10) || 0);
                                passengersToAssign = totalPassengers;
                                updatePassengerCount();
                                $('#error-message').text('');
                                nextStepWizard.removeAttr('disabled').trigger('click');
                            }



                            var totalExtras = 0;
                            var recapExtras = '';

                            function calculateTotalReservation() {
                                // Room Quantities and Prices
                                var quadrupleRooms = parseInt($('#quadruple').val()) || 0;
                                var tripleRooms = parseInt($('#triple').val()) || 0;
                                var doubleRooms = parseInt($('#double').val()) || 0;
                                var singleRooms = parseInt($('#single').val()) || 0;
                                var babiesCount = parseInt($('#babies').val()) || 0;
                                var childrenCount = parseInt($('#children').val(), 10) || 0;

                                var prixQuadruple = parseFloat(<?php echo ($prix_quadruple_promo != 0.00 && $prix_quadruple_promo != null) ? $prix_quadruple_promo : $prix_quadruple; ?>) || 0;
                                var prixTriple = parseFloat(<?php echo ($prix_triple_promo != 0.00 && $prix_triple_promo != null) ? $prix_triple_promo : $prix_triple; ?>) || 0;
                                var prixDouble = parseFloat(<?php echo ($prix_double_promo != 0.00 && $prix_double_promo != null) ? $prix_double_promo : $prix_double; ?>) || 0;
                                var prixSingle = parseFloat(<?php echo ($prix_single_promo != 0.00 && $prix_single_promo != null) ? $prix_single_promo : $prix_single; ?>) || 0;
                                var fraisBebe = parseFloat(<?php echo $prix_bebe; ?>) || 0;
                                var childDiscount = parseFloat(<?php echo $child_discount; ?>) || 0;

                                // Baby Fee Calculation
                                var totalFraisBebe = fraisBebe * babiesCount;

                                // Child Discount Calculation
                                var discountEnfants = childrenCount * childDiscount;

                                // Total Room Costs
                                var totalChambres = (quadrupleRooms * prixQuadruple) + (tripleRooms * prixTriple) + (doubleRooms * prixDouble) + (singleRooms * prixSingle);

                                // Total Reservation Calculation
                                totalReservation = totalChambres + totalFraisBebe + totalExtras - discountEnfants;

                                // Build Reservation Summary
                                var recapReservation = '<br>';
                                recapReservation += '<strong>Chambres :</strong><br style="display:block;">';
                                if (quadrupleRooms > 0) {
                                    recapReservation += '- Chambre Quadruple: ' + prixQuadruple.toFixed(2) + ' € x ' + quadrupleRooms + '<br style="display:block;">';
                                }
                                if (tripleRooms > 0) {
                                    recapReservation += '- Chambre Triple: ' + prixTriple.toFixed(2) + ' € x ' + tripleRooms + '<br style="display:block;">';
                                }
                                if (doubleRooms > 0) {
                                    recapReservation += '- Chambre Double: ' + prixDouble.toFixed(2) + ' € x ' + doubleRooms + '<br style="display:block;">';
                                }
                                if (singleRooms > 0) {
                                    recapReservation += '- Chambre Simple: ' + prixSingle.toFixed(2) + ' € x ' + singleRooms + '<br style="display:block;">';
                                }
                                recapReservation += '<br style="display:block;">';

                                if (recapExtras !== '') {
                                    recapReservation += '<strong>Extras :</strong><br style="display:block;">';
                                    recapReservation += recapExtras;
                                    recapReservation += '<br style="display:block;">';
                                }

                                if (babiesCount > 0) {
                                    recapReservation += '<strong>Frais bébé :</strong><br style="display:block;">';
                                    recapReservation += '- Frais bébé: ' + fraisBebe.toFixed(2) + ' € x ' + babiesCount + '<br style="display:block;">';
                                    recapReservation += '<br style="display:block;">';
                                }

                                recapReservation += '<strong>Coûts :</strong><br style="display:block;">';
                                recapReservation += '- Total des chambres : ' + totalChambres.toFixed(2) + ' €<br style="display:block;">';
                                recapReservation += '- Total frais bébé : ' + totalFraisBebe.toFixed(2) + ' €<br style="display:block;">';
                                recapReservation += '- Réduction enfants : -' + discountEnfants.toFixed(2) + ' €<br style="display:block;"><br style="display:block;">';
                                recapReservation += '<strong>Total à payer :</strong><br style="display:block;">';
                                recapReservation += '<h3>' + totalReservation.toFixed(2) + ' €</h3>';

                                // Display the updated summary
                                $('#total-reservation').html(recapReservation);

                            }




                            if (curStepBtn === 'step-2' && isValid) {
                                var quadrupleRooms = parseInt($('#quadruple').val()) || 0;
                                var tripleRooms = parseInt($('#triple').val()) || 0;
                                var doubleRooms = parseInt($('#double').val()) || 0;
                                var singleRooms = parseInt($('#single').val()) || 0;
                                var totalRooms = quadrupleRooms + tripleRooms + doubleRooms + singleRooms;

                                // Calculate how many passengers have been assigned to rooms
                                var passengersAssignedToRooms = totalPassengers - passengersToAssign;

                                // Check if all passengers are assigned AND that some rooms have been filled
                                if (passengersAssignedToRooms < totalPassengers && totalPassengers > 0) {
                                    isValid = false;
                                    $('#error-message').text('Veuillez attribuer tous les passagers aux chambres avant de continuer.');
                                } else if (passengersToAssign == totalPassengers && totalPassengers > 0) { // Check if any rooms have been filled
                                    isValid = false;
                                    $('#error-message').text('Veuillez remplir le nombre de chambres.');
                                } else if (totalRooms > totalPassengers && totalPassengers > 0) {
                                    isValid = false;
                                    $('#error-message').text('Le nombre total de chambres ne peut pas dépasser le nombre total de passagers.');
                                } else {
                                    // If all passengers are assigned, proceed to next step
                                    passengersToAssign = totalPassengers - totalRooms;
                                    updatePassengerCount();
                                    $('#error-message').text('');
                                    nextStepWizard.removeAttr('disabled').trigger('click');
                                }
                                calculateTotalReservation();

                            }

                            if (curStepBtn === 'step-3' && isValid) {
                                $('#error-message-step4').text('');
                                nextStepWizard.removeAttr('disabled').trigger('click');

                            }

                            console.log(totalReservation)
                            console.log(typeof totalReservation);


                            if (curStepBtn === 'step-4' && isValid) {
                                var formData = {
                                    fullName: $('#fullName').val(),
                                    address: $('#address').val(),
                                    phoneNumber: $('.dropdown-toggle').text().trim() + $('#phoneNumber').val(), // Inclure le code pays
                                    email: $('#email').val(),
                                    adults: parseInt($('#adults').val(), 10),
                                    children: parseInt($('#children').val(), 10) || 0,
                                    babies: parseInt($('#babies').val(), 10) || 0,
                                    quadrupleRooms: parseInt($('#quadruple').val(), 10) || 0,
                                    tripleRooms: parseInt($('#triple').val(), 10) || 0,
                                    doubleRooms: parseInt($('#double').val(), 10) || 0,
                                    singleRooms: parseInt($('#single').val(), 10) || 0,
                                    totalReservation: totalReservation.toFixed(2), // Supposant que totalReservation est calculé correctement à l'étape-3
                                    packageName: "<?php echo $nom_package; ?>",
                                    formulaName: "<?php echo $nom_type_formule; ?>",
                                    departureDate: "<?php echo $formattedDate; ?>",
                                };



                                // Envoyer les données via AJAX
                                $.ajax({
                                    url: 'submit_reservation.php',
                                    type: 'POST',
                                    data: JSON.stringify(formData),
                                    contentType: 'application/json',
                                    success: function (response) {
                                        try {
                                            var data = JSON.parse(response);
                                            console.log('AJAX response:', data); // Log the response

                                            if (data.success) {
                                                console.log('Reservation successful, preparing to redirect...');
                                                window.parent.location.href = "https://www.albayt.fr/merci-etre-rappele/";
                                            } else {
                                                $('#error-message-step5').text('Erreur lors de la réservation : ' + data.error);
                                            }
                                        } catch (error) {
                                            console.error("Erreur lors du parsing de la réponse JSON :", error);
                                            $('#error-message-step5').text("Erreur inattendue. Veuillez contacter l'administrateur.");
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        console.error("Erreur AJAX :", xhr.responseText);
                                        $('#error-message-step5').text("Erreur lors de l'envoi de la réservation. Veuillez contacter l'administrateur du site. (Détails : " + error + ")");
                                    }
                                });

                                $.ajax({
                                    url: 'send_email.php', // Script PHP pour l'envoi d'email
                                    type: 'POST',
                                    data: JSON.stringify(formData), // Les mêmes données que celles envoyées précédemment
                                    contentType: 'application/json',
                                    success: function (emailResponse) {
                                        console.log('Email envoyé avec succès :', emailResponse);
                                        // Optionnel : Réinitialiser le formulaire ou fermer la modal
                                        // $('#stepperModal').modal('hide');
                                        // goToStep(1);
                                    },
                                    error: function (xhr, status, error) {
                                        console.error("Erreur lors de l'envoi de l'email :", xhr.responseText);
                                        // Gérer l'erreur d'envoi d'email si nécessaire
                                    }
                                });
                                $.ajax({
                                    url: 'send_mailclient.php',
                                    type: 'POST',
                                    data: JSON.stringify(formData),
                                    contentType: 'application/json',
                                    success: function (response) {
                                        console.log('Réponse du serveur :', response);

                                        if (response.success) {
                                            console.log('Email envoyé avec succès au client :', response.clientEmail);
                                            // Optionnel : Réinitialiser le formulaire, fermer la modal, etc.
                                        } else {
                                            console.error('Erreur lors de l\'envoi de l\'email au client :', response.error);
                                            // Gérer l'erreur d'envoi d'email (afficher un message à l'utilisateur, etc.)
                                        }
                                    },
                                    error: function (xhr, status, error) {
                                        console.error('Erreur AJAX lors de l\'envoi de l\'email au client :', xhr.responseText);
                                        // Gérer l'erreur AJAX (problème de réseau, etc.)
                                    }
                                });

                            }

                        });

                        // Gestion du clic sur le bouton "Précédent"
                        allPrevBtn.click(function () {
                            var curStep = $(this).closest(".setup-content"),
                                curStepBtn = curStep.attr("id"),
                                prevStepWizard = $('div.setup-panel div a[href="#' + curStepBtn + '"]').parent().prev().children("a");

                            navListItems.removeClass('btn-primary').addClass('btn-default');
                            prevStepWizard.addClass('btn-primary');
                            allWells.hide();
                            $(prevStepWizard.attr('href')).show();

                            // Recalculer passengersToAssign en fonction des chambres déjà attribuées
                            if (curStepBtn === 'step-2') {
                                var quadrupleRooms = parseInt($('#quadruple').val()) || 0;
                                var tripleRooms = parseInt($('#triple').val()) || 0;
                                var doubleRooms = parseInt($('#double').val()) || 0;
                                var singleRooms = parseInt($('#single').val()) || 0;
                                var totalRooms = quadrupleRooms + tripleRooms + doubleRooms + singleRooms;

                                passengersToAssign = totalPassengers - totalRooms;
                                updatePassengerCount();
                            }
                        });

                        // Mettre à jour le nombre de passagers restants à affecter
                        function updatePassengerCount() {
                            $('#passenger-count').text('Passagers restants à affecter : ' + passengersToAssign);
                        }

                        // Gérer les événements de changement des champs d'entrée
                        $('.room-input').on('change', function () {
                            var quadrupleRooms = parseInt($('#quadruple').val()) || 0;
                            var tripleRooms = parseInt($('#triple').val()) || 0;
                            var doubleRooms = parseInt($('#double').val()) || 0;
                            var singleRooms = parseInt($('#single').val()) || 0;

                            var totalRooms = quadrupleRooms + tripleRooms + doubleRooms + singleRooms;

                            if (totalRooms <= totalPassengers && totalPassengers > 0) {
                                passengersToAssign = totalPassengers - totalRooms;
                                updatePassengerCount();
                                $('#error-message').text('');
                                $('div.setup-panel div a.btn-primary').removeClass('disabled');
                            } else {
                                $('#error-message').text('Le nombre total de chambres ne peut pas dépasser le nombre total de passagers.');
                                $('div.setup-panel div a.btn-primary').addClass('disabled');
                                passengersToAssign = Math.max(0, totalPassengers - totalRooms);
                                updatePassengerCount();
                            }
                        });

                        $('div.setup-panel div a.btn-primary').trigger('click');
                    });


                    var countryCodes = {
                        fr: '+33',
                        us: '+1',
                        // ... ajouter plus de pays et codes ici si nécessaire
                    };

                    // Remplir le menu déroulant
                    var dropdownMenu = $('.dropdown-menu');
                    for (var country in countryCodes) {
                        dropdownMenu.append('<a class="dropdown-item" href="#" data-country="' + country + '">' +
                            '<span class="flag-icon flag-icon-' + country + '"></span> ' +
                            countryCodes[country] + '</a>');
                    }

                    // Gérer la sélection du pays
                    dropdownMenu.on('click', '.dropdown-item', function (e) {
                        e.preventDefault();
                        var countryCode = $(this).data('country');
                        var countryDialCode = countryCodes[countryCode];
                        $(this).closest('.input-group').find('.dropdown-toggle').html('<span class="flag-icon flag-icon-' + countryCode + '"></span> ' + countryDialCode);
                    });
                </script>

                <?php
            } else {
                // Si aucune formule correspondante n'a été trouvée dans la base de données
                echo "<p>Aucune formule trouvée avec cet identifiant.</p>";
            }
        } else {
            // Si aucun ID de formule n'est présent dans l'URL
            echo "<p>Aucun identifiant de formule n'a été spécifié.</p>";
        }

        // Fermer la connexion à la base de données
        ?>
    </div>



    </div>
    </div>

    </div>








</body>

</html>
<!------  js reservation -->







<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- jQuery (nécessaire pour les plugins JavaScript de Bootstrap) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>





<!--END HEBERGEMENT TEST-->
<!-- Add Bootstrap CSS and JS -->
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->
<!-- jQuery (nécessaire pour les plugins JavaScript de Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Incluez tous les plugins compilés (ci-dessous), ou incluez-les singlement selon les besoins -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


<!--START HEBERGEMENT TEST-->
<!-- Swiper JS -->
<script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/swiper-bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/gh/freeps2/a7rarpress@main/script.js"></script>
<!-- JavaScript -->
<!--Uncomment this line-->



<!--END HEBERGEMENT TEST-->
<!-- Add Bootstrap CSS and JS -->