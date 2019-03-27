<?php

// Old school variantas kaip įsidėti klases visas
// Autoload PSR-2 klasių parodyti

require_once "classes/Vehicle.php";
require_once "classes/Car.php";
require_once "classes/Jeep.php";
require_once "classes/Truck.php";
require_once "classes/Motorcycle.php";
require_once "classes/IceCreamTruck.php";
require_once "classes/StationWagon.php";
require_once "classes/TowTruck.php";

$ducati = new Motorcycle(['plate' => 'AAA222',
                          'fuelAmount' => 10]);

$jeep = new Jeep(['plate' => 'AAA222',
                      'fuelAmount' => 10,
                      'fuelType' => 'diesel',
                      'drivetrain' => 'front']);

$volvo = new IceCreamTruck(['plate' => 'AAA222',
                      'fuelAmount' => 10,
                      'fuelType' => 'diesel',
                      'drivetrain' => 'front']);

$audi = new StationWagon(['plate' => 'AAA222',
                      'fuelAmount' => 10,
                      'fuelType' => 'diesel',
                      'drivetrain' => 'front']);

$scania = new TowTruck(['plate' => 'AAA222',
                      'fuelAmount' => 10,
                      'fuelType' => 'diesel',
                      'drivetrain' => 'front',
                      'maxLoad' => 1000]);

// $scania->setSettings(['color' => 'black',
//                       'plate' => 'AAA222',
//                       'fuelAmount' => 10,
//                       'fuelType' => 'diesel',
//                       'drivetrain' => 'front',
//                       'maxLoad' => 1000]);
// $scania->setMaxLoad(1000);

var_dump($ducati);
var_dump($jeep);
var_dump($volvo);
var_dump($audi);
var_dump($scania);
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
