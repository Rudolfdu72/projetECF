<?php
  // require_once('db_connexion.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/ecf/css/home.css">
  <link rel="stylesheet" href="/ecf/css/header.css">
  <link rel="stylesheet" href="/ecf/css/contact.css">
  <link rel="stylesheet" href="/ecf/css/account.css">
  <link rel="stylesheet" href="/ecf/css/connexion.css">
  <link rel="stylesheet" href="/ecf/css/products.css">
  <link rel="stylesheet" href="/ecf/css/footer.css">
  <link rel="stylesheet" href="/ecf/css/contact-seller.css">
  <link rel="stylesheet" href="/ecf/css/employes.css">
  <link rel="stylesheet" href="/ecf/css/service.css">
  <link rel="stylesheet" href="/ecf/css/admin.css">
  <link rel="stylesheet" href="/ecf/css/addservice.css">
  <link rel="stylesheet" href="/ecf/css/addproduct.css">
  </footer>
  <title>Document</title>
</head>
<body>
  <header class="first-header">
  </header>
    <nav class="nav">
      <ul class="centrer">
          <div id="icon-burger"></div>
          <li><a href="/ecf/index.php">Acceuil</a></li>
          <li><a href="/ecf/index.php#service">Nos services</a></li>
          <li><a href="/ecf/pages/products/products.php">Véhicules d'occasions</a></li>
          <li><a href="/ecf/pages/contact/contact.php">Contact</a></li>
          <?php if(isset($_SESSION['user']) && !empty($_SESSION['user']['email_utilisateur'])): ?>
            <li><a href="<?= BASE_URL.'/pages/account/admin.php'?>">Tableau de bord</a></li>
            <li><?= $_SESSION['user']['nom_utilisateur'].' '. $_SESSION['user']['prenom_utilisateur'] ?></li>
            <?php else : ?>
              <li><a href="<?= BASE_URL. '/pages/log/login.php' ?>">Connexion</a></li>
          <?php endif; ?>
      </ul>
    </nav>

