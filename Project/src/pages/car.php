<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/templates/car.tpl.php');
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
    $session->addMessage('error', 'Para aceder a este conteúdo necessita de estar registado');
    die(header('Location: ../pages/login.php'));
  };

  drawHeader();

  $db = getDatabaseConnection();
  if (count($session->getMessages())) drawMessages($session);
  $user = User::getUser($db, $_SESSION['id']);
  $newOrders = $user->getCarOrders($db);
  drawNewOrders($newOrders);
  
  drawFooter(); 
?>