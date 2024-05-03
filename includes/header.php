<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>
    <?php
    session_start();

    if (isset($_SESSION['title'])) {
      echo $_SESSION['title'];
    } else {
      echo "Forum";
    }
    ?>
  </title>
  <link rel="stylesheet" href="../css/global.css">
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>