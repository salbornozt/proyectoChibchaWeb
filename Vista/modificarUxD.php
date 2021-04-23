<?php
session_start();
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoPLanPago.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDominio.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoDistribuidor.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/ManejoPaquete.php';
$obj = new Conexion();
$conexion = $obj->conectarDB();

ManejoPLanPago::setConexionBD($conexion);
ManejoDominio::setConexionBD($conexion);
ManejoDistribuidor::setConexionBD($conexion);
ManejoPaquete::setConexionBD($conexion);


    $cod_planPago = ManejoPLanPago::consultarNomPlanPago($_POST['planpago']); 
    $cod_distribuidor = ManejoDistribuidor::consultarCodDistribuidor($_POST['distribuidor']); 
    $cod_paquete = ManejoPaquete::consultarCodPaquete($_POST['paquete']); 
    ManejoDominio::modificarCodPlanDominio($_POST['dominio'],$cod_planPago->getCod_planPago());   
    ManejoDominio::modificarCodDistDominio($_POST['dominio'],$cod_distribuidor->getCod_distribuidor());
    ManejoDominio::modificarCodPackDominio($_POST['dominio'],$cod_paquete->getCod_paquete() );
    header("location:../Vista/Empleado.php?menu=verUsuarios");
    
    
    

/*

echo '<script>
alert("Se modificado el plan de pago con exito");

       

</script>';*/