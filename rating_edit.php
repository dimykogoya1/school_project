<?php

include("global.php");


$id = "";
if (isset($_GET["id"])) {
$id = intval($_GET["id"]);

$result = mysqli_query($connection, "SELECT * FROM prof_ratings WHERE id = $id");
if ($result && mysqli_num_rows($result) >0) {
$row = mysqli_fetch_assoc($result);

$professor_name = $row["professor_name"];
$professor_school = $row["professor_school"];
$rating_date = $row["rating_date"];
$rating_value = $row["rating_value"];

// Handle the errors
}else{
  echo("Record not found");
}
}else{
  echo("ID not provided");
}
include("rating_form.php");
