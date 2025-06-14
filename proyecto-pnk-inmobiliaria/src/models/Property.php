<?php
// filepath: pnk-inmobiliaria-app/src/models/Property.php

class Property {
    private $id;
    private $ownerId;
    private $address;
    private $price;
    private $description;
    private $type;
    private $createdAt;
    private $updatedAt;

    public function __construct($ownerId, $address, $price, $description, $type) {
        $this->ownerId = $ownerId;
        $this->address = $address;
        $this->price = $price;
        $this->description = $description;
        $this->type = $type;
        $this->createdAt = date('Y-m-d H:i:s');
        $this->updatedAt = date('Y-m-d H:i:s');
    }

    public function getId() {
        return $this->id;
    }

    public function getOwnerId() {
        return $this->ownerId;
    }

    public function getAddress() {
        return $this->address;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getType() {
        return $this->type;
    }

    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function getUpdatedAt() {
        return $this->updatedAt;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setAddress($address) {
        $this->address = $address;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function updateTimestamp() {
        $this->updatedAt = date('Y-m-d H:i:s');
    }
}
?>