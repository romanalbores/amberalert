<?php
Yii::app()->clientScript->registerScript('helpers', '
    yii_profile = {
        urls: {                                                                                                 
            verImagen: '.CJSON::encode(Yii::app()->createUrl('relacionVictimaSospechoso/verImagen')).',
            detalleSemana: '.CJSON::encode(Yii::app()->createUrl('relacionVictimaSospechoso/detalleSemana')).',
            guardarConfiguracion: '.CJSON::encode(Yii::app()->createUrl('relacionVictimaSospechoso/guardarConfiguracion')).',
            guardarConfiguracionPoste: '.CJSON::encode(Yii::app()->createUrl('relacionVictimaSospechoso/guardarConfiguracionPoste')).',
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
<h2 class="alert alert-info">
    Configuración de reporte
</h2>
<div id="container-config">
    <?php
    $form=$this->beginWidget('CActiveForm');
?>
    <div id="container-visualizacion">
        <?php $this->renderPartial("visualizacion") ?>
    </div>
    <div id="container-ubicacion">
        <?php $this->renderPartial("ubicacionPoste") ?>
    </div>
    <div id="container-finalizar">
        <?php 
            $data = RelacionVictimaSospechoso::model()->find(RelacionVictimaSospechoso::model()->getById($id_relacion));
            $data_incidencia = $data['id_incidencia'];
            $data_suceso = Incidencia::model()->find(Incidencia::model()->getById($data_incidencia));
            $suceso = $data_suceso['suceso'];
            $this->renderPartial("finalizarCaptura", array("id_relacion"=>$id_relacion, "suceso"=>$suceso)); 
        ?>
    </div>
    <?php
        $this->endWidget();	
    ?>
</div>