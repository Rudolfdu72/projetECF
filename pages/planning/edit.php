<?php
include "../../components/header.php";
?>
<h1 id="brand_title">Gérer les horaires</h1>
<form method="post" action="" class="form_service">
  <label for="time">Entrer une heure de début:</label>
  <input type="time" id="time" name="time" class="marge">
  <label for="time">Entrer une heure de fin:</label>
  <input type="time" id="time" name="time" class="marge">
  <button type="submit" class="service_button marge">Valider</button>
</form>
<?php
  include "../../components/footer.php";
?>