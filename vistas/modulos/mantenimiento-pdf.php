<?php

include '../../vendor/autoload.php';
require_once '../../controladores/mantenimiento.controlador.php';
require_once '../../modelos/conexion.php';
require_once '../../modelos/mantenimiento.modelo.php';


ob_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../vistas/bower_components/bootstrap/dist/css/bootstrap.min.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../vistas/bower_components/font-awesome/css/font-awesome.min.css">

  <!-- Ionicons -->
  <link rel="stylesheet" href="../../vistas/bower_components/Ionicons/css/ionicons.min.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="../../vistas/dist/css/AdminLTE.css">
  
  <!-- AdminLTE Skins -->
  <link rel="stylesheet" href="../../vistas/dist/css/skins/_all-skins.min.css">

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

   <!-- DataTables -->
  <link rel="stylesheet" href="../../vistas/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="../../vistas/bower_components/datatables.net-bs/css/responsive.bootstrap.min.css">

  <!--=====================================
  PLUGINS DE JAVASCRIPT
  ======================================-->

  <!-- jQuery 3 -->
  <script src="../../vistas/bower_components/jquery/dist/jquery.min.js"></script>
  
  <!-- Bootstrap 3.3.7 -->
  <script src="../../vistas/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  <!-- FastClick -->
  <script src="../../vistas/bower_components/fastclick/lib/fastclick.js"></script>
  
  <!-- AdminLTE App -->
  <script src="../../vistas/dist/js/adminlte.min.js"></script>

  <!-- DataTables -->
  <script src="vistas/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/dataTables.responsive.min.js"></script>
  <script src="vistas/bower_components/datatables.net-bs/js/responsive.bootstrap.min.js"></script>

  <!-- SweetAlert 2 -->
  <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>
  <!-- By default SweetAlert2 doesn't support IE. To enable IE 11 support, include Promise polyfill:-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
  
<div class="content-wrapper">

  

  <section class="content">

    <div class="box">
 
      
      <div class="box-body">
        
      <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    </tr>
  </tbody>
</table>


        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>

<!--=====================================
MODAL AGREGAR USUARIO
======================================-->







</body>

</html>

<?php
$html = ob_get_clean();
//echo $html;

use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options =$dompdf->getOptions();
$options->set(array('isRemoteEnabled'=>true));
$dompdf->setOptions($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('latter');

$dompdf->render();
$dompdf->stream("archivo_.pdf",array("Attachment"=>false));




?>