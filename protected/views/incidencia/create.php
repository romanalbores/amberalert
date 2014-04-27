<?php
$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
/**
* INCLUDES DE SCRIPTS
*/
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . "/js/functions.js", CClientScript::POS_END
);
Yii::app()->clientScript->registerScriptFile(
	Yii::app()->request->baseUrl . "/js/incidencia.js", CClientScript::POS_END
);
?>

Este es un comentario de prueba para el commit para ver que se haya hecho la modificación 

<h1>Crear Incidencia</h1>

<?php echo $this->renderPartial('_form', 
            array('model'=>$model,
                'modelIncidenciaTiempo' => $modelIncidenciaTiempo,
                'modelPersonaMenor' => $modelPersonaMenor,
                'modelPersonaMenorCaracteristica' => $modelPersonaMenorCaracteristica,
                'modelPersonaMenorVestimenta' => $modelPersonaMenorVestimenta,
                'returnStep' => $returnStep
            )
        ); 
?>