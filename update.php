<?php
  require_once "backend/functions.php";

  /* Visi laukai privalomi */
  /* Data: 2018-05-21 12:21:12 */
  /* Numeriai: KNH870 (ne daugiau 7 simboliu) */
  /* Atstumas: (ne daugiau 6 simboliu) */
  /* Laikas: (ne daugiau 6 simboliu) */

$data = null;
$numeriai = null;
$atstumas = null;
$laikas = null;
$redirect = false; // default reikšmė false, reiškia, jog nenukreipsiu jo niekur


if(isset($_GET['id']) && // patikriname ar apskritai get masyve yra id
  is_numeric($_GET['id'])) { // patikriname ar GET'o id yra skaicius ir ar netuscias

  $db = connect();
  $automobilis = getGreitis($db, $_GET['id']);
  // printing([] == false); // galiu patikrint ar tuscias, grazina true;
  // printing([1] == false); // galiu patikrinti ar masyvas nera tuscias, grazina false;
  // if($automobilis == false) {

  if(!count($automobilis) > 0) { $redirect = true; } // ar nera irasu array viduje, atkreipti demesi į !

  $old = ['data' => $automobilis['data'],
          'numeriai' => $automobilis['numeriai'],
          'atstumas' => $automobilis['atstumas'],
          'laikas' => $automobilis['laikas']];

}
else { $redirect = true; } // bando nulaužti, dėl to nukreipiame į index.php


if(count($_POST) > 0) {
  $db = connect();

  $data = $_POST['data'];
  $numeriai = $_POST['numeriai'];
  $atstumas = $_POST['atstumas'];
  $laikas = $_POST['laikas'];

  if(isValidData($data) === true && // *
     isValidNumeriai($numeriai) === true && // *
     isValidAtstumas($atstumas) === true && // *
     isValidAtstumas($laikas) === true) // *
    {

        // Forma validuota sėkmingai
       // Atnaujiname duomenis
       updateGreitis($db,['numeriai' => $numeriai,
                           'data' => $data,
                           'laikas' => $laikas,
                           'atstumas' => $atstumas]);


      // Nukreipsiu vartotoją iš update.php į index.php

      header('Location: index.php?success=1&numeris='.$numeriai); // nukreipimas į index.php (be laiko uždelsimo)
      exit;
    } else { // Forma nevaliduota

      $old['data'] = $data;
      $old['numeriai'] = $numeriai;
      $old['laikas'] = $laikas;
      $old['atstumas'] = $atstumas;

    }

}

if($redirect === true) {
  header('Location: index.php');
  exit;
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php require_once "view/form.php"; ?>
  </body>
</html>
