<?php

?>


<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <section class="container grey-text">
    <h2 class="center">Add a Pizza</h2>
    <form action="" class="white" method="">
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