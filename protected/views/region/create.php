<?php
$this->breadcrumbs=array(
	'Regiones'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Nueva Region</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>