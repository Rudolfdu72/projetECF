
      <?php 
      include "../../components/header.php";
      ?>

      <?php 
      session_start();
      if(isset($_POST['Connexion'])){
        if(!empty($_POST['username']) AND !empty($_POST['password'])){

          $username = "admin";
          $password = "admin1234";

          $pseudo_saisi = htmlspecialchars($_POST['username']);
          $password_saisi = htmlspecialchars($_POST['password']);

          if($pseudo_saisi == $username AND $password_saisi == $password){
            $_SESSION['password'] = $password_saisi;

            header('location: /ecf/pages/account/myaccount.php');
          } else{
            echo 'saisir un mot de passe et un pseudo correct';
          }

        } else{
          echo 'veuiller compléter tous les champs';
        }   
      }
      ?>
      <h1 id="title">Connexion</h1>
      <form method="post" id="form-connexion">
        <div>
          <label for="username">Identifiant: </label>
          <input type="text" name="username" id="username" placeholder="Votre identifiant"/>
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



