<?php



//error_reporting(E_ERROR);
//$root = "../";
require_once '../../conf/sesion.php';
require_once '../../conf/conf.php';
require_once '../../connection/conex.php';

//$_SESSION["clientId"] = 1;

$conex = WolfConex::conex();

//session_destroy();





if ( (!isset($_SESSION["clientId"]) || ( isset($_SESSION["clientId"]) && empty($_SESSION["clientId"]) ) ) || ( ( !isset($_SESSION["clientIsAdmin"]) || (isset($_SESSION["clientIsAdmin"]) && !$_SESSION["clientIsAdmin"]) ) ) ) {
//include_once '../../header_only.php';    
    ?> 

<?php } else {

    include_once './dashboard_1.php';
    
}