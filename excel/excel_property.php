<?php

header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
header("Content-Disposition: attachment; filename=filtro_property.xls");  //File name extension was wrong
header("Expires: 0");
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header("Cache-Control: private",false);

?>


<table border="1">
<tr>
    <th>DIRECCION</th>
    <th>CIUDAD</th>
    <th>TELEFONO</th>
    <th>CODIGO POSTAL</th>
    <th>TIPO</th>
    <th>PRECIO</th>
</tr>
    <!-- Recorremos los registros -->
    <?php foreach($this->listado as $item): ?>
        <tr>
            <td><?php echo $item['Direccion']; ?></td>
            <td><?php echo $item['Ciudad']; ?></td>
            <td><?php echo $item['Telefono']; ?></td>
            <td><?php echo $item['Codigo_Postal']; ?></td>
            <td><?php echo $item['Tipo']; ?></td>
            <td><?php echo $item['Precio']; ?></td>
        </tr>
    <?php endforeach; ?>

   
</table>