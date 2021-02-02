<?php

  include('config/db_connect.php');

  // Get value from POST array available after delete button is clicked (value is filled with id from GET request submitted when more info button is clicked)
  if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";

    if (mysqli_query($conn, $sql)) {
      // Success
      header('Location: index.php');
    } else {
      // Failure
      echo 'Query error: ' . mysqli_error();
    }
  }

  // Check GET request id parameter
  if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // Make SQL query
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // Get query result
    $result = mysqli_query($conn, $sql);

    // Fetch result in associative array format
    $pizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);
  }

?>

<!DOCTYPE html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center grey-text">
  <?php if ($pizza): ?>

    <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
    <p>Created by: <?php htmlspecialchars($pizza['email']); ?></p>
    <p><?php echo date($pizza['created_at']); ?></p>
    <h5>Ingredients:</h5>
    <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

    <!-- DELETE FORM -->
    <form action="details.php" method="POST">
      <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
      <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
    </form>

  <?php else: ?>
    <h5>No such pizza exists</h5>

  <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>