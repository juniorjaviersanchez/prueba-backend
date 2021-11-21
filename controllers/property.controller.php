<?php
require_once 'models/Property.php';

class PropertyController
{
    private $model;

    public $listado;
    public $ciudadSelect;
    public $TipoSelect;
    
    public function __CONSTRUCT(){
        $this->model = new Property();
        $this->ciudadSelect = "";
        $this->TipoSelect = "";
    }
    
    public function Index(){
        $this->listado = $this->model->listaLocal();

        require_once 'views/header.php';
        require_once 'views/property/index.php';
        require_once 'views/footer.php';
    }

    public function FiltrarRegistros(){
        // Recuperamos los filtros
        $filtroCiudad = ($_REQUEST['ciudad'])?$_REQUEST['ciudad']:'';
        $filtroTipo = ($_REQUEST['tipo'])?$_REQUEST['tipo']:'';

        // Guardamos los datos del select
        $this->ciudadSelect = $filtroCiudad;
        $this->TipoSelect = $filtroTipo;

        // Buscamos los registros
        $this->listado = $this->model->filtro($filtroCiudad,$filtroTipo);

        // Las vistas
        require_once 'views/header.php';
        require_once 'views/property/index.php';
        require_once 'views/footer.php';
    }
}