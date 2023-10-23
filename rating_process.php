<?php
include 'global.php';
// initialize the variable

$errormessage = '';
$errormessageerror = '';

$professor_name = isset($_POST["professor_name"]) ? $_POST["professor_name"] : '';
$professor_school = isset($_POST["professor_school"]) ? $_POST["professor_school"] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$rating_date = isset($_POST['rating_date']) ? $_POST['rating_date'] : '';
$rating_value = isset($_POST['rating_value']) ? $_POST['rating_value'] : '';
$id = isset($_POST["id"]) ? $_POST["id"] : 0;


if (empty($professor_name) || empty($professor_school) || empty($username) || empty($rating_date) || !is_numeric($rating_value) || $rating_value < 1 || $rating_value > 5) {
    $errormessageerror .= "Validation failed. Please check your data.<br>";
}

if (empty($professor_name)) {
    $errormessage .= "Professor name is required.<br>";
}
if (empty($professor_school)) {
    $errormessage .= "Professor school is required.<br>";
}
if (strlen($professor_name) > 0 && strlen($professor_name) > 9) {
    $errormessage .= "Name is not valid.<br>";
}

if (!empty($errormessageerror) || !empty($errormessage)) {
    include("rating_form.php");
    die();
}
// to handle the any enjectin
$professor_name = mysqli_real_escape_string($connection, $professor_name);
$professor_school = mysqli_real_escape_string($connection, $professor_school);
$id = intval($id);

if ($id == 0) {
    $sql = "INSERT INTO prof_ratings (professor_name, professor_school, username, rating_date, rating_value) VALUES ('$professor_name', '$professor_school', '$username', '$rating_date', $rating_value)";
} else {
    $sql = "UPDATE prof_ratings SET professor_name = '$professor_name', professor_school = '$professor_school', username = '$username', rating_date = '$rating_date', rating_value = $rating_value WHERE id = $id";
}


mysqli_query($connection, $sql) or die("Invalid SQL: $sql " . mysqli_error($connection));

// Redirect after a successful database operation
header("Location: rating_list.php");
exit();
