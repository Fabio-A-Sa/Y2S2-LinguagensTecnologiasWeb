<?php
  class Session {

    private array $messages;

    public function __construct() {
      //session_set_cookie_params(0, '/', 'localhost', true, true);
      session_start();
      if (!isset($_SESSION['csrf'])) {
        $_SESSION['csrf'] = $this->generate_random_token();
      }
      $this->messages = isset($_SESSION['messages']) ? $_SESSION['messages'] : array();
      unset($_SESSION['messages']);
    }

    public function isLoggedIn() : bool {
      return isset($_SESSION['id']);    
    }

    public function logout() {
      session_destroy();
    }

    public function addMessage(string $type, string $text) {
      $_SESSION['messages'][] = array('type' => $type, 'text' => $text);
    }

    public function getMessages() {
      return $this->messages;
    }

    public function generate_random_token() {
      return bin2hex(openssl_random_pseudo_bytes(32));
    }
  }
?>