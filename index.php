<?php

// Old school variantas kaip įsidėti klases visas
// Autoload PSR-2 klasių parodyti
require_once "classes/Vehicle.php";
require_once "classes/Car.php";
require_once "classes/Jeep.php";

$bmw = new Jeep();
echo $bmw->color;

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
