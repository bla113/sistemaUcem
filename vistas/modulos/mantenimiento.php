<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar Mantenimiento
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar Mantenimiento</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">
 
      <div class="box-header with-border">
  
        <a href="vehiculos" class="btn btn-primary" >
          
          Agregar Mantenimiento
        </a>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
        <thead>
         
         <tr>
           
           <th style="width:50px">Tecnico Encargado</th>
           <th>Placa</th>
           <th>Fecha</th>
           <th>Tipo Mantenimiento</th>
           <th>KM Proxima Revisión</th>
           <th>Fecha Proxima Revisión</th>
           <th>Acciones</th>

         </tr> 

        </thead>

        <tbody>

        <?php
        $item=null;
        $valor=null;
        $mantenimiento=ControladorMantenimiento::ctrMostrarMantenimiento($item,$valor)
        ?>
          <?php 
          foreach ($mantenimiento as $key => $value) {?>
          <tr>
            <td><?php echo $value['nombre'] ?></td>
            <td><?php echo $value['placa'] ?></td>
            <td><?php echo $value['fecha'] ?></td>
            <td><?php echo $value['tipo_mantenimiento'] ?></td> 
            <td><?php echo $value['km_proxima_revision'] ?></td>
            <td><?php echo $value['fecha_proxima_revision'] ?></td>
            <td>
            
              <div class="btn-group">
                  
                <button class="btn btn-warning" value="<?php echo $value['id'] ?>"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger" value="<?php echo $value['id'] ?>"><i class="fa fa-times"></i></button>
                
                <a  href="vistas/modulos/detalle-mantenimiento.php?idMante=<?php echo $value['id']?>" class="btn btn-dropbox" ><i class="fa fa-eye"></i></a>
              
                <button class="btn btn-info" value="<?php echo $value['id'] ?>"><i class="fa fa-download"></i></button>

                <button class="btn btn-warning" value="<?php echo $value['id'] ?>"><i class="fa fa-envelope-o"></i></button>

                <button class="btn btn-instagram" value="<?php echo $value['id'] ?>"><i class="fa  fa-send"></i></button>

                

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

<div id="modalAgregarUsuario" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post" enctype="multipart/form-data">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Agregar usuario</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA EL NOMBRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoNombre" placeholder="Ingresar nombre" required>

              </div>

            </div>

            <!-- ENTRADA PARA EL USUARIO -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-key"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoUsuario" placeholder="Ingresar usuario" required>

              </div>

            </div>

            <!-- ENTRADA PARA LA CONTRASEÑA -->

             <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-lock"></i></span> 

                <input type="password" class="form-control input-lg" name="nuevoPassword" placeholder="Ingresar contraseña" required>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR SU PERFIL -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-users"></i></span> 

                <select class="form-control input-lg" name="nuevoPerfil">
                  
                  <option value="">Selecionar perfil</option>

                  <option value="Administrador">Administrador</option>

                  <option value="Especial">Especial</option>

                  <option value="Vendedor">Vendedor</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SUBIR FOTO -->

             <div class="form-group">
              
              <div class="panel">SUBIR FOTO</div>

              <input type="file" id="nuevaFoto" name="nuevaFoto">

              <p class="help-block">Peso máximo de la foto 200 MB</p>

              <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="100px">

            </div>

          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar usuario</button>

        </div>

      </form>

    </div>

  </div>

</div>


