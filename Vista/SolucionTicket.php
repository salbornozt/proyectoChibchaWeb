<?php

session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoTicket.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoTicket::setConexionBD($conexion);

$cod_ticket=(int)$_GET["cod_ticket"];


if($_GET["value"]==1){
    $estado = ManejoTicket::modificarEstadoTicket($cod_ticket);
    header("Location: ../Vista/Empleado.php?menu=verTickets");
}
else{
    header("Location: ../Vista/Empleado.php?menu=verTickets.php");
    // hacer que el ticket vaya a otro empleado
}




?>