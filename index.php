<!--
  mysqli_connect .... (nenaudoti, senas ir nesaugus)
  new PDO(); (php data object, naujesnis standartas ir saugesnis)

  Paima visus įrašus iš "greiciai" duomenu lenteles
  SELECT * FROM greiciai (SQL užklausa)

-->

<?php
  require_once "backend/functions.php";

  $db = connect();
  $automobiliai = getAllGreiciai($db);

  // printing($automobiliai);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
  <body>
    <?php if(isset($_GET['numeris'])): ?>
      <p>Įrašas sėkmingai sukurtas, automobilis <?=$_GET['numeris'];?> pridėtas!</p>
      <?php
          // header("refresh:3;url=index.php");
          // exit; // jei norite apačioje esanti kodą, tai užkomentuoti tą exitą
       ?>
    <?php endif; ?>
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
