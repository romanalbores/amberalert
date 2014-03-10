<?php
$this->breadcrumbs=array(
	'Tipo Postes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TipoPoste','url'=>array('index')),
	array('label'=>'Create TipoPoste','url'=>array('create')),
	array('label'=>'View TipoPoste','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TipoPoste','url'=>array('admin')),
	);
	?>

	<h1>Update TipoPoste <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>