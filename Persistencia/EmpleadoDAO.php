<?php

require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Negocio/Empleado.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/Util/Conexion.php';
require_once ($_SERVER["DOCUMENT_ROOT"]) . '/proyectoChibchaWeb/Persistencia/DAO.php';
/**
 *Represents the DAO of the employeer entity
 */
class EmpleadoDAO implements DAO
{

    /**
     * Reference to the connection with the database
     * @var Object
     */
    private $conexion;

    /**
     * Reference to an empleadoDAO object
     * @var empleadoDAO
     */
    private static $empleadoDAO;

    //------------------------------------------
    // Builder
    //------------------------------------------

    /**
     * Builder of the class
     *
     * @param Object $conexion
     */
    private function __construct($conexion)
    {
        #mysqli_set_charset($this->conexion, "utf8");
        $this->conexion = $conexion;
    }

    /**
     * Method to query an employeer by his code type
     *
     * @param int $cod_empleado
     * @return Empleado
     */
    public function consult($cod_empleado)
    {

        $sql = "SELECT * FROM EMPLEADO WHERE cod_empleado = " . $cod_empleado;

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $row = pg_fetch_array($resultado);


        $empleado = new Empleado();


        $empleado->setCod_empleado($row[0]);
        $empleado->setNom_empleado($row[1]);
        $empleado->setCedula_empleado($row[2]);
        $empleado->setCargo_empleado($row[3]);
        $empleado->setContraseña_empleado($row[4]);
        $empleado->setCorreo_empleado($row[5]);
        $empleado->setCantidad_tickets($row[6]);
        $empleado->setNivel_empleado($row[7]);
        $empleado->setCod_peticion($row[8]);
        $empleado->setCod_usuario($row[9]);

        return $empleado;
    }

    public function verificarCuenta($correo, $pass)
    {

        $sql =  "SELECT * from empleado WHERE correo_empleado = '" . $correo . "' and contraseña_empleado = '" . $pass . "'";

        if (!$resultado = pg_query($this->conexion, $sql)) die();
        $row = pg_fetch_array($resultado);
        if ($row[0] == null) {
            return null;
        }


        $empleado = new Empleado();

        $empleado->setCod_empleado($row[0]);
        $empleado->setNom_empleado($row[1]);
        $empleado->setCedula_empleado($row[2]);
        $empleado->setCargo_empleado($row[3]);
        $empleado->setContraseña_empleado($row[4]);
        $empleado->setCorreo_empleado($row[5]);
        $empleado->setCantidad_tickets($row[6]);
        $empleado->setNivel_empleado($row[7]);
        $empleado->setCod_peticion($row[8]);
        $empleado->setCod_usuario($row[9]);

        return $empleado;
    }

