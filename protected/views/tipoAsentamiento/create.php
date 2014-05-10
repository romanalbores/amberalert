<?php
$this->breadcrumbs=array(
	'Tipo de Asentamiento'=>array('index'),
	'Registrar',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Registrar TipoAsentamiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>