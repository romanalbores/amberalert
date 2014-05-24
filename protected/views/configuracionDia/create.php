<?php
$this->breadcrumbs=array(
	'Configuracion de Dia y Hora'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Nueva Configuración de Dia y Hora</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDH'=>$modelDH)); ?>