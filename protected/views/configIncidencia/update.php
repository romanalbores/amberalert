<?php
$this->breadcrumbs=array(
	'Configuracion Postes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ConfiguracionPoste','url'=>array('index')),
	array('label'=>'Create ConfiguracionPoste','url'=>array('create')),
	array('label'=>'View ConfiguracionPoste','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ConfiguracionPoste','url'=>array('admin')),
	);
	?>

	<h1>Update ConfiguracionPoste <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>