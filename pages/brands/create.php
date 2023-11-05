<?php
include_once("../../php/functions.php");
startSession();
include "../../components/header.php";
$erreur = '';
if (isset($_POST["add-brand"])) {
  $name = trim($_POST["name"]);
  $description = trim($_POST["description"]);

  if(empty($name)) {
    $erreur = "Le nom de la marque est réquis";
  }
  //On vérifie si le nom de la marque existe déjà dans la base de données
  $pdo = getPdo();
  $sql = "SELECT * FROM marque WHERE name LIKE ?";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(array("%$name%"));
  $row = $stmt->fetch() ;
  if(count($row) > 0) {
    $erreur = "Une marque du même existe déjà";
  }

  if(empty($erreur)) {
    $sql = "INSERT INTO marque(name, description) VALUE(?,?)";
    $pdo = getPdo();
    $req = $pdo-> prepare($sql);
    $req->execute([$name,$description]);

    $_SESSION['success'] = "Marque Ajoutée avec sucèss";


    header("Location: /ecf/pages/brands/index.php");
    exit();

  }

}
?>
<?php

?>
<div class="admin-container">
  <div>
    <a href="/ecf/pages/brands/index.php">
      <button id="account_btn">Afficher la liste des marques</button>
    </a>

  </div>

  <!-- La liste de toutes de tous les marques -->
  <h1>Nouvelle marque</h1>
  <form action="" method="post">
    <div class="form-group">
      <label for="name">Nom de la marque</label> <br>
      <input type="text" name="name" id="name">
    </div>
    <div class="form-group">
      <label for="description">Description de la marque</label><br>
      <textarea name="description" id="" cols="30" rows="10"></textarea>
    </div>
    <button type="submit" name="add-brand" class="btn">Soumettre</button>

    <?php
    if (isset($erreur)) {
      echo '<font color ="red">' . $erreur . "</font>";
    }
    ?>
  </form>
</div>

<?php
include "../../components/footer.php";
?>