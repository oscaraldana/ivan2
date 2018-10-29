<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="shortcut icon" type="image/x-icon" href="/images/wolves.ico" />
  <title>Alianza Nuevo Mundo</title>

  <!-- Bootstrap CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!--external css-->
<a href="dashboard.php"></a>
  <!-- font icon -->
  <link href="css/elegant-icons-style.css" rel="stylesheet" />
  <link href="css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
  <link href="css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="css/fullcalendar.css">
  <link href="css/widgets.css" rel="stylesheet">
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet" />
  <link href="css/xcharts.min.css" rel=" stylesheet">
  <link href="css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <!-- =======================================================
    Theme Name: NiceAdmin
    Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
    Author: BootstrapMade
    Author URL: https://bootstrapmade.com
  ======================================================= -->
  
  <style>
      body::after {
             content: "";
             background: url(../../images/wolvess.jpeg);
             background-repeat:no-repeat;
             background-size: cover;
             opacity: 0.2;
             top: 0;
             left: 0;
             bottom: 0;
             right: 0;
             position: absolute;
             z-index: -1;   
           }    
           
           
 .reloj{
 font-family: sans-serif;
 color: #fff;
 display: inline-block;
 font-weight: 100;
 text-align: center;
 font-size: 10px;
}
 
.reloj > div{
    padding: 5px;
    border-radius: 3px;
    background: #999999;
    display: inline-block;
 
}
 
.reloj div > span{
    padding: 5px;
    border-radius: 3px;
    background: rgba(57, 68, 84, 0.27);
    display: inline-block;
}

span.exmple{
    font-weight: bold;
    cursor: pointer;
}
span.exmple:hover{
    color: #171;
}
  </style>
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">


    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="../client/" class="logo"><img src="../../images/bitcoin-coin.png" width="40px" ><span class="lite" style="font-size: 15px;"><b> Alianza Nuevo Mundo</b></span> </a>
      <!--logo end-->

      <div class="top-nav notification-row">
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">

          
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="profile-ava">
                                <?php 
                                if (isset($_SESSION["clientImg"]) && !empty($_SESSION["clientImg"]) && file_exists("img/clients/".$_SESSION["clientImg"]) ){
                                    echo '<img alt="" src="img/clients/'.$_SESSION["clientImg"].'" height="43px"  id="imgPerfil" name="imgPerfil">';
                                } else {
                                    echo '<img alt="" src="img/clients/default-user.png" height="43px" id="imgPerfil" name="imgPerfil">';
                                }
                                    ?>
                                
                            </span>
                            <span class="username"  id="nomPerfil" name="nomPerfil"> <?php echo $_SESSION["clientNombre"] ?> </span>
                            <b class="caret"></b>
                        </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                  <a href="javascript:;" onclick="miperfil()"><i class="icon_profile"></i> Mi Perfil</a>
              </li>
              <li>
                  <a href="javascript:;" onclick="cambiarContra()"><i class="icon_key_alt"></i> Cambiar Contraseña</a>
              </li>
              <li>
                  <a href="javascript:;" onclick="logout()"><i class="arrow_back"></i> Salir</a>
              </li>
              <!--<li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li>
              <li>
                <a href="login.html"><i class="icon_key_alt"></i> Log Out</a>
              </li>
              <li>
                <a href="documentation.html"><i class="icon_key_alt"></i> Documentation</a>
              </li>
              
              <li>
                <a href="javascript:;" onclick="logout()"><i class="icon_key_alt"></i> salir</a>
              </li>-->
            </ul>
          </li>
          <!-- user login dropdown end -->
        </ul>
        <!-- notificatoin dropdown end-->
      </div>
    </header>
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">
          <li class="active">
              <a class="" href="../client/">
                          <i class="icon_house_alt"></i>
                          <span>Inicio</span>
                      </a>
          </li>
          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_document_alt"></i>
                          <span>Transacciones</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="javascript:;" onclick="cargarHtml('comprar');">Comprar Paquetes</a></li>
              <li><a class="" href="javascript:;" onclick="cargarHtml('retirar');">Retiros</a></li>
              <li><a class="" href="javascript:;" onclick="cargarHtml('histocompras');">Historial de Compra</a></li>
            </ul>
          </li>
          <li>
            <a class="" href="javascript:;" onclick="cargarHtml('cuentabancaria');">
                          <i class="icon_table"></i>
                          <span>Mis Cuentas</span>
                      </a>
          </li>
          <li>
            <a class="" href="javascript:;" onclick="cargarHtml('referidos');">
                          <i class="icon_group"></i>
                          <span>Mis Referidos</span>
                      </a>
          </li>
          <?php if ( isset($_SESSION["clientIsAdmin"]) && $_SESSION["clientIsAdmin"] ) {
            echo '<li style="background: #414a5A;">
                    <a class="" href="../admin">
                                  <i class="icon_tools"></i>
                                  <span style="color:">Modulo Admin</span>
                              </a>
                  </li>';  
          }
          
          ?>
          <!--<li>
            <a class="" href="widgets.html">
                          <i class="icon_genius"></i>
                          <span>Widgets</span>
                      </a>
          </li>
          <li>
            <a class="" href="chart-chartjs.html">
                          <i class="icon_piechart"></i>
                          <span>Charts</span>

                      </a>

          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_table"></i>
                          <span>Tables</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="basic_table.html">Basic Table</a></li>
            </ul>
          </li>

          <li class="sub-menu">
            <a href="javascript:;" class="">
                          <i class="icon_documents_alt"></i>
                          <span>Pages</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
            <ul class="sub">
              <li><a class="" href="profile.html">Profile</a></li>
              <li><a class="" href="login.html"><span>Login Page</span></a></li>
              <li><a class="" href="contact.html"><span>Contact Page</span></a></li>
              <li><a class="" href="blank.html">Blank Page</a></li>
              <li><a class="" href="404.html">404 Error</a></li>
            </ul>
          </li>
