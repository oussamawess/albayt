<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omra Packages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-4vD1HlZu6+YxvY2k3wuNv5M0stt41LJl6LidP6H9MVXy1HfTm0pCLyOg2j0/yDLVPe2fxJ1CwXO2xLZJHEG9Lg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        .card-body a {
            text-decoration: none !important;
            /* Remove underline */
            color: inherit !important;
            /* Use the default text color */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .container {
            width: 90%;
            margin: auto;
            padding: 20px;
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        .card {
            background-color: #FFF;
            box-shadow: 0 0 0 1px rgba(0, 0, 0, 0.05), 0 20px 50px 0 rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            overflow: hidden;
            padding: 1.25rem;
            position: relative;
            transition: .15s ease-in;
        }

        .card.cardnew {
            position: relative;
            overflow: hidden;
            display: flex;
            border-radius: 4px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.14), 0 3px 1px -2px rgba(0, 0, 0, 0.12), 0 1px 5px 0 rgba(0, 0, 0, 0.2);
            transition: box-shadow 0.56s ease-in-out;
        }

        .card.cardnew:hover {
            cursor: pointer;
            box-shadow: 0 24px 38px 3px rgba(0, 0, 0, 0.14), 0 9px 46px 8px rgba(0, 0, 0, 0.12), 0 11px 15px -7px rgba(0, 0, 0, 0.2);
        }

        .card__titlenew {
            position: absolute;
            bottom: 10% !important;
            left: 50% !important;
            transform: translate(-50%, 50%);
            color: rgba(255, 255, 255, 0.90);
            font-size: 1.5rem;
            line-height: 1;
            font-weight: 400;
            text-align: center;
            z-index: 2;
            margin-bottom: 0.5em;
        }

        .card__thumbnailnew {
            position: relative;
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .card__thumbnailnew::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0) 0%, rgba(0, 0, 0, 0.5) 100%);
            z-index: 1;
        }

        .card__thumbnailnew>img {
            height: 100%;
        }

        .card a {
            text-decoration: none;
            color: inherit;
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

        .btn-primary {
            color: #fff;
            background-color: #dac392;
            border-color: #dac392;
        }

        .btn-primary:hover {
            color: #fff;
            background-color: #000;
            border-color: #dac392;
        }

        .card.col-md-12 {
            margin-bottom: 1em;
            color: #000 !important;
        }

        }

        @media (min-width: 1200px) {
            .container {
                max-width: 1300px;
            }
        }

        @media (min-width: 576px) {
            .espace {
                padding-left: 7em;
            }

            .card.col-md-3 {
                margin-left: 1em;
                margin-right: 1em;
                margin-bottom: 2em;
            }

            .modal-dialog {
                max-width: 50em !important;
                margin: 1.75rem auto;
            }

            .modal-body.row.text-center {
                margin: 15px;
            }

            .card.col-md-5.justify-content-center {
                margin-left: 3em;
            }

            .departure-info {
                display: contents !important;
            }
        }

        .card-body-new {
            text-align: left;
        }

        @media (max-width: 576px) {
            .card.col-md-5.justify-content-center {
                width: 90%;
                margin-left: 1em;
                margin-bottom: 2em;
                margin-top: 1em;
            }

            b.delete {
                display: none;
            }

            i.fas.fa-plane-departure {
                margin-top: 8px;
            }

            .modal-content.modal-updates {
                height: 50em !important;
            }
        }


        .card.cardnew.col-md-3 {
            padding: 0px !important;
        }

        .card.cardnew.col-md-3 {
            margin-bottom: 2em;
        }

        .modal-updates {
            max-height: 100%;
            min-height: 41em !important;
            overflow: hidden;
        }

        svg.icon {
            width: 30px;
            height: 30px;
            color: #dac392;
            float: left
        }

        h5.card-title {
            margin-bottom: 1em;
        }

        h5.card-title {
            text-align: center;
        }

        .card.col-md-5.justify-content-center {
            border-color: #F4F4F4;
        }

        .card.col-md-5.justify-content-center:hover {
            border-color: #DDC395;
            background-color: #F7F2E8;
        }

        button.btn.btn-secondary {
            background-color: #fff0;
            color: #000;
        }

        button.btn.btn-secondary:hover {
            background-color: #000;
            color: #fff;
        }

        p.label {
            margin-left: 3em;
        }

        .btn-primary:hover {
            color: #fff !important;
            background-color: #000;
            border-color: #dac392;
        }

        span.city-badge.badge.bg-secondary {
            background-color: #000 !important;
        }

        .card.col-md-12 {
            margin-bottom: 1em;
            color: #000 !important;
            border-color: #ceab63;
        }

        .card.col-md-12:hover {
            background-color: #F7F2E8
        }
    </style>
</head>

