<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/classes/session.class.php');
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Ação não disponível");
    die(header('Location: ../pages/denied.php'));
  } 

  if (!valid_CSRF($_POST['csrf'])) {
    die(header('Location: ../pages/denied.php'));
  }

  $db = getDatabaseConnection();
  $stmt = $db->prepare('SELECT Restaurant.idOwner FROM Restaurant WHERE Restaurant.id = ? AND Restaurant.idOwner = ?');
  $stmt->execute(array($_GET['id'], $_SESSION['id']));
  $valid = $stmt->fetchAll();

  if (!$valid) {
    $session->addMessage('error', "Apenas o dono do restaurante pode adicionar fotos ao restaurante");
    die(header('Location: ../pages/denied.php'));
  }

  if ($_FILES['image']['tmp_name'][0] == "") {
    $session->addMessage('warning', 'Selecione primeiro a foto pretendida');
    die(header("Location: ../edit/restaurant.edit.php?id=". $_GET['id']));
  }

  $fileName = "../img/restaurants/restaurant" .  $_GET['id'] . ".png";
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);

  $img = imagecreatefrompng($fileName);
  if (!$img) $img = imagecreatefromjpeg($fileName);
  if (!$img) $img = imagecreatefromgif($fileName);
  if (!$img) die();

  $X = 5;
  $Y = 3;

  $widthold = imagesx($img);  
  $heightold = imagesy($img); 
  $restaurant = "";
  
  if ($widthold >= $heightold) {
    $width = intval(($heightold*$X)/$Y);
    $restaurant = imagecreatetruecolor($width, $heightold);
    imagecopyresized($restaurant, $img, 0, 0, intval(abs($width - $widthold) / 2), 0, $widthold, $heightold, $widthold, $heightold);
  } else {
    $height = intval(($widthold*$Y)/$X);
    $restaurant = imagecreatetruecolor($widthold, $height);
    imagecopyresized($restaurant, $img, 0, 0, 0, intval(abs($heightold - $height) / 2), $widthold, $heightold, $widthold, $heightold);
  }

  imagepng($restaurant, $fileName);

  $session->addMessage('success', 'Upload da foto efetuado com sucesso');
  header("Location: ../pages/restaurant.php?id=" . $_GET['id']);
?>