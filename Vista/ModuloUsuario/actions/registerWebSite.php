<?php

session_start();
if($_SESSION['cod_cliente']==null)
{
    header("Location: ../index.php");
}
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/SitioWeb.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoSitioWeb.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();


$cod_distribuidor = "{$_SESSION['distri']}";
$cod_cliente = "{$_SESSION['cod_cliente']}";

//ManejoDistribuidor::setConexionBD($conexion);
//$lista = ManejoDistribuidor::consultarTicketCodigoEmpleado(1);
//$lista = ManejoDistribuidor::getList();
//$prueba1 = ManejoDistribuidor::consultarTicket(2);

?>