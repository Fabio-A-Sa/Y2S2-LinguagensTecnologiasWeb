<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/templates/dish.tpl.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();
  
  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Não tem permissão para editar as informações de um prato neste restaurante");
    die(header('Location: ../pages/denied.php'));
  } 

  $db = getDatabaseConnection();
  $dish = Dish::getDish($db, intval($_GET['id']));

  if ($dish) {
    
    $_SESSION['input']['name oldDish'] = $_SESSION['input']['name oldDish'] ?? $dish->name;
    $_SESSION['input']['type oldDish'] = $_SESSION['input']['type oldDish'] ?? $dish->type;
    $_SESSION['input']['category oldDish'] = $_SESSION['input']['category oldDish'] ?? $dish->category;
    $_SESSION['input']['price oldDish'] = $_SESSION['input']['price oldDish'] ?? $dish->price;

    drawHeader();
    if (count($session->getMessages())) drawMessages($session);
    drawEditDishForm($dish);
    drawFooter(); 

  } else {
    $session->addMessage('error', "Este prato já não está mais disponível. Pedimos desculpa pelo ocorrido");
    die(header('Location: ../pages/denied.php'));
  }
?> 