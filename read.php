<!--
  mysqli_connect .... (nenaudoti, senas ir nesaugus)
  new PDO(); (php data object, naujesnis standartas ir saugesnis)

  Paima visus įrašus iš "greiciai" duomenu lenteles
  SELECT * FROM greiciai (SQL užklausa)

-->

<?php
  require_once "backend/functions.php";

  $db = connect();
  if(count($_GET) > 0) {
    $automobilis = getGreitis($db, $_GET['id']);
  }
  // printing($automobilis);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>CRUD</title>
  </head>
  <body>

    <?php if(count($_GET) > 0 && count($automobilis) > 0): ?>
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
        <tr>
          <td><?=$automobilis['data'];?></td>
          <td><?=$automobilis['numeriai'];?></td>
          <td><?=$automobilis['atstumas'];?></td>
          <td><?=$automobilis['laikas'];?></td>
          <td><?=skaiciuokGreiti($automobilis['laikas'], $automobilis['atstumas']); ?></td>
          <td>
            <a href="update.php?id=<?=$automobilis['id'];?>">Taisyti</a>
            <a href="delete.php?id=<?=$automobilis['id'];?>&numeris=<?=$automobilis['numeriai']?>">Trinti</a>
          </td>
        </tr>
        <!-- Pabaiga dinamiško turinio -->
      </tbody>
    </table>
  <?php else: ?>
    <p>Įrašas nerastas arba įvyko klaida.</p>
  <?php endif; ?>
    <a href="create.php">Sukurti</a>
  </body>
</html>
