<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Ação não disponível");
    die(header('Location: ../pages/denied.php'));
  } 

  $db = getDatabaseConnection();
  $stmt = $db->prepare('DELETE FROM FavoriteRestaurant WHERE idUser = ? AND idRestaurant = ?');
  $stmt->execute(array($_SESSION['id'], $_POST['id']));
?>