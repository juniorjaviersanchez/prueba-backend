<?php
require_once 'models/Property.php';

class PropertyController
{
    private $model;
    
    public function __CONSTRUCT(){
        $this->model = new Property();
    }
    
    public function Index(){
        require_once 'views/header.php';
        require_once 'views/property/index.php';
        require_once 'views/footer.php';
    }
}