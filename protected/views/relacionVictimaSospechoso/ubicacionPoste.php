
<h3>Seleccione las ubicaciones de visualización</h3>
<?php
    $query = AlrtConfiguracionDiaHora::model()->ubicacionPoste();
?>
<table class="table table-striped table-hover table-config">
    <thead>
        <tr>
            <th></th>
            <th>Poste</th>
            <th>Calle</th>
            <th>Colonia</th>
            <th>Localidad</th>
            <th>Zona</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $i = 1;
    foreach ($query as $ubicacion) {
        echo "<tr>";
        echo "<td><label><input type='checkbox' name='ubicacion[$i]' data-direccion='$i' class='chk-ubicacion' data-id='".$ubicacion['id']."' data-poste='".$ubicacion['poste']."' data-calle='".$ubicacion['calle']."' data-colonia='".$ubicacion['colonia']."' data-localidad='".$ubicacion['localidad']."' data-zona='".$ubicacion['zona']."'></td>";
        echo "<td>".$ubicacion['poste']."</td></label>";
        echo "<td>".$ubicacion['calle']."</td>";
        echo "<td>".$ubicacion['colonia']."</td>";
        echo "<td>".$ubicacion['localidad']."</td>";
        echo "<td>".$ubicacion['zona']."</td>";
        //echo $hora_despliegue['dia']." -- ".$hora_despliegue['hora_inicio']." -- ".$hora_despliegue['hora_fin'];
        echo "</tr>";
        $i++;
    }
    ?>
    </tbody>        
</table>
<div>
    <span id="ubicacion-label-error" class="alert alert-error">Seleccione al menos una opción</span>
</div>
<button id="ubicacion-btn-atras" class="btn" style="float: left">Atras</button>
<button id="ubicacion-btn-continuar" class="btn btn-primary" style="float: right">Continuar</button>    
