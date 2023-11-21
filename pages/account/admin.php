<?php
include("../../path.php");
require_once ROOT_PATH . "/php/functions.php";
startSession();
// Vérifie les infos dispo dans la session
// echo "<pre>";
// print_r($_SESSION['user']);
// echo "</pre>";
// die();
//vérifier d'abord si l'utilisateur est connecté 
if (!islogged())
  header('location:' . BASE_URL . '/pages/log/login.php');

include ROOT_PATH . "/components/header.php";

?>
<h1 id="account_title">Bienvenue
  <?= $_SESSION['user']['prenom_utilisateur'] ?> sur votre espace
   <?= isAdmin($_SESSION['user']) ? ' administrateur' : ' personnel' ?>
</h1>
<!-- GEstion des messages du succèss -->
<div class="admin-container">
  <div>
    <a href="<?= BASE_URL ?>/pages/account/logout.php">
      <button id="account_btn">Déconnexion</button>
    </a>
  </div>
  <?php if (isAdmin($_SESSION['user'])): ?>
    <div>
      <a href="<?= BASE_URL ?>/pages/suscribe/suscribe.php">
        <button id="account_btn">Ajouter un compte</button>
      </a>
    </div>
  <?php endif; ?>

  <div>
    <a href="<?= BASE_URL ?>/pages/brands/index.php">
      <button id="account_btn">Gérer les marques</button>
    </a>
    <div>
      <a href="<?= BASE_URL ?>/pages/products/index.php">
        <button id="account_btn">Gérer les produits</button>
      </a>
    </div>

    <?php if (isAdmin($_SESSION['user'])): ?>
      <div>
        <a href="/ecf/pages/planning/index.php">
          <button id="account_btn">Gérer les horraires</button>
        </a>
      </div>
    <?php endif; ?>

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
      <p style="color: lightgreen ; text-align: center; font-size: 18px;">
        <?= $_SESSION['success'] ?>
      </p>
      <?php unset($_SESSION['success_cat']);
    } elseif (isset($_SESSION['error'])) { ?>
      <p style="color: red ; text-align: center; font-size: 18px;">
        <?= $_SESSION['error'] ?>
      </p>
      <?php unset($_SESSION['success_cat']);
    } ?>
  </div>
  <?php
  include "../../components/footer.php";
  ?>