<?php

$data_local = require_once('../data-1.json');


/**
 * Método para obtener todos los bienes locales
 */
function allPropertiesLocal($data_local){
    return json_decode($data_local);
}

var_dump(allPropertiesLocal($data_local));