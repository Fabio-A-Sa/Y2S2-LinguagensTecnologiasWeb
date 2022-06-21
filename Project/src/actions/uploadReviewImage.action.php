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

  $stmt = $db->prepare('SELECT id FROM Review WHERE idUser = ? AND idRestaurant = ?');
  $stmt->execute(array($_SESSION['id'], $_POST['idRestaurant']));
  $reviews = $stmt->fetchAll();
  $id = intval($reviews[count($reviews)-1]['id']);
  
  $fileName = "../img/reviews/review" .  $id . ".png";
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);

  $img = imagecreatefromjpeg($fileName);
  if (!$img) $img = imagecreatefrompng($fileName);
  if (!$img) $img = imagecreatefromgif($fileName);
  if (!$img) die();

  $width = imagesx($img);  
  $height = imagesy($img); 
  $square = min($width, $height); 

  $review = imagecreatetruecolor($square, $square);
  imagecopyresized($review, $img, 0, 0, ($width>$square)?intval(($width-$square)/2):0, ($height>$square)?intval(($height-$square)/2):0, $square, $square, $square, $square);
  imagepng($review, $fileName);

  $session->addMessage('success', 'Upload da foto efetuado com sucesso');
  header("Location: ../pages/restaurant.php?id=" . $_POST['idRestaurant']);
?>