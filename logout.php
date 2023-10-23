<?php
include("login.php"); 
include("login_process.php"); 
session_start();
session_destroy();
header("Location: index.php"); 
?>
