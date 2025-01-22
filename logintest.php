<?php
session_start(); // Start session to manage user login state

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection file
    include 'db.php'; // Replace with your database connection file

    // Get username and password from form POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Sanitize username to prevent SQL injection
    $username = mysqli_real_escape_string($conn, $username);

    // Debugging: Show what username is being used in the query
    echo "Username entered: '$username'<br>";

    // Retrieve user record from database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Database error: " . mysqli_error($conn)); // If query fails, show error
    }

    if (mysqli_num_rows($result) == 1) {
        // User found, fetch the row
        $row = mysqli_fetch_assoc($result);
        $hashed_password = $row['password'];

        // Debugging: Show the fetched row data
        echo "<pre>";
        echo "Fetched data: ";
        print_r($row); // Show the fetched user record
        echo "</pre>";

        // Debugging: Output the hashed password from the database
        echo "Stored hashed password: " . $hashed_password . "<br>";
        echo "Entered password: " . $password . "<br>";

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $row['email'];

            // Redirect to dashboard or another secure page
            header("Location: omrapackage.php");
            exit;
        } else {
            // Password is incorrect
            $login_error = "Incorrect password for the given username.";
        }
    } else {
        // No user found with that username
        $login_error = "Username not found.";
    }

    mysqli_close($conn); // Close database connection
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Login</h2>
        <?php if (isset($login_error)) { ?>
            <div class="error-message"><?php echo $login_error; ?></div>
        <?php } ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="input-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
