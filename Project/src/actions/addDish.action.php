<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/restaurant.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
      $session->addMessage('error', "Ação não disponível");
      die(header('Location: ../pages/denied.php'));
  }

  $db = getDatabaseConnection();
  $restaurant = Restaurant::getRestaurantsByOwner($db, intval($_SESSION['id']));
  if (!$restaurant) {
    $session->addMessage('error', "Apenas o dono do restaurante pode adicionar pratos");
    die(header('Location: ../pages/denied.php'));
  }

  $_SESSION['input']['name newDish'] = htmlentities($_POST['name']);
  $_SESSION['input']['type newDish'] = htmlentities($_POST['type']);
  $_SESSION['input']['category newDish'] = htmlentities($_POST['category']);
  $_SESSION['input']['price newDish'] = htmlentities($_POST['price']);

  if (!(valid_name($_POST['name']) && valid_type($_POST['type']) && valid_category($_POST['category']) && valid_price($_POST['price']) && valid_CSRF($_POST['csrf']))) {
    die(header('Location: ../register/dish.register.php?id='. $restaurant[0]->id));
  }

  $stmt = $db->prepare('INSERT INTO Dish (name, type, category, price, idRestaurant) VALUES (?, ?, ?, ?, ?)');
  $stmt->execute(array($_POST['name'], $_POST['type'], $_POST['category'], $_POST['price'], $restaurant[0]->id));

  unset($_SESSION['input']);

  $session->addMessage('success', "Prato '". htmlentities($_POST['name']) ."' adicionado com sucesso");
  header('Location: ../pages/restaurant.php?id='. $restaurant[0]->id);
?>