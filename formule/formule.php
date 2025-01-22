<?php
include '../db.php'; // Include your database connection file

// Get the formule_id from the URL
$formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($formule_id > 0) {
    // Query to fetch pricing details
    $query = "SELECT 
                prix_chambre_quadruple, 
                prix_chambre_triple, 
                prix_chambre_double, 
                prix_chambre_single, 
                prix_bebe,
                child_discount,
                prix_chambre_quadruple_promo,
                prix_chambre_triple_promo,
                prix_chambre_double_promo,
                prix_chambre_single_promo
              FROM formules 
              WHERE id = ?";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $formule_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();

        // Assign fetched values to variables
        $prix_chambre_quadruple = $data['prix_chambre_quadruple'];
        $prix_chambre_triple = $data['prix_chambre_triple'];
        $prix_chambre_double = $data['prix_chambre_double'];
        $prix_chambre_single = $data['prix_chambre_single'];
        $prix_bebe = $data['prix_bebe'];
        $child_discount = $data['child_discount'];
        $prix_chambre_quadruple_promo = $data['prix_chambre_quadruple_promo'];
        $prix_chambre_triple_promo = $data['prix_chambre_triple_promo'];
        $prix_chambre_double_promo = $data['prix_chambre_double_promo'];
        $prix_chambre_single_promo = $data['prix_chambre_single_promo'];
    } else {
        // Default values if no record found
        $prix_chambre_quadruple = $prix_chambre_triple = $prix_chambre_double = $prix_chambre_single = $prix_bebe = $child_discount = $prix_chambre_quadruple_promo = $prix_chambre_triple_promo = $prix_chambre_double_promo = $prix_chambre_single_promo = "N/A";
    }
    $stmt->close();
} else {
    echo "Invalid Formule ID.";
}
?>
<!-- Query for Tarif Prices -->

<!-- Query for Airline Company -->
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
<!-- Query for Airline Company -->

<!-- Query for Flights -->
<?php
include '../db.php';

