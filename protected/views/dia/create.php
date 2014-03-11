<?php
$this->breadcrumbs=array(
	'Dias'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Create Dia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>