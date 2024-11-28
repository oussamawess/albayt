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
            font-size: 13px;
            /* font-weight: 600; */
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

        .unique-card-autre-dates img {
            height: 30px;
        }

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
        }

        /*------------------------ POPUP autres-dates END -----------------------------*/
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-lg bg-white sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
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
                    <a class="" href="#">
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

                    <div style="bottom: 0; position: relative; display: grid; gap: 20px;">
                        <a href="#" style=" color:white; text-decoration:none;">Mentions légales</a>
                        <a href="#" style=" color:white; text-decoration:none;">Infos pratiques</a>
                        <a href="#" style=" color:white; text-decoration:none;">Conditions de vente</a>
                    </div>
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
                    <input class="form-control me-2 search-box-nav" type="search" placeholder="Recherche"
                        aria-label="Search">
                    <button class="search-icon-btn" type="submit">
                        <i class="bi bi-search"></i>
                    </button>
                </form>
                <button class="btn contact-btn" type="submit">Contact</button>
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
    <div class="modal fade unique-modal-autre-dates" id="autresDatesModal" tabindex="-1"
        aria-labelledby="autresDatesModalLabel" aria-hidden="true">
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
                    <!-- Example Content -->
                    <div class="unique-card-autre-dates">
                        <div class="row align-items-center unique-row-autre-dates">
                            <div class="col-6 left-info-popup">
                                <span><b>Départ</b></span>
                                <span>Dim</span>
                                <span>08/09/2024</span>
                            </div>
                            <div class="svg-popup">
                                <?php echo $plane_path_popup ?>
                            </div>
                            <div class="col-6 text-end right-info-popup">
                                <span><b>Retour</b></span>
                                <span>Mar</span>
                                <span class="date-right-popup">17/10/2024</span>
                            </div>
                            <div class="col-12 d-flex align-items-center bottom-info-popup">
                                <img src="../uploads/tunis Air.png" style="height:3rem;" alt="tunisAir" class="me-2">
                                <!-- <p class="mb-0">À partir de <strong>1290€</strong></p> -->
                                <div class="buttom-right-info-popup">
                                    <span class="price-text-popup">À partir de</span>
                                    <span class="price-number-popup">1290€</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    
            </div>
        </div>
    </div>

    <!----------- POPUP Autres dates END ----------------->
    <!------------------------ Autres dates END ------------------------------->
</body>

</html>