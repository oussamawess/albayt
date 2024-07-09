<?php
include 'db.php'; // Ensure this file contains your database connection code

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password
    $email = $_POST['email'];

    // Prepare SQL query to insert data into users table
    $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

    if (mysqli_query($conn, $sql)) {
        echo "New user created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>