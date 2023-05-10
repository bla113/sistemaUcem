<?php

require_once "../controladores/estudiante.controlador.php";
require_once "../modelos/estudiante.modelo.php";

class AjaxEstudiante{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $idUsuario;
 
	public function ajaxEditarUsuario(){

		$item = "id";
		$valor = $this->idUsuario;

		$respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

		echo json_encode($respuesta);

	}

	/*=============================================
	ACTIVAR USUARIO
	=============================================*/	

	public $activarUsuario;
	public $activarId;


	public function ajaxActivarUsuario(){

		$tabla = "usuarios";

		$item1 = "estado";
		$valor1 = $this->activarUsuario;

		$item2 = "id";
		$valor2 = $this->activarId;

		$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla, $item1, $valor1, $item2, $valor2);

	}

	/*=============================================
	VALIDAR NO REPETIR ESTUDIANTE
	=============================================*/	

	public $validarIdentificacion;

	public function ajaxValidarIdentificicacion(){

		$item = "IDENTIFICACION_ESTUDIANTE"; 
		$valor = $this->validarIdentificacion;

		$respuesta = ControladorEstudiante::ctrMostrarEstudiante($item, $valor);

		echo json_encode($respuesta);

	}
}
 
/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idUsuario"])){

	$editar = new AjaxEstudiante();
	$editar -> idUsuario = $_POST["idUsuario"];
	$editar -> ajaxEditarUsuario();

}

/*=============================================
ACTIVAR USUARIO
=============================================*/	

if(isset($_POST["activarUsuario"])){

	$activarUsuario = new AjaxEstudiante();
	$activarUsuario -> activarUsuario = $_POST["activarUsuario"];
	$activarUsuario -> activarId = $_POST["activarId"];
	$activarUsuario -> ajaxActivarUsuario();

}

/*=============================================
VALIDAR NO REPETIR ESTUDIANTE
=============================================*/

if(isset($_POST["validarIdentificacion"])){

	$valIdentificacion= new AjaxEstudiante();
	$valIdentificacion -> validarIdentificacion = $_POST["validarIdentificacion"];
	$valIdentificacion -> ajaxValidarIdentificicacion();

}