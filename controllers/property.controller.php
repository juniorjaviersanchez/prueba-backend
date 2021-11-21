<?php
require_once 'models/Property.php';
require_once 'helpers/help.php';

class PropertyController
{
    private $model;
    private $mensaje;

    public $listado;
    public $listadoBD;
    public $ciudadSelect;
    public $TipoSelect;
    
    public function __CONSTRUCT(){
        // Inicializamos las variables
        $this->model = new Property();
        $this->mensaje = array("nell", "nell");
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

        if($filtroCiudad == '' && $filtroTipo == ''){
            $this->mensaje=array("I", "Selecionar filtros");
        }

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
                $this->mensaje=array("G", "Propiedad guardado");
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
            $this->mensaje=array("E", "Propiedad Eliminado");
            $this->Index();
        }
    }

    public function GenerarReporte(){
        // Recuperamos los filtros
        $filtroCiudad = ($_REQUEST['ciudad'])?$_REQUEST['ciudad']:'';
        $filtroTipo = ($_REQUEST['tipo'])?$_REQUEST['tipo']:'';

        if($filtroCiudad != '' || $filtroTipo != ''){
            // Buscamos los registros
            $this->listado = $this->model->filtro($filtroCiudad,$filtroTipo);
    
            // Enviamos data a exportar
            require_once 'excel/excel_property.php';
        }else{
            $this->mensaje=array("I", "Selecionar filtros");
            $this->Index();
        }
        
    }
}