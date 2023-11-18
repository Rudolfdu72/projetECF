<?php
include("../../path.php");
include_once("../../php/functions.php");
startSession();
if (isset($_SESSION['temoignage'])) {
  header('Location:' . BASE_URL .'/pages/testimonial/index.php');
  exit();
}

if (isset($_POST["testi_button"])) {

  $pseudo = $_POST["pseudo_client"];
  $temoignage = $_POST["temoignage"];
  $thedate = $_POST["date_temoignage"];

  if (empty($_POST["pseudo_client"]) or empty($_POST["temoignage"]) or empty($_POST["date_temoignage"])) {
    $error = [];
    $error["pseudo_client"] = "un pseudo est obligatoire";
    $error["temoignage"] = "Ce champs ne doivent pas etre vide";
    $error["date_temoignage"] = "Veuillez choisir la date";

  } else {
    if (empty($error)) {
      $sql = "INSERT INTO testimonial( pseudo_client, temoignage, date_temoignage) VALUE(?,?,?)";
      $pdo = getPdo();
      $req = $pdo->prepare($sql);
      $req->execute([$pseudo, $temoignage, $thedate]);

      $_SESSION['succes'] = "Merci pour votre témoignage";
      header('Location: ' . BASE_URL . '/pages/testimonial/index.php');
      exit();
    }

  }

}

include "../../components/header.php";
?>
<div class="testi_container">
  <form method="post" action="" class="tes_container">
    <div>
      <label for="">Pseudo:</label><input type="text" name="pseudo_client" id="pseudo_client" class="marge"
        placeholder="Votre pseudo"><br>
      <?php if (isset($error['pseudo_client'])): ?>
        <span style="color: red;">
          <?= $error['pseudo_client'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div>
      <label for="">Votre avis:</label> <br>
      <textarea name="temoignage" id="temoignage" cols="30" rows="10" class="marge"></textarea>
      <?php if (isset($error['temoignage'])): ?>
        <span style="color: red;">
          <?= $error['temoignage'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div>
      <input type="date" name="date_temoignage" id="date_temoignage" class="marge"><br>
      <?php if (isset($error['date_temoignage'])): ?>
        <span style="color: red;">
          <?= $error['date_temoignage'] ?>
        </span><br>
      <?php endif; ?>
    </div>
    <div>
      <button type="submit" name="testi_button" class="marge">Soumettre</button>
    </div>
  </form>
</div>
<?php

include "../../components/footer.php";
?>