// Get the formule_id from the URL
$formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($formule_id > 0) {
    // Query to fetch the required data
    $query = "
        SELECT 
            v.num_vol,
            v.heure_depart,
            v.heure_arrivee,
            a_depart.nom AS depart_airport_name,
            a_depart.abrv AS depart_airport_code,
            a_destination.nom AS destination_airport_name,
            a_destination.abrv AS destination_airport_code
        FROM vols AS v
        INNER JOIN airports AS a_depart ON v.airport_depart_id = a_depart.id
        INNER JOIN airports AS a_destination ON v.airport_destination_id = a_destination.id
        WHERE v.formule_id = ?
    ";

    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $formule_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Initialize an array to store the fetched data
    $flights = [];

    while ($row = $result->fetch_assoc()) {
        $flights[] = $row;
    }

    $stmt->close();
} else {
    echo "Invalid Formule ID.";
}
?>
<!-- Query for Flights -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>



    <!-- Include the icons.php file -->
    <?php include('icons.php'); ?>
    <style>
        /* Define the Raleway fonts */
        @font-face {
            font-family: 'Raleway';
            src: url('../fonts/Raleway-Regular.ttf') format('truetype');
            font-weight: normal;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Raleway';
            src: url('../fonts/Raleway-Medium.ttf') format('truetype');
            font-weight: 500;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Raleway';
            src: url('../fonts/Raleway-SemiBold.ttf') format('truetype');
            font-weight: 600;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Raleway';
            src: url('../fonts/Raleway-Bold.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        @font-face {
            font-family: 'Raleway-light';
            src: url('../fonts/Raleway-light.ttf') format('truetype');
            font-weight: bold;
            font-style: normal;
            font-display: swap;
        }

        /* Apply Raleway Regular font for body text */
        body {
            font-family: 'Raleway', sans-serif;
        }

        /* Apply Raleway Medium for subheadings */
        h2,
        h3 {
            font-family: 'Raleway', sans-serif;
            font-weight: 500;
            /* Medium weight */
        }

        /* Apply Raleway SemiBold for specific elements */
        .special-text {
            font-family: 'Raleway', sans-serif;
            font-weight: 600;
            /* SemiBold */
        }

        /* Apply Raleway Bold for headings */
        h1,
        h4,
        h5 {
            font-family: 'Raleway', sans-serif;
            font-weight: bold;
            /* Bold weight */
        }

        /* Fallback font for the body text */
        body {
            font-family: 'Raleway', Arial, sans-serif;
        }


        :root {
            --primary-color: #C89D54;
            --body-color: #F2EDE4;
            --dark-color: #595651;
            --darker-color: #403F3E;
            --light-color: #F2F2F2;
            --grey-text: #898989;

            --swiper-navigation-size: 21px;

        }

        body {
            background-color: var(--body-color);
            /* background-color: black; */

        }



        /* Container to hold both the content and sidebar */
        .container {
            display: flex;
            flex-wrap: wrap;
        }

        /* Main content area that takes up 60% */
        .content {
            flex: 0 0 60%;
            /* 60% width on large screens */
            padding: 10px;
            box-sizing: border-box;
        }

        /* Sticky sidebar taking 40% */
        .sticky-sidebar {
            flex: 0 0 40%;
            /* 40% width on large screens */
            /* padding: 10px; */
            box-sizing: border-box;
            position: -webkit-sticky;
            position: sticky;
            top: 95px;
            background-color: white;
            border-radius: 8px;
            height: fit-content;
            margin-top: 10px;
            margin-bottom: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            /* Adjust the value based on your layout */
        }

        .navbar {
            padding: 1rem 6rem 1rem 6rem;
            /* padding: 10px 90px 10px 90px; */
            box-shadow: rgba(0, 0, 0, 0.1) 0px 4px 6px -1px, rgba(0, 0, 0, 0.06) 0px 2px 4px -1px;
        }

        /* Center the logo */
        .navbar-brand {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            margin-right: 0px;
        }

        /* Remove border from the navbar-toggler button and icon */
        .navbar-toggler,
        .navbar-toggler .navbar-toggler-icon {
            border: none !important;
            box-shadow: none !important;
        }


        /* Sticky navbar */
        .sticky-top {
            position: sticky;
            top: 0;
            z-index: 1020;
        }

        .nav-link {
            font-size: 16px;
            font-weight: 600;
            color: var(--darker-color);
            margin-right: 30px;
        }

        .nav-link:hover {
            color: var(--primary-color);
        }

        p {
            text-align: justify;
        }

        .search-box-nav {
            border: none;
            outline: none !important;
            box-shadow: none !important;
        }

        .search-box-nav:hover {
            border-bottom: 1px solid #a1a2a7;
            border-radius: 0px;
        }

        .search-icon-btn {
            background: none;
            border: none;
            color: #6c757d;
            font-size: 1.25rem;
        }

        .search-icon-btn:hover {
            color: var(--primary-color);
        }

        .contact-btn {
            background-color: var(--primary-color);
            border-radius: 3px;
            color: white;
            margin-left: 20px;
            padding: 3px 40px 3px 40px;
            font-size: 16px;
            font-weight: 700;
        }

        .contact-btn:hover {
            background-color: var(--dark-color);
            color: white;
        }

        .contact-btn-sidebar {
            margin-top: 30px;
            margin-left: 0px;
            font-size: 16px;
            font-weight: 600;
            padding: 7px 55px;
            border-radius: 5px;
        }

        .offcanvas {
            background-color: var(--dark-color);
        }

        .offcanvas.offcanvas-start {
            width: 80%;
        }

        .nav-link-sidebar {
            color: #f1ede4;
        }

        .btn-close {
            opacity: 0.75;
        }

        .contact-btn-nav-mobile {
            display: none;
        }

        .bottom-links-sidebar-mobile {
            bottom: 0;
            position: relative;
            display: grid;
            gap: 20px;
        }

        .bottom-links-sidebar-mobile a {
            color: white;
            text-decoration: none;
            font-size: 12px;
            font-weight: 400;
            font-family: 'helvetica', sans-serif;
        }



        @media (max-width: 1160px) {
            .navbar {
                padding: 1rem 3rem 1rem 3rem;
            }

            .nav-link {
                margin-right: 20px;
            }

            .search-box {
                display: flex !important;
                justify-content: flex-end;
            }

            .search-box-nav {
                width: 50%;
                margin-left: 50px;
            }


        }

        @media (max-width: 991px) {
            .contact-btn-nav-mobile {
                display: inline-block;
                background-color: white;
                border: 1px solid var(--primary-color);
                border-radius: 5px;
                color: var(--primary-color);
                padding: 6px 28px;
                font-size: 16px;
                font-weight: 700;
                margin-left: 0px;
            }

            .navbar-brand {
                position: static;
                left: auto;
                transform: none;
            }


            /* For screens 991px and below, make everything 100% width */
            .content {
                flex: 0 0 100%;
                position: static;
            }





        }

        @media (min-width: 991px) {
            .offcanvas {
                display: none;
            }
        }

        @media (max-width: 575px) {
            .navbar {
                padding: 1rem 0rem 1rem 0rem;
            }

            .logo-mobile {
                width: 100px;
            }
        }

        /*--------------------------------  Carousel ----------------------*/
        /* Adjust the main image */
        .main-image {
            width: 100%;
            /* height: 36vw; */
            height: 500px;
            object-fit: cover;
            border-radius: 8px;
        }


        .thumbnail img {
            width: 20vw;
            /* Width relative to viewport width */
            height: 20vw;
            /* Height relative to viewport width */
            max-width: 100px;
            /* Maximum width to avoid excessive scaling on large screens */
            max-height: 100px;
            /* Maximum height to avoid excessive scaling on large screens */
            object-fit: cover;
            cursor: pointer;
            border-radius: 5px;
            border: 2px solid white;
        }

        /* @media (max-width: 1199px) {
            .thumbnail img {
                width: 20vw;
                height: 20vw;
                max-width: 90px;
                max-height: 90px;
            }
        } */









        /* Highlight the selected thumbnail */
        .thumbnail.active img {
            border: 2px solid #c89e54;
        }

        /* Logo placement */
        .logo {
            position: absolute;
            top: 30px;
            right: 0px;
            width: 100px;
            background-color: #ffffffb0;
            padding: 8px;
            border-radius: 6px 0 0 6px;
        }

        @media (max-width: 991px) {
            .logo {
                position: absolute;
                top: 0px;
                right: 30px;
                width: 100px;
                background-color: #ffffffb0;
                padding: 8px;
                border-radius: 0 0 6px 6px;
            }
        }

        /*---------------------------------Test------------------------*/
        /* .content {
            display: flex;
            flex-direction: column;
            align-items: center;
        } */

        .thumbnail-carousel-container {
            position: relative;
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 600px;
            overflow: hidden;
            margin-top: -120px;
        }


        @media (min-width: 1200px) {
            .thumbnail-carousel-container {
                margin-left: 30px;
            }
        }

        @media (min-width: 768px) and (max-width: 991px) {
            .thumbnail-carousel-container {
                margin-left: 40px;
            }
        }

        @media (min-width: 1400px) {
            .thumbnail-carousel-container {
                margin-left: 84px;
            }
        }

        .thumbnail-carousel {
            display: flex;
            transition: transform 0.3s ease;
        }

        .thumbnail {
            flex: 0 0 20%;
            /* Each thumbnail takes up 20% of the row, so 5 fit in one row */
            padding: 5px;
            box-sizing: border-box;
        }

        .thumbnail img {
            width: 100%;
            cursor: pointer;
            border-radius: 5px;
        }

        .carousel-control {
            background-color: rgb(255 255 255 / 76%);
            border: none;
            color: #000000;
            font-size: 15px;
            cursor: pointer;
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            padding: 10px;
            z-index: 1;
            border-radius: 50px;
            padding-top: 2px;
            padding-bottom: 3px;
        }

        .carousel-control.prev {
            left: 0;
        }

        .carousel-control.next {
            right: 0;
        }

        @media (min-width: 450px) and (max-width: 991px) {
            .first-bolck {
                margin-bottom: 1rem;
            }
        }

        @media (min-width: 350px) and (max-width: 450px) {
            .first-bolck {
                margin-bottom: 2rem;
            }
        }

        @media (min-width: 250px) and (max-width: 350px) {
            .first-bolck {
                margin-bottom: 2.5rem;
            }
        }

        /*---------------------------------Test sticky sidebar------------------------*/
        /* .sticky-sidebar {
            flex: 0 0 40%;
            padding: 20px;
            box-sizing: border-box;
            position: -webkit-sticky;
            position: sticky;
            top: 95px;
            background-color: white;
            border-radius: 8px;
            margin-top: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        } */

        .formula {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            padding: 10px;
        }

        .formula-item {
            display: flex;
            align-items: center;
        }

        .icon {
            font-size: 20px;
            color: #B89A5A;
            margin-right: 10px;
        }

        .text h4 {
            font-size: 14px;
            font-weight: 100;
            margin: 0;
            color: #555;
        }

        .text p {
            font-size: 12px;
            color: #333;
            margin: 0;
            font-weight: 700;
            text-align: left;
        }

        .cta-button {
            width: 100%;
            padding: 5px;
            margin-top: 20px;
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            border: none;
            font-size: 12px;
            font-weight: 600;
            cursor: pointer;
            border-radius: 5px 5px 0px 0px;
        }

        .price-reservation {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 10px 0px 10px;
        }

        .price {
            font-size: .8rem;
            color: #555;
        }

        .price-number {
            font-size: 1.5rem;
        }

        .reserve-button {
            background-color: var(--primary-color);
            color: white;
            padding: 2% 15%;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
            font-weight: 600;
        }

        .icon-container {
            margin: 0px 15px 15px 15px;
        }

        .icon-arrow {
            margin: -5px;
        }

        .top-sidebar {
            width: 100%;
            text-align: center;
        }

        /*---------------------------------Test table on hover------------------------*/


        /* Default for larger screens */
        .sticky-sidebar {
            flex: 0 0 40%;
            box-sizing: border-box;
            position: -webkit-sticky;
            position: sticky;
            top: 95px;
            background-color: white;
            border-radius: 8px;
            height: fit-content;
            margin-top: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            display: flex;
            flex-direction: column;
            /* Allow children to stack vertically */
        }

        /* Adjust content layout */
        .content {
            flex: 0 0 60%;
            box-sizing: border-box;
            padding: 10px;
        }

        /* Pricing table container styles */
        .pricing-table-container {
            position: absolute;
            bottom: 16%;
            /* Position it just above the CTA button */
            left: 0;
            width: 100%;
            /* Full width of the sidebar */
            background-color: white;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 8px 8px 0 0;
            padding: 10px;
            opacity: 0;
            transform: translateY(10px);
            transition: opacity 0.3s ease, transform 0.6s ease;
            z-index: 2;
            visibility: hidden;
            /* Ensure it's above other content */
        }

        /* Hover effect on CTA button */
        .cta-button:hover~.pricing-table-container,
        .pricing-table-container:hover {
            opacity: 1;
            transform: translateY(0);
            visibility: visible;
            /* Ensure table stays above button */
        }

        /* Adjust table to take full width of the sidebar */
        .pricing-table {
            width: 100%;
            /* Full width */
            border-collapse: collapse;
        }

        /* Pricing table styles */
        .pricing-table th,
        .pricing-table td {
            padding: 10px;
            text-align: left;
        }

        .pricing-table th {
            font-weight: bold;
        }

        .pricing-table td {
            font-weight: normal;
        }

        .pricing-table tr:not(:last-child) td {
            border-bottom: 1px solid #ddd;
        }

        /* Make sure the CTA button is positioned above the table */
        .cta-button {
            position: relative;
            z-index: 1;
            /* Ensure button is above the table */
        }

        /* Media query for mobile responsiveness */
        @media (max-width: 991px) {

            /* Switch to a column layout for smaller screens */
            .container {
                display: block;
                /* padding: 10px; */
                /* Adjust container padding */
            }

            .content,
            .sticky-sidebar {
                flex: 0 0 100%;
                /* Full width on small screens */
                position: relative;
                /* Reset sticky positioning on small screens */
            }

            /* Fix the layout issue where content goes below sidebar on small screens */
            .sticky-sidebar {
                margin-top: 0;
                /* Remove extra margin */
                position: static;
            }

            /* Ensure the table stays visible */
            .pricing-table-container {
                /* position: relative; */
                /* Switch from absolute to relative positioning */
                margin-top: -49%;
                /* Give space between table and button */
                opacity: 0;
                /* Keep the table visible */
                transform: translateY(0);
                visibility: hidden;
                /* Keep the table in normal position */
            }

            /* Ensure the CTA button is full-width */
            .cta-button {
                width: 100%;
            }
        }

        /* Grouped media queries for pricing table container adjustments */
        /* @media (max-width: 767px) {
            .pricing-table-container {
                margin-top: -66%;
            }
        }

        @media (max-width: 575px) {
            .pricing-table-container {
                margin-top: -62%;
            }
        }

        @media (max-width: 570px) {
            .pricing-table-container {
                margin-top: -63%;
            }
        }

        @media (max-width: 550px) {
            .pricing-table-container {
                margin-top: -66%;
            }
        }

        @media (max-width: 520px) {
            .pricing-table-container {
                margin-top: -70%;
            }
        }

        @media (max-width: 500px) {
            .pricing-table-container {
                margin-top: -73%;
            }
        }

        @media (max-width: 470px) {
            .pricing-table-container {
                margin-top: -77%;
            }
        }

        @media (max-width: 430px) {
            .pricing-table-container {
                margin-top: -84%;
            }
        }

        @media (max-width: 400px) {
            .pricing-table-container {
                margin-top: -92%;
            }
        }

        @media (max-width: 370px) {
            .pricing-table-container {
                margin-top: -101%;
            }
        }

        @media (max-width: 340px) {
            .pricing-table-container {
                margin-top: -110%;
            }
        } */


        .pricing-table th,
        .pricing-table td {
            text-align: right;
            font-weight: bold;
        }

        .pricing-table td:first-child {
            text-align: left;
            font-weight: 100;
        }

        .pricing-table th:first-child {
            font-weight: bold;
            text-align: left;
        }




        /* Initially hide the footer with a smooth transition */
        .pricing-table-container-footer {
            opacity: 0;
            visibility: hidden;
            transform: translateY(100%);
            /* Start hidden below */
            transition: transform 0.5s ease, opacity 0.5s ease, visibility 0.5s ease;
            /* Smooth transition */
        }

        /* When visible, slide the footer up and make it visible */
        .pricing-table-container-footer.visible {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
            /* Slide up to original position */
        }

        /*-------------- FLIGHT BLOCK ---------------*/
        .content {
            max-width: 100%;
            /* margin: auto; */
            overflow: hidden;
        }

        .flight-carousel {
            display: flex;
            gap: 16px;
            transition: transform 0.5s ease;
        }

        .flight-ticket {
            min-width: calc(33.33% - 16px);
            /* Three tickets per row by default */
            background: #fff;
            border-radius: 8px;
            /* box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px; */
            padding: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        @media (max-width: 991px) {
            .flight-ticket {
                min-width: 100%;
                /* Show one ticket per row on smaller screens */
            }
        }

        .ticket-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            width: 100%;
            padding: 10px 0px;
        }

        .airline-logo {
            width: 150px;
            height: auto;
        }

        .confirm-button {
            background-color: #4caf50;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 20px;
            cursor: pointer;
            font-size: .8rem;
        }

        .not-confirm-button {
            background-color: #d2a60e;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 20px;
            cursor: pointer;
            font-size: .8rem;
        }

        .ticket-route {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            margin: 5px 0;
            font-size: 12px;
        }

        .icon-container-vol-section {
            margin: 2px 15px 3px 0px;
        }

        .icon-container-vol-section-right {
            margin: 0px 0px 0px 10px;
        }

        /*------------------------------ FLIGHT BLOCK - top section ---------------*/
        .ticket-route>span {
            display: block;
            /* Make each <span> a block element so they stack vertically */
            text-align: center;
            /* Default center alignment */
        }

        /* Align left section (airport code + name) */
        .left-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-size: 10px;
            width: 33%;
            /* Align to the left */
        }

        /* Align right section (airport code + name) */
        .right-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            text-align: end;
            font-size: 10px;
            width: 33%;
            /* Align to the right */
        }

        .left-section {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-size: 10px;
            width: 33%;
            /* Align to the left */
        }

        /* Align right section (airport code + name) */
        .right-section {
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            text-align: end;
            font-size: 10px;
            width: 33%;
            /* Align to the right */
        }

        .bold {
            font-weight: bold;
        }

        .grey {
            color: var(--grey-text);
        }

        .dark-text {
            color: var(--darker-color);
        }


        .left-section-flight-details {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-size: 10px;
            /* Align to the left */
        }

        /* Align right section (airport code + name) */
        .right-section-flight-details {
            display: flex;
            flex-direction: column;
            align-items: start;
            text-align: end;
            font-size: 10px;

            /* Align to the right */
        }

        .duration {
            display: flex;
            flex-direction: column;
            align-items: center;
            flex-wrap: wrap;
            justify-content: center;
            font-size: 12px;
        }

        /* Flight number centered */
        .flight-number {
            text-align: center;
        }

        .airport-code,
        .flight-code {
            font-weight: bold;
        }



        .swiper-wrapper {
            margin-bottom: 30px;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background-color: white;
            padding: 16px;
            border-radius: 50%;
            color: black;
            top: var(--swiper-navigation-top-offset, 34%);
        }


        /*------------------------------ FLIGHT BLOCK - top section ---------------*/


        .flight-image {
            width: 100%;
            height: 120px;
            border-radius: 8px;
            margin: 8px 0;
            object-fit: cover;
        }

        .flight-details {
            display: flex;
            justify-content: space-around;
            width: 100%;
            margin-top: 5px;
            font-size: 14px;
        }


        .swiper-button-next.swiper-button,
        .swiper-button-prev.swiper-button {
            opacity: 1;
            cursor: auto;
            pointer-events: none;
        }

        /* -------------------- the circle cut ---------------- */
        /* .ticket-info {
    position: relative;
    padding: 20px;
    border-radius: 10px;
    background-color: #f9f9f9;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
} */

        .ticket-info {
            width: -webkit-fill-available;
        }

        .dashed-line {
            margin: 10px -10px;
            border-top: dashed 2px #bbbbbb59;
            position: relative;
        }

        .dashed-line.circle-cut::before,
        .dashed-line.circle-cut::after {
            content: '';
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 20px;
            /* diameter of the circle cut */
            height: 20px;
            /* diameter of the circle cut */
            background-color: var(--body-color);
            /* match background of ticket */
            border-radius: 50%;
        }

        .dashed-line.circle-cut::before {
            left: -10px;
            /* adjust to align half outside the line */
        }

        .dashed-line.circle-cut::after {
            right: -10px;
            /* adjust to align half outside the line */
        }


        /*-----------------------  STICKY MOBILE FOOTER START ---------------------*/
        @media (min-width: 992px) {
            .sticky-footer {
                display: none;
            }
        }

        @media (max-width: 991px) {
            .sticky-footer {
                position: fixed;
                bottom: 0;
                width: 100%;
                background-color: white;
                box-shadow: 0px -2px 5px rgba(0, 0, 0, 0.1);
                padding: 0px 0;
                text-align: center;
                z-index: 1000;
                height: fit-content;
            }

            .cta-mobile-table-button {
                background-color: var(--dark-color);
                color: white;
                width: 100%;
                border: none;
                border-radius: 5px 5px 0 0;
                padding-bottom: 7px;
            }

            .pricing-table-container-footer {
                position: absolute;
                bottom: 62%;
                /* Position it just above the CTA button */
                left: 0;
                width: 100%;
                /* Full width of the sidebar */
                background-color: white;
                box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
                border-radius: 8px 8px 0 0;
                padding: 10px;
                opacity: 0;
                transform: translateY(10px);
                transition: opacity 0.3s ease, transform 0.6s ease;
                z-index: 2;
                visibility: hidden;
                /* Ensure it's above other content */
            }

            .reservation-mobile-footer {
                background-color: white;
                padding: 10px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            /* Hover effect on CTA button */
            /* .cta-mobile-table-button:hover~.pricing-table-container-footer,
            .pricing-table-container-footer:hover {
                opacity: 1;
                transform: translateY(0);
                visibility: visible;

            } */



            .cta-button {
                display: none;
            }

            .pricing-table-container {
                display: none;
            }

            .price-reservation {
                display: none;
            }

            .sticky-sidebar {
                padding-bottom: 10px;
                border-radius: 8px 8px 0 0;
            }
        }

        /*-----------------------  STICKY MOBILE FOOTER END ---------------------*/

        /*------------------------ Hebergement START ----------------------------*/
        /* Container for the entire section */
        .hebergement-container {
            padding: 20px;
            background-color: white;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
        }

        .hotel-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }

        .hotel-button {
            padding: 10px 20px;
            border: none;
            background-color: #eaeaea;
            cursor: pointer;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .hotel-button.active {
            background-color: var(--dark-color);
            color: #fff;
        }

        .hotel-content {
            display: flex;
            flex-direction: column;
        }

        /* Styles for swiper-container (the image container) */
        .swiper-container {
            width: 100%;
            height: 200px;
            overflow: hidden;
            margin-bottom: 15px;
            display: flex;
            /* Use flexbox to arrange images side by side */
        }

        /* .swiper-wrapper {
            display: flex;
            gap: 10px;
        }

        .swiper-slide {
            width: 50%;
            flex-shrink: 0;
        }

        .swiper-slide img {
            width: 100%;
            height: auto;
            object-fit: cover;
        } */

        .hotel-details {
            /* padding: 15px; */
            border-radius: 8px;
            display: flex;
            /* Use flexbox to split content */
            justify-content: space-between;
            /* Space out the sections */
            flex-wrap: wrap;
            /* Allow wrapping for small screen sizes */
        }

        .hotel-details .info {
            flex: 1 1 40%;
            /* Take 60% of the container */
            margin-right: 20px;
            /* Add some space between the sections */
        }

        /* Right section: Booking details */
        .hotel-details .booking-details {
            flex: 1 1 35%;
            /* Take 35% of the container */
            min-width: 250px;
            /* Ensure the right section has a minimum width */
            margin-left: 20px;
        }

        .hotel-details h3 {
            margin: 0;
            font-size: 18px;
        }

        .rating {
            color: #ffa500;
        }

        .booking-details {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .booking-details div {
            flex: 1 1 45%;
        }

        .hotel-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 5px;
        }

        .swiper-horizontal>.swiper-pagination-bullets .swiper-pagination-bullet,
        .swiper-pagination-horizontal.swiper-pagination-bullets .swiper-pagination-bullet {
            margin: 0 var(--swiper-pagination-bullet-horizontal-gap, 4px);
            background-color: #ffffff;
            /* outline: thin solid var(--primary-color); */
            margin: 10px 5px 0px 0px;
            border: 2px solid var(--primary-color);

        }

        @media (max-width: 991px) {
            .hebergement-container {
                /* max-width: 400px; */
                padding: 0px 15px 15px 15px;
                border-radius: 8px 8px 0px 0px;
            }


            .hotel-details .info {
                flex: 1 1 100%;
                /* Take 60% of the container */
                margin-right: 20px;
                /* Add some space between the sections */
            }

            .hotel-details .booking-details {
                margin-left: 0px;
                margin-bottom: 40px;
            }
        }

        /* Ensure the pagination is positioned below the swiper images */
        #hotel-madinah .swiper-container {
            position: relative;
            /* Make the container the reference point for the absolute positioning */
        }

        #hotel-madinah .swiper-pagination {
            position: absolute;
            bottom: 10px;
            /* Adjust this value to set how far the pagination dots should be from the bottom of the swiper container */
            left: 0;
            width: 100%;
            text-align: center;
            z-index: 10;
            /* Ensure the dots appear on top of images */
        }

        #hotel-makkah .swiper-container {
            position: relative;
            /* Make the container the reference point for the absolute positioning */
        }

        #hotel-makkah .swiper-pagination {
            position: absolute;
            bottom: 10px;
            /* Adjust this value to set how far the pagination dots should be from the bottom of the swiper container */
            left: 0;
            width: 100%;
            text-align: center;
            z-index: 10;
            /* Ensure the dots appear on top of images */
        }

        @media (max-width: 363px) {
            .hotel-button {
                padding: 8px 9px;
                font-size: 13px;
            }
        }

        .top-hebergement {
            width: 100%;
            text-align: center;
        }

        @media (min-width: 992px) {
            .top-hebergement {
                display: none;
            }
        }

        /*------------------------ Hebergement END ------------------------------*/

        /*------------------------ Programme START ------------------------------*/
        .programme-container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            max-width: 800px;
            margin: auto;
        }

        .programme-container h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        .accordion-item {
            border-bottom: 1px solid #ddd;
            margin-bottom: 10px;
        }

        .accordion-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            padding: 10px 0;
        }

        .date-info {
            display: flex;
            align-items: center;
        }

        .date-info .date {
            font-size: 14px;
            color: var(--grey-text);
            margin-right: 10px;
            font-weight: 500;
            display: grid;
            text-align: center;
        }

        .date-info .title {
            font-size: 13px;
            font-weight: bold;
        }

        .toggle-icon {
            font-size: 20px;
            font-weight: bold;
        }

        .accordion-body {
            display: none;
            padding: 10px 0;
        }

        .accordion-item.active .accordion-body {
            display: block;
        }

        .accordion-content {
            display: flex;
            gap: 20px;
        }

        .text-content {
            flex: 2;
            margin: 0px 20px 0px 10px;
            font-size: small;
        }

        .vr {
            margin-left: 10px;
            color: var(--primary-color);
            opacity: 1;
        }


        .content-text-image {
            flex-direction: row;
            display: flex;
        }

        .image-content {
            position: relative;
            flex: 2;
            /* max-width: 200px; */
        }

        .image-content img {
            width: 100%;
            border-radius: 8px;
        }

        .duration-label {
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: white;
            color: var(--darker-color);
            padding: 5px;
            font-size: 12px;
            border-radius: 5px;
            text-align: center;
        }

        .accordion-item.active .date-info .date {
            color: var(--primary-color);
        }


        @media (max-width: 991px) {
            .programme-container {
                border-radius: 5px;
            }

            .accordion-content {
                display: flex;
                /* Set to flex so we can position the line on the left and the text/image on the right */
                flex-direction: row;
                /* Reverse the order so that the line is on the left and the content is on the right */
                align-items: stretch;
                /* Ensure the image and text stretch the full height */
            }

            .d-flex {
                display: block;
                /* Make the .d-flex element act like a block-level element */
                flex: 1;
                height: auto;
                margin-bottom: 0;
                /* Remove any margin */
            }

            .vr {
                height: 100%;
                /* Make the line span the entire height of the content (image + text) */
                position: relative;
                left: 0;
                /* Position the line on the left */
                top: 0;
                /* Ensure the line starts at the top */
            }

            .content-text-image {
                flex-direction: column;
                display: flex;
            }

            .text-content {
                flex: 1;
                margin-left: 0px;
                margin-top: 10px;
                margin-right: 0px;
                order: 1;
                /* Ensure text is positioned after the vertical line */
            }

            .image-content {
                flex: 1;
                order: 0;
                /* Ensure image comes before text */
                margin-top: 15px;
                text-align: center;
                /* Center image on mobile */
            }

            .image-content img {
                width: 100%;
                height: auto;
                /* Ensure the image scales properly */
            }
        }

        /*------------------------ Programme END ------------------------------*/

        /*------------------------ Plus de details START ------------------------------*/
        .details-container {
            background-color: transparent;
            padding: 30px;
        }

        .accordion-item-details {
            border-bottom: 1px solid var(--darker-color);
            margin-bottom: 0px;
        }

        .date-info .title {
            font-size: 13px;
            font-weight: 400;
        }

        /*------------------------ Plus de details END ------------------------------*/

        /*------------------------  Footer_1 START -------------------------------*/

        .left-reviews h3 {
            font-size: 1.5rem;
        }

        .rating {
            text-align: center;
            color: var(--grey-text)
        }

        .reviews-count {
            text-align: center;
            margin-top: 5px;
        }

        .rating h2 {
            font-size: 2.5rem;
            color: black;
        }

        .stars {
            font-size: 1rem;
            color: #f4b400;
        }

        .criteria {
            list-style: none;
            padding: 0;
        }

        .criteria li {
            margin-bottom: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .progress-bar {
            background: linear-gradient(to right, #FFC726 85%, #e0e0e0 70%);
            height: 10px;
            border-radius: 5px;
            width: 150px;
        }

        .quote-text {
            margin-top: 30px;
            text-align: center;
        }

        .reviews-container {
            display: block;
            flex-wrap: wrap;
            gap: 20px;
            margin-top: 20px;
            max-width: 100%;
        }

        .left-reviews {
            background: #ffffff;
            padding: 20px 40px;
            text-align: center;
        }

        .testimonials-slider {
            position: relative;
            background-color: #fff;
            padding: 20px;
        }

        .swiper-slide {
            background: #fff;
            border-radius: 8px;
            /* padding: 15px; */
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        blockquote {
            margin: 0;
            font-size: 16px;
            font-style: italic;
            text-align: center;
        }


        blockquote footer {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            margin-top: 30px;
            font-size: 14px;
            color: #666;
            text-align: center;
        }

        .quote-box {
            border: 1px solid #d9d9d9;
            padding: 20px 35px;
        }

        .quote-footer {
            display: flex;
            align-items: center;
            gap: 15px;
            flex-direction: row;
            justify-content: center;
        }

        .quote-text.expanded {
            white-space: normal;
            overflow: visible;
            text-overflow: unset;
        }

        .read-more {
            color: #000000;
            cursor: pointer;
            text-decoration: underline;
            font-size: 13px;
            margin: 30px 0px;
        }

        .client-info {
            display: flex;
            flex-direction: column;
            text-align: left;
        }

        @media (max-width: 991px) {
            .reviews-container {
                display: block;
                /* padding: 0px; */
            }

            .quote-text {
                font-size: 1.5rem;
            }

            .left-reviews {
                padding: 20px;
            }
        }

        /*------------------------  Footer_1 END -------------------------------*/

        /*------------------------  Footer_2 START -------------------------------*/
        .footer-2 {
            background-color: white;
            text-align: center;
            padding: 10px 0px 40px 0px;
            border-top: 1px solid #e3e3e3;
            border-bottom: 1px solid #e3e3e3;
        }

        /*------------------------  Footer_2 END -------------------------------*/

        /*------------------------  Footer_3 START -------------------------------*/
        .unique-footer {
            background-color: #f5f5f5;
            padding: 30px 0;
            font-family: Arial, sans-serif;
        }

        .unique-footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .unique-footer-desktop {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .unique-footer-address,
        .unique-footer-logo,
        .unique-footer-links {
            /* flex: 1; */
            text-align: left;
        }

        .unique-footer-address h5 {
            font-size: 18px;
            font-weight: 600;
            color: #403F3E;
            font-family: 'Raleway', sans-serif !important;
        }

        .unique-footer-address p {
            font-size: 18px;
            font-weight: 400;
            color: #403F3E;
            /* font-family: 'Raleway', sans-serif !important; */
        }

        .unique-footer-logo img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .unique-footer-logo p {
            font-size: 18px;
            font-weight: 500;
            color: #403F3E;
            font-family: 'Raleway', sans-serif !important;
        }

        .unique-footer-links ul {
            list-style: none;
            padding: 0;
        }

        .unique-footer-links ul li {
            margin: 5px 0 10px 0;
        }

        .unique-footer-links ul li a {
            text-decoration: none;
            color: #333;
            font-family: "Dm Sans", sans-serif;
            font-size: 18px;
            font-weight: 400;
            color: #403F3E;
        }

        .unique-footer-payment img {
            width: 50px;
            margin-right: 10px;
        }

        .unique-footer-mobile {
            display: none;
            text-align: center;
        }

        .unique-footer-mobile .unique-accordion-btn {
            background-color: transparent;
            border: none;
            color: #333;
            text-align: center;
            font-size: 16px;
            cursor: pointer;
            margin: 10px 0;
        }

        .unique-footer-mobile-links {
            list-style: none;
            list-style-type: none;
            padding: 0;
            margin-top: 20px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            /* Allow wrapping when necessary */
            justify-content: center;
        }

        .unique-footer-mobile-links li {
            display: inline-block;
        }

        .unique-footer-mobile-links a {
            text-decoration: none;
            color: inherit;
            white-space: nowrap;
        }

        /* Responsive Layout */
        @media (max-width: 991px) {
            .unique-footer-desktop {
                display: none;
            }

            .unique-footer-mobile {
                display: block;
            }
        }

        /*------------------------  Footer_3 END -------------------------------*/

        /*------------------------  Footer_4 START -------------------------------*/
        /* Basic Styles */
        .footer-4 {
            background-color: white;
            text-align: center;
            padding: 20px 40px;
            position: relative;
        }

        .swiper-container-footer {
            width: 100%;
            height: 150px;
            overflow: hidden;
            /* margin-bottom: 15px; */
            display: flex;
        }

        .swiper-slide {
            /* text-align: center; */
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
        }

        .footer-4 .swiper-button-next,
        .footer-4 .swiper-button-prev {
            top: var(--swiper-navigation-top-offset, 50%);
        }

        @media (max-width: 650px) {
            .footer-4 {
                padding: 20px 20px;
            }

            .swiper-container-footer {
                height: 100px;
            }
        }

        @media (max-width: 450px) {
            .footer-4 {
                padding: 20px 10px;
            }

            .swiper-container-footer {
                height: 90px;
            }
        }

        @media (max-width: 360px) {
            .footer-4 {
                padding: 20px 10px;
            }

            .swiper-container-footer {
                height: 80px;
            }
        }

        /*------------------------  Footer_4 END -------------------------------*/

        /*------------------------  Footer_5 START -------------------------------*/
        @media (max-width: 991px) {
            .footer-5 {
                background-color: white;
                text-align: center;
                padding: 20px 0;
                display: flex;
                justify-content: space-around;
                align-items: center;
            }
        }

        @media (min-width: 992px) {
            .footer-5 {
                display: none;
            }
        }

        /*------------------------  Footer_5 END -------------------------------*/

        /*------------------------  Footer_6 START ------------------------------*/

        .footer-6 {
            background-color: white;
            text-align: center;
            padding: 20px 0;
            border-top: 1px solid #e3e3e3;
        }

        .footer-6 p {
            text-align: center;
            color: #999999;
            font-size: 16px;
            font-weight: 400;
            font-family: "Dm Sans", sans-serif;
        }

        @media (max-width:991px) {
            .footer-6 {
                padding-bottom: 120px;
            }
        }

        /*------------------------  Footer_6 END -----------------------------*/

        /*------------------------  autres-dates START -----------------------------*/
        .autres-dates-nav {
            height: 0px;
            box-shadow: none;
        }

        .autres-dates-btn {
            border: none;
            background-color: transparent;
            color: #737171;
            display: flex;
            align-items: center;
            height: inherit;
        }

        /*------------------------  autres-dates END -----------------------------*/

        /*------------------------ POPUP autres-dates START -----------------------------*/
        /* General Modal Styling */
        .unique-modal-autre-dates .modal-dialog {
            max-width: 600px;
            margin: 30px auto;
        }

        .unique-dialog-autre-dates {
            width: 100%;
        }

        .unique-card-autre-dates {
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .unique-card-autre-dates:hover {
            border: 1px solid var(--primary-color)
        }

        .unique-row-autre-dates {
            display: flex;
            justify-content: space-between;
        }

        .left-info-popup {
            width: 20%;
            display: flex !important;
            flex-direction: column;
            padding: 0px 0px 10px 10px;
        }


        .svg-popup {
            align-self: baseline;
            width: 50%;
            margin: 0px 0px 50px 0px;
            padding: 0px;
        }


        .right-info-popup {
            width: 20%;
            display: flex !important;
            flex-direction: column;
            padding: 0px 10px 10px 0px;
        }

        .bottom-info-popup {
            display: flex !important;
            justify-content: space-between;
            border-top: 1px solid #e9e9e9;
            padding-top: 10px;
        }

        .bottom-info-popup img {
            width: 20%;
            height: auto;
        }

        .buttom-right-info-popup {
            display: flex !important;
            flex-direction: column;
        }

        .price-text-popup {
            font-size: .7rem;
            text-align: end;
        }


        .price-number-popup {
            text-align: end;
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--primary-color);
        }

        /* .unique-card-autre-dates img {
            height: 30px;
        } */

        .unique-header-autre-dates {
            border-bottom: 1px solid #e3e3e3;
        }

        .unique-body-autre-dates {
            max-height: 80vh;
            overflow-y: auto;
        }

        .date-right-popup {
            margin-left: -33px;
        }

        /* Full Width on Smaller Screens */
        @media (max-width: 991px) {
            .unique-modal-autre-dates .modal-dialog {
                max-width: 100%;
                margin: 0;
            }

            .unique-dialog-autre-dates {
                width: 100%;
                padding: 5px;
            }

            .bottom-info-popup img {
                width: 30%;
                height: auto;
            }
        }

        @media (max-width: 375px) {
            .bottom-info-popup img {
                width: 40%;
                height: auto;
            }
        }

        /*------------------------ POPUP autres-dates END -----------------------------*/

        /*------------------------ POPUP Reservation START -----------------------------*/
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            margin: 0;
        }

        .minus-btn-style {
            border: none;
            background-color: #898989;
            color: white;
            border-radius: 8px;
            font-size: 20px;
            padding: 0px 10px;
        }

        .plus-btn-style {
            border: none;
            background-color: black;
            color: white;
            border-radius: 8px;
            font-size: 20px;
            padding: 0px 10px;
        }

        .number-input {
            border: none;
            width: 32px;
            text-align: center;
            padding: 0;
        }

        .step2-items {
            display: flex;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            justify-content: space-between;
        }

        .form-group p {
            font-size: .8rem;
            font-family: sans-serif;
            color: var(--grey-text);
            margin-bottom: 0px;
        }

        .form-group label b {
            font-size: .9rem;
        }

        .custom-number-input label {
            font-weight: bold;
            font-size: .8rem;
            margin-right: 10px;
            align-self: center;
        }

        .contact-form {
            margin: 5px 15px;
            padding: 10px;
        }


        .prevBtn {
            border: none;
            background-color: #EDEDED;
            color: black;
            font-size: .8rem;
            padding: .7rem .8rem;
        }

        .nextBtn {
            border-radius: 0.375rem;
            background-color: var(--primary-color);
            border: none;
            font-size: .8rem;
            padding: .7rem .8rem;
        }

        /*------------------------ POPUP Reservation END -----------------------------*/

        /*------------------------ POPUP Reservation - Stepwizard START  -----------------------------*/
        /* Styling the steps */
        .non-clickable {
            pointer-events: none;
            /* Disable clicks */
            cursor: default;
            /* Change cursor to default (arrow) */
        }

        .stepwizard-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 20px 0;
        }

        .stepwizard-step {
            position: relative;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-grow: 1;
        }

        /* Steps buttons */
        .btn.reservation-steps {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 16px;
            z-index: 2;
        }

        /* Default (inactive) state */
        .btn.btn-default {
            background-color: #f4f4f4;
            color: #a7a7a7;
            cursor: not-allowed;
            border: none;
        }

        /* Active state */
        .btn.btn-primary {
            background-color: #c59c5b;
            /* Gold color */
            color: white;
            border: none;
        }

        /* Connecting lines */
        .step-line {
            position: absolute;
            height: 2px;
            background-color: #f4f4f4;
            top: 50%;
            left: 50%;
            transform: translateY(-50%);
            width: 100%;
            z-index: 1;
            transition: background-color 0.3s;
        }

        .stepwizard-step:last-child .step-line {
            display: none;
        }

        /* Active line */
        .step-line.line-active {
            background-color: #c59c5b;
            /* Gold color */
        }

        /*------------------------ POPUP Reservation - Stepwizard END  -----------------------------*/
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="https://preprodx1.digietab.com/">
                <?php echo $albayt_main_logo_black ?>
                <!-- <img src="../uploads/logo.png" alt="Logo" width="150" height="auto" class="logo-mobile"> -->
            </a>
            <button class="btn contact-btn contact-btn-nav-mobile" type="submit">Contact</button>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"
                aria-expanded="false" aria-label="Toggle navigation"
                style="padding-right:0px; margin-left: 0px !important; padding-left: 0px;">
                <span class="navbar-toggler-icon icons"></span>
            </button>


            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions"
                aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header" style="justify-content: space-between;">
                    <a class="" href="https://preprodx1.digietab.com/">
                        <?php echo $albayt_main_logo_white ?>
                        <!-- <img src="../uploads/logo-white.png" alt="Logo" width="150" height="auto"> -->
                    </a>
                    <div>
                        <button type="button" class="" data-bs-dismiss="offcanvas" aria-label="Close"
                            style="border: none; background-color: transparent;"><?php echo $close_x ?></button>
                    </div>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" aria-current="page" href="https://preprodx1.digietab.com/blog-3/">À PROPOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" href="https://preprodx1.digietab.com/omra/">OMRA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" href="https://preprodx1.digietab.com/hajj/">HAJJ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" href="https://preprodx1.digietab.com/blog/">BLOG</a>
                        </li>
                    </ul>

                    <a href="https://preprodx1.digietab.com/contact/" class="btn contact-btn contact-btn-sidebar">CONTACT</a>

                    <style>

                    </style>
                    <div style="width:40%; padding:20% 0%; gap:10px;display: grid; grid-template-columns: 1fr 1fr 1fr;">
                        <div class="social-offcanvas">
                            <?php echo $facebook_white ?>
                        </div>
                        <div class="social-offcanvas">
                            <?php echo $x_white ?>
                        </div>
                        <div class="social-offcanvas">
                            <?php echo $instagram_white ?>
                        </div>
                        <div class="social-offcanvas">
                            <?php echo $youtube_white ?>
                        </div>
                        <div class="social-offcanvas">
                            <?php echo $snapshat_white ?>
                        </div>
                        <div class="social-offcanvas">
                            <?php echo $tiktok_white ?>
                        </div>
                    </div>

                    <div class="bottom-links-sidebar-mobile">
                        <a href="#">Mentions légales</a>
                        <a href="#">Infos pratiques</a>
                        <a href="#">Conditions de vente</a>
                    </div>
                </div>
            </div>

            <!-- <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icons"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="https://preprodx1.digietab.com/blog-3/">À PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://preprodx1.digietab.com/omra/">OMRA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://preprodx1.digietab.com/hajj/">HAJJ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="https://preprodx1.digietab.com/blog/">BLOG</a>
                    </li>
                </ul>
                <form class="d-flex search-box" role="search">
                    <input class="form-control me-2 search-box-nav" type="search" placeholder=""
                        aria-label="Search">
                    <button class="search-icon-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <a href="https://preprodx1.digietab.com/contact/" class="btn contact-btn">Contact</a>


            </div>
        </div>
    </nav>


    <!------------------------ Autres dates START ------------------------------->
    <nav class="autres-dates-nav navbar navbar-expand-lg bg-white bg-opacity-75">
        <button class="autres-dates-btn unique-btn-autre-dates" data-bs-toggle="modal"
            data-bs-target="#autresDatesModal">
            <?php echo $left_arrow ?>
            <?php echo $autres_dates ?>Autres dates
        </button>
    </nav>
    <!----------- POPUP Autres dates START ----------------->
    <!-- Modal -->
    <?php
    // Include the database connection
    include '../db.php';

    // Get the `formule_id` from the URL
    $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Fetch the package_id and type_id for the current formule
    $formule_query = "
    SELECT package_id, type_id 
    FROM formules 
    WHERE id = $formule_id
";
    $formule_result = $conn->query($formule_query);
    $formule_data = $formule_result->fetch_assoc();

    if ($formule_data) {
        $package_id = $formule_data['package_id'];
        $type_id = $formule_data['type_id'];

        // Fetch formules with the same package_id and type_id, ensuring each is unique
        $query = "
        SELECT DISTINCT
            f.id AS formule_id, 
            f.date_depart, 
            f.date_retour, 
            f.prix_chambre_quadruple,
            f.prix_chambre_quadruple_promo,
            ca.logo            
        FROM formules f
        JOIN vols v ON f.id = v.formule_id
        JOIN compagnies_aeriennes ca ON v.compagnie_aerienne_id = ca.id
        WHERE f.package_id = $package_id AND f.type_id = $type_id
        ORDER BY f.date_depart ASC
    ";

        $result = $conn->query($query);

        // Store results in an array
        $formules = [];
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $formules[] = $row;
            }
        }
    } else {
        $formules = [];
    }
    ?>



    <div class="modal fade unique-modal-autre-dates" id="autresDatesModal" tabindex="-1"
        aria-labelledby="autresDatesModalLabel">
        <div class="modal-dialog modal-dialog-scrollable unique-dialog-autre-dates">
            <div class="modal-content unique-content-autre-dates">
                <div class="modal-header unique-header-autre-dates" style="display: block;">

                    <div style="text-align: center; margin-top:-15px;">
                        <?php echo $top_sidebar; ?>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <h5 class="modal-title unique-title-autre-dates" id="autresDatesModalLabel">Planifiez votre
                            voyage</h5>

                        <button type="button" class="btn-close unique-close-autre-dates" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                </div>
                <div class="modal-body unique-body-autre-dates">
                    <?php
                    // Array to map English day abbreviations to French
                    $dayNames = [
                        'Sun' => 'Dim',
                        'Mon' => 'Lun',
                        'Tue' => 'Mar',
                        'Wed' => 'Mer',
                        'Thu' => 'Jeu',
                        'Fri' => 'Ven',
                        'Sat' => 'Sam'
                    ];
                    ?>
                    <?php if (!empty($formules)): ?>
                        <?php foreach ($formules as $formule): ?>
                            <a style="text-decoration: none; color: inherit;" href="formule.php?id=<?= $formule['formule_id'] ?>">
                                <div class="unique-card-autre-dates">
                                    <div class="row align-items-center unique-row-autre-dates">
                                        <div class="col-6 left-info-popup">
                                            <span><b>Départ</b></span>
                                            <?php
                                            $departDay = date('D', strtotime($formule['date_depart']));
                                            ?>
                                            <span><?= $dayNames[$departDay] ?></span>
                                            <span><?= date('d/m/Y', strtotime($formule['date_depart'])) ?></span>
                                        </div>
                                        <div class="svg-popup">
                                            <?php echo $plane_path_popup ?>
                                        </div>
                                        <div class="col-6 text-end right-info-popup">
                                            <span><b>Retour</b></span>
                                            <?php
                                            $retourDay = date('D', strtotime($formule['date_retour']));
                                            ?>
                                            <span><?= $dayNames[$retourDay] ?></span>
                                            <span class="date-right-popup"><?= date('d/m/Y', strtotime($formule['date_retour'])) ?></span>
                                        </div>
                                        <div class="col-12 d-flex align-items-center bottom-info-popup">
                                            <img src="../<?= $formule['logo'] ?>" alt="compagnie logo"
                                                class="me-2">
                                            <div class="buttom-right-info-popup">
                                                <span class="price-text-popup">À partir de</span>


                                                <span class="price-number-popup">
                                                    <!-- <!?= number_format($formule['prix_chambre_quadruple'], 2, ',', ' ') ?> -->
                                                    <?php if (!empty($data['prix_chambre_quadruple_promo']) && $data['prix_chambre_quadruple_promo'] != "0.00" && $data['prix_chambre_quadruple_promo'] != $data['prix_chambre_quadruple']): ?>
                                                        <?= number_format($formule['prix_chambre_quadruple_promo'], 2, ',', ' ') ?>
                                                    <?php else: ?>
                                                        <?= number_format($formule['prix_chambre_quadruple'], 2, ',', ' ') ?>
                                                    <?php endif; ?>
                                                    €</span>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p>Aucune formule disponible pour cette combinaison.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


    <!----------- POPUP Autres dates END ----------------->
    <!------------------------ Autres dates END ------------------------------->

    <!----------- POPUP reservation START ----------------->
    <div class="modal fade" id="stepperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display: block;">
                    <?php
                    // if ($formule['statut'] == 'activé') {
                    //     echo '<h4 class="modal-title" id="exampleModalLabel"
                    //                         style="margin-top: 10px; color:#028ae1">Réservez Votre Omra</h4>';
                    // } else {
                    //     echo '<h4 class="modal-title" id="exampleModalLabel"
                    //                         style="margin-top: 10px; color:red !important;">Formule Épuisé</h4>';
                    // }
                    //
                    ?>

                    <div style=" text-align: center; margin-top:-15px;">
                        <?php echo $top_sidebar; ?>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <h6 class="modal-title">Reservation</h6>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"
                            style="border: none; background-color: transparent;"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="stepwizard">

                        <div class="stepwizard-row setup-panel" style="display: flex; justify-content: space-around;">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary non-clickable reservation-steps"
                                    data-step="1">
                                    1
                                </a>
                                <div class="step-line"></div>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default non-clickable reservation-steps"
                                    data-step="2" disabled="disabled">
                                    2
                                </a>
                                <div class="step-line"></div>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default non-clickable reservation-steps"
                                    data-step="3" disabled="disabled">
                                    3
                                </a>
                                <div class="step-line"></div>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-4" type="button" class="btn btn-default non-clickable reservation-steps"
                                    data-step="4" disabled="disabled">
                                    4
                                </a>
                            </div>
                        </div>
                    </div>

                    <form role="form">
                        <div class="setup-content" id="step-1">
                            <h6 style="margin: 20px 0px;">Qui participe à ce voyage?</h6>
                            <div style="padding: 2%;">
                                <div class="form-group first-step" style="margin-bottom: 20px;">
                                    <div><label for=""><b>ADULTES</b></label>
                                        <p>13 ans et plus</p>
                                    </div>
                                    <div class="custom-number-input">
                                        <button class="minus-btn-adults minus-btn-style" type="button">-</button>
                                        <input type="number" id="adults" value="0" min="0"
                                            class="number-input number-input-adults" required>
                                        <button class="plus-btn-adults plus-btn-style" type="button">+</button>
                                    </div>
                                </div>
                                </table>
                                <script>
                                    const minusBtnAdults = document.querySelector('.minus-btn-adults');
                                    const plusBtnAdults = document.querySelector('.plus-btn-adults');
                                    const numberInputAdults = document.querySelector('.number-input-adults');

                                    minusBtnAdults.addEventListener('click', () => {
                                        let currentValue = parseInt(numberInputAdults.value);
                                        if (currentValue > parseInt(numberInputAdults.min)) {
                                            numberInputAdults.value = currentValue - 1;
                                        }
                                    });

                                    plusBtnAdults.addEventListener('click', () => {
                                        let currentValue = parseInt(numberInputAdults.value);
                                        numberInputAdults.value = currentValue + 1;
                                    });
                                </script>
                                <div class="form-group first-step" style="margin-bottom: 20px;">
                                    <div><label for=""><b>ENFANTS</b></label>
                                        <p>De 2 à 12 ans</p>
                                    </div>
                                    <div class="custom-number-input">
                                        <button class="minus-btn-children minus-btn-style" type="button">-</button>
                                        <input type="number" id="children" value="0" min="0"
                                            class="number-input number-input-children" required>
                                        <button class="plus-btn-children plus-btn-style" type="button">
                                            +
                                        </button>
                                    </div>
                                </div>
                                <script>
                                    const minusBtnChildre = document.querySelector('.minus-btn-children');
                                    const plusBtnChildren = document.querySelector('.plus-btn-children');
                                    const numberInputChildren = document.querySelector('.number-input-children');

                                    minusBtnChildre.addEventListener('click', () => {
                                        let currentValue = parseInt(numberInputChildren.value);
                                        if (currentValue > parseInt(numberInputChildren.min)) {
                                            numberInputChildren.value = currentValue - 1;
                                        }
                                    });

                                    plusBtnChildren.addEventListener('click', () => {
                                        let currentValue = parseInt(numberInputChildren.value);
                                        numberInputChildren.value = currentValue + 1;
                                    });
                                </script>

                                <div class="form-group first-step">
                                    <div><label for=""><b>BÉBÉ</b></label>
                                        <p>- de 2 ans</p>
                                    </div>
                                    <div class="custom-number-input">
                                        <button class="minus-btn-babies minus-btn-style" type="button">-</button>
                                        <input type="number" id="babies" value="0" min="0"
                                            class="number-input number-input-babies" required>
                                        <button class="plus-btn-babies plus-btn-style" type="button">+</button>
                                    </div>
                                </div>

                                <script>
                                    const minusBtn = document.querySelector('.minus-btn-babies');
                                    const plusBtn = document.querySelector('.plus-btn-babies');
                                    const numberInput = document.querySelector('.number-input-babies');

                                    minusBtn.addEventListener('click', () => {
                                        let currentValue = parseInt(numberInput.value);
                                        if (currentValue > parseInt(numberInput.min)) {
                                            numberInput.value = currentValue - 1;
                                        }
                                    });

                                    plusBtn.addEventListener('click', () => {
                                        let currentValue = parseInt(numberInput.value);
                                        numberInput.value = currentValue + 1;
                                    });
                                </script>
                                <?php
                                // if ($formule['statut'] == 'activé') {
                                //     echo '<button class="btn btn-primary nextBtn" type="button" style="border-radius: 0.375rem; margin-top:20px !important; display: block;">Suivant</button>';
                                // } else {
                                //     echo '<button class="btn btn-primary nextBtn" type="button" style="border-radius: 0.375rem; margin-top:20px !important; display: block; background-color:#dac392; border:none;" disabled>Suivant</button>';
                                // }
                                //
                                ?>
                                <div style="display: flex; justify-content: end; margin-top: 30px;">
                                    <button class="btn btn-primary nextBtn next-btn" type="button">SUIVANT</button>

                                </div>
                            </div>
                        </div>

                        <div class="setup-content" id="step-2" style="display: none;">
                            <h6 style="margin: 20px 0px;">Type d'hébergement</h6>
                            <p id="passenger-count"></p>
                            <!-- <div class="form-group">
                                                        <label for="quadruple">Chambres Quadruples :</label>
                                                        <input type="number" class="form-control room-input" id="quadruple"
                                                            min="0" required>
                                                    </div> -->




                            <div style="padding: 2%;">
                                <div class="form-group">
                                    <label for=""><b>QUADRUPLE</b></label>
                                    <div class="custom-number-input step2-items">
                                        <button class="minus-btn-quadruple minus-btn-style" type="button">
                                            -
                                        </button>
                                        <input type="number" id="quadruple" value="0" min="0"
                                            class="number-input form-control room-input number-input-quadruple"
                                            required>
                                        <label>/Personne</label>
                                        <button class="plus-btn-quadruple plus-btn-style" type="button">
                                            +
                                        </button>
                                    </div>
                                </div>

                                <script>
                                    const minusBtnQuadruple = document.querySelector('.minus-btn-quadruple');
                                    const plusBtnQuadruple = document.querySelector('.plus-btn-quadruple');
                                    const numberInputQuadruple = document.querySelector('.number-input-quadruple');

                                    minusBtnQuadruple.addEventListener('click', () => {
                                        let currentValue = Number(numberInputQuadruple.value);
                                        if (currentValue > Number(numberInputQuadruple.min)) {
                                            numberInputQuadruple.value = currentValue - 1;
                                            numberInputQuadruple.dispatchEvent(new Event('change')); // Trigger change event
                                        }
                                    });

                                    plusBtnQuadruple.addEventListener('click', () => {
                                        let currentValue = Number(numberInputQuadruple.value);
                                        numberInputQuadruple.value = currentValue + 1;
                                        numberInputQuadruple.dispatchEvent(new Event('change')); // Trigger change event
                                    });

                                    // Similar logic for the triple, double, and single rooms
                                </script>




                                <!-- <div class="form-group">
                                                        <label for="triple">Chambres Triples :</label>
                                                        <input type="number" class="form-control room-input" id="triple"
                                                            min="0">
                                                    </div> -->

                                <div class="form-group">

                                    <label for=""><b>TRIPLE</b></label>

                                    <div class="custom-number-input step2-items">
                                        <button class="minus-btn-triple minus-btn-style" type="button">
                                            -
                                        </button>
                                        <input type="number" id="triple" value="0" min="0"
                                            class="number-input form-control room-input number-input-triple" required>
                                        <label>/Personne</label>
                                        <button class="plus-btn-triple plus-btn-style" type="button">
                                            +
                                        </button>
                                    </div>

                                </div>

                                <script>
                                    const minusBtnTriple = document.querySelector('.minus-btn-triple');
                                    const plusBtnTriple = document.querySelector('.plus-btn-triple');
                                    const numberInputTriple = document.querySelector('.number-input-triple');

                                    minusBtnTriple.addEventListener('click', () => {
                                        let currentValue = Number(numberInputTriple.value);
                                        if (currentValue > Number(numberInputTriple.min)) {
                                            numberInputTriple.value = currentValue - 1;
                                            numberInputTriple.dispatchEvent(new Event('change'));
                                        }
                                    });

                                    plusBtnTriple.addEventListener('click', () => {
                                        let currentValue = Number(numberInputTriple.value);
                                        numberInputTriple.value = currentValue + 1;
                                        numberInputTriple.dispatchEvent(new Event('change'));
                                    });
                                </script>
                                <!-- <div class="form-group">
                                                        <label for="double">Chambres Doubles :</label>
                                                        <input type="number" class="form-control room-input" id="double"
                                                            min="0">
                                                    </div> -->

                                <div class="form-group">

                                    <label for=""><b>DOUBLE</b></label>

                                    <div class="custom-number-input step2-items">
                                        <button class="minus-btn-double minus-btn-style" type="button">
                                            -
                                        </button>
                                        <input type="number" id="double" value="0" min="0"
                                            class="number-input form-control room-input number-input-double" required>
                                        <label>/Personne</label>
                                        <button class="plus-btn-double plus-btn-style" type="button">
                                            +
                                        </button>
                                    </div>

                                </div>

                                <script>
                                    const minusBtnDouble = document.querySelector('.minus-btn-double');
                                    const plusBtnDouble = document.querySelector('.plus-btn-double');
                                    const numberInputDouble = document.querySelector('.number-input-double');

                                    minusBtnDouble.addEventListener('click', () => {
                                        let currentValue = Number(numberInputDouble.value);
                                        if (currentValue > Number(numberInputDouble.min)) {
                                            numberInputDouble.value = currentValue - 1;
                                            numberInputDouble.dispatchEvent(new Event('change'));
                                        }
                                    });

                                    plusBtnDouble.addEventListener('click', () => {
                                        let currentValue = Number(numberInputDouble.value);
                                        numberInputDouble.value = currentValue + 1;
                                        numberInputDouble.dispatchEvent(new Event('change'));
                                    });
                                </script>


                                <!-- <div class="form-group">
                                                        <label for="single">Chambres Simples :</label>
                                                        <input type="number" class="form-control room-input" id="single"
                                                            min="0">
                                                    </div> -->

                                <div class="form-group" style="display: flex; justify-content: space-between;">

                                    <div><label for=""><b>INDIVIDUEL</b></label></div>

                                    <div class="custom-number-input step2-items" style="display: flex;">
                                        <button class="minus-btn-single minus-btn-style" type="button">
                                            -
                                        </button>
                                        <input type="number" id="single" value="0" min="0"
                                            class="number-input form-control room-input number-input-single" required>
                                        <label>/Personne</label>
                                        <button class="plus-btn-single plus-btn-style" type="button">
                                            +
                                        </button>
                                    </div>
                                </div>


                                <script>
                                    const minusBtnSingle = document.querySelector('.minus-btn-single');
                                    const plusBtnSingle = document.querySelector('.plus-btn-single');
                                    const numberInputSingle = document.querySelector('.number-input-single');

                                    minusBtnSingle.addEventListener('click', () => {
                                        let currentValue = Number(numberInputSingle.value);
                                        if (currentValue > Number(numberInputSingle.min)) {
                                            numberInputSingle.value = currentValue - 1;
                                            numberInputSingle.dispatchEvent(new Event('change'));
                                        }
                                    });

                                    plusBtnSingle.addEventListener('click', () => {
                                        let currentValue = Number(numberInputSingle.value);
                                        numberInputSingle.value = currentValue + 1;
                                        numberInputSingle.dispatchEvent(new Event('change'));
                                    });
                                </script>


                                <div id="error-message" class="text-danger"></div>
                                <div style="display:flex; justify-content: space-between; margin-top:30px;">
                                    <button class="btn btn-secondary prevBtn prev-btn" type="button">PRÉCÉDENT</button>

                                    <button class="btn btn-primary nextBtn next-btn" type="button">SUIVANT</button>
                                </div>
                            </div>
                        </div>

                        <?php
                        // Include the database connection
                        include '../db.php';

                        $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0; // Get formule_id from the URL

                        // SQL query
                        $query = "
                        SELECT 
                            f.date_depart,
                            f.date_retour,
                            f.duree_sejour,
                            (SELECT heure_depart FROM vols WHERE formule_id = f.id ORDER BY heure_depart ASC LIMIT 1) AS first_heure_depart,
                            (SELECT heure_arrivee FROM vols WHERE formule_id = f.id ORDER BY heure_depart ASC LIMIT 1) AS first_heure_arrivee,
                            (SELECT heure_depart FROM vols WHERE formule_id = f.id ORDER BY heure_depart DESC LIMIT 1) AS last_heure_depart,
                            (SELECT heure_arrivee FROM vols WHERE formule_id = f.id ORDER BY heure_depart DESC LIMIT 1) AS last_heure_arrivee
                        FROM 
                            formules f
                        WHERE 
                            f.id = $formule_id
