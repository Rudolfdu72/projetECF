<?php
include "../../components/header.php";
?>
  <form method="post" action="" class="form_service"> 
    <label for="">Ajouter un jour</label>
    <select name="days" id="days" class="marge">
      <option value="Lundi">Lundi</option>
      <option value="Mardi">Mardi</option>
      <option value="Mercredi">Mercredi</option>
      <option value="Jeudi">Jeudi</option>
      <option value="Vendredi">Vendredi</option>
      <option value="Samedi">Samedi</option>
      <option value="Dimanche">Dimanche</option>
  </select>
  <div>
    <a href="ecf/pages/planning/edit.php">
      <button type="submit" id="service_button" class="marge">Valider</button>
    </a>
  </div>
</form>
<?php
  include "../../components/footer.php";
?>