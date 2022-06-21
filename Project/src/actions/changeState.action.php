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
  $stmt = $db->prepare('SELECT Restaurant.idOwner FROM Dish, Restaurant WHERE Dish.id = ? AND Restaurant.id = Dish.idRestaurant');
  $stmt->execute(array($_POST['idDish']));
  $attemp = $stmt->fetch();

  if ($attemp['idOwner'] != $_SESSION['id']) {
    $session->addMessage('error', "Apenas o dono do restaurante pode mudar o estado do pedido");
    die(header('Location: ../pages/denied.php'));
  }

  $state = htmlentities($_POST['state']);

  $stmt = $db->prepare('SELECT idDish FROM UserOrder WHERE idDish = ? AND idUser = ?');
  $stmt->execute(array($_POST['idDish'], $_POST['idUser']));
  $attemp = $stmt->fetch();
  if ($attemp) { 
    $stmt = $db->prepare('UPDATE UserOrder SET state = ? WHERE idDish = ? AND idUser = ?');
    $stmt->execute(array($state, $_POST['idDish'], $_POST['idUser']));
  }
?>