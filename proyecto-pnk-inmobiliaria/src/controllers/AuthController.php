<?php
// filepath: pnk-inmobiliaria-app/src/controllers/AuthController.php

require_once '../config/database.php';
require_once '../models/User.php';
require_once '../utils/bcrypt.php';
require_once '../sessions/session.php';

class AuthController {
    private $db;
    private $userModel;

    public function __construct() {
        $this->db = Database::getConnection();
        $this->userModel = new User($this->db);
    }

    public function register($data) {
        $data['password'] = bcrypt_hash($data['password']);
        return $this->userModel->create($data);
    }

    public function login($email, $password) {
        $user = $this->userModel->findByEmail($email);
        if ($user && bcrypt_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function logout() {
        session_start();
        session_destroy();
    }

    public function isLoggedIn() {
        session_start();
        return isset($_SESSION['user_id']);
    }
}
?>