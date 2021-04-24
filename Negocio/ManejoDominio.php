<?php
    /**
     * Import classes
     */	

    
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
    require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DominioDAO.php';
	

	class ManejoDominio {
		
        /**
         * Atribute for the connection to  the database
         */
        private static $conexionBD;		

		function __construct(){
			
		}

        public static function consultarDominio($cod_dominio){

            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->consult($cod_dominio);
            return $dominio;
        }

        public static function consultarDominioPorUrl($url){

            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->consultarDominioPorUrl($url);
            return $dominio;
        }

        public static function modificarPlanDominio($dominio,$planPago){

            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->modificarPlanPago($dominio,$planPago);
            return $dominio;
        }

        public static function modificarCodPlanDominio($dominio,$planPago){

            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->modificarCodPago($dominio,$planPago);
            return $dominio;
        }

        public static function modificarCodDistDominio($dominio,$distribuidor){

            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->modificarDistribuidor($dominio,$distribuidor);
            return $dominio;
        }

        public static function modificarCodPackDominio($dominio,$paquete){

            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->modificarPaquete($dominio,$paquete);
            return $dominio;
        }

        /**
         * Create an domain
         * @param Dominio Dominio to create
         * @return void
         */
        public static function createDominio($dominio){
            $dominioDAO=DominioDAO::getDominioDAO(self::$conexionBD);
            $dominioDAO->create($dominio);
        }

        /**
         * Modify an domain
         * @param Dominio Dominio to modify
         * @return void
         */
        public static function modifyDominio($dominio){
            $dominioDAO=DominioDAO::getDominioDAO(self::$conexionBD);
            $dominioDAO->modify($dominio);
        }
        /**
         * Delete an domain
         * @param Dominio Dominio to modify
         * @return void
         */
        public static function deleteDominio($dominio){
            $dominioDAO=DominioDAO::getDominioDAO(self::$conexionBD);
            $dominioDAO->delete($dominio);
        }

        /**
         * List of Dominio
         * @return Dominio[] List of all the dominio in the Data Base
         */
        public  static function getList(){
            $dominioDAO = DominioDAO::getDominioDAO(self::$conexionBD);
            $dominio = $dominioDAO->getList();
        }

	    /**
	    * Change the conexion
	    */
	    public static function setConexionBD($conexionBD){
	                self::$conexionBD = $conexionBD;
	            }
	}
