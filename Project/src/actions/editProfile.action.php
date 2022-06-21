<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  require_once(dirname(__DIR__).'/utils/validator.php');
  $session = new Session();

  if (!$session->isLoggedIn()) {
    $session->addMessage('error', "Ação não disponível");
    die(header('Location: ../pages/denied.php'));
  } 

  $_SESSION['input']['nome oldUser'] = htmlentities($_POST['name']);
  $_SESSION['input']['morada oldUser'] = htmlentities($_POST['address']);
  $_SESSION['input']['telemovel oldUser'] = htmlentities($_POST['phoneNumber']);
  $_SESSION['input']['email oldUser'] = htmlentities($_POST['email']);
  $_SESSION['input']['password1 oldUser'] = htmlentities($_POST['password1']);
  $_SESSION['input']['password2 oldUser'] = htmlentities($_POST['password2']);

  if (!(valid_name($_POST['name']) && valid_address($_POST['address']) && valid_phone($_POST['phoneNumber']) && valid_email($_POST['email']) && valid_CSRF($_POST['csrf']))) {
      die(header('Location: ../edit/profile.edit.php'));
  }

  $db = getDatabaseConnection();
  $user = User::getUser($db, $_SESSION['id']);

  if ($user) {
    
    $user->name = $_POST['name'];
    $user->phoneNumber = intval($_POST['phoneNumber']);
    $user->address = $_POST['address'];
    $user->email = $_POST['email'];

    if ($_POST['password1'] != "" && password_verify($_POST['password1'], $user->password)) {

      if (!valid_password($_POST['password2'])) {
        die(header('Location: ../edit/profile.edit.php'));
      } else {
        $cost = ['cost' => 12];
        $user->password = password_hash($_POST['password2'], PASSWORD_DEFAULT, $cost);
      }

    } else if ($_POST['password1'] != "" && hash('sha256', $_POST['password1']) != $user->password) {
      $session->addMessage('warning', "Para mudar a palavra passe necessita primeiro de colocar correctamente a antiga");
      die(header('Location: ../edit/profile.edit.php'));
    } 

    $user->save($db);

    $_SESSION['name'] = $user->getName();
    $_SESSION['photo'] = $user->getPhoto();
  }

  unset($_SESSION['input']);

  $session->addMessage('success', "Alterações gravadas com sucesso");
  header('Location: ../pages/profile.php?id='. $user->id);
?>