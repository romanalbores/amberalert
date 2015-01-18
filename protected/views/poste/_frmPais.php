<script type="text/javascript">
$("document").ready(function(){
    //Eligmemos a mexico
    var pais = 156;
    if(pais.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarEstado');?>',
            data: {pais:pais},
            success:function(data){
              $("#frmEstado").html(data);
            }
        });
    }
});
</script>

<label for="">País</label>
<?php
$modelPais = Pais::model()->findAll();
if(sizeof($modelPais)>0)
{
    ?>
    <select id="cboPais" name="cboPais" class="cboPais" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelPais as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboPais" name="cboPais" class="cboPais" required>
    <option value="">- Seleccione -
</select>
<?php
}
?>
<script type="text/javascript">   
//se envia la zona para buscar el tipo de poste
$("#cboPais").change(function(){
    var pais = $('select[class=cboPais]').val();
    if(pais.length > 0)
    {
        $.ajax({
            type: "POST",
            url: '<?php echo $this->createUrl('/poste/buscarEstado');?>',
            data: {pais:pais},
            success:function(data){
              $("#frmEstado").html(data);
            }
        });
    }
});
</script>