-->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
    
      <section class="wrapper">
    <div id="homeContent" name="homeContent">   
          <!--overview start-->
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa-laptop"></i> Mi Panel</h3>
            <!--<ol class="breadcrumb">
              <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
              <li><i class="fa fa-laptop"></i>Dashboard</li>
            </ol>
            -->
          </div>
        </div>

        <?php
        
        $cliente = new cliente();
        
        $cliente->consultarGanancias();
        $cliente->consultarRetiros(1);
        
        $restar = 0;
        foreach ($cliente->misRetiros as $ret) {
            if ( $ret["estado"] == 1 ) {
                $restar += $ret["valor_retiro"];
            }
        }
        
        ?>
          
        <div class="row">
         
          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
              <div class="info-box dark-bg" style="font-size: 10px;">
              <i class="fa fa-dollar"></i>
              <div class="count" style="white-space: nowrap"><?php echo ($cliente->gananciasInversion - $restar); ?></div>
              <div class="title">Mis Ganancias Por Inversion</div>
            </div>
          </div>

          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-dollar"></i>
              <div class="count"><?php echo $cliente->gananciasReferidos; ?></div>
              <div class="title">Mis Ganancias Por Referidos</div>
            </div>
          </div>


          <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
            <div class="info-box dark-bg">
              <i class="fa fa-dollar"></i>
              <div class="count"><?php echo (($cliente->gananciasInversion - $restar) + $cliente->gananciasReferidos); ?></div>
              <div class="title">Total Mis Ganancias</div>
            </div>
          </div>


        </div>
        <!--/.row-->


        <?php
        
        //$misPaq = $cliente->consultarPaquetesCliente( [ "orden" => "fecha_registro asc"] );
        $script = "";
        
        if ( is_array($cliente->gananciasPorPaquete) && count($cliente->gananciasPorPaquete) > 0  ) {
            
            echo "<table class='table'>";
            
            echo "<tr><th>PAQUETE</th><th>FECHA COMPRA</th><th>VALOR PAQUETE</th><th>FECHA INICIO</th><th>FECHA FIN</th><th>GANANCIAS</th><th>VIGENCIA</th></tr>";
            
            foreach ( $cliente->gananciasPorPaquete as $paq ) { 

                if ( $paq["estado"] == 1 ){
                    
                    echo "<tr><td>".$paq["nombre"]."</td><td>".date("d/m/Y", strtotime($paq["fecha_registro"]))."</td>";
                    echo "<td style='text-align:right'>COP $".number_format($paq["valor_paquete"], 0, ',', '.' )."</td>";
                    echo "<td>".date("d/m/Y", strtotime($paq["inicia"]))."</td>";
                    echo "<td>".date("d/m/Y", strtotime($paq["finaliza"]))."</td>";
                    echo "<td style='text-align:right;' class='href'><span class='exmple' onclick='detallarGanancias(".$paq["paquete_cliente_id"].")'>COP $ ".number_format($paq["ganancia"], 0, ',', '.' )."</span></td>";
                    echo '<td><div id="reloj_'.$paq["paquete_cliente_id"].'" class="reloj">
                            <div> <div class="texto">Días</div> <span class="dias" id="dias_'.$paq["paquete_cliente_id"].'"></span> </div>
                            <div> <div class="texto">Horas</div> <span class="horas" id="horas_'.$paq["paquete_cliente_id"].'"></span> </div>
                            <div> <div class="texto">Minutos</div> <span class="minutos" id="minutos_'.$paq["paquete_cliente_id"].'"></span> </div>
                            <div> <div class="texto">Segundos</div> <span class="segundos" id="segundos_'.$paq["paquete_cliente_id"].'"></span> </div>
                        </div></td>';
                    echo "</tr>";
                    $script .= "
                            var deadline_".$paq["paquete_cliente_id"]." = new Date('".date("m/d/Y", strtotime($paq["finaliza"]))."');
                            var iniline_".$paq["paquete_cliente_id"]." = new Date('".date("m/d/Y", strtotime($paq["inicia"]))."');
                            initializeReloj('reloj_".$paq["paquete_cliente_id"]."', deadline_".$paq["paquete_cliente_id"].", ".$paq["paquete_cliente_id"].", iniline_".$paq["paquete_cliente_id"].");
                         
                         ";
                }
                

            }
            
            echo "</table>";
        }
        
        ?>
        
        
 
        
       



      </section>
      <div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
         
          <a href="javascript:;">Derechos reservados - 2018</a> -->
        </div>
      </div>
    </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  
  
  
  <!-- Modal -->
<div id="modalClient" class="modal fade"  role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content" style="background-color: #262b2d;">
        <form  id="form_modal" name="form_modal" onsubmit="return false;">
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
  
  
  
  
  <!-- javascripts -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui-1.10.4.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="js/jquery.scrollTo.min.js"></script>
  <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="js/calendar-custom.js"></script>
    <script src="js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="js/sparkline-chart.js"></script>
    <script src="js/easy-pie-chart.js"></script>
    <script src="js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="js/xcharts.min.js"></script>
    <script src="js/jquery.autosize.min.js"></script>
    <script src="js/jquery.placeholder.min.js"></script>
    <script src="js/gdp-data.js"></script>
    <script src="js/morris.min.js"></script>
    <script src="js/sparklines.js"></script>
    <script src="js/charts.js"></script>
    <script src="js/jquery.slimscroll.min.js"></script>
    <script src="js/clientes.js?v=<?php echo time();?>"></script>
    <script src="js/sweetalert.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
      
      
    $( document ).ready(function() {
        <?= $script ?>
    });
      
      
    </script>

</body>

</html>
