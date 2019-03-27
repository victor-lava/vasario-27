<?php

class IceCreamTruck extends Truck {

  public $iceScreamType;

  public function __construct(array $settings) {

    $this->setSettings($settings);

  }

}

?>
