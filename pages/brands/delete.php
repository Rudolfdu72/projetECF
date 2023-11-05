<?php
include_once("../../php/functions.php");
startSession();
// On envoie l'identifiant par l'url donc on utilise la méthode GET
if (isset($_GET["id"]) && !empty(trim($_GET["id"]))) {
  $id = intval($_GET["id"]);

  $pdo = getPdo();
  $stmt = $pdo->prepare("DELETE FROM marque WHERE id_marque = ?");
  $stmt->execute(array($id));

  $_SESSION['success'] = 'Marque supprimée avec sucèss';
  
  header('Location: /ecf/pages/brands/index.php');
  exit();
}