    /**
     * Method to create a new employeer
     *
     * @param Empleado $empleado
     * @return void
     */
    public function create($empleado)
    {
        $sql = "insert into EMPLEADO values (" . $empleado->getCod_empleado() . ",
                                            '" . $empleado->getNom_empleado() . "',
                                            " . $empleado->getCedula_empleado() . ",
                                            '" . $empleado->getCargo_empleado() . "',
                                            '" . $empleado->getContraseña_empleado() . "',
                                            '" . $empleado->getCorreo_empleado() . "',
                                            " . $empleado->getCantidad_tickets() . ",
                                            " . $empleado->getNivel_empleado() . ",
                                            " . $empleado->getCod_peticion() . ",
                                            " . $empleado->getCod_usuario() . "
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to create a new employeer
     *
     * @param Empleado $empleado
     * @return void
     */

    public function createEmpleado($empleado)
    {
        $sql = "insert into EMPLEADO(nom_empleado,cedula_empleado,cargo_empleado,contraseña_empleado,correo_empleado) 
                                     values ('" . $empleado->getNom_empleado() . "',
                                            " . $empleado->getCedula_empleado() . ",
                                            '" . $empleado->getCargo_empleado() . "',
                                            '" . $empleado->getContraseña_empleado() . "',
                                            '" . $empleado->getCorreo_empleado() . "'
                                        );";

        pg_query($this->conexion, $sql);
    }

    /**
     * Method to create a new employeer
     *
     * @param Empleado $empleado
     * @return void
     */

    public function createEmpleadoxAdmin($empleado)
    {
        $sql = "insert into EMPLEADO(nom_empleado,cedula_empleado,cargo_empleado,contraseña_empleado,correo_empleado,cantidad_de_tickets,nivel_empleado,cod_peticion,cod_usuario) 
                                     values ('" . $empleado->getNom_empleado() . "',
                                            " . $empleado->getCedula_empleado() . ",
                                            '" . $empleado->getCargo_empleado() . "',
                                            '" . $empleado->getContraseña_empleado() . "',
                                            '" . $empleado->getCorreo_empleado() . "',
                                            '" . $empleado->getCantidad_tickets() . "',
                                            " . $empleado->getNivel_empleado() . ",
                                            " . $empleado->getCod_peticion() . ",
                                            " . $empleado->getCod_usuario() . "
                                          
                                        );";

        pg_query($this->conexion, $sql);
    }
    /**
     * Method that modifies an employeer entered by parameter
     *
     * @param Empleado $empleado
     * @return void
     */
    public function modify($empleado)
    {

        $sql = "UPDATE EMPLEADO SET cod_empleado = " . $empleado->getCod_empleado() . ",
                                   nom_empleado = '" . $empleado->getNom_empleado() . "',
                                   cedula_empleado = " . $empleado->getCedula_empleado() . ",
                                   cargo_empleado = '" . $empleado->getCargo_empleado() . "',
                                   contraseña_empleado = '" . $empleado->getContraseña_empleado() . "',
                                   correo_empleado = '" . $empleado->getCorreo_empleado() . "',
                                   cantidad_de_tickets = " . $empleado->getCantidad_tickets() . ",
                                   nivel_empleado = " . $empleado->getNivel_empleado() . ",
                                   cod_peticion = " . $empleado->getCod_peticion() . ",
                                   cod_usuario = " . $empleado->getCod_usuario() . ",
                                   where cod_empleado = " . $empleado->getCod_empleado() . "
                                ;";
        pg_query($this->conexion, $sql);
    }

    /**
     * Method to delete a new employeer
     *
     * @param Empleado $empleado
     * @return void
     */

    public function delete($cod_empleado)
    {
        $sql = "DELETE FROM EMPLEADO WHERE cod_empleado = " . $cod_empleado;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to delete a new client
     *
     * @param Cliente $cliente
     * @return void
     */

    public function deleteCedulaE($cedula_empleado)
    {
        $sql = "DELETE FROM EMPLEADO WHERE cedula_empleado = " . $cedula_empleado;

        pg_query($this->conexion, $sql);
    }
    /**
     * Method to get an Empleado object
     *
     * @param Object $conexion
     * @return EmpleadoDAO
     */
    public function getList()
    {

        $sql = "SELECT * FROM EMPLEADO";

        if (!$resultado = pg_query($this->conexion, $sql)) die();

        $empleados = array();

        while ($row = pg_fetch_array($resultado)) {
            $empleado = new Empleado();
            $empleado->setCod_empleado($row[0]);
            $empleado->setNom_empleado($row[1]);
            $empleado->setCedula_empleado($row[2]);
            $empleado->setCargo_empleado($row[3]);
            $empleado->setContraseña_empleado($row[4]);
            $empleado->setCorreo_empleado($row[5]);
            $empleado->setCantidad_tickets($row[6]);
            $empleado->setNivel_empleado($row[7]);
            $empleado->setCod_peticion($row[8]);
            $empleado->setCod_usuario($row[9]);

            array_push($empleados, $empleado);
        }
        return $empleados;
    }



    /**
     * Gets the object of this class. In case it is null, create it
     *
     * @param Object $conexion
     * @return EmpleadoDAO
     */
    public static function getEmpleadoDAO($conexion)
    {
        if (self::$empleadoDAO == null) {
            self::$empleadoDAO = new EmpleadoDAO($conexion);
        }

        return self::$empleadoDAO;
    }
}
