<?php
$this->breadcrumbs=array(
	'Teléfonos'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Nuevo Teléfono</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>