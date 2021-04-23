<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);

$empleado = ManejoEmpleado::getList();

?>

<div class="container-fluid">

                        <br>
                        <h3 class="mt-4">INFORMACIÓN EMPLEADO</h3>
                        <br>
                        <!-- PANEL BOTONES -->
                        <ol class="breadcrumb mb-3">
                            <!--MODAL AGREGAR EMPLEADO-->
                            <div class="modal fade" id="info">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/agregarEmpleado.php">
                            <table>
                                    <tr>
                                    <th>  <p> Nombre: </p> </th>
                                    <th> <input type="text" name="nombre"  required> </th>
                                    </tr>
                                    <tr>
                                    <th>  <p> Cédula:  </p> </th>
                                    <th> <input type="number" name="cedula"  required> </th>
                                    </tr>
                                    <tr><th>  <p> Cargo:  </p>  </th>
                                    <th> <input type="text" name="cargo"  required> </th>
                                    </tr>
                                    <tr><th>  <p> Contraseña:  </p>  </th>
                                    <th> <input type="password" name="contrasena"  required> </th>
                                    </tr>
                                    <tr><th>  <p> Correo: </p> </th>
                                    <th>  <input type="email" name="correo"  required></th>
                                    </tr>
                                    <tr>
                                    <th>  <p> Nivel:</p> </th>
                                    <th><select name="nivel">
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                    </select>  </th></tr>
                                   
                            </table>
                            </center><br>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  name="addAgregarEmpleado">Enviar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                            </div></div></div></div>
                            <center>
                            </form>
                           
                            <span class="btn btn-primary" data-toggle="modal" data-target="#info">Agregar empleado</span>
                            </center>
                            <!--FIN MODAL AGREGAR EMPLEADO-->
                            <p>.                 .</p>

                             <!--MODAL ELIMINAR EMPLEADO-->
                            <div class="modal fade" id="info2">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Que empleado desea eliminar?</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/eliminarEmpleado.php">
                            <table>
                            <tr><th>  <p> Cédula: <select name="cedula_op">
                                           
                                           <?php 
                                           foreach($empleado as $e){
                                            echo'
                                               <option>'.$e->getCedula_empleado().'</option>';
                                           }?>
                                           
                           </select> </p> </th></tr>
                            </table>
                            
                            </center><br>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"  name='addEliminarEmpleado'>Eliminar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                            </div></div></div></div>
                            <center>
                            </form>

                            <span class="btn btn-danger" data-toggle="modal" data-target="#info2">Eliminar empleado</span>
                            </center>
                            <!--FIN MODAL ELIMINAR EMPLEADO-->
                        </ol>
                         <!-- FIN PANEL BOTONES -->


                    <!-- TABLA EMPLEADO -->
                    <div class="card mb-4">       
                         
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                TABLA EMPLEADO
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                
                                                <th>Nombre</th>
                                                <th>Cedula</th>
                                                <th>Cargo</th>
                                                <th>Contraseña</th>
                                                <th>Correo</th>
                                                <th>Tickets</th>
                                                <th>Nivel</th>
                                                <th>cod_peticion</th>
                                                <th>cod_usuario</th>
                                                                                      
                                              
                                            </tr>
                                        </thead>
                                        <tfoot >
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Cedula</th>
                                                <th>Cargo</th>
                                                <th>Contraseña</th>
                                                <th>Correo</th>
                                                <th>Tickets</th>
                                                <th>Nivel</th>
                                                <th>cod_peticion</th>
                                                <th>cod_usuario</th>
                                              
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody style="color:#000000">
                                        <?php 
                                        foreach($empleado as $e){

                                            echo'
                                            <tr>

                                            <td>'.$e->getNom_empleado().'</td>
                                            <td>'.$e->getCedula_empleado().'</td>
                                            <td>'.$e->getCargo_empleado().'</td>
                                            <td>'.$e->getContraseña_empleado().'</td>
                                            <td>'.$e->getCorreo_empleado().'</td>
                                            <td>'.$e->getCantidad_tickets().'</td>
                                            <td>'.$e->getNivel_empleado().'</td>
                                            <td>'.$e->getCod_peticion().'</td>
                                            <td>'.$e->getCod_usuario().'</td>
                                           
                                           
                                            </tr>';

                                        }
                                        ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    <!-- TERMINA TABLA EMPLEADO -->
                    </div>
</div>