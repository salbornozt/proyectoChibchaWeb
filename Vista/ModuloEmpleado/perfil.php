<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);

$empleado = ManejoEmpleado::consultarEmpleado($_SESSION['cod_empleado']);
//$cliente = ManejoCliente::getList();
//$cliente2 = ManejoCliente::getListActivar();
//$cliente3 = ManejoCliente::getListDesactivar();*/

?>
<div class="container" data-aos="fade-up">
<div class="row">
<div class="col-lg-12 entries">
<BR>
<BR>

<article class="entry">
            <h2 class="entry-title">
            <img src="Anyar/assets/img/logo_cliente.png" alt="" class="img-fluid">
            <a>Mis Datos Personales </a>
            </h2>
<BR>

<div class="entry-content">
<div class="col-lg-12">
        <div class="row">
                <div class="col-lg-3">
                  <p class="entry-meta">Nombre y Apellidos:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="nombreApellido" class="form-control" id="nombreApellido" placeholder="Nombres y apellidos" value="<?php echo $empleado->getNom_empleado()?>" readonly>
                  <p><br></p>
                </div>
                <div class="col-lg-3">
                  <p p class="entry-meta">Número de indentificación:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="nroIdentificacion" class="form-control" id="nroIdentificacion" value="<?php echo $empleado->getCedula_empleado()?>" readonly>
                </div>
                <div class="col-lg-3">
                  <p p class="entry-meta">Cargo:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="telefono" class="form-control" id="telefono" placeholder="Teléfonos" value="<?php echo $empleado->getCargo_empleado()?>" readonly>
                  <p><br></p>
                </div>
                <div class="col-lg-3">
                  <p p class="entry-meta">Correo eléctronico:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo electrónico" value="<?php echo $empleado->getCorreo_empleado()?>" readonly>
                </div>
                <div class="col-lg-3">
                  <p class="entry-meta">Nivel:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="contraseña" class="form-control" id="name" placeholder="Contraseña" value="<?php echo $empleado->getNivel_empleado()?>" readonly>
                </div>
                
        </div>
</div>
</div>
<br>
<center>
<button type="submit" class="btn btn-success"  name='addAgregarCliente'>EDITAR PERFIL</button>
</center>
</article>
<br>


</div>
</div>

</div>
