<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $model RelacionVictimaSospechoso */

$this->breadcrumbs=array(
	'Relacion Victima Sospechosos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List RelacionVictimaSospechoso', 'url'=>array('index')),
	array('label'=>'Create RelacionVictimaSospechoso', 'url'=>array('create')),
	array('label'=>'View RelacionVictimaSospechoso', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage RelacionVictimaSospechoso', 'url'=>array('admin')),
);
?>

<h1>Update RelacionVictimaSospechoso <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>