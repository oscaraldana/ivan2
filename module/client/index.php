<?php



//error_reporting(E_ERROR);
//$root = "../";
require_once '../../conf/sesion.php';
require_once '../../conf/conf.php';
require_once '../../connection/conex.php';

//$_SESSION["clientId"] = 1;

$conex = WolfConex::conex();

//session_destroy();


?>

<?php 

if ( !isset($_SESSION["clientId"]) || ( isset($_SESSION["clientId"]) && empty($_SESSION["clientId"]) ) ) {
//include_once '../../header_only.php';    
    ?> <!DOCTYPE html>
<html lang="en">
<head>
	<title>Ingresar a mi cuenta</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/bg-01.jpg);">
                                    	<!--<span class="login100-form-title-1">
						Ingresar a mi cuenta
					</span>-->
                                    
				</div>
<span style="float: right; margin-right: 20px;"><a href="../" class="txt1">Regresar</a></span>
				<form class="login100-form validate-form" onsubmit="login(); return false;">
					<div class="wrap-input100 validate-input m-b-26" data-validate="Nombre de usuario es requerido">
						<span class="label-input100">Usuario:</span>
						<input class="input100" type="text" name="user_login" id="user_login" placeholder="Nombre de usuario">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Contraseña es requerida">
						<span class="label-input100">Contraseña</span>
						<input class="input100" type="password" name="pass_login" id="pass_login" placeholder="Contraseña">
						<span class="focus-input100"></span>
					</div>

					<div class="flex-sb-m w-full p-b-30">
						<div class="contact100-form-checkbox">
                                                    <a href="javascript:;" onclick="formOlvidoClave();" class="txt1">
								Olvide mi contraseña
							</a>
						</div>

						<div>
                                                    <a href="javascript:;" onclick="registro();" class="txt1">
								Registrarme
							</a>
						</div>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn">
							Entrar
						</button>
                                            
					</div>
                                    
				</form>
                            
			</div>
		</div>
	</div>
	
    
    
    
<!-- Modal -->
<div id="modalBuy" class="modal fade"  role="dialog" style="display: none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form id="form_registro" name="form_registro" method="post" enctype="multipart/form-data"
            action="controller.php"
            target="iframeUpload">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" name="modal-title" id="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body" id="modal-body" name="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer" id="modal-footer" name="modal-footer">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
        </form>
    </div>

  </div>
</div>    
    
    <!-- Modal -->
<div id="modalx" class="modal fade"  role="dialog" style="display: none">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" >
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title" name="modal-titlex" id="modal-titlex">Modal Header</h4>
      </div>
      <div class="modal-body" id="modal-bodyx" name="modal-bodyx">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer" id="modal-footerx" name="modal-footerx">
        <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>
        <script src="js/clientes.js"></script>
        <script src="js/sweetalert.min.js"></script>

</body>
</html>
<?php } else {

    include_once './dashboard.php';
    
}