<?php
    declare(strict_types = 1);
    require_once(dirname(__DIR__).'/classes/session.class.php');

    function valid_name(String $attemp) : bool {
        if (!preg_match ("/^[a-zA-Z\s]+$/", $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de nome inválido");
            return false;
        }
        return true;
    }

    function valid_email(String $attemp) : bool {
        if (filter_var($attemp, FILTER_VALIDATE_EMAIL) == NULL) {
            $session = new Session();
            $session->addMessage('warning', "Formato de email inválido");
            return false;
        }
        return true;
    }

    function valid_address(String $attemp) : bool {
        if (!preg_match ('/[A-Za-z0-9\-\\,.]+/', $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de morada inválido");
            return false;
        }
        return true;
    }

    function valid_phone(String $attemp) : bool {
        if (!preg_match ('/^[0-9]{9}+$/', $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Número de telemóvel inválido");
            return false;
        }
        return true;
    }

    function valid_type(String $attemp) : bool {
        if (!preg_match ("/^[a-zA-Z\s]+$/", $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de tipo inválido");
            return false;
        }
        return true;
    }

    function valid_category(String $attemp) : bool {
        if (!preg_match ("/^[a-zA-Z\s]+$/", $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de categoria inválido");
            return false;
        }
        return true;
    }

    function valid_price(String $attemp) : bool {
        if (!preg_match ('/^\d+(\.\d{2})?$/', $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de preço inválido");
            return false;
        }
        return true;
    }

    function valid_text(String $attemp) : bool {
        if (!preg_match ("/^[a-zA-Z\s]+$/", $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de texto inválido");
            return false;
        }
        return true;
    }

    function valid_state(String $attemp) : bool {
        if (!preg_match ("/^[a-zA-Z\s]+$/", $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Formato de texto inválido");
            return false;
        }
        return true;
    }

    function valid_stars(String $attemp) : bool {
        if (!preg_match ('/[1-5]/', $attemp)) {
            $session = new Session();
            $session->addMessage('warning', "Número de estrelas inválido");
            return false;
        }
        return true;
    }

    function valid_password(String $attemp) : bool {

        $uppercase = preg_match('@[A-Z]@', $attemp);
        $lowercase = preg_match('@[a-z]@', $attemp);
        $number = preg_match('@[0-9]@', $attemp);

        if (!$uppercase || !$lowercase || !$number || strlen(($_POST['password2'])) < 8) {
            $session = new Session();
            $session->addMessage('warning', "A nova palavra passe deve conter pelo menos 8 caracteres, ter uma letra maiúscula, uma letra minúscula e um número");
            return false; 
        }
        return true;
    }

    function valid_CSRF(String $attemp) : bool {
        if ($_SESSION['csrf'] !== $attemp) {
            $session = new Session();
            $session->addMessage('error', "Operação inválida");
            return false;
        }
        return true;
    }

    function filter_text(String $text) : String {
        return preg_replace ("/[^a-zA-Z0-9\s]/", '', $text);
    }
?>