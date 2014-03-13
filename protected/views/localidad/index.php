<?php
/* @var $this LocalidadController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Localidades',
);

$this->menu=array(
	array('label'=>'Nuevo', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Localidads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
