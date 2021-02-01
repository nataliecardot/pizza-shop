<?php

// Can connect to database with MySQLi (i: improved) or PDO (PHP Data Objects)
// Connect to database
$conn = mysqli_connect('localhost', 'nc', '4HxCaiJJK5Ja1oQq', 'rathaus_pizza');

// Check connection
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}

// Write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas ORDER BY created_at';

// Make query & get result
$result = mysqli_query($conn, $sql);

// Fetch resulting rows as an associative array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free results from memory (best practice)
mysqli_free_result($result);

// Close connection to database
mysqli_close($conn);

?>


<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <h4 class="center grey-text">Pizzas</h4>

  <div class="container">
    <div class="row">
      <?php foreach($pizzas as $pizza) { ?>

        <!-- 12 cols total in Materialize grid - s6 means take half width on small screens -->
        <div class="col s6 md3 ">
          <div class="card z-depth-0">
            <div class="card-content center">
              <!-- htmpspecialchars: Ensure no malicious code/prevent XSS attacks by escaping special HTML characters -->
              <h5><?php echo htmlspecialchars($pizza['title']); ?></h5>
              <!-- PHP explode function breaks string into array based on separator  -->
              <ul>
                <?php foreach(explode(',', $pizza['ingredients']) as $ing) { ?>
                  <li><?php echo htmlspecialchars($ing) ?></li>
                <?php } ?>
              </ul>
            </div>
            <div class="card-action right-align">
              <a href="#" class="brand-text">More info</a>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </div>

  <?php include('templates/footer.php'); ?>

</html>