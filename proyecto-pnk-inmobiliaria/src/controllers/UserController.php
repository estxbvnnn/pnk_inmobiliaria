<?php

require_once '../models/User.php';
require_once '../utils/bcrypt.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new User();
    }

    public function registerUser($data) {
        $data['password'] = bcrypt_hash($data['password']);
        return $this->userModel->createUser($data);
    }

    public function loginUser($email, $password) {
        $user = $this->userModel->getUserByEmail($email);
        if ($user && bcrypt_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user_id'] = $user['id'];
            return true;
        }
        return false;
    }

    public function getUser($id) {
        return $this->userModel->getUserById($id);
    }

    public function updateUser($id, $data) {
        if (isset($data['password'])) {
            $data['password'] = bcrypt_hash($data['password']);
        }
        return $this->userModel->updateUser($id, $data);
    }

    public function deleteUser($id) {
        return $this->userModel->deleteUser($id);
    }
}
?>