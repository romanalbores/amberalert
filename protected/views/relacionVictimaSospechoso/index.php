<?php
/* @var $this RelacionVictimaSospechosoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Relacion Victima Sospechosos',
);

$this->menu=array(
	array('label'=>'Create RelacionVictimaSospechoso', 'url'=>array('create')),
	array('label'=>'Manage RelacionVictimaSospechoso', 'url'=>array('admin')),
);
?>

<h1>Relacion Victima Sospechosos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
