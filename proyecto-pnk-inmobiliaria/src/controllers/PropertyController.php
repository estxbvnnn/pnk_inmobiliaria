<?php

class PropertyController {
    private $propertyModel;

    public function __construct($propertyModel) {
        $this->propertyModel = $propertyModel;
    }

    public function addProperty($data) {
        $validatedData = $this->validatePropertyData($data);
        if ($validatedData) {
            return $this->propertyModel->create($validatedData);
        }
        return false;
    }

    public function updateProperty($id, $data) {
        $validatedData = $this->validatePropertyData($data);
        if ($validatedData) {
            return $this->propertyModel->update($id, $validatedData);
        }
        return false;
    }

    public function getProperty($id) {
        return $this->propertyModel->find($id);
    }

    public function getAllProperties() {
        return $this->propertyModel->findAll();
    }

    private function validatePropertyData($data) {

        return $data;
    }
}
?>