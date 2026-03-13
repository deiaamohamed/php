<?php

class Auth {
    private $user;

    public function __construct($userObject) {
        $this->user = $userObject;
    }

    public function login($username, $password) {
        $userData = $this->user->getUserByUsername($username);
        
        if ($userData && $userData['password_hash'] == $password) {
            $_SESSION['user_id'] = $userData['id'];
            $_SESSION['username'] = $userData['username'];
            return true;
        }
        
        return false;
    }

    public function isLoggedIn() {
        return isset($_SESSION['user_id']);
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function getCurrentUserId() {
        return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    }

    public function getCurrentUsername() {
        return isset($_SESSION['username']) ? $_SESSION['username'] : null;
    }
}

?>
