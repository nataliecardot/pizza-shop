<?php

  // Check if data has been submitted to this file
  // $_GET is a global array in PHP. When we make GET request using the form, all the data that we send is stored in this variable (globals begin with $_)
  // if (isset($_GET['submit'])) {
  //   echo $_GET['email'];
  //   echo $_GET['title'];
  //   echo $_GET['ingredients'];
  // }

  // POST is more secure because data isn't transmitted in address bar
  if (isset($_POST['submit'])) {
    echo $_POST['email'];
    echo $_POST['title'];
    echo $_POST['ingredients'];
  }
?>


<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <!-- action: the file that will handle the request on the server; file to run and pass this sent data to so it can process it/do something with it -->
    <form action="add.php" class="white" method="POST">
      <label for="email">Your Email:</label>
      <input type="text" id="email" name="email">

      <label for="title">Your pizza's name:</label>
      <input type="text" id="title" name="title">

      <label for="ingredients">Ingredients (comma separated):</label>
      <input type="text" id="ingredients" name="ingredients">

      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>

  </section>

  <?php include('templates/footer.php'); ?>

</html>