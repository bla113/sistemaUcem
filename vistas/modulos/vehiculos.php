<div class="content-wrapper">

  <section class="content-header">

    <h1>

      Administrar vehiculos

    </h1>

    <ol class="breadcrumb">

      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>

      <li class="active">Administrar vehiculos</li>

    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">

        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarVehiculo">

          Agregar vehiculo

        </button>

      </div>
      <?php /* $ve=ControladorVehiculo::ctrCrearVehiculo();
  print_r($ve)*/ ?>
      <div class="box-body">

        <table class="table table-bordered table-striped dt-responsive tablas">

          <thead>

            <tr>

              <th style="width:10px">Placa</th>
              <th>Color</th>
              <th>Modelo</th>
              <th>Tipo Combustible</th>
              <th>Motor</th>
              <th>Estilo</th>
              <th>Marca</th>
              <th>Acciones</th>

            </tr>

          </thead>

          <tbody>

            <?php
            $item = null;
            $valor = null;

            $vehiculos = ControladorVehiculo::ctrMostrarVehiculos($item, $valor);
            ?>

            <tr>
              <?php foreach ($vehiculos as $key => $value) { ?>


                <td><?php echo $value['placa'] ?> </td>
                <td><?php echo $value['color'] ?> </td>
                <td><?php echo $value['modelo'] ?> </td>
                <td><?php echo $value['tipo_combustible'] ?> </td>
                <td><?php echo $value['motor'] ?> </td>
                <td><?php echo $value['estilo'] ?> </td>
                <td><?php echo $value['marca'] ?> </td>
                <td>
                  <div class="btn-group">
                    <form action="crear-mantenimiento" method="post">
                      <button class="btn btn-warning btn-sm" name="btnMantenimiento" value="<?php echo $value['id'] ?>"><i class="fa fa-wrench"></i></button>
                      
                    </form>

                    

                    <form action="" method="post">
                      <input type="hidden" name="btnEliminarVehiculo" value="<?php echo $value['id'] ?>">
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      <?php
                      $Elimina = new ControladorVehiculo();
                      $Elimina->ctrBorrarVehiculo();
                      ?>
                    </form>
                    <form action="ediar-vehiculo" method="post">
                    <button class="btn btn-outline-success btn-sm" value="<?php echo $value['id'] ?>"  name="btnModificarVehiculo" type="submit"> <i class="fa fa-pencil"></i></button>


                    </form>

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
MODAL AGREGAR VEHICULO
======================================-->

<div id="modalAgregarVehiculo" class="modal fade" role="dialog">

  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar vehículo</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL PLACA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-user"></i></span>

                <input type="text" class="form-control input-lg" name="nuevaPlaca" placeholder="Ingresar Placa" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL COLOR -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-circle"></i></span>

                <select class="form-control input-lg" name="nuevoColor">

                  <option value="">Selecionar color</option>

                  <option value="Rojo">Rojo</option>

                  <option value="Azul">Azul</option>

                  <option value="Gris">Gris</option>

                  <option value="Verde">Verde</option>

                  <option value="Amarillo">Amarillo</option>

                  <option value="Celeste">Celeste</option>

                  <option value="Café">Café</option>

                  <option value="Otro">Otro</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoModelo" placeholder="Ingresar Modelo" required>

              </div>

            </div>


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-circle"></i></span>

                <select class="form-control input-lg" name="nuevoEstilo">

                  <option value="">Selecionar estilo</option>

                  <option value="Sedan">Sedan</option>

                  <option value="Todo Terreno 4x2">Todo Terreno 4x2</option>

                  <option value="Gris">Todo Terreno 4x4</option>

                  <option value="Pick Up">Pick Up</option>

                  <option value="Motocicleta">Motocicleta</option>

                  <option value="Otro">Otro</option>

                </select>

              </div>

            </div>


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-circle"></i></span>

                <select class="form-control input-lg" name="nuevoTipoCombustible">

                  <option value="">Selecionar Tipo Combustible</option>

                  <option value="Gasolina">Gasolina</option>

                  <option value="Diesel">Diesel</option>

                  <option value="Otro">Otro</option>

                </select>

              </div>

            </div>


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-circle"></i></span>

                <select class="form-control input-lg" name="nuevoMarca">

                  <option value="">Selecionar Marca</option>
                  <option value="Honda">Honda</option>
                  <option value="Toyota">Toyota</option>
                  <option value="Hiunday">Hiunday</option>
                  <option value="Subaru">Subaru</option>
                  <option value="Mazda">Mazda</option>
                  <option value="BMW">BMW</option>
                  <option value="Audi">Audi</option>
                  <option value="Porsche">Porsche</option>
                  <option value="MINI">MINI</option>
                  <option value="Infinity">Infinity</option>
                  <option value="Buick">Buick</option>
                  <option value="Accura">Accura</option>
                  <option value="Chrysler">Chrysler</option>
                  <option value="Nissan">Nissan</option>
                  <option value="Dodge">Dodge</option>
                  <option value="Volkswagen">Volkswagen</option>
                  <option value="KIA">KIA</option>
                  <option value="Genesis">Genesis</option>
                  <option value="Volvo">Volvo</option>
                  <option value="Cadillac">Cadillac</option>
                  <option value="Alfa Romeo">Alfa Romeo</option>
                  <option value="Chevrolet">Chevrolet</option>
                  <option value="Otro">otro</option>


                </select>

              </div>

            </div>


            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-lock"></i></span>

                <input type="number" class="form-control input-lg" name="nuevoMotor" placeholder="Ingresar Motor" required>

              </div>

            </div>



            <?php

            $usuarios = ControladorUsuarios::ctrMostrarUsuarios(null, null);



            ?>

            <div class="form-group">

              <div class="input-group">

                <span class="input-group-addon"><i class="fa fa-users"></i></span>

                <select class="form-control input-lg" name="nuevoCliente">

                  <option value="0">Selecionar Cliente</option>
                  <?php

                  foreach ($usuarios as $Indice => $value)
                    echo '<option value="' . $value['id'] . '">' . $value['nombre'] . $value['usuario'] . '</option>';

                  ?>

                </select>

              </div>

            </div>



          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" name="btnCrearVehículo" class="btn btn-primary">Guardar vehículo</button>

        </div>
        <?php
        $vehiculo = new ControladorVehiculo();
        $vehiculo->ctrCrearVehiculo();
        ?>

      </form>

    </div>

  </div>

</div>