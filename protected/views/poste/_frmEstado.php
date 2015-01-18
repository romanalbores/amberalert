<label for="">Estado</label>
<?php
if(sizeof($modelEstado)>0)
{
    ?>
    <select id="cboEstado" name="cboEstado" class="cboEstado" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelEstado as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboEstado" name="cboEstado" class="cboEstado" required>
    <option value="">- Seleccione -
</select>
<?php
}
?>
<script type="text/javascript">
//se envia la zona para buscar el tipo de poste
$("#cboEstado").change(function(){
    var estado = $('select[class=cboEstado]').val();
    if(estado.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarMunicipio');?>',
            data: {estado:estado},
            success:function(data){
              $("#frmMunicipio").html(data);
            }
        });
    }
});
</script>