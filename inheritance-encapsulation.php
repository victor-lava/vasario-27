<?php

// Base-class (parent)
class Vehicle {

  // Everywhere
  public $color = 'black';

  // Inside this class, works in extended class (one level deep), not reachable outside the class
  protected $plate = 'AAA222';

  // Only inside this class, doesn't extend, not reachable outside the clas
  private $fuel = 'diesel';


  public function getFuel() {
    // echo $this->fuel; // Works, because it's inside the class
    return $this->fuel;
  }

}

class Car extends Vehicle {


  public function getPlate() {
    echo $this->fuel;
  }

}

class Jeep extends Car {

}

// $audi = new Vehicle();
// echo $audi->color; // Works, because it's public
// echo $audi->getFuel();
// echo $audi->fuel; // Doesn't work, because private

$audi = new Jeep();
echo $audi->plate;

?>
