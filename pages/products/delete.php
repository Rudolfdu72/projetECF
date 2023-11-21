<?php
include_once("../path.php");
include_once(ROOT_PATH."/php/functions.php");
startSession();
// On envoie l'identifiant par l'url donc on utilise la méthode GET
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  $id = intval($_GET["id"]);

  $pdo = getPdo();
  $stmt = $pdo->prepare("DELETE FROM car WHERE id_voiture = ?");
  $stmt->execute(array($id));

  $_SESSION['success'] = 'La voiture est supprimée avec sucèss';
  
  header('Location: '.BASE_URL.'/pages/products/index.php');
  exit();
}
?>