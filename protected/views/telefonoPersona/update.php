<?php
$this->breadcrumbs=array(
	'Teléfono Personas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

	$this->menu=array(
	array('label'=>'Listar','url'=>array('index')),
	array('label'=>'Actualizar','url'=>array('create')),
	array('label'=>'Ver','url'=>array('view','id'=>$model->id)),
	array('label'=>'Administrar','url'=>array('admin')),
	);
	?>

	<h1>Actualizar Teléfono Persona <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>