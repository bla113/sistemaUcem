<?php
class ModeloVehiculos
{




	/*=============================================
	MOSTRAR Vehiculos
	=============================================*/

	static public function mdlMostrarVehiculos($tabla, $item, $valor)
	{

		if ($item != null) {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

			$stmt->execute();

			return $stmt->fetchAll();

			$stmt->CloseCursor();
		} else {

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

			$stmt->execute();

			return $stmt->fetchAll();
		}



		$stmt = null;
	}

	/*=============================================
	CREAR VEHICULO
	=============================================*/


	static public function mdlCrearVehiculo($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(placa,color,modelo,tipo_combustible,motor,estilo,id_usuario,marca) 
										VALUES (:placa,:color,:modelo,:tipo_combustible,:motor,:estilo,:id_usuario,:marca)");

		$stmt->bindParam(":placa", $datos['placa'], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos['color'], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos['modelo'], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_combustible", $datos['tipo_combustible'], PDO::PARAM_STR);
		$stmt->bindParam(":motor", $datos['motor'], PDO::PARAM_STR);
		$stmt->bindParam(":estilo", $datos['estilo'], PDO::PARAM_STR);
		$stmt->bindParam(":id_usuario", $datos['id_usuario'], PDO::PARAM_INT);
		$stmt->bindParam(":marca", $datos['marca'], PDO::PARAM_STR);


		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}

	/*=============================================
	EDITAR VEHICULO
	=============================================*/

	static public function mdlEditarVehiculo($tabla, $datos)
	{
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla 
		SET placa = :placa, 
			  color = :color,
		 	  modelo = :modelo, 
		      tipo_combustible = :tipo_combustible, 
		      motor = :motor,
		      estilo = :estilo, 
		       marca = :marca
		  WHERE ( id = :id)");

		$stmt->bindParam(":placa", $datos["placa"], PDO::PARAM_STR);
		$stmt->bindParam(":color", $datos["color"], PDO::PARAM_STR);
		$stmt->bindParam(":modelo", $datos["modelo"], PDO::PARAM_STR);
		$stmt->bindParam(":motor", $datos["motor"], PDO::PARAM_STR);
		$stmt->bindParam(":estilo", $datos["estilo"], PDO::PARAM_STR);
		$stmt->bindParam(":tipo_combustible", $datos["tipo_combustible"], PDO::PARAM_STR);
		$stmt->bindParam(":marca", $datos["marca"], PDO::PARAM_STR);
		$stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();
		$stmt = null;
	}

	/*=============================================
	BORRAR VEHICULO
	=============================================*/

	static public function mdlBorrarVehiculo($tabla, $datos)
	{

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt->bindParam(":id", $datos, PDO::PARAM_INT);

		if ($stmt->execute()) {

			return "ok";
		} else {

			return "error";
		}

		$stmt->closeCursor();

		$stmt = null;
	}
}
