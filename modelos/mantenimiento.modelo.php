<?php

require_once "conexion.php";

class ModeloMantenimiento{



    static public function mdlIngresarMantenimiento($tabla, $datos){

        

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha,id_usuario,id_vehiculo,tipo_mantenimiento,fecha_proxima_revision,
        km_proxima_revision,observaciones,filtro_aceite,filtro_aire,filtro_combustible,liquido_frenos,fugas,refrigerante,tornillo_carter) VALUES (:fecha,:id_usuario,:id_vehiculo,:tipo_mantenimiento,:fecha_proxima_revision,
        :km_proxima_revision,:observaciones,:filtro_aceite,:filtro_aire,:filtro_combustible,:liquido_frenos,:fugas,:refrigerante,:tornillo_carter)");

		$stmt->bindParam(":fecha", $datos['fecha'], PDO::PARAM_STR);
        $stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
        $stmt->bindParam(":id_vehiculo", $datos['id_vehiculo'], PDO::PARAM_INT);
        $stmt->bindParam(":tipo_mantenimiento", $datos['tipo_mantenimiento'], PDO::PARAM_STR);
        $stmt->bindParam(":fecha_proxima_revision", $datos['fecha_proxima_revision'], PDO::PARAM_STR);
        $stmt->bindParam(":km_proxima_revision", $datos['km_proxima_revision'], PDO::PARAM_STR);
        $stmt->bindParam(":observaciones", $datos['observaciones'], PDO::PARAM_STR);
        $stmt->bindParam(":filtro_aceite", $datos['filtro_aceite'], PDO::PARAM_STR);
        $stmt->bindParam(":filtro_aire", $datos['filtro_aire'], PDO::PARAM_STR);
        $stmt->bindParam(":filtro_combustible", $datos['filtro_combustible'], PDO::PARAM_STR);
        $stmt->bindParam(":liquido_frenos", $datos['liquido_frenos'], PDO::PARAM_STR);
        $stmt->bindParam(":fugas", $datos['fugas'], PDO::PARAM_STR);
        $stmt->bindParam(":refrigerante", $datos['refrigerante'], PDO::PARAM_STR);
        $stmt->bindParam(":tornillo_carter", $datos['tornillo_carter'], PDO::PARAM_STR);

		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->closeCursor();
		$stmt = null;

	}

    
	/*=============================================
	MOSTRAR MANTENIMIENTO
	=============================================*/

	static public function mdlMostrarMantenimiento($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		//$stmt -> close();

		$stmt = null;

	}


    


}
