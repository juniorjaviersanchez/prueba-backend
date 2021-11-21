# PRUEBA BACKEND

_Un buscador en PHP puro_

## Comenzando 🚀

_Estas instrucciones te permitirán obtener una copia del proyecto en funcionamiento en tu máquina local para propósitos de desarrollo y pruebas._


### Pre-requisitos 📋

_Necesitamos para poder ejecutar el proyecto_

* PHP  7.3.21
* MySQL  5.7

### Instalación 🔧

* Primero levantar los servicios para php, se recomienda usar Wamp Server o Xamp_
* Crear una BD con el nombre 'intelcost_bienes' y crear una tabla llamada 'properties', recuerda que el Script de la tabla está en la carpeta 'bd'_

_Luego clonar el repositorio_

```
git clone git@github.com:juniorjaviersanchez/prueba-backend.git
```

_Ejectuar en el navegador_

_Vista principal_
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/0-vista-principal.png)


## Pruebas ⚙️

* 1.- El buscador debe mostrar en la pestaña “Bienes disponibles” todos los registros de los bienes en los datos generales al acceder al index. 
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/1-todos-los-registros.png)

* 2.- Los menús desplegables a la izquierda de la página que indican la ciudad y el tipo de vivienda. Deben cargarse con todas las ciudades y tipos presentes en los datos generales sin repetirse.
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/2-llenar-select.png)

* 3.- Con los campos Ciudad y Tipo cargados, si se selecciona un elemento del menú desplegable y se da click en el botón “Buscar”, Se deben visualizar únicamente los registros que hagan parte de la ciudad o tipo seleccionados. 
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/3-filtro.png)

* 4.- Cree una base de datos mysql con el nombre “Intelcost_bienes”, la cual contenga las tablas que sean necesarias para guardar en base de datos el registro de un bien seleccionado en pantalla
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/4-btn-guardar.png)

* 5.- Cada vez que se de click en la pestaña “Mis bienes”, deberá listar todos los bienes guardados por el usuario en la base de datos:
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/5-mis-bienes.png)
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/5-1-bd.png)

* 6.- Una vez listados los bienes en la pestaña “Mis bienes”. Por cada registro listado se debe poder eliminar el registro previamente asociado, dándole clic al botón “eliminar”
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/6-btn-eliminar.png)

* 7.- Crear una pestaña adicional que se llame “Reportes”, la cual permitirá generar un exportable tipo Excel con los bienes seleccionados. Se debe tener en cuenta que el usuario podrá hacer uso de los filtros por ciudad o tipo para limitar la cantidad de resultado en el exportable.
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/7-generar-excel.png)
![screenshot](https://github.com/juniorjaviersanchez/prueba-backend/blob/master/img-readme/7-1-reporte-excel.png)


## Construido con 🛠️

* PHP y MySQL
* HTML, CSS



## Expresiones de Gratitud 🎁

* Se acepta cualquier feedback 📢
* Gracias por su tiempo 🤓.
* etc.



---
⌨️ con ❤️ por [Junior Javier Sánchez](https://www.juniorjaviersanchez.com/) 😊
