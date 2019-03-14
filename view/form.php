<a href="index.php">Grįžti atgal</a>
<form method="post">
  <div>
    <label for="data">Data ir laikas *</label>
    <input type="text" id="data" name="data" placeholder="2015-05-12 12:21:12" value="<?=$old['data'];?>">
    <?php if($data !== null && isValidData($data) === false): ?>
      <p>Įveskite teisingai datą.</p>
    <?php endif; ?>
  </div>
  <div>
    <label for="numeriai">Valstybiniai numeriai *</label>
    <input type="text" id="numeriai" name="numeriai" placeholder="KNH870" value="<?=$old['numeriai'];?>">
    <?php if($numeriai !== null && isValidNumeriai($numeriai) === false): ?>
      <p>Automobilio numeriai neturėtų būti ilgesni nei 7 simboliai arba neįvedėte numerių.</p>
    <?php endif; ?>
  </div>
  <div>
    <label for="atstumas">Atstumas (m) *</label>
    <input type="text" id="atstumas" name="atstumas" placeholder="1000" value="<?=$old['atstumas'];?>">
    <?php if($atstumas !== null && isValidAtstumas($atstumas) === false): ?>
      <p>Blogai suvestas atstumas.</p>
    <?php endif; ?>
  </div>
  <div>
    <label for="laikas">Laikas (s) *</label>
    <input type="text" id="laikas" name="laikas" placeholder="10" value="<?=$old['laikas'];?>">
    <?php if($laikas !== null && isValidAtstumas($laikas) === false): ?>
      <p>Blogai suvestas laikas.</p>
    <?php endif; ?>
  </div>
  <div>
    <!-- <input type="submit" value="Siųsti"> -->
    <button type="submit">Siųsti</button>
  </div>
</form>
