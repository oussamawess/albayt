<?php
include '../db.php';

if (isset($_GET['hotel_id'])) {
    $hotel_id = $_GET['hotel_id'];
    
    // Fetch gallery images from the database
    $query = "SELECT image_path FROM hotel_gallery WHERE hotel_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $hotel_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image_path'];
    }
    
    if (count($images) > 0) {
        echo json_encode(['success' => true, 'images' => $images]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Invalid hotel ID']);
}
?>
