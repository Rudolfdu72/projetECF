<?php
require_once "../../path.php";
require_once ROOT_PATH . "/config.php";
require_once ROOT_PATH . '/php/functions.php';
startSession();
if (!isAdmin($_SESSION['user'])) {
  $_SESSION['error'] = 'Vous n\'êtes authorisé à effectuer cette action';
  header("Location: " . BASE_URL . "/pages/account/admin.php");
  exit();
}

include ROOT_PATH . "/components/header.php";
if (isset($_POST['suscribe'])) {

  if (
    !empty($_POST['firstname']) and !empty($_POST['password']) and !empty($_POST['password_confirm']) and
    !empty($_POST['lastname']) and !empty($_POST['role']) and
    !empty($_POST['email']) and !empty($_POST['email_confirm'])
  ) {
    $firstName = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $monEmail = htmlspecialchars($_POST['email']);
    $mailConfirm = htmlspecialchars($_POST['email_confirm']);
    $passWord = ($_POST['password']);
    $passWordConfirm = ($_POST['password_confirm']);

    $erreur = 'Inscription validée';


    // Email validate
    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
      $erreur = 'Votre addresse mail n\'est pas valide';
    }



    // Email verify
    if ($monEmail == $mailConfirm) {
    } else {
      $erreur = 'vos adresses mails ne sont pas identiques';
    }

    // Password confirm
    if ($passWord == $passWordConfirm) {
      $passWord = password_hash($_POST['password'], PASSWORD_BCRYPT);
    } else {
      $erreur = 'vos mots de passe ne sont pas identiques';
    }

    if ($erreur == '' || empty($erreur)) {
      $pdo = getPdo();

      // Requête préparée pour l'insertion dans la table "utilisateurs"
      $sqlUser = "INSERT INTO users (nom_utilisateur, prenom_utilisateur, role, adresse_email, mot_de_passe) VALUES (:nom, :prenom, :role, :email, :pass_word)";
      $statement = $pdo->prepare($sqlUser);
      $statement->bindValue(':nom', $_POST['firstname'], PDO::PARAM_STR);
      $statement->bindValue(':prenom', $_POST['lastname'], PDO::PARAM_STR);
      $statement->bindValue(':role', $_POST['role'], PDO::PARAM_STR);
      $statement->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
      $statement->bindValue(':pass_word', password_hash($_POST['password'], PASSWORD_BCRYPT), PDO::PARAM_STR);
      $statement->execute();
    }

  } else {
    $erreur = 'Tous les champs doivent etre complétés';
  }
}

?>
<h1 id="title">Inscription</h1>
<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="subscribe_container">
  <div>
    <label>Nom:</label>
    <input type="text" name="firstname" id="firstname" class="input_size">
  </div>
  <div>
    <label>Prénom:</label>
    <input type="text" name="lastname" id="lastname" class="input_size">
  </div>
  <div>
    <label>Rôle<label>
        <select name="role" id="role_select">
          <option value="">--Choisissez un rôle--</option>
          <option value="admin">Administrateur</option>
          <option value="user">Employé</option>
        </select>
  </div>
  <div>
    <label>Mail:</label>
    <input type="" name="email" id="email" class="input_size">
  </div>
  <div>
    <label>Mail de confirmation:</label>
    <input type="email" name="email_confirm" id="email_confirm" class="input_size">
  </div>
  <div>
    <label>Mot de passe:</label>
    <input type="password" name="password" id="password" class="input_size">
  </div>
  <div>
    <label>confirmation de mot de passe:</label>
    <input type="password" name="password_confirm" id="password_confirm" class="input_size">
  </div>
  <div>
    <button id="suscribe" name="suscribe">S'inscrire</button>
  </div>
  <?php
  if (isset($erreur)) {
    echo '<font color ="red">' . $erreur . "</font>";
  }
  ?>
</form>

<?php
include "../../components/footer.php";
?>