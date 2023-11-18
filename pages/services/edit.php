<?php
include("../../path.php");
require_once("../../php/functions.php");
startSession();

$pdo = getPdo();

if (isset($_GET["id"])) {
  $idService = $_GET['id'];
  $req = $pdo->prepare('SELECT * FROM service WHERE id_service=?');
  $req->execute(array($idService));
  $service = $req->fetch();


  $req = $pdo->prepare("SELECT * FROM category");
  $req->execute();
  $categories = $req->fetchAll();

  $errors = [];

  if (isset($_POST['edit-service'])) {


    if (empty($_POST['category_id'])) {
      $errors['category_id'] = 'Veuillez indiquer la type du service';
    }

    if (empty($_POST['name'])) {
      $errors['name'] = 'Veuillez indiquer le nom du service';
    }

    if (count($errors) === 0) {

      $category = $_POST["category_id"];
      $name = $_POST['name'];

      // Insertion des données dans la table marque
      $req = "UPDATE service SET category_id=?, name=? WHERE id_service=?";

      $statement = $pdo->prepare($req);
      $statement->execute([
        $category,
        $name,
        $idService,
      ]);

      $_SESSION['success'] = 'Les infos sont soumises avec suces';
      header('Location: ' . BASE_URL . '/pages/services/index.php');
      exit();
    }
  }



  include "../../components/header.php";

  ?>
  <div>
    <a href="/ecf/pages/services/index.php">
      <button id="account_btn">Afficher la liste des services</button>
    </a>

  </div>
  <form method="post" action="edit.php" class="creat_product"><br>

    <h1>Modifier le service</h1>
    <div>
      Type du service: <br>
      <select name="category_id" id="">
        <?php foreach ($categories as $category): ?>
          <option <?= $category['id_category'] == $service['category_id'] ? 'selected' : '' ?>
            value="<?= $category['id_category'] ?>">
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
      <input type="text" value="<?= $service['name'] ?>" name="name" id="name" class="marge"><br>
      <?php if (isset($errors['name'])): ?>
        <span style="color: red;">
          <?= $errors['name'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div class="marge">
      <button type="submit" name="edit-service">Modifier</button>
    </div>
    </div>
  </form>

<?php } else {
  header('Location: ' . BASE_URL . '/pages/services/index.php');
  exit();
} ?>