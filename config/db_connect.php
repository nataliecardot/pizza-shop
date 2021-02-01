<?php

// Can connect to database with MySQLi (i: improved) or PDO (PHP Data Objects)
// Connect to database
$conn = mysqli_connect('localhost', 'nc', '4HxCaiJJK5Ja1oQq', 'rathaus_pizza');

// Check connection
if (!$conn) {
  echo 'Connection error: ' . mysqli_connect_error();
}

?>