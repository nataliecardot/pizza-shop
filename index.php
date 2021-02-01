<?php

// Can connect to database with MySQLi (i: improved) or PDO (PHP Data Objects)
// Connect to database
$conn = mysqli_connect('localhost', 'nc', '4HxCaiJJK5Ja1oQq', 'rathaus_pizza');

// Check connection
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}

// Write query for all pizzas
$sql = 'SELECT title, ingredients, id FROM pizzas';

// Make query & get result
$result = mysqli_query($conn, $sql);

// Fetch resulting rows as an associative array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Free results from memory (best practice)
mysqli_free_result($result);

// Close connection to database
mysqli_close($conn);

print_r($pizzas)

?>


<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <?php include('templates/footer.php'); ?>

</html>