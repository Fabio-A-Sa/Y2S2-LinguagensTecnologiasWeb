<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();

  $_SESSION['input']['email login'] = htmlentities($_POST['email']);
  $_SESSION['input']['password login'] = htmlentities($_POST['password']);

  if (!(valid_email($_POST['email']))) {
    die(header('Location: ../pages/login.php'));
  }

  $db = getDatabaseConnection();
  $user = User::getUserWithPassword($db, $_POST['email'], $_POST['password']);
  
  if ($user) {

    $_SESSION['id'] = $user->id;
    $_SESSION['name'] = $user->getName();
    $_SESSION['photo'] = $user->getPhoto();

    unset($_SESSION['input']['email login']);
    unset($_SESSION['input']['password login']);
    $session->addMessage('success', "Login efetuado com sucesso. Bem-vindo de volta, " . $user->getName() . "!");
    header('Location: ../pages/index.php');

  } else {
    $session->addMessage('error', 'Login inválido. Por favor tente novamente.');
    die(header('Location: ../pages/login.php'));
  }
?>