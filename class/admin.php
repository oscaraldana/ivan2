<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of partner
 *
 * @author oscar.aldana
 */
class admin {
    //put your code here
    
    public function getEstados() {
        /*
        $conex = WolfConex::conex();
        
        $sql = "select * from cliente where login = '".$data["user_login"]."' and contrasena = '". md5($data["pass_login"]) ."' and estado = 1 ";
        $result = mysqli_query($conex->getLinkConnect(), $sql);
        $row = mysqli_fetch_array($result);
            
        //$result = $conex->Execute($sql);
        if ( !mysqli_num_rows($result) > 0 ){
            echo json_encode( ["respuesta" => false ] );
        } else {
            
            $_SESSION["clientId"] = $row["cliente_id"];
            $_SESSION["clientNombre"] = $row["nombre"];
            $_SESSION["clientLogin"] = $row["login"];
            $_SESSION["clientImg"] = $row["foto"];
            if ( $row["es_admin"] ){
                $_SESSION["clientIsAdmin"] = $row["es_admin"];
            }
            
            echo json_encode( [ "respuesta" => true, "usuario" => $row["login"] ] );
        }
        
        
        return true;
        */
        
        $estados = [ "-1" => "Todos", "0" => "Pendiente", "1" => "Activo", "2" => "Rechazado", "3" => "Inactivo" ];
        return $estados;
    }
    
    
    public function listarPaquetes($dataForm){
        
        
        //var_export($dataForm); 
        
        $cond = "";
        $list = "";
        if ( isset($dataForm["paqestado"]) && $dataForm["paqestado"] != "" ){
            $cond .= ' AND paqcli.estado = '.$dataForm["paqestado"].' ';
        }
        if ( isset($dataForm["iniCompra"]) && $dataForm["iniCompra"] != "" ){
            $cond .= ' AND paqcli.fecha_registro >= \''.$dataForm["iniCompra"].'\' ';
        }
        if ( isset($dataForm["finCompra"]) && $dataForm["finCompra"] != "" ){
            $cond .= ' AND paqcli.fecha_registro <= \''.$dataForm["finCompra"].'\' ';
        }
        
        $conex = WolfConex::conex();
        
        $res = [];
        
        $sql = "select paqcli.*, paqcli.valor_paquete as valor, paq.nombre, cli.nombre as cliente
                from paquetes_cliente paqcli
                inner join paquetes paq on paq.paquete_id = paqcli.paquete_id 
                inner join cliente cli on cli.cliente_id = paqcli.cliente_id
                where true $cond";
        $result = mysqli_query($conex->getLinkConnect(), $sql);
        if ( $result ) {
            
            if ( mysqli_num_rows($result) > 0 ){
                
                while ($fila = mysqli_fetch_array($result)) {
                    $res[] = $fila;
                }
                
            }
        }
        
        if ( count($res) > 0 ) {
        
            $list = '
                <br>
                <table class="table table-hover" id="tablePaqAdmin">
                <thead>
                <tr>
                    <th scope="row">Fecha Compra</th>
                    <th scope="row">Cliente</th>
                    <th scope="row">Paquete</th>
                    <th scope="row">Valor</th>
                    <th scope="row">Forma Compra</th>
                    <th scope="row">Ref Compra</th>
                    <th scope="row">Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  ';

                foreach ( $res as $paq ) {

                    $estado = $class = "";
                    switch ( $paq["estado"] ) {
                        case 0 : $estado = "Pendiente"; $class = "badge badgeP"; break;
                        case 1 : $estado = "Activo"; $class = "badge"; break;
                        case 2 : $estado = "Rechazado"; $class = "badge badgeR"; break;
                        case 3 : $estado = "Vencido"; $class = "badge badgeV"; break;
                        
                    }

                    $list .='  <tr>
                          <td>'.$paq["fecha_registro"].'</td>
                          <td>'.$paq["cliente"].'</td>
                          <td>'.$paq["nombre"].'</td>
                          <td align="right">$ '.number_format($paq["valor"], 0, "", ".").'</td>
                          <td>'.$paq["tipo_pago"].'</td>
                          <td>'.$paq["referencia_pago"].'</td>
                          <td><span class="'. $class.'" style="cursor:pointer;" onclick="editarPaquete('.$paq["paquete_cliente_id"].')">'. $estado.'</span></td>
                        </tr>';

                }
                


            $list .= '</tbody></table>';
        } else {
            $list .= '<br><h4>No hay registros para mostrar.</h4>';
        }
        
       echo json_encode( ["respuesta" => true, "tabla" => $list ] );
    }
 
    
    
    
    public function listarRetiros($dataForm){
        
        
        //var_export($dataForm); 
        
        $cond = "";
        $list = "";
        if ( isset($dataForm["retestado"]) && $dataForm["retestado"] != "" ){
            $cond .= ' AND retiros_cliente.estado = '.$dataForm["retestado"].' ';
        }
        if ( isset($dataForm["inisoli"]) && $dataForm["inisoli"] != "" ){
            $cond .= ' AND retiros_cliente.fecha_solicitud >= \''.$dataForm["inisoli"].'\' ';
        }
        if ( isset($dataForm["finsoli"]) && $dataForm["finsoli"] != "" ){
            $cond .= ' AND retiros_cliente.fecha_solicitud <= \''.$dataForm["finsoli"].'\' ';
        }
        
        $conex = WolfConex::conex();
        
        $res = [];
        
        $sql = "select retiros_cliente.*, cliente.nombre as cliente 
                from retiros_cliente
                inner join cliente on cliente.cliente_id = retiros_cliente.cliente_id
                where true $cond";
        $result = mysqli_query($conex->getLinkConnect(), $sql);
        if ( $result ) {
            
            if ( mysqli_num_rows($result) > 0 ){
                
                while ($fila = mysqli_fetch_array($result)) {
                    $res[] = $fila;
                }
                
            }
        }
        
        if ( count($res) > 0 ) {
        
            $list = '
                <br>
                <table class="table table-hover" id="tableRetAdmin">
                <thead>
                <tr>
                    <th scope="row">Fecha Solicitud</th>
                    <th scope="row">Cliente</th>
                    <th scope="row">Valor Retiro</th>
                    <th scope="row">Comision</th>
                    <th scope="row">Valor a Pagar</th>
                    <th scope="row">Forma Pago</th>
                    <th scope="row">Fecha Pago</th>
                    <th scope="row">Estado</th>
                  </tr>
                  </thead>
                  <tbody>
                  ';

                foreach ( $res as $ret ) {

                    $estado = $class = "";
                    switch ( $ret["estado"] ) {
                        case 0 : $estado = "Pendiente"; $class = "badge badgeP"; break;
                        case 1 : $estado = "Pagado"; $class = "badge"; break;
                        case 2 : $estado = "Rechazado"; $class = "badge badgeR"; break;
                        case 3 : $estado = "Vencido"; $class = "badge badgeV"; break;
                        
                    }
                    if ( !empty($ret["bitcoin"]) ){
                        $forma = "BITCOIN";
                    } else {
                        $forma = $ret["banco"];
                    }

                    $list .='  <tr>
                          <td>'.date("d/m/Y", strtotime($ret["fecha_solicitud"])).'</td>
                          <td>'.$ret["cliente"].'</td>
                          <td align="right">$ '.$ret["valor_retiro"].'</td>
                          <td align="right">$ '.$ret["valor_comision"].'</td>
                          <td align="right">$ '.$ret["valor_pagado"].'</td>
                          <td>'.$forma.'</td>
                          <td>'.$ret["fecha_pago"].'</td>
                          <td><span class="'. $class.'" style="cursor:pointer;" onclick="editarRetiro('.$ret["retiro_id"].')">'. $estado.'</span></td>
                        </tr>';

                }
                


            $list .= '</tbody></table>';
        } else {
            $list .= '<br><h4>No hay registros para mostrar.</h4>';
        }
        
       echo json_encode( ["respuesta" => true, "tabla" => $list ] );
    }
    
    
    
