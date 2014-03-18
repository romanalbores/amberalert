<?php
$this->breadcrumbs=array(
	'Dirección'=>array('index'),
	'Nuevo',
);

$this->menu=array(
array('label'=>'Listar','url'=>array('index')),
array('label'=>'Administrar','url'=>array('admin')),
);
?>

<h1>Registrar Dirección</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelAsentamiento'=>$modelAsentamiento,  'modelLocalidad'=>$modelLocalidad,'modelMunicipio'=>$modelMunicipio,'modelEstado'=>$modelEstado ));  ?>