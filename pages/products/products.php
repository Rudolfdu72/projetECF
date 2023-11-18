<?php
include "../../components/header.php";
include_once("../../php/functions.php");
include_once("../../path.php");
startSession();
// Selection et affichage des produits
$pdo = getPdo();
//$req = $pdo->prepare("SELECT * FROM car");
$req = $pdo->prepare("SELECT * FROM car INNER JOIN marque ON car.id_marque= marque.id_marque");
$req->execute();
$cars = $req->fetchAll();
?>
<main>
  <p class="car-text">Consulter notre catalogue, jusqu'à 1500 véhicule disponible</p>
  <div class="filter">
    <select>
      <option value="">Prix MIN</option>
      <option value="">500€</option>
      <option value="">1000€</option>
      <option value="">2000€</option>
      <option value="">2500€</option>
      <option value="">3000€</option>
    </select>
    <select>
      <option value="">Prix MAX</option>
      <option value="">1000€</option>
      <option value="">2000€</option>
      <option value="">3000€</option>
      <option value="">4000€</option>
      <option value="">50000€</option>
    </select>
    <select>
      <option value="">KM MIN</option>
      <option value="">10 000km</option>
      <option value="">20 000km</option>
      <option value="">30 000km</option>
      <option value="">40 000km</option>
      <option value="">50 000km</option>
    </select>
    <select>
      <option value="">MAX</option>
      <option value="">10 000km</option>
      <option value="">20 000km</option>
      <option value="">30 000km</option>
      <option value="">40 000km</option>
      <option value="">50 0000km</option>
      <select name="" id=""></select>
    </select>
    <button id="delete-filter">Effacer le filtre</button>
    <button id="find-button">Trouver</button>
  </div>
  <div class="product-container">
    <?php foreach ($cars as $car): ?>
    <article>
      <section>
        <img src="<?= BASE_URL.'/public/images/'.$car['photo']?>" alt="" class="car">
        <h2><?= $car['name'] ?></h2>
        <p class="price">Prix TTC: <?= $car['prix'] ?>€</p>
        <p>Kilométrage: <?= $car['km'] ?></p>
        <p class="annee">Année: <?= $car['annee'] ?></p>
        <a href="/ecf/pages/contact/contact.php">
          <button class="details">détails</button>
        </a><br>
        <br>
        <a href="/ecf/pages/contact/contact.php">
          <button class="seller-contact">Contact</button>
        </a>
      </section>
    </article>
    <?php endforeach; ?>
  </div>
</main>
<?php
include "../../components/footer.php";
?>