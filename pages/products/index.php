<?php
  include "../../components/header.php";
?>
 <h1 id="brand_title">Liste des voiture</h1>
<span style="margin-left: 20px;">
    <a href="/ecf/pages/products/create.php">
      <button>Ajouter une Voiture</button>
      </a>
</span>
<div class="table_container">
    <!-- La liste de toutes de tous les marques -->
    <table class="car_table">
      <thead>
        <tr>
          <th>#id</th>
          <th>Modele</th>
          <th>Marque</th>
          <th>Prix</th>
          <th>kilomètre</th>
          <th>Photo</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>R8</td>
          <td>Ferrari</td>
          <td>3000$</td>
          <td>200 km</td>
          <td>
            <img style="width: 50px; height: 50px; border-radius: 10px;" src="" 
            alt="Image voture">
          </td>
          <td>
            <span class="edit"><a href="/ecf/pages/products/edit.php?id=55">Modifier</a></span>
            <span class="delete"><a href="/ecf/pages/products/delete.php?id=55">Supprimer</a></span>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>R8</td>
          <td>Ferrari</td>
          <td>3000$</td>
          <td>150 km</td>
          <td>
            <img style="width: 50px; height: 50px; border-radius: 10px;" src="" 
            alt="Image voture">
          </td>
          <td>
            <span class="edit"><a href="/ecf/pages/products/edit.php?id=55">Modifier</a></span>
            <span class="delete"><a href="/ecf/pages/products/delete.php?id=55">Supprimer</a></span>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>R8</td>
          <td>Ferrari</td>
          <td>3000$</td>
          <td>180 km</td>
          <td>
            <img style="width: 50px; height: 50px; border-radius: 10px;" src="" 
            alt="Image voture">
          </td>
          <td>
            <span class="edit"><a href="/ecf/pages/products/edit.php?id=55">Modifier</a></span>
            <span class="delete"><a href="/ecf/pages/products/delete.php?id=55">Supprimer</a></span>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>R8</td>
          <td>Ferrari</td>
          <td>3000$</td>
          <td>200 km</td>
          <td>
            <img style="width: 50px; height: 50px; border-radius: 10px;" src="" 
            alt="Image voture">
          </td>
          <td>
            <span class="edit"><a href="/ecf/pages/products/edit.php?id=55">Modifier</a></span>
            <span class="delete"><a href="/ecf/pages/products/delete.php?id=55">Supprimer</a></span>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>R8</td>
          <td>Ferrari</td>
          <td>3000$</td>
          <td>120 km</td>
          <td>
            <img style="width: 50px; height: 50px; border-radius: 10px;" src="" 
            alt="Image voture">
          </td>
          <td>
            <span class="edit"><a href="/ecf/pages/products/edit.php?id=55">Modifier</a></span>
            <span class="delete"><a href="/ecf/pages/products/delete.php?id=55">Supprimer</a></span>
          </td>
        </tr>
        <tr>
          <td>1</td>
          <td>R8</td>
          <td>Ferrari</td>
          <td>3000$</td>
          <td>175 km</td>
          <td>
            <img style="width: 50px; height: 50px; border-radius: 10px;" src="" 
            alt="Image voture">
          </td>
          <td>
            <span class="edit"><a href="/ecf/pages/products/edit.php?id=55">Modifier</a></span>
            <span class="delete"><a href="/ecf/pages/products/delete.php?id=55">Supprimer</a></span>
          </td>
        </tr>
      </tbody>
    </table>
</div>

<?php
  include "../../components/footer.php";
?>