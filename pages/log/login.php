<?php
require_once "../../path.php";
require_once ROOT_PATH . "/php/functions.php";
startSession();
include ROOT_PATH . "/components/header.php";
include ROOT_PATH . "/php/admin_user.php";
// require_once "ecf/config.php";
?>
<h1 id="title">Connexion</h1>
<?php
if (isset($_SESSION['success'])) { ?>
  <p style="color: lightgreen ; text-align: center; font-size: 18px;">
    <?= $_SESSION['success'] ?>
  </p>
  <?php
  unset($_SESSION['success']);
} elseif (isset($_SESSION['error'])) { ?>
  <p style="color: red ; text-align: center; font-size: 18px;">
    <?= $_SESSION['error'] ?>
  </p>

  <?php
  unset($_SESSION['error']);
}
?>
<form method="post" id="form-connexion">
  <div>
    <label for="email">Email: </label>
    <input type="email" name="email" id="email" placeholder="Votre email" />
  </div>
  <div>
    <label>Rôle<label>
        <br>
        <select name="role" id="role_select">
          <option value="">--Choisissez un rôle--</option>
          <br>
          <option value="user">Employé</option>
          <option value="admin">Administrateur</option>
        </select>
  </div>
  <div>
    <label for="password">Mot de passe: </label>
    <input type="password" name="password" id="password" placeholder="Votre mopt de passe" />
  </div>
  <div>
    <input type="submit" name="Connexion" value="Connexion" id="send-button" />
  </div>
</form>
<?php
include ROOT_PATH . "/components/footer.php";
?>