<?php
$this->breadcrumbs=array(
	'Telefono Personas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TelefonoPersona','url'=>array('index')),
	array('label'=>'Create TelefonoPersona','url'=>array('create')),
	array('label'=>'View TelefonoPersona','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TelefonoPersona','url'=>array('admin')),
	);
	?>

	<h1>Update TelefonoPersona <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>