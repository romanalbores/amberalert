<?php
Yii::app()->clientScript->registerScript('helpers', '
    yii_profile = {
        urls: {                                                                                                 
            verImagen: '.CJSON::encode(Yii::app()->createUrl('relacionVictimaSospechoso/verImagen')).',
        }
    };
',CClientScript::POS_END);
Yii::app()->getClientScript()->registerScriptFile(Yii::app()->theme->baseUrl . '/js/victima_sospechoso.js', CClientScript::POS_END);
?>
<?php
    //Para el scroll
    $cs=Yii::app()->clientScript;
    $cs->registerCSSFile(Yii::app()->theme->baseUrl .'/css/victima_sospechoso.css');
?>
<h3>
    Relación Victima-Sospechoso
</h3>
<div class="container">
    <div class="row-fluid">
        <div class="span6">
            &nbsp;
        </div>
        <div class="span6" id='imagen_victima' style="display: none">
        </div>
    </div>
    <div class="fixed"></div>
    <div class="fixed"></div>
</div>
<table class="table table-hover">
    <thead>
        <th>ID</th>
        <th>Victima</th>
        <th>Incidencia</th>
        <th>Sospechoso</th>
        <th>Relacion</th>
        <th>Fecha Avistamiento</th>
        <th colspan="2">Opciones</th>
    </thead>
    <tbody>
<?php
foreach ($model as $value) {
    $victima = Persona::model()->find(Persona::model()->getById($value['id_persona_victima']));
    $nombre = $victima['nombre'];
    $apellidos = $victima['apellido_paterno'].$victima['apellido_materno'];
    
    $incidencia = Incidencia::model()->find(Incidencia::model()->getById($value['id_incidencia']));
    
    echo "<tr>";
    echo "<td>".$value['id']."</td>";
    echo "<td>".$nombre." ".$apellidos."</td>";    
    echo "<td>".$incidencia['suceso']."</td>";
    echo "<td>".$value['id_persona_sospechoso']."</td>";    
    echo "<td>".$value['id_tipo_relacion']."</td>";
    echo "<td>".$value['fecha_avistamiento']."</td>";
    echo "<td class='rel_vict_sospechoso_sospechoso' data-victima='".$value['id_persona_victima']."'>Ver victima</td>";
    #echo "<td class='rel_vict_conf' data-sospechoso='".$value['id']."'>Configurar Visualizacion</td>";
    echo "<td>";
    echo CHtml::link('Configurar Visualiazcion',array('relacionVictimaSospechoso/config',
                                         'id'=>$value['id'])); 
    echo "</td>";
    ?>        
    <?php
    echo "<tr>";
}
?>
    </tbody>
</table>