<label for="">Municipio</label>
<?php
if(sizeof($modelMunicipio)>0)
{
    ?>
    <select id="cboMunicipio" name="cboMunicipio" class="cboMunicipio" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelMunicipio as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboMunicipio" name="cboMunicipio" class="cboMunicipio" required>
    <option value="">- Seleccione -
</select>
<?php
}
?>
<script type="text/javascript">
//se envia la zona para buscar el tipo de poste
$("#cboMunicipio").change(function(){
    var municipio = $('select[class=cboMunicipio]').val();
    if(municipio.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarLocalidad');?>',
            data: {municipio:municipio},
            success:function(data){
              $("#frmLocalidad").html(data);
            }
        });
    }
});
</script>