    public function consultapaquete () {
        
        if(isset($_POST["paquete_id"]) && !empty($_POST["paquete_id"]) ){
    
            $conex = WolfConex::conex();
            
            $sql = "select c.nombre, paqcli.*, p.nombre as paquete, paqcli.valor_paquete as valor,
                    case 
                        when paqcli.estado = 0 then 'Pendiente'
                        when paqcli.estado = 1 then 'Activo'
                        when paqcli.estado = 2 then 'Rechazado'
                        when paqcli.estado = 3 then 'Vencido'
                        else 'Indefinido'
                    end as desc_estado,
                    paqcli.estado
                    from paquetes_cliente paqcli
                    inner join cliente c on c.cliente_id = paqcli.cliente_id
                    inner join paquetes p on p.paquete_id = paqcli.paquete_id
                    where paqcli.paquete_cliente_id = ".$_POST["paquete_id"]." ";
            $result = mysqli_query($conex->getLinkConnect(), $sql);
            $row = mysqli_fetch_array($result);

            $gananciasDispo = "";
            
            if ( !mysqli_num_rows($result) > 0 ){
                echo json_encode( ["respuesta" => false, "error" => 1, "msg" => "Los datos del paquete no se encuentran disponibles!" ] );
            } else {
                
                $states[0] = [ "0" => "Pendiente", "1" => "Activo", "2" => "Rechazado" ];
                $states[1] = [ "0" => "#eb984e", "1" => "#5dade2", "2" => "#c0392b" ];
                $select = "<select class='form-control' onchange='validarEstadoPaq()' name='selectEstado' id='selectEstado'>";
                foreach ( $states[0] as $k => $val ){
                    $selected = "";
                    if ( $k == $row["estado"] ) { $selected = " selected "; }
                    $select .= '<option style="background: '.$states[1][$k].'; color: #fff;" value="'.$k.'" '.$selected.'>'.$val.'</option>';
                }
                $select .= '</select>';
                
                
                
                
                if( isset($row["valor"]) ) { $row["valor"]; /*= number_format($row["valor"], 2, ',', '.');*/ }
                if( isset($row["fecha_registro"]) ) { $row["fecha_registro"] = date("d/m/Y", strtotime($row["fecha_registro"]) ); }
                if( isset($row["inicia"]) && !empty($row["inicia"]) ) { $row["inicia_"] = date("d/m/Y", strtotime($row["inicia"]) ); } else { $row["inicia"] = date("Y-m-d"); }
                if( isset($row["finaliza"]) && !empty($row["finaliza"]) ) { $row["finaliza_"] = date("d/m/Y", strtotime($row["finaliza"]) ); } else { $row["finaliza"] = date ( 'Y-m-d' , strtotime ( '+1 year' , strtotime ( date('Y-m-d') ) ) ); }
                
                if ( isset($row["referencia_pago"]) && $row["referencia_pago"] == "Ganancias Paquetes" ) {
                    $cliente = new cliente();
                    $cliente->consultarDatosParaRetiro();
                    $cliente->consultarRetiros();
                    $cliente->consultarDatosParaRetiroReferidos();
                    
                    $restar = 0;
                    foreach ($cliente->misRetiros as $ret) {
                        if ( $ret["estado"] == 1 ) {
                            $restar += $ret["valor_retiro"];
                        }
                    }
                    
                    $gananciasDispo = "<tr><td>Ganancias Acumuladas:</td><td class='text-right'>US$ ".number_format( (($cliente->gananciasInversion -$restar ) + $cliente->valorPendientePorReferidos), 2, ',', '.')."<td></tr>";
                    $select .= '<input type="hidden" name="reinvertir" id="reinvertir" value="true">';
                    
                }
                
                echo json_encode( ["respuesta" => true, "msg" => "Datos de paquete", "datos" => $row, "estados" => $select, "ganancias_dispo" => $gananciasDispo ] );
            }
        }
    }
    
    
    
