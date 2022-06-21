<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/templates/restaurant.tpl.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();
  
  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Necessita primeiro de estar registado para poder adicionar o seu restaurante");
    die(header('Location: ../pages/login.php'));
  } 

  $_SESSION['input']['name newRestaurant'] = $_SESSION['input']['name newRestaurant'] ?? "";
  $_SESSION['input']['address newRestaurant'] = $_SESSION['input']['address newRestaurant'] ?? "";
  $_SESSION['input']['phoneNumber newRestaurant'] = $_SESSION['input']['phoneNumber newRestaurant'] ?? "";

  drawHeader();
  if (count($session->getMessages())) drawMessages($session);
  drawRegisterRestaurant();
  drawFooter(); 
?>