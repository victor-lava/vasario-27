<?php

class Vehicle {

  public $color;
  public $plate;
  public $fuelType;
  public $fuelAmount;
  public $drivetrain; /// front, back or 4 varomi
  private $ownerFullName;
  private $vin;

  public function setSettings(array $settings) {
    if(isset($settings['color'])) {
      $this->setColor($settings['color']);
    } else {
      $this->setColor('black');
    }
    $this->setPlate($settings['plate']);
    $this->setFuelType($settings['fuelType']);
    $this->setFuelAmount($settings['fuelAmount']);
    $this->setDrivetrain($settings['drivetrain']);
  }

  public function setColor(string $color) {
    $this->color = $color;
  }

  public function setPlate(string $plate) {
    $this->plate = $plate;
  }

  public function setFuelType(string $type) {
    $this->fuelType = $type;
  }

  public function setFuelAmount(float $fuel) {
    $this->fuelAmount = $fuel;
  }

  public function setDrivetrain(string $drivetrain) {
    $this->drivetrain = $drivetrain;
  }

  public function setOwner(string $name) {
    $this->ownerFullName = $name;
  }

  public function setVin(string $vin) {
    $this->vin = $vin;
  }

}

?>
