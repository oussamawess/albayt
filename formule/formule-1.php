<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- Include the icons.php file -->
    <?php include('icons.php'); ?>
    <style>
        :root {
            --primary-color: #C89D54;
            --body-color: #F2EDE4;
            --dark-color: #595651;
            --darker-color: #403F3E;
            --light-color: #F2F2F2;

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
            font-size: 13px;
            font-weight: 600;
            color: black;
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
            padding: 5px 30px 5px 30px;
            font-size: 13px;
            font-weight: 600;
        }

        .contact-btn:hover {
            background-color: var(--dark-color);
            color: white;
        }

        .contact-btn-sidebar {
            margin-left: 0px;
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
            filter: invert(1);
            opacity: 0.75;
        }

        .contact-btn-nav-mobile {
            display: none;
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
                border-radius: 3px;
                color: var(--primary-color);
                padding: 5px 30px 5px 30px;
                font-size: 13px;
                font-weight: 600;
                margin-left: 10px;
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
            top: 10px;
            right: 0px;
            width: 100px;
            background-color: #ffffffb0;
            padding: 8px;
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
        }

        .cta-button {
            width: 100%;
            padding: 5px;
            margin-top: 20px;
            background-color: var(--dark-color);
            color: white;
            text-align: center;
            border: none;
            font-size: 14px;
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
            padding: 2% 20%;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            font-size: 14px;
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
            /* Ensure it's above other content */
        }

        /* Hover effect on CTA button */
        .cta-button:hover~.pricing-table-container,
        .pricing-table-container:hover {
            opacity: 1;
            transform: translateY(0);
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
                padding: 10px;
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
                position: relative;
                /* Switch from absolute to relative positioning */
                margin-top: -49%;
                /* Give space between table and button */
                opacity: 0;
                /* Keep the table visible */
                transform: translateY(0);
                /* Keep the table in normal position */
            }

            /* Ensure the CTA button is full-width */
            .cta-button {
                width: 100%;
            }
        }

        /* Grouped media queries for pricing table container adjustments */
        @media (max-width: 767px) {
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
        }


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

        .ticket-route {
            display: flex;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            margin: 5px 0;
            font-size: 12px;
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
            margin-top: 16px;
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
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="../uploads/logo.png" alt="Logo" width="150" height="auto" class="logo-mobile">
            </a>
            <button class="btn contact-btn contact-btn-nav-mobile" type="submit">Contact</button>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icons"></span>
            </button>


            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header">
                    <a class="" href="#">
                        <img src="../uploads/logo-white.png" alt="Logo" width="150" height="auto">
                    </a>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" aria-current="page" href="#">A PROPOS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" href="#">OMRA</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" href="#">HAJJ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-sidebar" href="#">BLOG</a>
                        </li>
                    </ul>
                    <button class="btn contact-btn contact-btn-sidebar" type="submit">Contact</button>
                </div>
            </div>

            <!-- <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icons"></span>
            </button> -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="#">A PROPOS</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">OMRA</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">HAJJ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">BLOG</a>
                    </li>
                </ul>
                <form class="d-flex search-box" role="search">
                    <input class="form-control me-2 search-box-nav" type="search" placeholder="Recherche" aria-label="Search">
                    <button class="search-icon-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <button class="btn contact-btn" type="submit">Contact</button>
            </div>
        </div>
    </nav>

    <div class="container mt-3">
        <div class="content first-bolck">
            <div class="main-block">
                <div class="position-relative">
                    <!-- Main Display Image -->
                    <img src="../uploads/66a4be3b6417f7.22039243_makkah3.jpeg" id="mainImage" class="main-image" alt="Main Display Image">
                    <!-- Logo -->
                    <img src="../uploads/tunis Air.png" alt="Logo" class="logo">
                </div>

                <!-- Thumbnails Carousel -->
                <div class="thumbnail-carousel-container">
                    <button class="carousel-control prev" onclick="slideThumbnails(-1)">&#10094;</button>
                    <div class="thumbnail-carousel">
                        <!-- Thumbnail Images -->
                        <div class="thumbnail" onclick="changeImage('../uploads/66f2f05baf687_35440.jpg')">
                            <img src="../uploads/66f2f05baf687_35440.jpg" alt="Thumbnail 1">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/66f2f6c09237e_medina.jpg')">
                            <img src="../uploads/66f2f6c09237e_medina.jpg" alt="Thumbnail 2">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/66f2ef10db645_makkah.jpg')">
                            <img src="../uploads/66f2ef10db645_makkah.jpg" alt="Thumbnail 3">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/12.jpeg')">
                            <img src="../uploads/12.jpeg" alt="Thumbnail 4">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/13.jpeg')">
                            <img src="../uploads/13.jpeg" alt="Thumbnail 5">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/14.jpeg')">
                            <img src="../uploads/14.jpeg" alt="Thumbnail 6">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/66a4be20d6ab92.07264307_makkah2.jpg')">
                            <img src="../uploads/66a4be20d6ab92.07264307_makkah2.jpg" alt="Thumbnail 7">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/_a8485bb6-70b8-4b89-8dc7-7bac93e187aa.jpeg')">
                            <img src="../uploads/_a8485bb6-70b8-4b89-8dc7-7bac93e187aa.jpeg" alt="Thumbnail 8">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/66a3f90a16e2e2.85837181_toulouse.jpg')">
                            <img src="../uploads/66a3f90a16e2e2.85837181_toulouse.jpg" alt="Thumbnail 9">
                        </div>
                        <div class="thumbnail" onclick="changeImage('../uploads/669fc2c9eae660.84115768_669f9f314b68b7.29168108_omra-octobre-formule-confort-17-2.jpg')">
                            <img src="../uploads/669fc2c9eae660.84115768_669f9f314b68b7.29168108_omra-octobre-formule-confort-17-2.jpg" alt="Thumbnail 10">
                        </div>
                    </div>
                    <button class="carousel-control next" onclick="slideThumbnails(1)">&#10095;</button>
                </div>
            </div>
        </div>




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
                        <p>Omra</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Ville_de_départ; ?>
                    </div>
                    <div class="text">
                        <h4>Ville de départ</h4>
                        <p>Paris</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Arrivée; ?>
                    </div>
                    <div class="text">
                        <h4>Arrivée</h4>
                        <p>05/10/24</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Départ; ?>
                    </div>
                    <div class="text">
                        <h4>Départ</h4>
                        <p>16/10/24</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Formule; ?>
                    </div>
                    <div class="text">
                        <h4>Formule</h4>
                        <p>Omra Essentielle</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Durée; ?>
                    </div>
                    <div class="text">
                        <h4>Durée</h4>
                        <p>10 jours</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Médine; ?>
                    </div>
                    <div class="text">
                        <p>5 nuits à Médine</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Makkah; ?>
                    </div>
                    <div class="text">
                        <p>5 nuits à Makkah</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Hébergements_Madinah; ?>
                    </div>
                    <div class="text">
                        <h4>Hébergements (Madinah)</h4>
                        <p>Le Bosphorus Waqf Al Safi Hotel</p>
                    </div>
                </div>
                <div class="formula-item">
                    <div class="icon-container">
                        <?php echo $Hébergement_Makkah; ?>
                    </div>
                    <div class="text">
                        <h4>Hébergement (Makkah)</h4>
                        <p>DoubleTree by Hilton</p>
                    </div>
                </div>
            </div>
            <button class="cta-button">
                <div class="icon-arrow">
                    <?php echo $up_arrow; ?>
                </div>VOIR NOS TARIFS D'HÉBERGEMENTS
            </button>

            <div class="pricing-table-container">
                <table class="pricing-table">
                    <thead>
                        <tr>
                            <th>Type d'hébergement</th>
                            <th>Prix</th>
                        </tr>
                    </thead>
                    <tbody>
                        <div class="icon-arrow-down" style="text-align: center;">
                            <?php echo $down_arrow; ?>
                        </div>
                        <h5 style="margin-left: 10px;">Les tarifs par personne</h5>
                        <tr>
                            <td>Individuelle</td>
                            <td>2290.00 €</td>
                        </tr>
                        <tr>
                            <td>Double</td>
                            <td>1550.00 €</td>
                        </tr>
                        <tr>
                            <td>Triple</td>
                            <td>1390.00 €</td>
                        </tr>
                        <tr>
                            <td>Quadruple</td>
                            <td>1290.00 €</td>
                        </tr>
                        <tr>
                            <td>Bébé</td>
                            <td>350.00 €</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="price-reservation">
                <p class="price">À partir de <br><strong class="price-number">1290€</strong></p>
                <button class="reserve-button">RÉSERVATION</button>
            </div>
        </div>


        <div class="content mt-4">
            <h4 style="margin-bottom: 0;">Vols aller-retour</h4>
            <div class="ticket-header">
                <img src="../uploads/tunis Air.png" alt="Turkish Airlines" class="airline-logo">
                <button class="confirm-button">Confirmé</button>
            </div>
            <!-- Carousel Wrapper -->
            <div class="swiper flight-carousel">
                <div class="swiper-wrapper">
                    <!-- Each Flight Ticket Card -->

                    <div class="swiper-slide flight-ticket ">

                        <div class="ticket-info ">
                            <div class="ticket-route">
                                <div class="left-section">
                                    <span class="airport-code">CDG</span>
                                    <span class="airport-name">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number">N° VOL<br><span class="flight-code"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane1.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>


                            <div class="flight-details">
                                <div class="departure">
                                    <span>Départ</span>
                                    <span>Mer 08 Sep</span>
                                    <span>12:00</span>
                                </div>
                                <div class="duration">
                                    <span>1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="arrival">
                                    <span>Arrivée</span>
                                    <span>Mer 08 Sep</span>
                                    <span>23:00</span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- Repeat .flight-ticket divs for each ticket -->
                    <div class="swiper-slide flight-ticket">
                    <div class="ticket-info ">
                            <div class="ticket-route">
                                <div class="left-section">
                                    <span class="airport-code">CDG</span>
                                    <span class="airport-name">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number">N° VOL<br><span class="flight-code"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane2.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>


                            <div class="flight-details">
                                <div class="departure">
                                    <span>Départ</span>
                                    <span>Mer 08 Sep</span>
                                    <span>12:00</span>
                                </div>
                                <div class="duration">
                                    <span>1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="arrival">
                                    <span>Arrivée</span>
                                    <span>Mer 08 Sep</span>
                                    <span>23:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat .flight-ticket divs for each ticket -->
                    <div class="swiper-slide flight-ticket">
                    <div class="ticket-info ">
                            <div class="ticket-route">
                                <div class="left-section">
                                    <span class="airport-code">CDG</span>
                                    <span class="airport-name">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number">N° VOL<br><span class="flight-code"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane3.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>


                            <div class="flight-details">
                                <div class="departure">
                                    <span>Départ</span>
                                    <span>Mer 08 Sep</span>
                                    <span>12:00</span>
                                </div>
                                <div class="duration">
                                    <span>1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="arrival">
                                    <span>Arrivée</span>
                                    <span>Mer 08 Sep</span>
                                    <span>23:00</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                <!-- Pagination Dots -->
                <div class="swiper-pagination"></div>
            </div>
        </div>


        <div class="content">
            <p>Lorem ipsum odor amet, consectetuer adipiscing elit. Conubia placerat sit erat ante lacus. Habitant aliquet ultrices class euismod quisque mattis; senectus per. Nisi quam ex curabitur congue varius nulla ut. Lectus urna magnis praesent mattis est odio dictum pharetra. Mauris dui luctus gravida phasellus maecenas eleifend elit. Libero sapien amet erat libero iaculis. Malesuada montes nunc semper scelerisque mattis varius lectus elementum massa. Non amet posuere nisl commodo mus accumsan suspendisse.

                Semper elit leo hendrerit vivamus in rhoncus vulputate quam. Hac dui nisl auctor habitasse vel et himenaeos. Taciti aliquam mus nullam bibendum tortor. Nibh montes at phasellus eleifend vehicula dolor curae. Ad proin eros consectetur hac maximus eleifend senectus. Finibus urna torquent conubia, ipsum feugiat ligula. Habitasse augue id massa nunc consectetur consectetur. Praesent neque sagittis sagittis nibh potenti. Lacus inceptos varius feugiat; aenean erat laoreet?

                Neque sapien natoque ac quis auctor per maximus maecenas. Consequat eget eu in integer eros, ex ut condimentum. Habitasse sollicitudin praesent fringilla inceptos eros. Habitant luctus ultricies dolor morbi non lectus sodales. Metus egestas montes a erat cursus. Finibus nibh montes finibus gravida at.

                Ac inceptos interdum commodo nisi ut pretium velit fusce. Vivamus cras eleifend vestibulum consequat venenatis dictumst in. Nunc luctus massa facilisi potenti id, elit at turpis. Integer ornare feugiat netus feugiat congue dui tellus interdum. Egestas semper felis aptent enim aptent etiam vestibulum. Varius tempor risus mollis semper non dignissim tortor. Potenti duis tortor tristique curae curabitur risus ornare aliquet diam.

                Egestas lobortis integer non at aptent rhoncus. Vitae sociosqu scelerisque in consectetur aenean ac magnis. Laoreet venenatis tempor efficitur sollicitudin consequat. Fusce litora efficitur congue curae blandit accumsan ullamcorper. Dolor torquent fusce justo dictumst elementum magnis sodales eu? Tristique fringilla sodales porta luctus bibendum; nisi leo dis. Netus inceptos placerat mus justo neque sed ad.

                Posuere suspendisse ad eros lobortis habitant. Dui nascetur penatibus accumsan duis integer. Ornare molestie quisque non quisque porttitor semper. Urna quis donec facilisi hendrerit lectus dui, porta at. Quisque montes amet nibh sagittis ligula, consectetur fringilla vitae. Ad ultricies pretium mi fringilla dignissim. Dui per ipsum efficitur dignissim ad consequat volutpat neque. Ipsum parturient maecenas eget at eget efficitur.

                Dapibus primis cubilia euismod, sagittis ultricies pellentesque nisi rutrum. Ligula duis lobortis senectus tristique himenaeos nisi porttitor. Bibendum porta felis commodo accumsan at enim orci. Volutpat sociosqu quisque vel dictum suspendisse luctus sollicitudin. Id vivamus euismod tellus rhoncus; posuere feugiat lectus? Dictumst duis auctor elementum enim cras sociosqu.

                Ex mattis primis volutpat placerat ullamcorper conubia ut. Arcu curae aptent primis ad laoreet curabitur. Orci in ipsum tincidunt sapien magnis. Sem habitant libero cubilia sem eros. Venenatis eget augue vehicula dictum lorem blandit commodo integer morbi. Tempus erat torquent sociosqu nulla sociosqu per. Vulputate consectetur venenatis enim sit auctor malesuada lorem. Pellentesque leo volutpat facilisi pretium suspendisse facilisis justo natoque. Ligula nunc laoreet a montes praesent eget.

                Lorem facilisis velit eleifend platea blandit torquent. Ullamcorper hac commodo quisque nisi placerat nulla. Class arcu sapien convallis bibendum facilisis habitant diam tincidunt eget. Potenti blandit maximus odio egestas pulvinar rutrum tristique ultricies. Curae metus eros litora arcu natoque at eget. Augue laoreet eleifend sagittis eleifend metus potenti felis. Odio platea odio nisi metus vestibulum commodo. Enim conubia consequat dictum laoreet blandit. Potenti pulvinar quis luctus euismod dui diam at eleifend.

                Sodales nunc massa aptent a dictum rhoncus. Dis erat sagittis mus aenean sit eleifend non mattis. Justo ultricies inceptos quis orci curabitur euismod facilisi. Iaculis habitasse risus congue himenaeos at. Urna aliquet viverra eleifend; nullam cras facilisi. Neque nullam pellentesque ut ad semper. At tortor phasellus feugiat neque tristique eros felis nisl.
            </p>
        </div>

    </div>

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

    <!-- SWIPER CODE -->
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>