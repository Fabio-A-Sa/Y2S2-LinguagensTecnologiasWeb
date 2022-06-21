<?php
  declare(strict_types = 1);
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

  if ($_FILES['image']['tmp_name'][0] == "") {
    $session->addMessage('warning', 'Selecione primeiro a foto pretendida');
    die(header("Location: ../edit/profile.edit.php"));
  }

  $fileName = "../img/profiles/profile" .  $_SESSION['id'] . ".png";
  move_uploaded_file($_FILES['image']['tmp_name'], $fileName);

  $img = imagecreatefromjpeg($fileName);
  if (!$img) $img = imagecreatefrompng($fileName);
  if (!$img) $img = imagecreatefromgif($fileName);
  if (!$img) die(header("Location: ../profile.php?id=" . $_SESSION['id']));

  $width = imagesx($img);  
  $height = imagesy($img); 
  $square = min($width, $height); 

  $profile = imagecreatetruecolor(900, 900);
  imagecopyresized($profile, $img, 0, 0, ($width>$square)?intval(($width-$square)/2):0, ($height>$square)?intval(($height-$square)/2):0, $square, $square, $square, $square);
  imagepng($profile, $fileName);
  unset($_FILES['image']);

  $session->addMessage('success', 'Foto de perfil guardada com sucesso');
  header("Location: ../pages/profile.php?id=" . $_SESSION['id']);
?>
