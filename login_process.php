<?php
session_start(); 
include("global.php");


$email = mysqli_real_escape_string($connection, $_POST["email"]);
$password = mysqli_real_escape_string($connection, $_POST["password"]);

$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
$res = mysqli_query($connection, $query);

if (!$res) {
    die("Database query failed: " . mysqli_error($connection));
}

if (mysqli_num_rows($res) == 0) {
  
    $errormessage = "Invalid login";
    include("login.php");
    die();
}

$row = mysqli_fetch_assoc($res);
$_SESSION["email"] = $row["email"];
$_SESSION["userid"] = $row["userid"];


setcookie("email", $email, time() + 3600); // Expires in 1 hour
setcookie("password", $password, time() + 3600);

// Wherever they go next
header("Location: index.php");
