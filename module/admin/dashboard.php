<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Alianza Nuevo Mundo</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="../client/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="../client/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="../client/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="../client/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="../client/images/favicon.png" />
    <!-- Bootstrap CSS -->
  <link href="../client/css/bootstrap.min.css" rel="stylesheet">
  <link href="../client/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  
   <link href="../client/css/elegant-icons-style.css" rel="stylesheet" />
  <link href="../client/css/font-awesome.min.css" rel="stylesheet" />
  <!-- full calendar css-->
  <link href="../client/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
  <link href="../client/assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
  <!-- easy pie chart-->
  <link href="../client/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
  <!-- owl carousel -->
  <link rel="stylesheet" href="../client/css/owl.carousel.css" type="text/css">
  <link href="../client/css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
  <!-- Custom styles -->
  <link rel="stylesheet" href="../client/css/fullcalendar.css">
  <link href="../client/css/widgets.css" rel="stylesheet">
  <link href="../client/css/style.css" rel="stylesheet">
  <link href="../client/css/style-responsive.css" rel="stylesheet" />
  <link href="../client/css/xcharts.min.css" rel=" stylesheet">
  <link href="../client/css/jquery-ui-1.10.4.min.css" rel="stylesheet">
  <link href="../client/css/bootstrap-select.min.css" rel="stylesheet">
  <link href="../../css/datatables.css" rel="stylesheet">
  <style>
           
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
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="index.html">
          <img src="images/logo.svg" alt="logo" />
        </a>
        <a class="navbar-brand brand-logo-mini" href="index.html">
          <img src="images/logo-mini.svg" alt="logo" />
        </a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center">
        <!-- <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
          <li class="nav-item">
            <a href="#" class="nav-link">Schedule
              <span class="badge badge-primary ml-1">New</span>
            </a>
          </li>
          <li class="nav-item active">
            <a href="#" class="nav-link">
              <i class="mdi mdi-elevation-rise"></i>Reports</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
          </li>
        </ul> -->
        <ul class="navbar-nav navbar-nav-right">
          <!-- <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <i class="mdi mdi-file-document-box"></i>
              <span class="count">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
              <div class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 7 unread mails
                </p>
                <span class="badge badge-info badge-pill float-right">View all</span>
              </div>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face4.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">David Grey
                    <span class="float-right font-weight-light small-text">1 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    The meeting is cancelled
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face2.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark">Tim Cook
                    <span class="float-right font-weight-light small-text">15 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    New product launch
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <img src="images/faces/face3.jpg" alt="image" class="profile-pic">
                </div>
                <div class="preview-item-content flex-grow">
                  <h6 class="preview-subject ellipsis font-weight-medium text-dark"> Johnson
                    <span class="float-right font-weight-light small-text">18 Minutes ago</span>
                  </h6>
                  <p class="font-weight-light small-text">
                    Upcoming board meeting
                  </p>
                </div>
              </a>
            </div>
          </li> 
          <li class="nav-item dropdown">
            <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
              <i class="mdi mdi-bell"></i>
              <span class="count">4</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
              <a class="dropdown-item">
                <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                </p>
                <span class="badge badge-pill badge-warning float-right">View all</span>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-success">
                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                  <p class="font-weight-light small-text">
                    Just now
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-warning">
                    <i class="mdi mdi-comment-text-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">Settings</h6>
                  <p class="font-weight-light small-text">
                    Private message
                  </p>
                </div>
              </a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item preview-item">
                <div class="preview-thumbnail">
                  <div class="preview-icon bg-info">
                    <i class="mdi mdi-email-outline mx-0"></i>
                  </div>
                </div>
                <div class="preview-item-content">
                  <h6 class="preview-subject font-weight-medium text-dark">New user registration</h6>
                  <p class="font-weight-light small-text">
                    2 days ago
                  </p>
                </div>
              </a>
            </div>
          </li> -->
          <li class="nav-item dropdown d-none d-xl-inline-block">
            <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
              <span class="profile-text">Hola, <?php echo $_SESSION["clientNombre"] ?>!</span>
              <img class="img-xs rounded-circle" src="img/clients/<?php echo (isset($_SESSION["clientImg"]) && !empty($_SESSION["clientImg"]) && file_exists("img/clients/".$_SESSION["clientImg"]) ) ? $_SESSION["clientImg"] : "default-user.png" ?>" alt="Profile image">
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
              <!--<a class="dropdown-item p-0">
                <div class="d-flex border-bottom">
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                  </div>
                  <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                  </div>
                </div>
              </a>-->
              <a class="dropdown-item mt-2" onclick="miperfil()">
                <i class="menu-icon mdi mdi-account"></i> Mi Perfil
              </a>
              <a class="dropdown-item" onclick="cambiarContra()">
                <i class="menu-icon mdi mdi-key-variant"></i>Cambiar Contraseña
              </a>
              <a class="dropdown-item" onclick="logout()">
                <i class="menu-icon mdi mdi-logout"></i>Salir
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-menu"></span>
        </button>
      </div>
        
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="img/clients/<?php echo (isset($_SESSION["clientImg"]) && !empty($_SESSION["clientImg"]) && file_exists("img/clients/".$_SESSION["clientImg"]) ) ? $_SESSION["clientImg"] : "default-user.png" ?>" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php echo $_SESSION["clientNombre"] ; ?></p>
                  <div>
                    <small class="designation text-muted"><?php echo ( isset($_SESSION["clientIsAdmin"]) && $_SESSION["clientIsAdmin"] == "1" ) ? "Administrador" : "Inversionista" ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div> 
              </div>
              <!--<button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../admin/">
              <i class="menu-icon mdi mdi-home"></i>
              <span class="menu-title">Inicio</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-bitcoin"></i>
              <span class="menu-title">Administrar</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="javascript:;" onclick="cargarHtml('adm_paquetes');">Paquetes Clientes</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="javascript:;" onclick="cargarHtml('adm_retiros');">Retiros Clientes</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="javascript:;" onclick="cargarHtml('../client/referidos');">
              <i class="menu-icon mdi mdi-numeric"></i>
              <span class="menu-title">Ver Clientes</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link"  href="../client">
              <i class="menu-icon mdi mdi-account-multiple-plus"></i>
              <span class="menu-title">Modulo Clientes</span>
            </a>
          </li>
          
        </ul>
      </nav>
      
      
      <?php
        
        $cliente = new cliente();
        
        $cliente->consultarTotales();
        
        ?>
      <!-- partial -->
      <div  id="homeContent" name="homeContent">
      <div class="row tile_count" >
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Clientes</span>
              <div class="count"><?= $cliente->totales["clientes"]?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-dollar"></i> Paquetes Vigentes</span>
              <div class="count"><?= $cliente->totales["paq_vigentes"]?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Paquetes Pendientes</span>
              <div class="count green"><?= $cliente->totales["paq_pendientes"]?></div>
            </div>
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-clock-o"></i> Retiros Pendientes</span>
              <div class="count"><?= $cliente->totales["ret_pendientes"]?></div>
            </div>
            
            <!--
            <div class="col-md-2 col-sm-4 col-xs-6 tile_stats_count">
              <span class="count_top"><i class="fa fa-user"></i> Total Connections</span>
              <div class="count">7,325</div>
              <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span>
            </div>
            -->
            
          </div>
      
      
      
           <br>
          <div class="row" style="text-align: center;"> 
              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <!-- <h2>Pie Graph Chart <small>Sessions</small></h2> -->
                    
                    <div class="clearfix"></div>
                  </div>
                    <div class="x_content" style="float: right">
                    <canvas id="myChart" width="400" height="280"></canvas>
                  </div>
                </div>
              </div>
          </div>
      
      </div>
      
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  
  
  
  
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
  
  
  
  
  
  
  
  <!-- plugins:js -->
  
  <script src="../client/vendors/js/vendor.bundle.base.js"></script>
  <script src="../client/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="../client/js/off-canvas.js"></script>
  <script src="../client/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="../client/js/dashboard.js"></script>
  <!-- End custom js for this page-->
  <script src="../client/js/jquery-3.3.1.min.js"></script>
  <script src="../client/js/jquery-ui-1.10.4.min.js"></script>
  <script type="text/javascript" src="../client/js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="../client/js/bootstrap.min.js"></script>
  <script src="../client/js/clientes.js?v=<?php echo time();?>"></script>
   <script src="js/admin.js?v=<?php echo time();?>"></script>

   
   
   <!-- javascripts -->
  <script src="../client/js/jquery-3.3.1.min.js"></script>
  <script src="../client/js/jquery-ui-1.10.4.min.js"></script>
  <script type="../client/text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="../client/js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="../client/js/jquery.scrollTo.min.js"></script>
  <script src="../client/js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="../client/assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="../client/js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="../client/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="../client/js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="../client/js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="../client/assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="../client/js/calendar-custom.js"></script>
    <script src="../client/js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="../client/js/jquery.customSelect.min.js"></script>
    <script src="../client/assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="../client/js/scripts.js"></script>
    <!-- custom script for this page-->
    <script src="../client/js/sparkline-chart.js"></script>
    <script src="../client/js/easy-pie-chart.js"></script>
    <script src="../client/js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../client/js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../client/js/xcharts.min.js"></script>
    <script src="../client/js/jquery.autosize.min.js"></script>
    <script src="../client/js/jquery.placeholder.min.js"></script>
    <script src="../client/js/gdp-data.js"></script>
    <script src="../client/js/morris.min.js"></script>
    <script src="../client/js/sparklines.js"></script>
    <script src="../client/js/charts.js"></script>
    <script src="../client/js/jquery.slimscroll.min.js"></script>
    <script src="../client/js/clientes.js?v=<?php echo time();?>"></script>
    <script src="js/admin.js?v=<?php echo time();?>"></script>
    <script src="../client/js/sweetalert.min.js"></script>
    <script src="../client/js/bootstrap-select.js"></script>
    <script src="../../js/datatables.js"></script>
    <script src="js/Chart.js"></script>
  

 <script>
        

function addCommas(nStr)
{
    return nStr;
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}

var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ["Total Ganancias", "Ganancias Paquetes", "Ganancias Referidos", "Ganancias Pagadas", "Ganancias Sin Pagar", "Total Inversiones"],
        datasets: [{
            label: 'Valores',
            data: ['<?= ($cliente->totales["tot_gan_paq"] + $cliente->totales["tot_gan_referidos"])?>', '<?= $cliente->totales["tot_gan_paq"]?>', '<?= $cliente->totales["tot_gan_referidos"]?>', '<?= $cliente->totales["tot_pagado"]?>', '<?= $cliente->totales["tot_pendiente"]?>', '<?= $cliente->totales["tot_invertido"]?>'],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255,99,132,1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        tooltips: {
            tooltipTemplate: "<%= addCommas(value) %>"
       }
    }
    
});


</script>  
  
</body>

</html>
