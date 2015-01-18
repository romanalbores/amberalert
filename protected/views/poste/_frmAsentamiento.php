<label for="">Asentamientos</label>
<?php
if(sizeof($modelAsentamiento)>0)
{
    ?>
    <select id="cboAsentamiento" name="cboAsentamiento" class="cboAsentamiento" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelAsentamiento as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboAsentamiento" name="cboLocalidad" class="cboAsentamiento" required>
    <option value="">- Seleccione -
</select>
<?php
}
 