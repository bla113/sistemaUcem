<?php


class ControladorEstudiante
{


    /*=============================================
  MOSTRAR ESTUDIANTE
=============================================*/

    static public function ctrMostrarEstudiante($item, $valor)
    {
        $tabla = "estudiante";

        $respuesta = ModeloEstudiante::mdlMostrarEstudiantes($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostraProximoCarnet()
    {

        $tabla = "carnet_estudiante";

        $item = 'carnet';

        $respuesta = ModeloEstudiante::mdlNuvoCarnet($tabla, $item);

        return $respuesta;
    }

    /*=============================================
  BUSCAR ESTUDIANTE
=============================================*/
    static public function ctrBuscarEstudiante()
    {

        if (isset($_POST["BTNBUSCARCEDULA"])) {

            if (preg_match('/^[0-9]+$/', $_POST["buscarIdentificacion"])) {

                $tabla = "padron_electoral";

                $item = "IDENTIFICACION";

                $valor =  $_POST["buscarIdentificacion"];




                $respuesta = ModeloEstudiante::mdlBuscarIdentificacion($tabla, $item, $valor);


                if ($respuesta != "" || !empty($respuesta) || $respuesta != null) {
                    return $respuesta;
                } else {
                    echo '<script>
                    swal({
                          type: "error",
                          
                          title: "¡La cedula ingresada no posee registros!",
                          showConfirmButton: true,
                          confirmButtonText: "Cerrar"
                          }).then(function(result){
                            if (result.value) {
    
                            window.location = "crear-estudiante";
    
                            }
                        })
    
                  </script>';
                    exit;
                }
            } else {

                echo '<script>

                swal({
                      type: "error",
                      
                      title: "¡La cedula no puede ir vacía o llevar caracteres especiales!",
                      showConfirmButton: true,
                      confirmButtonText: "Cerrar"
                      }).then(function(result){
                        if (result.value) {

                        window.location = "crear-estudiante";

                        }
                    })

              </script>';
            }
        }
    }

    /*=============================================
CREAR ESTUDIANTE
=============================================*/
    static public function ctrCrearEstudiante()
    {

        if (isset($_POST['btnGuardarEstudiante'])) {

            /*=============================================
                        VALIDAR LOS DATOS DEL FORMULARIO STUDIANTE
                =============================================*/

            if (
                isset($_POST['nuevaIdentifiacion']) && trim($_POST['nuevaIdentifiacion']) == '' ||
                isset($_POST['nuevoNombre']) && trim($_POST['nuevoNombre']) == '' ||
                isset($_POST['nuevoApellido1']) && trim($_POST['nuevoApellido1']) == '' ||
                isset($_POST['nuevoApellido2']) && trim($_POST['nuevoApellido2']) == '' ||
                isset($_POST['nuevaProvincia']) && trim($_POST['nuevaProvincia']) == '' ||
                isset($_POST['nuevoCanton']) && trim($_POST['nuevoCanton']) == '' ||
                isset($_POST['nuevoDistrito']) && trim($_POST['nuevoDistrito']) == '' ||
                isset($_POST['otrasSenas']) && trim($_POST['otrasSenas']) == '' ||
                isset($_POST['nuevoTelefono']) && trim($_POST['nuevoTelefono']) == '' ||
                isset($_POST['nuevoCelular']) && trim($_POST['nuevoCelular']) == '' ||
                isset($_POST['nuevofNacimiento']) && trim($_POST['nuevofNacimiento']) == '' ||
                isset($_POST['nuevoEstadoCivil']) && trim($_POST['nuevoEstadoCivil']) == '' ||
                isset($_POST['procedeExtudante']) && trim($_POST['procedeExtudante']) == '' ||
                isset($_POST['nuevoTrabajo']) && trim($_POST['nuevoTrabajo']) == '' ||
                isset($_POST['nuevaCarrera']) && trim($_POST['nuevaCarrera']) == ''
                
            ) {

                echo '<script>

					swal({

						type: "error",
						title: "¡ Todos los campos son obligatorios!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "estudiante";

						}

					});
				

				</script>';
            } //fin validacion campos
            $ruta = "";

            if(isset($_FILES["nuevaFotoEstudiante"]["tmp_name"])){

                list($ancho, $alto) = getimagesize($_FILES["nuevaFotoEstudiante"]["tmp_name"]);

                $nuevoAncho = 500;
                $nuevoAlto = 500;

                /*=============================================
                CREAMOS EL DIRECTORIO DONDE VAMOS A GUARDAR LA FOTO DEL USUARIO
                =============================================*/

                $directorio = "vistas/img/estudiantes/".$_POST["nuevaIdentifiacion"];
                if(!file_exists($directorio)){
                    mkdir($directorio, 0755);
                }
                

                /*=============================================
                DE ACUERDO AL TIPO DE IMAGEN APLICAMOS LAS FUNCIONES POR DEFECTO DE PHP
                =============================================*/

                if($_FILES["nuevaFotoEstudiante"]["type"] == "image/jpeg"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/estudiantes/".$_POST["nuevaIdentifiacion"]."/".$aleatorio.".jpg";

                    $origen = imagecreatefromjpeg($_FILES["nuevaFotoEstudiante"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagejpeg($destino, $ruta);

                }

                if($_FILES["nuevaFotoEstudiante"]["type"] == "image/png"){

                    /*=============================================
                    GUARDAMOS LA IMAGEN EN EL DIRECTORIO
                    =============================================*/

                    $aleatorio = mt_rand(100,999);

                    $ruta = "vistas/img/estudiantes/".$_POST["nuevaIdentifiacion"]."/".$aleatorio.".png";

                    $origen = imagecreatefrompng($_FILES["nuevaFotoEstudiante"]["tmp_name"]);						

                    $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

                    imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);

                    imagepng($destino, $ruta);

                }

            }





            $tabla = "estudiante";


            $datos=[
                'NOMBRE_COMPLETO'=>$_POST['nuevoNombre'],
                'PRIMER_APELLIDO'=>$_POST['nuevoApellido1'],
                'SEGUNDO_APELLIDO'=>$_POST['nuevoApellido2'],
                'TIPO_IDENTIFICACION'=>$_POST['nuevoTipoIentificacion'],
                'IDENTIFICACION_ESTUDIANTE'=>$_POST['nuevaIdentifiacion'],
                'PROVINCIA_ESTUDIANTE'=>$_POST['nuevaProvincia'],
                'CANTON_ESTUDIANTE'=>$_POST['nuevoCanton'],
                'DISTRITO_ESTUDIANTE'=>$_POST['nuevoDistrito'],
                'OTRAS_SENAS_ESTUDIANTE'=>$_POST['otrasSenas'],
                'TELEFONO_ESTUDIANTE'=>$_POST['nuevoTelefono'],
                'CELULAR_ESTUDIANTE'=>$_POST['nuevoCelular'],
                'LABORA_ESTUDIANTE'=>$_POST['nuevoTrabajo'],
                'FECHA_NACIMIENTO'=>$_POST['nuevofNacimiento'],
                'ESTADO_CIVIL'=>$_POST['nuevoEstadoCivil'],
                'PROCEDE_ESTUDIANTE'=>$_POST['nuevoNombre'],
                'ID_CARRERA'=>$_POST['nuevaCarrera'],
                'FOTO_ESTUDIANTE'=>$ruta,
                'ID_PLAN'=>1
            ];
            
               //return $datos;
           

            $respuesta = ModeloEstudiante::mdlCrearEstudiante($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>
    
                        swal({
    
                            type: "success",
                            title: "¡El estudiante ha sido guardado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
    
                        }).then(function(result){
    
                            if(result.value){
                            
                                window.location = "estudiantes";
    
                            }
    
                        });
                    
    
                        </script>';


                //return   $datos;

            }
        }
    }
}
