<?php

class ControladorVehiculo{

/*=============================================
	MOSTRAR VEHICULOS
	=============================================*/

	static public function ctrMostrarVehiculos($item, $valor){

		$tabla = "vehiculos";

		$respuesta = ModeloVehiculos::mdlMostrarVehiculos($tabla, $item, $valor);

		return $respuesta;
	
	}

    /*=============================================
	CREAR NUEVO VEHICULOS
	=============================================*/


    static public function ctrCrearVehiculo(){

		if(isset($_POST["nuevaPlaca"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevaPlaca"])){

				$tabla = "vehiculos";

				$datos = array(
                    "placa"=>$_POST["nuevaPlaca"],
                    "color"=>$_POST["nuevoColor"],
                    "modelo"=>$_POST["nuevoModelo"],
                    "tipo_combustible"=>$_POST["nuevoTipoCombustible"],
                    "motor"=>$_POST["nuevoMotor"],
                    "estilo"=>$_POST["nuevoEstilo"],
                    "id_usuario"=>$_POST["nuevoCliente"],
                    "marca"=>$_POST["nuevoMarca"],
                    

                );

            //  return $datos;
				$respuesta = ModeloVehiculos::mdlCrearVehiculo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El vehiculo ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "vehiculos";

									}
								})

					</script>';

				}else{
                    echo'<script>

					swal({
						  type: "alert",
						  title: "El vehiculo no ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "vehiculos";

									}
								})

					</script>';
                }


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡Los Campos no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vehiculos";

							}
						})

			  	</script>';

			}

		}

	}


    
	/*=============================================
	EDITAR VEHICULO
	=============================================*/

	static public function ctrEditarVehiculo(){

		if(isset($_POST["btnEditarVehículo"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarPlaca"])){

				$tabla = "vehiculos";

				$datos = array("placa"=>$_POST["editarPlaca"],
							   "color"=>$_POST["editarColor"],
                               "modelo"=>$_POST["editarModelo"],
                               "tipo_combustible"=>$_POST["editarTCombustible"],
                               "motor"=>$_POST["editarMotor"],
                               "estilo"=>$_POST["editarEstilo"],
                               "marca"=>$_POST["editarMarca"],
                               "id"=>$_POST["IdVehiculo"],
                            );

				$respuesta = ModeloVehiculos::mdlEditarVehiculo($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Vehiculo ha sido actualizado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "vehiculos";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡La placa no puede ir vacía o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "vehiculos";

							}
						})

			  	</script>';

			}

		}

	}



    /*=============================================
	BORRAR VEHICULO
	=============================================*/

	static public function ctrBorrarVehiculo(){

		if(isset($_POST["btnEliminarVehiculo"])){

			$tabla ="vehiculos";
			$datos =$_POST["btnEliminarVehiculo"];

			$respuesta = ModeloVehiculos::mdlBorrarVehiculo($tabla, $datos);
			if($respuesta == "ok"){

				echo'<script>

					swal({
						  type: "success",
						  title: "Vehículo ha sido borrada correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "vehiculos";

									}
								})

					</script>';
			}
		}
		
	}





}