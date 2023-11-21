<?php
include_once("../../path.php");
include_once("../../php/functions.php");

startSession();
// On envoie l'identifiant par l'url donc on utilise la méthode GET
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  $id = intval($_GET["id"]);

  $pdo = getPdo();
  $stmt = $pdo->prepare("DELETE FROM service WHERE id_service = ?");
  $stmt->execute(array($id));

  $_SESSION['success'] = 'Le service est supprimé avec sucèss';
  
  header('Location: '.BASE_URL.'/pages/services/index.php');
  exit();
}
