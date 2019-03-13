<?php

  require_once "backend/functions.php";

  /* Visi laukai privalomi */

  /* Data: 2018-05-21 12:21:12 */
  /* Numeriai: KNH870 (ne daugiau 7 simboliu) */
  /* Atstumas: (ne daugiau 6 simboliu) */
  /* Laikas: (ne daugiau 6 simboliu) */

  // var_dump($_POST);


  // printing(isValidData('2015-05-12 12:25:12')); // valid

$data = null;
$numeriai = null;
$atstumas = null;
$laikas = null;

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

      header('Location: index.php?numeris='.$numeriai); // nukreipimas į index.php (be laiko uždelsimo)
      exit;
      // header("refresh:20;url=index.php" ); //  nukreipimas į index.php su 5s. uždelsimu
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
    <a href="index.php">Grįžti atgal</a>
    <form method="post">
      <div>
        <label for="data">Data ir laikas *</label>
        <input type="text" id="data" name="data" placeholder="2015-05-12 12:21:12" value="">
        <?php if($data !== null && isValidData($data) === false): ?>
          <p>Įveskite teisingai datą.</p>
        <?php endif; ?>
      </div>
      <div>
        <label for="numeriai">Valstybiniai numeriai *</label>
        <input type="text" id="numeriai" name="numeriai" placeholder="KNH870" value="">
        <?php if($numeriai !== null && isValidNumeriai($numeriai) === false): ?>
          <p>Automobilio numeriai neturėtų būti ilgesni nei 7 simboliai arba neįvedėte numerių.</p>
        <?php endif; ?>
      </div>
      <div>
        <label for="atstumas">Atstumas (m) *</label>
        <input type="text" id="atstumas" name="atstumas" placeholder="1000" value="">
        <?php if($atstumas !== null && isValidAtstumas($atstumas) === false): ?>
          <p>Blogai suvestas atstumas.</p>
        <?php endif; ?>
      </div>
      <div>
        <label for="laikas">Laikas (s) *</label>
        <input type="text" id="laikas" name="laikas" placeholder="10" value="">
        <?php if($laikas !== null && isValidAtstumas($laikas) === false): ?>
          <p>Blogai suvestas laikas.</p>
        <?php endif; ?>
      </div>
      <div>
        <!-- <input type="submit" value="Siųsti"> -->
        <button type="submit">Siųsti</button>
      </div>
    </form>
  </body>
</html>
