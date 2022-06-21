<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Ação não disponível");
    die(header('Location: ../pages/denied.php'));
  }

  $_SESSION['input']['name oldDish'] = htmlentities($_POST['name']);
  $_SESSION['input']['type oldDish'] = htmlentities($_POST['type']);
  $_SESSION['input']['category oldDish'] = htmlentities($_POST['category']);
  $_SESSION['input']['price oldDish'] = htmlentities($_POST['price']);

  if (!(valid_name($_POST['name']) && valid_type($_POST['type']) && valid_category($_POST['category']) && valid_price($_POST['price']) && valid_CSRF($_POST['csrf']))) {
    die(header('Location: ../edit/dish.edit.php?id='. $_POST['id']));
  }

  $db = getDatabaseConnection();
  $dish = Dish::getDish($db, intval($_POST['id']));

  if ($dish) {
    $dish->name = $_POST['name'];
    $dish->type = $_POST['type'];
    $dish->category = $_POST['category'];
    $dish->price = floatval($_POST['price']);
    $dish->save($db);
  }

  unset($_SESSION['input']);

  $session->addMessage('success', "Informações do prato '". $dish->name . "' atualizadas com sucesso");
  header('Location: ../pages/restaurant.php?id='.$dish->idRestaurant);
?>