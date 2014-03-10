<?php
$this->breadcrumbs=array(
	'Telefono Personas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List TelefonoPersona','url'=>array('index')),
array('label'=>'Manage TelefonoPersona','url'=>array('admin')),
);
?>

<h1>Create TelefonoPersona</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>