<?php require_once "backend/registration-form.php"; ?>
<?php if($sekme !== 4): ?>
<form class="" action="index.php" method="post" novalidate>

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
<?php else: ?>
 <p>Forma sėkmingai užpildyta.</p>
<?php endif; ?>
