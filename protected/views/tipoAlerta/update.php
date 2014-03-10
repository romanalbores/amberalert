<?php
$this->breadcrumbs=array(
	'Tipo Alertas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoAlerta','url'=>array('index')),
	array('label'=>'Create TipoAlerta','url'=>array('create')),
	array('label'=>'View TipoAlerta','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoAlerta','url'=>array('admin')),
	);
	?>

	<h1>Update TipoAlerta <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>