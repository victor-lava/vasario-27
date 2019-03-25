<?php

class Car
{
    public $fuel;
    public $plate;
    public $color;

    public function __construct() {

    }

    public function setFuel(string $fuel) {
      $this->fuel = $fuel;
    }

    public function setPlate(string $plate) {
      $this->plate = $plate;
    }

    public function setColor(string $color) {
      $this->color = $color;
    }

    public function setSettings(array $settings) {
      $this->setColor($settings['color']);
      $this->setPlate($settings['plate']);
      $this->setFuel($settings['fuel']);
      // $this->color = $settings['color'];
    }

    public function drive() { // Method (metodas, t.y funkcija klasės viduje)
      echo "I am driving on ".$this->fuel.' '. $this->plate.' '.$this->color; // this yra klasė Car šiuo metu
    }

}

$audi = new Car();
$audi->setSettings(['plate' => 'AAD222',
                    'color' => 'black',
                    'fuel' => 'gas']);
$audi->drive();


?>
