<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/dish.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();

  $db = getDatabaseConnection();
  $dishes = Dish::search($db, intval($_GET['id']), $_GET['type'], $_GET['category']);

  echo json_encode($dishes);
?>