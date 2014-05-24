<?php
$this->breadcrumbs=array(
	'Configuracion Dias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ConfiguracionDia','url'=>array('index')),
	array('label'=>'Create ConfiguracionDia','url'=>array('create')),
	array('label'=>'View ConfiguracionDia','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ConfiguracionDia','url'=>array('admin')),
	);
	?>

	<h1>Update ConfiguracionDia <?php echo $model->id; ?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model, 'modelDH'=>$modelDH)); ?>