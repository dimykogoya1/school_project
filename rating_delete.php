<?php

include("global.php");

$id = intval($_POST["id"]);

//	create a query
$sql = "delete from prof_ratings where id = $id";
// execute the query
mysqli_query($connection, $sql) or die("Error: " . mysqli_error($connection));


//redirect back to listing
header("Location: rating_list.php");

?>
