<?php
require_once ROOT_PATH."/config.php";
include_once("../../php/functions.php");
startSession();

  include "../../components/header.php"; 
  // Selection et affichage des produits

  $pdo = getPdo();
  $req = $pdo->prepare("SELECT * FROM marque");
  $req->execute();
  $brands = $req->fetchAll();
  
  ?>
  
<h1 id="brand_title">Liste des marques</h1>

<span style="margin-left: 20px;">
  <a href="/ecf/pages/products/index.php">
    <button>Afficher la liste de produits</button>
  </a> <br /> <br />
  <a href="/ecf/pages/brands/create.php">
    <button>Ajouter une nouvelle marque</button>
  </a>
</span>

    <!-- La liste de toutes de tous les marques -->
    <div class="table_container">
      <?php
        if (isset($_SESSION['success'])) { ?>
          <p style="color: lightgreen ;" ><?=$_SESSION['success']?></p>
       <?php }
       unset($_SESSION['success']);
      ?>
      <table>
        <thead>
          <tr>
            <th>#id</th>
            <th>Nom</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach( $brands as $brand ): ?>
            <tr>
              <td><?= $brand['id_marque'] ?></td>
              <td><?= $brand['name'] ?></td>
              <td>
                <span class="edit"><a href="/ecf/pages/brands/edit.php?id=<?= $brand['id_marque'] ?>">Modifier</a></span>
                <span class="delete"><a href="/ecf/pages/brands/delete.php?id=<?= $brand['id_marque'] ?>">Supprimer</a></span>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
  </div>
<?php
  include "../../components/footer.php";
?>