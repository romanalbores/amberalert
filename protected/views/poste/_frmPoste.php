<label for="">Poste</label>
<?php
if(sizeof($modelPoste)>0)
{
    ?>
    <select id="cboPoste" name="cboPoste" class="cboPoste" required>
        <option value="">- Seleccione -
            <?php
            foreach ($modelPoste as $fila) {
                echo "<option value=".$fila['id'].">".$fila['nombre'];
            }
            ?>
    </select>
    <?php
}
else
{
?>
<select id="cboPoste" name="cboPoste" class="cboPoste" required>
    <option value="">- Seleccione -
</select>
<?php
}
