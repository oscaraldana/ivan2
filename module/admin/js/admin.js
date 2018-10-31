/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


function consultarPaquetes (){
    buscarListaPaquetes();
}


function consultarRetiros () {
    buscarListaRetiros();
}

function buscarListaPaquetes(){
   
   var parametros = {
        "formSearch" : true,
        "datosForm" : $("#formSearch").serialize()
    };
    $.ajax({
                data:  parametros,
                url:   'controller.php',
                type:  'post',
                
                success:  function (response) {
                        var result = JSON.parse(response);
                        if ( result.respuesta ) {
                            $("#listaPaquetes").html(result.tabla);
                            $('#tablePaqAdmin').DataTable();
                            //swal(result.msg);

                        } else {
                            swal(result.msg);
                        }
                }
    });
    
}

function buscarListaRetiros(){
   
   var parametros = {
        "formSearchRet" : true,
        "datosForm" : $("#formSearch").serialize()
    };
    $.ajax({
                data:  parametros,
                url:   'controller.php',
                type:  'post',
                
                success:  function (response) {
                        var result = JSON.parse(response);
                        if ( result.respuesta ) {
                            $("#listaRetiros").html(result.tabla);
                            $('#tableRetAdmin').DataTable();
                            //swal(result.msg);

                        } else {
                            swal(result.msg);
                        }
                }
    });
    
}

function editarPaquete (id) {
    
    var parametros = {
            "consultapaquete" : true,
            "paquete_id" : id
        };
        $.ajax({
                    data:  parametros,
                    url:   'controller.php',
                    type:  'post',
                    /*beforeSend: function () {
                            $("#homeContent").html("Procesando, espere por favor...");
                    },*/
                    success:  function (response) {
                            var result = JSON.parse(response);
                            
                        
                            if ( result.respuesta ) {
                                
                                var mostrar = 'none';
                                if ( result.datos.estado == '1' ){
                                    mostrar = true;
                                }
    
    
                                $("#modal-title").html("Administrar Paquete");
                                $("#modal-body").html("<form onsubmit='return false;' id='formactpaq' ><table class='table'>"+
                                                      "<tr><td>Cliente:</td><td class='text-right'>"+result.datos.nombre+"<td></tr>"+
                                                      "<tr><td>Paquete:</td><td class='text-right'>"+result.datos.paquete+"<td></tr>"+
                                                      "<tr><td>Valor:</td><td class='text-right'>COP $ <input type='text' value='"+result.datos.valor+"' style='text-align:right;' name='valorPaqAprobar' id='valorPaqAprobar' class='money'><td></tr>"+
                                                      "<tr><td>Fecha de compra:</td><td class='text-right'>"+result.datos.fecha_registro+"<td></tr>"+
                                                      "<tr><td>Tipo de pago:</td><td class='text-right'>"+result.datos.tipo_pago+"<td></tr>"+
                                                      "<tr><td>Referencia Pago:</td><td class='text-right'>"+result.datos.referencia_pago+"<td></tr>"+
                                                      result.ganancias_dispo+
                                                      "<tr><td>Estado:</td><td class='text-right'>"+result.estados+"<td></tr>"+
                                                      "<tr id='fecinipaq' style='display:"+mostrar+";'><td>Fecha Inicio:</td><td class='text-right'><input type='date' value='"+result.datos.inicia+"' id='datefecinipaq' name='datefecinipaq' class='form-control' onchange='cambiaFechaFin()'><td></tr>"+
                                                      "<tr id='fecfinpaq' style='display:"+mostrar+";'><td>Fecha Fin:</td><td class='text-right'><input type='date' value='"+result.datos.finaliza+"' id='datefecfinpaq' name='datefecfinpaq' class='form-control'><td></tr>"+
                                                      "</table><input type='hidden' id='paquete_id' name='paquete_id' value='"+id+"'></form>"

                                                     );
                                $("#modal-footer").html('<input type="submit" class="btn btn-logg" style="font-size: 10px;" value="Guardar" onclick="modificarPaquete()"><button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 10px;">Cancelar</button>');           
                                $("#modalPaq").modal();
                                $('.money').mask('000.000.000.000.000', {reverse: true});
                            } else {
                                swal(result.msg);
                            }
                    }
        });
}