    public function consultaretiro () {
        
        if(isset($_POST["retiro_id"]) && !empty($_POST["retiro_id"]) ){
    
            $conex = WolfConex::conex();
            
            $sql = "select c.nombre, retcli.* ,
                    case 
                        when retcli.estado = 0 then 'Pendiente'
                        when retcli.estado = 1 then 'Pagado'
                        when retcli.estado = 2 then 'Rechazado'
                        when retcli.estado = 3 then 'Vencido'
                        else 'Indefinido'
                    end as desc_estado,
                    case 
                    	when retcli.tipo_retiro = 1 then 'Inversion'
                    	when retcli.tipo_retiro = 2 then 'Referidos'
                    	else 'Indefinido'
                   	end as tipo_des
                    from retiros_cliente retcli
                    inner join cliente c on c.cliente_id = retcli.cliente_id
                    where retcli.retiro_id = ".$_POST["retiro_id"]." ";
            $result = mysqli_query($conex->getLinkConnect(), $sql);
            $row = mysqli_fetch_array($result);

            if ( !mysqli_num_rows($result) > 0 ){
                echo json_encode( ["respuesta" => false, "error" => 1, "msg" => "Los datos del retiro no se encuentran disponibles!" ] );
            } else {
                
                $states[0] = [ "0" => "Pendiente", "1" => "Pagado", "2" => "Rechazado" ];
                $states[1] = [ "0" => "#eb984e", "1" => "#5dade2", "2" => "#c0392b" ];
                $select = "<select class='form-control' name='selectEstado' id='selectEstado'>";
                foreach ( $states[0] as $k => $val ){
                    $selected = "";
                    if ( $k == $row["estado"] ) { $selected = " selected "; }
                    $select .= '<option value="'.$k.'" '.$selected.'>'.$val.'</option>';
                }
                $select .= '</select>';
                
                $formaPgo = "";
                if( !empty($row["bitcoin"]) ) {
                    $formaPgo .= "<tr><td>Forma Pago:</td><td class='text-right'>BITCOIN<td></tr>";
                    $formaPgo .= "<tr><td>Cuenta Pago:</td><td class='text-right'>".$row["bitcoin"]."<td></tr>";
                } else {
                    $formaPgo .= "<tr><td>Forma Pago:</td><td class='text-right'>".$row["banco"]."<td></tr>";
                    $formaPgo .= "<tr><td>Cuenta Pago:</td><td class='text-right'>".$row["cuenta"]."<td></tr>";
                    $formaPgo .= "<tr><td>Tipo Cuenta:</td><td class='text-right'>".$row["tipo_cuenta"]."<td></tr>";
                    $formaPgo .= "<tr><td>Titular Cuenta:</td><td class='text-right'>".$row["titular"]."<td></tr>";
                }
                
                
                if( isset($row["valor"]) ) { $row["valor"] = number_format($row["valor"], 2, ',', '.'); }
                if( isset($row["fecha_solicitud"]) ) { $row["fecha_solicitud"] = date("d/m/Y", strtotime($row["fecha_solicitud"]) ); }
                
                echo json_encode( ["respuesta" => true, "msg" => "Datos de retiro", "datos" => $row, "estados" => $select, "formaPago" => $formaPgo ] );
            }
        }
    }
    

