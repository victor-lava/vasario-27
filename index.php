<!--
  mysqli_connect .... (nenaudoti, senas ir nesaugus)
  new PDO(); (php data object, naujesnis standartas ir saugesnis)

  Paima visus įrašus iš "greiciai" duomenu lenteles
  SELECT * FROM greiciai (SQL užklausa)

-->

<?php

  require_once "backend/functions.php";

  // root, mysql
  // root, root

  $user = 'homestead';
  $pass = 'secret';

  $db = new PDO('mysql:host=localhost;dbname=automobiliai',
                $user,
                $pass); // Sukuriamas prisijungimas prie duomenų bazės "automobiliai"

  // 1. paruošiame užklausą
  $query = $db->prepare('SELECT * FROM greiciai');

  // 2. įvykdo užklausą, gražiną true/false
  $query->execute();

  // 3. apdoroja gautus duomenis ir sudeda į masyvą
  $automobiliai = $query->fetchAll(PDO::FETCH_ASSOC);

  echo "<pre>";
  print_R($automobiliai); // gauti vienam įrašui
  // print_R($query->fetchAll()); // o šitas skirtas, gauti daugiau nei vienam įrašui
  // PDO::FETCH_ASSOC - gražina asociatyvinį masyvą
  echo "</pre>";
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
  <body>

    <table>
      <thead>
        <tr>
          <!-- Vidutinio greičio matuoklis -->
          <th>Data ir laikas</th>
          <th>Automobilio numeriai</th>
          <th>Atstumas (m)</th>
          <th>Laikas (s)</th>
          <th>Greitis (km/h)</th>
          <th>Veiksmai</th>
        </tr>
      </thead>
      <tbody>
        <!-- Dinamiškas turinys (iš duomenų bazės) -->
        <?php foreach($automobiliai as $automobilis): ?>
        <tr>
          <td><?=$automobilis['data'];?></td>
          <td><?=$automobilis['numeriai'];?></td>
          <td><?=$automobilis['atstumas'];?></td>
          <td><?=$automobilis['laikas'];?></td>
          <td><?=skaiciuokGreiti($automobilis['laikas'], $automobilis['atstumas']); ?></td>
          <td>
            <a href="#">Taisyti</a>
            <a href="#">Trinti</a>
          </td>
        </tr>
        <?php endforeach; ?>
        <!-- Pabaiga dinamiško turinio -->
      </tbody>
    </table>
    <a href="create.php">Sukurti</a>
  </body>
</html>
