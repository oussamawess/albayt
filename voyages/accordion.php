<?php
include '../db.php'; // Include your database connection file

$formule_id = $_GET['id'];

// Fetch the main formule data
$query = "
    SELECT 
        f.*, 
        h.nom AS hotel_name, 
        h.etoiles AS hotel_stars,
        h.ville AS hotel_city,
        h.details AS hotel_details,
        hb.date_checkin, 
        hb.date_checkout, 
        hb.nombre_nuit, 
        hb.type_pension
    FROM 
        formules f
    LEFT JOIN 
        hebergements hb ON f.id = hb.formule_id
    LEFT JOIN 
        hotels h ON hb.hotel_id = h.id
    WHERE 
        f.id = ?
";
$stmt = $conn->prepare($query);
$stmt->bind_param('i', $formule_id);
$stmt->execute();
$result = $stmt->get_result();
$formule = $result->fetch_assoc();

// Fetch all hebergements for the formule
$hebergements_query = "
    SELECT 
        hb.*, 
        h.nom AS hotel_name, 
        h.etoiles AS hotel_stars, 
        h.ville AS hotel_city, 
        h.details AS hotel_details,
        h.id AS hotel_id
    FROM 
        hebergements hb
    LEFT JOIN 
        hotels h ON hb.hotel_id = h.id
    WHERE 
        hb.formule_id = ?
";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        /* Custom styling */
        .carousel-item {
            height: 400px;
            background-size: cover;
            background-position: center;
        }

        .hotel-info {
            position: absolute;
            bottom: 20px;
            left: 20px;
            background: rgba(0, 0, 0, 0.5);
            color: white;
            padding: 10px;
            border-radius: 5px;
        }

        .hotel-footer {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .hotel-info h3,
        .hotel-info .fa-star {
            color: #FFD700;
        }
    </style>
</head>

<body>
    <div class="container">
        <header class="header">
            <h1 style="font-family:bely display;"><?php echo $formule['hotel_name']; ?></h1>
        </header>

        <div class="accordion accordion-flush" id="accordionFlushExample">
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingzero">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsezero" aria-expanded="false" aria-controls="flush-collapsezero">
                        Hébergements
                    </button>
                </h2>
                <div id="flush-collapsezero" class="accordion-collapse collapse" aria-labelledby="flush-headingzero" data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <?php if ($hebergements_result->num_rows > 0) { ?>
                            <div id="myCarousel" class="carousel slide mb-4" data-bs-ride="carousel">
                                <div class="carousel-inner">
                                    <?php
                                    $isActive = true;
                                    while ($hotel = $hebergements_result->fetch_assoc()) {
                                        // Fetch hotel gallery images
                                        $hotel_id = $hotel['hotel_id'];
                                        $gallery_query = "SELECT image_path FROM hotel_gallery WHERE hotel_id = $hotel_id";
                                        $gallery_result = $conn->query($gallery_query);
                                        ?>
                                        <div class="carousel-item <?php echo $isActive ? 'active' : ''; ?>">
                                            <div id="neoidea">
                                                <ol class="carousel-indicators">
                                                    <?php for ($i = 0; $i < $gallery_result->num_rows; $i++) { ?>
                                                        <li data-bs-target="#step<?php echo $hotel_id; ?>" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i === 0 ? 'active' : ''; ?>"></li>
                                                    <?php } ?>
                                                </ol>
                                                <div class="tab-content">
                                                    <?php
                                                    $tabIndex = 0;
                                                    while ($image = $gallery_result->fetch_assoc()) { ?>
                                                        <div class="tab-pane <?php echo $tabIndex === 0 ? 'active' : ''; ?>" id="step<?php echo $hotel_id; ?>-<?php echo $tabIndex; ?>">
                                                            <div class="d-block w-100" style="background-image: url('../<?php echo $image['image_path']; ?>'); height: 400px; background-size: cover; background-position: center;">
                                                                <div class="hotel-info">
                                                                    <h3><?php echo $hotel['hotel_name']; ?></h3>
                                                                    <div class="hotel-stars">
                                                                        <?php for ($i = 0; $i < $hotel['hotel_stars']; $i++) { ?>
                                                                            <i class="fa fa-star"></i>
                                                                        <?php } ?>
                                                                    </div>
                                                                    <div class="hotel-footer">
                                                                        <div>Check-in: <?php echo $hotel['date_checkin']; ?></div>
                                                                        <div>Check-out: <?php echo $hotel['date_checkout']; ?></div>
                                                                        <div>Nights: <?php echo $hotel['nombre_nuit']; ?></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php
                                                        $tabIndex++;
                                                    } ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $isActive = false; // Only the first item should be active
                                    }
                                    ?>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </button>
                            </div>
                        <?php } else { ?>
                            <p>No hébergements found.</p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#myCarousel').carousel();
    </script>
</body>

</html>