";

                        // Execute the query
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            $data = $result->fetch_assoc();

                            // Assign data from the query to variables
                            $duree_sejour = $data['duree_sejour'] ?? null;
                            $first_heure_depart = $data['first_heure_depart'] ?? null;
                            $first_heure_arrivee = $data['first_heure_arrivee'] ?? null;
                            $last_heure_depart = $data['last_heure_depart'] ?? null;
                            $last_heure_arrivee = $data['last_heure_arrivee'] ?? null;

                            // Day name mapping for French
                            $dayNames = [
                                'Sun' => 'Dim',
                                'Mon' => 'Lun',
                                'Tue' => 'Mar',
                                'Wed' => 'Mer',
                                'Thu' => 'Jeu',
                                'Fri' => 'Ven',
                                'Sat' => 'Sam'
                            ];

                            // Function to format the date and time into separate variables
                            function extractDateTimeParts($datetime, $dayNames)
                            {
                                if (!$datetime) return null;
                                $dt = new DateTime($datetime);
                                $dayEnglish = $dt->format('D'); // Get the English day abbreviation
                                $dayFrench = isset($dayNames[$dayEnglish]) ? $dayNames[$dayEnglish] : $dayEnglish;
                                $date = $dt->format('d/m/Y'); // Format the date
                                $time = $dt->format('H\hi'); // Format the time in 24-hour notation with "h"
                                return [
                                    'day' => $dayFrench,
                                    'date' => $date,
                                    'hour' => $time
                                ];
                            }

                            // Assign data to variables and extract parts
                            $first_heure_depart_parts = $first_heure_depart ? extractDateTimeParts($first_heure_depart, $dayNames) : null;
                            $first_heure_arrivee_parts = $first_heure_arrivee ? extractDateTimeParts($first_heure_arrivee, $dayNames) : null;
                            $last_heure_depart_parts = $last_heure_depart ? extractDateTimeParts($last_heure_depart, $dayNames) : null;
                            $last_heure_arrivee_parts = $last_heure_arrivee ? extractDateTimeParts($last_heure_arrivee, $dayNames) : null;

                            // Access variables
                            $first_day = $first_heure_depart_parts['day'] ?? '';
                            $first_date = $first_heure_depart_parts['date'] ?? '';
                            $first_hour = $first_heure_depart_parts['hour'] ?? '';

                            $first_arrival_day = $first_heure_arrivee_parts['day'] ?? '';
                            $first_arrival_date = $first_heure_arrivee_parts['date'] ?? '';
                            $first_arrival_hour = $first_heure_arrivee_parts['hour'] ?? '';

                            $last_day = $last_heure_depart_parts['day'] ?? '';
                            $last_date = $last_heure_depart_parts['date'] ?? '';
                            $last_hour = $last_heure_depart_parts['hour'] ?? '';

                            $last_arrival_day = $last_heure_arrivee_parts['day'] ?? '';
                            $last_arrival_date = $last_heure_arrivee_parts['date'] ?? '';
                            $last_arrival_hour = $last_heure_arrivee_parts['hour'] ?? '';

                            // Display individual parts for debugging
                            // echo "First Heure Depart: Day: $first_day, Date: $first_date, Hour: $first_hour<br>";
                            // echo "First Heure Arrivee: Day: $first_arrival_day, Date: $first_arrival_date, Hour: $first_arrival_hour<br>";
                            // echo "Last Heure Depart: Day: $last_day, Date: $last_date, Hour: $last_hour<br>";
                            // echo "Last Heure Arrivee: Day: $last_arrival_day, Date: $last_arrival_date, Hour: $last_arrival_hour<br>";
                        } else {
                            echo "No data found for formule_id: $formule_id";
                        }
                        ?>

                        <div class="setup-content" id="step-3" style="display: block; font-family: sans-serif;">
                            <h6 style="margin: 20px 0px;">Les détails de votre réservation</h6>
                            <div style="padding:2%;">

                                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 10px;">

                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $landing_plane; ?>
                                        </div>
                                        <div class="text">
                                            <h4>Arrivée</h4>
                                            <p><?php echo $first_day ?></p>
                                            <p><?php echo $first_date ?></p>
                                        </div>
                                    </div>
                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $Ville_de_départ; ?>
                                        </div>
                                        <div class="text">
                                            <h4>Départ</h4>
                                            <p><?php echo $last_arrival_day ?></p>
                                            <p><?php echo $last_arrival_date ?></p>
                                        </div>
                                    </div>
                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $time_brown; ?>
                                        </div>
                                        <div class="text">
                                            <h4><?php echo $first_hour ?> - <?php echo $first_arrival_hour ?></h4>
                                        </div>
                                    </div>
                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $time_brown; ?>
                                        </div>
                                        <div class="text">
                                            <h4><?php echo $last_hour ?> - <?php echo $last_arrival_hour ?></h4>
                                        </div>
                                    </div>
                                </div>
                                <div class="formula-item" style="align-items:baseline;">
                                    <div class="icon-container">
                                        <?php echo $Arrivée; ?>
                                    </div>
                                    <div class="text">
                                        <h4>Durée totale du séjour</h4>
                                        <p><?php echo $duree_sejour ?> Jours</p>
                                    </div>
                                </div>
                            </div>
                            <div style="display: flex; justify-content: center;">
                                <hr style="width:90%; color:#cacaca; height:1px; opacity: 1;">
                            </div>

                            <h6 style="margin-left:5%;"><b>Vous avez sélectionné</b></h>
                                <p id="total-reservation">Total de la réservation : Calcul en cours...</p>
                                <!-- <div style="display: grid; grid-template-columns: 2fr 1fr;">
                                    <div>
                                        <h6 style="font-weight:400;">Économies réalisées</h6>
                                        <p style="text-align: left; font-size:.8rem;">Vous béneficiez d’un tarid réduit proposé par l'etablisement</p>
                                    </div>
                                    <div style="text-align: end; align-self: center;">
                                        <h6 style="font-weight:400; font-size:.9rem">EUR 186,915</h6>
                                    </div>
                                </div> -->
                                <button class="btn btn-secondary prevBtn prev-btn" type="button"
                                    style="border:none; background-color:transparent; color:black; padding:5px; font-size:.7rem; font-weight:bold; margin:10px 0px 10px 0px;"><u>Modifier
                                        la sélection</u></button>
                                <div style="display:flex; justify-content: space-between; margin-top:30px;">
                                    <button class="btn btn-secondary prevBtn prev-btn" type="button">PRÉCÉDENT</button>
                                    <button class="btn btn-primary nextBtn next-btn" type="button">SUIVANT</button>
                                </div>
                        </div>


                        <div class="setup-content" id="step-4" style="display: none;">
                            <h6 style="margin: 20px 0px;">Details</h6>
                            <div style="padding:2%;">

                                <div class="form-group">
                                    <!-- <label for="fullName">Prénom et Nom *:</label> -->
                                    <input type="text" class="form-control contact-form" id="fullName"
                                        placeholder="Nom & Prénom*"
                                        style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;"
                                        required>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="address">Adresse *:</label> -->
                                    <input type="text" class="form-control contact-form" id="address"
                                        placeholder="Adresse*"
                                        style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;"
                                        required>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="phoneNumber">Numéro de téléphone *:</label> -->
                                    <div class="input-group">
                                        <!-- <div class="input-group-prepend">
                                        <button class="btn btn-outline-secondary dropdown-toggle"
                                            type="button" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <span class="flag-icon flag-icon-fr"></span> +33
                                        </button>
                                        <div class="dropdown-menu">
                                        </div>
                                    </div> -->
                                        <input type="tel" class="form-control contact-form" id="phoneNumber"
                                            placeholder="Numéro de téléphone*"
                                            style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;"
                                            required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="email">E-mail *:</label> -->
                                    <input type="email" class="form-control contact-form" id="email"
                                        placeholder="E-mail*"
                                        style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;"
                                        required>
                                </div>

                                <div id="error-message-step5" class="text-danger"></div>
                                <div style="display:flex; justify-content: space-between; margin:30px 15px 0px 15px;">
                                    <button class="btn btn-secondary prevBtn prev-btn" type="button">PRÉCÉDENT</button>
                                    <button class="btn btn-primary nextBtn next-btn" type="button">SOUMETTRE</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

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
    include "../db.php";
    $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // SQL query to fetch pricing data
    $query = "
    SELECT 
        prix_chambre_quadruple,
        prix_chambre_triple,
        prix_chambre_double,
        prix_chambre_single,
        prix_chambre_quadruple_promo,
        prix_chambre_triple_promo,
        prix_chambre_double_promo,
        prix_chambre_single_promo,
        prix_bebe,
        child_discount
    FROM formules
    WHERE id = $formule_id;
    ";

    $result = $conn->query($query);

    // Check if data exists and fetch it
    if ($result->num_rows > 0) {
        $formule_data = $result->fetch_assoc();
    } else {
        $formule_data = []; // Empty array if no data found
    }

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
        $(document).ready(function() {
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
            navListItems.click(function(e) {
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
            allNextBtn.click(function() {
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
                    // recapReservation += '<strong></strong><br style="display:block;">';
                    // if (quadrupleRooms > 0) {
                    //     recapReservation += '- Chambre Quadruple: ' + prixQuadruple.toFixed(2) + ' € x ' + quadrupleRooms + '<br style="display:block;">';
                    // }
                    // if (tripleRooms > 0) {
                    //     recapReservation += '- Chambre Triple: ' + prixTriple.toFixed(2) + ' € x ' + tripleRooms + '<br style="display:block;">';
                    // }
                    // if (doubleRooms > 0) {
                    //     recapReservation += '- Chambre Double: ' + prixDouble.toFixed(2) + ' € x ' + doubleRooms + '<br style="display:block;">';
                    // }
                    // if (singleRooms > 0) {
                    //     recapReservation += '- Chambre Simple: ' + prixSingle.toFixed(2) + ' € x ' + singleRooms + '<br style="display:block;">';
                    // }
                    // recapReservation += '<button class="btn btn-secondary prevBtn" type="button" style="border:none; background-color:transparent; color:black; padding:5px; font-size:.7rem; font-weight:bold; margin:10px 0px 10px 0px;"><u>Modifier la sélection</u></button>';
                    if (quadrupleRooms > 0) {
                        recapReservation += quadrupleRooms + ' x Chambre Quadruple <br style="display:block;">';
                    }
                    if (tripleRooms > 0) {
                        recapReservation += tripleRooms + ' x Chambre Triple <br style="display:block;">';
                    }
                    if (doubleRooms > 0) {
                        recapReservation += doubleRooms + ' x Chambre Double <br style="display:block;">';
                    }
                    if (singleRooms > 0) {
                        recapReservation += singleRooms + ' x Chambre Simple <br style="display:block;">';
                    }



                    recapReservation += '<br style="display:block;">';



                    if (recapExtras !== '') {
                        recapReservation += '<strong>Extras :</strong><br style="display:block;">';
                        recapReservation += recapExtras;
                        // recapReservation += '<br style="display:block;">';
                    }

                    if (babiesCount > 0) {
                        // recapReservation += '<strong></strong><br style="display:block;">';
                        recapReservation += '- Frais bébé: ' + fraisBebe.toFixed(2) + ' € x ' + babiesCount + '<br style="display:block;">';
                        // recapReservation += '<br style="display:block;">';
                    }

                    // recapReservation += '<strong></strong><br style="display:block;">';
                    // recapReservation += '- Total des chambres : ' + totalChambres.toFixed(2) + ' €<br style="display:block;">';
                    // recapReservation += '- Total frais bébé : ' + totalFraisBebe.toFixed(2) + ' €<br style="display:block;">';
                    recapReservation += '- Réduction enfants : -' + discountEnfants.toFixed(2) + ' €<br style="display:block;"><br style="display:block;">';


                    recapReservation += '<div style="display: grid; grid-template-columns: 2fr 1fr;">';
                    recapReservation += '    <div>';
                    recapReservation += '        <h6 style="font-weight:400;">Économies réalisées</h6>';
                    recapReservation += '        <p style="text-align: left; font-size:.8rem;">Vous bénéficiez d’un tarif réduit proposé par l\'établissement</p>';
                    recapReservation += '    </div>';
                    recapReservation += '    <div style="text-align: end; align-self: center;">';
                    recapReservation += '        <h6 style="font-weight:400; font-size:.9rem">EUR 186,915</h6>';
                    recapReservation += '    </div>';
                    recapReservation += '</div>';


                    // recapReservation += '<strong>Total à payer :</strong><br style="display:block;">';
                    // recapReservation += '<h3>' + totalReservation.toFixed(2) + ' €</h3>';
                    recapReservation += '        <div style="margin:10px 0px">';
                    recapReservation += '<div style="display: grid; grid-template-columns: 1fr 1fr;">';
                    recapReservation += '    <div>';
                    recapReservation += '        <h5 style="font-weight:bold;">Montant</h5>';

                    recapReservation += '    </div>';
                    recapReservation += '    <div style="text-align: end; align-self: center;">';
                    recapReservation += '        <h5 style="font-weight:bold; font-size:.9rem">EUR ' + totalReservation.toFixed(2) + '</h5>';
                    recapReservation += '    </div>';
                    recapReservation += '</div>';
                    recapReservation += '        <p style="text-align: left; font-size:.8rem;">Des frais supplémentaires peuvent s\'appliquer<br>Dans la devise de l\'établissement: 205,17</p>';
                    recapReservation += '        </div>';



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

                /** */
                <?php
                // Include the database connection
                include '../db.php';

                // Get the `formule_id` from the URL
                $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                // Check if a valid ID is provided
                if ($formule_id > 0) {
                    // Prepare the SQL query
                    $query = "
        SELECT 
            cp.nom AS category_parent_nom,
            op.nom AS omra_packages_nom,
            f.date_depart,
            f.date_retour,
            f.duree_sejour,
            tf.nom AS type_formule_nom,
            COALESCE(h1.nombre_nuit, 'Not available') AS nombre_nuit_ville_19,
            COALESCE(h2.nombre_nuit, 'Not available') AS nombre_nuit_ville_18,
            COALESCE(ht1.nom, 'Not available') AS hotel_nom_ville_19,
            COALESCE(ht2.nom, 'Not available') AS hotel_nom_ville_18
        FROM formules f
        LEFT JOIN omra_packages op ON f.package_id = op.id
        LEFT JOIN category_parent cp ON op.category_parent_id = cp.id
        LEFT JOIN type_formule_omra tf ON f.type_id = tf.id
        LEFT JOIN hebergements h1 
            ON h1.formule_id = f.id AND h1.hotel_id IN (
                SELECT id FROM hotels WHERE ville = 19
            )
        LEFT JOIN hotels ht1 ON h1.hotel_id = ht1.id
        LEFT JOIN hebergements h2 
            ON h2.formule_id = f.id AND h2.hotel_id IN (
                SELECT id FROM hotels WHERE ville = 18
            )
        LEFT JOIN hotels ht2 ON h2.hotel_id = ht2.id
        WHERE f.id = ?
        LIMIT 1
    ";

                    // Use a prepared statement to execute the query
                    $stmt = $conn->prepare($query);
                    $stmt->bind_param("i", $formule_id);
                    $stmt->execute();
                    $result = $stmt->get_result();

                    // Check if a result is returned
                    if ($result->num_rows > 0) {
                        $data = $result->fetch_assoc();

                        // Assign the variables, ensuring "Not available" is used for null values
                        $category_parent_nom = $data['category_parent_nom'] ?? "Not available";
                        $omra_packages_nom = $data['omra_packages_nom'] ?? "Not available";
                        $date_depart = $data['date_depart'] ?? "Not available";
                        $date_retour = $data['date_retour'] ?? "Not available";
                        $duree_sejour = $data['duree_sejour'] ?? "Not available";
                        $type_formule_nom = $data['type_formule_nom'] ?? "Not available";
                        $nombre_nuit_ville_19 = $data['nombre_nuit_ville_19'];
                        $nombre_nuit_ville_18 = $data['nombre_nuit_ville_18'];
                        $hotel_nom_ville_19 = $data['hotel_nom_ville_19'];
                        $hotel_nom_ville_18 = $data['hotel_nom_ville_18'];
                    } else {
                        echo "No data found for the given formule ID.";
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                    echo "Invalid ID provided.";
                }

                // Close the database connection
                $conn->close();
                ?>
                /** */

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
                        packageName: "<?php echo $category_parent_nom; ?>",
                        formulaName: "<?php echo $type_formule_nom ?>",
                        departureDate: "<?php echo (new DateTime($date_depart))->format('d-m-Y'); ?>",
                        // packageName: "<!?php echo $nom_package; ?>",
                        // formulaName: "<!?php echo $nom_type_formule; ?>",
                        // departureDate: "<!?php echo $formattedDate; ?>",
                    };



                    // Envoyer les données via AJAX
                    $.ajax({
                        url: '../submit_reservation.php',
                        type: 'POST',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        success: function(response) {
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
                        error: function(xhr, status, error) {
                            console.error("Erreur AJAX :", xhr.responseText);
                            $('#error-message-step5').text("Erreur lors de l'envoi de la réservation. Veuillez contacter l'administrateur du site. (Détails : " + error + ")");
                        }
                    });

                    $.ajax({
                        url: '../send_email.php', // Script PHP pour l'envoi d'email
                        type: 'POST',
                        data: JSON.stringify(formData), // Les mêmes données que celles envoyées précédemment
                        contentType: 'application/json',
                        success: function(emailResponse) {
                            console.log('Email envoyé avec succès :', emailResponse);
                            // Optionnel : Réinitialiser le formulaire ou fermer la modal
                            // $('#stepperModal').modal('hide');
                            // goToStep(1);
                        },
                        error: function(xhr, status, error) {
                            console.error("Erreur lors de l'envoi de l'email :", xhr.responseText);
                            // Gérer l'erreur d'envoi d'email si nécessaire
                        }
                    });
                    $.ajax({
                        url: '../send_mailclient.php',
                        type: 'POST',
                        data: JSON.stringify(formData),
                        contentType: 'application/json',
                        success: function(response) {
                            console.log('Réponse du serveur :', response);

                            if (response.success) {
                                console.log('Email envoyé avec succès au client :', response.clientEmail);
                                // Optionnel : Réinitialiser le formulaire, fermer la modal, etc.
                            } else {
                                console.error('Erreur lors de l\'envoi de l\'email au client :', response.error);
                                // Gérer l'erreur d'envoi d'email (afficher un message à l'utilisateur, etc.)
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Erreur AJAX lors de l\'envoi de l\'email au client :', xhr.responseText);
                            // Gérer l'erreur AJAX (problème de réseau, etc.)
                        }
                    });

                }

            });

            // Gestion du clic sur le bouton "Précédent"
            allPrevBtn.click(function() {
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
            $('.room-input').on('change', function() {
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
        dropdownMenu.on('click', '.dropdown-item', function(e) {
            e.preventDefault();
            var countryCode = $(this).data('country');
            var countryDialCode = countryCodes[countryCode];
            $(this).closest('.input-group').find('.dropdown-toggle').html('<span class="flag-icon flag-icon-' + countryCode + '"></span> ' + countryDialCode);
        });
    </script>
    <!----------- POPUP reservation END ----------------->


    <div class="container mt-3">
        <div class="content first-bolck">
            <div class="main-block">
                <div class="position-relative">
                    <!-- Main Display Image -->
                    <img src="../uploads/1.jpg" id="mainImage" class="main-image" alt="Main Display Image">
                    <!-- Logo -->
                    <img src="../<?php echo $comp_logo["logo"] ?>" alt="Logo" class="logo">
                </div>

                <!-- Thumbnails Carousel -->
                <div class="thumbnail-carousel-container">
                    <button class="carousel-control prev" onclick="slideThumbnails(-1)">&#10094;</button>
                    <div class="thumbnail-carousel">
                        <!-- Thumbnail Images -->
                        <div class="thumbnail" onclick="changeImage('../uploads/1.jpg')">
                            <img src="../uploads/1.jpg" alt="Thumbnail 1">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/2.jpg')">
                            <img src="../uploads/2.jpg" alt="Thumbnail 2">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/3.jpg')">
                            <img src="../uploads/3.jpg" alt="Thumbnail 3">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/4.jpg')">
                            <img src="../uploads/4.jpg" alt="Thumbnail 4">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/5.jpg')">
                            <img src="../uploads/5.jpg" alt="Thumbnail 5">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/6.jpg')">
                            <img src="../uploads/6.jpg" alt="Thumbnail 6">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/7.jpg')">
                            <img src="../uploads/7.jpg" alt="Thumbnail 7">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/blog-4.jpg')">
                            <img src="../uploads/blog-4.jpg" alt="Thumbnail 8">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/9.jpg')">
                            <img src="../uploads/9.jpg" alt="Thumbnail 9">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/10.jpg')">
                            <img src="../uploads/10.jpg" alt="Thumbnail 10">
                        </div>
                    </div>
                    <button class="carousel-control next" onclick="slideThumbnails(1)">&#10095;</button>
                </div>
            </div>
        </div>



        <!-- Sticky Sidebar Start -->
        <?php
        // Include the database connection
        include '../db.php';

        // Get the `formule_id` from the URL
        $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

        // Check if a valid ID is provided
        if ($formule_id > 0) {
            // Prepare the SQL query
            $query = "
        SELECT 
            cp.nom AS category_parent_nom,
            op.nom AS omra_packages_nom,
            f.date_depart,
            f.date_retour,
            f.duree_sejour,
            tf.nom AS type_formule_nom,
            COALESCE(h1.nombre_nuit, 'Not available') AS nombre_nuit_ville_19,
            COALESCE(h2.nombre_nuit, 'Not available') AS nombre_nuit_ville_18,
            COALESCE(ht1.nom, 'Not available') AS hotel_nom_ville_19,
            COALESCE(ht2.nom, 'Not available') AS hotel_nom_ville_18
        FROM formules f
        LEFT JOIN omra_packages op ON f.package_id = op.id
        LEFT JOIN category_parent cp ON op.category_parent_id = cp.id
        LEFT JOIN type_formule_omra tf ON f.type_id = tf.id
        LEFT JOIN hebergements h1 
            ON h1.formule_id = f.id AND h1.hotel_id IN (
                SELECT id FROM hotels WHERE ville = 19
            )
        LEFT JOIN hotels ht1 ON h1.hotel_id = ht1.id
        LEFT JOIN hebergements h2 
            ON h2.formule_id = f.id AND h2.hotel_id IN (
                SELECT id FROM hotels WHERE ville = 18
            )
        LEFT JOIN hotels ht2 ON h2.hotel_id = ht2.id
        WHERE f.id = ?
        LIMIT 1
    ";

            // Use a prepared statement to execute the query
            $stmt = $conn->prepare($query);
            $stmt->bind_param("i", $formule_id);
            $stmt->execute();
            $result = $stmt->get_result();

            // Check if a result is returned
            if ($result->num_rows > 0) {
                $data = $result->fetch_assoc();

                // Assign the variables, ensuring "Not available" is used for null values
                $category_parent_nom = $data['category_parent_nom'] ?? "Not available";
                $omra_packages_nom = $data['omra_packages_nom'] ?? "Not available";
                $date_depart = $data['date_depart'] ?? "Not available";
                $date_retour = $data['date_retour'] ?? "Not available";
                $duree_sejour = $data['duree_sejour'] ?? "Not available";
                $type_formule_nom = $data['type_formule_nom'] ?? "Not available";
                $nombre_nuit_ville_19 = $data['nombre_nuit_ville_19'];
                $nombre_nuit_ville_18 = $data['nombre_nuit_ville_18'];
                $hotel_nom_ville_19 = $data['hotel_nom_ville_19'];
                $hotel_nom_ville_18 = $data['hotel_nom_ville_18'];
            } else {
                echo "No data found for the given formule ID.";
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Invalid ID provided.";
        }

        // Close the database connection
        $conn->close();
        ?>



        <div class="sticky-sidebar">
            <div class="top-sidebar">
                <div class="icon-container">
                    <?php echo $top_sidebar; ?>
                </div>
            </div>
            <div class="formula">
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Type_de_Voyage; ?>
                    </div>

                    <div class="text">
                        <h4>Type de Voyage</h4>
                        <p><?php echo $category_parent_nom; ?></p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Ville_de_départ; ?>
                    </div>
                    <div class="text">
                        <h4>Ville de départ</h4>
                        <p><?php echo $omra_packages_nom ?></p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Arrivée; ?>
                    </div>
                    <div class="text">
                        <h4>Arrivée</h4>
                        <p><?php echo (new DateTime($date_depart))->format('d-m-Y'); ?></p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Départ; ?>
                    </div>
                    <div class="text">
                        <h4>Départ</h4>
                        <p><?php echo (new DateTime($date_retour))->format('d-m-Y'); ?></p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Formule; ?>
                    </div>
                    <div class="text">
                        <h4>Formule</h4>
                        <p><?php echo $type_formule_nom ?></p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Durée; ?>
                    </div>
                    <div class="text">
                        <h4>Durée</h4>
                        <p><?php echo $duree_sejour ?> jours</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Médine; ?>
                    </div>
                    <div class="text">
                        <p><?php echo $nombre_nuit_ville_19 ?> nuits à Médina</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Makkah; ?>
                    </div>
                    <div class="text">
                        <p><?php echo $nombre_nuit_ville_18; ?> nuits à Makkah</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Hébergements_Madinah; ?>
                    </div>
                    <div class="text">
                        <h4>Hébergement (Madinah)</h4>
                        <p><?php echo $hotel_nom_ville_19 ?></p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Hébergement_Makkah; ?>
                    </div>
                    <div class="text">
                        <h4>Hébergement (Makkah)</h4>
                        <p><?php echo $hotel_nom_ville_18 ?></p>
                    </div>
                </div>
            </div>



            <button class="cta-button">
                <div class="icon-arrow">
                    <?php echo $up_arrow; ?>
                </div>VOIR NOS TARIFS D'HÉBERGEMENTS
            </button>

            <!-- Pricing table START -->
            <?php
            include '../db.php'; // Include your database connection file

            // Get the formule_id from the URL
            $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            if ($formule_id > 0) {
                // Query to fetch pricing details
                $query = "SELECT 
                statut,
                prix_chambre_quadruple, 
                prix_chambre_triple, 
                prix_chambre_double, 
                prix_chambre_single, 
                prix_bebe,
                child_discount,
                prix_chambre_quadruple_promo,
                prix_chambre_triple_promo,
                prix_chambre_double_promo,
                prix_chambre_single_promo
              FROM formules 
              WHERE id = ?";

                $stmt = $conn->prepare($query);
                $stmt->bind_param("i", $formule_id);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    $data = $result->fetch_assoc();

                    // Assign fetched values to variables
                    $statut = $data['statut'];
                    $prix_chambre_quadruple = $data['prix_chambre_quadruple'];
                    $prix_chambre_triple = $data['prix_chambre_triple'];
                    $prix_chambre_double = $data['prix_chambre_double'];
                    $prix_chambre_single = $data['prix_chambre_single'];
                    $prix_bebe = $data['prix_bebe'];
                    $child_discount = $data['child_discount'];
                    $prix_chambre_quadruple_promo = $data['prix_chambre_quadruple_promo'];
                    $prix_chambre_triple_promo = $data['prix_chambre_triple_promo'];
                    $prix_chambre_double_promo = $data['prix_chambre_double_promo'];
                    $prix_chambre_single_promo = $data['prix_chambre_single_promo'];
                } else {
                    // Default values if no record found
                    $prix_chambre_quadruple = $prix_chambre_triple = $prix_chambre_double = $prix_chambre_single = $prix_bebe = $child_discount = $prix_chambre_quadruple_promo = $prix_chambre_triple_promo = $prix_chambre_double_promo = $prix_chambre_single_promo = "N/A";
                }
                $stmt->close();
            } else {
                echo "Invalid Formule ID.";
            }
            ?>
            <div class="pricing-table-container">
                <table class="pricing-table">
                    <thead>
                        <tr>
                            <th>Type d'hébergement</th>
                            <th>Prix</th>
                        </tr>
                        <?php
                        $prix_chambre_quadruple_promo = $data['prix_chambre_quadruple_promo'];
                        $prix_chambre_triple_promo = $data['prix_chambre_triple_promo'];
                        $prix_chambre_double_promo = $data['prix_chambre_double_promo'];
                        $prix_chambre_single_promo = $data['prix_chambre_single_promo']; ?>
                    </thead>
                    <tbody>
                        <div class="icon-arrow-down" style="text-align: center;">
                            <?php echo $down_arrow; ?>
                        </div>
                        <h5 style="margin-left: 10px;">Les tarifs par personne</h5>
                        <tr>
                            <td>Individuelle</td>
                            <td>
                                <?php if (!empty($data['prix_chambre_single_promo']) && $data['prix_chambre_single_promo'] != "0.00" && $data['prix_chambre_single_promo'] != $data['prix_chambre_single']): ?>
                                    <span><?= htmlspecialchars($prix_chambre_single_promo) ?>
                                        &euro;&nbsp;&nbsp;&nbsp;</span>
                                    <span
                                        style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_single) ?>
                                        &euro;</span>
                                <?php else: ?>
                                    <?= htmlspecialchars($prix_chambre_single) ?> &euro;
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Double</td>
                            <td>
                                <?php if (!empty($data['prix_chambre_double_promo']) && $data['prix_chambre_double_promo'] != "0.00" && $data['prix_chambre_double_promo'] != $data['prix_chambre_double']): ?>
                                    <span><?= htmlspecialchars($prix_chambre_double_promo) ?>
                                        &euro;&nbsp;&nbsp;&nbsp;</span>
                                    <span
                                        style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_double) ?>
                                        &euro;</span>
                                <?php else: ?>
                                    <?= htmlspecialchars($prix_chambre_double) ?> &euro;
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Triple</td>
                            <td>
                                <?php if (!empty($data['prix_chambre_triple_promo']) && $data['prix_chambre_triple_promo'] != "0.00" && $data['prix_chambre_triple_promo'] != $data['prix_chambre_triple']): ?>
                                    <span><?= htmlspecialchars($prix_chambre_triple_promo) ?>
                                        &euro;&nbsp;&nbsp;&nbsp;</span>
                                    <span
                                        style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_triple) ?>
                                        &euro;</span>
                                <?php else: ?>
                                    <?= htmlspecialchars($prix_chambre_triple) ?> &euro;
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Quadruple</td>
                            <td>
                                <?php if (!empty($data['prix_chambre_quadruple_promo']) && $data['prix_chambre_quadruple_promo'] != "0.00" && $data['prix_chambre_quadruple_promo'] != $data['prix_chambre_quadruple']): ?>
                                    <span><?= htmlspecialchars($prix_chambre_quadruple_promo) ?>
                                        &euro;&nbsp;&nbsp;&nbsp;</span>
                                    <span
                                        style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_quadruple) ?>
                                        &euro;</span>
                                <?php else: ?>
                                    <?= htmlspecialchars($prix_chambre_quadruple) ?> &euro;
                                <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Bébé</td>
                            <td><?php echo htmlspecialchars($data['prix_bebe']); ?> €</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <!-- Pricing table END -->

            <div class="price-reservation">
                <p class="price">À partir de <br>
                    <strong class="price-number">
                        <?php if (!empty($data['prix_chambre_quadruple_promo']) && $data['prix_chambre_quadruple_promo'] != "0.00" && $data['prix_chambre_quadruple_promo'] != $data['prix_chambre_quadruple']): ?>
                            <?= htmlspecialchars($prix_chambre_quadruple_promo) ?>
                        <?php else: ?>
                            <?= htmlspecialchars($prix_chambre_quadruple) ?>
                        <?php endif; ?>
                        €</strong>
                </p>

                <?php
                if ($data['statut'] == 'activé') {
                    echo '<button type="button" class="reserve-button" data-toggle="modal" data-target="#stepperModal">RÉSERVATION</button>';
                } else {
                    echo '<button type="button" style="background-color: #FE0944 !important;" class="reserve-button" data-toggle="modal" data-target="#stepperModal" disabled>Formule Épuisé</button>';
                }
                ?>

                <!-- <button type="button" class="reserve-button" data-toggle="modal" data-target="#stepperModal">RÉSERVATION</button> -->
            </div>
        </div>
        <!-- Sticky Sidebar end -->

        <!-- Vols aller-retour Start-->
        <div class="content mt-4">
            <h4 style="margin-bottom: 0;">Vols aller-retour</h4>
            <div class="ticket-header">


                <img src="../<?php echo $comp_logo["logo"] ?>" alt="Airline's Logo" class="airline-logo">

                <?php
                // Include the database connection
                include '../db.php';

                // Get the `formule_id` from the URL
                $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

                // Check if a valid ID is provided
                if ($formule_id > 0) {
                    // Prepare the SQL query to fetch `statut_vol`
                    $stmt = $conn->prepare("SELECT statut_vol FROM formules WHERE id = ?");
                    $stmt->bind_param("i", $formule_id); // Use a prepared statement to prevent SQL injection
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $row = $result->fetch_assoc();

                    // Check if a result is returned
                    if ($row) {
                        $statut_vol = $row['statut_vol'];

                        // Dynamically render the button based on `statut_vol`
                        if ($statut_vol === 'CONFIRMÉ') {
                            echo '<button class="confirm-button">
                                    <div class="">Confirmé';
                        } else {
                            echo '<button class="not-confirm-button">
                                    <div class="">En attente';
                        }
                    } else {
                        echo 'No formule found with the provided ID.';
                    }

                    // Close the statement
                    $stmt->close();
                } else {
                    echo 'Invalid ID provided.';
                }

                // Close the database connection
                $conn->close();
                ?>
                <?php echo $plane; ?>
            </div>
            </button>
        </div>
        <!-- Carousel Wrapper -->
        <!-- Carousel Wrapper -->
        <div class="swiper flight-carousel">
            <div class="swiper-wrapper">
                <?php
                $images = ["../uploads/plane1.jpg", "../uploads/plane2.jpg", "../uploads/plane3.jpg", "../uploads/plane5.jpg", "../uploads/plane6.jpg"];
                $image_count = count($images);
                setlocale(LC_TIME, 'fr_FR.UTF-8', 'fra');

                foreach ($flights as $index => $flight):
                    // Parse and format heure_depart
                    $heure_depart = new DateTime($flight['heure_depart']);
                    $depart_date_raw = $heure_depart->format('D d M'); // e.g., "Thu 01 Aug"
                    $depart_date = ucwords(str_replace('.', '', $depart_date_raw));         // e.g., "Thu 01 Aug"

                    // Manually fix the problematic months in French

                    $depart_date = str_replace(
                        // First, replace English month abbreviations with French months
                        ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],  // English month abbreviations
                        ['Jan', 'Févr', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'], // French month abbreviations
                        $depart_date
                    );

                    // Now, replace English day abbreviations with French days
                    $depart_date = str_replace(
                        ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],  // English day abbreviations
                        ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'], // French day abbreviations
                        $depart_date
                    );



                    $depart_time = $heure_depart->format('H:i');                           // e.g., "06:00"

                    // Parse and format heure_arrivee
                    $heure_arrivee = new DateTime($flight['heure_arrivee']);
                    $arrive_date_raw = $heure_arrivee->format('D d M'); // e.g., "Thu 01 Aug"
                    $arrive_date = ucwords(str_replace('.', '', $arrive_date_raw));          // e.g., "Thu 01 Aug"

                    // Manually fix the problematic months in French
                    $arrive_date = str_replace(
                        // First, replace English month abbreviations with French months
                        ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],  // English month abbreviations
                        ['Jan', 'Févr', 'Mars', 'Avr', 'Mai', 'Juin', 'Juil', 'Août', 'Sept', 'Oct', 'Nov', 'Déc'], // French month abbreviations
                        $arrive_date
                    );

                    // Now, replace English day abbreviations with French days
                    $arrive_date = str_replace(
                        ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],  // English day abbreviations
                        ['Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam', 'Dim'], // French day abbreviations
                        $arrive_date
                    );



                    $arrive_time = $heure_arrivee->format('H:i');                           // e.g., "08:00"

                    // Calculate duration
                    $interval = $heure_depart->diff($heure_arrivee);
                    $duration = $interval->h . "hr " . $interval->i . "min";

                    // Select the current image
                    $image_path = $images[$index % $image_count];
                ?>




                    <!-- Each Flight Ticket Card -->
                    <div class="swiper-slide flight-ticket">
                        <div class="ticket-info">
                            <div class="ticket-route">
                                <div class="left-section">
                                    <span
                                        class="airport-code"><?= htmlspecialchars($flight['depart_airport_code']); ?></span>
                                    <span
                                        class="airport-name dark-text"><?= htmlspecialchars($flight['depart_airport_name']); ?></span>
                                </div>
                                <span class="flight-number grey">N° VOL<br>
                                    <span
                                        class="flight-code dark-text"><?= htmlspecialchars($flight['num_vol']); ?></span>
                                </span>
                                <div class="right-section">
                                    <span
                                        class="airport-code"><?= htmlspecialchars($flight['destination_airport_code']); ?></span>
                                    <span
                                        class="airport-name dark-text"><?= htmlspecialchars($flight['destination_airport_name']); ?></span>
                                </div>
                            </div>
                            <img src="<?= $image_path; ?>" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?= $plane_path; ?>
                                </div>
                            </div>

                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text"
                                            style="font-size: 14px; font-weight: 600;">
                                            <?= $calender; ?> <?= htmlspecialchars($depart_date); ?>
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text"
                                            style="font-size: 14px; font-weight: 600;">
                                            <?= $time; ?> <?= htmlspecialchars($depart_time); ?>
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway"><?= htmlspecialchars($duration); ?></span>
                                    <!-- <span>Pas d'escale</span> -->
                                    <span class="vol-number" style="font-size: 15px;">Vol <?= $index + 1; ?></span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text"
                                            style="font-size: 14px; font-weight: 600;">
                                            <?= $calender; ?> <?= htmlspecialchars($arrive_date); ?>
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text"
                                            style="font-size: 14px; font-weight: 600;">
                                            <?= $time; ?> <?= htmlspecialchars($arrive_time); ?>
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <!-- Pagination Dots -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Vols aller-retour END-->



    <!-- Hebergement START -->
    <?php
    // Include the database connection
    include '../db.php';

    // Get the `formule_id` from the URL
    $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    // Prepare the SQL query
    $sql = "
            SELECT 
                h.type_pension, 
                h.date_checkin, 
                h.date_checkout, 
                h.nombre_nuit,
                hotels.id AS hotel_id, 
                hotels.nom AS hotel_nom, 
                hotels.etoiles,
                hotels.details, 
                hotels.monument, 
                hotels.ville AS ville_id,
                ville_depart.nom AS ville_nom,
                hotel_gallery.image_path
            FROM hebergements h
            JOIN hotels ON h.hotel_id = hotels.id
            JOIN ville_depart ON hotels.ville = ville_depart.id
            LEFT JOIN hotel_gallery ON hotels.id = hotel_gallery.hotel_id
            WHERE h.formule_id = $formule_id
            ";

    // Execute the query
    $result = $conn->query($sql);

    // Check if data is fetched
    if ($result->num_rows > 0) {
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[$row['hotel_id']]['hotel_info'] = $row;  // Store hotel info
            $data[$row['hotel_id']]['images'][] = $row['image_path'];  // Store image paths
        }
    } else {
        $data = [];
    }
    ?>


    <div class="content">
        <div class="hebergement-container">
            <div class="top-hebergement">
                <div class="icon-container">
                    <?php echo $top_sidebar; ?>
                </div>
            </div>
            <h2>Hébergement</h2>

            <!-- Generate buttons dynamically for each ville (without duplicates) -->
            <div class="hotel-buttons">
                <?php
                $displayedCities = []; // Array to track displayed cities
                foreach ($data as $hotel_id => $hotels):
                    $city_name = strtolower($hotels['hotel_info']['ville_nom']); // Get the city name
                    if (!in_array($city_name, $displayedCities)): // Check if the city is already displayed
                        $displayedCities[] = $city_name; // Add city to the array to prevent duplicates
                ?>
                        <button class="hotel-button" data-hotel="<?= $city_name ?>">
                            <?= $hotels['hotel_info']['ville_nom'] ?>
                        </button>
                <?php endif;
                endforeach; ?>
            </div>
            <style>
                .swiper-container {
                    position: relative;
                    /* Ensure it positions itself relative to the page */
                    width: 100%;
                }

                .swiper-pagination {
                    position: absolute;
                    /* Position absolutely within swiper container */
                    bottom: 10px;
                    /* Adjust this value to place the pagination at the bottom */
                    left: 50% !important;
                    transform: translateX(-50%);
                    /* Center it horizontally */
                    z-index: 10;
                    /* Ensure it appears above images */
                }
            </style>
            <div class="hotel-content">
                <?php foreach ($data as $hotel_id => $hotels): ?>
                    <div class="hotel-info" id="hotel-<?= strtolower($hotels['hotel_info']['ville_nom']) ?>"
                        style="display: none;">
                        <div class="swiper-container" id="swiper-<?= $hotel_id ?>">
                            <div class="swiper-wrapper">
                                <?php foreach ($hotels['images'] as $image_path): ?>
                                    <div class="swiper-slide">
                                        <img class="hotel-image" src="../<?= $image_path ?>" alt="Hotel Image">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="hotel-details">
                            <div class="info">
                                <h3><?= $hotels['hotel_info']['hotel_nom'] ?></h3>
                                <div style="margin: 10px 10px 15px 0px;">
                                    <?php for ($i = 0; $i < $hotels['hotel_info']['etoiles']; $i++): ?>
                                        <?php echo $onestar; ?>
                                    <?php endfor; ?>
                                    <span class="grey m-3">724 avis</span>
                                </div>
                                <p>
                                    Ville : <b><?= $hotels['hotel_info']['ville_nom'] ?></b><br>
                                    Monument : <b><?= $hotels['hotel_info']['monument'] ?></b><br>
                                    Durée du trajet : <b><?= $hotels['hotel_info']['details'] ?></b>
                                </p>
                            </div>
                            <div class="booking-details">
                                <div class="formula-item">
                                    <?php echo $Arrivée; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Check-in</h4>
                                        <p><?= $hotels['hotel_info']['date_checkin'] ?></p>
                                    </div>
                                </div>
                                <div class="formula-item">
                                    <?php echo $Départ; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Check-out</h4>
                                        <p><?= $hotels['hotel_info']['date_checkout'] ?></p>
                                    </div>
                                </div>
                                <div class="formula-item">
                                    <?php echo $Durée; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Durée du séjour</h4>
                                        <p><?= $hotels['hotel_info']['nombre_nuit'] ?> nuitées</p>
                                    </div>
                                </div>
                                <div class="formula-item">
                                    <?php echo $pension; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Pension</h4>
                                        <p><?= $hotels['hotel_info']['type_pension'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <hr>

                    </div>

                <?php endforeach; ?>
            </div>
        </div>
    </div>


    <!-- <script>
            document.addEventListener("DOMContentLoaded", function () {
                const buttons = document.querySelectorAll(".hotel-button");
                const hotelInfos = document.querySelectorAll(".hotel-info");

                buttons.forEach(button => {
                    button.addEventListener("click", () => {
                        buttons.forEach(btn => btn.classList.remove("active"));
                        button.classList.add("active");

                        hotelInfos.forEach(info => {
                            info.style.display = info.id === `hotel-${button.dataset.hotel}` ? "block" : "none";
                        });
                    });
                });
            });
        </script> -->


    <!-- Hebergement END -->

    <!------------------------ Programme START ----------------------------->
    <div class="content">
        <div class="programme-container">
            <h2>Programme</h2>
            <?php
            // Database connection
            include '../db.php';

            // Get formule ID from GET parameter
            $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

            // Fetch programs_id and program_order from formules table
            $sql_fetch_formule = "SELECT programs_id, program_order FROM formules WHERE id = $formule_id";
            $result_formule = mysqli_query($conn, $sql_fetch_formule);

            if ($result_formule && mysqli_num_rows($result_formule) > 0) {
                $row = mysqli_fetch_assoc($result_formule);
                $program_ids = json_decode($row['programs_id'], true);
                $program_order = json_decode($row['program_order'], true);

                if (!empty($program_ids) && !empty($program_order)) {
                    // Fetch programs from programs table
                    $program_ids_str = implode(',', $program_ids);
                    $sql_fetch_programs = "SELECT id, nom, description, photo 
                                       FROM programs 
                                       WHERE id IN ($program_ids_str) 
                                       ORDER BY FIELD(id, $program_ids_str)";
                    $result_programs = mysqli_query($conn, $sql_fetch_programs);

                    $programs = [];
                    if ($result_programs && mysqli_num_rows($result_programs) > 0) {
                        while ($program = mysqli_fetch_assoc($result_programs)) {
                            $programs[$program['id']] = $program;
                        }
                    }

                    // Fetch program details
                    $sql_fetch_details = "SELECT program_id, date, duration 
                                      FROM program_details 
                                      WHERE formule_id = $formule_id";
                    $result_details = mysqli_query($conn, $sql_fetch_details);

                    $program_details = [];
                    if ($result_details && mysqli_num_rows($result_details) > 0) {
                        while ($detail = mysqli_fetch_assoc($result_details)) {
                            $program_details[$detail['program_id']] = $detail;
                        }
                    }

                    // Render programs in specified order
                    foreach ($program_order as $program_id) {
                        if (isset($programs[$program_id])) {
                            $program = $programs[$program_id];
                            $details = isset($program_details[$program_id]) ? $program_details[$program_id] : null;
            ?>
                            <div class="accordion-item">
                                <div class="accordion-header">
                                    <div class="date-info">
                                        <span class="date">
                                            <?php
                                            if ($details) {
                                                // Extract the date and format it
                                                $program_date = date('M<\span>d', strtotime($details['date']));

                                                // Replace English month abbreviations with French ones
                                                $program_date = str_replace(
                                                    ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // English month abbreviations
                                                    ['JAN', 'FÉV', 'MARS', 'AVR', 'MAI', 'JUIN', 'JUIL', 'AOÛT', 'SEP', 'OCT', 'NOV', 'DÉC'], // French month abbreviations
                                                    $program_date
                                                );

                                                // Output the formatted date
                                                echo $program_date;
                                            }
                                            ?>
                                        </span>


                                        <span class="title"><?php echo htmlspecialchars($program['nom']); ?></span>
                                    </div>
                                    <span class="toggle-icon">
                                        <?php echo isset($up) ? $up : ''; ?>
                                    </span>
                                </div>
                                <div class="accordion-body">
                                    <div class="accordion-content">
                                        <div class="d-flex">
                                            <div class="vr"></div>
                                        </div>
                                        <div class="content-text-image">
                                            <div class="text-content">
                                                <p><?php echo nl2br(htmlspecialchars($program['description'])); ?></p>
                                            </div>
                                            <div class="image-content">
                                                <img src="../<?php echo htmlspecialchars($program['photo']); ?>" alt="Program Image">
                                                <?php
                                                if ($details) {
                                                    echo '<div class="duration-label">Durée<br>' . htmlspecialchars($details['duration']) . '</div>';
                                                }
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
            <?php
                        }
                    }
                } else {
                    echo "<p>Aucun programme disponible pour cette formule.</p>";
                }
            } else {
                echo "<p>Formule invalide ou introuvable.</p>";
            }

            // Close connection
            mysqli_close($conn);
            ?>
        </div>
    </div>
    <!------------------------ Programme END ----------------------------->


    <!------------------------ Plus de details START ----------------------------->
    <?php
    include '../db.php';
    $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
    $query = "SELECT  s1t, s1d, s2t, s2d, s3t, s3d, s4t, s4d, s5t, s5d FROM formules WHERE id = $formule_id";

    // Execute the query
    $result = $conn->query($query);

    // Check if data is fetched successfully
    if ($result && $result->num_rows > 0) {
        // Fetch the associative array for the formule
        $formule = $result->fetch_assoc();
    }
    ?>
    <?php
    if (
        (!empty($formule['s1t']) && $formule['s1d'] != '<p><br></p>') ||
        (!empty($formule['s2t']) && $formule['s2d'] != '<p><br></p>') ||
        (!empty($formule['s3t']) && $formule['s3d'] != '<p><br></p>') ||
        (!empty($formule['s4t']) && $formule['s4d'] != '<p><br></p>') ||
        (!empty($formule['s5t']) && $formule['s5d'] != '<p><br></p>')
    ) {
    ?>
        <div class="content">
            <div class="details-container">
                <h2>Plus de détails</h2>
                <!-- Start accordion section 1 -->
                <?php
                if (!empty($formule['s1t']) && $formule['s1d'] != '<p><br></p>') {
                ?>
                    <div class="accordion-item accordion-item-details ">
                        <div class="accordion-header">
                            <div class="date-info">
                                <span class="title">
                                    <?php echo $formule['s1t']; ?>
                                </span>
                            </div>
                            <span class="toggle-icon">
                                <?php echo $down_arrow; ?>
                            </span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p>
                                        <?php echo $formule['s1d']; ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- End accordion section 1 -->

                <!-- Start accordion section 2 -->
                <?php
                if (!empty($formule['s2t']) && $formule['s2d'] != '<p><br></p>') {
                ?>
                    <div class="accordion-item accordion-item-details ">
                        <div class="accordion-header">
                            <div class="date-info">
                                <span class="title"><?php echo $formule['s2t']; ?></span>
                            </div>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p><?php echo $formule['s2d']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- End accordion section 2 -->

                <!-- Start accordion section 3 -->
                <?php
                if (!empty($formule['s3t']) && $formule['s3d'] != '<p><br></p>') {
                ?>
                    <div class="accordion-item accordion-item-details ">
                        <div class="accordion-header">
                            <div class="date-info">
                                <span class="title"><?php echo $formule['s3t']; ?></span>
                            </div>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p><?php echo $formule['s3d']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- End accordion section 3 -->

                <!-- Start accordion section 4 -->
                <?php
                if (!empty($formule['s4t']) && $formule['s4d'] != '<p><br></p>') {
                ?>
                    <div class="accordion-item accordion-item-details ">
                        <div class="accordion-header">
                            <div class="date-info">
                                <span class="title"><?php echo $formule['s4t']; ?></span>
                            </div>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p><?php echo $formule['s4d']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
                <!-- End accordion section 4 -->

                <!-- Start accordion section 5 -->
                <?php
                if (!empty($formule['s5t']) && $formule['s5d'] != '<p><br></p>') {
                ?>
                    <div class="accordion-item accordion-item-details ">
                        <div class="accordion-header">
                            <div class="date-info">
                                <span class="title"><?php echo $formule['s5t']; ?></span>
                            </div>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p><?php echo $formule['s5d']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                } ?>
                <!-- End accordion section 5 -->
            </div>
        </div>
    <?php
    }
    ?>
    <!------------------------ Plus de details END ------------------------------->
    </div>
    <!------------------------ END container mt-3 ------------------------------->
    <div class="" style="background-color: #fff; padding:20px 40px; margin-top:10px;">
        <script defer async src='https://cdn.trustindex.io/loader.js?6a73a73398ea3819315666d1b74'></script>
    </div>

    <!-- <script src="https://static.elfsight.com/platform/platform.js" async></script>
    <div class="elfsight-app-646b14be-443d-4db6-8e27-23f5b06c50d5" data-elfsight-app-lazy></div> -->
    <!------------------------ Footer_1 START ------------------------------->
    <div class="reviews-container container">
        <div class="row">
            <!-- Left Block -->
            <div class="col-lg-4 left-reviews">
                <h3>Les avis de nos clients</h3>
                <div class="rating">
                    <h2>4,7</h2>
                    <div class="stars">
                        <?php echo $fivestar ?>
                    </div>
                    <p class="reviews-count">724 avis</p>
                </div>
                <ul class="criteria">
                    <li>Qualité du service <span class="progress-bar"></span></li>
                    <li>Rapport qualité/prix <span class="progress-bar"></span></li>
                    <li>Organisation du voyage <span class="progress-bar"></span></li>
                    <li>Facilité des démarches <span class="progress-bar"></span></li>
                </ul>
                <div class="logos">
                    <?php echo $google ?>
                    <?php echo $trustindex ?>
                    <!-- <img src="google-logo.png" alt="Google" /> -->
                    <!-- <img src="trustindex-logo.png" alt="TrustIndex" /> -->
                </div>
            </div>

            <!-- Testimonials Slider -->
            <div class="col-lg-8 testimonials-slider">
                <div class="swiper swiper_testimonials">
                    <div class="swiper-wrapper">
                        <!-- Testimonial Slide -->
                        <div class="swiper-slide quote-box">
                            <blockquote>
                                <?php echo $quote ?>
                                <p class="quote-text">
                                    Omra réalisé avec le guide Ahmed qui a été disponible, bienveillant et professionnel
                                    tout au long du voyage. Qu'Allah le récompense
                                </p>
                                <footer class="quote-footer">

                                    <!-- Image on the left -->
                                    <img src="../uploads/p1.jpeg" alt="Client Photo 1" width="50" height="50"
                                        style="border-radius: 50%;">

                                    <!-- Text content on the right -->
                                    <div class="client-info">
                                        <cite><b>Karim Sacko</b></cite>
                                        <small>2024-08-30</small>
                                    </div>

                                </footer>
                            </blockquote>
                        </div>
                        <div class="swiper-slide quote-box">
                            <blockquote>
                                <?php echo $quote ?>
                                <p class="quote-text">
                                    Voyage inoubliable avec une organisation parfaite. Le guide était exceptionnel et a
                                    rendu cette expérience
                                    unique.
                                </p>
                                <footer class="quote-footer">
                                    <img src="../uploads/p6.jpeg" alt="Client Photo 2" width="50" height="50"
                                        style="border-radius:50%">
                                    <div class="client-info">
                                        <cite><b>Ahmed Hamed</b></cite>
                                        <small>2024-07-15</small>
                                    </div>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="swiper-slide quote-box">
                            <blockquote>
                                <?php echo $quote ?>
                                <p class="quote-text">
                                    Service incroyable du début à la fin. Je recommande vivement cette agence de voyage
                                    à tous mes proches.
                                </p>
                                <footer class="quote-footer">
                                    <img src="../uploads/p3.jpeg" alt="Client Photo 3" width="50" height="50"
                                        style="border-radius:50%">
                                    <div class="client-info">
                                        <cite><b>Majd Fersi</b></cite>
                                        <small>2024-06-25</small>
                                    </div>
                                </footer>
                            </blockquote>
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div class="swiper-pagination"></div>
                </div>
            </div>
        </div>
    </div>



    <!------------------------  Footer_1 END ------------------------------->
    <!------------------------  Footer_2 START ------------------------------->
    <div class="footer-2">
        <?php echo $facebook ?>
        <?php echo $x ?>
        <?php echo $instagram ?>
        <?php echo $youtube ?>
        <?php echo $snapchat ?>
        <?php echo $tiktok ?>
    </div>
    <!------------------------  Footer_2 END ------------------------------->

    <!------------------------  Footer_3 START ------------------------------->
    <footer class="unique-footer">
        <div class="unique-footer-container">
            <!-- Desktop Layout -->
            <div class="unique-footer-desktop">
                <!-- Left Section -->
                <div class="unique-footer-address">
                    <h5>Paris</h5>
                    <p>38 rue des Cascades, 75020 Paris<br>+33123456789</p>
                    <h5>Lyon</h5>
                    <p>2 rue Boulanger, 69006 Lyon<br>+33123456788</p>
                    <h5>Bruxelles</h5>
                    <p>8 rue Boulanger, 6000 Bruxelles<br>+33123456787</p>
                </div>

                <!-- Center Section -->
                <div class="unique-footer-logo" style="text-align: center;">
                    <?php echo $albayt_logo ?>
                    <p style="text-align: center; margin-top:20px;">Du lundi au samedi 10:00-18:30<br>contact@albayt.fr
                    </p>
                </div>

                <!-- Right Section -->
                <div class="unique-footer-links">
                    <ul>
                        <li><a href="#">À propos</a></li>
                        <li><a href="#">Infos pratiques</a></li>
                        <li><a href="#">Conditions de vente</a></li>
                        <li><a href="#">FAQs</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <div class="unique-footer-payment">
                        <?php echo $paypal ?>
                        <?php echo $stripe ?>
                        <?php echo $visa ?>
                    </div>
                </div>
            </div>

            <!-- Mobile Layout -->
            <div class="unique-footer-mobile">
                <?php echo $albayt_logo ?>
                <p style="text-align: center; margin-top:20px;">Du lundi au samedi 10:00-18:30<br>contact@albayt.fr</p>
                <div class="unique-footer-accordion">
                    <div class="accordion-item-details" style="border: none;">
                        <div class="accordion-header" style="justify-content: center; padding:0px"><button
                                class="unique-accordion-btn">Paris</button>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p style="text-align: center;">38 rue des Cascades, 75020 Paris<br>+33123456789</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item-details" style="border: none;">
                        <div class="accordion-header" style="justify-content: center; padding:0px"><button
                                class="unique-accordion-btn">Lyon</button>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p style="text-align: center;">2 rue Boulanger, 69006 Lyon<br>+33123456788</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item-details" style="border: none;">
                        <div class="accordion-header" style="justify-content: center; padding:0px"><button
                                class="unique-accordion-btn">Bruxelles</button>
                            <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                        </div>
                        <div class="accordion-body">
                            <div class="accordion-content">
                                <div class="text-content">
                                    <p style="text-align: center;">8 rue Boulanger, 6000 Bruxelles<br>+33123456787</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <ul class="unique-footer-mobile-links">
                    <li><a href="#">À propos</a></li>
                    <li><a href="#">Infos pratiques</a></li>
                    <li><a href="#">Conditions de vente</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <!------------------------  Footer_3 END ------------------------------->

    <!------------------------  Footer_4 START ------------------------------->
    <div class="footer-4 swiper-container-footer">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <?php echo $hiscos ?>
            </div>
            <div class="swiper-slide">
                <?php echo $atoutfrance ?>
            </div>
            <div class="swiper-slide">
                <?php echo $iata ?>
            </div>
            <div class="swiper-slide">
                <?php echo $saudi ?>
            </div>
            <div class="swiper-slide">
                <?php echo $hiscos ?>
            </div>
            <div class="swiper-slide">
                <?php echo $atoutfrance ?>
            </div>
            <div class="swiper-slide">
                <?php echo $iata ?>
            </div>
            <div class="swiper-slide">
                <?php echo $saudi ?>
            </div>
        </div>
        <!-- <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div> -->
        <!-- Pagination Dots -->
        <div class="swiper-pagination"></div>
    </div>

    <!------------------------  Footer_4 END ------------------------------->

    <!------------------------  Footer_5 MOBILE START ------------------------------->
    <div class="footer-5">
        <?php echo $paypal ?>
        <?php echo $stripe ?>
        <?php echo $visa ?>
    </div>

    <!------------------------  Footer_5 MOBILE END ------------------------------->

    <!------------------------  Footer_6 START ------------------------------->
    <div class="footer-6">
        <p>© Copyright 2024, Digietab Agency<br>All Rights Reserved.</p>
    </div>

    <!------------------------  Footer_6 END ------------------------------->

    <!------------------------  Sticky footer START ------------------------------->
    <!-- Query for Tarif Prices -->
    <?php
    include '../db.php'; // Include your database connection file

    // Get the formule_id from the URL
    $formule_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

    if ($formule_id > 0) {
        // Query to fetch pricing details
        $query = "SELECT 
                statut,
                prix_chambre_quadruple, 
                prix_chambre_triple, 
                prix_chambre_double, 
                prix_chambre_single, 
                prix_bebe,
                child_discount,
                prix_chambre_quadruple_promo,
                prix_chambre_triple_promo,
                prix_chambre_double_promo,
                prix_chambre_single_promo
              FROM formules 
              WHERE id = ?";

        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $formule_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $data = $result->fetch_assoc();

            // Assign fetched values to variables
            $statut = $data['statut'];
            $prix_chambre_quadruple = $data['prix_chambre_quadruple'];
            $prix_chambre_triple = $data['prix_chambre_triple'];
            $prix_chambre_double = $data['prix_chambre_double'];
            $prix_chambre_single = $data['prix_chambre_single'];
            $prix_bebe = $data['prix_bebe'];
            $child_discount = $data['child_discount'];
            $prix_chambre_quadruple_promo = $data['prix_chambre_quadruple_promo'];
            $prix_chambre_triple_promo = $data['prix_chambre_triple_promo'];
            $prix_chambre_double_promo = $data['prix_chambre_double_promo'];
            $prix_chambre_single_promo = $data['prix_chambre_single_promo'];
        } else {
            // Default values if no record found
            $prix_chambre_quadruple = $prix_chambre_triple = $prix_chambre_double = $prix_chambre_single = $prix_bebe = $child_discount = $prix_chambre_quadruple_promo = $prix_chambre_triple_promo = $prix_chambre_double_promo = $prix_chambre_single_promo = "N/A";
        }
        $stmt->close();
    } else {
        echo "Invalid Formule ID.";
    }
    ?>
    <!-- Query for Tarif Prices -->
    <div class="sticky-footer">
        <button class="cta-mobile-table-button">
            <div class="icon-arrow">
                <?php echo $up_arrow; ?>
            </div><span style="font-size: 12px;">VOIR NOS TARIFS D'HÉBERGEMENTS</span>
        </button>

        <div class="pricing-table-container-footer">
            <table class="pricing-table">
                <thead>
                    <tr>
                        <th>Type d'hébergement</th>
                        <th>Prix</th>
                    </tr>
                </thead>
                <tbody>
                    <div class="icon-arrow-down" style="text-align: center;">
                        <button class="arrow-button-down"
                            style="border: none; background-color: transparent; width:100%;">
                            <?php echo $down_arrow; ?>
                        </button>
                    </div>
                    <h5 style="margin-left: 10px;">Les tarifs par personne</h5>
                    <tr>
                        <td>Individuelle</td>
                        <td>
                            <?php if (!empty($data['prix_chambre_single_promo']) && $data['prix_chambre_single_promo'] != "0.00" && $data['prix_chambre_single_promo'] != $data['prix_chambre_single']): ?>
                                <span><?= htmlspecialchars($prix_chambre_single_promo) ?>
                                    &euro;&nbsp;&nbsp;&nbsp;</span>
                                <span
                                    style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_single) ?>
                                    &euro;</span>
                            <?php else: ?>
                                <?= htmlspecialchars($prix_chambre_single) ?> &euro;
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Double</td>
                        <td>
                            <?php if (!empty($data['prix_chambre_double_promo']) && $data['prix_chambre_double_promo'] != "0.00" && $data['prix_chambre_double_promo'] != $data['prix_chambre_double']): ?>
                                <span><?= htmlspecialchars($prix_chambre_double_promo) ?>
                                    &euro;&nbsp;&nbsp;&nbsp;</span>
                                <span
                                    style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_double) ?>
                                    &euro;</span>
                            <?php else: ?>
                                <?= htmlspecialchars($prix_chambre_double) ?> &euro;
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Triple</td>
                        <td>
                            <?php if (!empty($data['prix_chambre_triple_promo']) && $data['prix_chambre_triple_promo'] != "0.00" && $data['prix_chambre_triple_promo'] != $data['prix_chambre_triple']): ?>
                                <span><?= htmlspecialchars($prix_chambre_triple_promo) ?>
                                    &euro;&nbsp;&nbsp;&nbsp;</span>
                                <span
                                    style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_triple) ?>
                                    &euro;</span>
                            <?php else: ?>
                                <?= htmlspecialchars($prix_chambre_triple) ?> &euro;
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Quadruple</td>
                        <td>
                            <?php if (!empty($data['prix_chambre_quadruple_promo']) && $data['prix_chambre_quadruple_promo'] != "0.00" && $data['prix_chambre_quadruple_promo'] != $data['prix_chambre_quadruple']): ?>
                                <span><?= htmlspecialchars($prix_chambre_quadruple_promo) ?>
                                    &euro;&nbsp;&nbsp;&nbsp;</span>
                                <span
                                    style="text-decoration: line-through; color:var(--grey-text); "><?= htmlspecialchars($prix_chambre_quadruple) ?>
                                    &euro;</span>
                            <?php else: ?>
                                <?= htmlspecialchars($prix_chambre_quadruple) ?> &euro;
                            <?php endif; ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Bébé</td>
                        <!-- <td><--?php echo $prix_bebess; ?> €<td> -->
                        <td><?php echo htmlspecialchars($data['prix_bebe']); ?> €</td>
                    </tr>
                </tbody>
            </table>
        </div>


        <div class="reservation-mobile-footer">
            <p class="grey" style="margin: 0px; font-size: .8rem;">À partir de <br>
                <strong class="price-number dark-text">
                    <?php if (!empty($data['prix_chambre_quadruple_promo']) && $data['prix_chambre_quadruple_promo'] != "0.00" && $data['prix_chambre_quadruple_promo'] != $data['prix_chambre_quadruple']): ?>
                        <?= htmlspecialchars($prix_chambre_quadruple_promo) ?>
                    <?php else: ?>
                        <?= htmlspecialchars($prix_chambre_quadruple) ?>
                    <?php endif; ?>
                    €</strong>
            </p>
            <?php
                if ($data['statut'] == 'activé') {
                    echo '<button class="reserve-button" data-toggle="modal" data-target="#stepperModal">RÉSERVATION</button>';
                } else {
                    echo '<button style="background-color: #FE0944 !important;" class="reserve-button" data-toggle="modal" data-target="#stepperModal" disabled>Formule Épuisé</button>';
                }
                ?>
            <!-- <button class="reserve-button" data-toggle="modal" data-target="#stepperModal">RÉSERVATION</button> -->
        </div>




        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const footerContainer = document.querySelector('.pricing-table-container-footer');
                const ctaButton = document.querySelector('.cta-mobile-table-button');
                const downButton = document.querySelector('.arrow-button-down');

                // Show the footer when the "cta-mobile-table-button" is clicked
                ctaButton.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent click from bubbling up
                    footerContainer.classList.add('visible');
                });

                // Hide the footer when the "arrow-button-down" is clicked
                downButton.addEventListener('click', function(event) {
                    event.stopPropagation(); // Prevent click from bubbling up
                    footerContainer.classList.remove('visible');
                });

                // Hide the footer if the user clicks anywhere outside of the table or buttons
                document.addEventListener('click', function(event) {
                    if (!footerContainer.contains(event.target) && !ctaButton.contains(event.target)) {
                        footerContainer.classList.remove('visible');
                    }
                });
            });
        </script>
    </div>
    <!------------------------  Sticky footer END ------------------------------->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function changeImage(imagePath) {
            // Change the main image source
            document.getElementById('mainImage').src = imagePath;

            // Remove active class from all thumbnails
            document.querySelectorAll('.thumbnail').forEach(thumbnail => {
                thumbnail.classList.remove('active');
            });

            // Add active class to the clicked thumbnail
            event.currentTarget.classList.add('active');
        }
    </script>

    <script>
        let currentIndex = 0;

        function slideThumbnails(direction) {
            const carousel = document.querySelector('.thumbnail-carousel');
            const thumbnails = document.querySelectorAll('.thumbnail');
            const visibleThumbnails = 5; // Number of thumbnails visible at one time

            // Calculate the maximum number of slides
            const maxIndex = thumbnails.length - visibleThumbnails;

            // Update the current index based on the direction (-1 for prev, +1 for next)
            currentIndex += direction;

            // Ensure the index is within bounds
            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > maxIndex) {
                currentIndex = maxIndex;
            }

            // Slide by adjusting the transform property
            const offset = currentIndex * -20; // Each thumbnail is 20% of the container width
            carousel.style.transform = `translateX(${offset}%)`;
        }
    </script>

    <!-- SWIPER FLIGHT CODE -->
    <script>
        const swiper = new Swiper('.flight-carousel', {
            slidesPerView: 1, // Default to 1 slide per view for smaller screens
            spaceBetween: 20, // Space between slides
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true, // Allows users to click on dots to navigate
                dynamicBullets: true, // Makes dots adjust dynamically
            },
            breakpoints: {
                991: {
                    slidesPerView: 2, // Show 2 slides on screens 991px and above
                },
                // 1200: {
                //   slidesPerView: 3, // Show 3 slides on screens 1200px and above
                // }
            }
        });
    </script>

    <!-- Hebergement SWIPER START  -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Initialize all Swipers dynamically for each hotel
            const hotelSwipers = document.querySelectorAll('.swiper-container');

            hotelSwipers.forEach((swiperContainer) => {
                const swiperId = swiperContainer.id; // e.g., swiper-1, swiper-2, etc.
                const swiperInstance = new Swiper(`#${swiperId}`, {
                    slidesPerView: 1, // Show 1 image at a time
                    spaceBetween: 10, // Space between images
                    pagination: {
                        el: `#${swiperId} .swiper-pagination`,
                        clickable: true,
                    },
                    breakpoints: {
                        991: {
                            slidesPerView: 2.5, // Show 2 slides on screens 991px and above
                        }
                    }
                });
            });

            // Tab switching for hotel info display
            const buttons = document.querySelectorAll(".hotel-button");
            const hotelInfos = document.querySelectorAll(".hotel-info");

            // Function to activate a button and display its corresponding hotel info
            function activateButton(button) {
                buttons.forEach(btn => btn.classList.remove("active"));
                button.classList.add("active");

                hotelInfos.forEach(info => {
                    info.style.display = info.id === `hotel-${button.dataset.hotel}` ? "block" : "none";
                });
            }

            // Add event listeners for button clicks
            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    activateButton(button);
                });
            });

            // Set the first button as active and display its hotel info by default
            if (buttons.length > 0) {
                activateButton(buttons[0]);
            }

        });
    </script>
    <!-- Hebergement SWIPER END -->

    <!------------------------ Programme Accordion START ----------------------------->
    <script>
        // Store PHP variables with SVG content as strings
        const downArrowSVG = <?php echo json_encode($down_arrow); ?>;
        const upArrowSVG = <?php echo json_encode($up); ?>;

        // Add event listener to accordion headers
        document.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const accordionItem = header.parentElement;

                // Close other open accordion items
                document.querySelectorAll('.accordion-item').forEach(item => {
                    if (item !== accordionItem) {
                        item.classList.remove('active');
                        item.querySelector('.accordion-body').style.display = 'none';
                        item.querySelector('.toggle-icon').innerHTML = downArrowSVG; // Update icon to down arrow
                    }
                });

                // Toggle the current accordion item
                accordionItem.classList.toggle('active');
                const body = accordionItem.querySelector('.accordion-body');
                const toggleIcon = header.querySelector('.toggle-icon');

                if (accordionItem.classList.contains('active')) {
                    body.style.display = 'block';
                    toggleIcon.innerHTML = upArrowSVG; // Update icon to up arrow
                } else {
                    body.style.display = 'none';
                    toggleIcon.innerHTML = downArrowSVG; // Update icon to down arrow
                }
            });
        });

        // Open the first accordion item by default
        const firstAccordionItem = document.querySelector('.accordion-item');
        firstAccordionItem.classList.add('active');
        firstAccordionItem.querySelector('.accordion-body').style.display = 'block';
        firstAccordionItem.querySelector('.toggle-icon').innerHTML = upArrowSVG; // Set first icon to up arrow
    </script>

    <!------------------------ Programme Accordion END ------------------------------->

    <!------------------------ plus de detais Accordion START ----------------------------->

    <!------------------------ plus de details Accordion END ------------------------------->

    <!------------------------ Footer_1 START ------------------------------->
    <script>
        // Swiper initialization
        const swiper_testimonials = new Swiper(".swiper_testimonials", {
            slidesPerView: 2.5, // Show 2.5 slides on desktop
            spaceBetween: 20, // Gap between slides
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            breakpoints: {
                // Responsive settings
                0: {
                    slidesPerView: 1, // Show 1 slide on smaller screens (mobile)
                    spaceBetween: 10,
                },
                991: {
                    slidesPerView: 1, // For tablets
                    spaceBetween: 15,
                },
                1200: {
                    slidesPerView: 2.5, // For desktops
                    spaceBetween: 20,
                },
            },
        });
    </script>

    <!------------------------  Footer_1 END ------------------------------->

    <!------------------------  Read more START ------------------------------->
    <script>
        document.querySelectorAll('.quote-text').forEach(paragraph => {
            const fullText = paragraph.textContent.trim(); // Get the full text
            const maxCharacters = 100; // Maximum number of characters to show initially

            if (fullText.length > maxCharacters) {
                // Truncate the text and add "Lire la suite"
                const truncatedText = fullText.slice(0, maxCharacters) + '... ';
                paragraph.innerHTML = `
            ${truncatedText}
            <span class="read-more" onclick="toggleReadMore(this)"><br>Lire la suite</span>
        `;

                // Store the full text in a data attribute
                paragraph.setAttribute('data-full-text', fullText);
            }
        });

        function toggleReadMore(element) {
            const parentParagraph = element.closest('.quote-text');
            const fullText = parentParagraph.getAttribute('data-full-text');
            const maxCharacters = 100;

            if (parentParagraph.classList.contains('expanded')) {
                // Collapse the text
                parentParagraph.classList.remove('expanded');
                const truncatedText = fullText.slice(0, maxCharacters) + '... ';
                parentParagraph.innerHTML = `
            ${truncatedText}
            <span class="read-more" onclick="toggleReadMore(this)"><br>Lire la suite</span>
        `;
            } else {
                // Expand the text
                parentParagraph.classList.add('expanded');
                parentParagraph.innerHTML = `
            ${fullText}
            <span class="read-more" onclick="toggleReadMore(this)"><br>Réduire</span>
        `;
            }
        }
    </script>

    <!------------------------  Read more END ------------------------------->

    <!------------------------  footer 4 STTART ------------------------------->
    <script>
        // Initialize Swiper
        document.addEventListener("DOMContentLoaded", function() {
            const swiper = new Swiper(".swiper-container-footer", {
                slidesPerView: 2, // Display 3 slides
                spaceBetween: 10, // Add space between slides
                loop: true, // Infinite looping

                pagination: {
                    el: '.swiper-pagination',
                    clickable: true, // Allows users to click on dots to navigate
                    dynamicBullets: true, // Makes dots adjust dynamically
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                breakpoints: {
                    991: {
                        slidesPerView: 5, // 3 slides for less than 991px
                    },
                    768: {
                        slidesPerView: 3, // 2 slides for tablets
                    },
                    576: {
                        slidesPerView: 3, // 1 slide for small screens
                    },
                    320: {
                        slidesPerView: 3, // 1 slide for small screens
                    },
                },

            });
        });
    </script>


    <!------------------------  footer 4 END ------------------------------->

    <!------------------------  stepwizard steps START ------------------------------->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const steps = document.querySelectorAll('.reservation-steps'); // All step buttons
            const lines = document.querySelectorAll('.step-line'); // All connecting lines
            let currentStep = 0; // Initial step (step 1, index 0)

            // Function to update steps and lines
            function updateSteps() {
                steps.forEach((step, index) => {
                    if (index <= currentStep) {
                        // Activate current and previous steps
                        step.classList.remove('btn-default');
                        step.classList.add('btn-primary');
                        step.style.backgroundColor = '#c59c5b'; // Force golden background
                        step.style.color = 'white';
                        if (index > 0) {
                            // Activate the connecting line to the previous step
                            lines[index - 1].classList.add('line-active');
                            lines[index - 1].style.backgroundColor = '#c59c5b'; // Force golden line
                        }
                    } else {
                        // Deactivate future steps
                        step.classList.remove('btn-primary');
                        step.classList.add('btn-default');
                        step.style.backgroundColor = '#f4f4f4'; // Default grey
                        step.style.color = '#a7a7a7';
                        if (index > 0) {
                            // Deactivate connecting line
                            lines[index - 1].classList.remove('line-active');
                            lines[index - 1].style.backgroundColor = '#f4f4f4'; // Default grey
                        }
                    }
                });
            }

            // Event listeners for the navigation buttons
            document.querySelectorAll('.nextBtn').forEach((btn) => {
                btn.addEventListener('click', function() {
                    if (currentStep < steps.length - 1) {
                        currentStep++;
                        updateSteps();
                    }
                });
            });

            document.querySelectorAll('.prevBtn').forEach((btn) => {
                btn.addEventListener('click', function() {
                    if (currentStep > 0) {
                        currentStep--;
                        updateSteps();
                    }
                });
            });

            // Initialize steps on page load
            updateSteps();
        });
    </script>

    <!------------------------  stepwizard steps END ------------------------------->



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>