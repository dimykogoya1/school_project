<!DOCTYPE html>
<html>
<head>
    <title>Professor Results</title>
</head>
<body>
    <h1>Professor Search Results</h1>

    <?php
   
    if (isset($_GET['search'])) {
        $search_query = mysqli_real_escape_string($connection, $_GET['search']);

        
        $query = "SELECT * FROM prof_ratigs WHERE name LIKE '%$search_query%'";
        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<h2>Search Results:</h2>";
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<p>Professor: " . $row['name'] . "</p>";
          
            }
        } else {
            echo "No professors found for your search query.";
        }
      }
  include("footer.php"); 
    ?>
</body>
</html>