function cambiaFechaFin () {
    
    var inicio = $("#datefecinipaq").val();
    vec = inicio.split('-'); // Parsea y pasa a un vector
    var fecha = new Date(vec[0], vec[1], vec[2]); // crea el Date
    fecha.setFullYear(fecha.getFullYear()+1); // Hace el cálculo
    res = fecha.getFullYear()+'-'+ ((fecha.getMonth() < 10 ) ? '0'+fecha.getMonth() : fecha.getDate()) +'-'+ ((fecha.getDate() < 10) ? '0'+fecha.getDate() : fecha.getDate()) ;
    $("#datefecfinpaq").val(res);
    
}


function editarRetiro (id) {
    
    var parametros = {
            "consultaretiro" : true,
            "retiro_id" : id
        };
        $.ajax({
                    data:  parametros,
                    url:   'controller.php',
                    type:  'post',
                    /*beforeSend: function () {
                            $("#homeContent").html("Procesando, espere por favor...");
                    },*/
                    success:  function (response) {
                            var result = JSON.parse(response);
                            
                        
                            if ( result.respuesta ) {
                                
                                
    
                                $("#modal-title").html("Administrar Retiro");
                                $("#modal-body").html("<form onsubmit='return false;' id='formactret' ><table class='table'>"+
                                                      "<tr><td>Cliente:</td><td class='text-right'>"+result.datos.nombre+"<td></tr>"+
                                                      "<tr><td>Valor:</td><td class='text-right'>US$ <b>"+result.datos.valor_retiro+"<b><td></tr>"+
                                                      "<tr><td>Fecha de solicitud:</td><td class='text-right'>"+result.datos.fecha_solicitud+"<td></tr>"+
                                                      "<tr><td>Tipo de pago:</td><td class='text-right'>"+result.datos.tipo_des+"<td></tr>"+
                                                      ""+result.formaPago+""+
                                                      "<tr><td>Estado:</td><td class='text-right'>"+result.estados+"<td></tr>"+
                                                      "</table><input type='hidden' id='retiro_id' name='retiro_id' value='"+id+"'></form>"

                                                     );
                                $("#modal-footer").html('<input type="submit" class="btn btn-logg" style="font-size: 10px;" value="Guardar" onclick="modificarRetiro()"><button type="button" class="btn btn-default" data-dismiss="modal" style="font-size: 10px;">Cancelar</button>');           
                                $("#modalPaq").modal();
    //"<tr><td>Referencia Pago:</td><td class='text-right'>"+result.datos.referencia_pago+"<td></tr>"+
                                                      
                            } else {
                                swal(result.msg);
                            }
                    }
        });
}



function validarEstadoPaq() {
    var estadoSel = $("#selectEstado").val();
    
    if ( estadoSel == '1' ) {
        $("#fecinipaq").show();
        $("#fecfinpaq").show();
    } else {
        $("#fecinipaq").hide();
        $("#fecfinpaq").hide();
    }
}


function modificarPaquete(){
    
    
    var parametros = {
        "actualizarPaquete" : true,
        "datosForm" : $("#formactpaq").serialize()
    };
    $.ajax({
                data:  parametros,
                url:   'controller.php',
                type:  'post',
                
                success:  function (response) {
                        var result = JSON.parse(response);
                        if ( result.respuesta ) {
                            consultarPaquetes();
                            swal(result.msg);
                            $("#modalPaq").modal('hide');

                        } else {
                            swal(result.msg);
                        }
                }
    });
}


function modificarRetiro(){
    
    
    var parametros = {
        "actualizarRetiro" : true,
        "datosForm" : $("#formactret").serialize()
    };
    $.ajax({
                data:  parametros,
                url:   'controller.php',
                type:  'post',
                
                success:  function (response) {
                        var result = JSON.parse(response);
                        if ( result.respuesta ) {
                            consultarPaquetes();
                            swal(result.msg);
                            $("#modalPaq").modal('hide');

                        } else {
                            swal(result.msg);
                        }
                }
    });
}

$(".number").on({
    "focus": function (event) {
        $(event.target).select();
    },
    "keyup": function (event) {
        $(event.target).val(function (index, value ) {
            return value.replace(/\D/g, "")
                        .replace(/([0-9])([0-9]{2})$/, '$1.$2')
                        .replace(/\B(?=(\d{3})+(?!\d)\.?)/g, ",");
        });
    }
});