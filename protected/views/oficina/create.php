<?php
$this->breadcrumbs=array(
	'Oficinas'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Nueva Oficina</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>