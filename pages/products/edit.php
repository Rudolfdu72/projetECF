<?php
require_once("../../php/functions.php");
startSession();
include_once("./create_product.php");
include "../../components/header.php";
if (!isAdmin($_SESSION['user'])) {
  header('Location: /ecf/pages/account/admin.php');
  exit();
}

?>
<div>
  <a href="/ecf/pages/brands/index.php">
    <button id="account_btn">Afficher la liste des marques</button>
  </a>

</div>
<form method="post" action="productadd.php" class="creat_product"><br>
  <h1>Modification de la voiture</h1>
  <div>
    <input type="file" name="product_image" id="product_image"><br>
    <?php if (isset($errors['product_image'])) : ?>
      <span style="color: red;"><?= $errors['product_image'] ?></span><br>
    <?php endif; ?>
  </div>
  <div>
    Marque: <br>
    <select name="id_marque" id="">
      <option value="4">Buggati</option>
      <option value="4">Ferrari</option>
      <option value="4">Porshe</option>
    </select>
    <?php if (isset($errors['brand'])) : ?>
      <span style="color: red;"><?= $errors['brand'] ?></span><br>
    <?php endif; ?>
  </div>

  <div>
    <label for="">Modèle:</label>
    <input type="text" name="modele" id="modele" class="marge"><br>
    <?php if (isset($errors['modele'])) : ?>
      <span style="color: red;"><?= $errors['modele'] ?></span><br>
    <?php endif; ?>
  </div>
  <div>
    Prix:<input type="number" name="price" id="price" class="marge">
    <?php if (isset($errors['price'])) : ?>
      <span style="color: red;"><?= $errors['price'] ?></span><br>
    <?php endif; ?>
  </div>
  <div class="marge">
    <select name="km" id="km">
      <option value="">Selectionner le nombre km</option>
      <option value="20 000">20 000km</option>
      <option value="30 000">30 000km</option>
      <option value="40 000">40 000km</option>
      <option value="50 000">50 000km</option>
      <option value="60 000">60 000km</option>
      <option value="70 000">70 000km</option>
      <option value="80 000">80 000km</option>
      <option value="100 000">100 000km</option>
    </select>
    <?php if (isset($errors['km'])) : ?>
      <span style="color: red;"><?= $errors['km'] ?></span><br>
    <?php endif; ?>
  </div>
  <div class="marge">
    <select name="year" id="km">
      <option value="">---Année:---</option>
      <option value="2013">2013</option>
      <option value="2014">2014</option>
      <option value="2015">2015</option>
      <option value="2016">2016</option>
      <option value="2017">2017</option>
      <option value="2018">2018</option>
      <option value="2019">2019</option>
      <option value="2020">2020</option>

    </select>
    <?php if (isset($errors['year'])) : ?>
      <span style="color: red;"><?= $errors['year'] ?></span><br>
    <?php endif; ?>
  </div>

  <div class="marge">
    <label>Description:</label>
    <textarea name="description" id="description" cols="30" rows="10" class="marge"></textarea>
    <?php if (isset($errors['description'])) : ?>
      <span style="color: red;"><?= $errors['description'] ?></span><br>
    <?php endif; ?>
  </div>
  <div class="marge">
    <button type="submit" name="validatebtn">Modifier</button>
  </div>
  </div>
</form>