<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Filters</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css"
        rel="stylesheet">

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/d15834b2a7.js" crossorigin="anonymous"></script>

    <!-- Select 2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

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
            /* background-image: linear-gradient(rgba(0, 0, 0, 0.60), rgba(0, 0, 0, 0.60)), url("../uploads/header.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 100vh;
            margin: 0;
            width: 100%;
            overflow-x: hidden; */
            background-color: transparent;
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

        .btn-dates {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 38px;
        }

        .select2-container {
            width: -webkit-fill-available !important;
        }


        .select2-selection {
            height: 38px !important;
            display: flex !important;
            align-items: center !important;
            border-radius: 0.375rem !important;
        }

        .select2-container--default .select2-selection--single .select2-selection__arrow {
            top: auto !important;
        }

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
    </style>
</head>
<style>
    .container {
        width: auto;
        margin-top: 300px;
    }

    @media (max-width: 768px) {
        .container {
            margin-top: 190px;
        }

    }

    .category-btn {
        margin-right: 10px !important;
        margin-bottom: 5px !important;
        background-color: transparent;
        border: 1px solid white;
    }

    .category-buttons {
        margin-bottom: .5rem !important;
    }

    .category-btn:hover {
        background-color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .btn-primary {
        background-color: var(--primary-color) !important;
        border: 1px solid var(--primary-color);
    }

    .ff {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        gap: 20px;
        padding: 20px;
        border: 1px solid white;
        border-radius: 8px;
        /* backdrop-filter: blur(20px); */
        background: rgb(255 255 255 / 32%);
    }


    .form-group {
        margin-bottom: 0px;
    }

    .form-control {
        border: 0 !important;
        box-shadow: none !important;
        display: flex;
        justify-content: left;
        align-items: center;
        height: 38px;
    }

    .btn:focus {
        outline: var(--primary-color) !important;
        /* Remove the default blue outline */
        box-shadow: var(--primary-color) !important;
        /* Optionally remove the box-shadow that Bootstrap applies */
    }





    @media (max-width: 991px) {
        .ff {
            display: block;
        }

        .form-group {
            margin-bottom: 10px;
        }
    }
</style>

<body>
    <div class="container">
        <!-- Category Buttons -->
        <div id="category-buttons" class="mb-4 category-buttons">
            <!-- Dynamic buttons will be inserted here -->
        </div>



        <div class="ff">
            <!-- Static Input: Pays de Depart -->
            <!-- <div class="form-group">
                <button type="text" class="form-control" id="pays-depart" data-icon="plane" value="Pays de départ" disabled><?php echo $grey_plane; ?>&nbsp;&nbsp;Pays de départ</button>
            </div> -->

            <!-- country Dropdown -->
            <div class="form-group">
                <select class="form-control select2" name="state" id="category-parent" data-minimum-results-for-search="Infinity">
                    <option value="c" disabled selected data-icon="plane">&nbsp;&nbsp;Pays de départ</option>
                    <option value="c" data-icon="plane">&nbsp;&nbsp;France</option>
                    <!-- Options dynamically generated -->
                </select>
            </div>

            <!-- <div class="form-group">
                <select class="form-control select2 " name="state" style="width: 140px;" data-minimum-results-for-search="Infinity">
                    <option value="AL" data-icon="plane">Ville</option>
                    <option value="AL">Alabama</option>
                    <option value="WY">Wyoming</option>
                </select>
            </div> -->






            <!-- Ville Dropdown -->
            <div class="form-group">
                <!-- <label for="formule">Ville</label> -->
                <select class="form-control select2" name="state" id="ville" data-minimum-results-for-search="Infinity">
                    <option value="v" disabled selected data-icon="position">&nbsp;&nbsp;Ville</option>
                    <!-- Options dynamically generated -->
                </select>
            </div>




            <!-- Formule Dropdown -->
            <div class="form-group">
                <!-- <label for="formule">Formule</label> -->
                <select class="form-control select2" id="formule" name="state" data-minimum-results-for-search="Infinity">
                    <option value="f" disabled selected data-icon="formule">&nbsp;&nbsp;Formule</option>
                    <!-- Options dynamically generated -->
                </select>
            </div>

            <!-- Dates Button -->
            <div class="form-group">
                <!-- <label for="dates-voyages">Dates de Voyages</label><br> -->
                <button class="btn btn-dates"
                    style="background-color: white;color: #5c5a5a; border:none; width: -webkit-fill-available; opacity: 1;"
                    id="dates-voyages" disabled>Dates de voyages&nbsp;&nbsp;<?php echo $grey_date ?></button>
            </div>
        </div>
    </div>
    <!----------- POPUP Autres dates START ----------------->
    <!-- New Popup Modal -->
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
                    <!-- Content dynamically generated by AJAX -->
                </div>
            </div>
        </div>
    </div>

    <!----------- POPUP Autres dates END ----------------->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            // Populate Category Buttons
            $.ajax({
                url: 'fetch_categories.php',
                method: 'GET',
                success: function(data) {
                    try {
                        const categories = JSON.parse(data);
                        categories.forEach((category, index) => {
                            const isSelected = index === 0 ? 'btn-primary' : 'btn-secondary'; // First button selected by default
                            $('#category-buttons').append(
                                `<button class="btn ${isSelected} category-btn" data-id="${category.id}">${category.nom}</button>`
                            );
                        });

                        // Trigger click on the first button to initialize its behavior
                        $('.category-btn').first().trigger('click');
                    } catch (e) {
                        console.error("Invalid JSON response:", data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                }
            });

            // Handle Category Button Click
            $(document).on('click', '.category-btn', function() {
                // Remove 'selected' class from all buttons
                $('.category-btn').removeClass('btn-primary').addClass('btn-secondary'); // Default color

                // Add 'selected' class to the clicked button
                $(this).removeClass('btn-secondary').addClass('btn-primary'); // Change color on selection
                const categoryId = $(this).data('id');

                // Fetch Ville options based on selected category
                $.ajax({
                    url: 'fetch_villes.php',
                    method: 'GET',
                    data: {
                        category_id: categoryId
                    },
                    success: function(data) {
                        const villes = JSON.parse(data);
                        $('#ville').html(
                            '<option value="v" disabled selected data-icon="position" class="select2" name="state">&nbsp;&nbsp;Ville</option>'
                        );
                        villes.forEach((ville) => {
                            $('#ville').append(
                                `<option data-icon="position" value="${ville.id}">&nbsp;&nbsp;${ville.nom}</option>`
                            );
                        });
                    }
                });

                // Clear Formule and Dates
                $('#formule').html('<option value="f" data-icon="formule" disabled selected>&nbsp;&nbsp;Formule</option>');
                $('#dates-voyages').prop('disabled', true);
            });

            // Handle Ville Selection
            $('#ville').on('change', function() {
                const villeId = $(this).val();

                // Fetch Formule options based on selected Ville
                $.ajax({
                    url: 'fetch_formules.php',
                    method: 'GET',
                    data: {
                        ville_id: villeId
                    },
                    success: function(data) {
                        const formules = JSON.parse(data);
                        $('#formule').html(
                            '<option value="f" data-icon="formule" class="select2" name="state" disabled selected>&nbsp;&nbsp;Formule</option>'
                        );
                        formules.forEach((formule) => {
                            $('#formule').append(
                                `<option data-icon="formule" value="${formule.id}">&nbsp;&nbsp;${formule.nom}</option>`
                            );
                        });
                    }
                });

                // Clear Dates
                $('#dates-voyages').prop('disabled', true);
            });

            // Handle Formule Selection
            $('#formule').on('change', function() {
                $('#dates-voyages').prop('disabled', false);
            });

            // Handle Dates Button Click
            $('#dates-voyages').on('click', function() {
                const formuleTypeId = $('#formule').val();

                $.ajax({
                    url: 'fetch_dates.php',
                    method: 'GET',
                    data: {
                        formule_id: formuleTypeId
                    },
                    success: function(data) {
                        try {
                            const dates = JSON.parse(data);

                            $('.unique-body-autre-dates').html(''); // Clear any existing content

                            dates.forEach((date) => {
                                const formatDate = (dateString) => {
                                    const weekday = new Date(dateString).toLocaleDateString('fr-FR', {
                                        weekday: 'short'
                                    });
                                    const fullDate = new Date(dateString).toLocaleDateString('fr-FR');
                                    const formattedWeekday = weekday.charAt(0).toUpperCase() + weekday.slice(1).replace('.', '');
                                    return {
                                        formattedWeekday,
                                        fullDate: fullDate.replace('.', '')
                                    };
                                };

                                const {
                                    formattedWeekday: departWeekday,
                                    fullDate: departDate
                                } = formatDate(date.date_depart);
                                const {
                                    formattedWeekday: returnWeekday,
                                    fullDate: returnDate
                                } = formatDate(date.date_retour);

                                // Ensure the price is a valid number
                                const price = parseFloat(date.price);
                                const formattedPrice = !isNaN(price) ? price.toFixed(2).replace('.', ',') : "N/A"; // Handle invalid price

                                const cardHTML = `
                                    <a style="text-decoration: none; color: inherit;" target="_blank" href="formule.php?id=${date.formule_id}">
                                        <div class="unique-card-autre-dates">
                                            <div class="row align-items-center unique-row-autre-dates">
                                                <div class="col-6 left-info-popup">
                                                    <span><b>Départ</b></span>
                                                    <span>${departWeekday}</span>
                                                    <span>${departDate}</span>
                                                </div>
                                                <div class="svg-popup"><?php echo $plane_path_popup ?></div>
                                                <div class="col-6 text-end right-info-popup">
                                                    <span><b>Retour</b></span>
                                                    <span>${returnWeekday}</span>
                                                    <span class="date-right-popup">${returnDate}</span>
                                                </div>
                                                <div class="col-12 d-flex align-items-center bottom-info-popup">
                                                    <img src="../${date.compagnie_logo}" alt="Compagnie" class="me-2">
                                                    <div class="buttom-right-info-popup">
                                                        <span class="price-text-popup">À partir de</span>
                                                        <span class="price-number-popup">${formattedPrice} €</span>  <!-- Display the formatted price -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </a>`;

                                $('.unique-body-autre-dates').append(cardHTML);
                            });

                            $('#autresDatesModal').modal('show'); // Show the modal
                        } catch (error) {
                            console.error("Error parsing JSON:", error);
                        }
                    },
                    error: function() {
                        console.error('Error fetching data');
                    }
                });

            });
        });
    </script>

    <script>
        $(document).ready(function() {
            // Define the SVG separately
            const icons = {
                plane: `<svg xmlns="http://www.w3.org/2000/svg" width="18.507" height="13.072" viewBox="0 0 18.507 13.072">
                        <g id="Group_181" data-name="Group 181" transform="translate(-203 -518.859)">
                            <g id="Group_180" data-name="Group 180">
                            <g id="Group_174" data-name="Group 174">
                                <path id="Path_1" data-name="Path 1" d="M20.69,6.63l-.47-.28a6.531,6.531,0,0,0-6.5-.11L8.08,9.37l-.86-.86a2.494,2.494,0,0,0-2.56-.6l-.73.25a1.527,1.527,0,0,0-.91.85,1.491,1.491,0,0,0,.04,1.24l1.59,3.18A2.458,2.458,0,0,0,6.1,14.68a2.489,2.489,0,0,0,1.91-.14L9.5,13.8v.8a1.507,1.507,0,0,0,.62,1.22,1.466,1.466,0,0,0,.87.29,1.609,1.609,0,0,0,.48-.08l.26-.09a3.5,3.5,0,0,0,2.21-2.21l.39-1.19a.508.508,0,0,1,.25-.29l6-3a1.477,1.477,0,0,0,.83-1.28,1.462,1.462,0,0,0-.73-1.34Zm-.54,1.74-6,3a1.5,1.5,0,0,0-.75.87l-.39,1.18A2.532,2.532,0,0,1,11.43,15l-.26.09a.485.485,0,0,1-.45-.07.507.507,0,0,1-.21-.41V13a.52.52,0,0,0-.24-.43.484.484,0,0,0-.26-.07.545.545,0,0,0-.22.05L7.58,13.66a1.484,1.484,0,0,1-1.15.08,1.5,1.5,0,0,1-.87-.75L3.97,9.81a.476.476,0,0,1-.01-.42.463.463,0,0,1,.3-.28l.73-.25a1.514,1.514,0,0,1,1.54.36l.86.86a1,1,0,0,0,1.19.17l5.64-3.13a5.513,5.513,0,0,1,5.5.09l.46.28a.475.475,0,0,1,.24.45.51.51,0,0,1-.28.43Z" transform="translate(200.096 513.432)" fill="#797b7e"/>
                            </g>
                            </g>
                            <path id="Path_2" data-name="Path 2" d="M20,17.5H4a.5.5,0,0,0,0,1H20a.5.5,0,0,0,0-1Z" transform="translate(200.5 513.432)" fill="#797b7e"/>
                        </g>
                        </svg>`,



                position: `<svg xmlns="http://www.w3.org/2000/svg" width="10.941" height="13.206" viewBox="0 0 10.941 13.206">
                            <g id="Group_182" data-name="Group 182" transform="translate(-509 -519.794)">
                                <path id="Path_138" data-name="Path 138" d="M13.48,11.833a6.3,6.3,0,0,0,.317.581,11.336,11.336,0,0,0,4.2,4.2.73.73,0,0,0,.33.092.6.6,0,0,0,.33-.092,11.544,11.544,0,0,0,4.2-4.2c.106-.2.211-.4.317-.581A6.02,6.02,0,0,0,23.081,6.3a5.227,5.227,0,0,0-4.068-2.76,5.858,5.858,0,0,0-1.36,0A5.269,5.269,0,0,0,13.586,6.3a5.98,5.98,0,0,0-.092,5.533h0Zm1.255-4.9A3.974,3.974,0,0,1,17.8,4.847a4.71,4.71,0,0,1,1.057,0,3.964,3.964,0,0,1,3.064,2.087A4.675,4.675,0,0,1,22,11.239a4.908,4.908,0,0,1-.277.515,10.083,10.083,0,0,1-3.394,3.513,10.2,10.2,0,0,1-3.394-3.513c-.106-.172-.185-.343-.277-.515a4.715,4.715,0,0,1,.066-4.305Z" transform="translate(496.139 516.294)" fill="#797b7e"/>
                                <path id="Path_139" data-name="Path 139" d="M17.209,9.458A1.709,1.709,0,1,0,15.5,7.749,1.707,1.707,0,0,0,17.209,9.458Zm0-2.279a.57.57,0,1,1-.57.57A.564.564,0,0,1,17.209,7.179Z" transform="translate(497.262 516.939)" fill="#797b7e"/>
                            </g>
                            </svg>`,


                formule: `<svg xmlns="http://www.w3.org/2000/svg" width="19" height="14" viewBox="0 0 19 14">
                <path id="Path_140" data-name="Path 140" d="M18,5.5H6A3.5,3.5,0,0,0,2.5,9v7A3.5,3.5,0,0,0,6,19.5H18A3.5,3.5,0,0,0,21.5,16V9A3.5,3.5,0,0,0,18,5.5ZM20.5,16A2.5,2.5,0,0,1,18,18.5H6A2.5,2.5,0,0,1,3.5,16V9A2.5,2.5,0,0,1,6,6.5H18A2.5,2.5,0,0,1,20.5,9Z" transform="translate(-2.5 -5.5)" fill="#797b7e"/>
                <path id="Path_141" data-name="Path 141" d="M11,10.5h-.5V10A1.5,1.5,0,0,0,9,8.5H8A1.5,1.5,0,0,0,6.5,10v.5H6A1.5,1.5,0,0,0,4.5,12v3A1.5,1.5,0,0,0,6,16.5h5A1.5,1.5,0,0,0,12.5,15V12A1.5,1.5,0,0,0,11,10.5ZM7.5,10A.5.5,0,0,1,8,9.5H9a.5.5,0,0,1,.5.5v.5h-2Zm4,5a.5.5,0,0,1-.5.5H6a.5.5,0,0,1-.5-.5V12a.5.5,0,0,1,.5-.5h5a.5.5,0,0,1,.5.5Z" transform="translate(-2.5 -5.5)" fill="#797b7e"/>
                <path id="Path_143" data-name="Path 143" d="M18,15.5H17a.5.5,0,0,0,0,1h1a.5.5,0,0,0,0-1Z" transform="translate(-2.5 -5.5)" fill="#797b7e"/>
                </svg>`,


                date: `<svg xmlns="http://www.w3.org/2000/svg" width="282" height="52" viewBox="0 0 282 52">
                        <g id="Group_183" data-name="Group 183" transform="translate(-1149 -500)">
                            <g id="Rectangle" transform="translate(1149 500)" fill="#fff" stroke="#ededed" stroke-miterlimit="10" stroke-width="1">
                            <rect width="282" height="52" rx="5" stroke="none"/>
                            <rect x="0.5" y="0.5" width="281" height="51" rx="4.5" fill="none"/>
                            </g>
                            <path id="Path_128" data-name="Path 128" d="M16.5,4.55V4a.5.5,0,0,0-1,0v.5h-7V4a.5.5,0,0,0-1,0v.55A4.492,4.492,0,0,0,3.5,9v6A4.507,4.507,0,0,0,8,19.5h8A4.507,4.507,0,0,0,20.5,15V9A4.492,4.492,0,0,0,16.5,4.55ZM19.5,15A3.5,3.5,0,0,1,16,18.5H8A3.5,3.5,0,0,1,4.5,15V9a3.5,3.5,0,0,1,3-3.45V6a.5.5,0,0,0,1,0V5.5h7V6a.5.5,0,0,0,1,0V5.55A3.5,3.5,0,0,1,19.5,9Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_129" data-name="Path 129" d="M17,8.5H7a.5.5,0,0,0,0,1H17a.5.5,0,0,0,0-1Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_130" data-name="Path 130" d="M12.02,11.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,12.02,11.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_131" data-name="Path 131" d="M16.02,11.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,16.02,11.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_132" data-name="Path 132" d="M12.02,13.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,12.02,13.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_133" data-name="Path 133" d="M16.02,13.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,16.02,13.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_134" data-name="Path 134" d="M8.02,15.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,8.02,15.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_135" data-name="Path 135" d="M12.02,15.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,12.02,15.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_136" data-name="Path 136" d="M8,10.5a2,2,0,1,0,2,2A2.006,2.006,0,0,0,8,10.5Zm0,3a1,1,0,1,1,1-1A1,1,0,0,1,8,13.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                        </g>
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" width="282" height="52" viewBox="0 0 282 52">
                        <g id="Group_183" data-name="Group 183" transform="translate(-1149 -500)">
                            <g id="Rectangle" transform="translate(1149 500)" fill="#fff" stroke="#ededed" stroke-miterlimit="10" stroke-width="1">
                            <rect width="282" height="52" rx="5" stroke="none"/>
                            <rect x="0.5" y="0.5" width="281" height="51" rx="4.5" fill="none"/>
                            </g>
                            <path id="Path_128" data-name="Path 128" d="M16.5,4.55V4a.5.5,0,0,0-1,0v.5h-7V4a.5.5,0,0,0-1,0v.55A4.492,4.492,0,0,0,3.5,9v6A4.507,4.507,0,0,0,8,19.5h8A4.507,4.507,0,0,0,20.5,15V9A4.492,4.492,0,0,0,16.5,4.55ZM19.5,15A3.5,3.5,0,0,1,16,18.5H8A3.5,3.5,0,0,1,4.5,15V9a3.5,3.5,0,0,1,3-3.45V6a.5.5,0,0,0,1,0V5.5h7V6a.5.5,0,0,0,1,0V5.55A3.5,3.5,0,0,1,19.5,9Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_129" data-name="Path 129" d="M17,8.5H7a.5.5,0,0,0,0,1H17a.5.5,0,0,0,0-1Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_130" data-name="Path 130" d="M12.02,11.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,12.02,11.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_131" data-name="Path 131" d="M16.02,11.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,16.02,11.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_132" data-name="Path 132" d="M12.02,13.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,12.02,13.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_133" data-name="Path 133" d="M16.02,13.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,16.02,13.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_134" data-name="Path 134" d="M8.02,15.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,8.02,15.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_135" data-name="Path 135" d="M12.02,15.5h0a.5.5,0,0,0-.5.5.5.5,0,0,0,1,0A.5.5,0,0,0,12.02,15.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                            <path id="Path_136" data-name="Path 136" d="M8,10.5a2,2,0,1,0,2,2A2.006,2.006,0,0,0,8,10.5Zm0,3a1,1,0,1,1,1-1A1,1,0,0,1,8,13.5Z" transform="translate(1395.873 514.359)" fill="#595651"/>
                        </g>
                        </svg>`
            };

            // Initialize Select2
            $('.select2').select2({
                templateResult: formatState, // Customize dropdown
                templateSelection: formatState // Customize selected value
            });

            function formatState(state) {
                if (!state.id) {
                    return state.text; // Return default text for placeholder
                }

                const iconKey = $(state.element).data('icon'); // Get key from data-icon
                const icon = icons[iconKey] || ''; // Get SVG from icons object

                return $(
                    `<span style="display: flex; align-items: center;">${icon} ${state.text}</span>`
                );
            }
        });
    </script>
</body>

</html>