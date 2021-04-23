<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Cliente.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoCliente.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoCliente::setConexionBD($conexion);


if (isset($_POST['addEliminarCliente']) == true) {


	$nroIdentificacion = isset($_POST['cedula_op']) ? $_POST['cedula_op'] : null;

    ManejoCliente::deleteCedula($nroIdentificacion);


}

echo '<script>
alert("Se elimino el usuario con cedula '.$nroIdentificacion.'");
window.location="../Admin.php?menu=cliente";        

</script>';


