<?php

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
//
// echo "<pre>";
// var_dump($errors);
// echo "</pre>";
?>
