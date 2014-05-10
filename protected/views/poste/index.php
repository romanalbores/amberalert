<?php
/* @var $this PosteController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Postes',
);

$this->menu=array(
	array('label'=>'Nuevo', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Postes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
