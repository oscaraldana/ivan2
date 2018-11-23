<?php
echo "<style>"
. '.customers {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

.customers td, #customers th {
    border: 1px solid #ddd;
    padding: 8px;
}

.customers tr:nth-child(even){background-color: #fef7ef;}

.customers tr:hover {background-color: #555;}

.customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #4CAF50;
    color: white;
}'
. "</style>";
    $cliente = new cliente();
    $cliente->consultarDatosParaRetiro();
    $cliente->consultarDatosParaRetiroReferidos();
    $cuentas = $cliente->consultarMisCuentas();
    
    $cliente->consultarRetiros();
    
    
    $vlrComision = $vlrComRef = 0;
    $vlrRetirar = $vlrRetRef = 0;
    
    $disabled2 = " disabled ";
    if ( $cliente->valorPendientePorReferidos > 0 ){
        $vlrComRef = $cliente->valorPendientePorReferidos * ( COMISION_RETIRO / 100 );
        $vlrRetRef = $cliente->valorPendientePorReferidos - $vlrComRef;
        $disabled2 = "";
    }
    
    
    if ( $cliente->dispoParaRetiro > 0 ){
        $vlrComision = $cliente->dispoParaRetiro * ( COMISION_RETIRO / 100 );
        $vlrRetirar = $cliente->dispoParaRetiro - $vlrComision;
    }

    $disabled = "";
    if ( $vlrRetirar <= 0 ){
        $disabled = " disabled ";
    }
    
    $existeRetiroPendiente = false;
    foreach ( $cliente->misRetiros as $misRet ) {
        if ( $misRet["estado"] == "0" ) {
            $existeRetiroPendiente = true;
        }
    }
    
    
    
    $tabla2 = "";
    $tabla = '<div style="overflow-x:auto;"><table class="table table-hover customers">
                    <tr>
                        <td scope="row"><span style="margin-left:30px;">Diponible para retirar por inversion:</span></td>
                        <td align="right"><span style="margin-right:30px;">$ '.number_format($cliente->dispoParaRetiro, 0, ',', '.').'</span></td>
                      </tr>
                      <tr>
                        <td scope="row"><span style="margin-left:30px;">Comision de retiro:</span></td>
                        <td align="right"><span style="margin-right:30px;">$ '.number_format($vlrComision, 0, ',', '.').'</span></td>
                      </tr>
                      <tr>
                        <td scope="row"><span style="margin-left:30px;">Total a Retirar:</span></td>
                        <td align="right"><span style="margin-right:30px;"><b>$ '.number_format($vlrRetirar, 0, ',', '.').'</b></span></td>
                      </tr>
                      <tr>
                        <td scope="row"><span style="margin-left:30px;">Metodo de pago:</span></td>
                        <td align="right">';
    
    
    
        $tabla1 = '<div style="overflow-x:auto;"><table class="table table-hover customers">
                    <tr>
                        <td scope="row"><span style="margin-left:30px;">Diponible para retirar por referidos:</span></td>
                        <td align="right"><span style="margin-right:30px;">$ '.number_format($cliente->valorPendientePorReferidos, 0, ',', '.').'</span></td>
                      </tr>
                      <tr>
                        <td scope="row"><span style="margin-left:30px;">Comision de retiro:</span></td>
                        <td align="right"><span style="margin-right:30px;">$ '.number_format($vlrComRef, 0, ',', '.').'</span></td>
                      </tr>
                      <tr>
                        <td scope="row"><span style="margin-left:30px;">Total a Retirar:</span></td>
                        <td align="right"><span style="margin-right:30px;">$ '.number_format($vlrRetRef, 0, ',', '.').'</span></td>
                      </tr>
                      <tr>
                        <td scope="row"><span style="margin-left:30px;">Metodo de pago:</span></td>
                        <td align="right">';

    
    if ( !$cuentas ) { 
        $tabla .= "<p class='text-danger' style='margin-right:30px;'><b>?</b></p>";
        $tabla1 .= "<p class='text-danger' style='margin-right:30px;'><b>?</b></p>";
    } else {
        $tabla .= '<select name="metodoPagoRetiro" id="metodoPagoRetiro" class="form-control"><option value="">Seleccione Metodo de Pago</option>';
        $tabla1 .= '<select name="metodoPagoRetiroRef" id="metodoPagoRetiroRef" class="form-control"><option value="">Seleccione Metodo de Pago</option>';
                            
        if ( isset($cuentas[0]["banco"]) && !empty($cuentas[0]["banco"]) ){
            $tabla .= '<option value="2">'.$cuentas[0]["banco"].' ***'.substr($cuentas[0]["cuenta"], -3).'</option>';
            $tabla1 .= '<option value="2">'.$cuentas[0]["banco"].' ***'.substr($cuentas[0]["cuenta"], -3).'</option>';
        }
        if ( isset($cuentas[0]["bitcoin"]) && !empty($cuentas[0]["bitcoin"]) ){
            $tabla .= '<option value="1">BITCOIN ***'.substr($cuentas[0]["bitcoin"], -3).'</option>';
            $tabla1 .= '<option value="1">BITCOIN ***'.substr($cuentas[0]["bitcoin"], -3).'</option>';
        }

        $tabla .= '</select>';
        $tabla1 .= '</select>';
    }
        
    $tabla .= '       </td>
                  </tr>

                </table></div>';
    $tabla1 .= '       </td>
                  </tr>

                </table></div>';
    
    
    
                if ( !$cuentas ) { 
                    $button = $button2 = "<div style='text-align: center;'><p class='text-danger'>No existe configurada ninguna cuenta transaccional para procesar la solicitud de retiro.</p>";
                } else {
                    $button = $button2 = '<div style="text-align: center;">';
                }
                
                if ( $existeRetiroPendiente ) {
                    $button .= "<p class='text-danger'>Hasta que no se procese la solicitud de retiro pendiente, no es posible realizar una nueva solicitud de retiro.</p>";
                    $button2 .= "<p class='text-danger'>Hasta que no se procese la solicitud de retiro pendiente, no es posible realizar una nueva solicitud de retiro.</p>";
                } else {
                    if ( $vlrRetirar <= 0 ){
                        $button .= '<button class="btn btn-info" style="cursor: pointer;" '.$disabled.' >Solicitar Retiro</button>';
                        $button2 .= '<button class="btn btn-info" style="cursor: pointer;" '.$disabled2.' >Solicitar Retiro</button>';
                    } else {
                        $button .= '<button class="btn btn-info" style="cursor: pointer;" '.$disabled.' onclick="solicitarRetiro(1);">Solicitar Retiro</button>';
                        $button2 .= '<button class="btn btn-info" style="cursor: pointer;" '.$disabled2.' onclick="solicitarRetiro(2);">Solicitar Retiro</button>';
                    }
                    
                }
                
                
                
   $button .=  '</div>';
   $button2 .=  '</div>';
    
?>

<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;"><b>SOLICITAR RETIRO</b></div>
    <div class="panel-content">
        
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#paquetes"><i class="fa fa-money"></i> &nbsp;&nbsp;&nbsp;Retiro por Inversion</a></li>
            <li><a data-toggle="tab" href="#referidos"><i class="fa fa-users"></i> &nbsp;&nbsp;&nbsp;Retiro por Referidos</a></li>
        </ul>
        <div class="tab-content">
            <div id="paquetes" class="tab-pane fade in active">
                <!-- Para Retiros por Inversion -->
                <?php echo $tabla.$tabla2. $button ?>
            </div>
            
            <div id="referidos" class="tab-pane fade">
                <?php echo $tabla1.$tabla2.$button2 ?>
            </div>
        </div>
        
        
        
        <!-- BUTTON -->
        
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;"><b>HISTORIAL DE RETIROS</b></div>
    <div class="panel-content">
      
        <?php 
        
        if ( is_array($cliente->misRetiros) && count($cliente->misRetiros) > 0 ) {

            echo '<table class="table table-hover">
            <tr>
                <th scope="row">Fecha Solicitud</th>
                <th scope="row">Fecha Pago</th>
                <th scope="row">Metodo</th>
                <th scope="row">Tipo</th>
                <th scope="row">Cantidad</th>
                <th scope="row">Estado</th>
              </tr>';
            
            
              
            
            foreach ( $cliente->misRetiros as $misRet ) {
                $estado = "";
                
                switch ( $misRet["estado"] ) {
                    case "0" : $estado = "Pendiente"; break;
                    case "1" : $estado = "Pagado"; break;
                    case "2" : $estado = "Rechazado"; break;
                }
                
                $tipo = "";
                if ( $misRet["tipo_retiro"] == "1" ){
                    $tipo = "Inversion";
                } else if ( $misRet["tipo_retiro"] == "2" ) {
                    $tipo = "Referidos";
                } 
                
                $metodo = ( !empty($misRet["bitcoin"]) ) ? "Bitcoin" : $misRet["banco"];
                if ( $misRet["tipo_cuenta"] == 99999  ) { $metodo = "Reinversion"; }
                
                if ( isset($misRet["fecha_pago"]) && !empty($misRet["fecha_pago"]) ) {
                    $fecPagoRet = date("d/m/Y", strtotime($misRet["fecha_pago"]) );
                } else {
                    $fecPagoRet = "-";
                }
                
                echo '  <tr>
                            <td>'.date("d/m/Y", strtotime($misRet["fecha_solicitud"]) ).'</td>
                            <td>'.$fecPagoRet.'</td>
                            <td>'.$metodo.'</td>
                            <td>'.$tipo.'</td>
                            <td align="right">$ '.$misRet["valor_retiro"].'</td>
                            <td><span class="badge">'.$estado.'</span></td>
                          </tr>';
            }
            
            echo '</table>';
            
        } else {
        
            echo "<h5>No existen registros de solicitudes de retiro para mostrar.</h5>";
        }
        ?>
        
    </div>
</div>