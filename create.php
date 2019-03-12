<?php

  require_once "backend/functions.php";

/* Visi laukai privalomi */
/* Data: 2018-05-21 12:21:12 */
/* Numeriai: KNH870 (ne daugiau 7 simboliu) */
/* Atstumas: (ne daugiau 6 simboliu) */
/* Laikas: (ne daugiau 6 simboliu) */

var_dump($_POST);
// echo isValidAtstumas((int) $_POST['atstumas']); // konvertuoja į int
// echo (int) '1000s';
  // echo isValidAtstumas('5'); // valid
  // echo isValidAtstumas('1000'); // valid
  // echo isValidAtstumas('1000s'); // invalid *
  // echo isValidAtstumas('1000'); // valid
  // echo isValidAtstumas('1000000'); // invalid
  // echo isValidAtstumas('-5'); // invalid *
  // echo isValidAtstumas('0'); // invalid *


if(count($_POST) > 0) {
  $user = 'homestead';
  $pass = 'secret';

  $db = new PDO('mysql:host=localhost;dbname=automobiliai',
                $user,
                $pass,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); // Sukuriamas prisijungimas prie duomenų bazės "automobiliai"


  // 1. Variantas
  $query = $db->prepare("INSERT INTO greiciai (data,numeriai, atstumas, laikas) VALUES (:dataSQL, :numerisSQL, :atstumasSQL, :laikasSQL)");

  // 2. Asociatyvinis masyvas
  $query->execute([
    'dataSQL' => $_POST['data'],
    'numerisSQL' => $_POST['numeriai'],
    'atstumasSQL' => $_POST['atstumas'],
    'laikasSQL' => $_POST['laikas']
  ]);

  // 2. Variantas
  // $query = $db->prepare("INSERT INTO greiciai (data, numeriai, atstumas, laikas) VALUES (?, ?, ?, ?)");
  //
  // // 2. Indeksinis masyvas
  // $query->execute([ $_POST['data'],
  //                   $_POST['numeriai'],
  //                   $_POST['atstumas'],
  //                   $_POST['laikas']
  //                 ]);

  // 3. Variantas
  // //
  // $query = $db->prepare("INSERT INTO greiciai (data, numeriai, atstumas, laikas) VALUES (:dataSQL, :numerisSQL, :atstumasSQL, :laikasSQL)");
  //
  // $query->bindParam(':dataSQL', $_POST['data']);
  // $query->bindParam(':numerisSQL', $_POST['numeriai']);
  // $query->bindParam(':atstumasSQL', $_POST['atstumas']);
  // $query->bindParam(':laikasSQL', $_POST['laikas']);
  //
  // $query->execute();
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <form method="post">
      <div>
        <label for="data">Data ir laikas *</label>
        <input type="text" id="data" name="data" value="">
      </div>
      <div>
        <label for="numeriai">Valstybiniai numeriai *</label>
        <input type="text" id="numeriai" name="numeriai" value="">
      </div>
      <div>
        <label for="atstumas">Atstumas (m) *</label>
        <input type="text" id="atstumas" name="atstumas" value="">
      </div>
      <div>
        <label for="laikas">Laikas (s) *</label>
        <input type="text" id="laikas" name="laikas" value="">
      </div>
      <div>
        <!-- <input type="submit" value="Siųsti"> -->
        <button type="submit">Siųsti</button>
      </div>
    </form>
  </body>
</html>
