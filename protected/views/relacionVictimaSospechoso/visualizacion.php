<h3>Seleccione los horario de visualización</h3>
<?php
$command = AlrtConfiguracionDiaHora::model()->obtenerHorarioSecond();
?>

<table class="table table-striped table-hover table-config">
    <thead>
        <tr>
            <th></th>
            <th>Día</th>
            <th>Hora Inicio</th>
            <th>Hora Fin</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($command as $hora_despliegue) {
        echo "<tr>";
        echo "<td><label><input type='checkbox' name='RelacionVictimaSospechoso[$i]' class='chk-visulizacion' data-id='".$hora_despliegue['id_config']."' data-dia='".$hora_despliegue['nombre_corto']."' data-hora_inicio='".$hora_despliegue['hora_inicio']."' data-hora_fin='".$hora_despliegue['hora_fin']."'></td>";
        echo "<td>".$hora_despliegue['nombre_corto']."</td></label>";
        echo "<td>".$hora_despliegue['hora_inicio']."</td>";
        echo "<td>".$hora_despliegue['hora_fin']."</td>";
        //echo $hora_despliegue['dia']." -- ".$hora_despliegue['hora_inicio']." -- ".$hora_despliegue['hora_fin'];
        echo "</tr>";
        $i++;
    }
    ?>
    </tbody>
</table>
<div>
    <div id="visualizacion-label-error" class="alert alert-error">Seleccione al menos una opción</div>
</div>
<br>
<!--<button id="btn-chk-visualizacion">contar</button>-->
<button id="visualizacion-btn-continuar" class="btn btn-primary" style="float: left">Continuar</button>