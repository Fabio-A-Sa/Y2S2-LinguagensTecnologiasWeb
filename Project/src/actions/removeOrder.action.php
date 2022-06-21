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
  $stmt = $db->prepare('SELECT Car.quantity FROM Car WHERE idUser = ? AND idDish = ?');
  $stmt->execute(array($_SESSION['id'], $_POST['id']));
  $quantity = intval($stmt->fetch()['quantity']);

  if ($quantity === 1) {
    $stmt = $db->prepare('DELETE FROM Car WHERE idUser = ? AND idDish = ?');
    $stmt->execute(array($_SESSION['id'], $_POST['id']));
  } else {
    $stmt = $db->prepare('UPDATE Car SET quantity = ? WHERE idUser = ? AND idDish = ?');
    $stmt->execute(array($quantity-1, $_SESSION['id'], $_POST['id']));
  }
?>