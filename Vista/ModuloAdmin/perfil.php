<?php
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';

$obj = new Conexion();
$conexion = $obj->conectarDB();

/*ManejoCliente::setConexionBD($conexion);

$cliente = ManejoCliente::getList();
$cliente2 = ManejoCliente::getListActivar();
$cliente3 = ManejoCliente::getListDesactivar();*/

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
                  <input type="text" name="nombreApellido" class="form-control" id="nombreApellido" placeholder="Nombres y apellidos" value="" readonly>
                  <p><br></p>
                </div>
                <div class="col-lg-3">
                  <p p class="entry-meta">Correo eléctronico:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="correo" class="form-control" id="correo" placeholder="Correo electrónico" value="" readonly>
                </div>
                <div class="col-lg-3">
                  <p class="entry-meta">Contraseña:</p>
                </div>
                <div class="col-lg-3">
                  <input type="text" name="contraseña" class="form-control" id="name" placeholder="Contraseña" value="pepe" readonly>
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
