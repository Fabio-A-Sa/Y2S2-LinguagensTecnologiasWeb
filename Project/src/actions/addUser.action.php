<?php
    declare(strict_types = 1);
    require_once(dirname(__DIR__).'/database/connection.db.php');
    require_once(dirname(__DIR__).'/classes/session.class.php');
    require_once(dirname(__DIR__).'/utils/validator.php');
    $session = new Session();

    $_SESSION['input']['nome newUser'] = htmlentities($_POST['name']);
    $_SESSION['input']['morada newUser'] = htmlentities($_POST['address']);
    $_SESSION['input']['telemovel newUser'] = htmlentities($_POST['phoneNumber']);
    $_SESSION['input']['email newUser'] = htmlentities($_POST['email']);
    $_SESSION['input']['password1 newUser'] = htmlentities($_POST['password1']);
    $_SESSION['input']['password2 newUser'] = htmlentities($_POST['password2']);

    if (!(valid_name($_POST['name']) && valid_address($_POST['address']) && valid_email($_POST['email']) && valid_phone($_POST['phoneNumber']) && valid_CSRF($_POST['csrf']))) {
        die(header('Location: ../register/user.register.php'));
    }

    $db = getDatabaseConnection();
    if ($_POST['password1'] === $_POST['password2']) {

        if (!valid_password($_POST['password1'])) {
            die(header('Location: ../register/user.register.php'));
        }

        $cost = ['cost' => 12];
        $stmt = $db->prepare('INSERT INTO User (name, email, password, address, phoneNumber) VALUES (?, ?, ?, ?, ?)');
        $stmt->execute(array($_POST['name'], $_POST['email'], password_hash($_POST['password1'], PASSWORD_DEFAULT, $cost), $_POST['address'], $_POST['phoneNumber']));

    } else {
        $session->addMessage('warning', "As palavras-passe não coincidem");
        die(header('Location: ../register/user.register.php'));
    }

    unset($_SESSION['input']);

    $session->addMessage('success', "Utilizador registado com sucesso");
    header('Location: ../pages/login.php');
?>