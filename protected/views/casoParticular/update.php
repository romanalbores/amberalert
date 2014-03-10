<?php
$this->breadcrumbs=array(
	'Caso Particulars'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List CasoParticular','url'=>array('index')),
	array('label'=>'Create CasoParticular','url'=>array('create')),
	array('label'=>'View CasoParticular','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage CasoParticular','url'=>array('admin')),
	);
	?>

	<h1>Update CasoParticular <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>