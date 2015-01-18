<script type="text/javascript" src="<?php echo Yii::app()->baseUrl ?>/js/jsFunciones.js"></script>
<h1>Nuevo Poste</h1>
<div class="container">
<form action="" method="post">
    <p class="help-block">Los campos con <span class="required">*</span> son requeridos.</p>

    <div class="inputForm">
        <label for="">Oficinas</label>
        <select id="cboOficina" name="cboOficina" class="cboOficina" required>
            <option value="">- Seleccione -
            <?php
                foreach ($modelOficina as $fila) {
                    echo "<option value=".$fila['id'].">".$fila['nombre'];
                }
            ?>
        </select>
    </div>    
    <div id="frmZona">
        <?php
            $parametros = array(
                "modelZona" => array(),
            );
            $this->renderPartial("_frmZona", $parametros);
        ?>
    </div>
    <div id="frmPoste">
        <?php
            $parametros = array(
                "modelPoste" => array(),
            );
            $this->renderPartial("_frmPoste", $parametros);
        ?>
    </div>
    <div class="inputForm">
        <label for="txtCodigo">Código</label>
        <input type="text" id="txtCodigo" name="txtCodigo" style="width: 456px; display: inline-block" required/>
    </div>
    <div class="inputForm">
        <label for="txtDescripcion">Descripción</label>
        <textarea name="txtDescripcion" rows="5" style="width: 456px" required></textarea>
    </div>
    <div class="inputForm">
        <label for="cboEstatus" id="">Estatus</label>
        <select required id="cboEstatus">
            <option value="ACTIVO">ACTIVO
            <option value="INACTIVO">INACTIVO
        </select>
    </div>
    <div class="inputForm">        
        <label for="txtIp">Dirección IP</label>
        <input type="text" id="txtIp" name="txtIp" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <label for="txtLatitud">Latitud</label>
        <input type="text" id="txtLatitud" name="txtLatitud" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <label for="txtLongitud">Longitud</label>
        <input type="text" id="txtLongitud" name="txtLongitud" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <label for="txtAltitud">Altitud</label>
        <input type="text" id="txtAltitud" name="txtAltitud" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <?php
            $this->renderPartial("_frmPais")
        ?>
    </div>
    <div class="inputForm" id="frmEstado">
        <?php
            $parametros = array(
                "modelEstado" => array(),
            );
            $this->renderPartial("_frmEstado", $parametros);
        ?>
    </div>
    <div class="inputForm" id="frmMunicipio">
        <?php
            $parametros = array(
                "modelMunicipio" => array(),
            );
            $this->renderPartial("_frmMunicipio", $parametros);
        ?>
    </div>
    <div class="inputForm" id="frmLocalidad">
        <?php
            $parametros = array(
                "modelLocalidad" => array(),
            );
            $this->renderPartial("_frmLocalidad", $parametros);
        ?>
    </div>
    
    <div class="inputForm" id="frmAsentamiento">
        <?php
            $parametros = array(
                "modelAsentamiento" => array(),
            );
            $this->renderPartial("_frmAsentamiento", $parametros);
        ?>
    </div>
    <div class="inputForm">
        <label for="txtCalle">Calle</label>
        <input type="text" id="txtCalle" name="txtCalle" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <label for="txtColonia">Colonia</label>
        <input type="text" id="txtColonia" name="txtColonia" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <label for="txtLocalidad">Localidad</label>
        <input type="text" id="txtLocalidad" name="txtLocalidad" style="width: 456px" required/>
    </div>
    <div class="inputForm">
        <label for="txtCodigoPostal">Codigo Postal</label>
        <input type="text" id="txtCodigoPostal" name="txtCodigoPostal" style="width: 456px" required/>
    </div>
    <div class="inputForm">
<!--        <button >Guardar</button>-->
        <input type="submit" value="Guardar" id="btnGuardarDataPoste" class="btn btn-primary"/>
    </div>
</form>
</div>
<div class="respuesta"></div>
<script type="text/javascript">
//se envia la oficina para busca la zona
$("#cboOficina").change(function(){
    var oficina = $('select[class=cboOficina]').val();
    if(oficina.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarZona');?>',
            data: {oficina:oficina},
            success:function(data){
              $("#frmZona").html(data);
            }
        });
    }
});


$("#btnGuardarDataPoste").click(function(e){
    e.preventDefault();
    //Capturamos los valores de para la tabla cata_direccion
    var id_asentamiento = $("#cboAsentamiento").val();
    var calle = $("#txtCalle").val();
    var colonia = $("#txtColonia").val();
    var localidad = $("#txtLocalidad").val();
    var codigo_postal = $("#txtCodigoPostal").val();
    var estatus = $("#cboEstatus").val();

    //Capturamos los datos de la tabla data poste direccion
    var id_zona = $("#cboZona").val()
    var dir_ip = $("#txtIp").val();
    var latitud = $("#txtLatitud").val();
    var longitud =$("#txtLongitud").val();
    var altitud = $("#txtAltitud").val();
    
    var id_poste = $("#cboPoste").val()
    
    console.log(id_zona);
    console.log(dir_ip);
    console.log(latitud);
    console.log(altitud);
    console.log(longitud);
    $.ajax({
        type: "POST",
        url: '<?php echo $this->createUrl('/poste/guardarPoste');?>',
        data: {id_asentamiento:id_asentamiento, calle:calle, colonia:colonia, localidad:localidad, codigo_postal:codigo_postal, estatus:estatus, id_poste:id_poste, id_zona:id_zona, dir_ip:dir_ip, latitud:latitud, longitud:longitud, altitud:altitud}, 
        success:function(data){
          $(".respuesta").html(data);
        }
    });
});
</script>