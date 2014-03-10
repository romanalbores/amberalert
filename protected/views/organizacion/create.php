<?php
$this->breadcrumbs=array(
	'Organizacions'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List Organizacion','url'=>array('index')),
array('label'=>'Manage Organizacion','url'=>array('admin')),
);
?>

<h1>Create Organizacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>