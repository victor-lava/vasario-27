<?php

class Motorcycle extends Vehicle {

  public $wheels = 2;
  // public $rollbars = true;

  public function __construct(array $settings) {
    $settings['fuelType'] = 'gasoline';
    $settings['drivetrain'] = 'front';

    parent::__construct($settings); // Iškviečia Vehicle klasės konstruktorių
  }

}

?>
