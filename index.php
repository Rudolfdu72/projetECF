<?php
include_once("./path.php");
include_once("./php/functions.php");
startSession();

// Selection et affichage des services

$pdo = getPdo();
//$req = $pdo->prepare("SELECT * FROM car");
$req = $pdo->prepare("SELECT * FROM category");
$req->execute();
$categories = $req->fetchAll();

$req = $pdo->prepare("SELECT * FROM service");
$req->execute();
$services = $req->fetchAll();

include "components/header.php";
?>
<div id="home-background">
</div>
<main>

  <h2 class="logo-title">Garage Parrot</h2>
  <div class="banner-title" id="service">
    <h2 id="banner-text">Nos services</h2>
  </div>
  <div class="textarea">
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit,
      sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
      exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
      voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt
      in culpa qui officia deserunt mollit anim id est laborum."</p>
  </div>

  <div class="container">
   <?php foreach( $categories as $category ): ?>
     <article class="card-service">
      <p class="card-text">
      <h2><?= $category['title'] ?></h2>
      <?php foreach( $services as $service ): ?>
        
        <?php if( $service['category_id'] == $category['id_category'] ): ?>
        <?php endif; ?>
      <?php endforeach; ?>
      
      <button class="button-text">En savoir plus</button>
    </article>
   <?php endforeach; ?>
    <!-- .......................................................................................... -->
  </div>
  </div>
</main>
<div class="testi">
  <h2 class="texti-client"> NOS AVIS CLIENTS</h2>
  <div class="testimonial">
    <p class="test">Evaluations</p>
    <a href="/ecf/pages/testimonial/index.php">
      <button id="eval">Donnez votre avis</button>
    </a>
  </div>
  <div class="testimonial-area">
    <div class="column-1">
      <div class="avatar"></div>
    </div>
    <div class="column-1">
      <div class="avatar"></div>
    </div>
    <div class="column-1">
      <div class="avatar"></div>
    </div>
  </div>
</div>
<?php
include "components/footer.php";
?>