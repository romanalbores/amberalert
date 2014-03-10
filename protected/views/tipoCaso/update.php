<?php
$this->breadcrumbs=array(
	'Tipo Casos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoCaso','url'=>array('index')),
	array('label'=>'Create TipoCaso','url'=>array('create')),
	array('label'=>'View TipoCaso','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoCaso','url'=>array('admin')),
	);
	?>

	<h1>Update TipoCaso <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>