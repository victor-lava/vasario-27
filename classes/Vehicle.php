<?php

class Vehicle {

  public $color = 'black';
  protected $plate = 'AAA222';
  private $fuel = 'diesel';

  public function getFuel() {
    return $this->fuel;
  }

}

?>
