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

$old = ['data' => '',
        'numeriai' => '',
        'atstumas' => '',
        'laikas' => ''];

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
        // Įkeliame duomenis
       createGreitis($db, ['numeriai' => $numeriai,
                           'data' => $data,
                           'laikas' => $laikas,
                           'atstumas' => $atstumas]);


      // Nukreipsiu vartotoją iš create.php į index.php

      // header("refresh:20;url=index.php" ); //  nukreipimas į index.php su 5s. uždelsimu
      header('Location: index.php?success=1&numeris='.$numeriai); // nukreipimas į index.php (be laiko uždelsimo)
      exit;
    } else { // Forma nevaliduota

      $old['data'] = $data;
      $old['numeriai'] = $numeriai;
      $old['laikas'] = $laikas;
      $old['atstumas'] = $atstumas;

    }

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
