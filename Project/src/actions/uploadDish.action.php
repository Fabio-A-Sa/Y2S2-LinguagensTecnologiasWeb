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

  if (!valid_CSRF($_POST['csrf'])) {
    die(header('Location: ../pages/denied.php'));
  }

  $db = getDatabaseConnection();
  $stmt = $db->prepare('SELECT Restaurant.idOwner FROM Dish, Restaurant WHERE Dish.id = ? AND Dish.idRestaurant = Restaurant.id AND Restaurant.idOwner = ?');
  $stmt->execute(array($_GET['id'], $_SESSION['id']));
  $valid = $stmt->fetchAll();

  if (!$valid) {
    $session->addMessage('error', "Apenas o dono do restaurante pode adicionar fotos aos pratos");
    die(header('Location: ../pages/denied.php'));
  }

  if ($_FILES['image']['tmp_name'][0] == "") {
    $session->addMessage('warning', 'Selecione primeiro a foto pretendida');
    die(header("Location: ../edit/dish.edit.php?id=". $_GET['id']));
  }

  $fileName = "../img/dishes/dish" .  $_GET['id'] . ".png";
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);

  $img = imagecreatefromjpeg($fileName);
  if (!$img) $img = imagecreatefrompng($fileName);
  if (!$img) $img = imagecreatefromgif($fileName);
  if (!$img) die(header("Location: ../dish.php?id=" . $_SESSION['id']));

  $width = imagesx($img);  
  $height = imagesy($img); 
  $square = min($width, $height); 

  $profile = imagecreatetruecolor(900, 900);
  imagecopyresized($profile, $img, 0, 0, ($width>$square)?intval(($width-$square)/2):0, ($height>$square)?intval(($height-$square)/2):0, 900, 900, $square, $square);
  imagepng($profile, $fileName);

  $session->addMessage('success', 'Upload da foto efetuado com sucesso');
  header("Location: ../pages/restaurant.php?id=" . $_GET['restaurant']);
?>