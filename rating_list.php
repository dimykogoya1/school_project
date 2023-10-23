<?php
include 'global.php';

?>

<br> <br>
<h3> List of Ratings</h3>

<a href="rating_form.php">Add New Ratings</a><br /><br />

<table style="width: 40%">
  <tr>
    <th>Professor Name</th>
    
    <th>Professor School</th>

    <th>Rating Date </th>
    
    <th>Rating Value</th>
  </tr>
  <tr>
    <td></td> 
    <td></td>  
  
  </tr>

  <style>
    /* Apply CSS styles to the table */
    table {
      width: 100%;
      border-collapse: collapse;
      margin: 20px auto;
    }
    th, td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }

    th {
      background-color: #f2f2f2;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    /* Apply styles to the "Add New Ratings" link */
    a {
      text-decoration: none;
      background-color: #007bff;
      color: #fff;
      padding: 10px 15px;
      border-radius: 5px;
      display: inline-block;
      margin: 10px;
    }

    /* Apply styles to the Edit and Delete links */
    a.edit, form.delete {
      text-decoration: none;
      background-color: #ccc;
      color: #000;
      padding: 5px 10px;
      border-radius: 5px;
      display: inline-block;
      margin: 2px;
    }
  </style>

  <?php
  // Execute a database query to get the data
  $result = mysqli_query($connection, "SELECT * FROM prof_ratings ORDER BY professor_name");

  // Loop through each record
  while ($row = mysqli_fetch_assoc($result)) {
    // Display each record
    ?>

    <tr>
      <td><?php echo htmlspecialchars($row["professor_school"], ENT_QUOTES, 'UTF-8') ?></td>
      <td><?php echo htmlspecialchars($row["professor_name"]); ?></td>
      <td><?php echo htmlspecialchars($row["rating_date"]); ?></td>
      <td><?php echo htmlspecialchars($row["rating_value"]); ?></td>
      
      <td><a href="rating_edit.php?id=<?php echo $row["id"]; ?>">Edit</a></td>
      <td>
        <form action="rating_delete.php" method="POST">
          <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
          <input type="submit" value="Delete">
        </form>
      </td>
    </tr>
    <?php
  }
  ?>

</table>

<?php include 'footer.php'; ?>
