<?php

// Typehint: nusako kintamojo tipa/tipus
function isValidEmail(string $email) : bool {
  $regex = '/^(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){255,})(?!(?:(?:\x22?\x5C[\x00-\x7E]\x22?)|(?:\x22?[^\x5C\x22]\x22?)){65,}@)(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22))(?:\.(?:(?:[\x21\x23-\x27\x2A\x2B\x2D\x2F-\x39\x3D\x3F\x5E-\x7E]+)|(?:\x22(?:[\x01-\x08\x0B\x0C\x0E-\x1F\x21\x23-\x5B\x5D-\x7F]|(?:\x5C[\x00-\x7F]))*\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-[a-z0-9]+)*\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-[a-z0-9]+)*)|(?:\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\]))$/iD';
  // $result = false;

  preg_match(   $regex,
                $email,
                $emailArray);

  print_R($emailArray);

  // if(count($emailArray) === 0) {
  //   $result = true;
  // }

  // Ternary if/else
  return (count($emailArray) === 0) ? false : true;
}




  // print_R($_GET);
  // if()

if(count($_POST) > 0) { // Jei masyve yra daugiau nei 0 elementu, vadinasi forma buvo išsiųsta
    // echo "issiunte";

    if(empty($_POST['name'])) {
      echo "Iveskite varda.";
    }

    // Galima ir taip parašyti
    // if(isValidEmail($_POST['email']) === false)
    if(!isValidEmail($_POST['email'])) {
      echo "Įveskite teisingą el. pašto adresą.";
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
    <h1>Sveiki</h1>

    <!--  -->
    <form class="" action="/" method="post" novalidate>
      <div class="">
        <label for="">Name</label>
        <input type="text" name="name" value="">
      </div>
     <div class="">
      <label for="">E-mail</label>
      <input type="email" name="email" value="">
     </div>
    <button type="submit">Send</button>
    </form>
    <footer>
      All rights reserved.
      <?php echo '©' . date('Y'); ?>
    </footer>
  </body>
</html>
