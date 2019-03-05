<!-- 1. Pagal pavyzdį iš github'o pasidaryti registracijos forma
2. Reikalingi laukeliai:
1. Vardas (*) bet negali buti trumpresnis nei 3 simboliai
2. Pavardė (*) bet negali buti trumpresnis nei 3 simboliai
3. El. paštas (*) regex
4. Tel. numeris regex

* - privalomi laukai

eilutės ilgiui naudoti strlen - http://php.net/manual/en/function.strlen.php -->

<?php
function isValidEmail(string $email) : bool {
  $regex = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
  preg_match(   $regex,
                $email,
                $emailArray,
                PREG_OFFSET_CAPTURE,
                0);
  if(count($emailArray) === 0) {
    $result = true;
  }
  return (count($emailArray) === 0) ? false : true;
}

function isValidPhone(string $phone) : bool {
    $regex = '/^\+370\s6[0-9]{2}\s[0-9]{5}$/Di'; // Regex perziureti
    preg_match(   $regex,
                  $phone,
                  $phoneArray,
                  PREG_OFFSET_CAPTURE,
                  0);


  if(empty($phoneArray)) {
    return false;
  }

  return (count($phoneArray) === 0) ? false : true;
}

$errors = ['vardas' => ['message' => '',
                        'error' => false],
          'pavarde' => ['message' => '',
                        'error' => false],
          'email' => ['message' => '',
                      'error' => false],
          'tel' => ['message' => '',
                    'error' => false]];

$sekme = 0;

if(count($_POST) > 0) {

    // if(empty($_POST['vardas'])) { // jei tuscias
    //     echo "Iveskite varda.";
    // }
    //
    // if(strlen($_POST['vardas']) < 3) { // jei tuscias
    //     echo "Vardas turi būti ne mažiau kaip 3 simboliai";
    // }


    if(empty($_POST['vardas'])) { // jei tuscias
      $errors['vardas']['message'] = "Iveskite varda.";
      $errors['vardas']['error'] = 'error';
    } elseif(strlen($_POST['vardas']) < 3) { // jei netuscias
      $errors['vardas']['message'] = "Vardas turi būti ne mažiau kaip 3 simboliai";
      $errors['vardas']['error'] = 'error';
    } else { $sekme += 1; }
    // else {
    //   $errors['vardas'] = "Teisingas vardas.";
    // }


    if(empty($_POST['pavarde'])) {
      $errors['pavarde']['message'] = "Iveskite pavardę.";
      $errors['pavarde']['error'] = 'error';
    }
    elseif(strlen($_POST['pavarde']) < 3) {
      $errors['pavarde']['message'] = "Pavardė turi būti ne mažiau kaip 3 simboliai";
      $errors['pavarde']['error'] = 'error';
    } else { $sekme += 1; }

    if(!isValidEmail($_POST['email'])) {
      $errors['email']['message'] = "Įveskite teisingą el. pašto adresą.";
      $errors['email']['error'] = 'error';
    } else { $sekme += 1; }

    if(!isValidPhone($_POST['tel'])) {
        $errors['tel']['message'] = "Įveskite teisingą telefono numerį";
        $errors['tel']['error'] = 'error';
    } else { $sekme += 1; }

}



echo "<pre>";
var_dump($errors);
echo "</pre>";
?>

<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <style media="screen">
      .error {
        border: 1px solid red;
      }
    </style>
  </head>

  <body>

      <br>
      <?php if($sekme !== 4): ?>
      <form class="" action="valdo.php" method="post" novalidate>

          <!-- <p>pirmasis</p> -->
          <?php /* foreach($errors as $error) { ?>
            <p class="btn"><?php echo $error; ?></p>
          <?php } */?>
          <!-- <p>antrasis</p> -->
          <!--  Senesnis variantas -->
          <?php /* foreach($errors as $error) {
            echo '<p class="btn">'.$error.'</p>';
          } */ ?>
          <!-- <p>treciasis</p> -->
          <!-- /* einame per klaidų masyva ir kiekviena po viena klaida ateina į kintamajį $error (ne $errors) */ -->
          <?php foreach ($errors as $error): ?>
            <p class="btn"><?=$error['message'];?></p>
          <?php endforeach; ?>


          <div class="">
              <label for="">Vardas *</label>
              <input type="text"
                    class="<?=$errors['vardas']['error'];?>" name="vardas"
                    value="">

              <!-- Nepopuliaru, senesnė sintaksė -->
              <?php /*if($errors['vardas'] !== '') { ?>
              <p><?php echo $errors['vardas']; ?></p>
              <?php }*/ ?>

              <!-- Naujesnė sintaksė, dažniau naudojama -->
              <?php if($errors['vardas']['message'] !== ''): ?>
              <p><?=$errors['vardas']['message'];?></p> <!-- ?= daro echo komanda -->
              <?php endif; ?>
          </div>
          <br>
          <div class="">
              <label for="">Pavardė *</label>
              <input type="text"
                class="<?=$errors['pavarde']['error'];?>"
              name="pavarde" value="">
              <p><?php echo $errors['pavarde']['message']; ?></p>
              
          </div>
          <br>
          <div class="">
              <label for="">El. paštas *</label>
              <input type="email" name="email" value="">
              <p><?php echo $errors['email']['message']; ?></p>
          </div>
          <br>
          <div class="">
              <label for="">Tel. numeris</label>
              <input type="text" name="tel" value="">
              <p><?php echo $errors['tel']['message']; ?></p>
          </div>

          <div class="">
              <p>* - privalomi laukai</p>
          </div>
          <br>
          <button type="submit">Send</button>
      </form>
    <?php else:  ?>
       <p>Forma sėkmingai užpildyta.</p>
     <?php endif; ?>


  </body>
</html>
