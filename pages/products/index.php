<?php
include_once("../../php/functions.php");
include_once("../../path.php");
startSession();

// Selection et affichage des produits

$pdo = getPdo();
//$req = $pdo->prepare("SELECT * FROM car");
$req = $pdo->prepare("SELECT * FROM car INNER JOIN marque ON car.id_marque= marque.id_marque");
$req->execute();
$cars = $req->fetchAll();

include "../../components/header.php";
?>
<h1 id="brand_title">Liste des voiture</h1>
<span style="margin-left: 20px;">
  <a href="/ecf/pages/products/create.php">
    <button>Ajouter une Voiture</button>
  </a>
</span>
<div class="table_container">
  <?php
  if (isset($_SESSION['success'])) { ?>
    <p style="color: lightgreen ;">
      <?= $_SESSION['success'] ?>
    </p>
  <?php }
  unset($_SESSION['success']);
  ?>

  <!-- La liste de toutes de tous les marques -->
  <table class="car_table">
    <thead>
      <tr>
        <th>#id</th>
        <th>Modele</th>
        <th>Marque</th>
        <th>Prix</th>
        <th>kilomètre</th>
        <th>Photo</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($cars as $car): ?>
        <tr>
          <td><?= $car['id_voiture'] ?></td>
          <td><?= $car['modele'] ?></td>
          <td><?= $car['annee'] ?></td>
          <td><?= $car['name'] ?></td>
          <td><?= $car['prix'] ?>€ </td>
          <td><?= $car['km'] ?>km</td>
          <td><img src="<?= BASE_URL.'/public/images/'.$car['photo']?>" 
            style="width: 40px; height: 40px; border-radius: 50%;"
          alt=""></td>
          <td>
            <span class="edit"><a href="<?= BASE_URL ?>/pages/products/edit.php?id=<?= $car['id_voiture'] ?>">Modifier</a></span>
            <span class="delete"><a href="<?= BASE_URL ?>/pages/products/delete.php?id=<?= $car['id_voiture'] ?>">Supprimer</a></span>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
include "../../components/footer.php";
?>