    public function actualizarPaquete ( $dataPost ) {
            
        if ( $dataPost["selectEstado"] == "1" && ( empty($dataPost["datefecinipaq"]) || empty($dataPost["datefecfinpaq"]) ) ) {
            echo json_encode( ["respuesta" => false, "error" => 3, "msg" => "Por favor seleccione las fechas de vigencia del paquete." ] );
            return;
        }
        
        
        $conex = WolfConex::conex();
        //intval(str_replace(".", "", $dataPost["valorPaqAprobar"]))
        // Consultamos el estado actual del paquete
        $sql = "select paquetes_cliente.*, paquetes.valor 
                from paquetes_cliente 
                inner join paquetes on paquetes.paquete_id = paquetes_cliente.paquete_id
                where paquete_cliente_id = ".$dataPost["paquete_id"];
        $res = mysqli_query($conex->getLinkConnect(), $sql);
        $paqAct = mysqli_fetch_array($res);
        
        $sql = "update paquetes_cliente set estado = '".$dataPost["selectEstado"]."', fecha_activacion = now(), "
                . "inicia = '".$dataPost["datefecinipaq"]."', finaliza = '".$dataPost["datefecfinpaq"]."', "
                . "valor_paquete = ".intval(str_replace(".", "", $dataPost["valorPaqAprobar"]))
                . " WHERE paquete_cliente_id = ".$dataPost["paquete_id"];
        $result = mysqli_query($conex->getLinkConnect(), $sql);
        if ( !$result ) {
            //echo "<script>parent.sweetal(\"No es posible actualizar tu perfil en este momento.\");</script>";
            echo json_encode( ["respuesta" => false, "error" => 3, "msg" => "No es posible modificar este paquete en este momento.".$sql ] );
        } else {
            
            // Dar bonificacion por compra de paquete de referido
            if ( $dataPost["selectEstado"] == "1" ) {
                
                $sql = "select * from bonos_referidos where paquete_cliente_id = ".$dataPost["paquete_id"];
                $res = mysqli_query($conex->getLinkConnect(), $sql);
                $bonoRef = mysqli_fetch_array($res);
                if ( count($bonoRef) <= 0 ) {
                    
                    $sql = "insert into bonos_referidos (paquete_cliente_id, valor) values 
                           ( ".$dataPost["paquete_id"].", '".( $paqAct["valor"] * 0.05 )."' );";
                    $res = mysqli_query($conex->getLinkConnect(), $sql);
                }

                
            }
            
            
            echo json_encode( ["respuesta" => true, "msg" => "Paquete actualizado correctamente."] );
        }
        
        
    }
    
    
    public function actualizarRetiro ( $dataPost ) {
        
        
        $conex = WolfConex::conex();
        
        $sql = "update retiros_cliente set estado = '".$dataPost["selectEstado"]."', fecha_pago = now() where retiro_id = ".$dataPost["retiro_id"];
        $result = mysqli_query($conex->getLinkConnect(), $sql);
        if ( !$result ) {
            //echo "<script>parent.sweetal(\"No es posible actualizar tu perfil en este momento.\");</script>";
            echo json_encode( ["respuesta" => false, "error" => 3, "msg" => "No es posible modificar este retiro en este momento." ] );
        } else {
            
            /*if ( $dataPost["selectEstado"] == "1" ) {
                
                $sql = "select * from bonos_referidos where paquete_cliente_id = ".$dataPost["paquete_id"];
                $res = mysqli_query($conex->getLinkConnect(), $sql);
                $bonoRef = mysqli_fetch_array($res);
                if ( count($bonoRef) <= 0 ) {
                    
                    $sql = "insert into bonos_referidos (paquete_cliente_id, valor) values 
                           ( ".$dataPost["paquete_id"].", '".( $paqAct["valor"] * 0.05 )."' );";
                    $res = mysqli_query($conex->getLinkConnect(), $sql);
                }

                
            }*/
            
            
             echo json_encode( ["respuesta" => true, "msg" => "Retiro actualizado correctamente."] );
        }
        
        
    }
    
    
    public function aprobarReinversion($dataPost, $codPaquete){ // 1 paquetes, 2 referidos, 3 paquetes y referidos
        
        if(empty($codPaquete)) {
            echo json_encode( ["respuesta" => false, "error" => 3, "msg" => "No es posible la compra de este paquete en este momento." ] );
            return;
        }
        
        $conex = WolfConex::conex();
        $cliente = new cliente();
        
        mysqli_autocommit($conex->getLinkConnect(), FALSE); // turn OFF auto
        
        $comision = ["", 1 => 5, 2 => 10, 3 => 20, 4 => 50];
        
        $exito = true;
        
        // Actualizamos estado y fechas de paquete nuevo
        $sql = "update paquetes_cliente set estado = '1', fecha_activacion = now(), inicia = CURDATE() + INTERVAL 5 day, finaliza = CURDATE() + INTERVAL 5 day + interval 1 year where paquete_cliente_id = ".$codPaquete;
        $result = mysqli_query($conex->getLinkConnect(), $sql);
        if ( !$result ) {
            //echo "<script>parent.sweetal(\"No es posible actualizar tu perfil en este momento.\");</script>";
            $exito = false;
            echo json_encode( ["respuesta" => false, "error" => 3, "msg" => "No es posible modificar este paquete en este momento." ] );
            return;
        }
        
        /********************************* INTENTAR HACER RETIRO VIRTUAL PARA REINVERTIR EN PAQUETE    *********************/
        // Consultamos el paquete a comprar
        $sql = "select paquetes_cliente.*, paquetes.*, cliente.nombre as nombre_cliente
                from paquetes_cliente
                inner join paquetes on paquetes.paquete_id = paquetes_cliente.paquete_id
                inner join cliente on cliente.cliente_id = paquetes_cliente.cliente_id
                where paquete_cliente_id = ".$codPaquete;
        $res = mysqli_query($conex->getLinkConnect(), $sql);
        $paqBuy = mysqli_fetch_array($res);
        
        $valorPaquete = $paqBuy["valor"] + $comision[$paqBuy["paquete_id"]];
        $adescontar = $valorPaquete;
        $descontado = 0;
        
        $proporcion = 0;
        $bitcoin = "";
        $banco = "";
        $tipo = "99999";
        $cuenta = "1";
        $titular = "";
        
        
        /********************************* DESCONTAR VALOR DE GANANCIAS PAQUETE    *********************/
        if ( $dataPost["opcionReinvertir"] == "1" || $dataPost["opcionReinvertir"] == "3" ) {
            
            
            
            $cliente->consultarDatosParaRetiro(false);
            $cliente->consultarRetiros();
            
            //echo "***". $cliente->dispoParaRetiro."***";
            
            if ( $cliente->dispoParaRetiro > 0 ){

                if ( $cliente->dispoParaRetiro >= $adescontar ) {
                    $valorRetiro = $adescontar;
                    $vlrComision = $comision[$paqBuy["paquete_id"]];
                    $vlrRetirar = $valorRetiro - $vlrComision;
                } else {
                    $proporcion = $cliente->dispoParaRetiro/$adescontar;
                    $valorRetiro = $cliente->dispoParaRetiro;
                    $vlrComision = $comision[$paqBuy["paquete_id"]] * $proporcion;
                    $vlrRetirar = $valorRetiro - $vlrComision;
                }
                

                $sql = "insert into retiros_cliente ( cliente_id, valor_retiro, valor_comision, valor_pagado, bitcoin, banco, cuenta, tipo_cuenta, titular, estado, tipo_retiro, fecha_pago) values "
                                                    . "( ".$_SESSION["clientId"].", '".$valorRetiro."', '".$vlrComision."', '".$vlrRetirar."', '".$bitcoin."', '".$banco."', '".$cuenta."', '".$tipo."', '".$titular."', 1, '1', '".date("Y-m-d")."' )";
                
                $result = mysqli_query($conex->getLinkConnect(), $sql);

                
                $retId = "";
                if ( !$result ) {
                    $exito = false;
                } else {
                    $retId = mysqli_insert_id($conex->getLinkConnect());
                }


                if ( $exito && !empty($retId) ) {

                    //var_export($cliente->gananciasPorPaquete); echo "******************************";
                    //var_export($cliente->misRetiros);
                    
                    $adescontar = $valorPaquete;
                    $descontado = 0;
                    foreach ( $cliente->gananciasPorPaquete as $ganPaq ) {

                        if ( $adescontar > 0 ) {
                        
                            $dispoPaquete = $ganPaq["ganancia"];

                            foreach ( $cliente->misRetiros as $ret ) {
                                if ( $ret["estado"] == 1  and is_array($ret["paquetes"]) && count($ret["paquetes"]) > 0 ) {
                                    foreach ( $ret["paquetes"] as $retx ) {
                                        if ( $retx["paquete_cliente_id"] == $ganPaq["paquete_cliente_id"] ) {
                                            $dispoPaquete -= $retx["valor_retiro"];
                                        }
                                    }
                                }
                            }

                            if ( $ganPaq["estado"] == 1 && $dispoPaquete > 1 ) {

                                $valRet = 0;
                                if ( $dispoPaquete >= $adescontar ) {
                                    $valRet = $adescontar;
                                    $adescontar = 0;
                                    $descontado += $valRet;
                                } else {
                                    $valRet = $dispoPaquete;
                                    $adescontar -= $valRet;
                                    $descontado += $valRet;
                                }

                                $sql = " insert into retiros_paquetes (retiro_cliente_id, paquete_cliente_id, valor_retiro) values "
                                        . " ($retId, ".$ganPaq["paquete_cliente_id"].", '".$valRet."' ) ";
                                $result = mysqli_query($conex->getLinkConnect(), $sql);
                                if ( !$result ) {
                                    $exito = false;
                                    break;
                                }

                            }
                        }

                    } // Foreach
                    
                }

                if ( !$exito ) {
                    mysqli_rollback($conex->getLinkConnect());
                    echo json_encode( ["respuesta" => false, "error" => 1, "msg" => "No es posible registrar tu solicitud en este momento." ] );
                } 
            }
        } 
            
        if ( $dataPost["opcionReinvertir"] == "2" || $dataPost["opcionReinvertir"] == "3" ) { // Por Referidos
            
            $exito = true;
            $cliente->consultarDatosParaRetiroReferidos();
            
            if ( $cliente->valorPendientePorReferidos > 0 ) {
            
                if ( $proporcion == 0 ) {
                    $valorRetiro = $adescontar;
                    $vlrComision = $comision[$paqBuy["paquete_id"]];
                    $valorDesc = $adescontar - $vlrComision;
                } else {
                    $proporcion = 1 - $proporcion;
                    $valorRetiro = $adescontar;
                    $vlrComision = $comision[$paqBuy["paquete_id"]] * $proporcion;
                    $valorDesc = $adescontar - $vlrComision;
                }
               

                $sql = "insert into retiros_cliente ( cliente_id, valor_retiro, valor_comision, valor_pagado, bitcoin, banco, cuenta, tipo_cuenta, titular, estado, tipo_retiro, fecha_pago ) values "
                                                        . "( ".$_SESSION["clientId"].", '".$valorRetiro."', '".$vlrComision."', '".$vlrRetirar."', '".$bitcoin."', '".$banco."', '".$cuenta."', '".$tipo."', '".$titular."', 1, '2', '".date("Y-m-d")."' )";
                $result = mysqli_query($conex->getLinkConnect(), $sql);

                $exito = true;
                $retId = "";
                if ( !$result ) {
                    $exito = false;
                } else {
                    $retId = mysqli_insert_id($conex->getLinkConnect());
                }


            }
            
        }
        
            /* //BORRAR
            mysqli_rollback($conex->getLinkConnect());
            mysqli_autocommit($conex->getLinkConnect(), TRUE); // turn ON auto
            return;*/
                  
            
        if ( !$exito ) {
            mysqli_rollback($conex->getLinkConnect());
            echo json_encode( ["respuesta" => false, "error" => 2, "msg" => "No es posible registrar tu solicitud en este momento." ] );
        } else {
            
            mysqli_commit($conex->getLinkConnect());
            //$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
            //$headers = 'Bcc: '.CORREO_ADMIN . "\r\n";
            $mail = new mailWTC();
            $paramsMail = [];
            $paramsMail["to"] = CORREO_ADMIN;
            $paramsMail["subject"] = "Compra de paquete por re-inversion";
            $paramsMail["messageTitle"] = "Compra de paquete por re-inversion (US$ ".$paqBuy["valor"].")";
            $paramsMail["messageBody"] = "El cliente ".$paqBuy["nombre_cliente"]." ha comprado un paquete ".$paqBuy["nombre"]." por medio de re inversion de ganancias. ";
            $mail->enviarMail($paramsMail);

            $paramsMail["to"] = $paqBuy["correo"];
            $paramsMail["subject"] = "Compra de paquete por re-inversion";
            $paramsMail["messageTitle"] = "Compra de paquete por re-inversion (US$ ".$paqBuy["valor"].")";
            $paramsMail["messageBody"] = "Hola ".$paqBuy["nombre_cliente"]."! <br><br>Te informamos que la compra de tu paquete ".$paqBuy["nombre"]." por medio de re inversion de ganancias ha sido exitoso, ademas te informamos que tu nuevo paquete comenzara su vigencia dentro de los proximos 5 dias. ";
            $mail->enviarMail($paramsMail);

            
            //mysqli_rollback($conex->getLinkConnect());
            echo json_encode( ["respuesta" => true, "msg" => "Tu solicitud se ha registrado, revisa en tu correo la confirmacion de tu compra." ] );
        }
            
        
        
        mysqli_autocommit($conex->getLinkConnect(), TRUE); // turn ON auto
    }
    
    
}
