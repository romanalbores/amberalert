<?php
/* @var $this PosteController */
/* @var $model Poste */

$this->breadcrumbs=array(
	'Postes'=>array('index'),
	'Nuevo',
);

$this->menu=array(
	array('label'=>'Listar', 'url'=>array('index')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Nuevo Poste</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelPosteDireccion'=>$modelPosteDireccion,'modelZona'=>$modelZona,'modelDireccion'=>$modelDireccion, 'modelAsentamiento'=>$modelAsentamiento,  'modelLocalidad'=>$modelLocalidad,'modelMunicipio'=>$modelMunicipio,'modelEstado'=>$modelEstado ));  ?>