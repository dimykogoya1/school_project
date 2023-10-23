<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION["user_id"])) {
    $logged_in = true;
} else {
    $logged_in = false;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <h1>Welcome to Rate My Professor</h1>

    <form action="professor_results.php" method="GET">
        <label for="search">Search for a professor:</label>
        <input type="text" id="search" name="search">
        <input type="submit" value="Search">
    </form>

    <?php
    if ($logged_in) {
        // Display the logout link if the user is logged in
        echo '<a href="logout.php">Logout</a>';
    } else {
        // Display the login and register links if the user is not logged in
        echo '<a href="login.php">Login</a> | <a href="register.php">Register</a>';
    }
    ?>
</body>
</html>
