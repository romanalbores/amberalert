<?php
$this->breadcrumbs=array(
	'Organizacions'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Organizacion','url'=>array('index')),
	array('label'=>'Create Organizacion','url'=>array('create')),
	array('label'=>'View Organizacion','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Organizacion','url'=>array('admin')),
	);
	?>

	<h1>Update Organizacion <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>