<?php
include_once("../../path.php");
include_once("../../php/functions.php");
startSession();

// Selection et affichage des services

$pdo = getPdo();
//$req = $pdo->prepare("SELECT * FROM car");
$req = $pdo->prepare("SELECT 
    service.id_service as serviceId,service.name as serviceName,category.title categoryTitle
        FROM service INNER JOIN category ON service.category_id= category.id_category");
$req->execute();
$services = $req->fetchAll();

include "../../components/header.php";
?>
<h1 id="brand_title">Liste des services</h1>
<span style="margin-left: 20px;">
  <a href="/ecf/pages/services/create.php">
    <button>Ajouter un service</button>
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
        <th>nom</th>
        <th>categorie de service</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($services as $service): ?>
        <tr>
          <td><?= $service['serviceId'] ?></td>
          <td><?= $service['serviceName'] ?></td>
          <td><?= $service['categoryTitle'] ?></td>
    
          <td>
          <span class="edit"><a href="<?= BASE_URL ?>/pages/services/edit.php?id=<?= $service['serviceId'] ?>">Modifier</a></span>
            <span onclick="confirm('Voulez-vous vraiment supprimer ce service ?')" class="delete"><a href="<?= BASE_URL ?>/pages/services/delete.php?id=<?= $service['serviceId'] ?>">Supprimer</a></span>

          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
</div>

<?php
include "../../components/footer.php";
?>