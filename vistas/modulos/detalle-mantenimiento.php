<?php

include '../../vendor/autoload.php';
require_once '../../controladores/mantenimiento.controlador.php';
require_once '../../modelos/conexion.php';
require_once '../../modelos/mantenimiento.modelo.php';


ob_start();

if (isset($_GET['idMante'])) {
    $valor = $_GET['idMante'];
    $item = 'id';

    $mantenimiento = ControladorMantenimiento::ctrMostrarAllMantenimiento($item, $valor);
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <title>Reporte de Mantenimientos</title>
</head>

<body>

    <div class="content-wrapper">



        <section class="content">

            <div class="box">

                <div class="col-md-3">
                    <div class="box-body ">
                        <?php
                        foreach ($mantenimiento as $key => $value) {



                        ?>
                            <form class="row g-2 needs-validation">

                                <h3 class="text text-bg-primary"> Hoja de Mantenimiento del vehículo Placa: <strong> <?php echo $value['placa'] ?></strong></h3>
                                <br>
                                <br>
                                <div class="col-md-4">

                                    <label class="form-label">Fecha del Mantenimiento:</label>

                                    <label class="form-label"> <strong><?php echo $value['fecha'] ?></strong></label>


                                </div>
                                <div class="col-md-4">

                                    <label class="form-label">Tipo de Mantenimiento:</label>

                                    <label class="form-label"> <strong><?php echo $value['tipo_mantenimiento'] ?></strong></label>


                                </div>
                                <div class="col-md-4">

                                    <label class="form-label">Técnico Encargado:</label>

                                    <label class="form-label"> <strong><?php echo $value['nombre'] ?></strong></label>

                                </div>

                                <div class="col-md-4">

                                    <label class="form-label">Placa Vehículo:</label>

                                    <label class="form-label"> <strong><?php echo $value['placa'] ?></strong></label>


                                </div>

                                <div class="col-md-4">

                                    <label class="form-label">Modelo Vehículo:</label>

                                    <label class="form-label"> <strong><?php echo $value['modelo'] ?></strong></label>


                                </div>
                                <div class="col-md-4">

                                    <label class="form-label">Color Vehículo:</label>

                                    <label class="form-label"> <strong><?php echo $value['color'] ?></strong></label>


                                </div>

                                <div class="col-md-4">

                                    <label class="form-label">Estilo Vehículo:</label>

                                    <label class="form-label"> <strong><?php echo $value['estilo'] ?></strong></label>


                                </div>

                                <div class="col-md-4">

                                    <label class="form-label">Color Vehículo:</label>

                                    <label class="form-label"> <strong><?php echo $value['color'] ?></strong></label>


                                </div>

                                <div class="col-md-4">

                                    <label class="form-label">Presentó Fugas:</label>

                                    <label class="form-label"> <strong><?php echo $value['fugas'] ?></strong></label>


                                </div>
                                <div class="col-md-4">

                                    <label class="form-label">Se le Conoco refrigerante:</label>

                                    <label class="form-label"> <strong><?php echo $value['refrigerante'] ?></strong></label>


                                </div>
                                <div class="col-md-4">

                                    <label class="form-label">Se le colocó Tornillo Carter:</label>

                                    <label class="form-label"> <strong><?php echo $value['tornillo_carter'] ?></strong></label>


                                </div>
                                

                                <div class="mb-3">
                                    <label  class="form-label">Observaciones:</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $value['observaciones'] ?></textarea>
                                </div>



                            </form>


                        <?php } ?>
                    </div>

                </div>
            </div>
        </section>

    </div>







</body>

</html>

<?php
$html = ob_get_clean();
//echo $html;

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('latter');

$dompdf->render();
$dompdf->stream("archivo_.pdf", array("Attachment" => false));




?>