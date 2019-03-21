<?php

$a = true;
$b = true;
$c = false;

// if($a === true && $b === true && $c === true)
if($a && $b && $c) {
  $result = false;
} elseif($a === true || $c === true) {
  $result = true;
} else {
  $result = 0;
}

echo $result;

?>
