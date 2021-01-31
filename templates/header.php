<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Rathaus Pizza</title>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <style type="text/css">
    .brand {
      background: #cbb09c;
    }

    /* .brand:hover {
      background: #b99579;
    } */

    .brand-text {
      color: #cbb09c !important;
    }

    form {
      max-width: 460px;
      margin: 20px auto;
      padding: 20px;
    }

    .red-text {
      margin-bottom: 15px;
    }
  </style>
</head>
  <!-- Using Materialize helper classes -->
  <body class="grey lighten-4">
  <!-- By default, Materialize gives nav dropshadow; z-depth-0 removes it -->
  <nav class="white z-depth-0">
    <!-- container class keeps material in central column rather than full width across page -->
    <div class="container">
      <!-- brand-text is not a Materialize class, but a custom one -->
      <a href="#" class="brand-logo brand-text">Rathaus Pizza</a>
      <ul id="nav-mobile" class="right hide-on-small-and-down">
        <!-- brand is a custom class -->
        <li><a href="#" class="btn brand z-depth-0">Add a pizza</a></li>
      </ul>
    </div>
  </nav>