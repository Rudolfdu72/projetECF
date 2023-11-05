<?php
  include "../../components/header.php";
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
    <h1>Modifier la marque</h1>
    <form action="" method="post">
      <div class="form-group">
        <label for="name">Nom de la marque</label> <br>
        <input type="text" name="name" id="name">
      </div>
      <div class="form-group">
        <label for="description">Description de la marque</label><br>
        <textarea name="description" id="" cols="30" rows="10"></textarea>
      </div>
      <button type="submit" class="btn">Modifier</button>
    </form>
</div>

<?php
  include "../../components/footer.php";
?>