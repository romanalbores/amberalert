<?php
$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

Este es un comentario de prueba para el commit para ver que se haya hecho la modificación 

<h1>Crear Incidencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelIncidenciaTiempo' => $modelIncidenciaTiempo)); ?>