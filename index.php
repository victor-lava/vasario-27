<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Sveiki</h1>

    <?php
      // $ kintamojo deklaracija
      $vardas = "Viktoras"; // String tipo
      $pavarde = "Lava";
      $skaicius = 5;
      $float = 5.21;
      $array = [5, 10]; // indeksinis masyvas
      $coordinates = [
                      'x' => 5,
                      'y' => 10,
                      'z' => 5.2
                    ]; // associatyvinis masyvas

      // echo $array;
      echo "<pre>";
      print_R($array); // debuginimui
      echo "</pre>";

      for ($i = 0; $i < count($array); $i++) {
        echo $array[$i] . "<br>";
      }

      // $coordinates['x'] =


      echo "<pre>";
      print_R($coordinates);
      echo "</pre>";

      foreach ($coordinates as $key => $value) {
        echo "key: $key value: $value <br>";
      }

      // var_dump($arrayAssoc); // debuginimui, daugiau informacijos

      echo("sveiki, $vardas");
      echo 'sveiki,'.' '.$vardas; // sujungia eilutes, panasiai JS +
      echo 'sveiki, ' . $vardas;
      echo "${vardas} Hello world";
      echo '4' . '5';
      echo '4' + '5';


      // echo sdf
    ?>
  </body>
</html>
