
      <?php 
      require_once "../../php/functions.php";
      startSession();
      include "../../components/header.php";
      include "../../php/admin_user.php";
      // require_once "ecf/config.php";
      ?>
      <h1 id="title">Connexion</h1>
      <?php
        if (isset($_SESSION['success'])) { ?>
          <p style="color: lightgreen ;" ><?=$_SESSION['success']?></p>
       <?php }
      ?>
      <form method="post" id="form-connexion">
        <div>
          <label for="username">Identifiant: </label>
          <input type="text" name="username" id="username" placeholder="Votre identifiant"/>
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
          <input type="password" name="password" id="password" placeholder="Votre mopt de passe"/>
        </div>
        <div>
          <input type="submit" name="Connexion" value="Connexion" id="send-button" />
        </div>
      </form>
      <?php 
        include "../../components/footer.php";
      ?>



