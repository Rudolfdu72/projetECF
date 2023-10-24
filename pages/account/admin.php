      <?php
        session_start();
        require_once "../../php/functions.php";
        // Vérifie les infos dispo dans la session
        // echo "<pre>";
        // print_r($_SESSION['user']);
        // echo "</pre>";
        // die();
        //vérifier d'abord si l'utilisateur est connecté 
        if(!islogged())
          header('location:/ecf/pages/log/login.php');
          
      include "../../components/header.php";
      
      ?>
      <div class="admin-container">
          <div>
            <a href="/ecf/pages/account/logout.php">
            <button id="account_btn">Déconnexion</button>
            </a>
          </div>
          

          <div>
          <a href="/ecf/pages/suscribe/suscribe.php">
            <button id="account_btn">Ajouter un compte</button>
          </a>
          </div>
          
          <div>
            <a href="/ecf/pages/products/productadd.php">
              <button id="account_btn">Ajouter un produit</button>
            </a>
          </div>
          
          
          <div>
            <a href="/ecf/pages/planning/planning.php">
              <button id="account_btn">Gérer les horraires</button>
            </a>
          </div>
          
          <div>
            <a href="/ecf/pages/services/services.php">
              <button id="account_btn">Ajouter un service</button>
          </a>
          </div>
        </div>  
        <div class="account-container">
          <h1 id="account_title">Bienvenue <?= $_SESSION['user']['prenom_utilisateur'] ?> sur votre espace administrateur</h1>
        </div>
      <?php 
        include "../../components/footer.php";
      ?>
 