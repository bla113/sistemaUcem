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


            <div class="box-body">

                <div class="row">

                    <div class="col-md-4">

                        <div class="box box-primary">

                            <div class="box-header with-border">

                                <h3 class="box-title">Validación de Identificación</h3>

                            </div>

                            <form role="form" method="POST">

                                <div class="box-body">


                                    <!-- ENTRADA PARA EL USUARIO -->

                                    <div class="form-group">

                                        <div class="input-group">

                                            <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                            <input type="text" class="form-control input-lg" name="buscarIdentificacion" id="buscarIdentificacion" placeholder="Ingrese el numero de Identificación" required>

                                        </div>


                                        <div class="input-group" id="Error1">

                                        </div>

                                    </div>


                                </div>

                                <!-- /.box-body -->



                                <div class="box-footer" id="btnBuscar">


                                    <button type="submit" name="BTNBUSCARCEDULA" class="btn btn-primary">Buscar Identificación</button>
                                </div>

                                <?php
                                $BuscarIdentificcaion = new ControladorEstudiante();
                                $BuscarIdentificcaion->ctrBuscarEstudiante();

                                ?>

                            </form>


                        </div>

                    </div>


                    <?php
                    $Estudiante = ControladorEstudiante::ctrBuscarEstudiante();
                    /// print_r($Estudiante);
                    $estudiante1 = ControladorEstudiante::ctrCrearEstudiante(null, null);
                    //print_r($estudiante1);
                    if ($Estudiante) {


                        foreach ($Estudiante as $estudiante) { ?>


                            <!-- INICIO DEL FORMULARIO -->
                            <form action="" method="post" enctype="multipart/form-data">

                                <div class="col-md-4">

                                    <div class="box box-success">

                                        <div class="box-header with-border">

                                            <h3 class="box-title">Formulario de Nuevo Ingreso</h3>

                                        </div>

                                        <div class="box-body">

                                            <!-- ENTRADA PARA LA IDENTIFIACION -->

                                            <div class="form-group">

                                                <label>Identificación</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-id-card"></i></span>

                                                    <input type="text" class="form-control input-lg" value="<?php echo $estudiante['IDENTIFICACION'] ?>" name="nuevaIdentifiacion" placeholder="Identificación" required>
                                                    <input type="hidden" value="1" name="nuevoTipoIentificacion">
                                                </div>

                                            </div>

                                            <!-- ENTRADA PARA NOMBRE-->

                                            <div class="form-group">

                                                <label>Nombre Completo</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>

                                                    <input type="text" class="form-control input-lg" value="<?php echo $estudiante['NOMBRE_COMPLETO'] ?>" name="nuevoNombre" placeholder="Nombre Completo" required>

                                                </div>

                                            </div>

                                            <!-- PRIMER APELLIDO-->

                                            <div class="form-group">

                                                <label>Primer Apellido</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-user""></i></span>
    
                                        <input type=" text" class="form-control input-lg" value="<?php echo $estudiante['PRIMER_APELLIDO'] ?>" name="nuevoApellido1" placeholder="Primer Apellido" required>

                                                </div>

                                            </div>
                                            <!-- PRIMER SEGUNDO APELLIDO-->

                                            <div class="form-group">

                                                <label>Segundo Apellido</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-user""></i></span>
    
                                             <input type=" text" class="form-control input-lg" value="<?php echo $estudiante['SEGUNDO_APELLIDO'] ?>" name="nuevoApellido2" placeholder="Segundo Apellido" required>

                                                </div>

                                            </div>

                                            <!-- ENTRADA PARA SELECCIONAR PROVINCIA -->

                                            <div class="form-group">

                                                <label>Provincia</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                                    <select id="slt-provincias" class="form-control input-lg" name="nuevaProvincia">

                                                        <option value="">-- Seleccione una provincia --</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <!-- ENTRADA PARA SELECCIONAR CANTON -->

                                            <div class="form-group">

                                                <label>Cantón</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                                    <select id="slt-cantones" class="form-control input-lg" name="nuevoCanton">

                                                        <option value="">-- Seleccione un cantón --</option>

                                                    </select>

                                                </div>

                                            </div>
                                            <!-- ENTRADA PARA SELECCIONAR DISTRITO -->

                                            <div class="form-group">

                                                <label>Ditrito</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home"></i></span>

                                                    <select id="slt-distritos" class="form-control input-lg" name="nuevoDistrito">

                                                        <option value="">-- Seleccione un distrito --</option>

                                                    </select>

                                                </div>

                                            </div>

                                            <!-- OTRAS SEÑAS-->

                                            <div class="form-group">

                                                <label>Otras Señas</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-home""></i></span>
    
                                                  <input type=" text" class="form-control input-lg" id="otrasSenas" name="otrasSenas" placeholder="Otras Señas">

                                                </div>

                                            </div>

                                            <!-- OTRAS TELEFONO-->

                                            <div class="form-group">

                                                <label>Teléfono Fijo</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-phone""></i></span>
    
                                                  <input type=" text" class="form-control input-lg" name="nuevoTelefono" placeholder="Telefono de Trabajo/ Habitación" required>

                                                </div>

                                            </div>

                                            <!-- OTRAS CELULAR-->

                                            <div class="form-group">

                                                <label>Teléfono Celular</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-phone""></i></span>
    
                                                    <input type=" text" class="form-control input-lg" name="nuevoCelular" placeholder="Número de Celular" required>

                                                </div>

                                            </div>

                                            <!-- FECHA DE NACIMIENTO-->

                                            <div class="form-group">
                                                <label>Fecha de Nacimiento</label>

                                                <div class="input-group">



                                                    <span class="input-group-addon"><i class="fa fa-birthday-cake""></i></span>
    
                                                     <input type="date" class="form-control input-lg" name="nuevofNacimiento" placeholder="Ingrese la fecha de Nacimiento" required>

                                                </div>

                                            </div>



                                            <!-- ENTRADA PARA ESTADO CIVIL -->

                                            <div class="form-group">

                                                <label>Estado Civil</label>

                                                <div class="input-group">

                                                    <span class="input-group-addon"><i class="fa fa-legal"></i></span>

                                                    <select class="form-control input-lg" name="nuevoEstadoCivil" required>

                                                        <option value="">Selecionar Estado Civil</option>

                                                        <option value="Soltero">Soltero</option>

                                                        <option value="Casado">Casado</option>

                                                        <option value="Divorciado">Divorciado</option>

                                                        <option value="Unión Libre">Unión Libre</option>

                                                    </select>

                                                </div>

                                            </div>



                                        </div>


                                    </div>

                                </div>




                                <div class="col-md-4 ">

                                    <div class="box box-primary">

                                        <div class="box-header with-border">

                                            <h2 class="box-title">Datos Adicionales</h2>

                                        </div>



                                        <!-- LABORA-->




                                        <div class="form-group">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                                <select class="form-control input-lg" name="nuevoTrabajo" required>

                                                    <option value="">¿Trabaja actualmente?</option>

                                                    <option value="SI">Si</option>

                                                    <option value="NO">No</option>

                                                    <option value="OTRO">OTRO</option>


                                                </select>

                                            </div>

                                        </div>

                                        <hr>
                                        <div class="form-group">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                                <select class="form-control input-lg" name="nuevaCarrera" required>

                                                <option value="">Selccione la Carrera</option>

                                                    <?php 
                                                    $carreraras=ControladorCarrera::ctrMostrarCarrera(null,null);
                                                    foreach ($carreraras as $carrerara) {

                                                     echo '<option value="'.$carrerara['ID_CARRERA'].'">'.$carrerara['NOM_CARRERA'].'</option>';  
                                                }
                                                    
                                                ?>
                                                   

                                                </select>

                                            </div>

                                        </div>

                                        <div class="form-group">

                                            <div class="input-group">

                                                <span class="input-group-addon"><i class="fa fa-graduation-cap"></i></span>

                                                <select class="form-control input-lg" name="procedeExtudante" required>

                                                    <option value="">¿De donde proveine?</option>

                                                    <option value="Academico">Academico</option>

                                                    <option value="Tecnico por Madurez">Tecnico por Madurez</option>

                                                    <option value="Otro">Otro</option>

                                                </select>

                                            </div>

                                        </div>




                                        <!-- ENTRADA PARA ESTADO CIVIL -->



                                        <div class="box-body">


                                            <!-- ENTRADA PARA SUBIR FOTO -->

                                            <div class="form-group">

                                                <div class="panel">SUBIR FOTO</div>

                                                <input type="file" class="nuevaFoto" name="nuevaFotoEstudiante">

                                                <p class="help-block">Peso máximo de la foto 2MB</p>

                                                <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">



                                            </div>


                                        </div>

                                        <!-- /.box-body -->



                                        <div class="box-footer">

                                            <button type="submit" name="btnGuardarEstudiante" class="btn btn-primary btn-lg">Guardar Estudiante</button>

                                        </div>
                                        <?php
                                        $crearEstudiante = new ControladorEstudiante();
                                        $crearEstudiante->ctrCrearEstudiante();
                                        ?>

                            </form>
                            <!-- FIN DEL FORMULARIO -->

                    <?php  }
                    }
                    ?>









                </div>

            </div>

        </div>


</div>

</section>

</div>