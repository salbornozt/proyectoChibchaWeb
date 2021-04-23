<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Distribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoDistribuidor::setConexionBD($conexion);

$distribuidor = ManejoDistribuidor::getList();

?>
<div class="container-fluid">

                        <br>
                        <h3 class="mt-4">INFORMACIÓN DISTRIBUIDOR</h3>
                        <br>
                        <!-- PANEL BOTONES -->
                        <ol class="breadcrumb mb-3">
                            <!--MODAL AGREGAR DISTRIBUIDOR-->
                            <div class="modal fade" id="info">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ingresar datos</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/agregarDistribuidor.php">
                            <table>
                                    <tr><th>  <p> Nombre:  </p> </th>
                                    <th><input type="text" name="nombre"  required></th>
                                    </tr>
                                    <tr><th>  <p> Correo:  </p> </th>
                                    <th><input type="email" name="correo"  required> </th>
                                    </tr>
                                    <tr><th>  <p> Categoria:</p> </th>
                                    <th> <select name="categoria">
                                                    <option>Premium</option>
                                                    <option>Básico</option>
                                                    
                                    </select> </th></tr>
                                    </table>
                                                                             
                                    </center><br>
                                <div class="modal-footer">
                                <button type="submit" class="btn btn-success"  name='addAgregarDistribuidor'>Enviar</button>
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                                </div>
                                </div></div></div></div>
                                <center>
                                </form>
                                                 
                                <span class="btn btn-primary" data-toggle="modal" data-target="#info">Agregar distribuidor</span>
                                </center>
                            <!--FIN MODAL AGREGAR DISTRIBUIDOR-->
                            <p>.                 .</p>

                             <!--MODAL ELIMINAR DISTRIBUIDOR-->
                            <div class="modal fade" id="info2">
                            <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">¿Que distribuidor desea eliminar?</h5>
                            </div>
                            <div class="modal-body"> 
                            <center>
                            <form method="post" action="ModuloAdmin/eliminarDistribuidor.php">
                            <table>
                                    <tr><th>  <p> ID: <select name="id_di">
                                           
                                                    <?php 
                                                    foreach($distribuidor as $c){
                                                     echo'
                                                        <option>'.$c->getCod_distribuidor().'</option>';
                                                    }?>
                                                    
                                    </select> </p> </th></tr>
                            </table>
                            </center><br>
                            <div class="modal-footer">
                            <button type="submit" class="btn btn-danger"  name='addEliminarDistribuidor'>Eliminar</button>
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
                            </div>
                            </div></div></div></div>
                            <center>
                            </form>

                            <span class="btn btn-danger" data-toggle="modal" data-target="#info2">Eliminar distribuidor</span>
                            </center>
                            <!--FIN MODAL ELIMINAR DISTRIBUIDOR-->
                        </ol>
                         <!-- FIN PANEL BOTONES -->


                    <!-- TABLA DISTRIBUIDOR -->
                    <div class="card mb-4">       
                         
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                TABLA DISTRIBUIDOR
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Categoria</th>
                                                                                      
                                              
                                            </tr>
                                        </thead>
                                        <tfoot >
                                            <tr>
                                                <th>ID</th>
                                                <th>Nombre</th>
                                                <th>Correo</th>
                                                <th>Categoria</th>
                                              
                                            </tr>
                                        </tfoot>
                                        
                                        <tbody style="color:#000000">
                                        <?php 
                                        foreach($distribuidor as $d){

                                            echo'
                                            <tr>
                                            <td>'.$d->getCod_distribuidor().'</td>
                                            <td>'.$d->getNom_distribuidor().'</td>
                                            <td>'.$d->getCorreo_distribuidor().'</td>
                                            <td>'.$d->getNom_categoria_distribuidor().'</td>
                                           
                                            </tr>';

                                        }
                                        ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                    <!-- TERMINA TABLA DISTRIBUIDOR -->
                    </div>
</div>