<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formule</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.9.1/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --primary-color: #c89e54;
        }

        body {
            background-color: #f1ede4;
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
            padding: 10px;
            box-sizing: border-box;
            position: -webkit-sticky;
            position: sticky;
            top: 0;
            background-color: white;
            border-radius: 8px;
            height: 500px;
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
            background-color: #595651;
            color: white;
        }

        .contact-btn-sidebar {
            margin-left: 0px;
        }

        .offcanvas {
            background-color: #595651;
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
            .content,
            .sticky-sidebar {
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
        <div class="content">
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
            <!-- Sticky sidebar content (e.g., the formula) taking up 40% of the screen -->
            <div class="formula">
                <h2>Sticky Formula</h2>
                <p>This sidebar will stay on the side and occupy 40% of the width.</p>
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

    <!-- <div class="container mt-5">
        <h1>Welcome to the Page</h1>
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
    </div> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>