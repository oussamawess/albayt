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
            background-image: linear-gradient(rgba(0, 0, 0, 0.26), rgba(0, 0, 0, 0.26)), url("../uploads/header.jpg");
            background-size: cover;
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
<style>
    .container {
        width: fit-content;
    }

    .category-btn {
        margin-right: 10px !important;
        background-color: transparent;
        border: 1px solid white;
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
    }

    .btn:focus {
    outline: var(--primary-color) !important;  /* Remove the default blue outline */
    box-shadow: var(--primary-color) !important;  /* Optionally remove the box-shadow that Bootstrap applies */
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
    <div class="container mt-5">
        <!-- Category Buttons -->
        <div id="category-buttons" class="mb-4 category-buttons">
            <!-- Dynamic buttons will be inserted here -->
        </div>



        <div class="ff">
            <!-- Static Input: Pays de Depart -->
            <div class="form-group">
                <!-- <label for="pays-depart">Pays de Départ</label> -->
                <input type="text" class="form-control" id="pays-depart" value="France" disabled>
            </div>

            <!-- Ville Dropdown -->
            <div class="form-group">
                <!-- <label for="ville">Ville</label> -->
                <select class="form-control" id="ville">
                    <option value="" disabled selected>Choisir une ville</option>
                    <!-- Options dynamically generated -->
                </select>
            </div>

            <!-- Formule Dropdown -->
            <div class="form-group">
                <!-- <label for="formule">Formule</label> -->
                <select class="form-control" id="formule">
                    <option value="" disabled selected>Choisir une formule</option>
                    <!-- Options dynamically generated -->
                </select>
            </div>

            <!-- Dates Button -->
            <div class="form-group">
                <!-- <label for="dates-voyages">Dates de Voyages</label><br> -->
                <button class="btn btn-primary"
                    style="background-color: white;color:black;width: -webkit-fill-available;" id="dates-voyages"
                    disabled>Afficher les Dates</button>
            </div>
        </div>
    </div>
    <!----------- POPUP Autres dates START ----------------->
    <!-- New Popup Modal -->
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
                    <!-- Content dynamically generated by AJAX -->
                </div>
            </div>
        </div>
    </div>

    <!----------- POPUP Autres dates END ----------------->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            // Populate Category Buttons
            $.ajax({
                url: 'fetch_categories.php',
                method: 'GET',
                success: function (data) {
                    try {
                        const categories = JSON.parse(data);
                        categories.forEach(category => {
                            $('#category-buttons').append(`<button class="btn btn-secondary category-btn" data-id="${category.id}">${category.nom}</button>`);
                        });
                    } catch (e) {
                        console.error("Invalid JSON response:", data);
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", status, error);
                }
            });


            // Handle Category Button Click
            // $(document).on('click', '.category-btn', function () {
            const categoryId = $(this).data('id');

            // Handle Category Button Click
            $(document).on('click', '.category-btn', function () {
                // Remove 'selected' class from all buttons
                $('.category-btn').removeClass('btn-primary').addClass('btn-secondary'); // Default color

                // Add 'selected' class to the clicked button
                $(this).removeClass('btn-secondary').addClass('btn-primary'); // Change color on selection
                const categoryId = $(this).data('id');

                // Fetch Ville options based on selected category
                $.ajax({
                    url: 'fetch_villes.php', // PHP script to fetch ville_depart table
                    method: 'GET',
                    data: { category_id: categoryId },
                    success: function (data) {
                        const villes = JSON.parse(data);
                        $('#ville').html('<option value="" disabled selected>Choisir une ville</option>');
                        villes.forEach(ville => {
                            $('#ville').append(`<option value="${ville.id}">${ville.nom}</option>`);
                        });
                    }
                });

                // Clear Formule and Dates
                $('#formule').html('<option value="" disabled selected>Choisir une formule</option>');
                $('#dates-voyages').prop('disabled', true);
            });

            // Handle Ville Selection
            $('#ville').on('change', function () {
                const villeId = $(this).val();

                // Fetch Formule options based on selected Ville
                $.ajax({
                    url: 'fetch_formules.php', // PHP script to fetch type_formule_omra table
                    method: 'GET',
                    data: { ville_id: villeId },
                    success: function (data) {
                        const formules = JSON.parse(data);
                        $('#formule').html('<option value="" disabled selected>Choisir une formule</option>');
                        formules.forEach(formule => {
                            $('#formule').append(`<option value="${formule.id}">${formule.nom}</option>`);
                        });
                    }
                });

                // Clear Dates
                $('#dates-voyages').prop('disabled', true);
            });

            // Handle Formule Selection
            $('#formule').on('change', function () {
                $('#dates-voyages').prop('disabled', false);
            });

            // Handle Dates Button Click
            $('#dates-voyages').on('click', function () {
                const formuleTypeId = $('#formule').val();

                // Fetch Dates based on selected Formule
                $.ajax({
                    url: 'fetch_dates.php', // PHP script to fetch formules table
                    method: 'GET',
                    data: { formule_id: formuleTypeId },
                    success: function (data) {
                        // Log the raw response
                        //console.log("Raw response:", data);

                        try {
                            // Parse the JSON response
                            const dates = JSON.parse(data);
                            //console.log("Parsed JSON:", dates); // Log parsed response

                            // Clear any existing content in the modal body
                            $('.unique-body-autre-dates').html('');

                            // Loop through the dates and append to the modal body
                            dates.forEach(date => {
                                const cardHTML = `
                        <div class="unique-card-autre-dates">
                            <div class="row align-items-center unique-row-autre-dates">
                                <div class="col-6 left-info-popup">
                                    <span><b>Départ</b></span>
                                    <span>${new Date(date.date_depart).toLocaleDateString('fr-FR', { weekday: 'short' })}</span>
                                    <span>${new Date(date.date_depart).toLocaleDateString('fr-FR')}</span>
                                </div>
                                <div class="svg-popup">
                                <?php echo $plane_path_popup ?> 
                                </div>
                                <div class="col-6 text-end right-info-popup">
                                    <span><b>Retour</b></span>
                                    <span>${new Date(date.date_retour).toLocaleDateString('fr-FR', { weekday: 'short' })}</span>
                                    <span class="date-right-popup">${new Date(date.date_retour).toLocaleDateString('fr-FR')}</span>
                                </div>
                                <div class="col-12 d-flex align-items-center bottom-info-popup">
                                    <img src="../${date.compagnie_logo}" style="width:50%; height:auto;" alt="Compagnie" class="me-2">
                                    <div class="buttom-right-info-popup">
                                        <span class="price-text-popup">À partir de</span>
                                        <span class="price-number-popup">${date.prix_chambre_quadruple}€</span>
                                    </div>
                                </div>
                            </div>
                        </div>`;
                                $('.unique-body-autre-dates').append(cardHTML);
                            });

                            // Show the Modal with the updated content
                            $('#autresDatesModal').modal('show');
                        } catch (error) {
                            // Log an error if JSON parsing fails
                            //console.error("Error parsing JSON:", error);
                        }
                    },
                    error: function () {
                        //console.error('Error fetching data');
                    }
                });
            });


        });
    </script>
</body>

</html>