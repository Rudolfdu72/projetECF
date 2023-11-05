<?php

require_once "../../php/functions.php";
startSession();

if(!isAdmin($_SESSION['user'])){
  header('Location: /ecf/pages/account/admin.php');
  exit();
}
$errors = [];

//Si on soumet le formulaire
if (isset($_POST['validate_button'])) {
  //On verifie les differents champs de la categorie
  if (empty($_POST['title'])) {
    $errors['title'] = 'Le titre de la catégorie est requis';
  }
  if (empty($_POST['description'])) {
    $errors['description'] = 'Le champs de la description est requis';
  }
  //ON passe à l'enregistrement en cas d'absence d'erreurs
  if(count($errors) === 0){
    $title = $_POST['title']; 
    $description = $_POST['description'];

    $req = getPdo()->prepare('INSERT INTO category(title,description) VALUES(?,?)');
    $req->execute([$title, $description]);
    $_SESSION['success_cat'] = 'Les infos sont soumis avec sucess';
    header('Location: /ecf/pages/account/admin.php');
    exit();
  }
}