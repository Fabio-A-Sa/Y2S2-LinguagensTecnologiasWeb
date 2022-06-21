<?php 
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Ação não disponível");
    die(header('Location: ../pages/denied.php'));
  }

  $db = getDatabaseConnection();
  $text = filter_text($_POST['text']);

  $stmt = $db->prepare('SELECT Restaurant.idOwner FROM Restaurant, Review WHERE Review.id = ? AND Review.idRestaurant = Restaurant.id');
  $stmt->execute(array($_POST['id']));
  $owner = $stmt->fetch();

  if (strlen($text) && $owner && $owner['idOwner'] == $_SESSION['id']) {
    $stmt = $db->prepare('UPDATE Review SET answer = ? WHERE id = ?');
    $stmt->execute(array($text, $_POST['id']));
    $stmt->fetch();
  } else {
    $session->addMessage('error', "Apenas o dono do restaurante pode responder às reviews");
    die(header('Location: ../pages/denied.php'));
  }
?>