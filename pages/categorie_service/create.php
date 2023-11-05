<?php
require_once("../../php/functions.php");
startSession();

include_once("./insert.php");

if (!isAdmin($_SESSION['user'])) {
  header('Location: /ecf/pages/account/admin.php');
  exit();
}
include "../../components/header.php";
?>
<form method="post" action="create.php" class="add-service">
  

  <h2>Enregistrer un nouveau departement de service</h2>
  <div>
    <label for="title">Entrer le titre de la catégorie</label>
    <input type="text" id="title" name="title" placeholder=""> <br>
    <?php if(isset($errors['title'])): ?>
<!-- endif pour fermer les accolades equivalent de '{}' -->
      <span style="color: red;"><?= $errors['title'] ?></span>
      <?php endif; ?>
  </div>
  <div>
    <label for="description">Ajouter une description</label>
    <textarea name="description" id="description" cols="30" rows="10"></textarea> <br>
    <?php if(isset($errors['description'])): ?>
<!-- endif pour fermer les accolades equivalent de '{}' -->
      <span style="color: red;"><?= $errors['description'] ?></span>
      <?php endif; ?>
  </div>
  <div class="space">
    <button type="submit" name="validate_button">Valider</button>
  </div>
</form>