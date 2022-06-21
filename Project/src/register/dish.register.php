<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/templates/dish.tpl.php');
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();
  
  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Ação não disponível");
    die(header('Location: ../pages/denied.php'));
  } 

  $_SESSION['input']['name newDish'] = $_SESSION['input']['name newDish'] ?? "";
  $_SESSION['input']['type newDish'] = $_SESSION['input']['type newDish'] ?? "";
  $_SESSION['input']['category newDish'] = $_SESSION['input']['category newDish'] ?? "";
  $_SESSION['input']['price newDish'] = $_SESSION['input']['price newDish'] ?? "";
  
  drawHeader();
  if (count($session->getMessages())) drawMessages($session);
  newDishForm();
  drawFooter(); 
?>