<body>


    <main class="container py-5">
        <div class="row espace">
            <?php
            include 'db.php';

            $sql = "SELECT * FROM omra_packages";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while ($row_package = mysqli_fetch_assoc($result)) {
                    $package_id = $row_package['id'];
                    ?>

                    <div class="card cardnew col-md-3">
                        <a href="#" data-bs-toggle="modal" data-bs-target="#formuleModal<?php echo $package_id; ?>">
                            <figure class="card__thumbnailnew">
                                <img src="<?php echo $row_package['photo']; ?>" class="card-img-top"
                                    alt="<?php echo $row_package['nom']; ?>">
                                <span class="card__titlenew"><?php echo $row_package['nom']; ?> <br>
                                    <button class="btn btn-link" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFormule<?php echo $package_id; ?>" aria-expanded="false"
                                        aria-controls="collapseFormule<?php echo $package_id; ?>">
                                        En savoir plus
                                    </button>
                                </span>

                            </figure>

                        </a>
                    </div>

                    <div class="collapse" id="collapseFormule<?php echo $package_id; ?>">
                        <div class="card card-body">
                            <h5 class="card-title">Formules <?php echo $row_package['nom']; ?></h5>
                            <div class="modal-body row text-center">
                                <?php
                                $sql_types_formules = "SELECT * FROM type_formule_omra WHERE formule_parent_id = $package_id";
                                $result_types_formules = mysqli_query($conn, $sql_types_formules);

                                if (mysqli_num_rows($result_types_formules) > 0) {
                                    while ($row_type_formule = mysqli_fetch_assoc($result_types_formules)) {
                                        $type_id = $row_type_formule['id'];

                                        $sql_formules = "SELECT * FROM formules WHERE type_id = $type_id AND package_id = $package_id AND statut = 'activé' ORDER BY prix_chambre_quadruple ASC";
                                        $result_formules = mysqli_query($conn, $sql_formules);

                                        if (mysqli_num_rows($result_formules) > 0) {
                                            $formules = [];
                                            while ($row_formule = mysqli_fetch_assoc($result_formules)) {
                                                $formules[] = $row_formule;
                                            }
                                            $formule_moins_chere = $formules[0];
                                            ?>
                                            <div class="card col-md-5 justify-content-center">
                                                <div class=" card-body ">
                                                    <h5 class="card-title"><b><?php echo $row_type_formule['nom']; ?></b></h5>
                                                    <div class="card-body-new">

                                                        <div class="info-group">
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" id="Calque_1" x="0px" y="0px"
                                                                viewBox="0 0 98 98" style="enable-background:new 0 0 98 98;"
                                                                xml:space="preserve">
                                                                <style type="text/css">
                                                                    .st0 {
                                                                        fill: #FFFFFF;
                                                                    }

                                                                    .st1 {
                                                                        fill: #C7A150;
                                                                    }
                                                                </style>
                                                                <circle id="Oval_Copy" class="st0" cx="49" cy="49" r="49"></circle>
                                                                <g>
                                                                    <path class="st1"
                                                                        d="M83.3,81.8h-5.2c0.2-1.5,0.4-3,0.4-4.5c0-5.8-1-10.2-2.9-13.6c-1.8-2.9-4.3-5.2-7.4-6.8  c-1.1-0.7-2.3-1.3-3.5-1.9c-4.8-2.6-10.3-5.5-14.9-12.4c-0.1-0.1-0.2-0.2-0.2-0.2c-0.4-0.3-1-0.2-1.2,0.2c-1.8,2.7-4.1,5.1-6.6,7.2  v-13c0.7,0.2,1.5,0.2,2.3,0.2c2.3,0,4.5-0.7,6.4-2.1c0.4-0.3,0.5-0.8,0.2-1.2c-0.3-0.4-0.8-0.5-1.2-0.2c-1.6,1.1-3.4,1.7-5.4,1.7  c-4.7,0-8.7-3.5-9.2-8.2c-0.6-5.1,3.1-9.7,8.1-10.2c0.4-0.1,0.8-0.4,0.8-0.9c0-0.5-0.4-0.9-0.9-0.9h0c0,0-0.1,0-0.1,0  c-4,0.5-7.5,3.1-9,6.9c-2.2,5.7,0.5,12.1,6.2,14.3v14.9c-2.1,1.4-4.3,2.7-6.6,3.9c-1.2,0.6-2.4,1.3-3.5,1.9c-3,1.6-5.5,4-7.4,6.8  c-2,3.3-2.9,7.8-2.9,13.6c0,1.5,0.1,3,0.4,4.5h-5.2c-0.5,0-0.9,0.4-0.9,0.9v7.7c0,0.5,0.4,0.9,0.9,0.9h68.6c0.5,0,0.9-0.4,0.9-0.9  v-7.7C84.2,82.2,83.8,81.8,83.3,81.8z M24,64.7c1.7-2.6,4-4.8,6.7-6.2c1.1-0.6,2.2-1.2,3.3-1.8c4.8-2.5,10.2-5.5,14.9-12  c4.7,6.5,10.2,9.4,14.9,12c1.2,0.6,2.3,1.2,3.3,1.8c2.8,1.5,5.1,3.6,6.7,6.2c1.8,3.1,2.7,7.2,2.7,12.7c0,1.5-0.1,3-0.4,4.5H21.7  c-0.3-1.5-0.4-3-0.4-4.5C21.3,71.8,22.2,67.7,24,64.7z M82.4,89.5H15.6v-5.9h66.8V89.5z">
                                                                    </path>
                                                                    <path class="st1"
                                                                        d="M42.5,25.7c0.1,0.3,0.3,0.6,0.7,0.7l1.4,0.3h0l0.4,0.1l0.1,0.4l0.3,1.4c0.1,0.5,0.6,0.8,1,0.7  c0.3-0.1,0.6-0.3,0.7-0.7l0.3-1.4v0l0.1-0.4l0,0h0l0.3-0.1h0l1.4-0.3c0.5-0.1,0.8-0.6,0.7-1c-0.1-0.4-0.3-0.6-0.7-0.7l-1.4-0.3h0  l-0.4-0.1l-0.1-0.4v0v0l-0.1-0.4c0,0,0,0,0,0l-0.2-1c-0.1-0.4-0.5-0.7-0.9-0.7c-0.4,0-0.7,0.3-0.8,0.7l-0.1,0.3c0,0,0,0,0,0  l-0.2,1.1L45,24.3l-0.4,0.1l-1.4,0.3C42.7,24.7,42.4,25.2,42.5,25.7z">
                                                                    </path>
                                                                </g>
                                                            </svg>
                                                            <p class="label"> <b>Séjour:</b>
                                                                <?php echo $formule_moins_chere['duree_sejour']; ?></p>
                                                        </div>
                                                        <div class="info-group">
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="98" height="102"
                                                                viewBox="0 0 98 102">
                                                                <defs>
                                                                    <clipPath id="clip-path">
                                                                        <path id="Clip_4" data-name="Clip 4" d="M0,0H16V17H0Z" fill="none">
                                                                        </path>
                                                                    </clipPath>
                                                                </defs>
                                                                <g id="Groupe_7" data-name="Groupe 7" transform="translate(-750 -2250)">
                                                                    <circle id="Oval_Copy_3" data-name="Oval Copy 3" cx="49" cy="49" r="49"
                                                                        transform="translate(750 2250)" fill="#fff"></circle>
                                                                    <g id="Group_17" data-name="Group 17" transform="translate(753 2272)">
                                                                        <path id="Fill_1" data-name="Fill 1"
                                                                            d="M2.374,70h0A2.4,2.4,0,0,1,.61,69.39c-4.926-4.927,21.155-35.269,35.546-49.659C49.248,6.638,58.8,0,64.558,0a5.328,5.328,0,0,1,3.919,1.523,5.565,5.565,0,0,1,1.488,4.668,18.335,18.335,0,0,1-2.549,6.962c-3.034,5.386-8.8,12.348-17.145,20.69a327.7,327.7,0,0,1-25.827,23.02C16.9,62.856,6.945,70,2.374,70ZM64.5,2.073c-3.556,0-11.11,3.314-26.9,19.1C15.681,43.1-.058,65.83,2.055,67.945a.83.83,0,0,0,.6.19c4.2,0,25.434-15,46.166-35.737,21.5-21.5,19.894-27.743,18.207-29.43A3.425,3.425,0,0,0,64.5,2.073Z"
                                                                            transform="translate(3 7)" fill="#c7a150"></path>
                                                                        <g id="Group_5" data-name="Group 5" transform="translate(0 50)">
                                                                            <path id="Clip_4-2" data-name="Clip 4" d="M0,0H16V17H0Z"
                                                                                fill="none">
                                                                            </path>
                                                                            <g id="Group_5-2" data-name="Group 5"
                                                                                clip-path="url(#clip-path)">
                                                                                <path id="Fill_3" data-name="Fill 3"
                                                                                    d="M8.693,17h0l-.929-1.018C2.621,10.348-1.9,3.4.816.787A3.079,3.079,0,0,1,3.033,0C4.711,0,6.987.848,9.8,2.519A51.4,51.4,0,0,1,15.223,6.3L16,6.913l-.606.773c-2.364,3.017-4.364,5.766-5.944,8.169L8.694,17ZM3.063,2a1.076,1.076,0,0,0-.754.215c-.342.329-.363,1.419.605,3.493a35.084,35.084,0,0,0,5.521,7.91c1.317-1.932,2.887-4.077,4.664-6.373C8.056,3.378,4.541,2,3.063,2Z"
                                                                                    transform="translate(-1)" fill="#c7a150"></path>
                                                                            </g>
                                                                        </g>
                                                                        <path id="Fill_6" data-name="Fill 6"
                                                                            d="M14.081,16h0c-1.541,0-3.591-.792-6.093-2.354A49.989,49.989,0,0,1,1.021,8.235L0,7.3l1.147-.754C3.518,4.99,6.267,2.989,9.315.6l.773-.6L10.7.775c2.054,2.587,8.523,11.271,5.51,14.409A2.829,2.829,0,0,1,14.081,16ZM9.752,2.9C7.445,4.684,5.3,6.253,3.38,7.563c5.347,4.681,9.1,6.342,10.689,6.343a.983.983,0,0,0,.713-.214c.41-.428.228-1.7-.486-3.413A34.219,34.219,0,0,0,9.752,2.9Z"
                                                                            transform="translate(14 64)" fill="#c7a150"></path>
                                                                        <path id="Fill_8" data-name="Fill 8"
                                                                            d="M23.069,39h0l-.762-.823c-4.2-4.537-8.134-9.165-11.687-13.754L1.671,12.857A7.956,7.956,0,0,1,2.34,2.343,8.149,8.149,0,0,1,7.511.012C7.66,0,7.811,0,7.959,0a8.237,8.237,0,0,1,4.987,1.665L24.6,10.548c.31.226.627.483.933.732l.025.021c4.19,3.238,8.441,6.815,12.635,10.632L39,22.67l-.8.752c-1.408,1.33-2.691,2.57-3.922,3.793-3.426,3.4-6.944,7.087-10.457,10.955L23.07,39ZM7.968,2.04c-.11,0-.221,0-.331.009A6.061,6.061,0,0,0,3.792,3.785a5.925,5.925,0,0,0-.493,7.83L12.246,23.18c3.32,4.284,6.957,8.588,10.811,12.791,3.311-3.618,6.6-7.049,9.771-10.2.981-.975,2.016-1.98,3.162-3.073-3.9-3.512-7.83-6.8-11.68-9.776-.337-.274-.641-.52-.95-.749L11.694,3.282A6.153,6.153,0,0,0,7.968,2.04Z"
                                                                            transform="translate(7 0)" fill="#c7a150"></path>
                                                                        <path id="Fill_10" data-name="Fill 10"
                                                                            d="M31.032,39a7.994,7.994,0,0,1-4.875-1.665L14.589,28.388C9.993,24.829,5.362,20.894.823,16.693L0,15.929l.831-.756c3.9-3.547,7.591-7.064,10.957-10.455C12.994,3.5,14.2,2.257,15.581.8l.753-.8.738.811C20.9,5.017,24.473,9.264,27.7,13.435c.3.364.543.668.781.995l8.873,11.632a8.1,8.1,0,0,1-.692,10.59,7.922,7.922,0,0,1-5.129,2.333C31.365,38.995,31.2,39,31.032,39ZM16.3,3.01c-1.053,1.1-2.058,2.139-3.073,3.162-3.165,3.187-6.6,6.474-10.2,9.77,4.215,3.864,8.523,7.5,12.8,10.818L27.4,35.707a5.954,5.954,0,0,0,3.631,1.238c.124,0,.25,0,.373-.012A5.891,5.891,0,0,0,35.217,35.2a6.029,6.029,0,0,0,.518-7.883L26.85,15.666c-.249-.337-.5-.647-.716-.911-3.012-3.9-6.32-7.848-9.832-11.746Z"
                                                                            transform="translate(41 34)" fill="#c7a150"></path>
                                                                        <g id="Group_14" data-name="Group 14" transform="translate(25)">
                                                                            <path id="Fill_12" data-name="Fill 12"
                                                                                d="M8.329,14h0l-.539-.455-.1-.083c-.264-.223-.536-.452-.815-.665L0,7.331l.22-.7A8.2,8.2,0,0,1,2.16,3.4,11.657,11.657,0,0,1,9.672,0a4.224,4.224,0,0,1,3.171,1.2c2.569,2.655.415,8.4-2.137,11.042a8.647,8.647,0,0,1-1.774,1.4l-.6.36ZM9.694,2.089h0A9.747,9.747,0,0,0,3.585,4.876a6.235,6.235,0,0,0-1.192,1.73l5.694,4.528c.136.1.273.211.407.321a6.389,6.389,0,0,0,.787-.689c2.084-2.155,3.549-6.637,2.137-8.1A2.342,2.342,0,0,0,9.694,2.09Z"
                                                                                fill="#c7a150"></path>
                                                                        </g>
                                                                        <path id="Fill_15" data-name="Fill 15"
                                                                            d="M6.67,14h0L1.218,7.141C.964,6.809.706,6.5.456,6.21L0,5.67l.361-.6a8.735,8.735,0,0,1,1.4-1.773A12.424,12.424,0,0,1,9.526,0,4.534,4.534,0,0,1,12.8,1.157,4.225,4.225,0,0,1,14,4.329a11.654,11.654,0,0,1-3.4,7.512,8.212,8.212,0,0,1-3.227,1.941l-.7.218ZM9.55,2.021a10.4,10.4,0,0,0-6.315,2.7,6.557,6.557,0,0,0-.69.787c.129.156.238.3.335.425l4.515,5.678a6.178,6.178,0,0,0,1.729-1.192A9.75,9.75,0,0,0,11.91,4.3a2.31,2.31,0,0,0-.579-1.723A2.488,2.488,0,0,0,9.55,2.021Z"
                                                                            transform="translate(66 41)" fill="#c7a150"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <p class="label">
                                                                <b>Aller:</b>
                                                                <?php echo date('d-m-Y', strtotime($formule_moins_chere['heure_depart'])); ?>
                                                            </p>
                                                        </div>
                                                        <div class="info-group">
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="98" height="102"
                                                                viewBox="0 0 98 102">
                                                                <defs>
                                                                    <clipPath id="clip-path">
                                                                        <path id="Clip_4" data-name="Clip 4" d="M0,0H16V17H0Z" fill="none">
                                                                        </path>
                                                                    </clipPath>
                                                                </defs>
                                                                <g id="Groupe_7" data-name="Groupe 7" transform="translate(-750 -2250)">
                                                                    <circle id="Oval_Copy_3" data-name="Oval Copy 3" cx="49" cy="49" r="49"
                                                                        transform="translate(750 2250)" fill="#fff"></circle>
                                                                    <g id="Group_17" data-name="Group 17" transform="translate(753 2272)">
                                                                        <path id="Fill_1" data-name="Fill 1"
                                                                            d="M2.374,70h0A2.4,2.4,0,0,1,.61,69.39c-4.926-4.927,21.155-35.269,35.546-49.659C49.248,6.638,58.8,0,64.558,0a5.328,5.328,0,0,1,3.919,1.523,5.565,5.565,0,0,1,1.488,4.668,18.335,18.335,0,0,1-2.549,6.962c-3.034,5.386-8.8,12.348-17.145,20.69a327.7,327.7,0,0,1-25.827,23.02C16.9,62.856,6.945,70,2.374,70ZM64.5,2.073c-3.556,0-11.11,3.314-26.9,19.1C15.681,43.1-.058,65.83,2.055,67.945a.83.83,0,0,0,.6.19c4.2,0,25.434-15,46.166-35.737,21.5-21.5,19.894-27.743,18.207-29.43A3.425,3.425,0,0,0,64.5,2.073Z"
                                                                            transform="translate(3 7)" fill="#c7a150"></path>
                                                                        <g id="Group_5" data-name="Group 5" transform="translate(0 50)">
                                                                            <path id="Clip_4-2" data-name="Clip 4" d="M0,0H16V17H0Z"
                                                                                fill="none">
                                                                            </path>
                                                                            <g id="Group_5-2" data-name="Group 5"
                                                                                clip-path="url(#clip-path)">
                                                                                <path id="Fill_3" data-name="Fill 3"
                                                                                    d="M8.693,17h0l-.929-1.018C2.621,10.348-1.9,3.4.816.787A3.079,3.079,0,0,1,3.033,0C4.711,0,6.987.848,9.8,2.519A51.4,51.4,0,0,1,15.223,6.3L16,6.913l-.606.773c-2.364,3.017-4.364,5.766-5.944,8.169L8.694,17ZM3.063,2a1.076,1.076,0,0,0-.754.215c-.342.329-.363,1.419.605,3.493a35.084,35.084,0,0,0,5.521,7.91c1.317-1.932,2.887-4.077,4.664-6.373C8.056,3.378,4.541,2,3.063,2Z"
                                                                                    transform="translate(-1)" fill="#c7a150"></path>
                                                                            </g>
                                                                        </g>
                                                                        <path id="Fill_6" data-name="Fill 6"
                                                                            d="M14.081,16h0c-1.541,0-3.591-.792-6.093-2.354A49.989,49.989,0,0,1,1.021,8.235L0,7.3l1.147-.754C3.518,4.99,6.267,2.989,9.315.6l.773-.6L10.7.775c2.054,2.587,8.523,11.271,5.51,14.409A2.829,2.829,0,0,1,14.081,16ZM9.752,2.9C7.445,4.684,5.3,6.253,3.38,7.563c5.347,4.681,9.1,6.342,10.689,6.343a.983.983,0,0,0,.713-.214c.41-.428.228-1.7-.486-3.413A34.219,34.219,0,0,0,9.752,2.9Z"
                                                                            transform="translate(14 64)" fill="#c7a150"></path>
                                                                        <path id="Fill_8" data-name="Fill 8"
                                                                            d="M23.069,39h0l-.762-.823c-4.2-4.537-8.134-9.165-11.687-13.754L1.671,12.857A7.956,7.956,0,0,1,2.34,2.343,8.149,8.149,0,0,1,7.511.012C7.66,0,7.811,0,7.959,0a8.237,8.237,0,0,1,4.987,1.665L24.6,10.548c.31.226.627.483.933.732l.025.021c4.19,3.238,8.441,6.815,12.635,10.632L39,22.67l-.8.752c-1.408,1.33-2.691,2.57-3.922,3.793-3.426,3.4-6.944,7.087-10.457,10.955L23.07,39ZM7.968,2.04c-.11,0-.221,0-.331.009A6.061,6.061,0,0,0,3.792,3.785a5.925,5.925,0,0,0-.493,7.83L12.246,23.18c3.32,4.284,6.957,8.588,10.811,12.791,3.311-3.618,6.6-7.049,9.771-10.2.981-.975,2.016-1.98,3.162-3.073-3.9-3.512-7.83-6.8-11.68-9.776-.337-.274-.641-.52-.95-.749L11.694,3.282A6.153,6.153,0,0,0,7.968,2.04Z"
                                                                            transform="translate(7 0)" fill="#c7a150"></path>
                                                                        <path id="Fill_10" data-name="Fill 10"
                                                                            d="M31.032,39a7.994,7.994,0,0,1-4.875-1.665L14.589,28.388C9.993,24.829,5.362,20.894.823,16.693L0,15.929l.831-.756c3.9-3.547,7.591-7.064,10.957-10.455C12.994,3.5,14.2,2.257,15.581.8l.753-.8.738.811C20.9,5.017,24.473,9.264,27.7,13.435c.3.364.543.668.781.995l8.873,11.632a8.1,8.1,0,0,1-.692,10.59,7.922,7.922,0,0,1-5.129,2.333C31.365,38.995,31.2,39,31.032,39ZM16.3,3.01c-1.053,1.1-2.058,2.139-3.073,3.162-3.165,3.187-6.6,6.474-10.2,9.77,4.215,3.864,8.523,7.5,12.8,10.818L27.4,35.707a5.954,5.954,0,0,0,3.631,1.238c.124,0,.25,0,.373-.012A5.891,5.891,0,0,0,35.217,35.2a6.029,6.029,0,0,0,.518-7.883L26.85,15.666c-.249-.337-.5-.647-.716-.911-3.012-3.9-6.32-7.848-9.832-11.746Z"
                                                                            transform="translate(41 34)" fill="#c7a150"></path>
                                                                        <g id="Group_14" data-name="Group 14" transform="translate(25)">
                                                                            <path id="Fill_12" data-name="Fill 12"
                                                                                d="M8.329,14h0l-.539-.455-.1-.083c-.264-.223-.536-.452-.815-.665L0,7.331l.22-.7A8.2,8.2,0,0,1,2.16,3.4,11.657,11.657,0,0,1,9.672,0a4.224,4.224,0,0,1,3.171,1.2c2.569,2.655.415,8.4-2.137,11.042a8.647,8.647,0,0,1-1.774,1.4l-.6.36ZM9.694,2.089h0A9.747,9.747,0,0,0,3.585,4.876a6.235,6.235,0,0,0-1.192,1.73l5.694,4.528c.136.1.273.211.407.321a6.389,6.389,0,0,0,.787-.689c2.084-2.155,3.549-6.637,2.137-8.1A2.342,2.342,0,0,0,9.694,2.09Z"
                                                                                fill="#c7a150"></path>
                                                                        </g>
                                                                        <path id="Fill_15" data-name="Fill 15"
                                                                            d="M6.67,14h0L1.218,7.141C.964,6.809.706,6.5.456,6.21L0,5.67l.361-.6a8.735,8.735,0,0,1,1.4-1.773A12.424,12.424,0,0,1,9.526,0,4.534,4.534,0,0,1,12.8,1.157,4.225,4.225,0,0,1,14,4.329a11.654,11.654,0,0,1-3.4,7.512,8.212,8.212,0,0,1-3.227,1.941l-.7.218ZM9.55,2.021a10.4,10.4,0,0,0-6.315,2.7,6.557,6.557,0,0,0-.69.787c.129.156.238.3.335.425l4.515,5.678a6.178,6.178,0,0,0,1.729-1.192A9.75,9.75,0,0,0,11.91,4.3a2.31,2.31,0,0,0-.579-1.723A2.488,2.488,0,0,0,9.55,2.021Z"
                                                                            transform="translate(66 41)" fill="#c7a150"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <p class="label"> <b>Retour:</b>
                                                                <?php echo date('d-m-Y', strtotime($formule_moins_chere['date_checkout2'])); ?>
                                                            </p>
                                                        </div>
                                                        <div class="info-group">
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg" width="98" height="98"
                                                                viewBox="0 0 98 98">
                                                                <g id="Groupe_6" data-name="Groupe 6" transform="translate(-238 -2250)">
                                                                    <circle id="Oval_Copy_2" data-name="Oval Copy 2" cx="49" cy="49" r="49"
                                                                        transform="translate(238 2250)" fill="#fff"></circle>
                                                                    <g id="Group_15" data-name="Group 15"
                                                                        transform="translate(248.459 2269)">
                                                                        <path id="Stroke_3" data-name="Stroke 3"
                                                                            d="M0,68.918V13.574L38.541,0l37.5,13.574V68.918" fill="none"
                                                                            stroke="#c7a150" stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-miterlimit="10" stroke-width="2"></path>
                                                                        <path id="Stroke_6" data-name="Stroke 6" d="M.5,0V21"
                                                                            transform="translate(38.541 46)" fill="none" stroke="#c7a150"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-miterlimit="10" stroke-width="2"></path>
                                                                        <path id="Stroke_7" data-name="Stroke 7" d="M.5,0V11"
                                                                            transform="translate(38.541)" fill="none" stroke="#c7a150"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-miterlimit="10" stroke-width="2"></path>
                                                                        <path id="Stroke_9" data-name="Stroke 9"
                                                                            d="M75,9.442,38.014,0,0,9.442V18L38.014,8.558,75,18Z"
                                                                            transform="translate(0.541 16)" fill="none" stroke="#c7a150"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-miterlimit="10" stroke-width="2"></path>
                                                                        <path id="Stroke_10" data-name="Stroke 10"
                                                                            d="M11,7.457,0,10V2.543L11,0Z" transform="translate(4.541 36)"
                                                                            fill="none" stroke="#c7a150" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                                                        </path>
                                                                        <path id="Stroke_11" data-name="Stroke 11"
                                                                            d="M11,10,0,7.76V0L11,2.24Z" transform="translate(61.541 36)"
                                                                            fill="none" stroke="#c7a150" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                                                        </path>
                                                                        <path id="Stroke_12" data-name="Stroke 12"
                                                                            d="M9,7.794,0,10V2.206L9,0Z" transform="translate(20.541 33)"
                                                                            fill="none" stroke="#c7a150" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                                                        </path>
                                                                        <path id="Stroke_13" data-name="Stroke 13"
                                                                            d="M9,10,0,7.641V0L9,2.359Z" transform="translate(48.541 33)"
                                                                            fill="none" stroke="#c7a150" stroke-linecap="round"
                                                                            stroke-linejoin="round" stroke-miterlimit="10" stroke-width="2">
                                                                        </path>
                                                                        <path id="Stroke_14" data-name="Stroke 14"
                                                                            d="M8,8.8l-3.9-.98L0,9V1.176L4.1,0,8,.98Z"
                                                                            transform="translate(34.541 31)" fill="none" stroke="#c7a150"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-miterlimit="10" stroke-width="2"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <p class="label"> <b>Hotels: </b> 5 & 4 Etoiles</p>
                                                        </div>
                                                        <div class="info-group">
                                                            <svg class="icon" xmlns="http://www.w3.org/2000/svg"
                                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="98" height="98"
                                                                viewBox="0 0 98 98">
                                                                <defs>
                                                                    <clipPath id="clip-path">
                                                                        <path id="Clip_4" data-name="Clip 4" d="M0,0H43.992V51.1H0Z"
                                                                            transform="translate(0 0)" fill="none"></path>
                                                                    </clipPath>
                                                                </defs>
                                                                <g id="Groupe_4" data-name="Groupe 4" transform="translate(-238 -1883)">
                                                                    <circle id="Oval" cx="49" cy="49" r="49" transform="translate(238 1883)"
                                                                        fill="#fff"></circle>
                                                                    <g id="Group_14" data-name="Group 14" transform="translate(262 1891)">
                                                                        <path id="Fill_1" data-name="Fill 1"
                                                                            d="M41.03,32.977a10.483,10.483,0,0,1-2.8-.367,12.289,12.289,0,0,1-2.6-.96,11.45,11.45,0,0,1-2.119-1.384l-.03-.028a7.247,7.247,0,0,1-.789-.792,3.093,3.093,0,0,0-.256-.311,18.02,18.02,0,0,1-4.719-.791A13.235,13.235,0,0,1,23.4,26.111a11.092,11.092,0,0,1-1.668-1.583,9.238,9.238,0,0,1-1.272-1.893,10.061,10.061,0,0,1-.791-2.063,15.1,15.1,0,0,1-2.345.678,20.389,20.389,0,0,1-3.051.368c-.042.056-.085.105-.126.153s-.087.1-.13.158a5.693,5.693,0,0,1-.819.819,11.3,11.3,0,0,1-2.147,1.384,12.87,12.87,0,0,1-2.6.96,10.737,10.737,0,0,1-2.826.368,8.017,8.017,0,0,1-2.346-.311A6.023,6.023,0,0,1,1.13,23.991a.8.8,0,0,1-.256-.283,1.095,1.095,0,0,1,0-1.073,1.323,1.323,0,0,1,.4-.4l.17-.085A7.448,7.448,0,0,0,2.514,21.7l.195-.086a5.08,5.08,0,0,0,.625-.309l.1-.064a4.012,4.012,0,0,0,.489-.332,1.879,1.879,0,0,0,.368-.31,1.511,1.511,0,0,0,.194-.249l0-.005c.007-.015.016-.031.025-.048a.382.382,0,0,0,.059-.15,1.177,1.177,0,0,0,.085-.453v-.084a9.275,9.275,0,0,1-2.006-1.385,7.5,7.5,0,0,1-1.639-2.176A9.551,9.551,0,0,1,.2,13.507a17.533,17.533,0,0,1-.2-2.8A8.291,8.291,0,0,1,.282,8.478a9.22,9.22,0,0,1,.792-2.091A13.073,13.073,0,0,1,2.345,4.55,10.882,10.882,0,0,1,4.012,3,13.911,13.911,0,0,1,8.336.792,17.964,17.964,0,0,1,13.676,0,17.438,17.438,0,0,1,18.65.707a13.582,13.582,0,0,1,4.126,1.949,10.9,10.9,0,0,1,3,3.023A11.092,11.092,0,0,1,26.7,7.517c.1.313.223.668.311,1.018.113-.043.235-.079.353-.113s.24-.071.353-.113a18.031,18.031,0,0,1,5.341-.791,17.554,17.554,0,0,1,5.285.791,13.684,13.684,0,0,1,4.295,2.2,10.852,10.852,0,0,1,1.668,1.554A9.6,9.6,0,0,1,45.579,13.9a9.218,9.218,0,0,1,.791,2.091,8.308,8.308,0,0,1,.284,2.233,17.535,17.535,0,0,1-.2,2.8,9.549,9.549,0,0,1-.819,2.543A7.52,7.52,0,0,1,44,25.743,8.081,8.081,0,0,1,42.019,27.1v.086a1.266,1.266,0,0,0,.056.452,1.594,1.594,0,0,0,.082.192l0,.006c.028.041.062.082.1.122s.073.088.1.131a4.56,4.56,0,0,0,.367.339l.092.061a4.5,4.5,0,0,0,.5.305,6.982,6.982,0,0,0,.819.425,10.1,10.1,0,0,0,1.1.452l.17.085a1.359,1.359,0,0,1,.4.4,1.1,1.1,0,0,1,0,1.075.82.82,0,0,1-.256.282A6.048,6.048,0,0,1,43.4,32.666,8.118,8.118,0,0,1,41.03,32.977ZM33.061,9.665a16.321,16.321,0,0,0-4.691.678,11.96,11.96,0,0,0-3.645,1.865,9.868,9.868,0,0,0-1.357,1.273,8.449,8.449,0,0,0-1.017,1.441,8.151,8.151,0,0,0-.592,1.582,7.035,7.035,0,0,0-.227,1.723,7.256,7.256,0,0,0,.227,1.78,6.286,6.286,0,0,0,.622,1.639,6.379,6.379,0,0,0,.987,1.469,8.41,8.41,0,0,0,1.357,1.3,12.086,12.086,0,0,0,3.645,1.894,16.312,16.312,0,0,0,4.691.679,1.166,1.166,0,0,1,.537.14,1.311,1.311,0,0,1,.4.4.1.1,0,0,0,.014.042.1.1,0,0,1,.015.043,4.4,4.4,0,0,0,.311.452,5.3,5.3,0,0,0,.565.566,9.848,9.848,0,0,0,1.695,1.1,10.976,10.976,0,0,0,2.176.791,8.827,8.827,0,0,0,2.261.311,6.532,6.532,0,0,0,1.3-.113.144.144,0,0,0-.043-.029.147.147,0,0,1-.042-.028,6.938,6.938,0,0,1-.82-.536,3.019,3.019,0,0,1-.621-.566,2.76,2.76,0,0,1-.454-.593,4.3,4.3,0,0,1-.31-.622,3.394,3.394,0,0,1-.17-1.157c0-.142.007-.278.014-.41s.014-.269.014-.41a1.034,1.034,0,0,1,.142-.48,1.312,1.312,0,0,1,.4-.4.147.147,0,0,1,.042-.028.147.147,0,0,0,.042-.028,7.866,7.866,0,0,0,2.035-1.272,5.032,5.032,0,0,0,1.158-1.554,6.248,6.248,0,0,0,.622-1.95,16.4,16.4,0,0,0,.169-2.43A7.028,7.028,0,0,0,44.28,16.5a6.622,6.622,0,0,0-.594-1.582A9.806,9.806,0,0,0,42.7,13.48a9.805,9.805,0,0,0-1.356-1.273A12.4,12.4,0,0,0,37.7,10.343,16.119,16.119,0,0,0,33.061,9.665ZM13.676,2.148a16.314,16.314,0,0,0-4.692.679A11.919,11.919,0,0,0,5.34,4.692,9.692,9.692,0,0,0,3.984,5.963,8.309,8.309,0,0,0,2.966,7.4a8.13,8.13,0,0,0-.593,1.583,7.031,7.031,0,0,0-.226,1.724,16.4,16.4,0,0,0,.169,2.43,6.287,6.287,0,0,0,.621,1.949A5.056,5.056,0,0,0,4.1,16.644a7.851,7.851,0,0,0,2.034,1.273.153.153,0,0,0,.042.027.142.142,0,0,1,.044.029,1.345,1.345,0,0,1,.4.4.884.884,0,0,1,.14.481l0,.026c.027.269.054.548.054.821a3.494,3.494,0,0,1-.2,1.187l-.005.012a4.256,4.256,0,0,1-.306.61,4,4,0,0,1-.438.576l-.014.017a6.047,6.047,0,0,1-.622.537c-.218.146-.486.324-.819.537H4.4c-.023,0-.024,0-.052.029a6.555,6.555,0,0,0,1.273.112A8.884,8.884,0,0,0,7.911,23a10.934,10.934,0,0,0,2.176-.791,10.021,10.021,0,0,0,1.724-1.1l.042-.037a3.268,3.268,0,0,0,.523-.528,2.475,2.475,0,0,0,.339-.481.037.037,0,0,1,.015-.029.036.036,0,0,0,.014-.028,1.305,1.305,0,0,1,.4-.4,1.169,1.169,0,0,1,.537-.142,16.89,16.89,0,0,0,3.22-.311,12.883,12.883,0,0,0,2.12-.65V18.2a9.139,9.139,0,0,1,.282-2.317v-.029a12,12,0,0,1,.82-2.091.036.036,0,0,1,.014-.028.036.036,0,0,0,.014-.028,10.278,10.278,0,0,1,1.3-1.837,13.264,13.264,0,0,1,1.7-1.639h.029A12.73,12.73,0,0,1,24.951,9.1c-.072-.239-.165-.55-.254-.819a6.822,6.822,0,0,0-.735-1.441,8.519,8.519,0,0,0-2.4-2.43,11.666,11.666,0,0,0-3.5-1.639A15.608,15.608,0,0,0,13.676,2.148Z"
                                                                            transform="translate(6.068)" fill="#c7a150"></path>
                                                                        <g id="Group_5" data-name="Group 5"
                                                                            transform="translate(10.009 33.093)">
                                                                            <path id="Clip_4-2" data-name="Clip 4" d="M0,0H43.992V51.1H0Z"
                                                                                transform="translate(0 0)" fill="none"></path>
                                                                            <g id="Group_5-2" data-name="Group 5"
                                                                                clip-path="url(#clip-path)">
                                                                                <path id="Fill_3" data-name="Fill 3"
                                                                                    d="M17.542,51.1A25.968,25.968,0,0,1,13,50.7C4.13,49.088,0,42.315,0,29.383V15a15,15,0,1,1,29.993,0v13a14.683,14.683,0,0,1-1.769,7,28.055,28.055,0,0,1,9.293,3.9c4.15,2.845,6.328,6.6,6.474,11.169a1.009,1.009,0,0,1-.28.73.993.993,0,0,1-.69.311H17.542ZM14.956,2.179A12.925,12.925,0,0,0,2.03,15V29.383c0,11.958,3.5,17.925,11.356,19.346a23.806,23.806,0,0,0,4.179.371l.271,0h24.1C40.732,38.777,26.656,36.721,26.514,36.7a1.02,1.02,0,0,1-.69-1.589,12.565,12.565,0,0,0,2.2-7.1v-13A12.928,12.928,0,0,0,15.1,2.179h-.143Z"
                                                                                    transform="translate(0 0)" fill="#c7a150"></path>
                                                                            </g>
                                                                        </g>
                                                                        <path id="Fill_6" data-name="Fill 6"
                                                                            d="M10.1,28.244C4.53,28.244,0,24.181,0,19.186V9.068C0,4.068,4.53,0,10.1,0S20.2,4.068,20.2,9.068V19.186C20.186,24.181,15.656,28.244,10.1,28.244ZM10.1,2C5.633,2,2,5.17,2,9.068V19.186c0,3.892,3.633,7.058,8.1,7.058s8.1-3.166,8.1-7.058V9.068C18.186,5.17,14.553,2,10.1,2Z"
                                                                            transform="translate(14.938 40.371)" fill="#c7a150"></path>
                                                                        <path id="Fill_8" data-name="Fill 8"
                                                                            d="M17.835,3.389a1.015,1.015,0,0,1-.44-.1S14.686,2,9.437,2a20.73,20.73,0,0,0-8,1.28,1,1,0,1,1-.88-1.79C.709,1.429,3.668,0,9.437,0s8.728,1.419,8.848,1.489a1,1,0,0,1-.45,1.9Z"
                                                                            transform="translate(15.6 47.27)" fill="#c7a150"></path>
                                                                        <path id="Fill_10" data-name="Fill 10"
                                                                            d="M23,14.934H1a1.013,1.013,0,0,1-.72-.3,1.013,1.013,0,0,1-.28-.72A14.736,14.736,0,0,1,11.088.036a.994.994,0,0,1,1.249.809,30.43,30.43,0,0,0,.781,3.579c-1.006-1.482-1.751-2.173-2.345-2.173a.7.7,0,0,0-.217.034A12.747,12.747,0,0,0,2.069,12.933H18.054a17.885,17.885,0,0,1-4.936-8.509c.748,1.1,1.553,2.515,2.331,3.882a40.7,40.7,0,0,0,2.886,4.626v0h-.282c.091.083.186.167.282.25a12.624,12.624,0,0,0,2.391.431,12.172,12.172,0,0,1,3.2.637.046.046,0,0,1,0,.042A1,1,0,0,1,23,14.934Z"
                                                                            transform="translate(0 68.87)" fill="#c7a150"></path>
                                                                        <path id="Fill_12" data-name="Fill 12"
                                                                            d="M1,5.938a1,1,0,0,1,0-2C6.369,3.938,8.519.519,8.539.479h0a1,1,0,0,1,1.709,1.04C10.138,1.7,7.479,5.938,1,5.938Z"
                                                                            transform="translate(27.635 67.216)" fill="#c7a150"></path>
                                                                    </g>
                                                                </g>
                                                            </svg>
                                                            <p class="label"> <b>Guides: </b>Bilingue</p>
                                                        </div>
                                                    </div>

                                                    <div class="info-group">
                                                        <p class="price"> <svg xmlns="http://www.w3.org/2000/svg" width="43" height="43"
                                                                viewBox="0 0 43 43">
                                                                <g id="icon-quadruple" transform="translate(-44 -17)">
                                                                    <circle id="Oval_Copy" data-name="Oval Copy" cx="21.5" cy="21.5"
                                                                        r="21.5" transform="translate(44 17)" fill="#f7f2e8"></circle>
                                                                    <g id="icon_triple" data-name="icon/triple"
                                                                        transform="translate(44.906 24)">
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
                                                            </svg><br> à partir de <b style="font-size: 25px;">
                                                                <?php
                                                                $price = $formule_moins_chere['prix_chambre_quadruple'];
                                                                $formatted_price = number_format($price, 0, ',', ' '); // Format price without decimals
                                            
                                                                echo $formatted_price . " €"; ?></b>
                                                        </p>
                                                    </div>
                                                    <button class="btn btn-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#autreDatesModal<?php echo $type_id; ?>">Autres dates</button>
                                                    <a href="showformule.php?formule_id=<?php echo $formule_moins_chere['id']; ?>"
                                                        class="btn btn-primary"><b>Détails</b></a>
                                                </div>

                                            </div>



                                            <div class="modal fade modal-updates" id="autreDatesModal<?php echo $type_id; ?>" tabindex="-1"
                                                aria-labelledby="autreDatesModalLabel<?php echo $type_id; ?>" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                                    <div class="modal-content modal-updates">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="autreDatesModalLabel<?php echo $type_id; ?>">
                                                                Formules pour <?php echo $row_type_formule['nom']; ?></h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="form-group mb-4">
                                                                <label for="departureCity<?php echo $type_id; ?>" class="form-label">Ville
                                                                    de
                                                                    départ</label>
                                                                <select id="departureCity<?php echo $type_id; ?>" class="form-control">
                                                                    <option value="">Toutes les villes</option>
                                                                    <?php
                                                                    // Fetch the list of active cities from the ville_depart table
                                                                    $sql_villes = "SELECT id, nom FROM ville_depart WHERE statut = 'activé'";
                                                                    $result_villes = mysqli_query($conn, $sql_villes);

                                                                    if ($result_villes && mysqli_num_rows($result_villes) > 0) {
                                                                        while ($ville = mysqli_fetch_assoc($result_villes)) {
                                                                            echo '<option value="' . $ville['nom'] . '">' . $ville['nom'] . '</option>';
                                                                        }
                                                                    } else {
                                                                        echo '<option value="">Aucune ville disponible</option>';
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <?php
                                                            foreach ($formules as $row_formule) {
                                                                ?>
                                                                <div class="card col-md-12 formule-item">
                                                                    <a href="showformule.php?formule_id=<?php echo $row_formule['id']; ?>"
                                                                        class="card-body d-flex justify-content-between align-items-center">
                                                                        <div class="departure-info ">
                                                                            <?php
                                                                            // Fetch city name from ville_depart table
                                                                            $villeDepartId = $row_formule['ville_depart_id'];
                                                                            $sqlVilleDepart = "SELECT nom FROM ville_depart WHERE id = $villeDepartId";
                                                                            $resultVilleDepart = mysqli_query($conn, $sqlVilleDepart);
                                                                            $villeDepart = mysqli_fetch_assoc($resultVilleDepart);
                                                                            ?>
                                                                            <span
                                                                                class="city-badge badge bg-secondary"><?php echo $villeDepart['nom']; ?></span>
                                                                            <span> <i class="fas fa-plane-departure"></i>
                                                                                <b class="delete">Aller:</b>
                                                                                <?php echo date('d-m-Y', strtotime($row_formule['heure_depart'])); ?><br>
                                                                                <i class="fas fa-plane-arrival"></i>
                                                                                <b class="delete">Retour:</b>
                                                                                <?php echo date('d-m-Y', strtotime($row_formule['date_checkout2'])); ?>
                                                                            </span>
                                                                        </div>

                                                                        <div class="price-info  ">
                                                                            <span> à partir <br><?php
                                                                            $price = $formule_moins_chere['prix_chambre_quadruple'];
                                                                            $formatted_price = number_format($price, 0, ',', ' '); // Format price without decimals
                                                                            echo $formatted_price . " €";
                                                                            ?></span>

                                                                            <?php
                                                                            // Fetch airline logo from compagnies_aeriennes table
                                                                            $airline_id = $row_formule['compagnie_aerienne_id'];
                                                                            $sql_airline = "SELECT logo FROM compagnies_aeriennes WHERE id = $airline_id";
                                                                            $result_airline = mysqli_query($conn, $sql_airline);
                                                                            $airline_data = mysqli_fetch_assoc($result_airline);
                                                                            ?>
                                                                            <?php if (!empty($airline_data['logo'])): ?>
                                                                                <img src="<?php echo $airline_data['logo']; ?>" alt="Airline Logo"
                                                                                    class="airline-logo">
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                                <?php
                                                            } // Fin de la boucle foreach des formules
                                                            ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <script>
                                                document.getElementById('departureCity<?php echo $type_id; ?>').addEventListener('change', function () {
                                                    var selectedCity = this.value.toLowerCase();
                                                    var formuleItems = document.querySelectorAll('#autreDatesModal<?php echo $type_id; ?> .formule-item');

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

                                            <?php
                                        } else {
                                            echo "<p>Aucune formule disponible pour ce type.</p>";
                                        }
                                    } // Fin de la boucle while des types de formules
                                } else {
                                    echo "<p>Aucun type de formule disponible pour ce package pour le moment.</p>";
                                }
                                ?>
                            </div>
                        </div>
                    </div>

                    <?php
                } // Fin de la boucle while des packages
            } else {
                echo "<p>Aucun package Omra disponible pour le moment.</p>";
            }
            ?>


        </div>



    </main>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>