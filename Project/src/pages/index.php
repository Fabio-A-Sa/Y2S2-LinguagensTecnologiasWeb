<?php
  declare(strict_types = 1);
  require_once('../templates/common.tpl.php');
  require_once('../templates/restaurant.tpl.php');
  require_once('../templates/review.tpl.php');
  require_once('../database/connection.db.php');
  require_once('../classes/restaurant.class.php');
  require_once('../classes/review.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();

  $db = getDatabaseConnection();
  $restaurants = Restaurant::getRestaurants($db, 3);
  $reviews = Review::getPopularReviews($db, 3);

  drawHeader();
  if (count($session->getMessages())) drawMessages($session);
  drawBanner();
  drawRestaurantSearch();
  drawRestaurants($restaurants);
  drawPopularReviews($reviews);
  drawFooter(); 
?>