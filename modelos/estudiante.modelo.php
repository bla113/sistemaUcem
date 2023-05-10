<?php

require_once "conexion.php";

class ModeloEstudiante
{

    /*=============================================
BUSCAR IDENTIFICICACION
=============================================*/

    static public function mdlBuscarIdentificacion($tabla, $item, $valor)
    {



        $stmt =  ApiPadronElectoral::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

        $stmt->execute();

        return $stmt->fetchAll();



        $stmt->closeCursor();

        $stmt = null;
    }
    static public function mdlNuvoCarnet($tabla, $item)
    {



        $stmt =  Conexion::conectar()->prepare("SELECT MAX($item) as carnet FROM $tabla  LIMIT 1");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt->closeCursor();

        $stmt = null;
    }
    static public function mdlCrearCarnet($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(carnet) VALUES (:carnet)");

        $stmt->bindParam(":carnet", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        }


        $stmt->closeCursor();

        $stmt = null;
    }


    static public function mdlMostrarEstudiantes($tablaE, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaE WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetchAll();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tablaE");

            $stmt->execute();

            return $stmt->fetchAll();
        }


        //$stmt -> closeCursor();

        $stmt = null;
    }




    static public function mdlCrearEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NOMBRE_COMPLETO,
                                                            PRIMER_APELLIDO,
                                                            SEGUNDO_APELLIDO,
                                                            TIPO_IDENTIFICACION,
                                                            IDENTIFICACION_ESTUDIANTE,
                                                            PROVINCIA_ESTUDIANTE,
                                                            CANTON_ESTUDIANTE,
                                                            DISTRITO_ESTUDIANTE,
                                                            OTRAS_SENAS_ESTUDIANTE,
                                                            TELEFONO_ESTUDIANTE,
                                                            CELULAR_ESTUDIANTE,
                                                            LABORA_ESTUDIANTE,
                                                            FECHA_NACIMIENTO,
                                                            ESTADO_CIVIL,
                                                            ID_PLAN,
                                                            PROCEDE_ESTUDIANTE,
                                                            ID_CARRERA,
                                                            FOTO_ESTUDIANTE)
                                                         VALUES (:NOMBRE_COMPLETO,
                                                            :PRIMER_APELLIDO,
                                                            :SEGUNDO_APELLIDO,
                                                            :TIPO_IDENTIFICACION,
                                                            :IDENTIFICACION_ESTUDIANTE,
                                                            :PROVINCIA_ESTUDIANTE,
                                                            :CANTON_ESTUDIANTE,
                                                            :DISTRITO_ESTUDIANTE,
                                                            :OTRAS_SENAS_ESTUDIANTE,
                                                            :TELEFONO_ESTUDIANTE,
                                                            :CELULAR_ESTUDIANTE,
                                                            :LABORA_ESTUDIANTE,
                                                            :FECHA_NACIMIENTO,
                                                            :ESTADO_CIVIL,
                                                            :ID_PLAN,
                                                            :PROCEDE_ESTUDIANTE,
                                                            :ID_CARRERA,
                                                            :FOTO_ESTUDIANTE)");

        $stmt->bindParam(":NOMBRE_COMPLETO", $datos["NOMBRE_COMPLETO"], PDO::PARAM_STR);
        $stmt->bindParam(":PRIMER_APELLIDO", $datos["PRIMER_APELLIDO"], PDO::PARAM_STR);
        $stmt->bindParam(":SEGUNDO_APELLIDO", $datos["SEGUNDO_APELLIDO"], PDO::PARAM_STR);
        $stmt->bindParam(":TIPO_IDENTIFICACION", $datos["TIPO_IDENTIFICACION"], PDO::PARAM_STR);
        $stmt->bindParam(":IDENTIFICACION_ESTUDIANTE", $datos["IDENTIFICACION_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":PROVINCIA_ESTUDIANTE", $datos["PROVINCIA_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":CANTON_ESTUDIANTE", $datos["CANTON_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":DISTRITO_ESTUDIANTE", $datos["DISTRITO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":OTRAS_SENAS_ESTUDIANTE", $datos["OTRAS_SENAS_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":TELEFONO_ESTUDIANTE", $datos["TELEFONO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":CELULAR_ESTUDIANTE", $datos["CELULAR_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":LABORA_ESTUDIANTE", $datos["LABORA_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":FECHA_NACIMIENTO", $datos["FECHA_NACIMIENTO"], PDO::PARAM_STR);
        $stmt->bindParam(":ESTADO_CIVIL", $datos["ESTADO_CIVIL"], PDO::PARAM_STR);
        $stmt->bindParam(":PROCEDE_ESTUDIANTE", $datos["PROCEDE_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_CARRERA", $datos["ID_CARRERA"], PDO::PARAM_INT);
        $stmt->bindParam(":FOTO_ESTUDIANTE", $datos["FOTO_ESTUDIANTE"], PDO::PARAM_STR);
        $stmt->bindParam(":ID_PLAN", $datos["ID_PLAN"], PDO::PARAM_INT);



        if ($stmt->execute()) {

            return "ok";
        }
        if (!$stmt->execute()) {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }

    static public function mdlASignarMateriasaEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(id_estudiante,id_materia) VALUES (:id_estudiante,:id_materia)");

        $stmt->bindParam(":id_estudiante", $datos["id_estudiante"], PDO::PARAM_INT);
        $stmt->bindParam(":id_materia", $datos["id_materia"], PDO::PARAM_INT);



        if ($stmt->execute()) {

            return "ok";
        }
        if (!$stmt->execute()) {

            return "error";
        }

        $stmt->closeCursor();

        $stmt = null;
    }


    /*=============================================
	ASISGNAR CARRERA ESTUDIANTE
	=============================================*/

    static public function mdlAsiganarCarreraEstudiante($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET carrera = :carrera WHERE id = :id");

        $stmt->bindParam(":carrera", $datos["carrera"], PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }

        //$stmt->close();
        $stmt = null;
    }
}
