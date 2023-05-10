<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar estudiantes

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar estudiantes</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalIdentificacion">

          Agregar Estudiante

        </button>


      </div>

      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">Identificación</th>
              <th>Nombre Completo</th>
              <th>Carrera</th>
              <th>Teléfono</th>
              <th>Celular</th>
              <th>Estado</th>
              <th>Foto</th>
              <th>Fecha de Ingreso</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>
              <?php
                $Estudiantes=ControladorEstudiante::ctrMostrarEstudiante(null,null);

                foreach ($Estudiantes as $estudiante) {
              ?>
            <tr>
              <td><?php echo $estudiante['IDENTIFICACION_ESTUDIANTE']?></td>
              <td><?php echo $estudiante['NOMBRE_COMPLETO']. $estudiante['PRIMER_APELLIDO']. $estudiante['SEGUNDO_APELLIDO']?></td>
              <td><?php 
              if ($estudiante['ID_CARRERA']==3){
                echo '<button class="btn btn-success btn-xs">Asministración de Negocios</button>';
              } if ($estudiante['ID_CARRERA']==2){
                echo '<button class="btn btn-primary btn-xs">Ingenieria En Sistemas</button>';
              }if ($estudiante['ID_CARRERA']==1){
                echo '<button class="btn btn-danger btn-xs">Contaduría</button>';
              } if ($estudiante['ID_CARRERA']==4){
                echo '<button class="btn btn-secondary btn-xs">Constaduria</button>';
              }
              ?></td>
               <td><?php echo $estudiante['TELEFONO_ESTUDIANTE']?></td>
               <td><?php echo $estudiante['CELULAR_ESTUDIANTE']?></td>
               <td><?php echo '<button class="btn btn-success btn-xs"> '.$estudiante['ESTADO'].'</button>'?></td>
              <td><img src="<?php echo $estudiante['FOTO_ESTUDIANTE']?>" class="img-thumbnail" width="40px"></td>
             
              
              <td><?php echo $estudiante['FECHA_CREACION']?></td>
              <td>

                <div class="btn-group">

                  <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                  <button class="btn btn-danger"><i class="fa fa-times"></i></button>

                </div>

              </td>

            </tr>

        <?php  } ?>



          </tbody>

        </table>

      </div>

    </div>

  </section>

</div>



<!--=====================================
MODAL AGREGAR USUARIO
======================================-->

<div id="modalIdentificacion" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Seleccione el Tipo de Identificacion</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="row">

            <div class="col-md-3">

              <div class="box-header with-border">

                <a class="btn btn-primary btn-lg" href="crear-estudiante">Nacional</a>


              </div>

            </div>

            <div class="col-md-3">

              <div class="box-header with-border">

                <a class="btn btn-success btn-lg" href="crear-estudiante">Extranjero</a>

              </div>

            </div>
            <div class="col-md-3">

              <div class="box-header with-border">

                <a class="btn btn-danger btn-lg" href="crear-estudiante">Cédula de Residencia</a>

              </div>

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>
        </div>

      </form>

    </div>

  </div>

</div>