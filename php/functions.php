<?php
require_once ROOT_PATH."/config.php";

function isAdmin($user){
  if (!empty($user)) {
    $middlware = false;
    //On vérifie si c'est un admin ou un employé simple
    if($user['role'] == "admin"){
      $middlware = true;
    }

    return $middlware;
  }else{
    echo "Vous devez passer un utilisateur valide";
  }
}
    
function getPdo(){
    try {
      $pdo = new PDO('mysql:host=' . HOST . ';port='.PORT.';dbname=' . DB_NAME, USER_NAME, DBPASS_WORD);
         
          $pdo->setAttribute(PDO::ATTR_PERSISTENT, true);
          return $pdo;

    } catch (\Throwable $e) {
      die("Erreur de connexion à la base de données: ".$e->getMessage());
    }
}

function userExist($email, PDO $pdo){
  $result = $pdo->prepare("SELECT * FROM users WHERE adresse_email= ?");
  $result->execute([$email]);

  if($result->rowCount() > 0){
    return $result->fetch();
  }else{
    return null;
  }
}

function islogged(){
  if(session_status() == PHP_SESSION_NONE)
  session_start();

  return !empty($_SESSION['user']);

}

function logout(){
  if(session_status() == PHP_SESSION_ACTIVE){
    unset($_SESSION['user']);
    $_SESSION['success'] = "Vous êtes déconnecté avec sucèss";
    //session_destroy();
    header('location:'.BASE_URL.'/pages/log/login.php');
  }
}

function startSession(){
  if(session_status() == PHP_SESSION_NONE)
  session_start();
}
