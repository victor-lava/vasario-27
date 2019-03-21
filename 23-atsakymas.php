<?php


$tiesa = 1;
$netiesa = false;

// $priskyrimas = (condition) ? true : false; // sintakse
// $netiesa = ($netiesa === $tiesa) ? 'netiesa' : 'tiesa'; // tenery if else

if($netiesa === $tiesa) { // lygina kintamūjų reikšmes ir duomenų tipus
  $netiesa = 'netiesa';
} else {
  $netiesa = 'tiesa';
}

echo $netiesa;

?>
