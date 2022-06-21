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

    $text = filter_text($_POST['comment']);

    if (valid_stars($_POST['stars'])) {
        $db = getDatabaseConnection();
        $stmt = $db->prepare('INSERT INTO Review (idUser, idRestaurant, stars, comment, data) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($_SESSION['id'], $_POST['idRestaurant'], intval($_POST['stars']), $text, date('Y-m-d H:i')));
        $stmt->fetch();
    } else {
        $session->addMessage('error', 'Número de estrelas inválido');
    }
?>