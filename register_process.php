<?php

include("global.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = mysqli_real_escape_string($connection, $_POST["email"]);
    $password = mysqli_real_escape_string($connection, $_POST["password"]);


    $query = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
    
        echo "Email is already in use. Please choose another email.";
    } else {
       
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $insert_query = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";
        if (mysqli_query($connection, $insert_query)) {
            // Registration successful
            echo "Registration successful.";
         
            header("Location: rating_form.php"); 
            exit; 
        } else {
            // Database error
            echo "Registration failed. Please try again later.";
        }
    }
}
mysqli_close($connection);
?>

