<?php

function skaiciuokGreiti( int $laikas, int $atstumas): int {

  $laikas = $laikas / 3600;
  $atstumas = $atstumas / 1000;

  return round($atstumas / $laikas, 0);
}

function isValidNumeriai(string $numeris): bool {

  $result = false;

  if(strlen($numeris) >= 6 &&
     strlen($numeris) <= 7) {
    $result = true;
  }

  return $result;
}

function isValidAtstumas(string $atstumas): string {

  $result = 'false';

  if(strlen($atstumas) <= 6 &&
     strlen($atstumas) > 0 &&
     (int) $atstumas) {
    $result = 'true';
  }

  return $result;
}

?>
