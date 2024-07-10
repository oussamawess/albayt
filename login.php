<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    /* Reset some default styles for consistency */
    * {
        box-sizing: border-box;
        margin: 0;
        padding: 0;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #f0f0f0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .login-container {
        background-color: #fff;
        max-width: 400px;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #333;
    }

    form {
        display: flex;
        flex-direction: column;
    }

    .input-group {
        margin-bottom: 15px;
    }

    label {
        font-weight: bold;
        color: #555;
        margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }

    button {
        padding: 10px 15px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 4px;
        font-size: 16px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #0056b3;
    }
</style>

<?php
session_start(); // Start session to manage user login state

// Temporary hardcoded credentials
$temp_username = 'tempuser';
$temp_password = 'temppass';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get username and password from form POST data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the entered credentials match the temporary credentials
    if ($username === $temp_username && $password === $temp_password) {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['email'] = 'tempuser@example.com'; // Assign a temporary email

        // Redirect to dashboard or another secure page
        header("Location: omrapackage.php");
        exit;
    }

    // If not, proceed with the regular authentication
    include 'db.php'; // Replace with your database connection file

    // Sanitize username to prevent SQL injection (optional)
    $username = mysqli_real_escape_string($conn, $username);

    // Retrieve user record from database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            // User found, verify password
            $row = mysqli_fetch_assoc($result);
            $hashed_password = $row['password'];

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
                $login_error = "Invalid username or password.";
            }
        } else {
            // No user found with that username
            $login_error = "Invalid username or password.";
        }
    } else {
        // Error in SQL query
        $login_error = "Database error. Please try again later.";
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
