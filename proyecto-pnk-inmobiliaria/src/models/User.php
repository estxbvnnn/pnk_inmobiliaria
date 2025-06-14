<?php
class User {
    private $db;
    private $table = 'users';

    public $id;
    public $rut;
    public $full_name;
    public $date_of_birth;
    public $email;
    public $password;
    public $sex;
    public $mobile_phone;

    public function __construct($database) {
        $this->db = $database;
    }

    public function create() {
        $query = "INSERT INTO " . $this->table . " (rut, full_name, date_of_birth, email, password, sex, mobile_phone) VALUES (:rut, :full_name, :date_of_birth, :email, :password, :sex, :mobile_phone)";
        
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':rut', $this->rut);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':date_of_birth', $this->date_of_birth);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':password', password_hash($this->password, PASSWORD_BCRYPT));
        $stmt->bindParam(':sex', $this->sex);
        $stmt->bindParam(':mobile_phone', $this->mobile_phone);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function read() {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update() {
        $query = "UPDATE " . $this->table . " SET rut = :rut, full_name = :full_name, date_of_birth = :date_of_birth, email = :email, sex = :sex, mobile_phone = :mobile_phone WHERE id = :id";
        
        $stmt = $this->db->prepare($query);

        $stmt->bindParam(':rut', $this->rut);
        $stmt->bindParam(':full_name', $this->full_name);
        $stmt->bindParam(':date_of_birth', $this->date_of_birth);
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':sex', $this->sex);
        $stmt->bindParam(':mobile_phone', $this->mobile_phone);
        $stmt->bindParam(':id', $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $this->id);
        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
?>