<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/templates/restaurant.tpl.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();
  
  drawHeader();
  if (count($session->getMessages())) drawMessages($session);
  drawRestaurant(intval($_GET['id']));
  drawFooter(); 
?>