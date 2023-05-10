<?php

if (isset($_POST['btnModificarVehiculo'])) {

    $valor = $_POST['btnModificarVehiculo'];
    $Item = "id";


    $Vehiculo = ControladorVehiculo::ctrMostrarVehiculos($Item, $valor);
}if( $valor = "" || empty($valor) || $valor===null  ){

    $Vehiculo=[];
    
}
?>

<div class="content-wrapper">

    <section class="content-header">

        <h1>

            Administrar ventas

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>

            <li class="active">Administrar ventas</li>

        </ol>

    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Editar Vehiculo</h3>

                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                </div>
            </div>
            <div class="box-body">


                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Editar Vehículo</h3>
                        </div>
                       


                            <form action="" method="post">
                            <?php
                        foreach ($Vehiculo as $key => $value) { ?>
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="">Placa</label>
                                        <input type="text" class="form-control" name="editarPlaca" value="<?php echo $value['placa'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Color</label>

                                        <select class="form-control input-lg" name="editarColor">

                                            <option value="<?php echo $value['color'] ?>"><?php echo $value['color'] ?></option>

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
                                    <div class="form-group">
                                        <label for="">Modelo</label>
                                        <input type="text" class="form-control" name="editarModelo" value="<?php echo $value['modelo'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Estilo</label>
                                        <select class="form-control input-lg" name="editarEStilo">

                                            <option value="<?php echo $value['estilo'] ?>"><?php echo $value['estilo'] ?></option>

                                            <option value="Sedan">Sedan</option>

                                            <option value="Todo Terreno 4x2">Todo Terreno 4x2</option>

                                            <option value="Gris">Todo Terreno 4x4</option>

                                            <option value="Pick Up">Pick Up</option>

                                            <option value="Motocicleta">Motocicleta</option>

                                            <option value="Otro">Otro</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo Combustible</label>


                                        <select class="form-control input-lg" name="editarTCombustible">

                                            <option value="<?php echo $value['tipo_combustible'] ?>"><?php echo $value['tipo_combustible'] ?></option>

                                            <option value="Gasolina">Gasolina</option>

                                            <option value="Diesel">Diesel</option>

                                            <option value="Otro">Otro</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Motor</label>
                                        <input type="text" class="form-control" name="editarMotor" value="<?php echo $value['motor'] ?>" />
                                    </div>
                                    <div class="form-group">
                                        <label for="">Estilo</label>



                                        <select class="form-control input-lg" name="editarEstilo">

                                            <option value="<?php echo $value['estilo'] ?>"><?php echo $value['estilo'] ?></option>

                                            <option value="Sedan">Sedan</option>

                                            <option value="Todo Terreno 4x2">Todo Terreno 4x2</option>

                                            <option value="Gris">Todo Terreno 4x4</option>

                                            <option value="Pick Up">Pick Up</option>

                                            <option value="Motocicleta">Motocicleta</option>

                                            <option value="Otro">Otro</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Marca</label>
                                        <select class="form-control input-lg" name="editarMarca">

                                            <option value="<?php echo $value['marca'] ?>"><?php echo $value['marca'] ?></option>
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
                                    <div class="form-group">
                                        <label for="">Estado</label>

                                        <?php
                                        if ($value['estado'] == 1) {
                                            echo '<button class="btn btn-success btn-xs btnActivar">Activado</button>';
                                        } else {
                                            echo '<button class="btn btn-success btn-xs btnActivar">Desactivado</button>';
                                        }


                                        ?>

                                    </div>
                                </div>

                                <input type="text" value="<?php echo $value['id']?>" name="IdVehiculo" id="">
                                <?php } ?>
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

                                    <button type="submit" name="btnEditarVehículo"  class="btn btn-primary">Guardar vehículo</button>

                                </div>
                                <?php
                                $vehiculo = new ControladorVehiculo();
                                $vehiculo->ctrEditarVehiculo();
                                ?>



                            </form>

                     
                    </div>
                </div>

            </div>
            <!-- /.box-body -->
            <div class="box-footer">
                Actualizar Vehículo
            </div>
            <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->