<?php
session_start();
include("../../path.php");
require_once "../../php/functions.php";
// Vérifie les infos dispo dans la session
// echo "<pre>";
// print_r($_SESSION['user']);
// echo "</pre>";
// die();
//vérifier d'abord si l'utilisateur est connecté 
if (!islogged())
  header('location:/ecf/pages/log/login.php');

include "../../components/header.php";

?>
<h1 id="account_title">Bienvenue
  <?= $_SESSION['user']['prenom_utilisateur'] ?> sur votre espace administrateur
</h1>
<!-- GEstion des messages du succèss -->
<div class="admin-container">
  <div>
    <a href="/ecf/pages/account/logout.php">
      <button id="account_btn">Déconnexion</button>
    </a>
  </div>
  <div>
    <a href="/ecf/pages/suscribe/suscribe.php">
      <button id="account_btn">Ajouter un compte</button>
    </a>
  </div>

  <div>
    <a href="/ecf/pages/brands/index.php">
      <button id="account_btn">Gérer les marques</button>
    </a>
    <div>
      <a href="/ecf/pages/products/index.php">
        <button id="account_btn">Gérer les produits</button>
      </a>
    </div>


    <div>
      <a href="/ecf/pages/planning/index.php">
        <button id="account_btn">Gérer les horraires</button>
      </a>
    </div>

    <div>
      <a href="/ecf/pages/services/index.php">
        <button id="account_btn">Gérer les services</button>
      </a>
    </div>
    <div>
      <a href="<?= BASE_URL ?>/pages/categorie_service/create.php">
        <button id="account_btn">Ajouter catégories de services</button>
      </a>
    </div>
  </div>
  <div class="account-container">

    <?php
    if (isset($_SESSION['success_cat'])) { ?>
      <p style="color: lightgreen ;">
        <?= $_SESSION['success'] ?>
      </p>
      <?php unset($_SESSION['success_cat']);
    } ?>
  </div>
  <?php
  include "../../components/footer.php";
  ?>