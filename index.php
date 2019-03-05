<!-- 1. Pagal pavyzdį iš github'o pasidaryti registracijos forma
2. Reikalingi laukeliai:
1. Vardas (*) bet negali buti trumpresnis nei 3 simboliai
2. Pavardė (*) bet negali buti trumpresnis nei 3 simboliai
3. El. paštas (*) regex
4. Tel. numeris regex

* - privalomi laukai

eilutės ilgiui naudoti strlen - http://php.net/manual/en/function.strlen.php -->

<!-- MVC -->
<?php require_once "backend/functions.php"; ?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .error {
        border: 1px solid red;
      }
    </style>
  </head>

  <body>

    <?php require_once "html/header.php"; ?>

    <?php require_once "html/registration-form.php"; ?>

    <?php require_once "html/footer.php"; ?>

  </body>
</html>
