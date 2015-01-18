<label for="">Zona</label>
<?php
if(sizeof($modelZona)>0)
{
    ?>
<select id="cboZona" name="cboZona" class="cboZona" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelZona as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboZona" name="cboZona" class="cboZona" required>
    <option value="">- Seleccione -
</select>
<?php
}
?>
<script type="text/javascript">
//se envia la zona para buscar el tipo de poste
$("#cboZona").change(function(){
    var zona = $('select[class=cboZona]').val();
    if(zona.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarPoste');?>',
            data: {zona:zona},
            success:function(data){
              $("#frmPoste").html(data);
            }
        });
    }
});
</script>