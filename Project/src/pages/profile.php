<?php
  declare(strict_types = 1);
  require_once(dirname(__DIR__).'/templates/common.tpl.php');
  require_once(dirname(__DIR__).'/templates/user.tpl.php');
  require_once(dirname(__DIR__).'/classes/user.class.php');
  require_once(dirname(__DIR__).'/database/connection.db.php');
  require_once(dirname(__DIR__).'/classes/session.class.php');
  $session = new Session();
  
  if (!$session->isLoggedIn() || $_SESSION['id'] != $_GET['id']) {
    $session->addMessage('error', "Acesso negado. Não tem permissões para ver este perfil");
    die(header('Location: ../pages/denied.php'));
  }

  drawHeader();
  if (count($session->getMessages())) drawMessages($session);
  drawUser(intval($_GET['id']));
  drawFooter();
?>