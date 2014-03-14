<?php
$this->breadcrumbs=array(
	'Tipo Relacion Victimas'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Nuevo Tipo de Relacion con la Victima</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>