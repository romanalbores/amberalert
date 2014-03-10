<?php
$this->breadcrumbs=array(
	'Imagens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List Imagen','url'=>array('index')),
	array('label'=>'Create Imagen','url'=>array('create')),
	array('label'=>'View Imagen','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Imagen','url'=>array('admin')),
	);
	?>

	<h1>Update Imagen <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>