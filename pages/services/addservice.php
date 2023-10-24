<?php
require_once "../../components/header.php";
?>
<form method="post" action="" class="add-service">
  <div class="spaces">
    <label for="">Ajouter un service:</label><input type="text" id="text" name="text" placeholder="Entre le service">
  </div>
  <select name="service" id="service">
      <option value="Mécanique">Choisi un service:</option>
    <optgroup label="Mécanique:">
      <option value="Freinage">Freinage</option>
      <option value="Amortisseur">Amortisseur</option>
      <option value="climatisation">climatisation</option>
      <option value="Diagnostique éléctronique">Diagnostique éléctronique</option>
      <option value="Translation suspension">Translation suspension</option>
    </optgroup>
    <optgroup label="révision et vidange:">
      <option value="Vidange">Vidange</option>
      <option value="Révision">Révision</option>
      <option value="Révision constructeur">Révision constructeur</option>
      <option value="Equipement et auto">Equipement et auto</option>
    </optgroup>
    <optgroup label="Carrosserie">
      <option value="Vidange">Vidange</option>
      <option value="Révision">Révision</option>
      <option value="Révision constructeur">Révision constructeur</option>
      <option value="Equipement et auto">Equipement et auto</option>
      <option value="Translation suspension">Translation suspension</option>
    </optgroup>
  </select>
  <div class="btn-space">
    <button name="validate_button">Valider</button>
  </div>
  
</form>

<?php 
  include "../../components/footer.php";
?>
























