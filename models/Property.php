<?php

// Creamos la clase Property - Propiedad
class Property
{
    // Declaramos los atributos de la clase
    public $id;
    public $direccion;
    public $city;
    public $telephone;
    public $code_postal;
    public $type;
    public $price;

    private $pdo;

    // Declaramos en constructor
    public function __CONSTRUCT()
	{
		try
		{
			$this->pdo = Database::StartUp();     
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	//Método para listar los bienes desde el json
	public function listaLocal()
	{
		$data = file_get_contents("data-1.json");
        return json_decode($data, true);
	}

    //Método para obtener registro por su id
	public function obtenerRegistro($id)
	{
		// Obtenemos la lista de bienes
		$data = $this->listaLocal();
		$i=0;
		$oProperty = new Property;
		foreach($data as $item) {
			if ($item['Id'] == $id ) {
				$oProperty = $item;
				return $oProperty;
			}
			$i++;
		}

        return $oProperty;
	}

	// Método para obtener datos no repetidos
	public function registrosNoRepetidos($key){
		// Obtenemos la lista de bienes
		$data = $this->listaLocal();
		// Variables temporales
		$temp_array = array();
		$i = 0;
		$key_array = array();
	
		// Recorremos los registros para obtenes los registro no repetidos
		foreach($data as $val) {
			if (!in_array($val[$key], $key_array)) {
				$key_array[$i] = $val[$key];
				$temp_array[$i] = $val;
			}
			$i++;
		}
		return $temp_array;
	}

	// Filtrar por ciudad o tipo
	public function filtro($filtroCiudad, $filtroTipo){
		$data = $this->listaLocal();
		$temp_array = array();
		
		$i = 0;
		foreach($data as $item) {
			if($filtroCiudad != '' && $filtroTipo != ''){
				if ($item['Ciudad'] == $filtroCiudad && $item['Tipo'] == $filtroTipo) {
					$temp_array[$i] = $item;
				}
			}else{
				if($filtroCiudad == '' && $filtroTipo == ''){
					return $data;
				}else{
					if ($item['Ciudad'] == $filtroCiudad || $item['Tipo'] == $filtroTipo) {
						$temp_array[$i] = $item;
					}
				}
			}
			$i++;
		}
		return $temp_array;
	}

	// Guardar en la BD
	public function Registrar(Property $data)
	{
		try 
		{
		$sql = "INSERT INTO properties (direccion,city,telephone,code_postal,type,price) 
		        VALUES (?, ?, ?, ?, ?, ?)";

		$this->pdo->prepare($sql)
		     ->execute(
				array(
                    $data->direccion,
                    $data->city, 
                    $data->telephone,
                    $data->code_postal,
                    $data->type,
                    $data->price
                )
			);
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}

	// Listar de la BD
	public function Listar()
	{
		try
		{
			$result = array();

			$stm = $this->pdo->prepare("SELECT * FROM properties order by id desc");
			$stm->execute();

			return $stm->fetchAll(PDO::FETCH_OBJ);
		}
		catch(Exception $e)
		{
			die($e->getMessage());
		}
	}

	// Eliminar desde la BD
	public function Eliminar($id)
	{
		try 
		{
			$stm = $this->pdo
			            ->prepare("DELETE FROM properties WHERE id = ?");			          

			$stm->execute(array($id));
		} catch (Exception $e) 
		{
			die($e->getMessage());
		}
	}


}
