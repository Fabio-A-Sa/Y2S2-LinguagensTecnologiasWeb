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

  $_SESSION['input']['name oldRestaurant'] = htmlentities($_POST['name']);
  $_SESSION['input']['address oldRestaurant'] = htmlentities($_POST['address']);
  $_SESSION['input']['phoneNumber oldRestaurant'] = htmlentities($_POST['phoneNumber']);

  $db = getDatabaseConnection();
  $restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
  if ($restaurant) {

    if (!(valid_name($_POST['name']) && valid_address($_POST['address']) && valid_phone($_POST['phoneNumber']) && valid_CSRF($_POST['csrf']))) {
      die(header('Location: ../edit/restaurant.edit.php?id='.$restaurant->id));
    }

    $restaurant->name = $_POST['name'];
    $restaurant->address = $_POST['address'];
    $restaurant->phoneNumber = intval($_POST['phoneNumber']);
    $restaurant->save($db);

    unset($_SESSION['input']);

    $session->addMessage('success', 'Alterações gravadas com sucesso');
    die(header('Location: ../pages/restaurant.php?id='.$restaurant->id));
  }

  $session->addMessage('error', 'Não tem permissões para editar o restaurante');
  header('Location: ../pages/restaurant.php?id='.$_GET['id']);
?>