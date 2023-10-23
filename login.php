<?php
include("global.php");

?>

<h3>Login</h3>

<span style="color: red;">
    <?php echo isset($errormessage) ? $errormessage : ''; ?>
</span>

<form action="login_process.php" method="POST">
    Username: <input type="text" name="email" value="<?php echo isset($email) ? htmlspecialchars($email, ENT_QUOTES) : ''; ?>"><br />
    Password: <input type="password" name="password"><br />
    <input type="submit" value="Login">
</form>

<?php include("footer.php"); ?>