<?php

require_once "controladores/plantilla.controlador.php";
require_once "controladores/usuarios.controlador.php";
require_once "controladores/categorias.controlador.php";
require_once "controladores/estudiante.controlador.php";

require_once "controladores/carrera.controlador.php";


require_once "modelos/usuarios.modelo.php";
require_once "modelos/categorias.modelo.php";

require_once "modelos/estudiante.modelo.php";

require_once "modelos/vehiculo.modelo.php";

require_once "modelos/carrera.modelo.php";


$plantilla = new ControladorPlantilla();
$plantilla -> ctrPlantilla();