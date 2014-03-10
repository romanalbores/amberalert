<?php
$this->breadcrumbs=array(
	'Puestos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Puesto','url'=>array('index')),
	array('label'=>'Create Puesto','url'=>array('create')),
	array('label'=>'View Puesto','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Puesto','url'=>array('admin')),
	);
	?>

	<h1>Update Puesto <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>