<?php
/*
   PSR-1 ir PSR-2 (standartai kaip rašyti kodą)
   Geri pavyzdžiai:
   Car
   CarTest

   Blogi:
   4Car
   car
   car_test
*/

class Car
{

    public $fuel; // Property (klasės savybė, atributas)
    public $plate;
    public $color;

    public function drive() { // Method (metodas, t.y funkcija klasės viduje)
      echo "I am driving on ".$this->fuel; // this yra klasė Car šiuo metu
    }

}

$audi = new Car(); // nieko neatspausdina
$audi->fuel = 'diesel'; // blogo praktika, nes fuel gali būti bet kokio duomenų tipo
$audi->color = 'black'; // propercio reikšmės priskyrimas
$audi->plate = 'AAA222';
$audi->drive(); // I am driving on diesel... (metodo iškvietimas)

$bmw = new Car(); // nieko neatspausdina
$bmw->fuel = 'gas';
$bmw->drive(); // I am driving on diesel... (metodo iškvietimas)



?>
