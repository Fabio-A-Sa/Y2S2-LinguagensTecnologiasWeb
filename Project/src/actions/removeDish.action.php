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
  $stmt = $db->prepare('SELECT Restaurant.idOwner FROM Dish, Restaurant WHERE Dish.id = ? AND Dish.idRestaurant = Restaurant.id AND Restaurant.idOwner = ?');
  $stmt->execute(array($_GET['id'], $_SESSION['id']));
  $valid = $stmt->fetchAll();

  if (!$valid) {
    $session->addMessage('error', "Apenas o dono do restaurante pode eliminar pratos do menu");
    die(header('Location: ../pages/denied.php'));
  }

  $stmt = $db->prepare('DELETE FROM Dish WHERE id = ?');
  $stmt->execute(array($_GET['id']));

  $session->addMessage('success', 'Prato removido com sucesso');
  header('Location: ../pages/restaurant.php?id=' . $_GET['restaurant']);
?>