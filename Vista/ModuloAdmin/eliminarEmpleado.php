<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoEmpleado.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoEmpleado::setConexionBD($conexion);


if (isset($_POST['addEliminarEmpleado']) == true) {


	$nroIdentificacion = isset($_POST['cedula_op']) ? $_POST['cedula_op'] : null;

    ManejoEmpleado::deleteCedulaE($nroIdentificacion);


}

echo '<script>
alert("Se elimino el usuario con cedula '.$nroIdentificacion.'");
window.location="../Admin.php?menu=empleado";        

</script>';

