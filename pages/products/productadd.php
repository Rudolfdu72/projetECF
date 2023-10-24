<?php
include "../../components/header.php";
?>

<form method="post" action="" class="form-product"><br>

  <label>télécharger une image:</label><div><input type="file"><br></div>
  <div>Marque:<input type="text" name="brand" id="brand" class="marge"></div>
  <div>Prix:<input type="number" name="pice" id="price" class="marge"></div>

  <div class="marge">
  
    <select name="km" id="km">
      <optgroup label="Kilométrage">
        <option value="">---Kilométrage:---</option>
        <option value="">20 000km</option>
        <option value="">30 000km</option>
        <option value="">40 000km</option>
        <option value="">50 000km</option>
        <option value="">60 000km</option>
        <option value="">70 000km</option>
        <option value="">80 000km</option>
        <option value="">100 000km</option>
      </optgroup>
  </select>
  </div>
  
  <div class="marge">
    <select name="km" id="km">
        <option value="">---Année:---</option>
        <option value="">2013</option>
        <option value="">2014</option>
        <option value="">2015</option>
        <option value="">2016</option>
        <option value="">2017</option>
        <option value="">2018</option>
        <option value="">2019</option>
        <option value="">2020</option>
  </select>
  <div class="marge">
    <button>Valider</button>
  </div>
</div>
</form>