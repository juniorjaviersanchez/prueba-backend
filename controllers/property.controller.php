<?php
require_once 'models/Property.php';
require_once 'helpers/help.php';

class PropertyController
{
    private $model;

    public $listado;
    public $listadoBD;
    public $ciudadSelect;
    public $TipoSelect;
    
    public function __CONSTRUCT(){
        // Inicializamos las variables
        $this->model = new Property();
        $this->ciudadSelect = "";
        $this->TipoSelect = "";
    }
    
    /**
     * Método para listar los datos
     */
    public function Index(){
        $this->listado = $this->model->listaLocal();
        $this->ListarDesdeBD();

        require_once 'views/header.php';
        require_once 'views/property/index.php';
        require_once 'views/footer.php';
    }

    /**
     * Método para filtrar registros
     */
    public function FiltrarRegistros(){
        // Recuperamos los filtros
        $filtroCiudad = ($_REQUEST['ciudad'])?$_REQUEST['ciudad']:'';
        $filtroTipo = ($_REQUEST['tipo'])?$_REQUEST['tipo']:'';

        // Guardamos los datos del select
        $this->ciudadSelect = $filtroCiudad;
        $this->TipoSelect = $filtroTipo;

        // Buscamos los registros
        $this->listado = $this->model->filtro($filtroCiudad,$filtroTipo);
        $this->ListarDesdeBD();

        // Las vistas
        require_once 'views/header.php';
        require_once 'views/property/index.php';
        require_once 'views/footer.php';
    }

    /**
     * Método para guardar gestros
     */
    public function Store(){
        $idProperty = ($_REQUEST['id'])?$_REQUEST['id']:'';

        if($idProperty != ''){
            $data = $this->model->obtenerRegistro($idProperty);
            // var_dump($data);
            if($data){
                $oProperty = new Property();
                $oProperty->direccion = $data['Direccion'];
                $oProperty->city = $data['Ciudad'];
                $oProperty->telephone = $data['Telefono'];
                $oProperty->code_postal = $data['Codigo_Postal'];
                $oProperty->type = $data['Tipo'];
                $oProperty->price = covertirStringDecimal($data['Precio'] );
        
                $this->model->Registrar($oProperty);
            }
        }

        $this->Index();
    }

    /**
     * Método para listar elementos desde la BD
     */
    public function ListarDesdeBD(){
        $this->listadoBD = $this->model->Listar();
    }

    /**
     * Método para eliminar registro desde BD
     */
    public function Eliminar(){
        $idProperty = ($_REQUEST['id'])?$_REQUEST['id']:'';

        if($idProperty != ''){
            $this->model->Eliminar($idProperty);
            $this->Index();
        }
    }

    /**
     * Método para generar Excel
     */
    public function GenerarReporte(){
        // Recuperamos los filtros
        $filtroCiudad = ($_REQUEST['ciudad'])?$_REQUEST['ciudad']:'';
        $filtroTipo = ($_REQUEST['tipo'])?$_REQUEST['tipo']:'';

        if($filtroCiudad != '' || $filtroTipo != ''){
            // Buscamos los registros
            $data = $this->model->filtro($filtroCiudad,$filtroTipo);
    
            // De Array a Json
            $data = json_encode($data);
            $data =  str_replace('#'," ",$data);
    
            // Enviamos data a exportar
            header('Location: ' . "excel/excel_property.php?data=$data", true);
        }
        $this->Index();
        
    }
}