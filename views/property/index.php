<div class="contenedor">
    <div class="card rowTitulo">
        <h1>Bienes Intelcost</h1>
    </div>
    <div class="colFiltros">
        <div class= "m-10">
            <form method="post" id="formulario" action="?c=Property&a=FiltrarRegistros">
                <div class="filtrosContenido">
                    <div class="tituloFiltros">
                        <h5>Filtros</h5>
                    </div>
                    <div class="filtroCiudad input-field">
                        <p><label for="selectCiudad">Ciudad:</label><br></p>
                        <select name="ciudad" id="selectCiudad">
                            <option value="" selected>Elige una ciudad</option>
                            <?php foreach($this->model->registrosNoRepetidos('Ciudad') as $item): ?>
                                <option value="<?php echo $item['Ciudad']; ?>" <?php echo $item['Ciudad'] == $this->ciudadSelect? 'selected': ''; ?>><?php echo $item['Ciudad']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filtroTipo input-field">
                        <p><label for="selecTipo">Tipo:</label></p>
                        <br>
                        <select name="tipo" id="selectTipo">
                            <option value="">Elige un tipo</option>
                            <?php foreach($this->model->registrosNoRepetidos('Tipo') as $item): ?>
                                <option value="<?php echo $item['Tipo']; ?>" <?php echo $item['Tipo'] == $this->TipoSelect? 'selected': ''; ?>><?php echo $item['Tipo']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="filtroPrecio">
                        <label for="rangoPrecio">Precio:</label>
                        <input type="text" id="rangoPrecio" name="precio" value="" />
                    </div>
                    <div class="botonField">
                        <input type="submit" class="btn white" value="Buscar" id="submitButton">
                    </div>
                </div>
            </form>

        </div>
    </div>
    <div id="tabs" style="width: 75%;">
        <ul>
            <li><a href="#tabs-1">Bienes disponibles</a></li>
            <li><a href="#tabs-2">Mis bienes</a></li>
            <li><a href="#tabs-3">Reportes</a></li>
        </ul>
        <div id="tabs-1">
            <div class="colContenido" id="divResultadosBusqueda">
                <div class="tituloContenido card" style="justify-content: center;">
                    <h5>Resultados de la búsqueda: <?php echo count($this->listado)?> registros</h5>
                    <div class="">

                        <div class="text-center">
                            <a href="?c=Property&a=Index">
                                <button class="mt-0 btn btn-primary">MOSTRAR TODOS</button>
                            </a>
                        </div>
                        
                        <?php $cont = 0 ?>
                        <?php foreach($this->listado as $item): ?>
                            <div class="item">
                                <div class="item-img">
                                    <img src="public/img/home.jpg" alt="Img propiedad">
                                </div>
                                <div class="item-description">
                                    <p class="precio"><?php echo $item['Precio']; ?></p>
                                    <p><b>Dirección: </b> <span><?php echo $item['Direccion']; ?></span></p>
                                    <p><b>Ciudad: </b> <span><?php echo $item['Ciudad']; ?></span></p>
                                    <p><b>Teléfono: </b> <span><?php echo $item['Telefono']; ?></span></p>
                                    <p><b>Código Postal: </b> <span><?php echo $item['Codigo_Postal']; ?></span></p>
                                    <p><b>Tipo: </b> <span><?php echo $item['Tipo']; ?></span></p>
                                    
                                    <div class="text-center">
                                        <a href="?c=Property&a=Store&id=<?php echo $item['Id']; ?>">
                                            <button class="mt-0 btn btn-success">Guardar</button>
                                        </a>
                                    </div>
                                
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>

        <div id="tabs-2">
            <div class="colContenido" id="divResultadosBusqueda">
                <div class="tituloContenido card" style="justify-content: center;">
                    <h5>Bienes guardados: <?php echo count($this->listadoBD)?> registros</h5>
                    <div class="">
                        <?php foreach($this->listadoBD as $item): ?>
                                <div class="item">
                                    <div class="item-img">
                                        <img src="public/img/home.jpg" alt="Img propiedad">
                                    </div>
                                    <div class="item-description">
                                        <p class="precio">$<?php echo $item->price; ?></p>
                                        <p><b>Dirección: </b> <span><?php echo $item->direccion; ?></span></p>
                                        <p><b>Ciudad: </b> <span><?php echo $item->city; ?></span></p>
                                        <p><b>Teléfono: </b> <span><?php echo $item->telephone; ?></span></p>
                                        <p><b>Código Postal: </b> <span><?php echo $item->code_postal; ?></span></p>
                                        <p><b>Tipo: </b> <span><?php echo $item->type; ?></span></p>
                                        
                                        <div class="text-center">
                                            <a href="?c=Property&a=Eliminar&id=<?php echo $item->id; ?>">
                                                <button class="mt-0 btn btn-danger">Eliminar</button>
                                            </a>
                                        </div>
                                    
                                    </div>
                                </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>

        <div id="tabs-3">
            <div class="colContenido" id="divResultadosBusqueda">
                <div class="tituloContenido card" style="justify-content: center;">
                    <h5>Esportar reporte: </h5>
                    <div class="">
                        <form method="post" id="formulario" action="?c=Property&a=GenerarReporte">
                            <div class="filtrosContenido">
                                <div class="tituloFiltros">
                                    <h5>Filtros</h5>
                                </div>
                                <div class="filtroCiudad input-field">
                                    <p><label for="selectCiudad">Ciudad:</label><br></p>
                                    <select name="ciudad" id="selectCiudad">
                                        <option value="" selected>Elige una ciudad</option>
                                        <?php foreach($this->model->registrosNoRepetidos('Ciudad') as $item): ?>
                                            <option value="<?php echo $item['Ciudad']; ?>" <?php echo $item['Ciudad'] == $this->ciudadSelect? 'selected': ''; ?>><?php echo $item['Ciudad']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="filtroTipo input-field">
                                    <p><label for="selecTipo">Tipo:</label></p>
                                    <br>
                                    <select name="tipo" id="selectTipo">
                                        <option value="">Elige un tipo</option>
                                        <?php foreach($this->model->registrosNoRepetidos('Tipo') as $item): ?>
                                            <option value="<?php echo $item['Tipo']; ?>" <?php echo $item['Tipo'] == $this->TipoSelect? 'selected': ''; ?>><?php echo $item['Tipo']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                               
                                <div class="botonField">
                                    <input type="submit" class="btn white" value="Buscar" id="submitButton">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>