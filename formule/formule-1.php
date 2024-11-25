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
            padding: 2% 20%;
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

        .unique-footer-logo img {
            max-width: 100px;
            margin-bottom: 10px;
        }

        .unique-footer-links ul {
            list-style: none;
            padding: 0;
        }

        .unique-footer-links ul li {
            margin: 5px 0;
        }

        .unique-footer-links ul li a {
            text-decoration: none;
            color: #333;
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
            padding: 20px 0;
            position: relative;
        }

        .swiper-container-footer {
            width: 100%;
            height: 200px;
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
            color: var(--grey-text);
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
            <a class="navbar-brand" href="#">
                <img src="../uploads/logo.png" alt="Logo" width="150" height="auto" class="logo-mobile">
            </a>
            <button class="btn contact-btn contact-btn-nav-mobile" type="submit">Contact</button>
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon icons"></span>
            </button>


            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                <div class="offcanvas-header" style="justify-content: space-between;">
                    <a class="" href="#">
                        <img src="../uploads/logo-white.png" alt="Logo" width="150" height="auto">
                    </a>
                    <div>
                    <button type="button" class="" data-bs-dismiss="offcanvas" aria-label="Close" style="border: none; background-color: transparent;"><?php echo $close_x ?></button>
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
                    <input class="form-control me-2 search-box-nav" type="search" placeholder="Recherche" aria-label="Search">
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
        <button class="autres-dates-btn unique-btn-autre-dates" data-bs-toggle="modal" data-bs-target="#autresDatesModal"><?php echo $left_arrow ?><?php echo $autres_dates ?>Autres dates</button>
    </nav>
    <!----------- POPUP Autres dates START ----------------->
    <!-- Modal -->
    <div class="modal fade unique-modal-autre-dates" id="autresDatesModal" tabindex="-1" aria-labelledby="autresDatesModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable unique-dialog-autre-dates">
            <div class="modal-content unique-content-autre-dates">
                <div class="modal-header unique-header-autre-dates" style="display: block;">

                    <div style="text-align: center; margin-top:-15px;">
                        <?php echo $top_sidebar; ?>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <h5 class="modal-title unique-title-autre-dates" id="autresDatesModalLabel">Planifiez votre voyage</h5>

                        <button type="button" class="btn-close unique-close-autre-dates" data-bs-dismiss="modal" aria-label="Close"></button>
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
                    <!-- Repeat similar card structure for more entries -->
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
                    <!-- Repeat similar card structure for more entries -->
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
                    <!-- Repeat similar card structure for more entries -->
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
                    <!-- Repeat similar card structure for more entries -->
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
    </div>

    <!----------- POPUP Autres dates END ----------------->
    <!------------------------ Autres dates END ------------------------------->

    <!----------- POPUP reservation START ----------------->
    <div class="modal fade" id="stepperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close" style="border: none; background-color: transparent;"></button>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="stepwizard">

                        <div class="stepwizard-row setup-panel" style="display: flex; justify-content: space-around;">
                            <div class="stepwizard-step">
                                <a href="#step-1" type="button" class="btn btn-primary non-clickable reservation-steps" data-step="1">
                                    1
                                </a>
                                <div class="step-line"></div>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-2" type="button" class="btn btn-default non-clickable reservation-steps" data-step="2" disabled="disabled">
                                    2
                                </a>
                                <div class="step-line"></div>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-3" type="button" class="btn btn-default non-clickable reservation-steps" data-step="3" disabled="disabled">
                                    3
                                </a>
                                <div class="step-line"></div>
                            </div>
                            <div class="stepwizard-step">
                                <a href="#step-4" type="button" class="btn btn-default non-clickable reservation-steps" data-step="4" disabled="disabled">
                                    4
                                </a>
                            </div>
                        </div>
                    </div>

                    <form role="form">
                        <div class="setup-content" id="step-1" style="display: none;">
                            <h6 style="margin: 20px 0px;">Qui participe à ce voyage?</h6>
                            <div style="padding: 2%;">
                                <div class="form-group first-step" style="margin-bottom: 20px;">
                                    <div><label for=""><b>ADULTES</b></label>
                                        <p>13 ans et plus</p>
                                    </div>
                                    <div class="custom-number-input">
                                        <button class="minus-btn-adults minus-btn-style" type="button">-</button>
                                        <input type="number" id="adults" value="0" min="0" class="number-input number-input-adults" required>
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
                                        <input type="number" id="children" value="0" min="0" class="number-input number-input-children" required>
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
                                        <input type="number" id="babies" value="0" min="0" class="number-input number-input-babies" required>
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
                                        <input type="number" id="quadruple" value="0" min="0" class="number-input form-control room-input number-input-quadruple" required>
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
                                        <input type="number" id="triple" value="0" min="0" class="number-input form-control room-input number-input-triple" required>
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
                                        <input type="number" id="double" value="0" min="0" class="number-input form-control room-input number-input-double" required>
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
                                        <input type="number" id="single" value="0" min="0" class="number-input form-control room-input number-input-single" required>
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

                        <div class="setup-content" id="step-3" style="display: none; font-family: sans-serif;">
                            <h6 style="margin: 20px 0px;">Les détails de votre réservation</h6>
                            <div style="padding:2%;">

                                <div style="display:grid; grid-template-columns: 1fr 1fr; gap: 10px;">

                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $landing_plane; ?>
                                        </div>
                                        <div class="text">
                                            <h4>Arrivée</h4>
                                            <p>Lun</p>
                                            <p>05/10/2024</p>
                                        </div>
                                    </div>
                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $Ville_de_départ; ?>
                                        </div>
                                        <div class="text">
                                            <h4>Départ</h4>
                                            <p>Jeu</p>
                                            <p>16/10/24</p>
                                        </div>
                                    </div>
                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $time_brown; ?>
                                        </div>
                                        <div class="text">
                                            <h4>14h00 - 0h00</h4>
                                        </div>
                                    </div>
                                    <div class="formula-item" style="align-items:baseline;">
                                        <div class="icon-container">
                                            <?php echo $time_brown; ?>
                                        </div>
                                        <div class="text">
                                            <h4>0h00- 12h00</h4>
                                        </div>
                                    </div>

                                </div>
                                <div class="formula-item" style="align-items:baseline;">
                                    <div class="icon-container">
                                        <?php echo $Arrivée; ?>
                                    </div>
                                    <div class="text">
                                        <h4>Durée totale du séjour</h4>
                                        <p>11 jours</p>
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
                                <button class="btn btn-secondary prevBtn prev-btn" type="button" style="border:none; background-color:transparent; color:black; padding:5px; font-size:.7rem; font-weight:bold; margin:10px 0px 10px 0px;"><u>Modifier la sélection</u></button>
                                <div style="display:flex; justify-content: space-between; margin-top:30px;">
                                    <button class="btn btn-secondary prevBtn prev-btn" type="button">PRÉCÉDENT</button>
                                    <button class="btn btn-primary nextBtn next-btn" type="button">SUIVANT</button>
                                </div>
                        </div>


                        <div class="setup-content" id="step-4" style="display: block;">
                            <h6 style="margin: 20px 0px;">Details</h6>
                            <div style="padding:2%;">

                                <div class="form-group">
                                    <!-- <label for="fullName">Prénom et Nom *:</label> -->
                                    <input type="text" class="form-control contact-form" id="fullName" placeholder="Nom & Prénom*" style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;" required>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="address">Adresse *:</label> -->
                                    <input type="text" class="form-control contact-form" id="address" placeholder="Adresse*" style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;" required>
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
                                        <input type="tel" class="form-control contact-form" id="phoneNumber" placeholder="Numéro de téléphone*" style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <!-- <label for="email">E-mail *:</label> -->
                                    <input type="email" class="form-control contact-form" id="email" placeholder="E-mail*" style="background-image: url('<?php echo $data_uri; ?>'); background-repeat: no-repeat; background-position: right center;" required>
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
                        url: 'send_email.php', // Script PHP pour l'envoi d'email
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
                        url: 'send_mailclient.php',
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
                    <img src="../uploads/tunis Air.png" alt="Logo" class="logo">
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
                        <div class="thumbnail" onclick="changeImage('../uploads/8.jpg')">
                            <img src="../uploads/8.jpg" alt="Thumbnail 8">
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
                <button type="button" class="reserve-button" data-toggle="modal" data-target="#stepperModal">RÉSERVATION</button>
            </div>
        </div>

        <!-- Vols aller-retour Start-->
        <div class="content mt-4">
            <h4 style="margin-bottom: 0;">Vols aller-retour</h4>
            <div class="ticket-header">
                <img src="../uploads/tunis Air.png" alt="Turkish Airlines" class="airline-logo">
                <button class="confirm-button">
                    <div class="">Confirmé
                        <?php echo $plane; ?>
                    </div>
                </button>
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
                                    <span class="airport-name dark-text">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number grey">N° VOL<br><span class="flight-code dark-text"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name dark-text">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane1.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?php echo $plane_path; ?>
                                </div>
                            </div>


                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>12:00
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway">1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>23:00
                                        </div>
                                    </span>
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
                                    <span class="airport-name dark-text">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number grey">N° VOL<br><span class="flight-code dark-text"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name dark-text">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane2.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?php echo $plane_path; ?>
                                </div>
                            </div>


                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>12:00
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway">1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>23:00
                                        </div>
                                    </span>
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
                                    <span class="airport-name dark-text">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number grey">N° VOL<br><span class="flight-code dark-text"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name dark-text">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane3.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?php echo $plane_path; ?>
                                </div>
                            </div>


                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>12:00
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway">1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>23:00
                                        </div>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Repeat .flight-ticket divs for each ticket -->
                    <div class="swiper-slide flight-ticket ">

                        <div class="ticket-info ">
                            <div class="ticket-route">
                                <div class="left-section">
                                    <span class="airport-code">CDG</span>
                                    <span class="airport-name dark-text">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number grey">N° VOL<br><span class="flight-code dark-text"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name dark-text">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane1.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?php echo $plane_path; ?>
                                </div>
                            </div>


                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>12:00
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway">1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>23:00
                                        </div>
                                    </span>
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
                                    <span class="airport-name dark-text">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number grey">N° VOL<br><span class="flight-code dark-text"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name dark-text">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane2.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?php echo $plane_path; ?>
                                </div>
                            </div>


                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>12:00
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway">1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>23:00
                                        </div>
                                    </span>
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
                                    <span class="airport-name dark-text">Paris Charles de Gaulle airport</span>
                                </div>
                                <span class="flight-number grey">N° VOL<br><span class="flight-code dark-text"> SV144</span></span>
                                <div class="right-section">
                                    <span class="airport-code">RDH</span>
                                    <span class="airport-name dark-text">Aéroport international du roi Khaled</span>
                                </div>
                            </div>
                            <img src="../uploads/plane3.jpg" alt="Flight Image" class="flight-image">

                            <div class="dashed-line circle-cut"></div>
                            <div>
                                <div class="" style="text-align: center; margin:0% 20%;">
                                    <?php echo $plane_path; ?>
                                </div>
                            </div>


                            <div class="flight-details">
                                <div class="left-section-flight-details">
                                    <span class="grey" style="margin-left: 13px;">Départ</span>
                                    <span>
                                        <div class="icon-container-vol-section-left dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>12:00
                                        </div>
                                    </span>
                                </div>
                                <div class="duration grey">
                                    <span class="bold raleway">1hr 30min</span>
                                    <span>Pas d'escale</span>
                                </div>
                                <div class="right-section-flight-details">
                                    <span class="grey" style="margin-left: 23px;">Arrivée</span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $calender; ?>Mer 08 Sep
                                        </div>
                                    </span>
                                    <span>
                                        <div class="icon-container-vol-section-right dark-text" style="font-size: 14px; font-weight: 600;">
                                            <?php echo $time; ?>23:00
                                        </div>
                                    </span>
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
        <!-- Vols aller-retour END-->
        <!-- Hebergement START -->
        <div class="content">

            <div class="hebergement-container">
                <div class="top-hebergement">
                    <div class="icon-container">
                        <?php echo $top_sidebar; ?>
                    </div>
                </div>
                <h2>Hébergement</h2>
                <div class="hotel-buttons">
                    <button class="hotel-button active" data-hotel="madinah">Hôtel Madinah</button>
                    <button class="hotel-button" data-hotel="makkah">Hôtel Makkah</button>
                </div>
                <div class="hotel-content">
                    <!-- Hotel Madinah Content -->
                    <div class="hotel-info" id="hotel-madinah" style="display: block;">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel1.jpg" alt="Hôtel Madinah Image 1"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel2.jpg" alt="Hôtel Madinah Image 2"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel3.jpg" alt="Hôtel Madinah Image 3"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel 4.jpg" alt="Hôtel Makkah Image 1"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/pullman.jpg" alt="Hôtel Makkah Image 2"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/omra-octobre-formule-confort-17-2.jpg" alt="Hôtel Makkah Image 3"></div>

                            </div>
                            <!-- Pagination dots for Swiper -->
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="hotel-details">
                            <div class="info">
                                <h3>Hôtel Bosphorus Waqf As Safi</h3>
                                <div class="" style="margin: 10px 10px 15px 0px;">
                                    <?php echo $fivestar; ?> <span class="grey m-3">724 avis</span>
                                </div>
                                <p>Ville : Madinah<br>
                                    Distance : 25 kilomètres<br>
                                    Durée du trajet : Environ 35 minutes</p>
                            </div>
                            <div class="booking-details">
                                <div class="formula-item">
                                    <?php echo $Arrivée; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Check-in</h4>
                                        <p>2024-09-08</p>
                                    </div>
                                </div>

                                <div class="formula-item">
                                    <?php echo $Départ; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Check-out</h4>
                                        <p>2024-09-13</p>
                                    </div>
                                </div>

                                <div class="formula-item">
                                    <?php echo $Durée; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Durée du séjour</h4>
                                        <p>5 nuitées</p>
                                    </div>
                                </div>

                                <div class="formula-item">
                                    <?php echo $pension; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Pension</h4>
                                        <p>Petit déjeuner</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Hotel Makkah Content -->
                    <div class="hotel-info" id="hotel-makkah" style="display: none;">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel 4.jpg" alt="Hôtel Makkah Image 1"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/pullman.jpg" alt="Hôtel Makkah Image 2"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/omra-octobre-formule-confort-17-2.jpg" alt="Hôtel Makkah Image 3"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel1.jpg" alt="Hôtel Madinah Image 1"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel2.jpg" alt="Hôtel Madinah Image 2"></div>
                                <div class="swiper-slide"><img class="hotel-image" src="../uploads/hotel3.jpg" alt="Hôtel Madinah Image 3"></div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <div class="hotel-details">
                            <div class="info">
                                <h3>Hôtel Zamzam</h3>
                                <div class="" style="margin: 10px 10px 15px 0px;">
                                    <?php echo $fourstar; ?><span class="grey m-3">631 avis</span>
                                </div>
                                <p>Ville : Makkah<br>
                                    Distance : 12 kilomètres<br>
                                    Durée du trajet : Environ 15 minutes</p>
                            </div>
                            <div class="booking-details">
                                <div class="formula-item">
                                    <?php echo $Arrivée; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Check-in</h4>
                                        <p>2024-09-20</p>
                                    </div>
                                </div>

                                <div class="formula-item">
                                    <?php echo $Départ; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Check-out</h4>
                                        <p>2024-09-26</p>
                                    </div>
                                </div>

                                <div class="formula-item">
                                    <?php echo $Durée; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Durée du séjour</h4>
                                        <p>6 nuitées</p>
                                    </div>
                                </div>

                                <div class="formula-item">
                                    <?php echo $pension; ?>
                                    <div class="text" style="margin-left: 10px; margin-top: 15px;">
                                        <h4>Pension</h4>
                                        <p>demi-pension</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hebergement END -->

        <!------------------------ Programme START ----------------------------->
        <div class="content">
            <div class="programme-container">
                <h2>Programme</h2>
                <div class="accordion-item active">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="date">SEP<span>08</span></span>

                            <span class="title">Transfert Aéroport de Médine - Hôtel de Médine</span>
                        </div>
                        <span class="toggle-icon"><?php echo $up; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="d-flex">
                                <div class="vr"></div>
                            </div>
                            <div class="content-text-image">
                                <div class="text-content">
                                    <p>Aéroport de Médine > Hôtel à Médine<br>

                                        Après avoir terminé les formalités de douane à Médine, un bus privé (confort climatisé) vous transférera de l’aéroport de Médine vers votre hôtel à Médine.</p>
                                </div>
                                <div class="image-content">
                                    <img src="../uploads/bus-bagages.jpg" alt="Bus Image">
                                    <div class="duration-label">Durée<br>1h30</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="date">SEP<span>10</span></span>
                            <span class="title">Visites à Médine</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="d-flex">
                                <div class="vr"></div>
                            </div>
                            <div class="content-text-image">
                                <div class="text-content">
                                    <p>Aéroport de Médine > Hôtel à Médine<br>

                                        Après avoir terminé les formalités de douane à Médine, un bus privé (confort climatisé) vous transférera de l’aéroport de Médine vers votre hôtel à Médine.
                                        Après avoir terminé les formalités de douane à Médine, un bus privé (confort climatisé) vous transférera de l’aéroport de Médine vers votre hôtel à Médine.
                                        Après avoir terminé les formalités de douane à Médine, un bus privé (confort climatisé) vous transférera de l’aéroport de Médine vers votre hôtel à Médine.</p>
                                </div>
                                <div class="image-content">
                                    <img src="../uploads/bus.jpg" alt="Bus Image">
                                    <div class="duration-label">Durée<br>1h30</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="date">SEP<span>12</span></span>
                            <span class="title">Transfert Hôtel de Médine - Hôtel de Makkah</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="d-flex">
                                <div class="vr"></div>
                            </div>
                            <div class="content-text-image">
                                <div class="text-content">
                                    <p>Aéroport de Médine > Hôtel à Médine<br>

                                        Après avoir terminé les formalités de douane à Médine, un bus privé (confort climatisé) vous transférera de l’aéroport de Médine vers votre hôtel à Médine.
                                        Après avoir terminé les formalités de douane à Médine, un bus privé (confort climatisé) vous transférera de l’aéroport de Médine vers votre hôtel à Médine.</p>
                                </div>
                                <div class="image-content">
                                    <img src="../uploads/bus.jpg" alt="Bus Image">
                                    <div class="duration-label">Durée<br>1h30</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------ Programme END ------------------------------->

        <!------------------------ Plus de details START ----------------------------->
        <div class="content">
            <div class="details-container">
                <h2>Plus de détails</h2>
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Compagnies aériennes</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Distance du Haram</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Standing du hotels</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Inclus</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Pas inclus</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Information générales</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Additional Accordion Items -->
                <div class="accordion-item accordion-item-details ">
                    <div class="accordion-header">
                        <div class="date-info">
                            <span class="title">Condition d'entrée en Arabie saoudite</span>
                        </div>
                        <span class="toggle-icon"><?php echo $down_arrow; ?></span>
                    </div>
                    <div class="accordion-body">
                        <div class="accordion-content">
                            <div class="text-content">
                                <p>Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                    Aéroport de Médine > Hôtel à Médine<br>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------ Plus de details END ------------------------------->
    </div>
    <!------------------------ END container mt-3 ------------------------------->


    <!------------------------ Footer_1 START ------------------------------->
    <div class="reviews-container container">
        <div class="row">
            <!-- Left Block -->
            <div class="col-lg-4 left-reviews">
                <h3>Les avis de nos clients</h3>
                <div class="rating">
                    <h2>4,7</h2>
                    <div class="stars">
                        <?php echo $fivestar  ?>
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
                    <?php echo $google  ?>
                    <?php echo $trustindex  ?>
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
                                <?php echo $quote  ?>
                                <p class="quote-text">
                                    Omra réalisé avec le guide Ahmed qui a été disponible, bienveillant et professionnel tout au long du voyage. Qu'Allah le récompense
                                </p>
                                <footer class="quote-footer">

                                    <!-- Image on the left -->
                                    <img src="../uploads/p1.jpeg" alt="Client Photo 1" width="50" height="50" style="border-radius: 50%;">

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
                                <?php echo $quote  ?>
                                <p class="quote-text">
                                    Voyage inoubliable avec une organisation parfaite. Le guide était exceptionnel et a rendu cette expérience
                                    unique.
                                </p>
                                <footer class="quote-footer">
                                    <img src="../uploads/p6.jpeg" alt="Client Photo 2" width="50" height="50" style="border-radius:50%">
                                    <div class="client-info">
                                        <cite><b>Ahmed Hamed</b></cite>
                                        <small>2024-07-15</small>
                                    </div>
                                </footer>
                            </blockquote>
                        </div>
                        <div class="swiper-slide quote-box">
                            <blockquote>
                                <?php echo $quote  ?>
                                <p class="quote-text">
                                    Service incroyable du début à la fin. Je recommande vivement cette agence de voyage à tous mes proches.
                                </p>
                                <footer class="quote-footer">
                                    <img src="../uploads/p3.jpeg" alt="Client Photo 3" width="50" height="50" style="border-radius:50%">
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
        <?php echo $facebook  ?>
        <?php echo $x  ?>
        <?php echo $instagram  ?>
        <?php echo $youtube  ?>
        <?php echo $snapchat  ?>
        <?php echo $tiktok  ?>
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
                    <p style="text-align: center; margin-top:20px;">Du lundi au samedi 10:00-18:30<br>contact@albayt.fr</p>
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
                        <div class="accordion-header" style="justify-content: center; padding:0px"><button class="unique-accordion-btn">Paris</button>
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
                        <div class="accordion-header" style="justify-content: center; padding:0px"><button class="unique-accordion-btn">Lyon</button>
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
                        <div class="accordion-header" style="justify-content: center; padding:0px"><button class="unique-accordion-btn">Bruxelles</button>
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
            <div class="swiper-slide"><?php echo $hiscos ?></div>
            <div class="swiper-slide"><?php echo $atoutfrance ?></div>
            <div class="swiper-slide"><?php echo $iata ?></div>
            <div class="swiper-slide"><?php echo $saudi ?></div>

            <div class="swiper-slide"><?php echo $hiscos ?></div>
            <div class="swiper-slide"><?php echo $atoutfrance ?></div>
            <div class="swiper-slide"><?php echo $iata ?></div>
            <div class="swiper-slide"><?php echo $saudi ?></div>
        </div>
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
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
                        <button class="arrow-button-down" style="border: none; background-color: transparent; width:100%;">
                            <?php echo $down_arrow; ?>
                        </button>
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

        <div class="reservation-mobile-footer">
            <p class="grey" style="margin: 0px; font-size: .8rem;">À partir de <br><strong class="price-number dark-text">1290€</strong></p>
            <button class="reserve-button" data-toggle="modal" data-target="#stepperModal">RÉSERVATION</button>
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
            // Swiper initialization
            const madinahSwiper = new Swiper('#hotel-madinah .swiper-container', {
                slidesPerView: 1, // Show 1 image at a time
                spaceBetween: 10, // Space between images
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    991: {
                        slidesPerView: 2, // Show 2 slides on screens 991px and above
                    }
                }
            });

            const makkahSwiper = new Swiper('#hotel-makkah .swiper-container', {
                slidesPerView: 1, // Show 1 image at a time
                spaceBetween: 10, // Space between images
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    991: {
                        slidesPerView: 2.5, // Show 2 slides on screens 991px and above
                    }
                }
            });

            // Tab switching
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
                        slidesPerView: 4, // 3 slides for less than 991px
                    },
                    768: {
                        slidesPerView: 3, // 2 slides for tablets
                    },
                    576: {
                        slidesPerView: 2, // 1 slide for small screens
                    },
                    320: {
                        slidesPerView: 1, // 1 slide for small screens
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