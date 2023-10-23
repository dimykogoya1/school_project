
<h2>New Ratings</h2>

<link rel="stylesheet" type="text/css" href="style.css">

<form action="rating_process.php" method="POST">
  Professor Name: <input type="text" name="professor_name" value="<?php echo isset($professor_name) ? htmlspecialchars($professor_name, ENT_QUOTES) : ''; ?>"><br /><br />
  Professor School: <input type="text" name="professor_school" value="<?php echo isset($professor_school) ? htmlspecialchars($professor_school, ENT_QUOTES) : ''; ?>"><br /><br />
  Your Username: <input type="text" name="username" value="<?php echo isset($username) ? htmlspecialchars($username, ENT_QUOTES) : ''; ?>"><br /><br />
  Rating Date: <input type="date" name="rating_date"><br />
  Rating Value: <input type="number" name="rating_value"><br />

  <input type="hidden" name="id" value="<?php echo isset($id) ? $id : ''; ?>">

  <input type="submit" value="Save">
</form>

<?php include("footer.php"); ?>

<!-- Client Side Validation -->
<script>
  (document).ready(function() {
    $("rating_form").submit(function(event) {
      preventDefault();

      var professorName = $("#professor_name").val();
      var professorSchool = $("#professor_school").val();
      var username = $("#username").val();
      var ratingDate = $("#rating_date").val();
      var ratingValue = $("#rating_value").val();


      if (!professorName || !professorSchool || !username || !ratingDate || !ratingValue) {
        alert("Please fill in all required fields.");
        return;
      }

      $("#rating-form").off("submit").submit();


    });

  });
</script>
</body>

</html>