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

  $stmt = $db->prepare('SELECT * FROM Car WHERE idUser = ?');
  $stmt->execute(array($_SESSION['id']));
  $toInsert = array();
  while ($order = $stmt->fetch()) {
      $toInsert[] = array (
          $order['idUser'],
          $order['idDish'],
          $order['quantity'],
          date('Y-m-d H:i'), 
          "em preparação"
      );
  };

  $stmt = $db->prepare('INSERT INTO UserOrder (idUser, idDish, quantity, data, state) VALUES (?, ?, ?, ?, ?)');
  foreach ($toInsert as $order) {
    $stmt->execute($order);
  }

  $stmt = $db->prepare('DELETE FROM Car WHERE idUser = ?');
  $stmt->execute(array($_SESSION['id']));

  $session->addMessage('success', 'Compra efetuada. Pode ver o estado de cada compra na página do seu perfil');
  header('Location: ../pages/car.php');
?>