<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente::setConexionBD($conexion);

$cliente = ManejoCliente::getList();

?>

<div class="container-fluid">

                        <br>
                        <h3 class="mt-4">INFORMACIÓN CLIENTES</h3>
                        <br>
                        <!-- PANEL BOTONES -->
                        <ol class="breadcrumb mb-3">
                            <!--MODAL AGREGAR CLIENTE-->
                            <div class="modal fade" id="info">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/agregarCliente.php">
                            <table>
                                    <tr>
                                    <th>  <p> Nombre:</p> </th>
                                    <th><input type="text" name="nombre" id="nombre" required> </th>
                                    </tr>
                                    <tr>
                                    <th><p> Teléfono:</p></th>
                                    <th><input type="number" name="telefono" id="telefono" required></th>
                                    </tr>
                                    <tr>
                                    <th><p> Cédula:</p></th>
                                    <th><input type="number" name="cedula" id="cedula" required></th>
                                    </tr>
                                    <tr>
                                    <th><p> Correo:</p></th>
                                    <th><input type="email" name="correo" id="correo" required></th>
                                    </tr>
                                    <tr>
                                    <th>  <p> Contraseña:</p></th>
                                    <th><input type="password" name="contraseña"  id="contraseña" required> </th>
                                    </tr>
                                                                   
                            </table>
                                                                             
                            </center><br>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-success"  name='addAgregarCliente'>Enviar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                            </div></div></div></div>
                            <center>
                            </form>

                            <span class="btn btn-primary" data-toggle="modal" data-target="#info">Agregar cliente</span>
                            </center>
                            <!--FIN MODAL AGREGAR CLIENTE-->
                            <p>.                 .</p>

                             <!--MODAL ELIMINAR CLIENTE-->
                            <div class="modal fade" id="info2">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Que cliente desea eliminar?</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/eliminarCliente.php">
                            <table>
                                    <tr><th>  <p> Cédula: <select name="cedula_op">
                                           
                                                    <?php 
                                                    foreach($cliente as $c){
                                                     echo'
                                                        <option>'.$c->getCedula_cliente().'</option>';
                                                    }?>
                                                    
                                    </select> </p> </th></tr>
                            </table>
                            </center><br>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"  name='addEliminarCliente'>Eliminar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                            </div></div></div></div>
                            <center>
                            </form>

                            <span class="btn btn-danger" data-toggle="modal" data-target="#info2">Eliminar cliente</span>
                            </center>
                            <!--FIN MODAL ELIMINAR CLIENTE-->
                        </ol>
                         <!-- FIN PANEL BOTONES -->


                    <!-- TABLA CLIENTES -->
                    <div class="card mb-4">       
                         
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                TABLA CLIENTES
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Cédula</th>
                                                <th>Contraseña</th>
                                                <th>Correo</th>
                                                <th>Estado</th>
                                                
                                               
                                            </tr>
                                        </thead>
                                        <tfoot >
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Cédula</th>
                                                <th>Contraseña</th>
                                                <th>Correo</th>
                                                <th>Estado</th>
                                               
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody style="color:#000000">
                                        <?php 

                                        foreach($cliente as $c){

                                            echo'
                                            <tr>
                                            <td>'.$c->getNom_cliente().'</td>
                                            <td>'.$c->getTelefono_cliente().'</td>
                                            <td>'.$c->getCedula_cliente().'</td>
                                            <td>'.$c->getContraseña_cliente().'</td>
                                            <td>'.$c->getCorreo_cliente().'</td>
                                            <td><span class="btn btn-info" data-toggle="modal" data-target="#info"><i class="far fa-check-circle"></i></span></td>
                                               
                                           
                                            </tr>';

                                        }
                                        ?>
                                           
                                       </tbody>
                                    </table>
                                </div>
                            </div>
                    <!-- TERMINA TABLA CLIENTES -->
                    </div>
</div>