<?php
/* @var $this PersonaPersonalizadaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Persona Personalizadas',
);

$this->menu=array(
	array('label'=>'Create PersonaPersonalizada', 'url'=>array('create')),
	array('label'=>'Manage PersonaPersonalizada', 'url'=>array('admin')),
);
?>

<h1>Persona Personalizadas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
