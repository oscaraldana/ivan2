<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once "../../autoload/clases.php";

/*define("USER_DB", "dbo756628791");
define("PASWD_DB", "L@cambie1");
define("HOST_DB", "db756628791.db.1and1.com");
define("PORT_DB", "3306");
define("NAME_DB", "db756628791");
*/
define("USER_DB", "root");
define("PASWD_DB", "");
define("HOST_DB", "localhost");
define("PORT_DB", "3306");
define("NAME_DB", "wolves2");

define("PAGINA_ESTATICA_REDIRECCION_ERROR_BD", "../error_db.php");

define ( "COMISION_RETIRO", 5 );
define ( "CORREO_ADMIN", 'faires1015@gmail.com' );


if(isset($_SESSION['lang'])){
    // si es true, se crea el require y la variable lang
    $lang = $_SESSION["lang"];
    require_once '../../lang/'.$lang.".php";
    // si no hay sesion por default se carga el lenguaje espanol
}else{
	require "../../lang/es.php";
}