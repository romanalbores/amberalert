<?php
$this->breadcrumbs=array(
	'Configuracion Horas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ConfiguracionHora','url'=>array('index')),
	array('label'=>'Create ConfiguracionHora','url'=>array('create')),
	array('label'=>'View ConfiguracionHora','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ConfiguracionHora','url'=>array('admin')),
	);
	?>

	<h1>Update ConfiguracionHora <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>