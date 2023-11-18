<?php
include("../../path.php");
require_once("../../php/functions.php");
startSession();

$errors = [];

if (isset($_POST['add-service'])) {


  if (empty($_POST['category_id'])) {
    $errors['category_id'] = 'Veuillez indiquer la type du service';
  }

  if (empty($_POST['name'])) {
    $errors['name'] = 'Veuillez indiquer le nom du service';
  }

  if (count($errors) === 0) {

    $category = $_POST["category_id"];
    $name = $_POST['name'];

      $pdo = getPdo();
      // Insertion des données dans la table marque
      $req = "INSERT INTO service(category_id, name) VALUES (?,?)";

      $statement = $pdo->prepare($req);
      $statement->execute([
        $category,
        $name
      ]);

      $_SESSION['success'] = 'Les infos sont soumises avec suces';
      header('Location: ' . BASE_URL . '/pages/services/index.php');
      exit();
  }
}
?>

<?php

$pdo = getPdo();
$req = $pdo->prepare("SELECT * FROM category");
$req->execute();
$categories = $req->fetchAll();

include "../../components/header.php";

?>
<div>
  <a href="/ecf/pages/services/index.php">
    <button id="account_btn">Afficher la liste des services</button>
  </a>

</div>
<form method="post" action="create.php"  class="creat_product"><br>

  <h1>Créer un nouveau service</h1>
  <div>
    Type du service: <br>
    <select name="category_id" id="">
      <option value="">--Selectionnez un type--</option>
      <?php foreach ($categories as $category): ?>
        <option value="<?= $category['id_category'] ?>">
          <?= $category['title'] ?>
        </option>
      <?php endforeach; ?>
    </select>
    <?php if (isset($errors['category_id'])): ?>
      <span style="color: red;">
        <?= $errors['category_id'] ?>
      </span><br>
    <?php endif; ?>
  </div>

  <div>
    <label for="">Nom du service:</label>
    <input type="text" name="name" id="name" class="marge"><br>
    <?php if (isset($errors['name'])): ?>
      <span style="color: red;">
        <?= $errors['name'] ?>
      </span><br>
    <?php endif; ?>
  </div>
  <div class="marge">
    <button type="submit" name="add-service">Enregistrer</button>
  </div>
  </div>
</form>
