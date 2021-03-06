
<div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">Administrar Paquetes Clientes</div>
    <div class="panel-content">
    
        
        <form class="form-inline" onsubmit="consultarPaquetes(); return false;" id="formSearch" name="formSearch">
            <div class="form-group">
              <label for="estado">Estado:</label>
              <?php
                $admin = new admin();
                $estados = $admin->getEstados();
                $precargar = "0";
                echo '<select class="form-control" name="paqestado" id="paqestado">';
                if ( isset($_SESSION["busqueda_estado"]) && $_SESSION["busqueda_estado"] != "" ) {
                    $precargar = $_SESSION["busqueda_estado"];
                }
                foreach ( $estados as $k => $est){
                    if ( $k == "-1" ) { $k = ""; }
                    echo "<option value='$k' ";
                    if ( $k == $precargar ){ echo " selected "; }
                    echo ">$est</option>";
                }
                echo "</select>"
              ?>
            </div>
            <div class="form-group">
              <label for="pwd">Inicio Compra:</label>
              <input type="date" class="form-control" id="date1" id="iniCompra" name="iniCompra">
            </div>
            <div class="form-group">
              <label for="pwd">Fin Compra:</label>
              <input type="date" class="form-control" id="date2" id="finCompra" name="finCompra">
            </div>
            <!--<div class="form-group">
              <label for="estado">Cliente:</label>
              <input type="text" class="form-control" id="cliente" name="cliente">
            </div> -->
            <button type="submit" class="btn btn-regg">Buscar</button>
        </form> 
        
        <div name="listaPaquetes" id="listaPaquetes">
        
        </div>
        
    </div>
</div>





<!-- Modal -->
<div id="modalPaq" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" name="modal-title" id="modal-title">Modal Header</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="modal-body" name="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer" id="modal-footer" name="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>




<script src="js/jquery.mask.min.js"></script>
<script>
    $( document ).ready(function() {
        buscarListaPaquetes();
        
        $('.money').mask('000.000.000.000.000,00', {reverse: true});
    });
    
    
</script>