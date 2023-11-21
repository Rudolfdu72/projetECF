<?php
include("../../path.php");
require_once(ROOT_PATH."/php/functions.php");
startSession();
$pdo = getPdo();

if (isset($_GET["id"])) {
  $idCar = $_GET['id'];
  $req = $pdo->prepare('SELECT * FROM car WHERE id_voiture=?');
  $req->execute(array($idCar));
  $car = $req->fetch();


  $pdo = getPdo();
  $req = $pdo->prepare("SELECT * FROM marque");
  $req->execute();
  $marques = $req->fetchAll();


  $errors = [];

  if (isset($_POST['edit-car'])) {

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
    if (empty($_FILES["product_image"]['name'])) {
      $errors['product_image'] = " L'image de la voiture est obligatoire";
    }


    if (count($errors) === 0) {

      $marque = $_POST["id_marque"];
      $price = $_POST['price'];
      $km = $_POST['km'];
      $year = $_POST['year'];
      $modele = $_POST['modele'];
      $details = $_POST['description'];
      $image = "";
      //$description = $_POST['description'];
      //On récupère le nom originale de l'image
      $image_name = $_FILES['product_image']['name'];
      //On spécifie le dossier de destination du stockage des image
      $destination = ROOT_PATH . "/public/images/" . $image_name;
      //On récupère le stockage temporaire de l'image
      $tmp_name = $_FILES["product_image"]["tmp_name"];
      //On déplace l'image du dossier temporaire vers le dossier de destination
      $result = move_uploaded_file($tmp_name, $destination);


      if ($result) {
        $image = $image_name;

        $pdo = getPdo();
        // modification des données dans la table marque
        $req = "UPDATE car 
        SET id_marque = :idMarque, modele=:modele, annee=:annee, prix=:prix, photo=:photo, km=:km, details=:details
        WHERE id_voiture=:idCar";

        $statement = $pdo->prepare($req);
        $statement->execute([
          "idMarque" => $marque,
          "modele" => $modele,
          "prix" => $price,
          "annee" => $year,
          "photo" => $image,
          "km" => $km,
          "details" => $details,
          "idCar" => $idCar
        ]);

        $_SESSION['success'] = 'Les infos sont modifiés avec suces';
        header('Location: ' . BASE_URL . '/pages/products/index.php');
        exit();

      } else {
        $errors["product_name"] = "Une erreur lors du chargement de l'image";

      }
    }
  }



  include ROOT_PATH."/components/header.php";

  ?>
  <div>
    <a href="<?= BASE_URL . '/pages/products/index.php' ?>">
      <button id="account_btn">Afficher la liste des Voitures</button>
    </a>

  </div>

  <form method="post" action="" enctype="multipart/form-data" class="creat_product"><br>

    <h1>Créer une nouvelle voiture</h1>
    <div>
      <input type="file" value="<?= $car['photo'] ?>" name="product_image" id="product_image"><br>
      <?php if (isset($errors['product_image'])): ?>
        <span style="color: red;">
          <?= $errors['product_image'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div>
      Marque: <br>
      <select name="id_marque" id="">
        <?php foreach ($marques as $marque): ?>
          <option <?= $marque['id_marque'] == $car['id_marque'] ? 'selected' : '' ?>
          value="<?= $marque['id_marque'] ?>">
            <?= $marque['name'] ?>
          </option>
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
      <input value="<?= $car['modele'] ?>" type="text" name="modele" id="modele" class="marge"><br>
      <?php if (isset($errors['modele'])): ?>
        <span style="color: red;">
          <?= $errors['modele'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div>
      Prix:<input value="<?= $car['prix'] ?>" type="number" name="price" id="price" class="marge">
      <?php if (isset($errors['price'])): ?>
        <span style="color: red;">
          <?= $errors['price'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div class="marge">
      <select name="km" id="km">
        
        <option value="<?= $car['km'] ?>"><?= $car['km'] ?> km</option>
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
        <option value="<?= $car['annee'] ?>"><?=$car['annee']?></option>
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
      <textarea value="<?= $car['details'] ?>" name="description" id="description" cols="30" rows="10" class="marge"></textarea>
      <?php if (isset($errors['description'])): ?>
        <span style="color: red;">
          <?= $errors['description'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div class="marge">
      <button type="submit" name="edit-car">Modifier</button>
    </div>
    </div>
  </form>
  <?php
} else {
  header('Location: ' . BASE_URL . '/pages/products/index.php');
  exit();
}
?>