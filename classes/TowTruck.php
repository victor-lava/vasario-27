<?php

class TowTruck extends Truck {

  public $maxLoad; // kiek gali patempti

  public function __construct(array $settings) {

    $this->setSettings($settings);
    $this->setMaxLoad($settings['maxLoad']);

  }

  public function setMaxLoad(float $load) {
    $this->maxLoad = $load;
  }

}

?>
