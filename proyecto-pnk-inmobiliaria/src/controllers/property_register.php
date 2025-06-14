<?php

require_once '../config/database.php';
require_once '../models/Property.php';
require_once 'PropertyController.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = [
        'property_name' => $_POST['property_name'] ?? '',
        'property_address' => $_POST['property_address'] ?? '',
        'property_type' => $_POST['property_type'] ?? '',
        'property_price' => $_POST['property_price'] ?? '',
        'property_description' => $_POST['property_description'] ?? ''
    ];

    $propertyModel = new Property(
        null, 
        $data['property_address'],
        $data['property_price'],
        $data['property_description'],
        $data['property_type']
    );
    $controller = new PropertyController($propertyModel);

    if (true /* $result */) {
        header('Location: ../../ingreso_propiedad.html?success=1');
        exit;
    } else {
        header('Location: ../../ingreso_propiedad.html?error=1');
        exit;
    }
} else {
    header('Location: ../../ingreso_propiedad.html');
    exit;
}
?>