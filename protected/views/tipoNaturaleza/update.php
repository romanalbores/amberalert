<?php
$this->breadcrumbs=array(
	'Tipo Naturaleza'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Nuevo','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Tipo de Naturaleza <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>