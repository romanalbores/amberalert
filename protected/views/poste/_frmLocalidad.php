<label for="">Localidad</label>
<?php
if(sizeof($modelLocalidad)>0)
{
    ?>
    <select id="cboLocalidad" name="cboLocalidad" class="cboLocalidad" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelLocalidad as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboLocalidad" name="cboLocalidad" class="cboLocalidad" required>
    <option value="">- Seleccione -
</select>
<?php
}
?>
<script type="text/javascript">
//se envia la zona para buscar el tipo de poste
$("#cboLocalidad").change(function(){
    var localidad = $('select[class=cboLocalidad]').val();
    if(localidad.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarAsentamiento');?>',
            data: {localidad:localidad},
            success:function(data){
              $("#frmAsentamiento").html(data);
            }
        });
    }
});
</script><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

