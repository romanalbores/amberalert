<?php
$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Incidencia','url'=>array('index')),
array('label'=>'Manage Incidencia','url'=>array('admin')),
);
?>

<h1>Crear Incidencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelIncidenciaTiempo' => $modelIncidenciaTiempo)); ?>