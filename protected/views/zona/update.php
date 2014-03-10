<?php
$this->breadcrumbs=array(
	'Zonas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Zona','url'=>array('index')),
	array('label'=>'Create Zona','url'=>array('create')),
	array('label'=>'View Zona','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Zona','url'=>array('admin')),
	);
	?>

	<h1>Update Zona <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>