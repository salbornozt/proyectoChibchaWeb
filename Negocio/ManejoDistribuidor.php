<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DistribuidorDAO.php';
	

	class ManejoDistribuidor {
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarDistribuidor($cod_distribuidor){

            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->consult($cod_distribuidor);
            return $distribuidor;
        }


        public static function consultarCodDistribuidor($nom_distribuidor){

            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->consultarCod($nom_distribuidor);
            return $distribuidor;
        }

        /**
         * Create an distribuidor
         * @param Distribuidor distribuidor to create
         * @return void
         */
        public static function createDistribuidor($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->create($distribuidor);
        }

        /**
         * Modify an distribuidor
         * @param Distribuidor distribuidor to modify
         * @return void
         */
        public static function modifyDistribuidor($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->modify($distribuidor);
        }
        /**
         * Delete an distribuidor
         * @param Distribuidor distribuidor to modify
         * @return void
         */
        public static function deleteDistribuidor($distribuidor){
            $distribuidorDAO=DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidorDAO->delete($distribuidor);
        }

        /**
         * List of distribuidor
         * @return Distribuidor[] List of all the distribuidor in the Data Base
         */
        public  static function getList(){
            $distribuidorDAO = DistribuidorDAO::getDistribuidorDAO(self::$conexionBD);
            $distribuidor = $distribuidorDAO->getList();
            return $distribuidor;
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}