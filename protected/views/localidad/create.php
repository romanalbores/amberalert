<?php
/* @var $this LocalidadController */
/* @var $model Localidad */

$this->breadcrumbs=array(
	'Localidades'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Registrar Localidad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>