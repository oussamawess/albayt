<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omra October 2023 - Formule Essentielle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> -->



    <style>
        /* General Styles */


        /* Style the flag icon inside the dropdown button */
        .dropdown-toggle .flag-icon {
            margin-right: 5px;
            /* Adjust as needed */
        }



        body {
            font-family: 'DM Sans', sans-serif;
            line-height: 1.6;
            background-color: #fff;
            color: #333;
        }

        header {
            background-image: url('https://www.albayt.fr/wp-content/uploads/shutterstock_1339215521.jpg');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 150px 0;
            text-align: center;
            position: relative;
            z-index: 1;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.8));
            z-index: -1;
        }

        header h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        header h2 {
            font-size: 1.5rem;
            font-weight: 500;
            margin-bottom: 2rem;
        }

        .btn-primary-custom {
            background-color: #dac392;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary-custom:hover {
            background-color: #0069d9;
        }

        .btn-secondary-custom {
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-secondary-custom:hover {
            background-color: #5a6268;
        }

        .nav-tabs .nav-link {
            background-color: transparent !important;
            color: #dac392;
            border-bottom: 2px solid transparent;
            transition: color 0.3s ease, border-bottom-color 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            color: #ff5722;
            border-bottom-color: #ff5722;
        }

        .tab-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
        }

        .pricing-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .pricing-card:hover {
            transform: translateY(-5px);
            box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.15);
        }

        .card-title {
            font-size: 1.2rem;
        }

        .price {
            font-size: 2.5rem;
            font-weight: 600;
            color: #dac392;
            margin-bottom: 1rem;
        }

        .price-discounted {
            font-size: 1rem;
            color: #6c757d;
            text-decoration: line-through;
        }

        .badge.pulse {
            animation: pulse 1s infinite;
        }

        .nav-tabs {
            border-bottom: none;
        }

        .nav-tabs .nav-link {
            background-color: transparent !important;
            color: #6c757d;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            margin: 5px;
            font-weight: 500;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav-tabs .nav-link.active {
            background-color: #dac392 !important;
            color: white;
        }

        .nav-tabs .nav-link:hover {
            background-color: #e9ecef !important;
            color: #dac392;
        }

        .shadow {
            box-shadow: 0 4px 8px rgba(0, 0, 0, .1);
            padding: 30px;
            border-radius: 10px;


        }

        .tab-content {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
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

        .card-header {
            background-color: #dac392;
            color: white;
            border-radius: 15px 15px 0 0;
            font-weight: 600;
        }

        .card-body {
            padding: 30px;
        }

        .price {
            font-size: 2rem;
            font-weight: 700;
            color: #dac392;
            margin-top: 1rem;
        }

        .price-discounted {
            font-size: 0.9rem;
            color: #6c757d;
            text-decoration: line-through;
        }

        .btn-primary {
            background-color: #dac392;
            border: none;
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #f57c00;
        }

        .modal-content {
            border-radius: 15px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
        }

        .modal-header {
            border-bottom: none;
        }

        .modal-body {
            padding: 30px;
        }

        .card-container {
            background-color: transparent;
        }

        .city-badge {
            background-color: #dac392;
            border-radius: 20px;
            padding: 5px 10px;
            font-weight: 500;
        }

        .departure-info,
        .arrival-info {
            font-size: 0.9rem;
            margin-bottom: 5px;
        }

        .price-info {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .airline-logo {
            max-width: 100px;
            margin-top: 10px;
        }

        .card {
            border-radius: 10px;
            border: 1px solid #ddd;
            transition: all 0.3s;
        }

        .card:hover {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .card-text {
            font-size: 0.875rem;
            color: #666;
        }

        .carousel-item img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            padding: 25px;
        }

        .card-title {
            font-size: 1.4rem;
            font-weight: 600;
            color: #000;
            margin-bottom: 15px;
        }

        .card-text {
            font-size: 0.9rem;
            color: #333;
            margin-bottom: 5px;
        }

        .card-text strong {
            font-weight: 500;
        }

        .airline-logo {
            max-width: 50px;
            display: block;
            margin: 10px auto;
        }

        .col-md-6 {
            width: 50%;
            float: left;
            padding-right: 15px;
            padding-left: 15px;
        }

        .mb-4 {
            margin-bottom: 1.5rem !important;
        }

        .border-0 {
            border: 0 !important;
        }

        .shadow-sm {
            box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2);
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

        .modal .card-body {
            padding: 15px;
        }

        .modal .departure-info,
        .modal .arrival-info {
            display: flex;
            align-items: left;
            flex-direction: column;
        }

        .modal .city-badge {
            background-color: #007bff;
            color: white;
            font-size: 0.8rem;
            border-radius: 20px;
            padding: 4px 8px;
            margin-right: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal .departure-info strong,
        .modal .arrival-info strong {
            font-size: 1rem;
            font-weight: 500;
        }

        .modal .price-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .modal .price-info span {
            font-size: 1.1rem;
            font-weight: 600;
            margin-right: 10px;
        }

        .modal .airline-logo {
            max-width: 50px;
            filter: grayscale(30%);
            transition: filter 0.3s ease;
        }

        .modal .card-container:hover .airline-logo {
            filter: grayscale(0%);
        }

        /*--------------------
Body
--------------------*/
        *,
        *::before,
        *::after {
            box-sizing: border-box;
        }

        body {
            height: 100vh;
            margin: 0;
            color: #363c44;
            font-size: 14px;
        }

        @mixin center {
            position: relative;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }


        /*--------------------
Boarding Pass
--------------------*/
        .boarding-pass {
            @include center;
            width: 100%;
            height: 100%;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 5px 30px rgba(0, 0, 0, .2);
            overflow: hidden;
            text-transform: uppercase;

            small {
                display: block;
                font-size: 11px;
                color: #A2A9B3;
                margin-bottom: 2px;
            }

            strong {
                font-size: 15px;
                display: block;
            }

            /*--------------------
  Header
  --------------------*/
            & header {
                background: linear-gradient(to bottom, #000000, #000000);
                padding: 18px 20px;
                height: 70px;

                .logo {
                    float: left;
                    width: 104px;
                    height: 31px;
                }

                .flight {
                    float: right;
                    color: #fff;
                    text-align: right;


                    small {
                        font-size: 8px;
                        opacity: 0.8;
                    }

                    strong {
                        font-size: 18px;
                    }

                }

                .desc {
                    float: left;
                    color: #fff;
                    text-align: right;

                    small {
                        font-size: 8px;
                        margin-bottom: 2px;
                        opacity: 0.8;
                    }

                    strong {
                        font-size: 18px;
                    }

                }
            }

            /*--------------------
  Cities
  --------------------*/
            .cities {
                position: relative;

                &::after {
                    content: '';
                    display: table;
                    clear: both;
                }

                .city {
                    padding: 20px 18px;
                    float: left;

                    &:nth-child(2) {
                        float: right;
                    }

                    strong {
                        font-size: 40px;
                        font-weight: 300;
                        line-height: 1;
                    }

                    small {
                        margin-bottom: 0px;
                        margin-left: 3px;
                    }
                }

                .airplane {
                    position: absolute;
                    width: 40px;
                    height: 50px;
                    top: 57%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    animation: move 4s infinite;
                    color: #F7F2E8
                }

                @keyframes move {
                    10% {
                        left: 50%;
                        opacity: 1;
                    }

                    100% {
                        left: 70%;
                        opacity: 0;
                    }
                }
            }


            /*--------------------
  Infos
  --------------------*/
            .infos {
                display: flex;
                border-top: 1px solid #f7f2e8;

                .places,
                .times {
                    width: 50%;
                    padding: 10px 0;

                    &::after {
                        content: '';
                        display: table;
                        clear: both;
                    }
                }

                .times {

                    strong {
                        transform: scale(0.9);
                        transform-origin: left bottom;
                    }
                }

                .places {
                    background: #f7f2e8;
                    border-right: 1px solid #f7f2e8;

                    small {
                        color: #97A1AD;
                    }

                    strong {
                        color: #DAC392;
                    }
                }

                .box {
                    padding: 10px 20px 10px;
                    width: 47%;
                    float: left;

                    small {
                        font-size: 10px;
                    }
                }
            }


            /*--------------------
  Strap
  --------------------*/
            .strap {
                clear: both;
                position: relative;
                border-top: 1px solid #f7f2e8;

                &::after {
                    content: '';
                    display: table;
                    clear: both;
                }

                .box {
                    padding: 23px 0 20px 20px;

                    & div {
                        margin-bottom: 15px;

                        small {
                            font-size: 10px;
                        }

                        strong {
                            font-size: 13px;
                        }
                    }

                    sup {
                        font-size: 8px;
                        position: relative;
                        top: -5px;
                    }
                }

                .qrcode {
                    position: absolute;
                    top: 20px;
                    right: 20px;
                    width: 80px;
                    height: 80px;
                }
            }
        }

        @media only screen and (max-width: 600px) {
            .col-md-6 {
                width: 100% !important;
                padding-right: 0px;
                padding-left: 0px;

            }

            /*--------------------
Boarding Pass
--------------------*/
            .boarding-pass {
                @include center;
                width: 100%;
                height: 100%;
                background: #fff;
                border-radius: 12px;
                box-shadow: 0 5px 30px rgba(0, 0, 0, .2);
                overflow: hidden;
                text-transform: uppercase;

                small {
                    display: block;
                    font-size: 11px;
                    color: #A2A9B3;
                    margin-bottom: 2px;
                }

                strong {
                    font-size: 15px;
                    display: block;
                }

                /*--------------------
  Header
  --------------------*/
                & header {
                    background: linear-gradient(to bottom, #000000, #000000);
                    padding: 12px 20px;
                    height: 70px;

                    .logo {
                        float: left;
                        width: 104px;
                        height: 31px;
                    }

                    .flight {
                        float: right;
                        color: #fff;
                        text-align: right;


                        small {
                            font-size: 8px;
                            opacity: 0.8;
                        }

                        strong {
                            font-size: 18px;
                        }

                    }

                    .desc {
                        float: left;
                        color: #fff;
                        text-align: right;

                        small {
                            font-size: 8px;
                            margin-bottom: 2px;
                            opacity: 0.8;
                        }

                        strong {
                            font-size: 18px;
                        }

                    }
                }

                /*--------------------
  Cities
  --------------------*/
                .cities {
                    position: relative;

                    &::after {
                        content: '';
                        display: table;
                        clear: both;
                    }

                    .city {
                        padding: 10px 18px;
                        float: left;

                        &:nth-child(2) {
                            float: left;
                        }

                        strong {
                            font-size: 40px;
                            font-weight: 300;
                            line-height: 1;
                        }

                        small {
                            margin-bottom: 0px;
                            margin-left: 3px;
                        }
                    }

                    .airplane {
                        position: absolute;
                        width: 40px;
                        height: 50px;
                        top: 57%;
                        left: 50%;
                        transform: translate(-50%, -50%);
                        animation: move 4s infinite;
                        color: #F7F2E8;
                    }

                    @keyframes move {
                        10% {
                            left: 50%;
                            opacity: 1;
                        }

                        100% {
                            left: 70%;
                            opacity: 0;
                        }
                    }
                }


                /*--------------------
  Infos
  --------------------*/
                .infos {
                    display: flex;
                    border-top: 1px solid #f7f2e8;

                    .places,
                    .times {
                        width: 50%;
                        padding: 10px 0;

                        &::after {
                            content: '';
                            display: table;
                            clear: both;
                        }
                    }

                    .times {

                        strong {
                            transform: scale(0.9);
                            transform-origin: left bottom;
                        }
                    }

                    .places {
                        background: #f7f2e8;
                        border-right: 1px solid #f7f2e8;

                        small {
                            color: #97A1AD;
                        }

                        strong {
                            color: #DAC392;
                        }
                    }

                    .box {
                        padding: 10px 20px 10px;
                        width: 47%;
                        float: left;

                        small {
                            font-size: 10px;
                        }
                    }
                }


                /*--------------------
  Strap
  --------------------*/
                .strap {
                    clear: both;
                    position: relative;
                    border-top: 1px solid #f7f2e8;

                    &::after {
                        content: '';
                        display: table;
                        clear: both;
                    }

                    .box {
                        padding: 23px 0 20px 20px;

                        & div {
                            margin-bottom: 15px;

                            small {
                                font-size: 10px;
                            }

                            strong {
                                font-size: 13px;
                            }
                        }

                        sup {
                            font-size: 8px;
                            position: relative;
                            top: -5px;
                        }
                    }

                    .qrcode {
                        position: absolute;
                        top: 20px;
                        right: 20px;
                        width: 80px;
                        height: 80px;
                    }
                }
            }
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

        .hotel-info {
            background-color: #fff;
            padding: 30px;
        }

        .title {
            font-size: 24px;
            letter-spacing: 1px;
            font-weight: 500;
        }

        .subtitle {
            text-transform: uppercase;
            font-size: 14px;
            color: #f6a12d;
        }

        .reviews ul {
            display: inline-block;
            margin: 10px 10px 0px 0;
            /*   font-size: 18px; */
        }

        .reviews ul:last-child {
            border-right: none;
        }

        .stars li {
            color: #ccc;
        }

        .yellow {
            color: #ffcc00;
        }



        .trip-advisor li span {
            color: #000;
            font-size: 24px;
        }

        .details p {
            color: #aaa;
            font-weight: 300;
        }

        .hotel-price {
            position: relative;
        }

        .pricing-content {
            display: flex;
            flex-direction: column;
            text-align: center;
            justify-content: space-between;
            padding: 30px 30px 70px 30px;
            height: 100%;
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

        .price h3 {
            font-weight: 400;
            font-size: 24px;
            text-align: center;
        }

        .price h3 span {
            font-weight: 300;
            font-size: 16px;
            color: #aaa;
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

        }

        .card-container {
            margin-bottom: 2em;
        }

        .hotel-info {
            background-color: #fff;
            padding: 30px 30px 0px 30px;
        }

        .card-container {
            border-radius: 10px;
        }

        .nav-tabs .nav-link {
            background-color: transparent !important;
            color: #6c757d;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            margin: 5px;
            font-weight: 500;
            font-size: 20px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        div#formule {
            font-size: 18px;
        }

        div#programme {
            font-size: 18px;
        }

        .card {
            border-color: #DDC395;
            margin-bottom: 2em;
        }

        .card:hover {
            border-color: #DDC395;
            background-color: #F7F2E8;
        }

        .flight-details {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            background-color: #3330;
            color: white;
            padding: 15px;
            border: 2px solid #fff;
            border-radius: 10px;
            margin-bottom: 2em;
            width: 60%;
            /* Adjust this width as needed */
            margin-left: auto;
            /* Center horizontally */
            margin-right: auto;
            /* Center horizontally */
        }

        .detail-item {
            text-align: center;
        }

        .detail-item i {
            display: block;
            font-size: 24px;
            /* Adjust as needed */
            margin-bottom: 5px;
        }

        .label {
            font-weight: bold;
        }

        @media (max-width: 900px) {
            .price {
                margin: auto;
                height: 60px !important;
                /* width: 116px; */
            }
        }

        @media (max-width: 768px) {
            .detail-item {
                flex-basis: 100%;
                /* Each item takes up a full row */
                margin-bottom: 15px;
                /* More spacing on smaller screens */
            }

            .price-info {
                margin-left: 3em !important;
            }

            i.fas.fa-plane-departure {
                margin-top: 1em !important;
            }
        }

        .modal .card-container {
            background-color: #ffffff !important;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease;
            margin-bottom: 10px;
        }

        .modal .card-container:hover {
            background-color: #F7F2E8 !important;

        }

        span.city-badge.badge.bg-secondary {
            background-color: #000 !important;
        }

        .detail-item i {
            display: block;
            font-size: 24px;
            /* Adjust as needed */
            margin-bottom: 5px;
        }

        .label {
            font-weight: bold;
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

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
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

        .btn-default[disabled] {
            background-color: #eee;
        }

        button.btn.btn-primary.nextBtn {
            margin-top: 1em;
        }

        button.btn.btn-secondary.prevBtn {
            margin-top: 1em;
        }

        .modal .departure-info,
        .modal .arrival-info {
            display: flex;
            align-items: left;
            flex-direction: column;
        }

        .modal .city-badge {
            background-color: #007bff;
            color: white;
            font-size: 0.8rem;
            border-radius: 20px;
            padding: 4px 8px;
            margin-right: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal .departure-info strong,
        .modal .arrival-info strong {
            font-size: 1rem;
            font-weight: 500;
        }

        .modal .price-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
        }

        .modal .price-info span {
            font-size: 1.1rem;
            font-weight: 600;
            margin-right: 10px;
        }

        .modal .airline-logo {
            max-width: 50px;
            filter: grayscale(30%);
            transition: filter 0.3s ease;
        }

        button.btn.btn-primary:hover {
            background-color: #000;
            color: #fff;
        }

        button.btn.btn-secondary {
            background-color: #fff0;
        }

        button.btn.btn-secondary:hover {
            background-color: #DAC392 !important;
        }

        button.btn.btn-secondary.prevBtn {
            color: #000 !important;
        }

        button.btn.btn-secondary.prevBtn:hover {
            color: #fff !important;
            background-color: #000;
        }

        .nav-tabs .nav-link {
            background-color: transparent !important;
            color: #6c757d;
            border: none;
            border-radius: 25px;
            padding: 10px 20px;
            margin: 5px;
            font-weight: 500;
            font-size: 16px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        /* Option 1: Simple Gold Stars */
        .title .star {
            color: gold;
            font-size: 24px;
            /* Adjust size as needed */
            margin-right: 2px;
            /* Add spacing between stars */
        }

        /* Option 2: Gradient Stars */
        .title .star {
            font-size: 24px;
            background: linear-gradient(to right, #FFD700, #FFA500);
            /* Gold gradient */
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Option 3: 3D-ish Stars */
        .title .star {
            font-size: 24px;
            color: gold;
            text-shadow: 2px 2px 2px #888;
            /* Subtle shadow */
        }

        /* Option 4: Stars with Outline */
        .title .star {
            font-size: 24px;
            color: #FFD700;
            -webkit-text-stroke: 1px #FFA500;
            /* Outline color */
        }

        .product_card {
            width: 280px;
            height: 400px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px;
            transition: 0.3s;
            border: 2px solid rgb(236, 236, 236);
            position: relative;
        }

        .product_card img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 16px 16px 0 0;
        }

        .product_card .product_info {
            padding: 10px;
            font: 14px 'Poppins', sans-serif;
        }

        .colors {
            display: flex;
            gap: 5px;
            margin: 5px 0;
            align-items: center;
        }

        .colors .color {
            width: 15px;
            height: 15px;
            border-radius: 10px;
        }

        .colors .color:nth-child(1) {
            border: 2px solid rgb(252, 252, 252);
            box-shadow: 0 0 0 1px rgba(37, 37, 37, 0.505);
        }

        .bottom {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 10px;
        }

        .bottom .price {
            font-size: 20px;
            font-weight: 600;
        }

        .bottom .add_to_cart {
            padding: 8px 15px;
            border-radius: 20px;
            border: none;
            background: #fff;
            color: #111111;
            font-size: 14px;
            cursor: pointer;
            border: 3px solid rgba(0, 0, 0, 0.17);
            transition: 0.3s ease;
        }

        .add_to_cart:hover {
            background: #111111b8;
            color: #fff;
        }

        .add_to_wishlist {
            position: absolute;
            padding: 5px;
            border-radius: 20px;
            width: 20px;
            height: 20px;
            background: #ffffff9b;
            color: #111111;
            border: none;
            right: 5px;
            top: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .product_name {
            font-size: 18px;
            font-weight: 600;
            margin: 0;
        }

        .product_description {
            font-size: 14px;
            color: #292828;
            margin-top: 5px;
        }

        .row>* {

            padding-right: 0px !important;
            padding-left: 0px !important;
        }

        .col-md-6.mb-4 {
            padding-right: 1em !important;
        }

        .col-md-3 {
            padding-right: 1em !important;
            padding-left: 1em !important;
        }




        .product_card {
            width: 280px;
            height: 350px;
            background: #fff;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            margin: 20px;
            transition: 0.3s;
            border: 2px solid rgb(236, 236, 236);
            position: relative;
        }

        .btn-cnfrm {
            background-color: #2fc681;
            color: white;
            padding: 8px 20px;
            border: 0px;
            border-radius: 5px;
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
        }

        .product_info {
            margin-top: 1em;
        }

        .product_info {
            margin-left: 1em;
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
            transition: transform .6s ease-in-out;
        }

        @media (max-width: 600px) {
            .hotel-info {
                background-color: #fff;
                padding: 30 30px 0px 30px !important;
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
    </style>
</head>

<body>
    <?php
    // Inclure le fichier de connexion à la base de données
    include '../db.php';

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

            <header>
                <div class="container">
                    <button onclick="window.location.href = document.referrer || 'index.php';" class="back-button">
                        <i class="fas fa-arrow-left"></i> </button>
                    <div class="badge-custom">Départ de </div>
                    <h1><?php echo $nom_package; ?></h1>
                    <h2> <?php echo $nom_type_formule; ?></h2>
                    <div class="flight-details">
                        <div class="detail-item">
                            <i class="fas fa-hotel"></i> <span class="label">Séjour:</span>
                            <?php echo $formule_data['duree_sejour']; ?> Jours
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-euro"></i> <span class="label">à partir de:</span>
                            <?php
                            $price = $formule_data['prix_chambre_quadruple'];
                            $formatted_price = number_format($price, 0, ',', ' '); // Format price without decimals
                            echo $formatted_price . " €";
                            ?>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-plane-departure"></i> <span class="label">Aller:</span>
                            <?php
                            $originalDate = $formule_data['date_depart'];
                            $dateObject = new DateTime($originalDate);
                            $formattedDate = $dateObject->format('d/m/Y');
                            echo $formattedDate;
                            ?>
                        </div>
                        <div class="detail-item">
                            <i class="fas fa-plane-arrival"></i> <span class="label">Retour:</span>
                            <?php
                            $originalDate = $formule_data['date_retour'];
                            $dateObject = new DateTime($originalDate);
                            $formattedDate = $dateObject->format('d/m/Y');
                            echo $formattedDate;
                            ?>
                        </div>


                    </div>

                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stepperModal">
                        Réserver
                        Maintenant
                    </button>
                    <button class="btn btn-secondary" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Autres
                        dates</button>

                </div>
            </header>

            <div class="container details-section" style="margin-top:2em">


                <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="formule-tab" data-bs-toggle="tab" data-bs-target="#formule"
                            type="button" role="tab" aria-controls="formule" aria-selected="true"><b>Pourquoi choisir la
                                <?php echo $nom_type_formule; ?></button> </b>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="hebergements-tab" data-bs-toggle="tab" data-bs-target="#hebergements"
                            type="button" role="tab" aria-controls="hebergements"
                            aria-selected="false"><b>Hébergements</b></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="vols-tab" data-bs-toggle="tab" data-bs-target="#vols" type="button"
                            role="tab" aria-controls="vols" aria-selected="false"><b>Vols</b></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="programme-tab" data-bs-toggle="tab" data-bs-target="#programme"
                            type="button" role="tab" aria-controls="programme" aria-selected="false"><b>Programme du
                                séjour</b></button>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">

                    <div class="tab-pane fade show active shadow" id="formule" role="tabpanel" aria-labelledby="formule-tab">
                        <?php echo $formule_data['description']; ?>
                    </div>

                    <div class="tab-pane fade" id="hebergements" role="tabpanel" aria-labelledby="hebergements-tab">
                        <div class="row">
                            <?php
                            // Assuming $conn is your existing database connection
                            $sql_hebergements = "SELECT * FROM hebergements WHERE formule_id = ?";
                            $stmt_hebergements = mysqli_prepare($conn, $sql_hebergements);
                            mysqli_stmt_bind_param($stmt_hebergements, "i", $formule_data['id']);
                            mysqli_stmt_execute($stmt_hebergements);
                            $result_hebergements = mysqli_stmt_get_result($stmt_hebergements);

                            if (mysqli_num_rows($result_hebergements) > 0) {
                                while ($hotel = mysqli_fetch_assoc($result_hebergements)) {
                                    ?>
                                    <div class="card-container">
                                        <div class="hotel-image">
                                            <div id="carousel1" class="carousel slide" data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <?php
                                                    // Display gallery images for hotel 1
                                                    $sql_gallery1 = "SELECT image_path FROM hotel_gallery WHERE hotel_id = {$hotel['hotel_id']}";
                                                    $result_gallery1 = mysqli_query($conn, $sql_gallery1);
                                                    $active = true;
                                                    while ($row = mysqli_fetch_assoc($result_gallery1)) {
                                                        echo "<div class='carousel-item" . ($active ? " active" : "") . "'>";
                                                        echo "<div class='image-container'><img  src='" . $row['image_path'] . "' alt='Hotel Image'></div>";
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
                                                    <?php echo $hoteluni['nom']; ?>

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
                                                    <p> <svg style="width:30px;height:30px;margin-right:10px"
                                                            xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255"
                                                            viewBox="0 0 67.255 67.255">
                                                            <g id="Groupe_23" data-name="Groupe 23" transform="translate(-1011 -7560)">
                                                                <circle id="Oval_Copy_12" data-name="Oval Copy 12" cx="33.627"
                                                                    cy="33.627" r="33.627" transform="translate(1011 7560)"
                                                                    fill="#f7f2e8"></circle>
                                                                <g id="Group_3" data-name="Group 3" transform="translate(1025 7578)">
                                                                    <path id="Fill_1" data-name="Fill 1"
                                                                        d="M39.2,32H35.081a.8.8,0,0,1-.8-.789V28.051H5.719V31.21a.8.8,0,0,1-.8.789H.8A.8.8,0,0,1,0,31.21V20.154a3.975,3.975,0,0,1,3.2-3.869V2.779a.792.792,0,0,1,.6-.765,66.144,66.144,0,0,1,32.4,0,.792.792,0,0,1,.6.765V16.285A3.975,3.975,0,0,1,40,20.154V31.21A.8.8,0,0,1,39.2,32ZM4.918,26.471H35.082a.8.8,0,0,1,.8.79v3.158H38.4V23.312H1.6v7.107h5.118V27.26A.8.8,0,0,1,4.918,26.471ZM4,17.783a2.388,2.388,0,0,0-2.4,2.37v1.58H38.4v-1.58A2.387,2.387,0,0,0,36,17.784h5Zm20.225-5.971h6.649A2.711,2.711,0,0,1,33.6,14.5v1.7h1.6V3.4a64.51,64.51,0,0,0-30.4,0v12.81H6.4V14.5a2.711,2.711,0,0,1,2.725-2.69h6.65A2.711,2.711,0,0,1,18.5,14.5v1.7h3V14.5A2.711,2.711,0,0,1,24.224,11.813Zm0,1.579A1.119,1.119,0,0,0,23.1,14.5v1.7H32V14.5a1.119,1.119,0,0,0-1.125-1.111Zm-15.1,0A1.119,1.119,0,0,0,8,14.5v1.7h8.9V14.5a1.119,1.119,0,0,0-1.125-1.111Z"
                                                                        stroke="#000" stroke-miterlimit="10" stroke-width="0.4">
                                                                    </path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <?php echo $hotel['nombre_nuit']; ?> Jours </p>
                                                </ul>
                                                <ul class="trip-advisor">
                                                    <p> <svg style="width:30px;height:30px;margin-right:10px"
                                                            xmlns="http://www.w3.org/2000/svg" width="67.255" height="67.255"
                                                            viewBox="0 0 67.255 67.255">
                                                            <g id="Groupe_21" data-name="Groupe 21" transform="translate(-1011 -7706)">
                                                                <circle id="Oval_Copy_14" data-name="Oval Copy 14" cx="33.627"
                                                                    cy="33.627" r="33.627" transform="translate(1011 7706)"
                                                                    fill="#f7f2e8"></circle>
                                                                <g id="Group_13" data-name="Group 13" transform="translate(1032 7725)">
                                                                    <path id="Fill_1" data-name="Fill 1"
                                                                        d="M6.265,15H5.783a5.3,5.3,0,0,1-4.115-2.066,8.131,8.131,0,0,1-1.4-7.082L.514,4.9C1.285,1.969,3.489,0,6,0c2.535,0,4.74,1.969,5.486,4.9l.24.952a8.133,8.133,0,0,1-1.4,7.082A5.18,5.18,0,0,1,6.265,15ZM6.025,2.3c-1.407,0-2.674,1.26-3.153,3.135l-.241.952a6,6,0,0,0,.963,5.108,2.9,2.9,0,0,0,2.214,1.184h.506a2.9,2.9,0,0,0,2.214-1.184,6,6,0,0,0,.963-5.108l-.241-.952C8.691,3.558,7.395,2.3,6.025,2.3Z"
                                                                        transform="translate(15)"></path>
                                                                    <path id="Line_2" data-name="Line 2" d="M.5.432V18.568"
                                                                        transform="translate(6 14)" fill="none" stroke="#000"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-miterlimit="10" stroke-width="2"></path>
                                                                    <path id="Line_2_Copy" data-name="Line 2 Copy" d="M.5.432V18.568"
                                                                        transform="translate(21 14)" fill="none" stroke="#000"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-miterlimit="10" stroke-width="2"></path>
                                                                    <path id="Fill_7" data-name="Fill 7"
                                                                        d="M6,7A5.926,5.926,0,0,1,0,1.166V0H12V1.166A5.925,5.925,0,0,1,6,7ZM2.616,2.334A3.618,3.618,0,0,0,6,4.667,3.571,3.571,0,0,0,9.384,2.334Z"
                                                                        transform="translate(0 8)"></path>
                                                                    <path id="Fill_9" data-name="Fill 9" d="M0,8H2V0H0Z"></path>
                                                                    <path id="Fill_11" data-name="Fill 11" d="M0,8H2V0H0Z"
                                                                        transform="translate(5)"></path>
                                                                    <path id="Fill_12" data-name="Fill 12" d="M0,8H2V0H0Z"
                                                                        transform="translate(10)"></path>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <?php echo $hotel['type_pension']; ?> </p>

                                                </ul>
                                            </div>

                                            <div class="reviews">
                                                <ul class="stars">
                                                    <p><svg style="width:30px;height:30px;margin-right:10px"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255"
                                                            viewBox="0 0 67.255 67.255">
                                                            <defs>
                                                                <clipPath id="clip-path">
                                                                    <path id="Clip_2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z"
                                                                        fill="none"></path>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="Groupe_24" data-name="Groupe 24"
                                                                transform="translate(-1350.792 -7406)">
                                                                <circle id="Oval_Copy_3" data-name="Oval Copy 3" cx="33.627" cy="33.627"
                                                                    r="33.627" transform="translate(1350.792 7406)" fill="#f7f2e8">
                                                                </circle>
                                                                <g id="Group_8" data-name="Group 8"
                                                                    transform="translate(1368.792 7424)">
                                                                    <path id="Clip_2-2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z"
                                                                        fill="none"></path>
                                                                    <g id="Group_8-2" data-name="Group 8" clip-path="url(#clip-path)">
                                                                        <path id="Fill_1" data-name="Fill 1"
                                                                            d="M30.367,26.993H1.125A1.126,1.126,0,0,1,0,25.868V1.125A1.126,1.126,0,0,1,1.125,0H30.367a1.126,1.126,0,0,1,1.124,1.125V25.868A1.126,1.126,0,0,1,30.367,26.993ZM2.249,2.25V24.744H29.242V2.25Z"
                                                                            transform="translate(0 4.498)"></path>
                                                                        <path id="Fill_3" data-name="Fill 3"
                                                                            d="M30.367,2.249H1.125A1.125,1.125,0,1,1,1.125,0H30.367a1.125,1.125,0,1,1,0,2.249"
                                                                            transform="translate(0 11.247)"></path>
                                                                        <path id="Fill_4" data-name="Fill 4"
                                                                            d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                            transform="translate(4.499 0)"></path>
                                                                        <path id="Fill_5" data-name="Fill 5"
                                                                            d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                            transform="translate(20.245 0)"></path>
                                                                        <path id="Fill_6" data-name="Fill 6"
                                                                            d="M7.873,9a1.129,1.129,0,0,1-.8-.328L.329,1.918A1.124,1.124,0,0,1,1.919.329L8.667,7.076A1.124,1.124,0,0,1,7.873,9Z"
                                                                            transform="translate(17.995 17.997)"></path>
                                                                        <path id="Fill_7" data-name="Fill 7"
                                                                            d="M1.125,9a1.124,1.124,0,0,1-.8-1.919L7.077.329a1.124,1.124,0,0,1,1.59,1.59L1.919,8.667A1.121,1.121,0,0,1,1.125,9Z"
                                                                            transform="translate(17.995 17.997)"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        Check-in : <?php echo $hotel['date_checkin']; ?>

                                                    </p>

                                                </ul>
                                                <ul class="trip-advisor">
                                                    <p><svg style="width:30px;height:30px;margin-right:10px"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255"
                                                            viewBox="0 0 67.255 67.255">
                                                            <defs>
                                                                <clipPath id="clip-path">
                                                                    <path id="Clip_2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z"
                                                                        fill="none"></path>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="Groupe_24" data-name="Groupe 24"
                                                                transform="translate(-1350.792 -7406)">
                                                                <circle id="Oval_Copy_3" data-name="Oval Copy 3" cx="33.627" cy="33.627"
                                                                    r="33.627" transform="translate(1350.792 7406)" fill="#f7f2e8">
                                                                </circle>
                                                                <g id="Group_8" data-name="Group 8"
                                                                    transform="translate(1368.792 7424)">
                                                                    <path id="Clip_2-2" data-name="Clip 2" d="M0,0H31.491V31.491H0Z"
                                                                        fill="none"></path>
                                                                    <g id="Group_8-2" data-name="Group 8" clip-path="url(#clip-path)">
                                                                        <path id="Fill_1" data-name="Fill 1"
                                                                            d="M30.367,26.993H1.125A1.126,1.126,0,0,1,0,25.868V1.125A1.126,1.126,0,0,1,1.125,0H30.367a1.126,1.126,0,0,1,1.124,1.125V25.868A1.126,1.126,0,0,1,30.367,26.993ZM2.249,2.25V24.744H29.242V2.25Z"
                                                                            transform="translate(0 4.498)"></path>
                                                                        <path id="Fill_3" data-name="Fill 3"
                                                                            d="M30.367,2.249H1.125A1.125,1.125,0,1,1,1.125,0H30.367a1.125,1.125,0,1,1,0,2.249"
                                                                            transform="translate(0 11.247)"></path>
                                                                        <path id="Fill_4" data-name="Fill 4"
                                                                            d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                            transform="translate(4.499 0)"></path>
                                                                        <path id="Fill_5" data-name="Fill 5"
                                                                            d="M5.623,6.748A1.125,1.125,0,0,1,4.5,5.623V2.249H2.249V5.623A1.125,1.125,0,1,1,0,5.623v-4.5A1.125,1.125,0,0,1,1.124,0h5.5A1.125,1.125,0,0,1,6.748,1.125v4.5A1.125,1.125,0,0,1,5.623,6.748"
                                                                            transform="translate(20.245 0)"></path>
                                                                        <path id="Fill_6" data-name="Fill 6"
                                                                            d="M7.873,9a1.129,1.129,0,0,1-.8-.328L.329,1.918A1.124,1.124,0,0,1,1.919.329L8.667,7.076A1.124,1.124,0,0,1,7.873,9Z"
                                                                            transform="translate(17.995 17.997)"></path>
                                                                        <path id="Fill_7" data-name="Fill 7"
                                                                            d="M1.125,9a1.124,1.124,0,0,1-.8-1.919L7.077.329a1.124,1.124,0,0,1,1.59,1.59L1.919,8.667A1.121,1.121,0,0,1,1.125,9Z"
                                                                            transform="translate(17.995 17.997)"></path>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        Check-out : <?php echo $hotel['date_checkout']; ?>



                                                    </p>

                                                </ul>
                                            </div>

                                            <div class="reviews">
                                                <ul class="stars">
                                                    <p><svg style="width:30px;height:30px;margin-right:10px"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            xmlns:xlink="http://www.w3.org/1999/xlink" width="67.255" height="67.255"
                                                            viewBox="0 0 67.255 67.255">
                                                            <defs>
                                                                <clipPath id="clip-path">
                                                                    <path id="Clip_4" data-name="Clip 4" d="M0,0H24.745V20.248H0Z"
                                                                        fill="none"></path>
                                                                </clipPath>
                                                            </defs>
                                                            <g id="Groupe_22" data-name="Groupe 22"
                                                                transform="translate(-1350.792 -7560)">
                                                                <circle id="Oval_Copy_11" data-name="Oval Copy 11" cx="33.627"
                                                                    cy="33.627" r="33.627" transform="translate(1350.792 7560)"
                                                                    fill="#f7f2e8"></circle>
                                                                <g id="Group_6" data-name="Group 6"
                                                                    transform="translate(1377.792 7580)">
                                                                    <path id="Fill_1" data-name="Fill 1"
                                                                        d="M1.125,31.491A1.125,1.125,0,0,1,0,30.366V1.124a1.125,1.125,0,0,1,2.25,0V30.366a1.125,1.125,0,0,1-1.125,1.125"
                                                                        transform="translate(0.001 0.004)"></path>
                                                                    <g id="Group_5" data-name="Group 5">
                                                                        <path id="Clip_4-2" data-name="Clip 4" d="M0,0H24.745V20.248H0Z"
                                                                            fill="none"></path>
                                                                        <g id="Group_5-2" data-name="Group 5"
                                                                            clip-path="url(#clip-path)">
                                                                            <path id="Fill_3" data-name="Fill 3"
                                                                                d="M1.126,20.248A1.124,1.124,0,0,1,.708,18.08L20.59,10.126.708,2.172A1.125,1.125,0,1,1,1.542.082l22.494,9a1.125,1.125,0,0,1,0,2.09l-22.493,9A1.147,1.147,0,0,1,1.126,20.248Z"
                                                                                transform="translate(0)"></path>
                                                                        </g>
                                                                    </g>
                                                                </g>
                                                            </g>
                                                        </svg>
                                                        <?php echo $hoteluni['monument']; ?> </p>

                                                </ul>

                                            </div>

                                        </div>


                                        <div class="hotel-price">
                                            <div class="pricing-content">
                                                <div class="guarantee">

                                                    <img style="width:30px;height:30px "
                                                        src="https://preprod4.digietab.tn/storage/2024/03/distance.png"></img>

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

                                                    <h3 style="color:#000"> <strong> <?php echo $hoteluni['ville']; ?>
                                                        </strong></h3>

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
                    </div>


                    <!-- start the vols table -->
                    <div class="tab-pane fade" id="vols" role="tabpanel" aria-labelledby="vols-tab">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <?php
                            // Fetch the logo once based on the first record in vols
                            $sql_logo = "SELECT c.logo 
                 FROM vols v 
                 JOIN compagnies_aeriennes c ON v.compagnie_aerienne_id = c.id 
                 WHERE v.formule_id = ? 
                 LIMIT 1";
                            $stmt_logo = mysqli_prepare($conn, $sql_logo);
                            mysqli_stmt_bind_param($stmt_logo, "i", $formule_data['id']);
                            mysqli_stmt_execute($stmt_logo);
                            $result_logo = mysqli_stmt_get_result($stmt_logo);
                            $comp_logo = mysqli_fetch_assoc($result_logo);
                            ?>
                            <!-- <div class="d-flex justify-content-between align-items-center mb-3"> -->
                            <img src="<?php echo $comp_logo['logo']; ?>" alt="Logo de la compagnie aérienne"
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
                                    mysqli_stmt_bind_param($stmt_vols, "i", $formule_data['id']);
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

                    <!-- end the vols table -->




                    <div class="tab-pane fade" id="programme" role="tabpanel" aria-labelledby="programme-tab">
                        <section class="wrapper">
                            <button class="prev-btn">&#10094;</button>

                            <?php
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
                                            <img src="<?php echo $program['photo']; ?>" alt="<?php echo $program['nom']; ?>"
                                                class="card-img">
                                            <h2 class="card-title"><?php echo $program['nom']; ?></h2>
                                            <p class="card-description"><?php echo $program['description']; ?></p>
                                        </div>
                                        <?php
                                    }
                                }
                            } else {
                                echo "<p>Invalid program data.</p>";
                            }
                            ?>

                            <button class="next-btn">&#10095;</button>
                        </section>

                        <div class="dots-container"></div>
                    </div>



                </div>
            </div>

            </div>

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stepperModal"
                style="display: block; margin-left: auto; margin-right: auto;">
                Réserver Maintenant
            </button>

            <div class="container details-section" style="margin-top:2em">

                <div class="row mb-4">

                    <div class="col-md-12 text-center">



                        <h1>Tarifs</h1>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-3">
                        <div class="card">

                            <div class="card-body text-center" data-toggle="modal" data-target="#stepperModal">
                                <h6><B>Quadruple</B></h6>

                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43">
                                    <g id="icon-quadruple" transform="translate(-44 -17)">
                                        <circle id="Oval_Copy" data-name="Oval Copy" cx="21.5" cy="21.5" r="21.5"
                                            transform="translate(44 17)" fill="#f7f2e8"></circle>
                                        <g id="icon_triple" data-name="icon/triple" transform="translate(44.906 24)">
                                            <g id="Group_20" data-name="Group 20">
                                                <path id="Fill_1" data-name="Fill 1"
                                                    d="M19.49,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.621,32.621,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162a1.987,1.987,0,0,1,1.59,1.939v5.541A.4.4,0,0,1,19.49,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.684H.795v3.562H2.048V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.795,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.812,31.812,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.348ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.559.559,0,0,0-.559-.557Z"
                                                    fill="#c7a150"></path>
                                                <path id="Fill_1_Copy" data-name="Fill 1 Copy"
                                                    d="M19.49,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.621,32.621,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162a1.987,1.987,0,0,1,1.59,1.939v5.541A.4.4,0,0,1,19.49,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.684H.795v3.562H2.048V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.795,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.812,31.812,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.348ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.559.559,0,0,0-.559-.557Z"
                                                    transform="translate(21)" fill="#c7a150"></path>
                                                <path id="Fill_1_Copy_2" data-name="Fill 1 Copy 2"
                                                    d="M19.49,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.621,32.621,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162a1.987,1.987,0,0,1,1.59,1.939v5.541A.4.4,0,0,1,19.49,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.684H.795v3.562H2.048V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.795,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.812,31.812,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.348ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.559.559,0,0,0-.559-.557Z"
                                                    transform="translate(21 18)" fill="#c7a150"></path>
                                                <path id="Fill_1_Copy_2-2" data-name="Fill 1 Copy 2"
                                                    d="M19.49,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.621,32.621,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162a1.987,1.987,0,0,1,1.59,1.939v5.541A.4.4,0,0,1,19.49,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.684H.795v3.562H2.048V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.795,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.812,31.812,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.348ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.559.559,0,0,0-.559-.557Z"
                                                    transform="translate(0 18)" fill="#c7a150"></path>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                                <?php if (!empty($formule_data['prix_chambre_quadruple_promo']) && $formule_data['prix_chambre_quadruple_promo'] != "0.00" && $formule_data['prix_chambre_quadruple_promo'] != $formule_data['prix_chambre_quadruple']): ?>
                                    <div class="price-discounted">
                                        <?php echo number_format($formule_data['prix_chambre_quadruple'], 0, ',', ' '); ?>€
                                    </div>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_quadruple_promo'], 0, ',', ' '); ?>€
                                        <span class="badge bg-danger ">Promo</span>
                                    </div>
                                <?php else: ?>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_quadruple'], 0, ',', ' '); ?>€
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">

                            <div class="card-body text-center" data-toggle="modal" data-target="#stepperModal">
                                <h6><B>Triple</B></h6>

                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43">
                                    <g id="icon-triple" transform="translate(-44 -17)">
                                        <circle id="Oval_Copy" data-name="Oval Copy" cx="21.5" cy="21.5" r="21.5"
                                            transform="translate(44 17)" fill="#f7f2e8"></circle>
                                        <g id="icon_triple" data-name="icon/triple" transform="translate(45.377 26)">
                                            <path id="Fill_1" data-name="Fill 1"
                                                d="M19.489,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.62,32.62,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162A1.989,1.989,0,0,1,19.887,10.1v5.541A.4.4,0,0,1,19.489,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.683H.8v3.562H2.047V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.8,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.827,31.827,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.349ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.558.558,0,0,0-.559-.557Z"
                                                transform="translate(0 0)" fill="#c7a150"></path>
                                            <path id="Fill_1_Copy" data-name="Fill 1 Copy"
                                                d="M19.489,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.62,32.62,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162A1.989,1.989,0,0,1,19.887,10.1v5.541A.4.4,0,0,1,19.489,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.683H.8v3.562H2.047V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.8,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.827,31.827,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.349ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.558.558,0,0,0-.559-.557Z"
                                                transform="translate(21.17 0)" fill="#c7a150"></path>
                                            <path id="Fill_1_Copy_2" data-name="Fill 1 Copy 2"
                                                d="M19.489,16.038H17.441a.4.4,0,0,1-.4-.4V14.059H2.843v1.583a.4.4,0,0,1-.4.4H.4a.4.4,0,0,1-.4-.4V10.1A1.987,1.987,0,0,1,1.591,8.162V1.393a.4.4,0,0,1,.3-.383A32.62,32.62,0,0,1,18,1.01a.4.4,0,0,1,.3.383V8.162A1.989,1.989,0,0,1,19.887,10.1v5.541A.4.4,0,0,1,19.489,16.038ZM2.445,13.267h15a.4.4,0,0,1,.4.4v1.583h1.252V11.683H.8v3.562H2.047V13.663A.4.4,0,0,1,2.445,13.267ZM1.988,8.913A1.192,1.192,0,0,0,.8,10.1v.792h18.3V10.1A1.192,1.192,0,0,0,17.9,8.913H1.988Zm10.835-.791H17.5V1.7a31.827,31.827,0,0,0-15.114,0v6.42H6.808V7.268A1.353,1.353,0,0,1,8.162,5.92h3.307a1.353,1.353,0,0,1,1.354,1.349ZM8.162,6.711a.559.559,0,0,0-.559.557v.853h4.424V7.268a.558.558,0,0,0-.559-.557Z"
                                                transform="translate(10.906 17.962)" fill="#c7a150"></path>
                                        </g>
                                    </g>
                                </svg>
                                <?php if (!empty($formule_data['prix_chambre_triple_promo']) && $formule_data['prix_chambre_triple_promo'] != "0.00" && $formule_data['prix_chambre_triple_promo'] != $formule_data['prix_chambre_triple']): ?>
                                    <div class="price-discounted">
                                        <?php echo number_format($formule_data['prix_chambre_triple'], 0, ',', ' '); ?>€
                                    </div>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_triple_promo'], 0, ',', ' '); ?>€
                                        <span class="badge bg-danger">Promo</span>
                                    </div>
                                <?php else: ?>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_triple'], 0, ',', ' '); ?>€
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">

                            <div class="card-body text-center" data-toggle="modal" data-target="#stepperModal">
                                <h6><B>Double</B></h6>

                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43">
                                    <g id="icon-double" transform="translate(-44 -17)">
                                        <circle id="Oval_Copy" data-name="Oval Copy" cx="21.5" cy="21.5" r="21.5"
                                            transform="translate(44 17)" fill="#f7f2e8"></circle>
                                        <g id="icon_double" data-name="icon/double" transform="translate(50.801 35.909)">
                                            <path id="Fill_1" data-name="Fill 1"
                                                d="M29.023,24h-3.05a.593.593,0,0,1-.592-.592V21.038H4.233v2.369A.593.593,0,0,1,3.641,24H.592A.593.593,0,0,1,0,23.408V15.115a2.97,2.97,0,0,1,2.369-2.9V2.084a.593.593,0,0,1,.445-.574,48.365,48.365,0,0,1,23.986,0,.593.593,0,0,1,.445.574v10.13a2.971,2.971,0,0,1,2.369,2.9v8.292A.593.593,0,0,1,29.023,24ZM3.641,19.853H25.974a.593.593,0,0,1,.592.592v2.369H28.43V17.484H1.184v5.331H3.049V20.445A.593.593,0,0,1,3.641,19.853Zm-.681-6.515a1.779,1.779,0,0,0-1.777,1.777V16.3H28.43V15.115a1.779,1.779,0,0,0-1.777-1.777H2.961ZM17.935,8.859h4.923a2.02,2.02,0,0,1,2.018,2.018v1.277h1.186V2.546a47.162,47.162,0,0,0-22.507,0v9.607H4.74V10.876A2.02,2.02,0,0,1,6.757,8.859h4.923A2.02,2.02,0,0,1,13.7,10.876v1.277h2.218V10.876A2.02,2.02,0,0,1,17.935,8.859Zm0,1.184a.834.834,0,0,0-.833.833v1.277H23.69V10.876a.834.834,0,0,0-.833-.833Zm-11.177,0a.834.834,0,0,0-.833.833v1.277h6.589V10.876a.834.834,0,0,0-.833-.833Z"
                                                transform="translate(0 0)" fill="#c7a150"></path>
                                        </g>
                                    </g>
                                </svg>
                                <?php if (!empty($formule_data['prix_chambre_double_promo']) && $formule_data['prix_chambre_double_promo'] != "0.00" && $formule_data['prix_chambre_double_promo'] != $formule_data['prix_chambre_double']): ?>
                                    <div class="price-discounted">
                                        <?php echo number_format($formule_data['prix_chambre_double'], 0, ',', ' '); ?>€
                                    </div>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_double_promo'], 0, ',', ' '); ?>€
                                        <span class="badge bg-danger">Promo</span>
                                    </div>
                                <?php else: ?>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_double'], 0, ',', ' '); ?>€
                                    </div>
                                <?php endif; ?>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">


                            <div class="card-body text-center" data-toggle="modal" data-target="#stepperModal">
                                <h6><B>Individuelle</B></h6>
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43" viewBox="0 0 43 43">
                                    <g id="icon-simple" transform="translate(-44 -17)">
                                        <circle id="Oval_Copy" data-name="Oval Copy" cx="21.5" cy="21.5" r="21.5"
                                            transform="translate(44 17)" fill="#f7f2e8"></circle>
                                        <path id="Fill_1" data-name="Fill 1"
                                            d="M30.38,25H27.188a.619.619,0,0,1-.62-.616V21.915H4.432v2.468a.619.619,0,0,1-.62.616H.62A.619.619,0,0,1,0,24.383V15.745a3.1,3.1,0,0,1,2.48-3.022V2.171a.617.617,0,0,1,.466-.6,50.849,50.849,0,0,1,25.108,0,.617.617,0,0,1,.466.6V12.722A3.1,3.1,0,0,1,31,15.746v8.637A.619.619,0,0,1,30.38,25ZM3.812,20.68H27.189a.619.619,0,0,1,.619.617v2.468H29.76V18.212H1.239v5.553H3.191V21.3A.619.619,0,0,1,3.812,20.68ZM3.1,13.893a1.858,1.858,0,0,0-1.86,1.851v1.234H29.76V15.745a1.858,1.858,0,0,0-1.86-1.851H3.1ZM19.989,12.66H27.28V2.652a49.612,49.612,0,0,0-23.56,0V12.66h6.892V11.33a2.109,2.109,0,0,1,2.111-2.1h5.154a2.109,2.109,0,0,1,2.111,2.1Zm-7.266-2.2a.871.871,0,0,0-.871.868v1.33h6.9V11.33a.87.87,0,0,0-.871-.868Z"
                                            transform="translate(49 34)" fill="#c7a150"></path>
                                    </g>
                                </svg>
                                <?php if (!empty($formule_data['prix_chambre_single_promo']) && $formule_data['prix_chambre_single_promo'] != "0.00" && $formule_data['prix_chambre_single_promo'] != $formule_data['prix_chambre_single']): ?>
                                    <div class="price-discounted">
                                        <?php echo number_format($formule_data['prix_chambre_single'], 0, ',', ' '); ?>€
                                    </div>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_single_promo'], 0, ',', ' '); ?>€
                                        <span class="badge bg-danger">Promo</span>
                                    </div>
                                <?php else: ?>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_chambre_single'], 0, ',', ' '); ?>€
                                    </div>
                                <?php endif; ?>

                            </div>



                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">


                            <div class="card-body text-center" data-toggle="modal" data-target="#stepperModal">
                                <h6><B>Bébé</B></h6>
                                <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" id="Calque_1" x="0px" y="0px"
                                    viewBox="0 0 111.6 111.5" style="enable-background:new 0 0 111.6 111.5;"
                                    xml:space="preserve">
                                    <style type="text/css">
                                        .st0 {
                                            fill: #F7F2E8;
                                        }

                                        .st1 {
                                            fill: #C7A150;
                                        }
                                    </style>
                                    <ellipse id="Oval_Copy" class="st0" cx="55.8" cy="55.7" rx="55.8" ry="55.7">
                                    </ellipse>
                                    <g id="Group_3-2">
                                        <path id="Fill_1" class="st1"
                                            d="M91.7,111.4c-0.9,0-1.7-0.8-1.7-1.7V108H21.6v1.7c0,0.9-0.7,1.7-1.7,1.7c-0.9,0-1.7-0.7-1.7-1.7  c0,0,0-0.1,0-0.1V61.6c-2-0.7-3.4-2.7-3.4-4.8c0-1.1,0.4-2.2,1-3.1c0.7-0.9,1.6-1.5,2.6-1.8c0.4-1.9,1.1-3.7,2-5.4  c1.5-2.7,3.4-5.2,5.7-7.2c3.3-2.9,7-5.1,11.1-6.5c5.9-2.1,12.2-3.2,18.4-3.3c0.5,0,0.9,0.2,1.2,0.5c0.3,0.3,0.5,0.8,0.5,1.2V36  l1.5,4.7h5.2c0.7,0,1.4,0.5,1.6,1.2c0.2,0.7,0,1.5-0.6,1.9L61,46.8l1.6,5c0.3,0.9-0.2,1.9-1.1,2.2C61,54.1,60.5,54,60,53.7  l-4.2-3.1l-4.2,3.1c-0.6,0.4-1.4,0.4-2,0c-0.6-0.4-0.8-1.2-0.6-1.9l1.6-5l-4.2-3.1c-0.6-0.4-0.8-1.2-0.6-1.9  c0.2-0.7,0.9-1.2,1.6-1.2h5.2l1.5-4.7v-3.1c-11,0.7-19.6,3.5-25.3,8.5c-3.3,2.7-5.7,6.5-6.9,10.6c2.6,1.1,3.9,4.1,2.8,6.7  c-0.6,1.3-1.7,2.4-3,2.9v2H90v-2c-2.7-0.9-4.1-3.9-3.1-6.5c0.9-2.7,3.9-4.1,6.5-3.1s4.1,3.9,3.1,6.5c-0.5,1.5-1.7,2.6-3.1,3.1v48.1  C93.4,110.7,92.6,111.4,91.7,111.4z M81.4,67v37.6H90V67H81.4z M33.6,67v37.6h8.5V67H33.6z M69.5,67v37.6H78V67H69.5z M57.5,67  v37.6H66V67H57.5z M45.5,67v37.6h8.5V67H45.5z M21.6,67v37.6h8.5V67H21.6z M91.7,55c-0.9,0-1.7,0.8-1.7,1.7s0.8,1.7,1.7,1.7  c0.9,0,1.7-0.8,1.7-1.7C93.4,55.8,92.6,55,91.7,55z M19.9,55c-0.9,0-1.7,0.8-1.7,1.7s0.8,1.7,1.7,1.7c0.9,0,1.7-0.8,1.7-1.7  C21.6,55.8,20.9,55,19.9,55L19.9,55z M55.8,46.8c0.4,0,0.7,0.1,1,0.3l1,0.7l-0.4-1.1c-0.2-0.7,0-1.5,0.6-1.9l1-0.7h-1.2  c-0.7,0-1.4-0.5-1.6-1.2l-0.4-1.1l-0.4,1.1c-0.2,0.7-0.9,1.2-1.6,1.2h-1.2l1,0.7c0.6,0.4,0.8,1.2,0.6,1.9l-0.4,1.1l1-0.7  C55.1,46.9,55.4,46.8,55.8,46.8z">
                                        </path>
                                    </g>
                                </svg>
                                <?php if (!empty($formule_data['prix_bebe']) && $formule_data['prix_bebe'] != "0.00" && $formule_data['prix_bebe'] != $formule_data['prix_bebe']): ?>
                                    <div class="price-discounted">
                                        <?php echo number_format($formule_data['prix_bebe'], 0, ',', ' '); ?>€
                                    </div>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_bebe'], 0, ',', ' '); ?>€
                                        <span class="badge bg-danger">Promo</span>
                                    </div>
                                <?php else: ?>
                                    <div class="price">
                                        <?php echo number_format($formule_data['prix_bebe'], 0, ',', ' '); ?>€
                                    </div>
                                <?php endif; ?>

                            </div>



                        </div>

                    </div>

                    <div style="margin-bottom: 20px;">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#stepperModal"
                            style="display: block; margin-left: auto; margin-right: auto;">
                            Réserver Maintenant
                        </button>
                    </div>

                </div>



                <div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2"
                    tabindex="-1">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Autres dates</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body row text-center">


                                <?php
                                // Fetch the first formule shown in the first modal to get its type_id and package_id
                                $firstFormuleSql = "SELECT type_id, package_id FROM formules WHERE id = $formule_id AND statut = 'activé'";
                                $firstFormuleResult = mysqli_query($conn, $firstFormuleSql);

                                if ($firstFormuleResult && mysqli_num_rows($firstFormuleResult) > 0) {
                                    $firstFormuleRow = mysqli_fetch_assoc($firstFormuleResult);
                                    $type_id = $firstFormuleRow['type_id'];
                                    $package_id = $firstFormuleRow['package_id'];

                                    $sql_autres_formules = "SELECT f.*, tf.nom as type_nom
                                    FROM formules f
                                    INNER JOIN type_formule_omra tf ON f.type_id = tf.id
                                    WHERE f.type_id = $type_id AND f.package_id = $package_id AND f.id != $formule_id AND f.statut = 'activé'";



                                    $result_autres_formules = mysqli_query($conn, $sql_autres_formules);

                                    if (mysqli_num_rows($result_autres_formules) > 0) {
                                        while ($row = mysqli_fetch_assoc($result_autres_formules)) {
                                            ?>
                                            <a href="showformule.php?formule_id=<?php echo $row['id']; ?>"
                                                class="col-md-12 justify-content-center text-decoration-none formule-item"
                                                style="color:inherit;" target="_blank">
                                                <div class="card card-container">
                                                    <div class="card-body justify-content-between ">
                                                        <div>
                                                            <div class="departure-info">
                                                                <?php
                                                                // Fetch and display package name
                                                                $package_id = $row['package_id'];
                                                                $query_package = "SELECT nom FROM omra_packages WHERE id = ?";  // Querying the correct table (assuming package names are stored here)
                                                                $stmt_package = $conn->prepare($query_package);
                                                                $stmt_package->bind_param("i", $package_id);
                                                                $stmt_package->execute();
                                                                $result_package = $stmt_package->get_result();
                                                                $package = $result_package->fetch_assoc();
                                                                ?>
                                                                <span class="city-badge badge bg-secondary">
                                                                    <?php echo $package['nom'] ?? "Package #" . $package_id; ?>
                                                                </span>
                                                                <strong><i class="fas fa-plane-departure"></i> <b class="delete">Aller:</b>
                                                                    <?php echo date('d M Y', strtotime($row['date_depart'])); ?></strong>
                                                            </div>
                                                            <div class="arrival-info">
                                                                <strong><i class="fas fa-plane-arrival"></i> <b class="delete">Retour:</b>
                                                                    <?php echo date('d M Y', strtotime($row['date_retour'])); ?></strong>
                                                            </div>
                                                        </div>
                                                        <div class="price-info">
                                                            <span>
                                                                <?php
                                                                $price = $row['prix_chambre_quadruple'];
                                                                $formatted_price = number_format($price, 0, ',', ' '); // Format price without decimals
                                                                echo $formatted_price . " €";
                                                                ?>
                                                            </span>
                                                            <?php
                                                            // Assuming $conn is your database connection
                                        
                                                            // Fetch the first compagnie_aerienne_id for the given formule
                                                            $formule_id = $row['id'];

                                                            // Prepare and execute the query to get the first matching vol's compagnie_aerienne_id
                                                            $query_vols = "
    SELECT compagnie_aerienne_id
    FROM vols
    WHERE formule_id = ?
    LIMIT 1
";
                                                            $stmt_vols = $conn->prepare($query_vols);
                                                            $stmt_vols->bind_param("i", $formule_id);
                                                            $stmt_vols->execute();
                                                            $result_vols = $stmt_vols->get_result();
                                                            $vol = $result_vols->fetch_assoc();

                                                            if ($vol) {
                                                                $compagnie_aerienne_id = $vol['compagnie_aerienne_id'];

                                                                // Query to get the logo from compagnies_aeriennes table
                                                                $query_logo = "
        SELECT logo
        FROM compagnies_aeriennes
        WHERE id = ?
    ";
                                                                $stmt_logo = $conn->prepare($query_logo);
                                                                $stmt_logo->bind_param("i", $compagnie_aerienne_id);
                                                                $stmt_logo->execute();
                                                                $result_logo = $stmt_logo->get_result();
                                                                $compagnie = $result_logo->fetch_assoc();

                                                                if ($compagnie) {
                                                                    // Display the logo
                                                                    $logo_path = htmlspecialchars($compagnie['logo']);
                                                                    echo '<img src="' . $logo_path . '" alt="Company Logo" class="airline-logo">';
                                                                } else {
                                                                    echo 'No logo found for the compagnie_aerienne_id.';
                                                                }
                                                            } else {
                                                                echo 'No compagnie_aerienne_id found for this formule.';
                                                            }

                                                            // Debugging: Check for SQL errors
                                                            if ($conn->error) {
                                                                echo 'SQL Error: ' . $conn->error;
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                            <?php
                                        }
                                    } else {
                                        echo "<p>Aucune autre formule disponible pour ce type de formule pour le moment.</p>";
                                    }
                                } else {
                                    echo "<p>Erreur: Aucune formule trouvée pour cet ID.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>
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




                <!-- The  Stepper form Modal -->
                <div class="modal fade" id="stepperModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Réservez Votre Omra</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
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
                                            <a href="#step-2" type="button" class="btn btn-default btn-circle non-clickable"
                                                disabled="disabled">2</a>

                                            <p>Étape 2</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-3" type="button" class="btn btn-default btn-circle non-clickable"
                                                disabled="disabled">3</a>
                                            <p>Étape 3</p>
                                        </div>
                                        <div class="stepwizard-step">
                                            <a href="#step-4" type="button" class="btn btn-default btn-circle non-clickable"
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
                                            <input type="number" class="form-control room-input" id="quadruple" min="0"
                                                required>
                                        </div>
                                        <div class="form-group">
                                            <label for="triple">Chambres Triples :</label>
                                            <input type="number" class="form-control room-input" id="triple" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="double">Chambres Doubles :</label>
                                            <input type="number" class="form-control room-input" id="double" min="0">
                                        </div>
                                        <div class="form-group">
                                            <label for="single">Chambres Simples :</label>
                                            <input type="number" class="form-control room-input" id="single" min="0">
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
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                wrapper.scrollTo({ left: scrollAmount, behavior: "smooth" });
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
                                $target.find('input:eq(0)').focus();

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
                                recapReservation += '<strong>Chambres :</strong><br>';
                                if (quadrupleRooms > 0) {
                                    recapReservation += '- Chambre Quadruple: ' + prixQuadruple.toFixed(2) + ' € x ' + quadrupleRooms + '<br>';
                                }
                                if (tripleRooms > 0) {
                                    recapReservation += '- Chambre Triple: ' + prixTriple.toFixed(2) + ' € x ' + tripleRooms + '<br>';
                                }
                                if (doubleRooms > 0) {
                                    recapReservation += '- Chambre Double: ' + prixDouble.toFixed(2) + ' € x ' + doubleRooms + '<br>';
                                }
                                if (singleRooms > 0) {
                                    recapReservation += '- Chambre Simple: ' + prixSingle.toFixed(2) + ' € x ' + singleRooms + '<br>';
                                }
                                recapReservation += '<br>';

                                if (recapExtras !== '') {
                                    recapReservation += '<strong>Extras :</strong><br>';
                                    recapReservation += recapExtras;
                                    recapReservation += '<br>';
                                }

                                if (babiesCount > 0) {
                                    recapReservation += '<strong>Frais bébé :</strong><br>';
                                    recapReservation += '- Frais bébé: ' + fraisBebe.toFixed(2) + ' € x ' + babiesCount + '<br>';
                                    recapReservation += '<br>';
                                }

                                recapReservation += '<strong>Coûts :</strong><br>';
                                recapReservation += '- Total des chambres : ' + totalChambres.toFixed(2) + ' €<br>';
                                recapReservation += '- Total frais bébé : ' + totalFraisBebe.toFixed(2) + ' €<br>';
                                recapReservation += '- Réduction enfants : -' + discountEnfants.toFixed(2) + ' €<br><br>';
                                recapReservation += '<strong>Total à payer :</strong><br>';
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

                                            if (data.success) {
                                                // Réservation réussie
                                                $('#total-reservation').html('<h3>Réservation réussie !</h3>');
                                                window.parent.location.href = "https://www.albayt.fr/merci-etre-rappele/";

                                                // Optionnel : Réinitialiser le formulaire ou fermer la modal
                                                // $('#stepperModal').modal('hide');
                                                // goToStep(1);
                                            } else {
                                                // Échec de la réservation
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
                            $(prevStepWizard.attr('href')).find('input:eq(0)').focus();

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
</body>



</html>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- jQuery (nécessaire pour les plugins JavaScript de Bootstrap) -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Incluez tous les plugins compilés (ci-dessous), ou incluez-les singlement selon les besoins -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>