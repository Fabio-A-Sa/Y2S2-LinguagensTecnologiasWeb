<?php
    declare(strict_types = 1);
    require_once(dirname(__DIR__).'/database/connection.db.php');
    require_once(dirname(__DIR__).'/classes/restaurant.class.php');
    require_once(dirname(__DIR__).'/templates/common.tpl.php');
    require_once(dirname(__DIR__).'/templates/restaurant.tpl.php');
    require_once(dirname(__DIR__).'/classes/session.class.php');
    $session = new Session();

    $db = getDatabaseConnection();
    $restaurant = Restaurant::getRestaurant($db, intval($_GET['id']));
    if ($session->isLoggedIn() && $_SESSION['id'] == $restaurant->idOwner) {

        $_SESSION['input']['name oldRestaurant'] = $_SESSION['input']['name oldRestaurant'] ?? $restaurant->name;
        $_SESSION['input']['address oldRestaurant'] = $_SESSION['input']['address oldRestaurant'] ?? $restaurant->address;
        $_SESSION['input']['phoneNumber oldRestaurant'] = $_SESSION['input']['phoneNumber oldRestaurant'] ?? $restaurant->phoneNumber;

        drawHeader();
        if (count($session->getMessages())) drawMessages($session);
        drawEditRestaurantForm(intval($restaurant->id));
        drawFooter(); 

    } else if (!$session->isLoggedIn()) {
        $session->addMessage('error', "Não tem permissões para editar as informações deste restaurante");
        die(header('Location: ../pages/denied.php'));
    }  
?>