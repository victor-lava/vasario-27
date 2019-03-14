<?php

function printing($data) {
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
}

function connect(): PDO {
  $user = 'homestead';
  $pass = 'secret';

  $db = new PDO('mysql:host=localhost;dbname=automobiliai',
                $user,
                $pass,
                array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING)); // Sukuriamas prisijungimas prie duomenų bazės "automobiliai"
  return $db;
}


function deleteGreitis(PDO $db, int $id): int {

  $query = $db->prepare("DELETE FROM greiciai WHERE id = ?");
  $query->execute([$id]);

  // Row count grazina paveiktų įrašų skaičių
  // if($query->rowCount() > 0) { // istrinta
  //   $isDeleted = 1;
  // } else { // neistrinta
  //   $isDeleted = 0;
  // }
  return ($query->rowCount() > 0) ? 1 : 0; // Tenery if else
}

function updateGreitis(PDO $db, array $data) {

}

function createGreitis(PDO $db, array $data) {
// function createGreitis(PDO $db, string $data,
//                                 string $numeriai,
//                                 string $atstumas,
//                                 string $laikas) {
  // 1. Variantas
  $query = $db->prepare("INSERT INTO greiciai (data,numeriai, atstumas, laikas) VALUES (:dataSQL, :numerisSQL, :atstumasSQL, :laikasSQL)");

  // 2. Asociatyvinis masyvas
  $query->execute([
    'dataSQL' => $data['data'],
    'numerisSQL' => $data['numeriai'],
    'atstumasSQL' => $data['atstumas'],
    'laikasSQL' => $data['laikas']
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

function getGreitis(PDO $db, int $id): array {
    $query = $db->prepare('SELECT * FROM greiciai WHERE id = ?');
    $query->execute([$id]);
    $result = $query->fetch(PDO::FETCH_ASSOC);

    // $result = [];
    // echo [''] == true;
        // ([''] == true) patikriname ar $result yra ne tuscias array
    return (is_array($result)) ? $result : [];
}

function getAllGreiciai(PDO $db): array  {

  // taip nedaryti, nes kiekvieną kartą jungsimes prie DB
  // $db = connect();

  // 1. paruošiame užklausą
  $query = $db->prepare('SELECT * FROM greiciai
                         ORDER BY id DESC'); // surikiuoja įrašus pagal id, mažėjimo tvarka

  // 2. įvykdo užklausą, gražiną true/false
  $query->execute();

  // 3. apdoroja gautus duomenis ir sudeda į masyvą
  return $query->fetchAll(PDO::FETCH_ASSOC);
}

function skaiciuokGreiti( int $laikas, int $atstumas): int {

  $laikas = $laikas / 3600;
  $atstumas = $atstumas / 1000;

  return round($atstumas / $laikas, 0);
}

function isValidData(string $data): bool {
  $result = false;

  $regex = '/[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1]) (2[0-3]|[01][0-9]):[0-5][0-9]:[0-5][0-9]/m';

  preg_match_all($regex, $data, $matches, PREG_SET_ORDER, 0);

  if(count($matches) > 0) {
    $result = true;
  }

  return $result;
}

function isValidNumeriai(string $numeris): bool {

  $result = false;

  if(strlen($numeris) >= 6 &&
     strlen($numeris) <= 7) {
    $result = true;
  }

  return $result;
}

function isValidAtstumas(string $atstumas): bool {
  $result = false;
  // Note: regexas veiktų greičiau
  if(is_numeric($atstumas) && // tikriname ar eilutę gali būti skaičiumi
     strlen($atstumas) <= 6 && // simbolių skaičių, ne gali būti daugiau nei 6
     strlen($atstumas) > 0 && // simbolių skaičių, daugiau už 0
     (int) $atstumas > 0) { // ar pats skaičius nėra mažiau už 0 (t.y ar nera minuso) ir (int) konvertuoja stringą į integer tipą
    $result = true;
  }
  return $result;
}

?>
