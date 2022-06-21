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

    $_SESSION['input']['name newRestaurant'] = htmlentities($_POST['name']);
    $_SESSION['input']['address newRestaurant'] = htmlentities($_POST['address']);
    $_SESSION['input']['phoneNumber newRestaurant'] = htmlentities($_POST['phoneNumber']);
    
    if (!(valid_name($_POST['name']) && valid_address($_POST['address']) && valid_phone($_POST['phoneNumber']) && valid_CSRF($_POST['csrf']))) {
        die(header('Location: ../register/restaurant.register.php'));
    }

    $db = getDatabaseConnection();
    $stmt = $db->prepare('INSERT INTO Restaurant (name, address, phoneNumber, idOwner) VALUES (?, ?, ?, ?)');
    $stmt->execute(array($_POST['name'], $_POST['address'], $_POST['phoneNumber'], $_SESSION['id']));

    unset($_SESSION['input']);

    $session->addMessage('success', "Restaurante registado com sucesso");
    header('Location: ../pages/index.php');
?>