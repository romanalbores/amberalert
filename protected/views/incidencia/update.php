<?php
$this->breadcrumbs=array(
	'Incidencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Incidencia','url'=>array('index')),
	array('label'=>'Create Incidencia','url'=>array('create')),
	array('label'=>'View Incidencia','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Incidencia','url'=>array('admin')),
	);
	?>

	<h1>Update Incidencia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>