<?php
/* @var $this PosteController */
/* @var $model Poste */

$this->breadcrumbs=array(
	'Postes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Poste', 'url'=>array('index')),
	array('label'=>'Create Poste', 'url'=>array('create')),
	array('label'=>'View Poste', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Poste', 'url'=>array('admin')),
);
?>

<h1>Update Poste <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'modelPosteDireccion'=>$modelPosteDireccion,'modelZona'=>$modelZona,'modelDireccion'=>$modelDireccion, 'modelAsentamiento'=>$modelAsentamiento,  'modelLocalidad'=>$modelLocalidad,'modelMunicipio'=>$modelMunicipio,'modelEstado'=>$modelEstado ));  ?>