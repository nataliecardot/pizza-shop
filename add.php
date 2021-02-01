<?php

  include('config/db_connect.php');

  // Initialize to empty string (variables only set after form submitted; without this would get error because trying to display undefined variables for input values)
  $title = $email = $ingredients = '';
  $errors = array('email' => '', 'title' => '', 'ingredients' => '');

  // Check if data has been submitted to this file
  // $_GET is a global array in PHP. When we make GET request using the form, all the data that we send is stored in this variable (globals begin with $_)
  // if (isset($_GET['submit'])) {
  //   echo $_GET['email'];
  //   echo $_GET['title'];
  //   echo $_GET['ingredients'];
  // }

  // POST is more secure because data isn't transmitted in address bar
  if (isset($_POST['submit'])) {
    // Check email
    if (empty($_POST['email'])) {
      $errors['email'] = 'An email is required <br>';
    } else {

      $email = $_POST['email'];
      // Using PHP built-in filter for checking valid email format
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email must be valid';
      }
    }

    // Check title
    if (empty($_POST['title'])) {
      $errors['title'] = 'A  title is required <br>';
    } else {
      // echo htmlspecialchars($_POST['title']);

      $title = $_POST['title'];
      // \s = any whitepace; + = at least one
      if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
        $errors['title'] = 'Title must contain spaces and letters only';
      }
    }

    // Check ingredients
    if (empty($_POST['ingredients'])) {
      $errors['ingredients'] = 'Ingredients are required <br>';
    } else {
      // echo htmlspecialchars($_POST['ingredients']);

      $ingredients = $_POST['ingredients'];
      // \s = any whitepace; + = at least one
      if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s])*$/', $ingredients)) {
        $errors['ingredients'] = 'Ingredients must be a comma-separated list';
      }
    }

    // array_filter performs callback function on each item in array. If no callback function provided (as is the case here), still cycles through array, and if all positions are empty or evaluate to false (an empty string does in a loose comparison), this statement evaluates to false
    if (array_filter($errors)) {
      // echo 'Errors in form';
    } else {
      // echo 'Form is valid';
      header('Location: index.php');
    }

  } // End of POST check
?>


<!DOCTYPE html>
<html>

  <?php include('templates/header.php'); ?>

  <section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <!-- action: the file that will handle the request on the server; file to run and pass this sent data to so it can process it/do something with it -->
    <form action="add.php" class="white" method="POST">
      <label for="email">Your Email:</label>
      <!-- htmlspecialchars is a defense against XSS attacks - takes data that's input and transforms (escapes) special HTML characters (such as angle brackets and quotes) into HTML entities, which are like safe, string-version codes for special characters -->
      <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email) ?>">

      <div class="red-text"><?php echo $errors['email'] ?></div>

      <label for="title">Your pizza's name:</label>
      <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($title) ?>">

      <div class="red-text"><?php echo $errors['title'] ?></div>

      <label for="ingredients">Ingredients (comma separated):</label>
      <input type="text" id="ingredients" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>">

      <div class="red-text"><?php echo $errors['ingredients'] ?></div>

      <div class="center">
        <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
      </div>
    </form>

  </section>

  <?php include('templates/footer.php'); ?>

</html>