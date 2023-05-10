<?php

if (isset($_POST['btnMantenimiento'])) {

    $valor = $_POST['btnMantenimiento'];
    $Item = "id";


    $Vehiculo = ControladorVehiculo::ctrMostrarVehiculos($Item, $valor);

   // print_r($Vehiculo);

   
}else{
    $Vehiculo= null;

}


?>




<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Crear Mantenimiento
            <small>Crate</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> Home</a>
            </li>
            <li><a href="#">Forms</a></li>
            <li class="active">Crear Manteniminto</li>
        </ol>
    </section>

    <section class="content">

        <?php
        $respuesta = ControladorMantenimiento::ctrCrearMantenimiento();
        var_dump($respuesta);
        ?>
        <div class="box box-default">


            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <table class="table table-bordered table-striped dt-responsive">

                                <thead>

                                    <tr>

                                        <th>Placa</th>
                                        <th>Color</th>
                                        <th>Modelo</th>
                                        <th>Tipo Combustible</th>
                                        <th>Motor</th>
                                        <th>Marca</th>

                                    </tr>

                                </thead>

                                <tbody>


                                    <tr>
                                        <?php
                                        
                                        
                                         if($Vehiculo !== null) {
                                           
                                                                              
                                        foreach ($Vehiculo as $key => $value) { ?>


                                            <td><button class="btn btn-success btn-sm"><?php echo $value['placa'] ?></button></td>
                                            <td><button class="btn btn-primary btn-sm"><?php echo $value['color'] ?></button> </td>
                                            <td><button class="btn btn-danger btn-sm"><?php echo $value['modelo'] ?></button> </td>
                                            <td><button class="btn btn-dropbox btn-sm"><?php echo $value['tipo_combustible'] ?></button> </td>
                                            <td><button class="btn btn-google btn-sm"><?php echo $value['motor'] ?></button> </td>
                                            <td><button class="btn btn-dropbox btn-sm"><?php echo $value['marca'] ?></button> </td>



                                    </tr>
                                <?php }     }  
                                       ?>

                                </tbody>

                            </table>

                        </div>

                    </div>


                </div>
            </div>


        </div>
        <form action="" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header">
                            <h3 class="box-title">Seleccione el Tipo Mantenimiento</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Fecha</label>
                                <select class="form-control select2" style="width: 100%" name="TipoMantenimiento">

                                    <option selected="selected">Cambio de Aceite</option>
                                    <option>Revisión de Fibras</option>
                                    <option>Revisión de Filtros</option>
                                    <option>Revisión de Fugas</option>
                                    <option>Otros</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        <label>Fecha del Mantenimiento:</label>
                                    </div>
                                    <?php $Fecha = date("Y-m-d H:i:s"); ?>
                                    <input type="text" name="Fecha" class="form-control" value="<?php echo $Fecha ?>" />
                                </div>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                        <label>Fecha Proxima Revisión</label>
                                    </div>

                                    <input type="date" name="FechaProxima" class="form-control" value="" />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title">Detalles de Ingreso</h3>
                        </div>
                        <div class="box-body">

                            <div class="form-group">
                                <label>Kilometro Prximo Cambio</label>
                                <input type="number" class="form-control" name="kmProximo" placeholder="123456789" />
                            </div>

                            <div class="form-group">
                                <label>Oservaciones:</label>
                                <textarea name="ObservacionesIngreso" id="" cols="40" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Detalle del Manteniminto</h3>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Filtro de Aceite</label>
                                    <input type="text" class="form-control" name="FiltroAceite" placeholder="Ingrese el Descripción" />
                                </div>


                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Filtro de Aire</label>
                                        <input type="text" class="form-control" name="FiltroAire" placeholder="Ingrese el Numero de Serie" />
                                    </div>

                                    <div class="form-group">
                                        <div class="form-group">
                                            <label>Filtro de Combustible</label>
                                            <input type="text" class="form-control" name="FiltroCombustible" placeholder="Ingrese el Modelo" />
                                        </div>

                                        <div class="form-group">
                                            <div class="form-group">
                                                <label>Líquido de Frenos</label>
                                                
                                                <input type="text" class="form-control" name="LiquidoFrenos" placeholder="Ingrese el Modelo" />
                                            </div>


                                        </div>
                                    </div>

                                    <div class="box box-success">

                                        <div class="box-header">

                                            <h3 class="box-title">

                                                Seleccione Detalles adicionales
                                            </h3>

                                        </div>

                                        <div class="box-body">

                                            <div class="form-group col-md-4 ">

                                                <div class="form-group">

                                                <label>¿Exiten Fugas?</label>

                                                    <div class="input-group">

                                                        <span class="input-group-addon"><i class="fa  fa-wrench"></i></span>

                                                        <select class="form-control input-lg" name="fugas" required>

                                                            <option value="SI HAY FUGAS">SI</option>

                                                            <option value="NO HAY FUGAS">NO</option>


                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                            <div class="form-group col-md-4 ">

                                                <div class="form-group">

                                                <label>  ¿Refrigerante ?</label>

                                                    <div class="input-group">

                                                        <span class="input-group-addon"><i class="fa  fa-flask"></i></span>

                                                        <select class="form-control input-lg" name="refrigerante" required>

                                                            <option value="SE COLOCÓ REFREIGERANTE">SI</option>

                                                            <option value="NOSE COLOCÓ REFREIGERANTE">NO</option>


                                                        </select>

                                                    </div>

                                                </div>

                                            </div>
                                            <div class="form-group col-md-4 ">

                                                <div class="form-group">
                                                <label> Tornillo Carter ?</label>
                                                    <div class="input-group">

                                                    

                                                        <span class="input-group-addon"><i class="fa fa-wrench"></i></span>

                                                        <select class="form-control input-lg" name="tornillo_carter" required>

                                                            <option value="SE COLOCÓ TRONILLO CARTER">SI</option>

                                                            <option value="NOSE COLOCÓ TRONILLO CARTER">NO</option>


                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                           
                                        </div>

                                        <div class="form-group">

                                            <div class="form-group">

                                                <label>Técnico Encargado</label>

                                                <input type="text" class="form-control" value="<?php echo $_SESSION['nombre']; ?>" name=LiquidoFrenos" placeholder="<?php echo $_SESSION['nombre']; ?>" disabled />
                                            
                                            </div>

                                        </div>

                                        <div class="box-header">

                                            <div class="form-group">

                                                <button class="btn btn-primary btn-lg" type="submit" name="btnNuevoMantenimiento"><i class="fa fa-save"></i> Guargar Mantenimiento</button>
                                            </div>

                                        </div>

                                        <div class="box-header">
                                            <div class="form-group">

                                                <a href="vehiculos" class="btn btn-facebook btn-lg"><i class="fa fa-reply"></i> Regresar</a>
                                            
                                            </div>

                                        </div>

                                    </div>
                                </div>

                                <input type="text" name="IDvehiculo" value="<?php echo $valor  ?>">

                                <?php 
                                $manteniminto= new ControladorMantenimiento();
                                $manteniminto->ctrCrearMantenimiento();
                         
                                ?>

        </form>
    </section>
</div>