<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/templates/order.tpl.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();
  
  drawHeader();
  $db = getDatabaseConnection();
  $orders = Dish::getPendingOrders($db, intval($_GET['id']));
  drawOrders($orders);
  drawFooter();
?>