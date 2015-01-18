<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $model RelacionVictimaSospechoso */

$this->breadcrumbs=array(
	'Relacion Victima Sospechosos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List RelacionVictimaSospechoso', 'url'=>array('index')),
	array('label'=>'Manage RelacionVictimaSospechoso', 'url'=>array('admin')),
);
?>

<h1>Create RelacionVictimaSospechoso</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>