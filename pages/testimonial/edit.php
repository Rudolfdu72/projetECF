<table class="car_table">
    <thead>
      <tr>
        <th>#id</th>
        <th> pseudo_client</th>
        <th>temoignage</th>
        <th>date_temoignage</th>
      </tr>
    </thead>
    <tbody>
        <tr>
          <td><?= $car[' pseudo_client'] ?></td>
          <td><?= $car['temoignage'] ?></td>
          <td><?= $car['name'] ?></td>
          <td><?= $car['date_temoignage'] ?></td>
            <span class="edit"><a href="<?= BASE_URL ?>/pages/testimonial/edit.php?id=<?= $car['id_voiture'] ?>">Modifier</a></span>
            <span class="delete"><a href="<?= BASE_URL ?>/pages/products/delete.php?id=<?= $car['id_voiture'] ?>">Supprimer</a></span>
          </td>
        </tr>
    </tbody>
  </table>
</div>