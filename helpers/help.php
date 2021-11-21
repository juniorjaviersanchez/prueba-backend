<?php


/**
 * Método para obtener todos los bienes locales
 */
function covertirStringDecimal($cadena){
    $cadena = str_replace('$','',$cadena);
    $cadena = str_replace(',','.',$cadena);
    return (double)$cadena;
}

