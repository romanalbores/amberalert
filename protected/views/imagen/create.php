<?php
$this->breadcrumbs=array(
	'Imágenes'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Registrar Imagen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>