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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- this line causing no closing to the popup -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">




    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> -->


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
            font-weight: bold;
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

        .card-container:hover {
            transform: translateY(-10px);
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
            transition: transform .6s ease-in-out;
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



        .hotel-info {
            padding: 15px;
            color: #333;
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

                margin-right: 0px !important;
                margin-left: 0px !important;
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
            .hotel-info {
                background-color: #fff;
                padding: 30 30px 0px 30px !important;
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

            .hotel-info {
                background-color: #fff;
                padding: 130px 30px 0px 30px !important;
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
        }


        /**************************  TEST HEBERGEMENT ******************************/

        .card-container {
            position: relative;
            width: 100%;
            height: 300px;
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
            position: absolute;
            top: 10px;
            left: 10px;
            z-index: 2;
            color: white;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.7);
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
                top: auto;
                left: auto;
                padding: 10px;
                background-color: rgba(0, 0, 0, 0.5);
                /* Semi-transparent background */
            }

            .hotel-footer {
                position: static;
                /* Removes absolute positioning */
                flex-direction: row;
                flex-wrap: wrap;
                background-color: white;
                padding: 10px;
            }

            .hotel-footer div {
                width: 48%;
                /* Two beside each other */
                margin-bottom: 10px;
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
                position: static;
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

        @media (max-width: 370px) {
            svg {
                width: 50px;
                height: 50px;
            }
        }

        /******* H1 */

        header h1 {
            font-size: 6rem;
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
        }

        @media (max-width: 768px) {

            header h1 {
                font-size: 3rem;
            }
        }

        @media (max-width: 600px) {

            header h1 {
                font-size: 2.25rem;
                /* Smallest size for mobile screens */
            }
        }


        /*************   RESERVATION  *************/
        .modal-content {
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
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
    </style>
</head>

<body>
    <div class="container">

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
                <button id="btn-primary" type="button" class="btn btn-primary" data-toggle="modal" data-target="#stepperModal"
                    style="display: block; margin-left: auto; margin-right: auto; background-color:#d9c391; border:0px;">
                    Réserver Maintenant
                </button>
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
                                fill: #1cc4fb;
                            }
                        </style>
                    </defs>
                    <circle id="Ellipse_1_copy" data-name="Ellipse 1 copy" class="cls-1" cx="78.75" cy="250" r="44.75" />
                    <circle id="Ellipse_1_copy_2" data-name="Ellipse 1 copy 2" class="cls-1" cx="918.75" cy="250" r="44.75" />
                    <rect class="cls-1" x="164" y="238" width="669" height="25" />
                </svg>
                <label style="font-size: 13px;">Durée<br style="display: block;"><?php echo htmlspecialchars($formule['duree_sejour']); ?></label>
            </div>
            <div class="date-box" style="text-align: left;  padding:0 10px; margin-top:7px">
                <label>Arrivée</label>
                <span><?php echo htmlspecialchars(date('D d-m-Y', strtotime($formule['date_retour']))); ?></span>
            </div>


            <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

            <!-- Button Trigger -->
            <div class="round-button" data-type-id="<?php echo $formule['type_id']; ?>" data-package-id="<?php echo $formule['package_id']; ?>">
                <div class="round-button-circle">
                    <a class="round-button"><i class="fa-solid fa-calendar-days"></i><br style="display: block;">Autres dates</a>
                </div>
            </div>

            <!-- Modal for displaying additional dates -->
            <div class="modal fade" id="formulesModal" tabindex="-1" aria-labelledby="formulesModalLabel" aria-hidden="true">
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
                $(document).ready(function() {
                    // Handle the "AUTRES DATES" button click using event delegation
                    $(document).on('click', '.round-button[data-type-id]', function() {
                        var typeId = $(this).data('type-id');
                        var packageId = $(this).data('package-id');

                        $.ajax({
                            url: 'fetch_formules.php',
                            type: 'GET',
                            data: {
                                type_id: typeId,
                                package_id: packageId
                            },
                            success: function(response) {
                                $('#formulesContent').html(response);
                                $('#formulesModal').modal('show');
                            },
                            error: function(xhr, status, error) {
                                console.error("An error occurred: " + error);
                            }
                        });
                    });
                });
            </script>



        </div>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <!-- test hebergement Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingzero">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsezero" aria-expanded="false" aria-controls="flush-collapsezero">
                        TEST
                    </button>
                </h2>
                <div id="flush-collapsezero" class="accordion-collapse collapse" aria-labelledby="flush-headingzero" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <div id="hebergementsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="500">
                            <div class="carousel-inner">
                                <?php
                                // Assuming $conn is your existing database connection
                                $sql_hebergements = "SELECT * FROM hebergements WHERE formule_id = ?";
                                $stmt_hebergements = mysqli_prepare($conn, $sql_hebergements);
                                mysqli_stmt_bind_param($stmt_hebergements, "i", $formule_id);
                                mysqli_stmt_execute($stmt_hebergements);
                                $result_hebergements = mysqli_stmt_get_result($stmt_hebergements);

                                if (mysqli_num_rows($result_hebergements) > 0) {
                                    $active = true; // To set the first item as active
                                    while ($hotel = mysqli_fetch_assoc($result_hebergements)) {
                                ?>
                                        <div class="carousel-item <?php echo $active ? 'active' : ''; ?>">
                                            <div class="card-container">
                                                <div class="hotel-image">
                                                    <div id="carousel<?php echo $hotel['hotel_id']; ?>" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                                                        <div class="carousel-inner">
                                                            <?php
                                                            // Display gallery images for each hotel
                                                            $sql_gallery = "SELECT image_path FROM hotel_gallery WHERE hotel_id = {$hotel['hotel_id']}";
                                                            $result_gallery = mysqli_query($conn, $sql_gallery);
                                                            $gallery_active = true;
                                                            while ($row = mysqli_fetch_assoc($result_gallery)) {
                                                                echo "<div class='carousel-item" . ($gallery_active ? " active" : "") . "'>";
                                                                echo "<div class='image-container' style='background-image: url(../" . $row['image_path'] . ");'></div>";
                                                                echo "</div>";
                                                                $gallery_active = false;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="hotel-info">
                                                    <?php
                                                    $hoteluni_id = $hotel['hotel_id'];
                                                    $query_hoteluni = "SELECT nom, etoiles, details, monument, ville FROM hotels WHERE id = ?";
                                                    $stmt_hoteluni = $conn->prepare($query_hoteluni);
                                                    $stmt_hoteluni->bind_param("i", $hoteluni_id);
                                                    $stmt_hoteluni->execute();
                                                    $result_hoteluni = $stmt_hoteluni->get_result();
                                                    $hoteluni = $result_hoteluni->fetch_assoc();
                                                    ?>
                                                    <div class="hotel-details"><?php echo $hoteluni['ville']; ?></div>
                                                    <div class="hotel-name">
                                                        <h3 style="font-family: Bely Display;"><b><?php echo $hoteluni['nom']; ?></b></h3>
                                                    </div>
                                                    <div class="hotel-stars">
                                                        <?php
                                                        $numStars = (int) $hoteluni['etoiles'];
                                                        for ($i = 0; $i < $numStars; $i++) {
                                                            echo '<i class="fa-solid fa-star" style="color: #FFD700;"></i>';
                                                        }
                                                        ?>
                                                    </div>
                                                </div>
                                                <div class="hotel-footer">
                                                    <div class="hotel-checkin hotel_info">
                                                        <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                            <!-- SVG content -->
                                                        </svg>
                                                        <div class="hotel-checkin-text">
                                                            <h5>Check-in</h5><?php echo $hotel['date_checkin']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="hotel-checkout hotel_info">
                                                        <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                            <!-- SVG content -->
                                                        </svg>
                                                        <div class="hotel-checkin-text">
                                                            <h5>Check-out</h5><?php echo $hotel['date_checkout']; ?>
                                                        </div>
                                                    </div>
                                                    <div class="hotel-nights hotel_info">
                                                        <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                            <!-- SVG content -->
                                                        </svg>
                                                        <div class="hotel-nights-text">
                                                            <h5>Nights</h5><?php echo $hotel['nombre_nuit']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php
                                        $active = false; // Ensure only the first item is set as active
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#hebergementsCarousel" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#hebergementsCarousel" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- test 2 hebergement Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-heading2">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapse2" aria-expanded="false" aria-controls="flush-collapse2">
                        TEST 2
                    </button>
                </h2>
                <div id="flush-collapse2" class="accordion-collapse collapse" aria-labelledby="flush-heading2" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <!-- <section class="wrapper">
                            <button class="prev-btn">&#10094;</button> -->

                        <div class="row">
                            <?php
                            // Assuming $conn is your existing database connection
                            $sql_hebergements = "SELECT * FROM hebergements WHERE formule_id = ?";
                            $stmt_hebergements = mysqli_prepare($conn, $sql_hebergements);
                            mysqli_stmt_bind_param($stmt_hebergements, "i", $formule_id);
                            mysqli_stmt_execute($stmt_hebergements);
                            $result_hebergements = mysqli_stmt_get_result($stmt_hebergements);

                            if (mysqli_num_rows($result_hebergements) > 0) {
                                while ($hotel = mysqli_fetch_assoc($result_hebergements)) {
                            ?>
                                    <div class="card-container">
                                        <div class="hotel-image">
                                            <div id="carousel1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                                                <div class="carousel-inner">
                                                    <?php
                                                    // Display gallery images for hotel 1
                                                    $sql_gallery1 = "SELECT image_path FROM hotel_gallery WHERE hotel_id = {$hotel['hotel_id']}";
                                                    $result_gallery1 = mysqli_query($conn, $sql_gallery1);
                                                    $active = true;
                                                    while ($row = mysqli_fetch_assoc($result_gallery1)) {
                                                        echo "<div class='carousel-item" . ($active ? " active" : "") . "'>";
                                                        echo "<div class='image-container' style='background-image: url(../" . $row['image_path'] . ");'></div>";
                                                        echo "</div>";
                                                        $active = false;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
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


                                            <div class="hotel-details"><?php echo $hoteluni['ville']; ?></div>
                                            <div class="hotel-name">
                                                <h3 style="font-family: Bely Display;"><b><?php echo $hoteluni['nom']; ?></b></h3>
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
                                            <!-- <div class="hotel-details"><!?php echo $hoteluni['details']; ?></div> -->

                                        </div>
                                        <div class="hotel-footer">


                                            <div class="hotel-checkin hotel_info">
                                                <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                    <defs>
                                                        <clipPath id="clip-path">
                                                            <path id="Clip_2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z" fill="none"></path>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Groupe_24" data-name="Groupe 24" transform="translate(-1350.792 -7406)">
                                                        <circle id="Oval_Copy_3" data-name="Oval Copy 3" cx="33.627" cy="33.627" r="33.627" transform="translate(1350.792 7406)" fill="#f7f2e8">
                                                        </circle>
                                                        <g id="Group_8" data-name="Group 8" transform="translate(1368.792 7424)">
                                                            <path id="Clip_2-2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z" fill="none"></path>
                                                            <g id="Group_8-2" data-name="Group 8" clip-path="url(#clip-path)">
                                                                <path id="Fill_1" data-name="Fill 1" d="M30.367,26.993H1.125A1.126,1.126,0,0,1,0,25.868V1.125A1.126,1.126,0,0,1,1.125,0H30.367a1.126,1.126,0,0,1,1.124,1.125V25.868A1.126,1.126,0,0,1,30.367,26.993ZM2.249,2.25V24.744H29.242V2.25Z" transform="translate(0 4.498)"></path>
                                                                <path id="Fill_3" data-name="Fill 3" d="M30.367,2.249H1.125A1.125,1.125,0,1,1,1.125,0H30.367a1.125,1.125,0,1,1,0,2.249" transform="translate(0 11.247)"></path>
                                                                <path id="Fill_4" data-name="Fill 4" d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748" transform="translate(4.499 0)"></path>
                                                                <path id="Fill_5" data-name="Fill 5" d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748" transform="translate(20.245 0)"></path>
                                                                <path id="Fill_6" data-name="Fill 6" d="M7.873,9a1.129,1.129,0,0,1-.8-.328L.329,1.918A1.124,1.124,0,0,1,1.919.329L8.667,7.076A1.124,1.124,0,0,1,7.873,9Z" transform="translate(17.995 17.997)"></path>
                                                                <path id="Fill_7" data-name="Fill 7" d="M1.125,9a1.124,1.124,0,0,1-.8-1.919L7.077.329a1.124,1.124,0,0,1,1.59,1.59L1.919,8.667A1.121,1.121,0,0,1,1.125,9Z" transform="translate(17.995 17.997)"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="hotel-checkin-text">
                                                    <h5>Check-in</h5><?php echo $hotel['date_checkin']; ?>
                                                </div>
                                            </div>

                                            <div class="hotel-checkout hotel_info">
                                                <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                    <defs>
                                                        <clipPath id="clip-path">
                                                            <path id="Clip_2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z" fill="none"></path>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Groupe_24" data-name="Groupe 24" transform="translate(-1350.792 -7406)">
                                                        <circle id="Oval_Copy_3" data-name="Oval Copy 3" cx="33.627" cy="33.627" r="33.627" transform="translate(1350.792 7406)" fill="#f7f2e8">
                                                        </circle>
                                                        <g id="Group_8" data-name="Group 8" transform="translate(1368.792 7424)">
                                                            <path id="Clip_2-2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z" fill="none"></path>
                                                            <g id="Group_8-2" data-name="Group 8" clip-path="url(#clip-path)">
                                                                <path id="Fill_1" data-name="Fill 1" d="M30.367,26.993H1.125A1.126,1.126,0,0,1,0,25.868V1.125A1.126,1.126,0,0,1,1.125,0H30.367a1.126,1.126,0,0,1,1.124,1.125V25.868A1.126,1.126,0,0,1,30.367,26.993ZM2.249,2.25V24.744H29.242V2.25Z" transform="translate(0 4.498)"></path>
                                                                <path id="Fill_3" data-name="Fill 3" d="M30.367,2.249H1.125A1.125,1.125,0,1,1,1.125,0H30.367a1.125,1.125,0,1,1,0,2.249" transform="translate(0 11.247)"></path>
                                                                <path id="Fill_4" data-name="Fill 4" d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748" transform="translate(4.499 0)"></path>
                                                                <path id="Fill_5" data-name="Fill 5" d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748" transform="translate(20.245 0)"></path>
                                                                <path id="Fill_6" data-name="Fill 6" d="M7.873,9a1.129,1.129,0,0,1-.8-.328L.329,1.918A1.124,1.124,0,0,1,1.919.329L8.667,7.076A1.124,1.124,0,0,1,7.873,9Z" transform="translate(17.995 17.997)"></path>
                                                                <path id="Fill_7" data-name="Fill 7" d="M1.125,9a1.124,1.124,0,0,1-.8-1.919L7.077.329a1.124,1.124,0,0,1,1.59,1.59L1.919,8.667A1.121,1.121,0,0,1,1.125,9Z" transform="translate(17.995 17.997)"></path>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="hotel-checkin-text">
                                                    <h5>Check-out</h5><?php echo $hotel['date_checkout']; ?>
                                                </div>
                                            </div>

                                            <div class="hotel-nights hotel_info">
                                                <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                    <g id="Groupe_23" data-name="Groupe 23" transform="translate(-1011 -7560)">
                                                        <circle id="Oval_Copy_12" data-name="Oval Copy 12" cx="33.627" cy="33.627" r="33.627" transform="translate(1011 7560)" fill="#f7f2e8"></circle>
                                                        <g id="Group_3" data-name="Group 3" transform="translate(1025 7578)">
                                                            <path id="Fill_1" data-name="Fill 1" d="M39.2,32H35.081a.8.8,0,0,1-.8-.789V28.051H5.719V31.21a.8.8,0,0,1-.8.789H.8A.8.8,0,0,1,0,31.21V20.154a3.975,3.975,0,0,1,3.2-3.869V2.779a.792.792,0,0,1,.6-.765,66.144,66.144,0,0,1,32.4,0,.792.792,0,0,1,.6.765V16.285A3.975,3.975,0,0,1,40,20.154V31.21A.8.8,0,0,1,39.2,32ZM4.918,26.471H35.082a.8.8,0,0,1,.8.79v3.158H38.4V23.312H1.6v7.107h5.118V27.26A.8.8,0,0,1,4.918,26.471ZM4,17.783a2.388,2.388,0,0,0-2.4,2.37v1.58H38.4v-1.58A2.387,2.387,0,0,0,36,17.784h5Zm20.225-5.971h6.649A2.711,2.711,0,0,1,33.6,14.5v1.7h1.6V3.4a64.51,64.51,0,0,0-30.4,0v12.81H6.4V14.5a2.711,2.711,0,0,1,2.725-2.69h6.65A2.711,2.711,0,0,1,18.5,14.5v1.7h3V14.5A2.711,2.711,0,0,1,24.224,11.813Zm0,1.579A1.119,1.119,0,0,0,23.1,14.5v1.7H32V14.5a1.119,1.119,0,0,0-1.125-1.111Zm-15.1,0A1.119,1.119,0,0,0,8,14.5v1.7h8.9V14.5a1.119,1.119,0,0,0-1.125-1.111Z" stroke="#000" stroke-miterlimit="10" stroke-width="0.4">
                                                            </path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="hotel-checkin-text">
                                                    <h6><b>Durée du séjour</b></h6><?php echo $hotel['nombre_nuit']; ?> nuitées
                                                </div>
                                            </div>

                                            <div class="hotel-monument hotel_info">
                                                <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                    <defs>
                                                        <clipPath id="clip-path">
                                                            <path id="Clip_4" data-name="Clip 4" d="M0,0H24.745V20.248H0Z" fill="none"></path>
                                                        </clipPath>
                                                    </defs>
                                                    <g id="Groupe_22" data-name="Groupe 22" transform="translate(-1350.792 -7560)">
                                                        <circle id="Oval_Copy_11" data-name="Oval Copy 11" cx="33.627" cy="33.627" r="33.627" transform="translate(1350.792 7560)" fill="#f7f2e8"></circle>
                                                        <g id="Group_6" data-name="Group 6" transform="translate(1377.792 7580)">
                                                            <path id="Fill_1" data-name="Fill 1" d="M1.125,31.491A1.125,1.125,0,0,1,0,30.366V1.124a1.125,1.125,0,0,1,2.25,0V30.366a1.125,1.125,0,0,1-1.125,1.125" transform="translate(0.001 0.004)"></path>
                                                            <g id="Group_5" data-name="Group 5">
                                                                <path id="Clip_4-2" data-name="Clip 4" d="M0,0H24.745V20.248H0Z" fill="none"></path>
                                                                <g id="Group_5-2" data-name="Group 5" clip-path="url(#clip-path)">
                                                                    <path id="Fill_3" data-name="Fill 3" d="M1.126,20.248A1.124,1.124,0,0,1,.708,18.08L20.59,10.126.708,2.172A1.125,1.125,0,1,1,1.542.082l22.494,9a1.125,1.125,0,0,1,0,2.09l-22.493,9A1.147,1.147,0,0,1,1.126,20.248Z" transform="translate(0)"></path>
                                                                </g>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="hotel-checkin-text">
                                                    <h5>Distance</h5><?php echo $hoteluni['monument']; ?>
                                                </div>
                                            </div>

                                            <div class="hotel-pension hotel_info">
                                                <svg class="hotel-icons" xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                    <g id="Groupe_21" data-name="Groupe 21" transform="translate(-1011 -7706)">
                                                        <circle id="Oval_Copy_14" data-name="Oval Copy 14" cx="33.627" cy="33.627" r="33.627" transform="translate(1011 7706)" fill="#f7f2e8"></circle>
                                                        <g id="Group_13" data-name="Group 13" transform="translate(1032 7725)">
                                                            <path id="Fill_1" data-name="Fill 1" d="M6.265,15H5.783a5.3,5.3,0,0,1-4.115-2.066,8.131,8.131,0,0,1-1.4-7.082L.514,4.9C1.285,1.969,3.489,0,6,0c2.535,0,4.74,1.969,5.486,4.9l.24.952a8.133,8.133,0,0,1-1.4,7.082A5.18,5.18,0,0,1,6.265,15ZM6.025,2.3c-1.407,0-2.674,1.26-3.153,3.135l-.241.952a6,6,0,0,0,.963,5.108,2.9,2.9,0,0,0,2.214,1.184h.506a2.9,2.9,0,0,0,2.214-1.184,6,6,0,0,0,.963-5.108l-.241-.952C8.691,3.558,7.395,2.3,6.025,2.3Z" transform="translate(15)"></path>
                                                            <path id="Line_2" data-name="Line 2" d="M.5.432V18.568" transform="translate(6 14)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                                            <path id="Line_2_Copy" data-name="Line 2 Copy" d="M.5.432V18.568" transform="translate(21 14)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                                            <path id="Fill_7" data-name="Fill 7" d="M6,7A5.926,5.926,0,0,1,0,1.166V0H12V1.166A5.925,5.925,0,0,1,6,7ZM2.616,2.334A3.618,3.618,0,0,0,6,4.667,3.571,3.571,0,0,0,9.384,2.334Z" transform="translate(0 8)"></path>
                                                            <path id="Fill_9" data-name="Fill 9" d="M0,8H2V0H0Z"></path>
                                                            <path id="Fill_11" data-name="Fill 11" d="M0,8H2V0H0Z" transform="translate(5)"></path>
                                                            <path id="Fill_12" data-name="Fill 12" d="M0,8H2V0H0Z" transform="translate(10)"></path>
                                                        </g>
                                                    </g>
                                                </svg>
                                                <div class="hotel-checkin-text">
                                                    <h5>Pension</h5><?php echo $hotel['type_pension']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            } else {
                                echo "No hotels found for this formula.";
                            }
                            ?>
                        </div>



                        <!--                         
                        <button class="next-btn">&#10095;</button>
                        </section>
                        <div class="dots-container"></div> -->

                    </div>
                </div>
            </div>
            <!-- Pourquoi Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Pourquoi choisir la formule?
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <p>
                            <?php echo ($formule['description']); ?>
                        </p>
                    </div>
                </div>
            </div>
            <!-- Hébergements Section -->
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Hébergements
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">

                        <!-- <section class="wrapper">
                            <button class="prev-btn">&#10094;</button> -->

                        <div class="row">
                            <?php
                            // Assuming $conn is your existing database connection
                            $sql_hebergements = "SELECT * FROM hebergements WHERE formule_id = ?";
                            $stmt_hebergements = mysqli_prepare($conn, $sql_hebergements);
                            mysqli_stmt_bind_param($stmt_hebergements, "i", $formule_id);
                            mysqli_stmt_execute($stmt_hebergements);
                            $result_hebergements = mysqli_stmt_get_result($stmt_hebergements);

                            if (mysqli_num_rows($result_hebergements) > 0) {
                                while ($hotel = mysqli_fetch_assoc($result_hebergements)) {
                            ?>
                                    <div class="card-container">
                                        <div class="hotel-image">
                                            <!-- <div id="carousel1" class="carousel slide" data-ride="carousel"> -->
                                            <div id="carousel1" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">

                                                <div class="carousel-inner">
                                                    <?php
                                                    // Display gallery images for hotel 1
                                                    $sql_gallery1 = "SELECT image_path FROM hotel_gallery WHERE hotel_id = {$hotel['hotel_id']}";
                                                    $result_gallery1 = mysqli_query($conn, $sql_gallery1);
                                                    $active = true;
                                                    while ($row = mysqli_fetch_assoc($result_gallery1)) {
                                                        echo "<div class='carousel-item" . ($active ? " active" : "") . "'>";
                                                        echo "<div class='image-container'><img  src='../" . $row['image_path'] . "' alt='Hotel Image'></div>";
                                                        echo "</div>";
                                                        $active = false;
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="hotel-info">
                                            <div class="heading">

                                                <?php
                                                // Fetch and display package name
                                                $hoteluni_id = $hotel['hotel_id'];
                                                $query_hoteluni = "SELECT ville FROM hotels WHERE id = ?";  // Querying the correct table (assuming package names are stored here)
                                                $stmt_hoteluni = $conn->prepare($query_hoteluni);
                                                $stmt_hoteluni->bind_param("i", $hoteluni_id);
                                                $stmt_hoteluni->execute();
                                                $result_hoteluni = $stmt_hoteluni->get_result();
                                                $hoteluni = $result_hoteluni->fetch_assoc();
                                                ?>
                                                <h3 style="color:#000" class="hidden"> <strong>
                                                        <?php echo $hoteluni['ville']; ?></strong></h3>


                                                <?php
                                                // Fetch and display package name
                                                $hoteluni_id = $hotel['hotel_id'];
                                                $query_hoteluni = "SELECT nom,etoiles,details,monument FROM hotels WHERE id = ?";  // Querying the correct table (assuming package names are stored here)
                                                $stmt_hoteluni = $conn->prepare($query_hoteluni);
                                                $stmt_hoteluni->bind_param("i", $hoteluni_id);
                                                $stmt_hoteluni->execute();
                                                $result_hoteluni = $stmt_hoteluni->get_result();
                                                $hoteluni = $result_hoteluni->fetch_assoc();
                                                ?>


                                                <h3 class="title">
                                                    <strong><?php echo $hoteluni['nom']; ?></strong>

                                                    <?php
                                                    $numStars = (int) $hoteluni['etoiles']; // Ensure it's a number
                                                    for ($i = 0; $i < $numStars; $i++) {
                                                        echo "★"; // Use Unicode star for consistent display
                                                    }
                                                    ?>
                                                </h3>

                                                <h4 class="subtitle"> <?php echo $hoteluni['details']; ?></h4>
                                            </div>
                                            <div class="reviews">
                                                <ul class="stars">
                                                    <p> <svg style="width:30px;height:30px;margin-right:10px" xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                            <g id="Groupe_23" data-name="Groupe 23" transform="translate(-1011 -7560)">
                                                                <circle id="Oval_Copy_12" data-name="Oval Copy 12" cx="33.627" cy="33.627" r="33.627" transform="translate(1011 7560)" fill="#f7f2e8"></circle>
                                                                <g id="Group_3" data-name="Group 3" transform="translate(1025 7578)">
                                                                    <path id="Fill_1" data-name="Fill 1" d="M39.2,32H35.081a.8.8,0,0,1-.8-.789V28.051H5.719V31.21a.8.8,0,0,1-.8.789H.8A.8.8,0,0,1,0,31.21V20.154a3.975,3.975,0,0,1,3.2-3.869V2.779a.792.792,0,0,1,.6-.765,66.144,66.144,0,0,1,32.4,0,.792.792,0,0,1,.6.765V16.285A3.975,3.975,0,0,1,40,20.154V31.21A.8.8,0,0,1,39.2,32ZM4.918,26.471H35.082a.8.8,0,0,1,.8.79v3.158H38.4V23.312H1.6v7.107h5.118V27.26A.8.8,0,0,1,4.918,26.471ZM4,17.783a2.388,2.388,0,0,0-2.4,2.37v1.58H38.4v-1.58A2.387,2.387,0,0,0,36,17.784h5Zm20.225-5.971h6.649A2.711,2.711,0,0,1,33.6,14.5v1.7h1.6V3.4a64.51,64.51,0,0,0-30.4,0v12.81H6.4V14.5a2.711,2.711,0,0,1,2.725-2.69h6.65A2.711,2.711,0,0,1,18.5,14.5v1.7h3V14.5A2.711,2.711,0,0,1,24.224,11.813Zm0,1.579A1.119,1.119,0,0,0,23.1,14.5v1.7H32V14.5a1.119,1.119,0,0,0-1.125-1.111Zm-15.1,0A1.119,1.119,0,0,0,8,14.5v1.7h8.9V14.5a1.119,1.119,0,0,0-1.125-1.111Z" stroke="#000" stroke-miterlimit="10" stroke-width="0.4">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <?php echo $hotel['nombre_nuit']; ?> Jours </p>
                                                </ul>
                                                <ul class="trip-advisor">
                                                    <p> <svg style="width:30px;height:30px;margin-right:10px" xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255" viewBox="0 0 67.255 67.255">
                                                            <g id="Groupe_21" data-name="Groupe 21" transform="translate(-1011 -7706)">
                                                                <circle id="Oval_Copy_14" data-name="Oval Copy 14" cx="33.627" cy="33.627" r="33.627" transform="translate(1011 7706)" fill="#f7f2e8"></circle>
                                                                <g id="Group_13" data-name="Group 13" transform="translate(1032 7725)">
                                                                    <path id="Fill_1" data-name="Fill 1" d="M6.265,15H5.783a5.3,5.3,0,0,1-4.115-2.066,8.131,8.131,0,0,1-1.4-7.082L.514,4.9C1.285,1.969,3.489,0,6,0c2.535,0,4.74,1.969,5.486,4.9l.24.952a8.133,8.133,0,0,1-1.4,7.082A5.18,5.18,0,0,1,6.265,15ZM6.025,2.3c-1.407,0-2.674,1.26-3.153,3.135l-.241.952a6,6,0,0,0,.963,5.108,2.9,2.9,0,0,0,2.214,1.184h.506a2.9,2.9,0,0,0,2.214-1.184,6,6,0,0,0,.963-5.108l-.241-.952C8.691,3.558,7.395,2.3,6.025,2.3Z" transform="translate(15)"></path>
                                                                    <path id="Line_2" data-name="Line 2" d="M.5.432V18.568" transform="translate(6 14)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                                                    <path id="Line_2_Copy" data-name="Line 2 Copy" d="M.5.432V18.568" transform="translate(21 14)" fill="none" stroke="#000" stroke-linecap="round" stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2"></path>
                                                                    <path id="Fill_7" data-name="Fill 7" d="M6,7A5.926,5.926,0,0,1,0,1.166V0H12V1.166A5.925,5.925,0,0,1,6,7ZM2.616,2.334A3.618,3.618,0,0,0,6,4.667,3.571,3.571,0,0,0,9.384,2.334Z" transform="translate(0 8)"></path>
                                                                    <path id="Fill_9" data-name="Fill 9" d="M0,8H2V0H0Z"></path>
                                                                    <path id="Fill_11" data-name="Fill 11" d="M0,8H2V0H0Z" transform="translate(5)"></path>
                                                                    <path id="Fill_12" data-name="Fill 12" d="M0,8H2V0H0Z" transform="translate(10)"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <?php echo $hotel['type_pension']; ?> </p>

                                                </ul>
                                            </div>

                                            <div class="reviews">
                                                <ul class="stars">
                                                    <p><svg style="width:30px;height:30px;margin-right:10px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/