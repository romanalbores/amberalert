<?php
$this->breadcrumbs=array(
	'Tipo Relacion Victimas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoRelacionVictima','url'=>array('index')),
	array('label'=>'Create TipoRelacionVictima','url'=>array('create')),
	array('label'=>'View TipoRelacionVictima','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoRelacionVictima','url'=>array('admin')),
	);
	?>

	<h1>Update TipoRelacionVictima <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>