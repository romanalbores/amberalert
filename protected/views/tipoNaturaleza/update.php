<?php
$this->breadcrumbs=array(
	'Tipo Naturalezas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoNaturaleza','url'=>array('index')),
	array('label'=>'Create TipoNaturaleza','url'=>array('create')),
	array('label'=>'View TipoNaturaleza','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoNaturaleza','url'=>array('admin')),
	);
	?>

	<h1>Update TipoNaturaleza <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>