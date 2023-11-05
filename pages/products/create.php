<?php
require_once("../../php/functions.php");
startSession();
if (!isAdmin($_SESSION['user'])) {
  header('Location: /ecf/pages/account/admin.php');
  exit();
}

$errors = [];

if (isset($_POST['add-car'])) {


  if (empty($_POST['id_marque'])) {
    $errors['id_marque'] = 'Veuillez indiquer la marque du véhicule';
  }

  if (empty($_POST['price'])) {
    $errors['price'] = 'Veuillez indiquer le prix';
  }

  if (empty($_POST['km'])) {
    $errors['km'] = 'Veuillez indiquer le kilométrage';
  }

  if (empty($_POST['modele'])) {
    $errors['modele'] = 'Veuillez indiquer le modèle du véhicule';
  }

  if (empty($_POST['year'])) {
    $errors['year'] = 'Veuillez indiquer l n\'année du véhicule';
  }
  if(empty($_FILES["product_image"]['name'])){
    $errors['product_image'] =" L'image de la voiture est obligatoire";
  }
  // if (empty($_POST['description'])) {
  //   $errors['description'] = 'Veuillez donner une description';
  // }

  if (count($errors) === 0) {
 
    $brand = $_POST["id_marque"];
    $price = $_POST['price'];
    $km = $_POSt['km'];
    $year = $_POST['year'];
    $modele = $_POST['modele'];
    //$description = $_POST['description'];
    $image_name = $_FILES['product_image']['name'];
    $destination = /ecf



    $pdo = getPdo();
    // Insertion des données dans la table marque
    $marque = "INSERT INTO marque (name, description) VALUES ( :name, :description)";
    $statement = $pdo->prepare($marque);
    $statement->bindValue(':name', $_POST['brand'], PDO::PARAM_STR);
    $statement->bindValue(':description', $_POST['description'], PDO::PARAM_STR);
    $statement->execute();
    // Insertion des données dans la table car
    $requete = "INSERT INTO car( modele, annee, prix, photo) VALUES (:modele, :annee, :prix, :photo)";
    $statement = $pdo->prepare($requete);
    $statement->bindValue(':modele', $_POST['modele'], PDO::PARAM_STR);
    $statement->bindValue(':annee', $_POST['year'], PDO::PARAM_STR);
    $statement->bindValue(':prix', $_POST['price'], PDO::PARAM_STR);
    $statement->bindValue(':photo', $_POST['product_image'], PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['success_car'] = 'Les infos sont soumises avec suces';
    header('Location: /ecf/pages/account/admin.php');
    exit();
  }
} 
?>

<?php

$pdo = getPdo();
$req = $pdo->prepare("SELECT * FROM marque");
$req->execute();
$brands = $req->fetchAll();

include "../../components/header.php";

?>
<div>
  <a href="/ecf/pages/products/index.php">
    <button id="account_btn">Afficher la liste des marques</button>
  </a>

</div>
<form method="post" action="create.php" enctype="multipart/form-data" class="creat_product"><br>

  <h1>Créer une nouvelle voiture</h1>
  <div>
    <input type="file" name="product_image" id="product_image"><br>
    <?php if (isset($errors['product_image'])): ?>
      <span style="color: red;">
        <?= $errors['product_image'] ?>
      </span><br>
    <?php endif; ?>
  </div>
  <div>
    Marque: <br>
    <select name="id_marque" id="">
      <option value="">--Selectionnez une marque--</option>
      <?php foreach( $brands as $brand ): ?>
        <option value="<?= $brand['id_marque'] ?>"><?= $brand['name'] ?></option>
      <?php endforeach; ?>
    </select>
    <?php if (isset($errors['id_marque'])): ?>
      <span style="color: red;">
        <?= $errors['id_marque'] ?>
      </span><br>
    <?php endif; ?>
  </div>

  <div>
    <label for="">Modèle:</label>
    <input type="text" name="modele" id="modele" class="marge"><br>
    <?php if (isset($errors['modele'])): ?>
      <span style="color: red;">
        <?= $errors['modele'] ?>
      </span><br>
    <?php endif; ?>
  </div>
  <div>
    Prix:<input type="number" name="price" id="price" class="marge">
    <?php if (isset($errors['price'])): ?>
      <span style="color: red;">
        <?= $errors['price'] ?>
      </span><br>
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
    <?php if (isset($errors['km'])): ?>
      <span style="color: red;">
        <?= $errors['km'] ?>
      </span><br>
    <?php endif; ?>
  </div>
  <div class="marge">
    <select name="year" id="">
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
    <?php if (isset($errors['year'])): ?>
      <span style="color: red;">
        <?= $errors['year'] ?>
      </span><br>
    <?php endif; ?>
  </div>

  <div class="marge">
    <label>Description:</label>
    <textarea name="description" id="description" cols="30" rows="10" class="marge"></textarea>
    <?php if (isset($errors['description'])): ?>
      <span style="color: red;">
        <?= $errors['description'] ?>
      </span><br>
    <?php endif; ?>
  </div>
  <div class="marge">
    <button type="submit" name="add-car">Enregistrer</button>
  </div>
  </div>
</form>