<?php
$this->breadcrumbs=array(
	'Puestos'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Puesto','url'=>array('index')),
array('label'=>'Manage Puesto','url'=>array('admin')),
);
?>

<h1>Create Puesto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>