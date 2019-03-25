<?php
class Car
{
    public $fuel;
    public $plate;
    public $color;

    public function __construct(string $fuel,
                                string $plate,
                                string $color) {
      $this->fuel = $fuel; // kintamasis $fuel yra lygus klasės properčiui fuel
      $this->plate = $plate;
      $this->color = $color;
      // echo $fuel; // lokalus kintamasis
      // echo $this->fuel; // property (atributas)
    }

    // public function setFuel(string $fuel) {
    //   $this->fuel = $fuel;
    // }

    public function drive() { // Method (metodas, t.y funkcija klasės viduje)
      echo "I am driving on ".$this->fuel.' '. $this->plate.' '.$this->color; // this yra klasė Car šiuo metu
    }

}

$audi = new Car('diesel', 'AAD222', 'black'); // eiliškumas yra svarbus argumentų
$audi->drive();

// $audi->setFuel('diesel');

// $bmw = new Car();
// $volvo = new Car();

// $audi->fuel = 'diesel';
// $audi->drive(); // I am driving on diesel... (metodo iškvietimas)

// $bmw = new Car(); // nieko neatspausdina
// $bmw->drive(); // I am driving on diesel... (metodo iškvietimas)



?>
