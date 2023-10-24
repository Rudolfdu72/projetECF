<?php
require_once "../../components/header.php";
?>
<form method="post" action="" class="add-service">
  <div>
  <label for="">Entrer une catégorie</label>
  <input type="text" id="text" name="text" placeholder="Entre le nom de la catégorie">
  </div>
  <div  class="space">
    <a href="ecf/pages/services/addservice.php">
      <button name="validate_button">Valider</button>
    </a>
  </div>
</form>